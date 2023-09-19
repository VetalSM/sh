<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.setting','data' => ['heading' => 'Edit Category: ' . $order->name]]); ?>
<?php $component->withName('setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Edit Category: ' . $order->name)]); ?>
        <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/orders/<?php echo e($order->id); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <h4 class=" text-bold"><?php echo e($order->tel.', '.$order->credentials); ?></h4>
            <h4 class=" text-bold"><?php echo e($order->address); ?></h4>
            <?php if(isset($order->comment)): ?>
                <h4 class=" text-bold"><?php echo e($order->comment); ?></h4>
            <?php endif; ?>
            <div class="flex-1">
                <table class="w-full md:table-auto" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase">

                        <th class="text-left"><?php echo e(__("№")); ?></th>
                        <th class="text-left"><?php echo e(__("Найменування")); ?></th>
                        <th class="pl-5 text-left lg:text-center lg:pl-5">
                            <span class="lg:hidden" title="Quantity">К-ть</span>
                            <span class="hidden lg:inline"><?php echo e(__("Кількість")); ?></span>
                        </th>
                        <th class="hidden text-right md:table-cell"> <?php echo e(__("ціна")); ?></th>
                        <th class="hidden text-right md:table-cell"> <?php echo e(__("Вид.")); ?></th>
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
                                <div class="h-10 w-36">
                                    <div class="relative  flex flex-row w-full h-8">

                                        <form action="/<?php echo e(app()->getLocale()); ?>/admin/products/orders/<?php echo e($item->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                            <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>"
                                                   class="w-7 text-center bg-gray-300" style="width: 2.5em"/>
                                            <input type="hidden" name="weight" value="<?php echo e($item->weight); ?>">
                                            <input type="hidden" name="price" value="<?php echo e($item->price); ?>">
                                            <button type="submit" class="px-1  ml-2 text-white text-base lg:text-base rounded-xl bg-blue-500">
                                                <?php echo e(__("оновити")); ?>

                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden  text-right md:table-cell " >
                                <span class="text-2xl lg:text-base font-medium lg:text-base  max-height">
                                    <?php echo e($item->price*$item->quantity); ?> <?php echo e($item->currency); ?>

                                </span>
                            </td>
                            <td class="text-right md:table-cell " >
                                <div style="padding: 0px 0px 8px 0;">
                                <form action="/<?php echo e(app()->getLocale()); ?>/admin/products/orders/<?php echo e($item->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button   class="px-3 text-white bg-red-600  rounded-full">x</button>
                                </form>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                -----------------------------------------------------
                <div class="text-xl mt-1">
                       <?php echo e(__("Загальна вартість:")); ?> <?php echo e($orders->sum('product_total')); ?> <?php echo e($item->currency); ?>

                </div>

                <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/orders" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="tel" value="<?php echo e($order->tel); ?>">
                    <input type="hidden" name="created" value="<?php echo e($order->created); ?>">
                    <input type="hidden" name="credentials" value="<?php echo e($order->credentials); ?>">
                    <input type="hidden" name="address" value="<?php echo e($order->address); ?>">

                    <input type="hidden" name="currency" value="<?php echo e($order->currency); ?>">
                    <input type="hidden" name="weight" value="<?php echo e($order->weight); ?>">
                    <input type="hidden" name="product_id" value="<?php echo e($order->product_id); ?>">
                    <p class="pt-5 flex-inline">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'Имя товара']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'Имя товара']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <select name="product_id"  required>
                            <?php $__currentLoopData = \App\Models\Product::all()->sortBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($product->id); ?>"
                                ><?php echo e(ucwords($product->title)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <h5 class="inline">Объём:</h5>  <input type="number" class="border  border-gray-200 p-2 rounded" name="weight" required/>
                    </p>
                    <p>
                    <h5 class="inline">Единица измерения:</h5> <input type="text" class="border border-gray-200 p-2  rounded" name="unit"  required/>
                    </p>
                    <p>
                    <h5 class="inline">Цена за 1 позицию:</h5>  <input type="text" class="border border-gray-200 p-2  rounded" name="price"  required/>

                    </p>
                 <p>
                    <h5 class="inline">Количество позиций:</h5>  <input type="number" name="quantity"  class="w-7 text-center bg-gray-300"  style="width: 2.5em" required/>
                 </p>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.textarea','data' => ['name' => 'comment']]); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'comment']); ?><?php echo e(old('comment', $order->comment)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.button','data' => []]); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Добавить <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </form>

            </div>
        </form>
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/products/order/edit.blade.php ENDPATH**/ ?>