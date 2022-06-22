<?php

namespace App\Http\Controllers\api\v1;

use Auth;
use App\User;
use Carbon\Carbon;
use App\CPU\Helpers;
use App\Model\Order;
use App\Models\Doctor;
use App\Model\Wishlist;
use App\CPU\ImageManager;
use App\Model\OrderDetail;
use App\Models\DoctorSlot;
use App\CPU\CustomerManager;
use App\Model\SupportTicket;
use App\Models\DoctorSlider;
use Illuminate\Http\Request;
use App\Model\ShippingAddress;
use App\Models\DoctorCategory;
use function App\CPU\translate;
use App\Model\SupportTicketConv;
use App\Models\DoctorSlotBooking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function info(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function create_support_ticket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $request['customer_id'] = $request->user()->id;
        $request['priority'] = 'low';
        $request['status'] = 'pending';

        try {
            CustomerManager::create_support_ticket($request);
        } catch (\Exception $e) {
            return response()->json([
                'errors' => [
                    'code' => 'failed',
                    'message' => 'Something went wrong',
                ],
            ], 422);
        }
        return response()->json(['message' => 'Support ticket created successfully.'], 200);
    }

    public function reply_support_ticket(Request $request, $ticket_id)
    {
        $support = new SupportTicketConv();
        $support->support_ticket_id = $ticket_id;
        $support->admin_id = 1;
        $support->customer_message = $request['message'];
        $support->save();
        return response()->json(['message' => 'Support ticket reply sent.'], 200);
    }

    public function get_support_tickets(Request $request)
    {
        return response()->json(SupportTicket::where('customer_id', $request->user()->id)->get(), 200);
    }

    public function get_support_ticket_conv($ticket_id)
    {
        return response()->json(SupportTicketConv::where('support_ticket_id', $ticket_id)->get(), 200);
    }

    public function add_to_wishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $wishlist = Wishlist::where('customer_id', $request->user()->id)->where('product_id', $request->product_id)->first();

        if (empty($wishlist)) {
            $wishlist = new Wishlist;
            $wishlist->customer_id = $request->user()->id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
            return response()->json(['message' => translate('successfully added!')], 200);
        }

        return response()->json(['message' => translate('Already in your wishlist')], 409);
    }

    public function remove_from_wishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $wishlist = Wishlist::where('customer_id', $request->user()->id)->where('product_id', $request->product_id)->first();

        if (!empty($wishlist)) {
            Wishlist::where(['customer_id' => $request->user()->id, 'product_id' => $request->product_id])->delete();
            return response()->json(['message' => translate('successfully removed!')], 200);

        }
        return response()->json(['message' => translate('No such data found!')], 404);
    }

    public function wish_list(Request $request)
    {
        return response()->json(Wishlist::whereHas('product')->with(['product'])->where('customer_id', $request->user()->id)->get(), 200);
    }

    public function address_list(Request $request)
    {
        return response()->json(ShippingAddress::where('customer_id', $request->user()->id)->get(), 200);
    }

    public function add_new_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_person_name' => 'required',
            'address_type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'is_billing' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $address = [
            'customer_id' => $request->user()->id,
            'contact_person_name' => $request->contact_person_name,
            'address_type' => $request->address_type,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_billing' => $request->is_billing,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('shipping_addresses')->insert($address);
        return response()->json(['message' => translate('successfully added!')], 200);
    }

    public function delete_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        if (DB::table('shipping_addresses')->where(['id' => $request['address_id'], 'customer_id' => $request->user()->id])->first()) {
            DB::table('shipping_addresses')->where(['id' => $request['address_id'], 'customer_id' => $request->user()->id])->delete();
            return response()->json(['message' => 'successfully removed!'], 200);
        }
        return response()->json(['message' => translate('No such data found!')], 404);
    }

    public function get_order_list(Request $request)
    {
        $orders = Order::where(['customer_id' => $request->user()->id])->get();
        $orders->map(function ($data) {
            $data['shipping_address_data'] = json_decode($data['shipping_address_data']);
            $data['billing_address_data'] = json_decode($data['billing_address_data']);
            return $data;
        });
        return response()->json($orders, 200);
    }

    public function get_order_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $details = OrderDetail::where(['order_id' => $request['order_id']])->get();
        $details->map(function ($query) {
            $query['variation'] = json_decode($query['variation'], true);
            $query['product_details'] = Helpers::product_data_formatting(json_decode($query['product_details'], true));
            return $query;
        });
        return response()->json($details, 200);
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone' => 'required',
        ], [
            'f_name.required' => translate('First name is required!'),
            'l_name.required' => translate('Last name is required!'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        if ($request->has('image')) {
            $imageName = ImageManager::update('profile/', $request->user()->image, 'png', $request->file('image'));
        } else {
            $imageName = $request->user()->image;
        }

        if ($request['password'] != null && strlen($request['password']) > 5) {
            $pass = bcrypt($request['password']);
        } else {
            $pass = $request->user()->password;
        }

        $userDetails = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'phone' => $request->phone,
            'image' => $imageName,
            'password' => $pass,
            'updated_at' => now(),
        ];

        User::where(['id' => $request->user()->id])->update($userDetails);

        return response()->json(['message' => translate('successfully updated!')], 200);
    }

    public function update_cm_firebase_token(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cm_firebase_token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        DB::table('users')->where('id', $request->user()->id)->update([
            'cm_firebase_token' => $request['cm_firebase_token'],
        ]);

        return response()->json(['message' => translate('successfully updated!')], 200);
    }

    public function getDoctorList(Request $request)
    {
        $list=Doctor::where('status',1)->with('doctor_profile')->paginate(15,['id','name','email','phone_number']);

        foreach($list as $data)
        {
            if(!empty($data->doctor_profile->adhar_card))
            {
                $data->doctor_profile->adhar_card=asset('doctor_documents/'.$data->doctor_profile->adhar_card);
            }
            if(!empty($data->doctor_profile->pan_card))
            {
                $data->doctor_profile->pan_card=asset('doctor_documents/'.$data->doctor_profile->pan_card);
            }
            if(!empty($data->doctor_profile->degree))
            {
                $data->doctor_profile->degree=asset('doctor_documents/'.$data->doctor_profile->degree);
            }
            if(!empty($data->doctor_profile->registration_document))
            {
                $data->doctor_profile->registration_document=asset('doctor_documents/'.$data->doctor_profile->registration_document);
            }
            if(!empty($data->doctor_profile->profile_photo))
            {
                $data->doctor_profile->profile_photo=asset('doctor_documents/'.$data->doctor_profile->profile_photo);
            }
        }

        return $list;
    }

    public function getDoctorSlot(Request $request)
    {
        $day_array=['id','doctor_id'];
        $doctor_id=$request->doctor_id;
        for($i=0;$i<=6;$i++)
        {
            $day=strtolower(Carbon::now()->addDays($i)->format('l'));
            array_push($day_array,$day);
        }
        $doctor_slot=DoctorSlot::where('doctor_id',$request->doctor_id)->with('doctor','doctor_profile')->first($day_array);
        $date=Carbon::now();
        $day=strtolower(Carbon::now()->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        $day=strtolower(Carbon::now()->addDays(1)->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->addDays(1)->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        $day=strtolower(Carbon::now()->addDays(2)->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->addDays(1)->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        $day=strtolower(Carbon::now()->addDays(3)->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->addDays(1)->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        $day=strtolower(Carbon::now()->addDays(4)->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->addDays(1)->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        $day=strtolower(Carbon::now()->addDays(5)->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->addDays(1)->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        $day=strtolower(Carbon::now()->addDays(6)->format('l'));
        $doctor_slot->$day=json_decode($doctor_slot->$day);
        $doctor_slot->$day->morning->date=$date->addDays(1)->format('d-m-Y');
        $doctor_slot->$day->morning->slot= $this->SplitTime($doctor_slot->$day->morning->start_time, $doctor_slot->$day->morning->end_time, "30",$date,$doctor_id);
        $doctor_slot->$day->evening->date=$date->format('d-m-Y');
        $doctor_slot->$day->evening->slot= $this->SplitTime($doctor_slot->$day->evening->start_time, $doctor_slot->$day->evening->end_time, "30",$date,$doctor_id);

        if(!empty($doctor_slot->doctor_profile->adhar_card))
        {
            $doctor_slot->doctor_profile->adhar_card=asset('doctor_documents/'.$doctor_slot->doctor_profile->adhar_card);
        }
        if(!empty($doctor_slot->doctor_profile->pan_card))
        {
            $doctor_slot->doctor_profile->pan_card=asset('doctor_documents/'.$doctor_slot->doctor_profile->pan_card);
        }
        if(!empty($doctor_slot->doctor_profile->degree))
        {
            $doctor_slot->doctor_profile->degree=asset('doctor_documents/'.$doctor_slot->doctor_profile->degree);
        }
        if(!empty($doctor_slot->doctor_profile->registration_document))
        {
            $doctor_slot->doctor_profile->registration_document=asset('doctor_documents/'.$doctor_slot->doctor_profile->registration_document);
        }
        if(!empty($doctor_slot->doctor_profile->profile_photo))
        {
            $doctor_slot->doctor_profile->profile_photo=asset('doctor_documents/'.$doctor_slot->doctor_profile->profile_photo);
        }

        return $doctor_slot;
    }

    public function SplitTime($StartTime, $EndTime, $Duration="30",$date,$doctor_id){
        $ReturnArray = array ();// Define output
        $StartTime    = strtotime ($StartTime); //Get Timestamp
        $EndTime      = strtotime ($EndTime); //Get Timestamp
        $AddMins  = $Duration * 60;

        while ($StartTime <= $EndTime) //Run loop
        {
            if($date->format('d-m-Y') == Carbon::now()->format('d-m-Y'))
            {
                if(Carbon::now()->format('H:i') <= date ("H:i", $StartTime))
                {
                    $booking=DoctorSlotBooking::where('doctor_id',$doctor_id)->where('date',$date->format('d-m-Y'))->where('slot',date ("h:i A", $StartTime))->first();
                    if(empty($booking))
                    {
                        $status=1;
                    }
                    else
                    {
                        $status=0;
                    }
                }
                else
                {
                    $status=0;
                }
            }
            else
            {
                $booking=DoctorSlotBooking::where('doctor_id',$doctor_id)->where('date',$date->format('d-m-Y'))->where('slot',date ("h:i A", $StartTime))->first();
                if(empty($booking))
                {
                    $status=1;
                }
                else
                {
                    $status=0;
                }
            }
            $ReturnArray[] = [
                'time'=>date ("h:i A", $StartTime),
                'status'=>$status
            ];
            $StartTime += $AddMins; //Endtime check
        }
        return $ReturnArray;
    }

    public function doctorSlotBooking(Request $request)
    {
        return DoctorSlotBooking::create([
            'customer_id'=>Auth::user()->id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'day'=>$request->day,
            'slot'=>$request->slot
        ]);

    }

    public function docotorHome(Request $request)
    {
        $doctor_sliders=DoctorSlider::where('status',1)->get();
        foreach($doctor_sliders as $doctor_slider)
        {
            $doctor_slider->image=asset('public/doctor_sliders/'.$doctor_slider->image);
        }

        $doctor_categories=DoctorCategory::where('delete_status',0)->where('status',1)->get();
        foreach($doctor_categories as $doctor_category)
        {
            $doctor_category->image=asset('public/doctor_categories/'.$doctor_category->image);
        }

        return response()->json(['doctor_sliders'=>$doctor_sliders,'doctor_categories'=>$doctor_categories]);
    }

}
