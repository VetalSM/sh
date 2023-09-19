
<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php echo $__env->make('products._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class=" d-flex justify-content-center ">
        <div class="  hidden lg:inline-flex py-1 mt-4">
        <p class="inline"><?php echo e(__('Категорії:')); ?></p>
        <div class=" px-2  inline rounded-full"  style=" position: relative;" >
            <div class="lg:px-1  inline text-black rounded-full" >
                <a class="lg:px-2  inline text-black rounded-full" style=" text-decoration: none; border: 3px solid rgb(150,223,239); background-color: #f1ebeb;"
                   href="/<?php echo e(app()->getLocale()); ?>/?">
                    <?php echo e(__('Всі')); ?>

                </a>
            </div>
            <?php $__currentLoopData = App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="lg:px-1  inline text-black rounded-full" >
                    <a class="lg:px-2  inline text-black rounded-full" style=" text-decoration: none; border: 3px solid rgb(150,223,239); background-color: #f1ebeb;"
                       href="/<?php echo e(app()->getLocale()); ?>/?category=<?php echo e($category->slug); ?>&<?php echo e(http_build_query(request()->except('category', 'page'))); ?>">
                        <?php echo e(__(ucwords($category->name))); ?>

                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div  class=" inline float-right ">

        </div>
    </div>
    </div>

    <main class="max-w-6xl mx-auto mt-5 lg:mt-20 space-y-6">

        <?php if($products->count()): ?>

            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.products-grid','data' => ['products' => $products]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('products-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['products' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($products)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php echo e($products->links()); ?>

        <?php else: ?>
            <p class="text-center"><?php echo e(__("В даній категорії наразі немає товарів. Але трохи пізніше вони обов'язково з'являться:))")); ?></p>
        <?php endif; ?>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/products/index.blade.php ENDPATH**/ ?>