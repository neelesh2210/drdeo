

<?php $__env->startSection('title', \App\CPU\translate('Language')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('language_setting')); ?></li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="alert alert-danger mb-3" role="alert">
                    <?php echo e(\App\CPU\translate('changing_some_settings_will_take_time_to_show_effect_please_clear_session_or_wait_for_60_minutes_else_browse_from_incognito_mode')); ?>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(\App\CPU\translate('language_table')); ?></h5>
                        <button class="btn btn-primary btn-icon-split float-right" data-toggle="modal"
                                data-target="#lang-modal">
                            <i class="tio-add-circle"></i>
                            <span class="text"><?php echo e(\App\CPU\translate('add_new_language')); ?></span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-hover "
                                   style="width:100%; text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <thead>
                                <tr>
                                    <th scope="col"><?php echo e(\App\CPU\translate('SL#')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('Id')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('name')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('Code')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('status')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('default')); ?> <?php echo e(\App\CPU\translate('status')); ?></th>
                                    <th scope="col" style="width: 100px"
                                        class="text-center"><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php ($language=App\Model\BusinessSetting::where('type','language')->first()); ?>
                                <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($data['id']); ?></td>
                                        <td><?php echo e($data['name']); ?> ( <?php echo e(isset($data['direction'])?$data['direction']:'ltr'); ?>

                                            )
                                        </td>
                                        <td><?php echo e($data['code']); ?></td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox"
                                                       onclick="updateStatus('<?php echo e(route('admin.business-settings.language.update-status')); ?>','<?php echo e($data['code']); ?>')"
                                                       class="status" <?php echo e($data['status']==1?'checked':''); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox"
                                                       onclick="window.location.href ='<?php echo e(route('admin.business-settings.language.update-default-status', ['code'=>$data['code']])); ?>'"
                                                       class="status" <?php echo e(((array_key_exists('default', $data) && $data['default']==true) ? 'checked': ((array_key_exists('default', $data) && $data['default']==false) ? '' : 'disabled'))); ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">

                                            <div class="dropdown float-right">
                                                <button class="btn btn-seconary btn-sm dropdown-toggle"
                                                        type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php if($data['code']!='en'): ?>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                           data-target="#lang-modal-update-<?php echo e($data['code']); ?>"><?php echo e(\App\CPU\translate('update')); ?></a>
                                                        <a class="dropdown-item delete"
                                                           id="<?php echo e(route('admin.business-settings.language.delete',[$data['code']])); ?>"><?php echo e(\App\CPU\translate('Delete')); ?></a>
                                                    <?php endif; ?>
                                                    <a class="dropdown-item"
                                                       href="<?php echo e(route('admin.business-settings.language.translate',[$data['code']])); ?>"><?php echo e(\App\CPU\translate('Translate')); ?></a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="lang-modal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(\App\CPU\translate('new_language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.business-settings.language.add-new')); ?>" method="post"
                          style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="recipient-name"
                                               class="col-form-label"><?php echo e(\App\CPU\translate('language')); ?> </label>
                                        <input type="text" class="form-control" id="recipient-name" name="name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="message-text"
                                               class="col-form-label"><?php echo e(\App\CPU\translate('country_code')); ?></label>
                                        <select class="form-control country-var-select" name="code" style="width: 100%">
                                            <?php $__currentLoopData = \Illuminate\Support\Facades\File::files(base_path('public/assets/front-end/img/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(pathinfo($path)['filename'] !='en'): ?>
                                                    <option value="<?php echo e(pathinfo($path)['filename']); ?>"
                                                            title="<?php echo e(asset('public/assets/front-end/img/flags/'.pathinfo($path)['filename'].'.png')); ?>">
                                                        <?php echo e(strtoupper(pathinfo($path)['filename'])); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(\App\CPU\translate('direction')); ?> :</label>
                                        <select class="form-control" name="direction">
                                            <option value="ltr">LTR</option>
                                            <option value="rtl">RTL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('Add')); ?> <i
                                    class="fa fa-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="lang-modal-update-<?php echo e($data['code']); ?>" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(\App\CPU\translate('new_language')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('admin.business-settings.language.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                   class="col-form-label"><?php echo e(\App\CPU\translate('language')); ?> </label>
                                            <input type="text" class="form-control" value="<?php echo e($data['name']); ?>"
                                                   name="name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="message-text"
                                                   class="col-form-label"><?php echo e(\App\CPU\translate('country_code')); ?></label>
                                            <select class="form-control country-var-select" name="code"
                                                    style="width: 100%">
                                                <?php $__currentLoopData = \Illuminate\Support\Facades\File::files(base_path('public/assets/front-end/img/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(pathinfo($path)['filename'] !='en' && $data['code']==pathinfo($path)['filename']): ?>
                                                        <option value="<?php echo e(pathinfo($path)['filename']); ?>"
                                                                title="<?php echo e(asset('public/assets/front-end/img/flags/'.pathinfo($path)['filename'].'.png')); ?>">
                                                            <?php echo e(strtoupper(pathinfo($path)['filename'])); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><?php echo e(\App\CPU\translate('direction')); ?> :</label>
                                            <select class="form-control" name="direction">
                                                <option
                                                    value="ltr" <?php echo e(isset($data['direction'])?$data['direction']=='ltr'?'selected':'':''); ?>>
                                                    LTR
                                                </option>
                                                <option
                                                    value="rtl" <?php echo e(isset($data['direction'])?$data['direction']=='rtl'?'selected':'':''); ?>>
                                                    RTL
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal"><?php echo e(\App\CPU\translate('close')); ?></button>
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('update')); ?> <i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        function updateStatus(route, code) {
            $.get({
                url: route,
                data: {
                    code: code,
                },
                success: function (data) {
                    console.log(data);
                    // if(data == true) {
                    //     Toastr::success('Language Status Updated Successfully!');
                    //     window.reload();
                    // }else{
                    //     Toastr::error('Language Status Updated Failed!');
                    //     window.reload();
                    // }
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            // color select select2
            $('.country-var-select').select2({
                templateResult: codeSelect,
                templateSelection: codeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function codeSelect(state) {
                var code = state.title;
                if (!code) return state.text;
                return "<img class='image-preview' src='" + code + "'>" + state.text;
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $(".delete").click(function (e) {
                e.preventDefault();

                Swal.fire({
                    title: '<?php echo e(\App\CPU\translate('Are you sure to delete this')); ?>?',
                    text: "<?php echo e(\App\CPU\translate('You will not be able to revert this')); ?>!",
                    showCancelButton: true,
                    confirmButtonColor: 'primary',
                    cancelButtonColor: 'secondary',
                    confirmButtonText: '<?php echo e(\App\CPU\translate('Yes, delete it')); ?>!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = $(this).attr("id");
                    }
                })
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/admin-views/business-settings/language/index.blade.php ENDPATH**/ ?>