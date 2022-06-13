
<?php $__env->startSection('title', \App\CPU\translate('Banner')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('Banner')); ?></li>
            </ol>
        </nav>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12" id="banner-btn">
                <button id="main-banner-add" class="btn btn-primary"><i
                        class="tio-add-circle"></i> <?php echo e(\App\CPU\translate('add_banner')); ?></button>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row pt-4" id="main-banner"
             style="display: none;text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(\App\CPU\translate('banner_form')); ?>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.banner.store')); ?>" method="post" enctype="multipart/form-data"
                              class="banner_form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id">
                                            <label for="name"><?php echo e(\App\CPU\translate('banner_url')); ?></label>
                                            <input type="text" name="url" class="form-control" id="url" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><?php echo e(\App\CPU\translate('banner_type')); ?></label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="banner_type" required>
                                                <option value="Main Banner">Main Banner</option>
                                                <option value="Footer Banner">Footer Banner</option>
                                                <option value="Popup Banner">Popup Banner</option>
                                                <option value="Secondary Banner">Secondary Banner</option>
                                                <option value="Side Banner">Side Banner</option>
                                                <option value="Product Banner">Product Banner</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="resource_id"><?php echo e(\App\CPU\translate('resource_type')); ?></label>
                                            <select style="width: 100%" onchange="display_data(this.value)"
                                                    class="js-example-responsive form-control"
                                                    name="resource_type" required>
                                                <option value="product">Product</option>
                                                <option value="category">Category</option>
                                                <option value="shop">Shop</option>
                                                <option value="brand">Brand</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-product">
                                            <label for="product_id"><?php echo e(\App\CPU\translate('product')); ?></label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="product_id">
                                                <?php $__currentLoopData = \App\Model\Product::active()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($product['id']); ?>"><?php echo e($product['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-category" style="display: none">
                                            <label for="name"><?php echo e(\App\CPU\translate('category')); ?></label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="category_id">
                                                <?php $__currentLoopData = \App\CPU\CategoryManager::parents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-shop" style="display: none">
                                            <label for="shop_id"><?php echo e(\App\CPU\translate('shop')); ?></label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="shop_id">
                                                <?php $__currentLoopData = \App\Model\Shop::active()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($shop['id']); ?>"><?php echo e($shop['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group" id="resource-brand" style="display: none">
                                            <label for="brand_id"><?php echo e(\App\CPU\translate('brand')); ?></label>
                                            <select style="width: 100%"
                                                    class="js-example-responsive form-control"
                                                    name="brand_id">
                                                <?php $__currentLoopData = \App\Model\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($brand['id']); ?>"><?php echo e($brand['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <label for="name"><?php echo e(\App\CPU\translate('Image')); ?></label><span
                                            class="badge badge-soft-danger">( <?php echo e(\App\CPU\translate('ratio')); ?> 4:1 )</span>
                                        <br>
                                        <div class="custom-file" style="text-align: left">
                                            <input type="file" name="image" id="mbimageFileUploader"
                                                   class="custom-file-input"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label"
                                                   for="mbimageFileUploader"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <center>
                                            <img
                                                style="width: auto;border: 1px solid; border-radius: 10px; max-width:400px;"
                                                id="mbImageviewer"
                                                src="<?php echo e(asset('public\assets\back-end\img\400x400\img1.jpg')); ?>"
                                                alt="banner image"/>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a class="btn btn-secondary text-white cancel"><?php echo e(\App\CPU\translate('Cancel')); ?></a>
                                <button id="add" type="submit"
                                        class="btn btn-primary"><?php echo e(\App\CPU\translate('save')); ?></button>
                                <a id="update" class="btn btn-primary"
                                   style="display: none; color: #fff;"><?php echo e(\App\CPU\translate('update')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px" id="banner-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="flex-between row justify-content-between align-items-center flex-grow-1 mx-1">
                            <div class="flex-between">
                                <div><h5><?php echo e(\App\CPU\translate('banner_table')); ?></h5></div>
                                <div class="mx-1"><h5 style="color: red;">(<?php echo e($banners->total()); ?>)</h5></div>
                            </div>
                            <div style="width: 30vw">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('Search_by_Banner_Type')); ?>"
                                               aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                        <button type="submit"
                                                class="btn btn-primary"><?php echo e(\App\CPU\translate('Search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="columnSearchDatatable"
                                   style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                   class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('sl')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('image')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('banner_type')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('published')); ?></th>
                                    <th style="width: 50px"><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>

                                    <tr>
                                        <th scope="row"><?php echo e($banners->firstItem()+$key); ?></th>
                                        <td>
                                            <img width="80"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 src="<?php echo e(asset('storage/app/public/banner')); ?>/<?php echo e($banner['photo']); ?>">
                                        </td>
                                        <td><?php echo e($banner->banner_type); ?></td>
                                        <td><label class="switch"><input type="checkbox" class="status"
                                                                         id="<?php echo e($banner->id); ?>" <?php if ($banner->published == 1) echo "checked" ?>><span
                                                    class="slider round"></span></label></td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.banner.edit',[$banner['id']])); ?>" style="cursor: pointer;"> <?php echo e(\App\CPU\translate('Edit')); ?></a>
                                                    <a class="dropdown-item delete" style="cursor: pointer;"
                                                       id="<?php echo e($banner['id']); ?>"> <?php echo e(\App\CPU\translate('Delete')); ?></a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e($banners->links()); ?>

                    </div>
                    <?php if(count($banners)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                 alt="Image Description" style="width: 7rem;">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            // dir: "rtl",
            width: 'resolve'
        });

        function display_data(data) {

            $('#resource-product').hide()
            $('#resource-brand').hide()
            $('#resource-category').hide()
            $('#resource-shop').hide()

            if (data === 'product') {
                $('#resource-product').show()
            } else if (data === 'brand') {
                $('#resource-brand').show()
            } else if (data === 'category') {
                $('#resource-category').show()
            } else if (data === 'shop') {
                $('#resource-shop').show()
            }
        }
    </script>
    <script>
        function mbimagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#mbImageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#mbimageFileUploader").change(function () {
            mbimagereadURL(this);
        });

        function fbimagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#fbImageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fbimageFileUploader").change(function () {
            fbimagereadURL(this);
        });

        function pbimagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pbImageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#pbimageFileUploader").change(function () {
            pbimagereadURL(this);
        });

    </script>
    <script>
        $('#main-banner-add').on('click', function () {
            $('#main-banner').show();
        });

        $('.cancel').on('click', function () {
            $('.banner_form').attr('action', "<?php echo e(route('admin.banner.store')); ?>");
            $('#main-banner').hide();
        });

        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.banner.status')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (data) {
                    if (data == 1) {
                        toastr.success('<?php echo e(\App\CPU\translate('Banner_published_successfully')); ?>');
                    } else {
                        toastr.success('<?php echo e(\App\CPU\translate('Banner_unpublished_successfully')); ?>');
                    }
                }
            });
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: "<?php echo e(\App\CPU\translate('Are_you_sure_delete_this_banner')); ?>?",
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
                        url: "<?php echo e(route('admin.banner.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(\App\CPU\translate('Banner_deleted_successfully')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
    <!-- Page level plugins -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/banner/view.blade.php ENDPATH**/ ?>