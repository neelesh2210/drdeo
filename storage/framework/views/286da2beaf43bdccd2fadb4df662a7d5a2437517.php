<style>
    .cart_title {
        font-weight: 400 !important;
        font-size: 16px;
    }

    .cart_value {
        font-weight: 600 !important;
        font-size: 16px;
    }

    .cart_total_value {
        font-weight: 700 !important;
        font-size: 25px !important;
        color: <?php echo e($web_config['primary_color']); ?>     !important;
    }
</style>

<aside class="col-lg-4 pt-4 pt-lg-0">
    <div class="cart_total">
        <?php ($sub_total=0); ?>
        <?php ($total_tax=0); ?>
        <?php ($total_shipping_cost=0); ?>
        <?php ($total_discount_on_product=0); ?>
        <?php ($cart=\App\CPU\CartManager::get_cart()); ?>
        <?php ($shipping_cost=\App\CPU\CartManager::get_shipping_cost()); ?>
        <?php if($cart->count() > 0): ?>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($sub_total+=$cartItem['price']*$cartItem['quantity']); ?>
                <?php ($total_tax+=$cartItem['tax']*$cartItem['quantity']); ?>
                <?php ($total_discount_on_product+=$cartItem['discount']*$cartItem['quantity']); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php ($total_shipping_cost=$shipping_cost); ?>
        <?php else: ?>
            <span><?php echo e(\App\CPU\translate('empty_cart')); ?></span>
        <?php endif; ?>
        <div class="d-flex justify-content-between">
            <span class="cart_title"><?php echo e(\App\CPU\translate('sub_total')); ?></span>
            <span class="cart_value">
                <?php echo e(\App\CPU\Helpers::currency_converter($sub_total)); ?>

            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span class="cart_title"><?php echo e(\App\CPU\translate('tax')); ?></span>
            <span class="cart_value">
                <?php echo e(\App\CPU\Helpers::currency_converter($total_tax)); ?>

            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span class="cart_title"><?php echo e(\App\CPU\translate('shipping')); ?></span>
            <span class="cart_value">
                <?php echo e(\App\CPU\Helpers::currency_converter($total_shipping_cost)); ?>

            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span class="cart_title"><?php echo e(\App\CPU\translate('discount_on_product')); ?></span>
            <span class="cart_value">
                - <?php echo e(\App\CPU\Helpers::currency_converter($total_discount_on_product)); ?>

            </span>
        </div>
        <?php if(session()->has('coupon_discount')): ?>
            <div class="d-flex justify-content-between">
                <span class="cart_title"><?php echo e(\App\CPU\translate('coupon_discount')); ?></span>
                <span class="cart_value" id="coupon-discount-amount">
                    - <?php echo e(session()->has('coupon_discount')?\App\CPU\Helpers::currency_converter(session('coupon_discount')):0); ?>

                </span>
            </div>
            <?php ($coupon_dis=session('coupon_discount')); ?>
        <?php else: ?>
            <div class="mt-2">
                <form class="needs-validation" method="post" novalidate id="coupon-code-ajax">
                    <div class="form-group">
                        <input class="form-control input_code" type="text" name="code" placeholder="<?php echo e(\App\CPU\translate('Coupon code')); ?>"
                               required>
                        <div class="invalid-feedback"><?php echo e(\App\CPU\translate('please_provide_coupon_code')); ?></div>
                    </div>
                    <button class="btn btn-primary btn-block" type="button" onclick="couponCode()"><?php echo e(\App\CPU\translate('apply_code')); ?>

                    </button>
                </form>
            </div>
            <?php ($coupon_dis=0); ?>
        <?php endif; ?>
        <hr class="mt-2 mb-2">
        <div class="d-flex justify-content-between">
            <span class="cart_title"><?php echo e(\App\CPU\translate('total')); ?></span>
            <span class="cart_value">
               <?php echo e(\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product)); ?>

            </span>
        </div>

        <div class="d-flex justify-content-center">
            <span class="cart_total_value mt-2">
                <?php echo e(\App\CPU\Helpers::currency_converter($sub_total+$total_tax+$total_shipping_cost-$coupon_dis-$total_discount_on_product)); ?>

            </span>
        </div>
    </div>
   
</aside>
<?php /**PATH C:\xampp\htdocs\drdeo\resources\views/web-views/partials/_order-summary.blade.php ENDPATH**/ ?>