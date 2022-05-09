

<?php $__env->startSection('title', \App\CPU\translate('reCaptcha Setup')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(\App\CPU\translate('reCaptcha')); ?> <?php echo e(\App\CPU\translate('credentials')); ?> <?php echo e(\App\CPU\translate('setup')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <div class="flex-between">
                            <h3><?php echo e(\App\CPU\translate('reCaptcha')); ?></h3>
                            <div class="btn-sm btn-dark p-2" data-toggle="modal" data-target="#recaptcha-modal"
                                 style="cursor: pointer">
                                <i class="tio-info-outined"></i> <?php echo e(\App\CPU\translate('Credentials SetUp')); ?>

                            </div>
                        </div>
                        <div class="mt-4">
                            <?php ($config=\App\CPU\Helpers::get_business_settings('recaptcha')); ?>
                            <form
                                action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.recaptcha_update',['recaptcha']):'javascript:'); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>

                                <div class="form-group mb-2 mt-2">
                                    <input type="radio" name="status"
                                           value="1" <?php echo e(isset($config) && $config['status']==1?'checked':''); ?>>
                                    <label style="padding-left: 10px"><?php echo e(\App\CPU\translate('active')); ?></label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="radio" name="status"
                                           value="0" <?php echo e(isset($config) && $config['status']==0?'checked':''); ?>>
                                    <label
                                        style="padding-left: 10px"><?php echo e(\App\CPU\translate('inactive')); ?> </label>
                                    <br>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                           style="padding-left: 10px"><?php echo e(\App\CPU\translate('Site Key')); ?></label><br>
                                    <input type="text" class="form-control" name="site_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['site_key']??"":''); ?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label class="text-capitalize"
                                           style="padding-left: 10px"><?php echo e(\App\CPU\translate('Secret Key')); ?></label><br>
                                    <input type="text" class="form-control" name="secret_key"
                                           value="<?php echo e(env('APP_MODE')!='demo'?$config['secret_key']??"":''); ?>">
                                </div>

                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn-primary mb-2"><?php echo e(\App\CPU\translate('save')); ?></button>
                            </form>
                            
                            <div class="modal fade" id="recaptcha-modal" data-backdrop="static" data-keyboard="false"
                                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content"
                                         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="staticBackdropLabel"><?php echo e(\App\CPU\translate('reCaptcha credential Set up Instructions')); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ol>
                                                <li><?php echo e(\App\CPU\translate('Go to the Credentials page')); ?>

                                                    (<?php echo e(\App\CPU\translate('Click')); ?> <a
                                                        href="https://www.google.com/recaptcha/admin/create"
                                                        target="_blank"><?php echo e(\App\CPU\translate('here')); ?></a>)
                                                </li>
                                                <li><?php echo e(\App\CPU\translate('Add a ')); ?>

                                                    <b><?php echo e(\App\CPU\translate('label')); ?></b> <?php echo e(\App\CPU\translate('(Ex: Test Label)')); ?>

                                                </li>
                                                <li>
                                                    <?php echo e(\App\CPU\translate('Select reCAPTCHA v2 as ')); ?>

                                                    <b><?php echo e(\App\CPU\translate('reCAPTCHA Type')); ?></b>
                                                    (<?php echo e(\App\CPU\translate("Sub type: I'm not a robot Checkbox")); ?>

                                                    )
                                                </li>
                                                <li>
                                                    <?php echo e(\App\CPU\translate('Add')); ?>

                                                    <b><?php echo e(\App\CPU\translate('domain')); ?></b>
                                                    <?php echo e(\App\CPU\translate('(For ex: demo.6amtech.com)')); ?>

                                                </li>
                                                <li>
                                                    <?php echo e(\App\CPU\translate('Check in ')); ?>

                                                    <b><?php echo e(\App\CPU\translate('Accept the reCAPTCHA Terms of Service')); ?></b>
                                                </li>
                                                <li>
                                                    <?php echo e(\App\CPU\translate('Press')); ?>

                                                    <b><?php echo e(\App\CPU\translate('Submit')); ?></b>
                                                </li>
                                                <li><?php echo e(\App\CPU\translate('Copy')); ?> <b>Site
                                                        Key</b> <?php echo e(\App\CPU\translate('and')); ?> <b>Secret
                                                        Key</b>, <?php echo e(\App\CPU\translate('paste in the input filed below and')); ?>

                                                    <b>Save</b>.
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/business-settings/recaptcha-index.blade.php ENDPATH**/ ?>