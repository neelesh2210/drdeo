

<?php $__env->startSection('title', \App\CPU\translate('Seller List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('Sellers')); ?></li>
            </ol>
        </nav>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row row justify-content-between align-items-center flex-grow-1 mx-1">
                            <div class="flex-between">
                                <div><h5><?php echo e(\App\CPU\translate('seller_table')); ?></h5></div>
                                <div class="mx-1"><h5 style="color: red;">(<?php echo e($sellers->total()); ?>)</h5></div>
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
                                            placeholder="<?php echo e(\App\CPU\translate('Search by Name or Phone or Email')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo e(\App\CPU\translate('SL#')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('name')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('Phone')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('Email')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('status')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('orders')); ?></th>
                                    <th scope="col"><?php echo e(\App\CPU\translate('Products')); ?></th>
                                    <th scope="col" style="width: 50px"><?php echo e(\App\CPU\translate('action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td scope="col"><?php echo e($sellers->firstItem()+$key); ?></td>
                                        <td scope="col"><?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></td>
                                        <td scope="col"><?php echo e($seller->phone); ?></td>
                                        <td scope="col"><?php echo e($seller->email); ?></td>
                                        <td scope="col">
                                            <?php echo $seller->status=='approved'?'<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">In-Active</label>'; ?>

                                        </td>
                                        <td scope="col">
                                            <a href="<?php echo e(route('admin.sellers.order-list',[$seller['id']])); ?>"
                                               class="btn btn-outline-primary btn-block">
                                                <i class="tio-shopping-cart-outlined"></i>( <?php echo e($seller->orders->count()); ?>

                                                )
                                            </a>
                                        </td>
                                        <td scope="col">
                                            <a href="<?php echo e(route('admin.sellers.product-list',[$seller['id']])); ?>"
                                               class="btn btn-outline-primary btn-block">
                                                <i class="tio-premium-outlined mr-1"></i>( <?php echo e($seller->product->count()); ?>

                                                )
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>">
                                                <?php echo e(\App\CPU\translate('View')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo $sellers->links(); ?>

                    </div>
                    <?php if(count($sellers)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No data to show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/admin-views/seller/index.blade.php ENDPATH**/ ?>