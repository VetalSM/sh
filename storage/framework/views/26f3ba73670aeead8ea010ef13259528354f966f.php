<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.setting','data' => ['heading' => 'Manage Comments']]); ?>
<?php $component->withName('setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['heading' => 'Manage Comments']); ?>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="h-12 uppercase">
                                <th class="text-center">ім'я товару</th>
                                <th class="text-center">Коментатор</th>
                                <th class="text-center">Никнейм</th>
                                <th class="text-center">телефон</th>
                                <th class="text-center">коментар</th>
                                <th class="text-center"></th>
                            </tr>
                            <?php $__currentLoopData = \App\Models\Comment::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                    <span class="text-dark" style="text-decoration: none;">


                                                            <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($comment->product_id === $product->id): ?>
                                                                <a href="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>" style="text-decoration: none;">
                                                            <?php echo e($product->title); ?>

                                                        </a>

                                                            <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php if(\App\Models\Comment::all()->where('name', $comment->name)->count('name') !== \App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName')): ?>
                                                       <span style="color: red"> <?php echo e($comment->name); ?> (<?php echo e(\App\Models\Comment::all()->where('name', $comment->name)->count('name')); ?>) </span>
                                                    <?php else: ?>
                                                        <?php echo e($comment->name); ?> (<?php echo e(\App\Models\Comment::all()->where('name', $comment->name)->count('name')); ?>)
                                                    <?php endif; ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($comment->nickName); ?>

                                                    <?php if(\App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName') >=6): ?>
                                                        <span  style="color: red">
                                                        (<?php echo e(\App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName')); ?>)
                                                            </span>
                                                    <?php else: ?>
                                                        <span  style="color: #87a4ff">
                                                        (<?php echo e(\App\Models\Comment::all()->where('nickName', $comment->nickName)->count('nickName')); ?>)
                                                            </span>
                                                    <?php endif; ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($comment->tel); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <span style="text-decoration: none;">
                                                    <?php echo e($comment->body); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/comments/<?php echo e($comment->id); ?>">
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/products/comment/index.blade.php ENDPATH**/ ?>