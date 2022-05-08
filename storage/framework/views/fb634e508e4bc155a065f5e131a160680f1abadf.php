<?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>

<div class="product-card card <?php echo e($product['current_stock']==0?'stock-card':''); ?>"
     style="margin-bottom: 40px;display: flex; align-items: center; justify-content: center;">
    <?php if($product['current_stock']<=0): ?>
        <label style="left: 29%!important; top: 29%!important;"
               class="badge badge-danger stock-out"><?php echo e(\App\CPU\translate('stock_out')); ?></label>
    <?php endif; ?>

    <div class="card-header inline_product clickable" style="cursor: pointer;max-height: 193px;min-height: 193px">
        <?php if($product->discount > 0): ?>
            <div class="d-flex" style="right: 0;top:0;position: absolute">
                    <span class="for-discoutn-value pr-1 pl-1">
                    <?php if($product->discount_type == 'percent'): ?>
                            <?php echo e(round($product->discount,2)); ?>%
                        <?php elseif($product->discount_type =='flat'): ?>
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                        <?php endif; ?>
                        <?php echo e(\App\CPU\translate('off')); ?>

                    </span>
            </div>
        <?php else: ?>
            <div class="d-flex justify-content-end for-dicount-div-null">
                <span class="for-discoutn-value-null"></span>
            </div>
        <?php endif; ?>
        <div class="d-flex d-block center-div element-center" style="cursor: pointer">
            <a href="<?php echo e(route('product',$product->slug)); ?>">
                <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                     style="width: 100%;max-height: 120px!important;">
            </a>
        </div>
    </div>

    <div class="card-body inline_product text-center p-1 clickable"
         style="cursor: pointer; max-height:6.5rem;">
        <div class="rating-show">
            <span class="d-inline-block font-size-sm text-body">
                <?php for($inc=0;$inc<5;$inc++): ?>
                    <?php if($inc<$overallRating[0]): ?>
                        <i class="sr-star czi-star-filled active"></i>
                    <?php else: ?>
                        <i class="sr-star czi-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
                <label class="badge-style">( <?php echo e($product->reviews_count); ?> )</label>
            </span>
        </div>
        <div style="position: relative;" class="product-title1">
            <a href="<?php echo e(route('product',$product->slug)); ?>">
                <?php echo e(Str::limit($product['name'], 25)); ?>

            </a>
        </div>
        <div class="justify-content-between text-center">
            <div class="product-price text-center">
                <?php if($product->discount > 0): ?>
                    <strike style="font-size: 12px!important;color: grey!important;">
                        <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                    </strike><br>
                <?php endif; ?>
                <span class="text-accent">
                    <?php echo e(\App\CPU\Helpers::currency_converter(
                        $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                    )); ?>

                </span>
            </div>
        </div>
    </div>

    <div class="card-body card-body-hidden" style="padding-bottom: 5px!important;">
        <div class="text-center">
            <?php if(Request::is('product/*')): ?>
                <a class="btn btn-primary btn-sm btn-block mb-2" href="<?php echo e(route('product',$product->slug)); ?>">
                    <i class="czi-forward align-middle <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                    <?php echo e(\App\CPU\translate('View')); ?>

                </a>
            <?php else: ?>
                <a class="btn btn-primary btn-sm btn-block mb-2" href="javascript:"
                   onclick="quickView('<?php echo e($product->id); ?>')">
                    <i class="czi-eye align-middle <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i>
                    <?php echo e(\App\CPU\translate('Quick')); ?>   <?php echo e(\App\CPU\translate('View')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/drdeo/web/drdeo.co.in/public_html/resources/views/web-views/partials/_single-product.blade.php ENDPATH**/ ?>