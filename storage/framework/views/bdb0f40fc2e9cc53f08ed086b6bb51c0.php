<header class="max-w-xl mx-auto  px-2 text-center">
    <?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('cart.clear',app()->getLocale())); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button ><?php echo e(__("к")); ?></button>
        </form>
    <?php endif; ?>

















    <h1 class=" text-6xl lg:text-5xl Tangerine">
        Made<span  style="color: #3B82F6">IS</span>
    </h1>
    <div>
        <h5 class="text-2xl lg:text-xl ">
            <?php echo e(__('Віддушки')); ?> <span style="color: #3B82F6"><?php echo e(__('CANDLESCIENCE')); ?></span> <?php echo e(__('купити в Україні')); ?>

        </h5>
    </div>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:hidden lg:inline-flex bg-gray-100 rounded-xl">
            <?php if (isset($component)) { $__componentOriginalbdb2217b90ad8e0422614ea82dcd24ff = $component; } ?>
<?php $component = App\View\Components\CategoryDropdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('category-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CategoryDropdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdb2217b90ad8e0422614ea82dcd24ff)): ?>
<?php $component = $__componentOriginalbdb2217b90ad8e0422614ea82dcd24ff; ?>
<?php unset($__componentOriginalbdb2217b90ad8e0422614ea82dcd24ff); ?>
<?php endif; ?>
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex   bg-gray-100 rounded-xl px-3 py-1">
            <form method="GET" action="/<?php echo e(app()->getLocale()); ?>">
                <?php if(request('category')): ?>
                    <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/products/_header.blade.php ENDPATH**/ ?>