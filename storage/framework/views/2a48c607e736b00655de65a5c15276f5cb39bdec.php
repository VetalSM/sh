<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.layout-art','data' => []]); ?>
<?php $component->withName('articles.layout-art'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.setting','data' => ['heading' => 'Менеджер статей']]); ?>
<?php $component->withName('setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['heading' => 'Менеджер статей']); ?>


        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = \App\Models\Article::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <?php
                                                if ($article->status == '4') {
                                                    $statusProd ='active';
                                                };

                                                       if ($article->status == '8') {
                                                    $statusProd ='not_available';
                                                };

                                            ?>
                                            <?php if($statusProd === "not_available"): ?>
                                                <div class="text-sm text-red font-medium text-gray-900">
                                                    <a href="/<?php echo e(app()->getLocale()); ?>/articles/<?php echo e($article->slug); ?>"
                                                       style="text-decoration: none;">
                                                        <?php echo e($article->title); ?><span
                                                            class="text-dark">&nbsp;&nbsp;&nbsp;<?php echo e($statusProd); ?></span>
                                                    </a>
                                                </div>
                                            <?php else: ?>

                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/<?php echo e(app()->getLocale()); ?>/articles/<?php echo e($article->slug); ?>"
                                                       style="text-decoration: none;">
                                                        <?php echo e($article->title); ?><span class="text-success">&nbsp;&nbsp;&nbsp;<?php echo e($statusProd); ?></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/<?php echo e(app()->getLocale()); ?>/admin/articles/<?php echo e($article->id); ?>/edit"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST"
                                              action="/<?php echo e(app()->getLocale()); ?>/admin/articles/<?php echo e($article->id); ?>">
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/articles/index.blade.php ENDPATH**/ ?>