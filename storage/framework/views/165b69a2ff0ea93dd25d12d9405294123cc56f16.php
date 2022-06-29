<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice | Dr. Deo</title>
    <style>



body {
  position: relative;
  width: 25cm!important;
  height: 26.2cm!important;
  color: #001028;
  background: #FFFFFF;
  font-family: 'Titillium Web', sans-serif!important;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 2px;
    overflow: hidden;
}
li {
  float: left;
}
.details{width: 70%;position: relative; float: left;}
.invoicenum{width: 30%;position: relative; float: left; }
.footer{width: 35%;position: relative; float: right; }
.shipping{width: 39%;position: relative; float: left;}
.table-box{width: 100%; position: relative; float: left; margin-top: 10px;}
.tax1{width: 100%;text-align: center;}
.signature-box {
    width: 40%;
    position: relative;
    float: right;
    margin-top: 4%;
	margin-right:-30px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 th {
  border:2px solid #111010;
  text-align: left;
  padding: 10px;
  font-size: 18px!important;
}
td {
  text-align: left;
  margin-left: 10px;
}
p{letter-spacing: 0.2px;
	margin: 0px;
	line-height: 15px!important;
}
h1{font-weight:100px;letter-spacing: 0.2px;}
.border{border: 2px solid #111010;}
.border-none{border: none!important;}
    </style>
  </head>
  <body>
	<?php
    use App\Model\BusinessSetting;
    $company_phone =BusinessSetting::where('type', 'company_phone')->first()->value;
    $company_email =BusinessSetting::where('type', 'company_email')->first()->value;
    $company_name =BusinessSetting::where('type', 'company_name')->first()->value;
    $company_web_logo =BusinessSetting::where('type', 'company_web_logo')->first()->value;
    $company_mobile_logo =BusinessSetting::where('type', 'company_mobile_logo')->first()->value;
?>


<div class="tax1">
  			<p style="font-size: 14px;"><b>TAX INVOICE</b></p>
  		</div>

  	<header style="margin-top: 3%;">

  		<div class="details">
		  <p style="font-size: 12px;"><strong><b>Sold By:</b> </strong> <b>Dr. Deo Homeo Private Limited</b></p>
		  <p style="font-size: 11px;"><strong><b>Ship- from Address:</b> </strong> Nageshwar Colony, Bakerganj Bari Road, <br>Patna - 800004 (Bihar)</p>
		  <p style="font-size: 11px;"><strong><b>GSTIN:</b> </strong> 10abcd4182G1z6</p>

  		</div>

  		<div class="invoicenum">

		  <p style="font-size: 11px;"><strong><b>DL No:</b> </strong> abcd4182G1</p>
		  <p style="font-size: 11px;"><strong><b>PAN No:</b> </strong> abcd4182G1</p>
		  <p style="font-size: 11px;"><strong><b>CIN No:</b> </strong> U24234BR1999PTC008949</p>

			<!--
  			<p style="font-size: 14px;"><b>Invoice Number - </b><span><?php echo e($order->id); ?></span></p>
  			<p style="font-size: 14px;"><b>Invoice Date -</b> <span><?php echo e(date('d-m-Y',strtotime($order['created_at']))); ?></span></p>
  			 -->
  		</div>
		  <hr style="color:black;">
		  <div style="width: 26%;position: relative; float: left;">
		  <p style="font-size: 11px;"><strong><b>Order ID:</b> </strong> <?php echo e($order->id); ?></p>
		  <p style="font-size: 11px;"><strong><b>Order Date:</b> </strong> <?php echo e(date('d-m-Y H:i',strtotime($order['created_at']))); ?></p>
		  <p style="font-size: 11px;"><strong><b>Invoice No:</b> </strong> <?php echo e($order->id); ?></p>
		  <p style="font-size: 11px;"><strong><b>Invoice Date:</b> </strong> <?php echo e(date('d-m-Y')); ?></p>
		  <?php
			 $codde=\App\Model\StateTax::where('name',$order->shippingAddress['state'])->first();
			 if($order->shippingAddress['state'] == "Bihar"){
				$tac_status = 1;
			 }else{
				$tac_status = 0;
			 }

			 ?>
		  </div>
		  <div style="width: 36%;position: relative; float: left;">
		  <p style="font-size: 11px;"><strong><b>Bill To:</b> </strong>
		   <br><b> <?php echo e($order->billingAddress ? $order->billingAddress['contact_person_name'] : ""); ?> </b>
		   <br><?php echo e($order->billingAddress ? $order->billingAddress['address'] : ""); ?><?php echo e($order->billingAddress ? $order->billingAddress['city'] : ""); ?> <?php echo e($order->billingAddress ? $order->billingAddress['zip'] : ""); ?><?php echo e($order->billingAddress ? $order->billingAddress['state'] : ""); ?>

		   <br>State Code- <?php echo e($codde->code); ?></p>
		  </div>
		  <div style="width: 36%;position: relative; float: left;">
		  <p style="font-size: 11px;"><strong><b>Ship To:</b> </strong>
		   <br><b> <?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?> </b>
		   <br><?php echo e($order->shippingAddress ? $order->shippingAddress['address'] : ""); ?><?php echo e($order->shippingAddress ? $order->shippingAddress['city'] : ""); ?> <?php echo e($order->shippingAddress ? $order->shippingAddress['zip'] : ""); ?><?php echo e($order->shippingAddress ? $order->shippingAddress['state'] : ""); ?>

		   <br>State Code- <?php echo e($codde->code); ?></p>
		  </div>

  	</header>

	  <?php if($order->order_type == 'default_type'): ?>

	  <?php else: ?>
	  <table class="content-position-y" style="width: 100%">
		<tr>
			<td valign="top">
				<span class="h1" style="margin: 0px;"><?php echo e(\App\CPU\translate('POS_order')); ?> </span>

			</td>

		</tr>
	</table>
	  <?php endif; ?>
  	<div class="table-box">
		<table>
			<tr>
			  <th><h1><b>Product</b></h1></th>
			  <th style="width:750px;"><h1><b>Item Name</b></h1></th>
			  <th style="width:250px;text-align:center"><h1><b>Unit Price ₹</b></h1></th>
			  <th style="width:100px; text-align:center"><h1><b>Qty</b></h1></th>
			  <th style="width:220px; text-align:center"><h1><b>Gross Amount ₹</b></h1></th>
			  <th style="width:200px; text-align:center"><h1><b>Tax Type</b></h1></th>
			  <th style="width:220px; text-align:center"><h1><b>Tax Amount ₹</b></h1></th>
			  <th style="width:200px; text-align:center"><h1><b>Total ₹</b></h1></th>
			</tr>
			<?php
			$subtotal=0;
			$total=0;
			$sub_total=0;
			$taxnumbe = 0;
			$total_tax=0;
			$total_shipping_cost=0;
			$total_discount_on_product=0;
			$extra_discount=0;
		?>
		<?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php $subtotal=($details['price'])*$details->qty ?>
		<?php
		if($taxnumbe <= $details['product']->tax){
		  $taxnumbe=$details['product']->tax;
		}
		?>
			<tr class="border">
			   <td style="padding:10px 0px 10px 10px;">

			 <h1> Expire Date: <?php echo e($details->expiry_date); ?>	</h1> <br>
			 <h1> Batch No: <?php echo e($details->batch_number); ?>	</h1> <br>
			 <h1> HSN Cod:  <?php echo e($details['product']?$details['product']->hsn:''); ?>	 </h1><br>

			  </td>
			  <td style="padding:8px 0px 8px 10px;font-size: 18px;"><h1><?php echo e($details['product']?$details['product']->name:''); ?><br> <?php echo e(\App\CPU\translate('variation')); ?> : <?php echo e($details['variant']); ?></h1></td>
			  <td style="text-align: center;font-size: 18px;"><h1><b><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($details['price'])); ?></b></h1></td>
			  <td style="text-align: center;font-size: 18px;"><h1><?php echo e($details->qty); ?></h1></td>
			  <td style="text-align: center;font-size: 18px;"><h1><b><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($subtotal)); ?></b></h1></td>
			  <?php if($tac_status == 1): ?>
			  <td style="text-align: center;font-size: 18px;"><h1>CGST <?php echo e($details['product']->tax/2); ?>%</h1><br><h1>SGST <?php echo e($details['product']->tax/2); ?>%</h1></td>
			  <td style="text-align: center;font-size: 18px;"><h1><?php echo e(($subtotal/100)*$details['product']->tax); ?></h1></td>
			  <?php else: ?>
			  <td style="text-align: center;font-size: 18px;"><h1>IGST <?php echo e($details['product']->tax); ?>%</h1></td>
			  <td style="text-align: center;font-size: 18px;"><h1><?php echo e(($subtotal/100)*$details['product']->tax); ?></h1></td>
			  <?php endif; ?>
			  <?php
			  $tttt=$subtotal+($subtotal/100)*$details['product']->tax;
			  ?>
			  <td style="text-align: center;font-size: 18px;"><h1><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($subtotal)); ?></h1></td>
			 </tr>
			 <?php
			$sub_total+=$details['price']*$details['qty'];
			$total_tax+=$details['tax'];
			$total_shipping_cost+=$details->shipping ? $details->shipping->cost :0;
			$total_discount_on_product+=$details['discount'];
			$total+=$subtotal;
		?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<?php
	  if ($order['extra_discount_type'] == 'percent') {
		  $extra_discount = ($sub_total / 100) * $order['extra_discount'];
	  } else {
		  $extra_discount = $order['extra_discount'];
	  }

  ?>
  <?php ($shipping=$order['shipping_cost']); ?>
		<tr>
			  <td  colspan="2">
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>

			  </td>

			  <td colspan="3" style="font-size:20px; padding-left:20px;">

			  </td>

			  <td colspan="2" style="padding:20px 0px 10px 10px; border:1px solid black;border-top:0px; border-right:0px;border-bottom:0px;font-size: 18px;">
			   <h1><b>Taxable Value (₹)</b></h1>
				<br><h1><b> Tax Amount (₹)</b></h1>
				<br><h1><b> Coupon Discount (₹)</b></h1>
			  </td>
			  <td style="text-align: center;padding:0px 0px 10px 10px; border:1px solid black; border-top:0px;border-left:0px;border-bottom:0px;font-size: 18px;">

			   <h1><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($sub_total)); ?></h1>
			    <br><h1><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total_tax+($shipping/100)*$taxnumbe)); ?></h1>
				<br><h1>-<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($order->discount_amount)); ?></h1>
			  </td>
		</tr>
		<tr>
			  <td rowspan="2" style="text-align:center;border:1px solid black; padding:20px 0px 20px 20px; width:650px;">

				  <img  src="<?php echo e(asset("public/assets/front-end/img/signn.jpeg")); ?>" style="text-align:center; width:350px;height:130px; margin-bottom:20px;">

				<br>  <h1 style="font-size:28px;"><b>Authorized Signatory</b></h1>
			  <br>
			  <h1 style="font-size:25px;"><b>Dr. Deo Homeo Private Limited</b></h1>
			  </td>


			  <td rowspan="2" colspan="4">
			  <br>

			  <img  src="<?php echo e(asset("public/assets/front-end/img/thanku2.jpg")); ?>" style="text-align:center;margin-left:30px;padding:20px; width:450px;border:1px solid black;">
			  </td>
			  <td colspan="2" style="border:1px solid black; border-right:0px;padding:15px 0px 15px 10px;font-size: 20px;"><h1><b>Grand Total (₹) </b></h1></td>
			  <td   style="text-align: center;border:1px solid black; border-left:0px;padding:15px 0px 15px 10px;width:200px;font-size: 18px;"><h1><b><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($sub_total)); ?></b></h1></td>
		</tr>
		<tr>

			  <td colspan="2" style="border:1px solid black; border-right:0px;padding:15px 0px 15px 10px;border-top:0px;font-size: 20px;"><h1><b>Payment Method: </b></h1></td>
			  <td style="text-align: center;border:1px solid black; border-left:0px;padding:15px 0px 15px 10px;border-top:0px;width:200px;font-size: 24px;"><h1><b><?php echo e(str_replace('_',' ',$order->payment_method)); ?> </b></h1></td>
		</tr>


		  </table>
		</div>

		<div style="width: 100%; margin-top:10px;">
		<hr>
		</div>




	</body>
  </html>
<?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/order/invoice.blade.php ENDPATH**/ ?>