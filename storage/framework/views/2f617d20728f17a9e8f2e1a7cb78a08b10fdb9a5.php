

<?php $__env->startSection('title', \App\CPU\translate('Review List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a></li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('reviews')); ?></li>
            </ol>
        </nav>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="flex-between row justify-content-between align-items-center flex-grow-1 mx-1">
                            <div>
                                <div class="flex-start">
                                    <div><h5><?php echo e(\App\CPU\translate('Review')); ?> <?php echo e(\App\CPU\translate('Table')); ?></h5></div>
                                    <div class="mx-1"><h5 style="color: rgb(252, 59, 10);">(<?php echo e($reviews->total()); ?>)</h5></div>
                                </div>
                            </div>
                            <div style="width: 40vw">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(\App\CPU\translate('Search by Product or Customer')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive datatable-custom">
                            <table id="columnSearchDatatable"
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                data-hs-datatables-options='{
                                    "order": [],
                                    "orderCellsTop": true
                                }'>
                                <thead class="thead-light">
                                <tr>
                                    <th>#<?php echo e(\App\CPU\translate('sl')); ?></th>
                                    <th ><?php echo e(\App\CPU\translate('Product')); ?></th>
                                    <th ><?php echo e(\App\CPU\translate('Customer')); ?></th>
                                    <th ><?php echo e(\App\CPU\translate('Review')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Rating')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($review->product): ?>
                                        <tr>
                                            <td><?php echo e($reviews->firstItem()+$key); ?></td>
                                            <td>
                                            <span class="d-block font-size-sm text-body">
                                                <a href="<?php echo e(route('admin.product.view',[$review['product_id']])); ?>">
                                                    <?php echo e($review->product['name']); ?>

                                                </a>
                                            </span>
                                            </td>
                                            <td>
                                                <?php if($review->customer): ?>
                                                    <a href="<?php echo e(route('admin.customer.view',[$review->customer_id])); ?>">
                                                        <?php echo e($review->customer->f_name." ".$review->customer->l_name); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <label class="badge badge-danger"><?php echo e(\App\CPU\translate('customer_removed')); ?></label>
                                                <?php endif; ?>
                                            </td>
                                            <td >
                                                <p>
                                                    <?php echo e($review->comment?Str::limit($review->comment,50):"No Comment Found"); ?>

                                                </p>
                                            </td>
                                            <td>
                                                <label class="badge badge-soft-info">
                                                    <?php echo e($review->rating); ?> <i class="tio-star"></i>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e($reviews->links()); ?>

                    </div>
                    <?php if(count($reviews)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                    <!-- End Table -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            // var datatable = $.HSCore.components.HSDatatables.init($('#columnSearchDatatable'));

            $('#column1_search').on('keyup', function () {
                datatable
                    .columns(1)
                    .search(this.value)
                    .draw();
            });

            $('#column2_search').on('keyup', function () {
                datatable
                    .columns(2)
                    .search(this.value)
                    .draw();
            });

            $('#column3_search').on('change', function () {
                datatable
                    .columns(3)
                    .search(this.value)
                    .draw();
            });

            $('#column4_search').on('keyup', function () {
                datatable
                    .columns(4)
                    .search(this.value)
                    .draw();
            });


            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/reviews/list.blade.php ENDPATH**/ ?>