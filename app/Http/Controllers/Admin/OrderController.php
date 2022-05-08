<?php

namespace App\Http\Controllers\Admin;

use App\Model\Shop;
use App\CPU\Helpers;
use App\Model\Admin;
use App\Model\Order;
use App\Model\Seller;
use App\Model\Product;
use App\CPU\OrderManager;
use App\Model\AdminWallet;
use App\Model\DeliveryMan;
use App\Model\OrderDetail;
use App\Model\SellerWallet;
use Illuminate\Http\Request;
use App\Model\ShippingMethod;
use App\Model\BusinessSetting;
use App\Model\ShippingAddress;
use App\Model\OrderTransaction;
use function App\CPU\translate;
use Seshac\Shiprocket\Shiprocket;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    public function list(Request $request, $status)
    {
        $query_param = [];
        $search = $request['search'];
        if (session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1) {
            $query = Order::whereHas('details', function ($query) {
                $query->whereHas('product', function ($query) {
                    $query->where('added_by', 'admin');
                });
            })->with(['customer']);

            if ($status != 'all') {
                $orders = $query->where(['order_status' => $status]);
            } else {
                $orders = $query;
            }
        } else {
            if ($status != 'all') {
                $orders = Order::with(['customer'])->where(['order_status' => $status]);
            } else {
                $orders = Order::with(['customer']);
            }
        }

        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $orders = $orders->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('id', 'like', "%{$value}%")
                        ->orWhere('order_status', 'like', "%{$value}%")
                        ->orWhere('transaction_ref', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        }

        $orders = $orders->where('order_type','default_type')->orderBy('id','desc')->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.order.list', compact('orders', 'search'));
    }

    public function details($id)
    {
        $order = Order::with('details', 'shipping', 'seller')->where(['id' => $id])->first();
        $linked_orders = Order::where(['order_group_id' => $order['order_group_id']])
            ->whereNotIn('order_group_id', ['def-order-group'])
            ->whereNotIn('id', [$order['id']])
            ->get();

        $shipping_method = Helpers::get_business_settings('shipping_method');
        $delivery_men = DeliveryMan::where('is_active', 1)->when($order->seller_is == 'admin', function ($query) {
            $query->where(['seller_id' => 0]);
        })->when($order->seller_is == 'seller' && $shipping_method == 'sellerwise_shipping', function ($query) use ($order) {
            $query->where(['seller_id' => $order['seller_id']]);
        })->when($order->seller_is == 'seller' && $shipping_method == 'inhouse_shipping', function ($query) use ($order) {
            $query->where(['seller_id' => 0]);
        })->get();

        $shipping_address = ShippingAddress::find($order->shipping_address);

        return view('admin-views.order.order-details', compact('shipping_address','order', 'linked_orders', 'delivery_men'));
    }

    public function add_delivery_man($order_id, $delivery_man_id)
    {
        if ($delivery_man_id == 0) {
            return response()->json([], 401);
        }
        $order = Order::find($order_id);
        /*if($order->order_status == 'delivered' || $order->order_status == 'returned' || $order->order_status == 'failed' || $order->order_status == 'canceled' || $order->order_status == 'scheduled') {
            return response()->json(['status' => false], 200);
        }*/
        $order->delivery_man_id = $delivery_man_id;
        $order->save();

        $fcm_token = $order->delivery_man->fcm_token;
        $value = Helpers::order_status_update_message('del_assign') . " ID: " . $order['id'];
        try {
            if ($value != null) {
                $data = [
                    'title' => translate('order'),
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token, $data);
            }
        } catch (\Exception $e) {
            Toastr::warning(\App\CPU\translate('Push notification failed for DeliveryMan!'));
        }

        return response()->json(['status' => true], 200);
    }

    public function status(Request $request)
    {
        $order = Order::find($request->id);
        $fcm_token = $order->customer->cm_firebase_token;
        $value = Helpers::order_status_update_message($request->order_status);
        try {
            if ($value) {
                $data = [
                    'title' => translate('Order'),
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token, $data);
            }
        } catch (\Exception $e) {
        }


        try {
            $fcm_token_delivery_man = $order->delivery_man->fcm_token;
            if ($value != null) {
                $data = [
                    'title' => translate('order'),
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token_delivery_man, $data);
            }
        } catch (\Exception $e) {
        }

        $order->order_status = $request->order_status;
        OrderManager::stock_update_on_order_status_change($order, $request->order_status);
        $order->save();

        $transaction = OrderTransaction::where(['order_id' => $order['id']])->first();
        if (isset($transaction) && $transaction['status'] == 'disburse') {
            return response()->json($request->order_status);
        }

        if ($request->order_status == 'delivered' && $order['seller_id'] != null) {
            OrderManager::wallet_manage_on_order_status_change($order, 'admin');
            OrderDetail::where('order_id', $order->id)->update(
                ['delivery_status'=>'delivered']
            );
        }

        return response()->json($request->order_status);
    }

    public function payment_status(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::find($request->id);
            $order->payment_status = $request->payment_status;
            $order->save();
            $data = $request->payment_status;
            return response()->json($data);
        }
    }

    public function generate_invoice($id)
    {
        $order = Order::with('seller')->with('shipping')->with('details')->where('id', $id)->first();
        $seller = Seller::find($order->details->first()->seller_id);
        $data["email"] = $order->customer["email"];
        $data["client_name"] = $order->customer["f_name"] . ' ' . $order->customer["l_name"];
        $data["order"] = $order;

        $mpdf_view = \View::make('admin-views.order.invoice')->with('order', $order)->with('seller', $seller);
        Helpers::gen_mpdf($mpdf_view, 'order_invoice_', $order->id);
    }

    public function inhouse_order_filter()
    {
        if (session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1) {
            session()->put('show_inhouse_orders', 0);
        } else {
            session()->put('show_inhouse_orders', 1);
        }
        return back();
    }

    public function updateBnEd($batch_number,$expiry_date,$id)
    {
        $order=OrderDetail::find($id);
        $order->batch_number = $batch_number;
        $order->expiry_date = $expiry_date;
        $order->save();
    }

    public function checkBnEd($order_id)
    {
       return OrderDetail::where('order_id',$order_id) ->where(function ($query) {
        $query->where('batch_number', null)->orWhere('expiry_date', null);
        })->count();
    }

    public function storePackageDetail(Request $request,$order_id)
    {
        $order=Order::find($order_id);
        $order->weight = $request->weight;
        $order->length = $request->length;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->save();

        $order=Order::where('id',$order_id)->first();

        $data=array();
        foreach ($order->details as $key => $orderDetail)
        {
            array_push($data,['name'=>$orderDetail->product->name,'hsn'=>$orderDetail->product->hsn,'selling_price'=>$orderDetail->price,'units'=>$orderDetail->qty,'discount'=>'','tax'=>'','sku'=>$orderDetail->product->name]);
        }
        $orderDetails = [
            "order_id"=>$order->id,
            "order_date"=>$order->created_at,
            "pickup_location"=>"Primary",
            "channel_id"=>"",
            "comment"=>"",
            "billing_customer_name"=>json_decode($order->billing_address_data)->contact_person_name,
            "billing_last_name"=>'',
            "billing_address"=>json_decode($order->billing_address_data)->address,
            "billing_address_2"=>json_decode($order->billing_address_data)->address,
            "billing_city"=>json_decode($order->billing_address_data)->city,
            "billing_pincode"=>json_decode($order->billing_address_data)->zip,
            "billing_state"=>json_decode($order->billing_address_data)->state,
            "billing_country"=>json_decode($order->billing_address_data)->country,
            "billing_email"=>'neel@gmail.com',
            "billing_phone"=>'7271001995',
            "shipping_is_billing"=>true,
            //  "shipping_customer_name"=>json_decode($order->shipping_address)->name,
            //  "shipping_last_name"=>json_decode($order->shipping_address)->name,
            //  "shipping_address"=>json_decode($order->shipping_address)->address,
            //  "shipping_address_2"=>json_decode($order->shipping_address)->address,
            //  "shipping_city"=>json_decode($order->shipping_address)->city,
            //  "shipping_pincode"=>json_decode($order->shipping_address)->postal_code,
            //  "shipping_country"=>json_decode($order->shipping_address)->country,
            //  "shipping_state"=>json_decode($order->shipping_address)->state,
            //  "shipping_email"=>json_decode($order->shipping_address)->email,
            //  "shipping_phone"=>json_decode($order->shipping_address)->phone,
            "payment_method"=>$order->payment_method,
            "shipping_charges"=>$order->shipping_cost,
            "giftwrap_charges"=>"",
            "transaction_charges"=>0,
            "total_discount"=>0,
            "sub_total"=>$order->order_amount,
            "length"=>(int)$order->length,
            "breadth"=>(int)$order->width,
            "height"=>(int)$order->height,
            "weight"=>(int)$order->weight,
            "order_items"=>$data
        ];
        $token =  Shiprocket::getToken();
        return $response =  Shiprocket::order($token)->create($orderDetails);
    }
}
