<?php $attributes = $attributes->exceptProps(['heading']); ?>
<?php foreach (array_filter((['heading']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<section class=" max-w-7xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        <?php echo e($heading); ?>

    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Меню</h4>
            <div class="btn">
                <button class="btn btn-warning  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Заказы
                </button>
                <ul class="dropdown-menu">
                    <li >
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/orders" class="<?php echo e(request()->is('admin/products/orders') ? 'text-blue-500' : ''); ?>">Все заказы</a>
                    </li>
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/orders_sort" class="<?php echo e(request()->is('/admin/products/orders_sort') ? 'text-blue-500' : ''); ?>">По дате</a>
                    </li>
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/orders_text" class="<?php echo e(request()->is('admin/products/orders_text') ? 'text-blue-500' : ''); ?>">Заявки на печать</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Статистика
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/orders_statistic" class="<?php echo e(request()->is('admin/products/balance_products') ? 'text-blue-500' : ''); ?>">По дате</a>
                    </li>

                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Остатки
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/balance_products" class="<?php echo e(request()->is('admin/products/balance_products') ? 'text-blue-500' : ''); ?>">Все остатки</a>
                    </li>

                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/balance_products/create" class="<?php echo e(request()->is('admin/products/balance_products/create') ? 'text-blue-500' : ''); ?>">Новый продукт</a>
                    </li>
                </ul>
            </div>
            <hr style="height:4px;"/>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Товары
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products" class="<?php echo e(request()->is('admin/products') ? 'text-blue-500' : ''); ?>">Все товары</a>
                    </li>

                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/create" class="<?php echo e(request()->is('admin/products/create') ? 'text-blue-500' : ''); ?>">Новый товар</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Цены
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/price" class="<?php echo e(request()->is('admin/products/price') ? 'text-blue-500' : ''); ?>">Все цены</a>
                    </li>
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/price/create" class="<?php echo e(request()->is('admin/products/price/create') ? 'text-blue-500' : ''); ?>">Новая цeна</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Тов. Категории
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/categories" class="<?php echo e(request()->is('admin/products/categories') ? 'text-blue-500' : ''); ?>">Все категории</a>
                    </li>
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/categories/create" class="<?php echo e(request()->is('admin/products/categories/create') ? 'text-blue-500' : ''); ?>">Новая категория</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Комментарии
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/comments" class="<?php echo e(request()->is('/admin/products/comments') ? 'text-blue-500' : ''); ?>">Все комментарии</a>
                    </li>
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/comments/create" class="<?php echo e(request()->is('/admin/products/comments/create') ? 'text-blue-500' : ''); ?>">instagram</a>
                    </li>
                </ul>
            </div>

            <hr style="height:4px;"/>
            <div class="btn">
                <button class="btn btn-info  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Статьи
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/articles" class="<?php echo e(request()->is('admin/articles') ? 'text-blue-500' : ''); ?>">Все статьи</a>
                    </li>

                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/articles/create" class="<?php echo e(request()->is('admin/articles/create') ? 'text-blue-500' : ''); ?>">Новая статья</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Стат. Категории
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/articles/categories/index" class="<?php echo e(request()->is('admin/articles/categories') ? 'text-blue-500' : ''); ?>">Все категории</a>
                    </li>

                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/articles/categories/index/create" class="<?php echo e(request()->is('admin/articles/categories/create') ? 'text-blue-500' : ''); ?>">Новая категория</a>
                    </li>
                </ul>
            </div>

            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Хештеги
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/hashtag" class="<?php echo e(request()->is('admin/hashtag') ? 'text-blue-500' : ''); ?>">Все хештеги</a>
                    </li>

                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/hashtag/create" class="<?php echo e(request()->is('admin/hashtag/create') ? 'text-blue-500' : ''); ?>">Новый хештег</a>
                    </li>
                </ul>
            </div>
            <div class="btn">
                <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    доп
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/sitemap" class="<?php echo e(request()->is('/admin/sitemap') ? 'text-blue-500' : ''); ?>">Sitemap Generator</a>
                    </li>

                </ul>
            </div>
            <ul>





























































































            </ul>
        </aside>

        <main class="flex-1">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.panel','data' => []]); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php echo e($slot); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </main>
    </div>
</section>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/setting.blade.php ENDPATH**/ ?>