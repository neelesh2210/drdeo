

<?php $__env->startSection('title',\App\CPU\translate('Track Order Result')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="<?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="<?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.css"/>
    <style>
        .order-track {
            height: 400px;
            border: 1px solid rgb(189, 187, 187);
            border-radius: 10px;
        }
       .closet{
            float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
            font-size: 1.5rem;
            font-weight: 300;
            line-height: 1;
            color: #4b566b;
            text-shadow: none;
            opacity: .5;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-md-7 col-lg-6">
                <div class="container py-4 mb-2 mb-md-3">

                    <div class="box-shadow-sm order-track">
                        <div style="margin: 0 auto; padding: 15px;">
                            <h1 style="padding: 20px; text-align: center;"><?php echo e(\App\CPU\translate('track_order')); ?></h1>

                            <form action="<?php echo e(route('track-order.result')); ?>" type="submit" method="post"
                                  style="padding: 15px;">
                                <?php echo csrf_field(); ?>

                                <?php if(session()->has('Error')): ?>
                                    <div class="alert alert-danger alert-block">
                                        <span type="" class="closet " data-dismiss="alert">×</span>
                                        <strong><?php echo e(session()->get('Error')); ?></strong>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <input class="form-control prepended-form-control" type="text" name="order_id"
                                           placeholder="<?php echo e(\App\CPU\translate('order_id')); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control prepended-form-control" type="text" name="phone_number"
                                           placeholder="<?php echo e(\App\CPU\translate('your_phone_number')); ?>" required>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="trackOrder"><?php echo e(\App\CPU\translate('track_order')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js">
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/web-views/order-tracking-page.blade.php ENDPATH**/ ?>