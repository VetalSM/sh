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
    <div class="lg:py-4 lg:px-5 py-4 px-4 h-full flex flex-col text-center ">

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


        <div class="py-3  flex flex-col justify-between  flex-1  ">
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
                    <a class=" transition-colors italic text-xs duration-300 py-1 px-2 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full " style=" opacity: 0.8; border: 1px solid rgb(255, 179, 0);"
                       href="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>"
                    ><?php echo e(__("Повний опис")); ?></a>
                </div>
                <div class="mt-10 lg:mt-10  ">
                    <div>
                        <a href="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>"  >
                            <h4><?php echo e($title); ?></h4>
                        </a>


                    </div>
                    <div class="mt-1">
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
                                    <span>
                                        <noindex><a rel="nofollow" class=" transition-colors  text-xs  py-2 px-2 font-semibold  "
                                             href="/<?php echo e(app()->getLocale()); ?>/products/<?php echo e($product->slug); ?>/#comment"
                                          ><?php echo e(__("Коментарі")); ?> (<?php echo e(\App\Models\Comment::all()->where('product_id', $product->id)->count('product_id')); ?>)</a></noindex>

                                    </span>












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











                        <?php if($product->status==="1"): ?>
                            <select name="price" class="bt rounded-full py-2 px-1" style="color: red; float:left;">
                                <?php else: ?>
                        <select name="price" class="bt rounded-full py-2 px-1" style=" float:left;">
                            <?php endif; ?>
                            <?php
                                    $button = false;
                                    $balanceProducts = \App\Models\BalanceProduct::with('orders')->where('product_id', $product->id)->get();
                            ?>
                            <?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $balanceProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php

                                        $data= $balance->count - (\App\Models\Order::where('product_id', $balance->product_id)->sum('total'));
                                    ?>
                                    <?php if((int)$balance->product_id === $product->id): ?>
                                        <?php if($data >= $price->weight ): ?>
                                            <?php if((int)$price->weight <= $data): ?>
                                                <?php if( $data >=1): ?>
                                                    <?php
                                                        $button = true;

                                                    ?>
                                                <?php endif; ?>
                                                <option value="<?php echo e($price->price); ?> "
                                                <?php if($price->weight === "10" && $price->unit === 'г'): ?>
                                                    <?php echo e('selected="selected"'); ?>

                                                    <?php endif; ?>
                                                >
                                                    <?php echo e($price->weight); ?><?php echo e($price->unit); ?> <?php echo e($price->price); ?><?php echo e($price->currency); ?>

                                                </option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>



                        <input type="hidden" value="<?php echo e($product->prices); ?>" name="prices">
                        <input type="hidden" value="<?php echo e($product->id); ?>" name="prod_id">
                        <input type="hidden" value="<?php echo e($title); ?>" name="name">
                        <input type="hidden" value="<?php echo e($product->thumbnail); ?>" name="image">
                        <input type="hidden" value="1" name="quantity">
                                    <?php

//                                        $button = \App\Models\BalanceProduct::where('product_id', $product->id)
//                                            ->whereRaw('count - (SELECT COALESCE(SUM(total), 0) FROM orders WHERE product_id = balance_products.product_id) >= ?', [$sorted->max('weight')])
//                                            ->exists();
//                                           var_dump($button);
                                    ?>

                        <?php if($button === true && ($product->status !== "7")): ?>
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
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/product-card.blade.php ENDPATH**/ ?>