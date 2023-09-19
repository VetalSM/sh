<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.setting','data' => ['heading' => 'Manage Category']]); ?>
<?php $component->withName('setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['heading' => 'Manage Category']); ?>

        <?php echo e($orders->links()); ?>

            <?php $__currentLoopData = $orders->unique('created'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h7 class=" text-bold" style="color: brown;"><?php echo e($order->created_at); ?></h7>
                <h4 class="mt-2 text-bold"><?php echo e($order->tel); ?><br/><?php echo e($order->credentials); ?></h4>
                <h4 class=" text-bold"><?php echo e($order->address); ?></h4>
                <?php if(isset($order->comment)): ?>
                    <h7 class=" text-bold"><?php echo e($order->comment); ?></h7>
                <?php endif; ?>
                <div class="flex-1">
                    <table class="w-full md:table-auto" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>

                            <th class="text-left"><?php echo e(__("Найменування")); ?></th>
                            <th class="pl-5 text-left lg:text-center lg:pl-5">
                                <span class="lg:hidden" title="Quantity">К-ть</span>
                                <span class="hidden lg:inline"><?php echo e(__("Кількість")); ?></span>
                            </th>
                            <th class="hidden text-right md:table-cell"> <?php echo e(__("ціна")); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $orders = DB::table('orders')->where('created', "$order->created")->get();
                        ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td>
                                    <a href="#"></a>
                                    <span class="mb-3 font-bold text-2xl lg:text-base" style="color: brown;  position: relative; top: -11px !important;"><?php echo e($key+=1); ?>.
                                        </span>

                                </td>
                                <td>
                                    <a href="#"></a>
                                    <span class="mb-3 text-2xl lg:text-base"><?php echo e($item->product); ?>

                                        </span>
                                    <br>
                                    <h10 class="font-bold text-2xl lg:text-base text-blue-700">
                                        <?php echo e($item->weight. $item->unit); ?> <span class="text-black"><?php echo e('('.$item->price.' '.$item->currency.')'); ?></span>
                                    </h10>
                                </td>
                                <td class="justify-center mt-3 md:justify-center md:flex">
                                    <div class="h-10 w-35">
                                        <div class="relative  flex flex-row w-full h-8">
                                            <?php if($item->quantity <= 1): ?>
                                                <p><?php echo e($item->quantity); ?></p>
                                            <?php else: ?>
                                                <h8 class="font-bold text-2xl lg:text-base ">
                                                <p style="color: red"><?php echo e($item->quantity); ?></p>
                                                </h8>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden  text-right md:table-cell " >
                                <span class="text-2xl lg:text-base font-medium lg:text-base  max-height">
                                    <?php echo e($item->price*$item->quantity); ?> <?php echo e($item->currency); ?>

                                </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="text-xl">
                        <?php echo e(__("Загальна вартість:")); ?> <?php echo e($orders->sum('product_total')); ?> <?php echo e($item->currency); ?>

                        <br/>
                        <?php if( $order->payment_status == 1): ?>
                            <span class="text-dark" style="text-decoration: none;">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span><?php echo e(__("Сплачено")); ?></span><span style="text-decoration: none; color: red">*</span>
                            <?php if($order->delivery_status == 1): ?>
                                <span class="text-dark" style="text-decoration: none;">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span><?php echo e(__("Відправлено")); ?></span><span style="text-decoration: none; color: red">*</span>
                            <?php else: ?>
                                <span style="text-decoration: none; color: red">
                                                   <span style="text-decoration: none; color: red">
                                                      *</span><?php echo e(__("Не відправлено")); ?></span><span style="text-decoration: none; color: red">*</span>
                            <?php endif; ?>

                        <?php else: ?>
                            <span style="text-decoration: none; color: red">
                                                        <?php echo e(__("Не Сплачено")); ?>

                                                    </span>
                        <?php endif; ?>

                        <?php if(isset($costs[$order->created])): ?>
                            <div>
                                <?php echo e('(С/С): ' . $costs[$order->created]['all_category']['cost']['totalWeight'] . ' грн'); ?>

                            </div>
                            <div>
                                <?php echo e('(Расходы): ' . $costs[$order->created]['all_category']['expenses']['totalExpense'] . ' грн'); ?>

                            </div>
                            <div>
                                <?php echo e('(Прибыль): ' . $costs[$order->created]['all_category']['profit']['total'] . ' грн'); ?>

                            </div>
                        <?php endif; ?>

                    </div>----------------------------------------------------------------------------------------------------------------------------------------
                    <br/><br/>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/products/order/text.blade.php ENDPATH**/ ?>