

<?php $__env->startSection('title',\App\CPU\translate('All Brands Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Brands of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Brands of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">
    <style>
        .brand_div {
            background: #fcfcfc no-repeat padding-box;
            border: 1px solid #e2f0ff;
            border-radius: 3px;
            opacity: 1;
            padding: 5px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <div class="col-md-12 p-3 feature_header">
                <span><?php echo e(\App\CPU\translate('Brands')); ?></span>
            </div>
        </div>
        <div class="row">
            <!-- Content  -->
            <section class="col-lg-12">
                <!-- Products grid-->
                <div class="row mx-n2">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                            <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>" class="">
                                <div class="brand_div d-flex align-items-center justify-content-center"
                                 style="height: 200px">
                                    <img
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset("storage/app/public/brand/$brand->image")); ?>"
                                        alt="<?php echo e($brand->name); ?>">
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <hr class="my-3">
                <div class="row mx-n2">
                    <div class="col-md-12">
                        <center>
                            <?php echo $brands->links(); ?>

                        </center>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/web-views/brands.blade.php ENDPATH**/ ?>