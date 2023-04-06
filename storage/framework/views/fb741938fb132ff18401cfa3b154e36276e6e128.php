<?php $attributes = $attributes->exceptProps(['product']); ?>
<?php foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($product->status=== '2'): ?>
   <div class=" text-center bd_item ">
       <span class="  bd_item_new"><?php echo e(__('Новинка!!!')); ?></span>
        <img  src="<?php echo e(asset('storage/' . $product->thumbnail)); ?>" loading="lazy"
             alt="<?php echo e($product->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
        </div>
<?php elseif($product->status==="1"): ?>
                <div class=" text-center bd_item ">
                    <span class="  bd_item_Promotion"><?php echo e(__('Акція!!!')); ?></span>
                    <img  src="<?php echo e(asset('storage/' . $product->thumbnail)); ?>" loading="lazy"
                         alt="<?php echo e($product->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                    </div>
<?php elseif($product->status==="7"): ?>
    <div class=" text-center ">

        <img  src="<?php echo e(asset('storage/' . $product->thumbnail)); ?>" loading="lazy"
             alt="<?php echo e($product->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

<?php elseif($product->status==="3"): ?>
    <div class=" text-center ">

        <img   src="<?php echo e(asset('storage/' . $product->thumbnail)); ?>" loading="lazy"
             alt="<?php echo e($product->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

<?php elseif($product->status==="6"): ?>
    <div class=" text-center ">

        <img src="<?php echo e(asset('storage/' . $product->thumbnail)); ?>" loading="lazy"
             alt="<?php echo e($product->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
    </div>

<?php else: ?>
                            <div class=" text-center ">

                                <img  src="<?php echo e(asset('storage/' . $product->thumbnail)); ?>" loading="lazy"
                                     alt="<?php echo e($product->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
                                </div>

<?php endif; ?>



<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/status-product.blade.php ENDPATH**/ ?>