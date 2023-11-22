<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.setting','data' => ['heading' => 'Edit Product: ' . $status->name]]); ?>
<?php $component->withName('setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Edit Product: ' . $status->name)]); ?>
        <form method="POST" action="/<?php echo e(app()->getLocale()); ?>/admin/products/status_jobs/<?php echo e($status->id); ?>"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <?php
                $result=[];
                    foreach (\App\Models\Price::all() as $pric_e){
                         $result[]= $pric_e->name;
                    }
             $result=array_unique($result);
            ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'product']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'product']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <select name="product_id" required>
                <option class="rounded-full"
                        value="<?php echo e($status->product_id); ?>"><?php echo e($status->product_name); ?></option>

                <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option class="rounded-full"

                            value="<?php echo e($product->id); ?>"><?php echo e($product->title); ?> << прайс:::<?php echo e($product->prices ?? null); ?>>>
                        << акция:::<?php echo e($product->prom_prices ?? null); ?>>>
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'change price in status']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'change price in status']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <select name="price_status" required>
                <option class="rounded-full" selected><?php echo e(old('price_status', $status->price_status)); ?></option>
                <option class="rounded-full" value="prom">prom</option>
                <option class="rounded-full" value="active">active</option>
            </select>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'price start']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'price start']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <select name="price_start_name" required>
                <option class="rounded-full" selected><?php echo e(old('price_start_name', $status->price_start_name)); ?></option>

                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option class="rounded-full"
                            value="<?php echo e($price); ?>"><?php echo e($price); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'price end']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'price end']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <select name="price_end_name" required>
                <option class="rounded-full" selected><?php echo e(old('price_end_name', $status->price_end_name)); ?></option>

                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option class="rounded-full"
                            value="<?php echo e($price); ?>"><?php echo e($price); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'status start']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'status start']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <select name="status_start" required>
                <?php if( $status->status_start == "0"): ?>
                    <option value="0" selected></option>
                <?php elseif( $status->status_start == "1"): ?>
                    <option value="1" selected><?php echo e(old('status_start', 'promotion')); ?></option>
                <?php elseif($status->status_start == "2"): ?>
                    <option value="2" selected><?php echo e(old('status_start', 'new')); ?></option>
                <?php elseif($status->status_start == "3"): ?>
                    <option value="3" selected><?php echo e(old('status_start', 'hit')); ?></option>
                <?php elseif($status->status_start == "4"): ?>
                    <option value="4" selected><?php echo e(old('status_start', 'active')); ?></option>
                <?php elseif($status->status_start == "5"): ?>
                    <option value="5" selected><?php echo e(old('status_start', 'ends')); ?></option>
                <?php elseif($status->status_start == "6"): ?>
                    <option value="6" selected><?php echo e(old('status_start', 'expect')); ?></option>
                <?php elseif($status->status_start == "7"): ?>
                    <option value="7" selected><?php echo e(old('status_start', 'out')); ?></option>
                <?php elseif($status->status_start == "8"): ?>
                    <option value="8" selected><?php echo e(old('status_start', 'not_available')); ?></option>
                <?php endif; ?>
                <option value="1">promotion</option>
                <option value="2">new</option>
                <option value="3">hit</option>
                <option value="4">active</option>
                <option value="5">ends</option>
                <option value="6">expect</option>
                <option value="7">out</option>
                <option value="8">not_available</option>
            </select>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'status end']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'status end']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <select name="status_end" required>
                <?php if( $status->status_end == "0"): ?>
                    <option value="0" selected></option>
                <?php elseif( $status->status_end == "1"): ?>
                    <option value="1" selected><?php echo e(old('status_end', 'promotion')); ?></option>
                <?php elseif($status->status_end == "2"): ?>
                    <option value="2" selected><?php echo e(old('status_end', 'new')); ?></option>
                <?php elseif($status->status_end == "3"): ?>
                    <option value="3" selected><?php echo e(old('status_end', 'hit')); ?></option>
                <?php elseif($status->status_end == "4"): ?>
                    <option value="4" selected><?php echo e(old('status_end', 'active')); ?></option>
                <?php elseif($status->status_end == "5"): ?>
                    <option value="5" selected><?php echo e(old('status_end', 'ends')); ?></option>
                <?php elseif($status->status_end == "6"): ?>
                    <option value="6" selected><?php echo e(old('status_end', 'expect')); ?></option>
                <?php elseif($status->status_end == "7"): ?>
                    <option value="7" selected><?php echo e(old('status_end', 'out')); ?></option>
                <?php elseif($status->status_end == "8"): ?>
                    <option value="8" selected><?php echo e(old('status_end', 'not_available')); ?></option>
                <?php endif; ?>
                <option value="1">promotion</option>
                <option value="2">new</option>
                <option value="3">hit</option>
                <option value="4">active</option>
                <option value="5">ends</option>
                <option value="6">expect</option>
                <option value="7">out</option>
                <option value="8">not_available</option>
            </select>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'start date']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'start date']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <input name="start_date" type="datetime-local" value="<?php echo e($status->start_date); ?>"/>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.label','data' => ['name' => 'end date']]); ?>
<?php $component->withName('form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'end date']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <input name="end_date" type="datetime-local" value="<?php echo e($status->end_date); ?>"/>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.button','data' => []]); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Create <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
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
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/admin/products/job/edit.blade.php ENDPATH**/ ?>