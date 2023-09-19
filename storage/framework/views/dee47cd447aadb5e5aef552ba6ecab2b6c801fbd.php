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
        <div class="">
        <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/orders_sort"  enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <label for="start" class=" font-semibold ">ОТ:</label>
            <input type="date" id="start" name="start" value="<?php echo e(old('start', request()->start)); ?>">&nbsp;&nbsp;&nbsp;

            <label for="end" class=" font-semibold ">ДО:</label>
            <input type="date" id="end" name="end" value="<?php echo e(old('end', request()->end)); ?>">&nbsp;&nbsp;&nbsp;
            <button type="submit" class=" font-semibold ">Показать</button>
        </form><br>
            <span >
                Total: <?php echo e($orders->sum('product_total')); ?>  грн
            </span>

            <div>
                <span>
               <?php echo e('(С/С): ' . $costs['all_created']['cost']['totalWeight'] . ' грн'); ?>

                </span>
            </div>
            <div>
                <span>
               <?php echo e('(Расходы): ' . $costs['all_created']['expenses']['totalExpense'] . ' грн'); ?>

                </span>
            </div>
            <div>
                <span>
                    <?php echo e('(Прибыль): ' . $costs['all_created']['profit']['total'] . ' грн'); ?>

                </span>
            </div>
        </div>
        <?php if($orders): ?>


        <div class="mt-3 flex flex-col" >
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">

                                <th class="text-center">№</th>
                                <th class="text-center">Тел.</th>
                                <th class="text-center">Сумма заказа</th>
                                <th class="text-center">Ф.И.О</th>
                                <th class="text-center">Дата</th>

                            </tr>

                            <?php $__currentLoopData = $orders->unique('created')->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">
                                                        <?php echo e($order->tel); ?>

                                                    </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                   <?php echo e(\App\Models\Order::all()->where('created', $order->created)->sum('product_total')); ?>  <?php echo e($order->currency); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($order->credentials); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($order->created_at->format("d-m-Y H:i:s")); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/orders/<?php echo e($order->id); ?>/edit"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/orders/<?php echo e($order->id); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
















                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/products/order/sort.blade.php ENDPATH**/ ?>