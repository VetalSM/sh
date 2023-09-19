
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if(App::currentLocale() ==='ua'): ?>
    <?php $__env->startSection('title'); ?>Candlescience с доставкой по Украине, Аромамасла для свечей,мыла,косметики и массажных масел.....<?php $__env->stopSection(); ?>
    <?php $__env->startSection('description'); ?>Candlescience США вы можете заказать в нашем магазине с доставкой по Украине.Отдушки премиум качества для свечей,мыла, массажных масел<?php $__env->stopSection(); ?>
    <div class="card text-left items-center mx-auto" >
        <div class="card-body">
            <h3 class="card-title text-center " style="padding-bottom: 15px;"><span class="text-secondary">Доставка</span></h3>
            <p class="card-text ">
                Доставка здійснюється кожного дня після 14.00, крім суботи, у вихідні дні можуть бути зміни.<p/>

                Доставка здійснюється компаніями "Нова Пошта" та "УкрПошта", послуги доставки сплачує замовник.<p/>

                <span class="text-danger">Замовлення, які були оплачені після 13.00, відправляються наступного дня</span>.<p/>

                Доставка займає в середньому від 1 до 4 діб, строки доставки залежать від обраної компанії перевізника.<p/>

                Усі замовлення при доставці застраховуються на повну вартість замовлення!!!<p/>
            </p><br/>
            <?php else: ?>
                <?php $__env->startSection('title'); ?>Candlescience с доставкой по Украине, Аромамасла для свечей,мыла,косметики и массажных масел.....<?php $__env->stopSection(); ?>
                <?php $__env->startSection('description'); ?>Candlescience США вы можете заказать в нашем магазине с доставкой по Украине.Отдушки премиум качества для свечей,мыла, массажных масел<?php $__env->stopSection(); ?>
                <div class="card text-left items-center mx-auto" >
                    <div class="card-body">
                        <h3 class="card-title text-center " style="padding-bottom: 15px;"><span class="text-secondary">Доставка</span></h3>
                        <p class="card-text ">
                            Доставка осуществляется каждый день после 14:00, кроме субботы, в выходные дни могут быть изменения.<p/>

                        Доставка осуществляется компаниями "Новая Почта" и "УкрПочта", услуги доставки оплачивает покупатель.<p/>

                        <span class="text-danger">Заказы, оплаченные после 13.00, отправляются на следующий день</span>.<p/>

                        Доставка занимает в среднем от 1 до 4 суток, сроки доставки зависят от выбранной компании перевозчика.<p/>

                        Все заказы при доставке застрахованы на полную стоимость заказа!!!<p/>
                        </p><br/>

            <?php endif; ?>

            <a href="/<?php echo e(app()->getLocale()); ?>"
               class="transition-colors duration-300 relative inline-flex  hover:text-blue-500">
                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path class="fill-current"
                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                        </path>
                    </g>
                </svg>
                <?php echo e(__('До каталогу')); ?>

            </a>
        </div>
    </div>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/info/delivery.blade.php ENDPATH**/ ?>