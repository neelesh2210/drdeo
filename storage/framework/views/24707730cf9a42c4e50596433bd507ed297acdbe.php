

<?php $__env->startSection('title', \App\CPU\translate('Reset Password')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .text-primary{
            color: <?php echo e($web_config['primary_color']); ?> !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2 class="h3 mb-4"><?php echo e(\App\CPU\translate('Reset your password')); ?></h2>
                <p class="font-size-md"><?php echo e(\App\CPU\translate('Change your password in two easy steps. This helps to keep your new password secure')); ?>.</p>
                <ol class="list-unstyled font-size-md">
                    <li><span class="text-primary mr-2"><?php echo e(\App\CPU\translate('1')); ?>.</span><?php echo e(\App\CPU\translate('New Password')); ?>.</li>
                    <li><span class="text-primary mr-2"><?php echo e(\App\CPU\translate('2')); ?>.</span><?php echo e(\App\CPU\translate('Confirm Password')); ?>.</li>
                </ol>
                <div class="card py-2 mt-4">
                    <form class="card-body needs-validation" novalidate method="POST"
                          action="<?php echo e(request('customer.auth.password-recovery')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group" style="display: none">
                            <input type="text" name="reset_token" value="<?php echo e($token); ?>" required>
                        </div>

                        <div class="form-group">
                                <label for="si-password"><?php echo e(\App\CPU\translate('New')); ?><?php echo e(\App\CPU\translate('password')); ?></label>
                                <div class="password-toggle">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                           required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only"><?php echo e(\App\CPU\translate('Show')); ?> <?php echo e(\App\CPU\translate('password')); ?> </span>
                                    </label>
                                    <div class="invalid-feedback"><?php echo e(\App\CPU\translate('Please provide valid password')); ?>.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="si-password"><?php echo e(\App\CPU\translate('confirm_password')); ?></label>
                                <div class="password-toggle">
                                    <input class="form-control" name="confirm_password" type="password" id="si-password"
                                           required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="czi-eye password-toggle-indicator"></i><span
                                            class="sr-only"><?php echo e(\App\CPU\translate('Show')); ?> <?php echo e(\App\CPU\translate('password')); ?> </span>
                                    </label>
                                    <div class="invalid-feedback"><?php echo e(\App\CPU\translate('Please provide valid password')); ?>.</div>
                                </div>
                            </div>

                        <button class="btn btn-primary" type="submit"><?php echo e(\App\CPU\translate('Reset password')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/customer-view/auth/reset-password.blade.php ENDPATH**/ ?>