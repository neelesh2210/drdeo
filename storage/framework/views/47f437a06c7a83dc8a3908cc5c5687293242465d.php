<div class="card-header">
    <h4><?php echo e(\App\CPU\translate('Product price & stock')); ?></h4>
    <input name="product_id" value="<?php echo e($product['id']); ?>" style="display: none">
</div>
<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-12 pt-4 sku_combination" id="sku_combination">
                <?php echo $__env->make('admin-views.product.partials._edit_sku_combinations',['combinations'=>json_decode($product['variation'],true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6" id="quantity">
                <label
                    class="control-label"><?php echo e(\App\CPU\translate('total')); ?> <?php echo e(\App\CPU\translate('Quantity')); ?></label>
                <input type="number" min="0" value=<?php echo e($product->current_stock); ?> step="1"
                       placeholder="<?php echo e(\App\CPU\translate('Quantity')); ?>"
                       name="current_stock" class="form-control" required>
            </div>
        </div>
    </div>
    <br>
</div>
<?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/product/partials/_update_stock.blade.php ENDPATH**/ ?>