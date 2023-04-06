<header class="max-w-xl mx-auto  px-2 text-center">


















    <h1 class=" text-6xl lg:text-5xl Tangerine">
        Made<span  style="color: #3B82F6">IS</span>
    </h1>
    <div>
        <h2 class="pt-2 font-semibold">
            <?php echo e(__('Статті та корисна інформація')); ?>

        </h2>
    </div>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:hidden lg:inline-flex bg-gray-100 rounded-xl">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.art-category-dropdown','data' => []]); ?>
<?php $component->withName('articles.art-category-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
        <div class="relative flex lg:inline-flex   bg-gray-100 rounded-xl px-3 py-1">
            <form method="GET" action="/<?php echo e(app()->getLocale()); ?>/articles">
                <?php if(request('category')): ?>
                    <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                <?php endif; ?>
                    <?php if(request('hashtag')): ?>
                        <input type="hidden" name="hashtag" value="<?php echo e(request('hashtag')); ?>">
                    <?php endif; ?>
                <input type="text"
                       name="search"
                       style="position: relative; top: -4px !important; "
                       placeholder="<?php echo e(__('Пошук')); ?>"
                       class="bg-transparent  items-center placeholder-black font-semibold "
                       value="<?php echo e(request('search')); ?>"
                >
                <input type="image" src="/images/1.png" class="hidden lg:inline-flex rounded-full"  alt="Submit" style="width:28px;
                    position: relative; top: 4px !important;"/>
            </form>
        </div>

    </div>
</header>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/articles/_header-art.blade.php ENDPATH**/ ?>