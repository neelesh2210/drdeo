<?php if(count($combinations) > 0): ?>
<table class="table table-bordered">
    <thead>
    <tr>
        <td class="text-center">
            <label for="" class="control-label"><?php echo e(\App\CPU\translate('Variant')); ?></label>
        </td>
        <td class="text-center">
            <label for="" class="control-label"><?php echo e(\App\CPU\translate('Variant Price')); ?></label>
        </td>
        <td class="text-center">
            <label for="" class="control-label"><?php echo e(\App\CPU\translate('SKU')); ?></label>
        </td>
        <td class="text-center">
            <label for="" class="control-label"><?php echo e(\App\CPU\translate('Quantity')); ?></label>
        </td>
    </tr>
    </thead>
    <tbody>
    <?php endif; ?>
    <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <label for="" class="control-label"><?php echo e($combination['type']); ?></label>
                <input value="<?php echo e($combination['type']); ?>" name="type[]" style="display: none">
            </td>
            <td>
                <input type="number" name="price_<?php echo e($combination['type']); ?>"
                       value="<?php echo e(\App\CPU\Convert::default($combination['price'])); ?>" min="0"
                       step="0.01"
                       class="form-control" required>
            </td>
            <td>
                <input type="text" name="sku_<?php echo e($combination['type']); ?>" value="<?php echo e($combination['sku']); ?>"
                       class="form-control" required>
            </td>
            <td>
                <input type="number" onkeyup="update_qty()" name="qty_<?php echo e($combination['type']); ?>" value="<?php echo e($combination['qty']); ?>" min="1" max="100000" step="1"
                       class="form-control"
                       required>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/admin-views/product/partials/_edit_sku_combinations.blade.php ENDPATH**/ ?>