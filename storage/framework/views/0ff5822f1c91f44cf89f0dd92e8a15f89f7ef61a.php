<?php $attributes = $attributes->exceptProps(['product']); ?>
<?php foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(App::currentLocale()==='ru' && isset($product->title_ru)): ?>
    <?php
        $title = $product->title_ru;
        $excerpt = $product->excerpt_ru;
    ?>
<?php else: ?>
    <?php
        $title = $product->title;
        $excerpt = $product->excerpt;
    ?>
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
<article
    <?php echo e($attributes->merge(['class' => 'card-group transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])); ?>>
    <div class="py-4 px-5 h-full flex flex-col text-center ">

        <div class="">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.status-product','data' => ['product' => $product]]); ?>
<?php $component->withName('status-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>


        <div class="py-6  flex flex-col justify-between  flex-1  ">
            <header>
                <div style="float:left;">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category-button','data' => ['category' => $product->category]]); ?>
<?php $component->withName('category-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div style="float:right;">
                    <a class=" transition-colors italic text-sm duration-300 py-2 px-2 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
                       href="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>"
                    ><?php echo e(__("Повний опис")); ?></a>
                </div>
                <div class="mt-10 lg:mt-8  ">
                    <div class=" text-2xl">
                        <a href="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>">
                            <?php echo e($title); ?>

                        </a>


                    </div>
                    <div class="mt-2">
                        <?php
                            $ratings = \App\Models\Rating::where('prod_id', $product->id)->get();
                            $rating_sum =  \App\Models\Rating::where('prod_id', $product->id)->sum('stars_rated');
            if($ratings!==0 && $rating_sum!==0){
                            $rating_value = $rating_sum/$ratings->count();
                            $rate_num = number_format($rating_value);}else{
                $rate_num=0;
                            }
                        ?>
                        <div>
                            <div class="mt-39 lg:mt-3  text-center">
                                <?php for($i=1; $i<=$rate_num; $i++): ?>
                                    <i class="fa fa-star checked"></i>
                                <?php endfor; ?>
                                <?php for($j = $rate_num+1;$j <=5;$j++): ?>
                                    <i class="fa fa-star nochecked"></i>
                                <?php endfor; ?>
                                <?php if($rate_num >0): ?>
                                    <span class="font-bold">
                                      &nbsp;  <?php echo e($ratings->count()); ?>

                                    </span>
                                    <span>
                                         &nbsp;<?php echo e(__("Кількість оцінок")); ?>

                                        </span>
                                <?php else: ?>
                                    <span>
                                            &nbsp;<?php echo e(__("Немає оцінок")); ?>

                                        </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="mt-3 lg:mt-3 card-text" style=" line-height: 1.4em;">
                <?php echo $excerpt; ?>

            </div>
            <footer class=" mt-10 lg:mt-3">
                <div class="text-center">
                    <form action="<?php echo e(route('cart.store', app()->getLocale())); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <?php

                            $prices = DB::table('prices')->where('name', "$product->prices")->get();
                              $sorted = $prices->sortBy('price');
                        ?>
                        <input type="hidden" value="<?php echo e($product->id . time()); ?>" name="id">
                        <select name="price" class="bt rounded-full py-2 px-1" style="float:left;">
                            <?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($price->price); ?> "
                                <?php if($price->weight === "10" && $price->unit === 'г'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                    <?php endif; ?>
                                >
                                    <?php echo e($price->weight); ?><?php echo e($price->unit); ?> <?php echo e($price->price); ?><?php echo e($price->currency); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>



                        </select>
                        <input type="hidden" value="<?php echo e($product->prices); ?>" name="prices">
                        <input type="hidden" value="<?php echo e($product->id); ?>" name="prod_id">
                        <input type="hidden" value="<?php echo e($title); ?>" name="name">
                        <input type="hidden" value="<?php echo e($product->thumbnail); ?>" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <?php if($product->status !== "7"): ?>
                            <button
                                class=" cartbutton transition-colors  hover: rounded-3xl py-2 px-1 " style="float:right;">
                                 <?php echo e(__("Купити")); ?>

                            </button>
                        <?php else: ?>
                            <button type="button" style="float:right; pointer-events: none; background-color: #c0bebe;"
                                    class="transition-colors  hover: rounded-3xl py-2 px-1 "  disabled><?php echo e(__("Закінчився")); ?>

                            </button>
                        <?php endif; ?>

                    </form>
                </div>
            </footer>
        </div>
    </div>
</article>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/components/product-card.blade.php ENDPATH**/ ?>