<?php $attributes = $attributes->exceptProps(['articles']); ?>
<?php foreach (array_filter((['articles']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>




<?php if($articles->count() >= 0): ?>
    <div class="lg:grid lg:grid-cols-6">
        <?php $__currentLoopData = $articles->skip(0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($article->status != "8"): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.article-card','data' => ['article' => $article,'class' => ''.e($loop->iteration < 3 ? 'col-span-2' : 'col-span-2').'']]); ?>
<?php $component->withName('articles.article-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['article' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($article),'class' => ''.e($loop->iteration < 3 ? 'col-span-2' : 'col-span-2').'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if(auth()->guard()->check()): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.article-card','data' => ['article' => $article,'class' => ''.e($loop->iteration < 3 ? 'col-span-2' : 'col-span-2').'']]); ?>
<?php $component->withName('articles.article-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['article' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($article),'class' => ''.e($loop->iteration < 3 ? 'col-span-2' : 'col-span-2').'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/articles/articles-grid.blade.php ENDPATH**/ ?>