<?php $attributes = $attributes->exceptProps(['category']); ?>
<?php foreach (array_filter((['category']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a href="/<?php echo e(app()->getLocale()); ?>/?category=<?php echo e($category->slug); ?>"
   class="px-3 py-1  rounded-full text-xs text-blue-450 font-semibold"
   style="opacity: 0.8; border: 1px solid rgb(255, 179, 0);"
><?php echo e(Str::limit(__("$category->name"),8)); ?></a>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/category-button.blade.php ENDPATH**/ ?>