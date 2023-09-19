<!doctype html>
<html lang="<?php echo e(App::currentLocale()); ?>">
<head>

    <?php if(auth()->id() == 0): ?>
        <script defer async src="https://www.googletagmanager.com/gtag/js?id=G-CY3K5VV4KR"></script>
        <script defer async>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-CY3K5VV4KR');
        </script>
    <?php endif; ?>

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
    <meta property="og:title" content="<?php echo $__env->yieldContent('og:title', 'Магазин товарів для свічок "MadeIS". '); ?>"/>
    <meta property="og:description" content="<?php echo $__env->yieldContent('og:description', '✅Якісні товари від відомих виробників.
✅Приємні ціни.
✅Швидке обслуговування.
🚚Відправка кожного дня.'); ?>"/>
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
    <title><?php echo $__env->yieldContent('title', 'CandleScience. Аромаолії США, Candlescience, віддушки, запашки для свічок мила, диффузорів, косметики.Аромамасла преміум класса США, матеріали для виробництва свічок, соєвий віск для свічок ручної роботи, віддушки для свічок'); ?></title>
    <meta name="title" content="<?php echo $__env->yieldContent('title_m', 'CandleScience. Аромаолії США, Candlescience, віддушки, запашки для свічок мила, диффузорів, косметики.Аромамасла преміум класса США, матеріали для виробництва свічок, соєвий віск для свічок ручної роботи, віддушки для свічок'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Купити CandleScience в Україні. Аромаолії США, Candlescience, використовуються для свічок, мила, дифузорів, косметики, бомбочок для ван, запашки для лосьйонів, віддушки для натуральних свічок ручної роботи із соєвого воску'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'Магазин Madeis, товари для свічок, віддушки для свічок, віддушки для мила, ароматизатори для свічок, ароматизатори для аромадифузорів, совий віск Kerax в Україні, американські віддушки Україна, купити ароматизатори США в Україні, Candlescience в Україні, дерев’яні гноти Wooden Wick в Україні, товари для свічок MadeIS, Мейдіс , товары для изготовления свечей, отдушки, соевый воск, деревянные и хлопковые фитили. madeis.com.ua madeis'); ?>">
    <?php else: ?>
        <title><?php echo $__env->yieldContent('title', 'CandleScience. Аромамасла США, Candlescience, отдушки, запашки для свечей мыла, диффузоров, косметики.Аромамасла премиум класса США, материалы для производства свечей, соевый воск для свечей ручной работы, отдушки для свечей'); ?></title>
        <meta name="title" content="<?php echo $__env->yieldContent('title_m', 'CandleScience. Купить CandleScience в Украине. Аромаолии США, Candlescience, используются для свечей, мыла, диффузоров, косметики, бомбочек для ванн, запашки для лосьонов, отдушки для натуральных свечей ручной работы из соевого воска.'); ?>">
        <meta name="description" content="<?php echo $__env->yieldContent('description', 'CandleScience. Купить CandleScience в Украине. Аромаолии США, Candlescience, используются для свечей, мыла, диффузоров, косметики, бомбочек для ванн, запашки для лосьонов, отдушки для натуральных свечей ручной работы из соевого воска.'); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'Магазин Madeis, товары для свечей, отдушки для свечей, отдушки для мыла, ароматизаторы для свечей, ароматизаторы для аромадиффузоров, совый воск Kerax в Украине, американские отдушки Украина, купить ароматизаторы США в Украине, Candlescience в Украине, деревянные фитили Wooden Wick в Украина, товары для свечей MadeIS, Мэйдис, товары для изготовления свечей, отдушки, соевый воск, деревянные и хлопковые фитилы. madeis.com.ua madeis'); ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">


    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">



    
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>" defer async></script>
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?> "></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <?php if(auth()->guard()->check()): ?>
        <script src="https://cdn.tiny.cloud/1/pebtcux3vb4jvpk5xu5eqdmmxiohb4tj9plx25aken3kenzs/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <?php endif; ?>

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




<?php if(auth()->id() == 0): ?>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX8DH3S"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
<div class="  bg-gray-100 border-opacity-5  text-right py-1 px-4 ">
    <div class="py-1 text-centre">
        <div class="inline float-left">
           <a href="<?php echo e(url('/ua')); ?>">UA</a>|<a href="<?php echo e(url('/ru')); ?>">RU</a>
        </div>
        <div class="dropdown px-1 inline-block">
            
            <a class="text-sm  lg:text-base  text-black inline  px-1  rounded-full nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
               style=" position: relative; top: 0px !important;
           text-decoration: none;  border: 3px solid rgb(255, 179, 0);padding-top: 0rem;padding-bottom: 0rem;"
            >
                <?php echo e(__('Корисне')); ?>

            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width: auto; min-width: max-content;" >
                <li><a class="dropdown-item "  href="https://articles.madeis.com.ua/<?php echo e(app()->getLocale()); ?>/articles"  ><?php echo e(__("Статті")); ?></a></li>
                <li><a class="dropdown-item" href="https://articles.madeis.com.ua/<?php echo e(app()->getLocale()); ?>/calculator"><?php echo e(__('Калькулятори')); ?></a></li>

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
                <img src="/images/instagram.webp" alt="instagram" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://t.me/MadeIS_UA" rel=”nofollow" target="_blank">
                <img src="/images/telegram.webp" alt="telegram" style="width: 22px; position: relative;  top: 6px !important;">
            </a>
        </div>
        <div class=" hidden  lg:inline-flex  inline-block   rounded-full">
            <a href="https://www.facebook.com/madeis.ua/" rel=”nofollow" target="_blank">
                <img src="/images/facebook.png" alt="facebook" style="width: 22px; position: relative;  top: 6px !important;">
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

    <footer class="bg-gray-100  border-opacity-5 rounded-xl text-center py-1 px-1 mt-5">
        <div class=" inline py-1 px-2 bg-gray-200 rounded-full  "
             style="position: relative;   height: 200px; border: 3px solid rgb(255, 179, 0);">
            <span><?php echo e(__("Приєднуйтесь до нас у соцмережах")); ?></span>
        </div>
        <div style=" position: relative; top: 8px !important;">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://instagram.com/madeis.ua" target="_blank">
                    <img src="/images/instagram.webp" alt="instagram" class="mx-auto " style="width: 50px;">
                </a>
            </div>
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://t.me/MadeIS_UA" target="_blank">
                    <img src="/images/telegram.webp" alt="telegram" rel=”nofollow" class="mx-auto " style="width: 50px;">
                </a>
            </div>
            <div class="relative  inline-block mx-auto lg:bg-gray-200 rounded-full">
                <a href="https://www.facebook.com/madeis.ua/" target="_blank">
                    <img src="/images/facebook.png" alt="facebook" class="mx-auto " style="width: 50px;">
                </a>
            </div>
        </div>
    </footer>
</section>
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
<script>
    $('.selectPrice').each(function() {
        var colors = ['#2c2a2a', '#c81313', '#2c2a2a'];
        var textDecorationStyles = ['none', 'none', 'line-through', ];
        var textPosition = ['left: 0']

        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        $this.addClass('s-hidden');
        $this.wrap('<div class="select"></div>');
        var $selectContainer = $this.parent(); // Cache the select container
        $this.after('<div class="styledSelect"></div>');

        var $styledSelect = $this.next('div.styledSelect');

        // Show the first select option in the styled div
        var defaultIndex = $this.children('option').length > 1 ? 1 : 0;
        $styledSelect.html($this.children('option').eq(defaultIndex).text()
            .split(' ').map((word, index) => `<span style=" color:${colors[index % colors.length]}; text-decoration:${textDecorationStyles[index % textDecorationStyles.length]}">${word}</span>`).join(' '));



        // Insert an unordered list after the styled div and also cache the list
        var $list = $('<ul />', {
            'class': 'options'
        }).insertAfter($styledSelect);

        // Insert a list item into the unordered list for each select option
        for (var i = 0; i < numberOfOptions; i++) {
            var listItem = $('<li />', {
                html: $this.children('option').eq(i).text()
                    .split(' ').map((word, index) => `<span style=" color:${colors[index % colors.length]}; text-decoration:${textDecorationStyles[index % textDecorationStyles.length]}">${word}</span>`).join(' '),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);

            // Apply the styles directly to the list item
            if (i === 0) {
                listItem.addClass('active'); // Применить стиль для первого элемента
            }
        }


        // Cache the list items
        var $listItems = $list.children('li');

        // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
        $selectContainer.click(function(e) {
            e.stopPropagation();
            $('div.styledSelect.active').not($styledSelect).removeClass('active').next('ul.options').hide();
            $styledSelect.toggleClass('active').next('ul.options').toggle();
        });


        // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
        // Updates the select element to have the value of the equivalent option
        $listItems.click(function(e) {
            e.stopPropagation();
            $listItems.removeClass('active'); // Удалите класс "active" у всех элементов списка
            $(this).addClass('active'); // Добавьте класс "active" к выбранному элементу
            $styledSelect.html($(this).html()).removeClass('active'); // Используйте innerHTML для копирования содержимого, чтобы сохранить стили
            $this.val($(this).attr('rel'));
            $list.hide();
        });



        // Hides the unordered list when clicking outside of it
        $(document).click(function() {
            $('div.styledSelect.active').removeClass('active').next('ul.options').hide();
        });
        // $listItems.first().addClass('active');
    });

    // $(document).ready(function() {
    //     const myVariable = $('#myVariable').text();
    //     $('.t').select2({
    //
    //         templateResult: function(el) { return '<span style="color: red">' + el.text + '</span>' +  '<span style="color: #000000;">'+ myVariable +'jj</span>'; },
    //
    //     // render html for the selected option
    //     templateSelection: function(el) { return '<span class="' + ($(el.element).prop('class') || '') + '">' + el.text + '</span>'; },
    //     // render html as-is without escaping it
    //     escapeMarkup: function(markup) { return markup; }
    // });
    // });
    // $('.t').on('change', function() {
    //     $('.select2-selection__rendered').html($('.select2-selection__rendered').html());
    // });
</script>

<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/layout.blade.php ENDPATH**/ ?>