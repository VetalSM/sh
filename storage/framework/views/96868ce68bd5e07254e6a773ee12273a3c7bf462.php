<!doctype html>
<html lang="<?php echo e(App::currentLocale()); ?>">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CY3K5VV4KR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-CY3K5VV4KR');
    </script>
    <script>
        var $window = (window)
        window.scroll(0, localStorage.getItem('scrollPosition')|0)
        $window.scroll(function () {
            localStorage.setItem('scrollPosition', $window.scrollTop())
        })
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <link rel="alternate" hreflang="ru" href="<?php echo e(Request::root()); ?>/ru<?php echo e(Str::substr(url()->current(), 24 , 1000)); ?>"  />
    <link rel="alternate" hreflang="uk" href="<?php echo e(Request::root()); ?>/ua<?php echo e(Str::substr(url()->current(), 24 , 1000)); ?>"  />
    <link rel="alternate" hreflang="x-default" href="<?php echo e(Request::root()); ?>/ua<?php echo e(Str::substr(url()->current(), 24 , 1000)); ?>"  />
    <meta property="og:image" content="<?php echo $__env->yieldContent('og:image', "https://madeis.com.ua/images/logoOG.jpg" ); ?>"/>
    <meta property="og:title" content="<?php echo $__env->yieldContent('og:title', 'Корисні статті від "MadeIS". '); ?>"/>
    <meta property="og:description" content="<?php echo $__env->yieldContent('og:description', '✅Все про свічковаріння, від А до Я.
✅Виготовлення дифузорів та рум спреїв.
✅Аромаолії: правила використання.'); ?>"/>
    <meta property="og:page_url" content="<?php echo $__env->yieldContent('og:page_url', 'https://madeis.com.ua/ua' ); ?>"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel ="icon" type = "image/x-icon" href ="/images/favicon-32x32.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php if(App::currentLocale() ==='ua'): ?>
        <title><?php echo $__env->yieldContent('title', 'Виготовлення свічок із соєвого воску, все про виготовлення свічок з нуля. Виготовлення дифузорів, виготовлення рум спреїв. Виготовлення свічок з віддушками та ароматизаторами. Формові та контейнерні свічки.'); ?></title>
        <meta name="title" content="<?php echo $__env->yieldContent('title_m', 'Виготовлення свічок із соєвого воску, все про виготовлення свічок з нуля. Виготовлення дифузорів, виготовлення рум спреїв. Виготовлення свічок з віддушками та ароматизаторами. Формові та контейнерні свічки.'); ?>">
        <meta name="description" content="<?php echo $__env->yieldContent('description', 'Як правильно виготовити свічку? Скільки додати віддушки у свічку? Як зробити дифузор для дому? Чому свічка погано горить,тухне? Всі проблеми зі свічками і не тільки вирішуємо разом із "MadeIS".'); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'Магазин Madeis, товари для свічок, як виготовити свічку, виготовлення свічок з соєвого воску,які ароматизатори підходять для свічок, все про виготовлення свічок, як зробити аромадифузор для дому, скільки віддушки додати у віск, проблеми зі свічками, як зробити ароматичну свічку, види восків, які бувають воски, види гнотів для свічок, як зробити свічку з деревяним гнотом, madeis.com.ua madeis'); ?>">
    <?php else: ?>
        <title><?php echo $__env->yieldContent('title', 'Изготовление свечей из соевого воска, все об изготовлении свечей с нуля. Изготовление диффузоров, изготовление рум спреев. Изготовление свечей с отдушками и ароматизаторами. Формовые и контейнерные свечи.'); ?></title>
        <meta name="title" content="<?php echo $__env->yieldContent('title_m', 'Изготовление свечей из соевого воска, все об изготовлении свечей с нуля. Изготовление диффузоров, изготовление рум спреев. Изготовление свечей с отдушками и ароматизаторами. Формовые и контейнерные свечи. '); ?>">
        <meta name="description" content="<?php echo $__env->yieldContent('description', 'Как правильно изготовить свечу? Сколько добавить отдушки в свечу? Как сделать диффузор для дома? Почему свеча плохо горит, гаснет? Все проблемы со свечами и не только решаем вместе с "MadeIS".'); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'Магазин Madeis, товары для свечей, как изготовить свечу, изготовление свечей из соевого воска, которые ароматизаторы подходят для свечей, все об изготовлении свечей, как сделать аромадифузор для дома, сколько отдушки добавить в воск, проблемы со свечами, как сделать ароматическую свечу, виды восков, какие бывают воски, виды фитилей для свечей, как сделать свечу с деревянным фитилем, madeis.com.ua madeis'); ?>">    <?php endif; ?>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css" rel="stylesheet">-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <script src="https://cdn.tiny.cloud/1/pebtcux3vb4jvpk5xu5eqdmmxiohb4tj9plx25aken3kenzs/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
        .clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .clamp.one-line {
            -webkit-line-clamp: 1;
        }
    </style>
</head>
<body style="font-family: Open Sans, sans-serif">
<div class="  bg-gray-100 border-opacity-5  text-right py-1 px-4 ">
    <div class="py-1 text-centre">
        <div class="inline float-left">
            <a href="<?php echo e(url('/ua/articles')); ?>">UA</a>|<a href="<?php echo e(url('/ru/articles')); ?>">RU</a>
        </div>
        <div class="dropdown px-1 inline-block">
            
            <a class="text-sm  lg:text-base  text-black inline  px-1  rounded-full nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
               style=" position: relative; top: 0px !important;
           text-decoration: none;  border: 3px solid rgb(255, 179, 0);padding-top: 0rem;padding-bottom: 0rem;"
            >
                <?php echo e(__('До товарів')); ?>

            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width: auto; min-width: max-content;" >
                <li><a class="dropdown-item "  href="/<?php echo e(app()->getLocale()); ?>/"  ><?php echo e(__("Всі категорії")); ?></a></li>
                <li><hr class="dropdown-divider"></li>
                <?php $__currentLoopData = App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <li><a class="dropdown-item"   href="/<?php echo e(app()->getLocale()); ?>/?category=<?php echo e($category->slug); ?>&<?php echo e(http_build_query(request()->except('category', 'page'))); ?>"><?php echo e(__(ucwords($category->name))); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
        <div class="dropdown px-1 inline-block">
            <a class="text-sm lg:text-base text-black inline px-1 rounded-full nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; top: 0px !important; text-decoration: none; border: 3px solid rgb(255, 179, 0); padding-top: 0rem; padding-bottom: 0rem;">
                <?php echo e(__('Інформація')); ?>

            </a>
            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink" style="width: auto; min-width: max-content;">
                <li><a class="dropdown-item" href="/<?php echo e(app()->getLocale()); ?>/info_payment"><?php echo e(__("Оплата")); ?></a></li>
                <li><a class="dropdown-item" href="/<?php echo e(app()->getLocale()); ?>/info_delivery"><?php echo e(__("Доставка")); ?></a></li>
                <li><a class="dropdown-item" href="/<?php echo e(app()->getLocale()); ?>/info_contact"><?php echo e(__('Контакти')); ?></a></li>
            </ul>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://instagram.com/madeis.ua" rel=”nofollow" target="_blank">
                <img src="/images/instagram.webp" alt="" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://t.me/MadeIS_UA" rel=”nofollow" target="_blank">
                <img src="/images/telegram.webp" alt="" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://www.facebook.com/madeis.ua/" rel=”nofollow" target="_blank">
                <img src="/images/facebook.png" alt="" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>

    </div>
</div>
<nav class="md:flex  flex md:justify-between justify-between items-center  md:items-center">
    <div class=" px-2 ">
        <a href="/<?php echo e(app()->getLocale()); ?>">
            <img src="/images/logo.webp" alt="Logo" width="100" height="60">
        </a>
    </div>
    <div class="mt-8 md:mt-0 flex inline-block items-center  px-15">
        <a href="<?php echo e(route('cart.list',app()->getLocale())); ?>" class="flex mr-18 items-center"
           style="  text-decoration-color: #747171;">
            <img src="/images/cart.png" alt="cart" width="40" height="40">
            <i class="ya-share1__item text-lg lg:text-xl "> <span
                    class="hidden  lg:inline-flex  ">  <?php echo e(__("Всього:")); ?></span> <?php echo e(Cart::getTotal()); ?> грн</i></a>
        <div class="flex" style=" margin-left: auto;margin-right: 0;">
            <?php if(auth()->guard()->check()): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown','data' => ['class' => '']]); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => '']); ?>
                     <?php $__env->slot('trigger', null, []); ?> 
                        <button class=" ml-2 text-sm mt-0.5 lg:text-base font-bold ">
                            Вітаю, <?php echo e(auth()->user()->name); ?>!
                        </button>
                     <?php $__env->endSlot(); ?>
                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-item','data' => ['href' => '/'.e(app()->getLocale()).'/admin/products/orders_text','active' => request()->is('admin/products/orders_text')]]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/'.e(app()->getLocale()).'/admin/products/orders_text','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/products/orders_text'))]); ?>
                        Заявки на печать
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <hr style="height:1px;"/>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-item','data' => ['href' => '/'.e(app()->getLocale()).'/admin/products/orders','active' => request()->is('admin/products/orders')]]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/'.e(app()->getLocale()).'/admin/products/orders','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/products/orders'))]); ?>
                        Все заказы
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <hr style="height:1px;"/>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-item','data' => ['href' => '/'.e(app()->getLocale()).'/admin/products/balance_products','active' => request()->is('admin/products/balance_products')]]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/'.e(app()->getLocale()).'/admin/products/balance_products','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/products/balance_products'))]); ?>
                        Все остатки
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <hr style="height:1px;"/>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-item','data' => ['href' => '/'.e(app()->getLocale()).'/admin/products/create','active' => request()->is('admin/products/create')]]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/'.e(app()->getLocale()).'/admin/products/create','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/products/create'))]); ?>
                        Новый продукт
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <hr style="height:1px;"/>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-item','data' => ['href' => '/'.e(app()->getLocale()).'/admin/articles/create','active' => request()->is('admin/articles/create')]]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '/'.e(app()->getLocale()).'/admin/articles/create','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('admin/articles/create'))]); ?>
                        Новая статья
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <hr style="height:1px;"/>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-item','data' => ['href' => '#','xData' => '{}','@click.prevent' => 'document.querySelector(\'#logout-form\').submit()']]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '#','x-data' => '{}','@click.prevent' => 'document.querySelector(\'#logout-form\').submit()']); ?>
                        Вихід
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <form id="logout-form" method="POST" action="/<?php echo e(app()->getLocale()); ?>/logout" class="hidden">
                        <?php echo csrf_field(); ?>
                    </form>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>

</nav>




<?php echo e($slot); ?>


<footer class="bg-gray-100  border-opacity-5 rounded-xl text-center py-1 px-1 mt-5" style="
  left: 0;
  bottom: 0;
  width: 100%;
  height: 100px; /* высота элемента footer */
  background-color: #f8f8f8;
  border-radius: 16px;
  text-align: center;
  padding: 1rem;
  box-sizing: border-box;">
    <div class=" inline py-1 px-2 bg-gray-200 rounded-full  "
         style="position: relative;   height: 200px; border: 3px solid rgb(255, 179, 0);">
        <span><?php echo e(__("Приєднуйтесь до нас у соцмережах")); ?></span>
    </div>
    <div style=" position: relative; top: 8px !important;">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <a href="https://instagram.com/madeis.ua" target="_blank">
                <img src="/images/instagram.webp" alt="" class="mx-auto " style="width: 50px;">
            </a>
        </div>
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <a href="https://t.me/MadeIS_UA" target="_blank">
                <img src="/images/telegram.webp" alt="" rel=”nofollow" class="mx-auto " style="width: 50px;">
            </a>
        </div>
        <div class="relative  inline-block mx-auto lg:bg-gray-200 rounded-full">
            <a href="https://www.facebook.com/madeis.ua/" target="_blank">
                <img src="/images/facebook.png" alt="" class="mx-auto " style="width: 50px;">
            </a>
        </div>
    </div>
    <?php if( ! Cart::getContent()->count()): ?>
    <div class="fixed  py-1 px-3 rounded-full bottom-3 right-3   text-xl" style="background-color:hsla(0,0%,100%,0.71);">
        <a href="/<?php echo e(app()->getLocale()); ?>" class="flex mr-18 items-center">
            <img src="/images/cart12.png" alt="cart" width="35" height="35">
            <i class=" text-lg lg:text-xl "style=" padding: 0.5em 20px 11px 0px;font-weight: 600;">

                <span>  <?php echo e(__("До покупок")); ?></span></i></a>

    </div>
        <?php endif; ?>
</footer>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash','data' => []]); ?>
<?php $component->withName('flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

</body>

<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/articles/layout-art.blade.php ENDPATH**/ ?>