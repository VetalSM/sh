<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.layout-art','data' => []]); ?>
<?php $component->withName('articles.layout-art'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

    <?php echo $__env->make('components.articles._header-art', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="max-w-7xl mx-auto mt-5 lg:mt-20 space-y-6">
<div>
        <div class=" hidden lg:inline px-2" style="float: right; margin-top: 0px;">
            <div class=" py-4 px-4 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <h3><?php echo e(__('Категорії:')); ?></h3>
                <ul>
<?php $__currentLoopData = \App\Models\ArtCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li>  <a class="font-semibold text-black" href="/<?php echo e(app()->getLocale()); ?>/articles/?category=<?php echo e($category->slug); ?>&<?php echo e(http_build_query(request()->except('category', 'page'))); ?>"  >
                            <?php echo e(__(ucwords($category->name))); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <li><a class="font-semibold text-black" href="/<?php echo e(app()->getLocale()); ?>/calculator"><?php echo e(__('Калькулятори')); ?></a></li>
                </ul>
            </div>
            <div class=" py-4 px-4 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <h3><?php echo e(__('Хештеги:')); ?></h3>
                <ul>

                   <?php $__currentLoopData = \App\Models\Hashtag::withCount('articles')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hashtag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>  <a href="/<?php echo e(app()->getLocale()); ?>/articles/?hashtag=<?php echo e($hashtag->name); ?>&
                        <?php echo e(http_build_query(request()->except('hashtag', 'page'))); ?>"  >
                           <?php if(App::currentLocale()==='ua'): ?>
                                    #<?php echo e(__(ucwords($hashtag->name))); ?>

                        <?php else: ?>
                                    #<?php echo e(__(ucwords($hashtag->name_ru))); ?>


                           <?php endif; ?>
                        </a>    (<?php echo e($hashtag->articles_count); ?>)
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>


        <?php if($articles->count()): ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.articles-grid','data' => ['articles' => $articles]]); ?>
<?php $component->withName('articles.articles-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['articles' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($articles)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php echo e($articles->links()); ?>

        <?php else: ?>
            <p class="text-center"><?php echo e(__("В даній категорії наразі немає товарів. Але трохи пізніше вони обов'язково з'являться:))")); ?></p>
        <?php endif; ?>
</div>
    </main>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/articles/index.blade.php ENDPATH**/ ?>