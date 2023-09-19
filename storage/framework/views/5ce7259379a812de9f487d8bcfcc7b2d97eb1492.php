<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.setting','data' => ['heading' => 'Manage Balance']]); ?>
<?php $component->withName('setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['heading' => 'Manage Balance']); ?>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/status_jobs/create">create </a>
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">имя</th>
                                <th class="text-center">начальный прайс</th>
                                <th class="text-center">конечный прайс</th>
                                <th class="text-center">начальный статус</th>
                                <th class="text-center">конечный статус</th>
                                <th class="text-center">начальная дата</th>
                                <th class="text-center">конечная дата</th>

                            </tr>



                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($status->product_id): ?>
                                    <?php if($status->work_start == 1 &&  ($status->work_end == 1)): ?>
                                        <tr style="background-color:#39e634">
                                    <?php elseif($status->work_start == 1 && $status->status_end == 0 ): ?>
                                        <tr style="background-color:#39e634">
                                    <?php elseif($status->work_start == 1): ?>

                                        <tr style="background-color:#f6e643">

                                    <?php else: ?>
                                        <tr style="background-color:rgba(248,76,76,0.65)">
                                    <?php endif; ?>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                        <span class="text-dark" style="text-decoration: none;">
                                                                <?php echo e($status->product_name); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                  <?php echo e($status->price_start_name); ?>

                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($status->price_end_name); ?>

                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                      <?php echo e($status->status_start); ?>

                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                         <?php echo e($status->status_end); ?>


                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                       <?php echo e($status->start_date); ?>



                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($status->end_date); ?>

                                                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/<?php echo e(app()->getLocale()); ?>/admin/products/status_jobs/<?php echo e($status->id); ?>/edit"
                                               class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/status_jobs/<?php echo e($status->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="text-xs text-gray-400">Delete</button>
                                                </form>
                                            </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/products/job/index.blade.php ENDPATH**/ ?>