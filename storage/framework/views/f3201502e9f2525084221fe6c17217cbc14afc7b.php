

<?php $__env->startSection('title', \App\CPU\translate('Product List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">  <!-- Page Heading -->
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-12 mb-2 mb-sm-0">
                    <h1 class="page-header-title text-capitalize"><i
                            class="tio-files"></i> <?php echo e(\App\CPU\translate('stock_limit_products_list')); ?>

                        <span class="badge badge-soft-dark ml-2"><?php echo e($pro->total()); ?></span>
                    </h1>
                    <span><?php echo e(\App\CPU\translate('the_products_are_shown_in_this_list,_which_quantity_is_below')); ?> <?php echo e(\App\Model\BusinessSetting::where(['type'=>'stock_limit'])->first()->value); ?></span>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row flex-between justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-md-12 col-lg-4">
                                <h5>
                                    <?php echo e(\App\CPU\translate('product_table')); ?> (<?php echo e($pro->total()); ?>)
                                </h5>
                            </div>
                            <div class="col-12 mt-1 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(\App\CPU\translate('Search Product Name')); ?>"
                                               aria-label="Search orders"
                                               value="<?php echo e($search); ?>" required>
                                        <input type="hidden" value="<?php echo e($request_status); ?>" name="status">
                                        <button type="submit"
                                                class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                            <div class="col-12 mt-1 col-md-6 col-lg-3">
                                <select name="qty_ordr_sort" class="form-control"
                                        onchange="location.href='<?php echo e(route('admin.product.stock-limit-list',['in_house', ''])); ?>/?sort_oqrderQty='+this.value">
                                    <option
                                        value="default" <?php echo e($sort_oqrderQty== "default"?'selected':''); ?>><?php echo e(\App\CPU\translate('default_sort')); ?></option>
                                    <option
                                        value="quantity_asc" <?php echo e($sort_oqrderQty== "quantity_asc"?'selected':''); ?>><?php echo e(\App\CPU\translate('quantity_sort_by_(low_to_high)')); ?></option>
                                    <option
                                        value="quantity_desc" <?php echo e($sort_oqrderQty== "quantity_desc"?'selected':''); ?>><?php echo e(\App\CPU\translate('quantity_sort_by_(high_to_low)')); ?></option>
                                    <option
                                        value="order_asc" <?php echo e($sort_oqrderQty== "order_asc"?'selected':''); ?>><?php echo e(\App\CPU\translate('order_sort_by_(low_to_high)')); ?></option>
                                    <option
                                        value="order_desc" <?php echo e($sort_oqrderQty== "order_desc"?'selected':''); ?>><?php echo e(\App\CPU\translate('order_sort_by_(high_to_low)')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="datatable"
                                   style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                   style="width: 100%">
                                <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(\App\CPU\translate('SL#')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('Product Name')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('purchase_price')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('selling_price')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('quantity')); ?></th>
                                    <th><?php echo e(\App\CPU\translate('orders')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($pro->firstItem()+$k); ?></th>
                                        <td>
                                            <a href="<?php echo e(route('admin.product.view',[$p['id']])); ?>">
                                                <?php echo e(\Illuminate\Support\Str::limit($p['name'],20)); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['purchase_price']))); ?>

                                        </td>
                                        <td>
                                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['unit_price']))); ?>

                                        </td>
                                        <td>
                                            <?php echo e($p['current_stock']); ?>

                                            <button class="btn btn-sm" id="<?php echo e($p->id); ?>"
                                                    onclick="update_quantity(<?php echo e($p->id); ?>)" type="button"
                                                    data-toggle="modal" data-target="#update-quantity"
                                                    title="<?php echo e(\App\CPU\translate('update_quantity')); ?>">
                                                <i class="tio-add-circle"></i>

                                            </button>
                                        </td>
                                        <td>
                                            <?php echo e($p['order_details_count']); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e($pro->links()); ?>

                    </div>
                    <?php if(count($pro)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                 alt="Image Description" style="width: 7rem;">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No data to show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="update-quantity" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.product.update-quantity')); ?>" method="post" class="row">
                        <?php echo csrf_field(); ?>
                        <div class="card mt-2 rest-part" style="width: 100%"></div>
                        <div class="form-group col-sm-12 card card-footer">
                            <button class="btn btn-primary" class="btn btn-primary" type="submit"><?php echo e(\App\CPU\translate('submit')); ?></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <?php echo e(\App\CPU\translate('close')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function update_quantity(val) {
            $.get({
                url: '<?php echo e(url('/')); ?>/admin/product/get-variations?id='+val,
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                    $('.rest-part').empty().html(data.view);
                },
            });
        }

        function update_qty() {
            var total_qty = 0;
            var qty_elements = $('input[name^="qty_"]');
            for (var i = 0; i < qty_elements.length; i++) {
                total_qty += parseInt(qty_elements.eq(i).val());
            }
            if (qty_elements.length > 0) {

                $('input[name="current_stock"]').attr("readonly", true);
                $('input[name="current_stock"]').val(total_qty);
            } else {
                $('input[name="current_stock"]').attr("readonly", false);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/product/stock-limit-list.blade.php ENDPATH**/ ?>