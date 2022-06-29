

<?php $__env->startSection('title', \App\CPU\translate('Category')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('category')); ?></li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(\App\CPU\translate('category_form')); ?>

                    </div>
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <form action="<?php echo e(route('admin.category.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>
                            <?php ($default_lang = json_decode($language)[0]); ?>
                            <ul class="nav nav-tabs mb-4">
                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>"
                                           href="#"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                             id="<?php echo e($lang); ?>-form">
                                            <label class="input-label"
                                                   for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('name')); ?>

                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="name[]" class="form-control"
                                                   placeholder="<?php echo e(\App\CPU\translate('New')); ?> <?php echo e(\App\CPU\translate('Category')); ?>" <?php echo e($lang == $default_lang? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <input name="position" value="0" style="display: none">
                                </div>
                                <div class="col-12 col-md-6 from_part_2">
                                    <label><?php echo e(\App\CPU\translate('image')); ?></label><small style="color: red">*
                                        ( <?php echo e(\App\CPU\translate('ratio')); ?> 3:1 )</small>
                                    <div class="custom-file" style="text-align: left">
                                        <input type="file" name="image" id="customFileEg1"
                                               class="custom-file-input"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                               required>
                                        <label class="custom-file-label"
                                               for="customFileEg1"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                    </div>
                                </div>
                                <div class="col-12 from_part_2">
                                    <div class="form-group">
                                        <hr>
                                        <center>
                                            <img
                                                style="width: 30%;border: 1px solid; border-radius: 10px;"
                                                id="viewer"
                                                src="<?php echo e(asset('public/assets/back-end/img/900x400/img1.jpg')); ?>"
                                                alt="image"/>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row flex-between justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-sm-6 col-md-6">
                                <h5><?php echo e(\App\CPU\translate('category_table')); ?> <span style="color: red;">(<?php echo e($categories->total()); ?>)</span></h5>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4" style="width: 30vw">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(\App\CPU\translate('search_here')); ?>" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th style="width: 100px"><?php echo e(\App\CPU\translate('category')); ?> <?php echo e(\App\CPU\translate('ID')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('name')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('slug')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('icon')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('home_status')); ?></th>
                                    <th class="text-center" style="width:15%;"><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($category['id']); ?></td>
                                        <td><?php echo e($category['name']); ?></td>
                                        <td><?php echo e($category['slug']); ?></td>
                                        <td>
                                            <img width="64"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 src="<?php echo e(asset('storage/app/public/category')); ?>/<?php echo e($category['icon']); ?>">
                                        </td>
                                        <td>
                                            <?php if($category->home_status == true): ?>
                                                <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                                     onclick="location.href='<?php echo e(route('admin.category.status',[$category['id'],0])); ?>'">
                                                    <span class="legend-indicator bg-success" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 0;margin-left: .4375rem;' : 'margin-left: 0;margin-right: .4375rem;'); ?>"></span><?php echo e(\App\CPU\translate('active')); ?>

                                                </div>
                                            <?php elseif($category->home_status == false): ?>
                                                <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                                     onclick="location.href='<?php echo e(route('admin.category.status',[$category['id'],1])); ?>'">
                                                    <span class="legend-indicator bg-danger" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 0;margin-left: .4375rem;' : 'margin-left: 0;margin-right: .4375rem;'); ?>"></span><?php echo e(\App\CPU\translate('disabled')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm edit" style="cursor: pointer;"
                                               href="<?php echo e(route('admin.category.edit',[$category['id']])); ?>">
                                                <i class="tio-edit"></i><?php echo e(\App\CPU\translate('Edit')); ?>

                                            </a>
                                            <a class="btn btn-danger btn-sm delete" style="cursor: pointer;"
                                               id="<?php echo e($category['id']); ?>">
                                                <i class="tio-add-to-trash"></i><?php echo e(\App\CPU\translate('Delete')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <?php echo e($categories->links()); ?>

                    </div>
                    <?php if(count($categories)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('no_data_found')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are_you_sure')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You_will_not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes')); ?>, <?php echo e(\App\CPU\translate('delete_it')); ?>!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.category.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(\App\CPU\translate('Category_deleted_Successfully.')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/category/view.blade.php ENDPATH**/ ?>