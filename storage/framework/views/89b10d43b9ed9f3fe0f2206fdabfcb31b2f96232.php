

<?php $__env->startSection('title', \App\CPU\translate('Social Login')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('social_login')); ?></li>
            </ol>
        </nav>

        <?php
        $data = App\Model\BusinessSetting::where(['type' => 'social_login'])->first();
        $socialLoginServices = json_decode($data['value'], true);
        ?>
        <div class="row" style="padding-bottom: 20px">
            <?php if(isset($socialLoginServices)): ?>
            <?php $__currentLoopData = $socialLoginServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLoginService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mt-4">
                        <div class="card">
                            <div class="card-body text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>" style="padding: 20px">
                                <div class="flex-between">
                                    <h4 class="text-center"><?php echo e(\App\CPU\translate(''.$socialLoginService['login_medium'])); ?></h4>
                                    <div class="btn btn-dark p-2" data-toggle="modal" data-target="#<?php echo e($socialLoginService['login_medium']); ?>-modal" style="cursor: pointer">
                                        <i class="tio-info-outined"></i> <?php echo e(\App\CPU\translate('Credentials SetUp')); ?>

                                    </div>
                                </div>
                                <form
                                    action="<?php echo e(route('admin.social-login.update',[$socialLoginService['login_medium']])); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-2 mt-5">
                                        <input type="radio" name="status"
                                               value="1" <?php echo e($socialLoginService['status']==1?'checked':''); ?>>
                                        <label style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10px"><?php echo e(\App\CPU\translate('Active')); ?></label>
                                        <br>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="radio" name="status"
                                               value="0" <?php echo e($socialLoginService['status']==0?'checked':''); ?>>
                                        <label style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10px"><?php echo e(\App\CPU\translate('Inactive')); ?></label>
                                        <br>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10px"><?php echo e(\App\CPU\translate('Callback_URI')); ?></label>
                                        <span class="btn btn-secondary btn-sm m-2" onclick="copyToClipboard('#id_<?php echo e($socialLoginService['login_medium']); ?>')"><i class="tio-copy"></i> <?php echo e(\App\CPU\translate('Copy URI')); ?></span>
                                        <br>
                                        <span class="form-control" id="id_<?php echo e($socialLoginService['login_medium']); ?>" style="height: unset"><?php echo e(url('/')); ?>/customer/auth/login/<?php echo e($socialLoginService['login_medium']); ?>/callback</span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label
                                            style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10px"><?php echo e(\App\CPU\translate('Store')); ?> <?php echo e(\App\CPU\translate('client_id')); ?> </label><br>
                                        <input type="text" class="form-control" name="client_id"
                                               value="<?php echo e($socialLoginService['client_id']); ?>">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label
                                            style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10px"><?php echo e(\App\CPU\translate('Store')); ?> <?php echo e(\App\CPU\translate('client_secret')); ?></label><br>
                                        <input type="text" class="form-control" name="client_secret"
                                               value="<?php echo e($socialLoginService['client_secret']); ?>">
                                    </div>
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            class="btn btn-primary mb-2"><?php echo e(\App\CPU\translate('save')); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        
        <!-- Google -->
        <div class="modal fade" id="google-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(\App\CPU\translate('Google API Set up Instructions')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li><?php echo e(\App\CPU\translate('Go to the Credentials page')); ?> (<?php echo e(\App\CPU\translate('Click')); ?> <a href="https://console.cloud.google.com/apis/credentials" target="_blank"><?php echo e(\App\CPU\translate('here')); ?></a>)</li>
                            <li><?php echo e(\App\CPU\translate('Click')); ?> <b>Create credentials</b> > <b>OAuth client ID</b>.</li>
                            <li><?php echo e(\App\CPU\translate('Select the')); ?> <b>Web application</b> <?php echo e(\App\CPU\translate('type')); ?>.</li>
                            <li><?php echo e(\App\CPU\translate('Name your OAuth 2.0 client')); ?></li>
                            <li><?php echo e(\App\CPU\translate('Click')); ?> <b>ADD URI</b> <?php echo e(\App\CPU\translate('from')); ?> <b>Authorized redirect URIs</b> , <?php echo e(\App\CPU\translate('provide the')); ?> <code>Callback URI</code> <?php echo e(\App\CPU\translate('from below and click')); ?> <b>Create</b></li>
                            <li><?php echo e(\App\CPU\translate('Copy')); ?> <b>Client ID</b> <?php echo e(\App\CPU\translate('and')); ?> <b>Client Secret</b>, <?php echo e(\App\CPU\translate('paste in the input filed below and')); ?> <b>Save</b>.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facebook -->
        <div class="modal fade" id="facebook-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(\App\CPU\translate('Facebook API Set up Instructions')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><b></b>
                        <ol>
                            <li><?php echo e(\App\CPU\translate('Go to the facebook developer page')); ?> (<a href="https://developers.facebook.com/apps/" target="_blank"><?php echo e(\App\CPU\translate('Click Here')); ?></a>)</li>
                            <li><?php echo e(\App\CPU\translate('Go to')); ?> <b>Get Started</b> <?php echo e(\App\CPU\translate('from Navbar')); ?></li>
                            <li><?php echo e(\App\CPU\translate('From Register tab press')); ?> <b>Continue</b> <small>(<?php echo e(\App\CPU\translate('If needed')); ?>)</small></li>
                            <li><?php echo e(\App\CPU\translate('Provide Primary Email and press')); ?> <b>Confirm Email</b> <small>(<?php echo e(\App\CPU\translate('If needed')); ?>)</small></li>
                            <li><?php echo e(\App\CPU\translate('In about section select')); ?> <b>Other</b> <?php echo e(\App\CPU\translate('and press')); ?> <b>Complete Registration</b></li>

                            <li><b>Create App</b> > <?php echo e(\App\CPU\translate('Select an app type and press')); ?> <b>Next</b></li>
                            <li><?php echo e(\App\CPU\translate('Complete the add details form and press')); ?> <b>Create App</b></li><br/>

                            <li><?php echo e(\App\CPU\translate('From')); ?> <b>Facebook Login</b> <?php echo e(\App\CPU\translate('press')); ?> <b>Set Up</b></li>
                            <li><?php echo e(\App\CPU\translate('Select')); ?> <b>Web</b></li>
                            <li><?php echo e(\App\CPU\translate('Provide')); ?> <b>Site URL</b> <small>(Base URL of the site ex: https://example.com)</small> > <b>Save</b></li><br/>
                            <li><?php echo e(\App\CPU\translate('Now go to')); ?> <b>Setting</b> <?php echo e(\App\CPU\translate('from')); ?> <b>Facebook Login</b> (<?php echo e(\App\CPU\translate('left sidebar')); ?>)</li>
                            <li><?php echo e(\App\CPU\translate('Make sure to check')); ?> <b>Client OAuth Login</b> <small>(<?php echo e(\App\CPU\translate('must on')); ?>)</small></li>
                            <li><?php echo e(\App\CPU\translate('Provide')); ?> <code>Valid OAuth Redirect URIs</code> <?php echo e(\App\CPU\translate('from below and click')); ?> <b>Save Changes</b></li>

                            <li><?php echo e(\App\CPU\translate('Now go to')); ?> <b>Setting</b> (<?php echo e(\App\CPU\translate('from left sidebar')); ?>) > <b>Basic</b></li>
                            <li><?php echo e(\App\CPU\translate('Fill the form and press')); ?> <b>Save Changes</b></li>
                            <li><?php echo e(\App\CPU\translate('Now, copy')); ?> <b>Client ID</b> & <b>Client Secret</b>, <?php echo e(\App\CPU\translate('paste in the input filed below and')); ?> <b>Save</b>.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Twitter -->
        <div class="modal fade" id="twitter-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(\App\CPU\translate('Twitter API Set up Instructions')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><b></b>
                        <?php echo e(\App\CPU\translate('Instruction will be available very soon')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();

            toastr.success("<?php echo e(\App\CPU\translate('Copied to the clipboard')); ?>");
        }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/business-settings/social-login/view.blade.php ENDPATH**/ ?>