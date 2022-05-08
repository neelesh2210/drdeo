

<?php $__env->startSection('title', $seller->shop? $seller->shop->name : \App\CPU\translate("Shop Name")); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('Seller_Details')); ?></li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="flex-between d-sm-flex row align-items-center justify-content-between mb-2 mx-1">
            <div>
                <a href="<?php echo e(route('admin.sellers.seller-list')); ?>" class="btn btn-primary mt-3 mb-3"><?php echo e(\App\CPU\translate('Back_to_seller_list')); ?></a>
            </div>
            <div>
                <?php if($seller->status=="pending"): ?>
                    <div class="mt-4 pr-2 float-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                        <div class="flex-start">
                            <h4 class="mx-1"><i class="tio-shop-outlined"></i></h4>
                            <div><h4><?php echo e(\App\CPU\translate('Seller_request_for_open_a_shop.')); ?></h4></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('Approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger"><?php echo e(\App\CPU\translate('reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Page Header -->
    <div class="page-header">
        <div class="flex-between row mx-1">
            <div>
                <h1 class="page-header-title"><?php echo e($seller->shop? $seller->shop->name : "Shop Name : Update Please"); ?></h1>
            </div>
        </div>
        <!-- Nav Scroller -->
        <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <!-- Nav -->
            <ul class="nav nav-tabs page-header-tabs">
                <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(\App\CPU\translate('Shop')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'order'])); ?>"><?php echo e(\App\CPU\translate('Order')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'product'])); ?>"><?php echo e(\App\CPU\translate('Product')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'setting'])); ?>"><?php echo e(\App\CPU\translate('Setting')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'transaction'])); ?>"><?php echo e(\App\CPU\translate('Transaction')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(\App\CPU\translate('Review')); ?></a>
                    </li>

            </ul>
            <!-- End Nav -->
        </div>
        <!-- End Nav Scroller -->
    </div>
        <!-- End Page Header -->
        <div class="card mb-3">
            <div class="card-body">
                <div class=" gx-2 gx-lg-3 mb-2">
                    <div>
                        <h4><i style="font-size: 30px"
                               class="tio-wallet"></i><?php echo e(\App\CPU\translate('seller_wallet')); ?></h4>
                    </div>
                    <div class="row gx-2 gx-lg-3" id="order_stats">
                        <div class="flex-between" style="width: 100%">
                            <div class="mb-3 mb-lg-0" style="width: 18%">
                                <div class="card card-body card-hover-shadow h-100 text-white text-center" style="background-color: #22577A;">
                                    <h1 class="p-2 text-white"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->commission_given)) : 0); ?></h1>
                                    <div class="text-uppercase"><?php echo e(\App\CPU\translate('commission_given')); ?></div>
                                </div>
                            </div>

                            <div class="mb-3 mb-lg-0" style="width: 18%">
                                <div class="card card-body card-hover-shadow h-100 text-white text-center" style="background-color: #595260;">
                                    <h1 class="p-2 text-white"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->pending_withdraw)) : 0); ?></h1>
                                    <div class="text-uppercase"><?php echo e(\App\CPU\translate('pending_withdraw')); ?></div>
                                </div>
                            </div>

                            <div class="mb-3 mb-lg-0" style="width: 18%">
                                <div class="card card-body card-hover-shadow h-100 text-white text-center" style="background-color: #a66f2e;">
                                    <h1 class="p-2 text-white"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->delivery_charge_earned)) : 0); ?></h1>
                                    <div class="text-uppercase"><?php echo e(\App\CPU\translate('delivery_charge_earned')); ?></div>
                                </div>
                            </div>

                            <div class="mb-3 mb-lg-0" style="width: 18%">
                                <div class="card card-body card-hover-shadow h-100 text-white text-center" style="background-color: #6E85B2;">
                                    <h1 class="p-2 text-white"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->collected_cash)) : 0); ?></h1>
                                    <div class="text-uppercase"><?php echo e(\App\CPU\translate('collected_cash')); ?></div>
                                </div>
                            </div>

                            <div class="mb-3 mb-lg-0" style="width: 18%">
                                <div class="card card-body card-hover-shadow h-100 text-white text-center" style="background-color: #6D9886;">
                                    <h1 class="p-2 text-white"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->total_tax_collected)) : 0); ?></h1>
                                    <div class="text-uppercase"><?php echo e(\App\CPU\translate('total_collected_tax')); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 for-card col-md-6 mt-4">
                        <div class="card for-card-body-2 shadow h-100  badge-primary"
                             style="background: #362222!important;">
                            <div class="card-body text-light">
                                <div class="flex-between row no-gutters align-items-center">
                                    <div>
                                        <div class="font-weight-bold text-uppercase for-card-text mb-1">
                                            <?php echo e(\App\CPU\translate('Withdrawable_balance')); ?>

                                        </div>
                                        <div
                                            class="for-card-count"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->total_earning)) : 0); ?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 for-card col-md-6 mt-4" style="cursor: pointer">
                        <div class="card  shadow h-100 for-card-body-3 badge-info"
                             style="background: #171010!important;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div
                                            class=" font-weight-bold for-card-text text-uppercase mb-1"><?php echo e(\App\CPU\translate('withdrawn')); ?></div>
                                        <div
                                            class="for-card-count"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->withdrawn)) : 0); ?></div>
                                    </div>
                                    <div class="col-auto for-margin">
                                        <i class="tio-money-vs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-capitalize">
                        <?php echo e(\App\CPU\translate('Seller')); ?> <?php echo e(\App\CPU\translate('Account')); ?> <br>
                        <?php if($seller->status=='approved'): ?>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="suspended">
                                <button type="submit"
                                        class="btn btn-outline-danger"><?php echo e(\App\CPU\translate('suspend')); ?></button>
                            </form>
                        <?php elseif($seller->status=='rejected' || $seller->status=='suspended'): ?>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn-outline-success"><?php echo e(\App\CPU\translate('activate')); ?></button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <div class="flex-start">
                                <div><h4>Status : </h4></div>
                                <div class="mx-1"><h4><?php echo $seller->status=='approved'?'<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">In-Active</label>'; ?></h4></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('name')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('Email')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->email); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('Phone')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->phone); ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($seller->shop): ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo e(\App\CPU\translate('Shop')); ?> <?php echo e(\App\CPU\translate('info')); ?>

                        </div>
                        <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('seller')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->shop->name); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('Phone')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->shop->contact); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('address')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->shop->address); ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(\App\CPU\translate('bank_info')); ?>

                    </div>
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="col-md-8 mt-2">
                            <div class="flex-start">
                                <div><h4><?php echo e(\App\CPU\translate('bank_name')); ?> : </h4></div>
                                <div class="mx-1"><h4><?php echo e($seller->bank_name ? $seller->bank_name : 'No Data found'); ?></h4></div>
                            </div>
                            <div class="flex-start">
                                <div><h6><?php echo e(\App\CPU\translate('Branch')); ?> : </h6></div>
                                <div class="mx-1"><h6><?php echo e($seller->branch ? $seller->branch : 'No Data found'); ?></h6></div>
                            </div>
                            <div class="flex-start">
                                <div><h6><?php echo e(\App\CPU\translate('holder_name')); ?> : </h6></div>
                                <div class="mx-1"><h6><?php echo e($seller->holder_name ? $seller->holder_name : 'No Data found'); ?></h6></div>
                            </div>
                            <div class="flex-start">
                                <div><h6><?php echo e(\App\CPU\translate('account_no')); ?> : </h6></div>
                                <div class="mx-1"><h6><?php echo e($seller->account_no ? $seller->account_no : 'No Data found'); ?></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/admin-views/seller/view.blade.php ENDPATH**/ ?>