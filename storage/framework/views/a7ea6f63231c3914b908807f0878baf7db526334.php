<?php $attributes = $attributes->exceptProps(['comment']); ?>
<?php foreach (array_filter((['comment']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.panel','data' => ['class' => 'bg-gray-50']]); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-gray-50']); ?>
    <article class="flex space-x-4">




        <div>
            <header class="mb-4">
                <h5 class="font-bold"><?php echo e($comment->name); ?></h5>

                <p >
                    <?php echo e(__("Прокоментовано:")); ?>

                    <time><?php echo e($comment->created_at->format("d-m-Y H:i:s")); ?></time>
                </p>
            </header>

            <p>
                <?php echo e($comment->body); ?>

            </p>
        </div>
    </article>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/product-comment.blade.php ENDPATH**/ ?>