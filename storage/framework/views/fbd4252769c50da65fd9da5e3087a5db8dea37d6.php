
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.panel','data' => []]); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>/comments">
            <?php echo csrf_field(); ?>

            <header class="flex items-center">

                <h4 class="ml-4"><?php echo e(__('Залишити відгук:')); ?></h4>
            </header>

            <div class="mt-6">

                <p class="block mb-2 uppercase font-bold text-xs text-gray-700   w-full rounded mt-6"><?php echo e(__("Ім'я")); ?></p>
                <input type="text"  name="name"  value="<?php echo e(old('name')); ?>"  class="text-2xl lg:text-sm border border-gray-200  p-2 w-full rounded" required/>


                <p class="block mb-2 uppercase font-bold text-xs text-gray-700   w-full rounded mt-6"><?php echo e(__('Телефон')); ?></p>
                <input type="text"  name="tel"  value="<?php echo e(old('tel')); ?>"  class="text-2xl lg:text-sm border border-gray-200  p-2 w-full rounded" required/>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.error','data' => ['name' => 'tel']]); ?>
<?php $component->withName('form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'tel']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <textarea
                    name="body"
                    class="w-full text-2xl mt-6 border border-gray-200  w-full rounded lg:text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder=":))"

                    required><?php echo e(old('body')); ?></textarea>

                <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-xl lg:text-xl text-red-500"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div id="comment" class="flex justify-end mt-6 pt-2 border-t border-gray-200">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.button','data' => []]); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Опублікувати')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>






<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/products/_add-comment-form.blade.php ENDPATH**/ ?>