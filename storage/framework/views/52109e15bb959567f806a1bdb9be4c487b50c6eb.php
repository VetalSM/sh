<?php $attributes = $attributes->exceptProps(['active' => false]); ?>
<?php foreach (array_filter((['active' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $classes = 'block text-left px-1 text-base lg:text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';

    if ($active) $classes .= ' bg-blue-500 text-white';
?>

<a <?php echo e($attributes(['class' => $classes])); ?>

><?php echo e($slot); ?></a>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/dropdown-item.blade.php ENDPATH**/ ?>