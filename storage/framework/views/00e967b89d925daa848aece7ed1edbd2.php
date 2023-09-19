<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['category']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['category']); ?>
<?php foreach (array_filter((['category']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<a href="/<?php echo e(app()->getLocale()); ?>/articles/?category=<?php echo e($category->slug); ?>"
   class=" transition-colors  text-sm duration-300 px-3 py-1
   font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
   style="opacity: 0.8;  rgb(121, 227, 27);"
><?php echo e(Str::limit(__("$category->name"),8)); ?></a>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/articles/category-art-button.blade.php ENDPATH**/ ?>