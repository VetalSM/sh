<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

<?php if(App::currentLocale()==='ru' && isset($product->title_ru)): ?>
        <?php
            $title = $product->title_ru;
            $body = $product->body_ru;
              $excerpt = $product->excerpt_ru;
        ?>
        <?php $__env->startSection('title'); ?><?php echo e($title); ?> Украина MadeIS <?php $__env->stopSection(); ?>
        <?php $__env->startSection('title_m'); ?><?php echo e($product->meta_title_ru); ?><?php $__env->stopSection(); ?>
        <?php $__env->startSection('description'); ?><?php echo e($product->meta_description_ru); ?><?php $__env->stopSection(); ?>
        <?php $__env->startSection('keywords'); ?><?php echo e($product->meta_keywords); ?><?php $__env->stopSection(); ?>
    <?php else: ?>
        <?php
            $title = $product->title;
             $body = $product->body;
             $excerpt = $product->excerpt;
        ?>
        <?php $__env->startSection('title'); ?><?php echo e($title); ?> | Товари для свічок | MadeIS Україна<?php $__env->stopSection(); ?>
        <?php $__env->startSection('title_m'); ?><?php echo e($product->meta_title); ?><?php $__env->stopSection(); ?>
        <?php $__env->startSection('description'); ?><?php echo e($product->meta_description); ?><?php $__env->stopSection(); ?>
        <?php $__env->startSection('keywords'); ?><?php echo e($product->meta_keywords); ?><?php $__env->stopSection(); ?>

    <?php endif; ?>
    <?php $__env->startSection('og:image'); ?><?php echo e(asset('storage/' . $product->thumbnail)); ?><?php $__env->stopSection(); ?>
    <?php $__env->startSection('og:title'); ?><?php echo e($title); ?><?php $__env->stopSection(); ?>
    <?php $__env->startSection('og:description'); ?><?php echo e($excerpt); ?><?php $__env->stopSection(); ?>
    <?php $__env->startSection('og:page_url'); ?><?php echo e(url()->current()); ?><?php $__env->stopSection(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <main class="max-w-6xl mx-auto px-3 mt-10 lg:mt-20 space-y-6">
        <article class="max-w-5xl mx-auto lg:grid lg:grid-cols-12 gap-x-5">
            <div class="col-span-4  lg:pt-14  ">
                <div class=" text-center ">
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
                    <div>
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
                            <div class="  mt-3 lg:mt-0 lg:text-center">
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
                                         &nbsp;  <?php echo e(__("Кількість оцінок")); ?>

                                        </span>
                                <?php else: ?>
                                    <span>
                                            &nbsp; &nbsp;  <?php echo e(__("Немає оцінок")); ?>

                                        </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <form action="<?php echo e(url('/'.app()->getLocale().'/add-rating')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title " id="exampleModalLabel">
                                                    <?php echo e(__("Оцінити")); ?> <?php echo e($product->title); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="rating-css">
                                                    <div class=" star-icon">
                                                        <input type="radio" value="1" name="product_rating" checked
                                                               id="rating1">
                                                        <label for="rating1" class="fa fa-star"></label>
                                                        <input type="radio" value="2" name="product_rating"
                                                               id="rating2">
                                                        <label for="rating2" class="fa fa-star"></label>
                                                        <input type="radio" value="3" name="product_rating"
                                                               id="rating3">
                                                        <label for="rating3" class="fa fa-star"></label>
                                                        <input type="radio" value="4" name="product_rating"
                                                               id="rating4">
                                                        <label for="rating4" class="fa fa-star"></label>
                                                        <input type="radio" value="5" name="product_rating"
                                                               id="rating5">
                                                        <label for="rating5" class="fa fa-star"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class=" rounded-2xl btn btn-secondary"
                                                        data-bs-dismiss="modal"><?php echo e(__("Закрити")); ?>

                                                </button>
                                                <button type="submit"
                                                        class="bg-blue-500 text-white uppercase font-semibold text-xl lg:text-sm py-2.5 px-8 rounded-2xl hover:bg-blue-600">
                                                    <?php echo e(__("Оцінити")); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button type="button" class="bg-blue-500 text-white  mt-2 py-1 px-6 rounded-2xl hover:bg-blue-600"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <?php echo e(__("Оцінити")); ?>

                    </button>
                </div>
                <div class="  lg:mt-0 py-4 text-center " >
                    <form action="<?php echo e(route('cart.store', app()->getLocale())); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php
                            $prices = DB::table('prices')->where('name', "$product->prices")->get();
                              $sorted = $prices->sortBy('price');
                        ?>
                        <input type="hidden" value="<?php echo e($product->id . time()); ?>" name="id">
                        <?php if($product->status==="1"): ?>
                            <select name="price" id="selectbox1" class="selectPrice bt rounded-full py-2 px-1"
                                    style="float:left;">
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

                                                    <option
                                                        value="<?php echo e(\App\Models\Price::where('name', $product->prom_prices)->where('weight', $price->weight)->value('price')); ?> "
                                                    <?php if($price->weight === "10" && $price->unit === 'г'): ?>
                                                        <?php echo e('selected="selected"'); ?>

                                                        <?php endif; ?>
                                                    >
                                                        <?php echo e($price->weight); ?><?php echo e($price->unit); ?>  <?php echo e(\App\Models\Price::where('name', $product->prom_prices)->where('weight', $price->weight)->value('price').$price->currency); ?> <?php echo e($price->price); ?><?php echo e($price->currency); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                            <input type="hidden" value="<?php echo e($product->prom_prices); ?>" name="prices">
                            <input type="hidden" value="<?php echo e($product->id); ?>" name="prod_id">
                            <input type="hidden" value="<?php echo e($title); ?>" name="name">
                            <input type="hidden" value="<?php echo e($product->thumbnail); ?>" name="image">
                            <input type="hidden" value="1" name="quantity">
                        <?php else: ?>
                            <select name="price" class="bt rounded-full py-2 px-1" style=" float:left;">

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
                                                        <?php echo e($price->weight); ?><?php echo e($price->unit); ?>  <?php echo e($price->price); ?><?php echo e($price->currency); ?>

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
                        <?php endif; ?>

                        <?php
                            $button = false;
                        ?>
                        <?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = \App\Models\BalanceProduct::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $data= $balance->count - (\App\Models\Order::where('product_id', $balance->product_id)->sum('total'));
                                ?>
                                <?php if((int)$balance->product_id === $product->id): ?>
                                    <?php if($data >= $price->weight ): ?>
                                        <?php if((int)$price->weight <= $data): ?>
                                            <?php
                                                $button = true;
                                            ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($button === true && ($product->status !== "7")): ?>
                            <button
                                class=" cartbutton transition-colors  hover: rounded-3xl  py-2 px-2 " style="float: right">
                                <?php echo e(__("Купити")); ?>

                            </button>
                        <?php else: ?>
                            <button type="button" style=" pointer-events: none; background-color: #c0bebe;"
                                    class="transition-colors  hover: rounded-3xl ml-6 py-2 px-2 "
                                    disabled><?php echo e(__("Закінчився")); ?>

                            </button>
                        <?php endif; ?>
                    </form>

                </div>
            </div>
            <div class="col-span-7" style="margin-top: 20px;">
                <h1 class="font-bold text-2xl lg:text-3xl text-center  mt-0 lg:mt-0 mb-3">
                    <?php echo e($title); ?>

                </h1>
                <div>
                    <a href="<?php echo e(session('prod_url')); ?>"
                       class="transition-colors duration-300 relative inline-flex  hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        <?php echo e(__("До каталогу")); ?>

                    </a>
                  <a rel="nofollow" href="#comment"
                       class="transition-colors duration-300 relative inline-flex  hover:text-blue-500" style="float:right;">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <img class="" src="/images/comment.svg" alt="comment" rel=”nofollow"  width="15" height="15">
                            </g>
                        </svg>&nbsp;
                        <?php echo e(__("Коментарі")); ?> (<?php echo e(\App\Models\Comment::all()->where('product_id', $product->id)->count('product_id')); ?>)
                    </a>


                    <div class=" mt-2 mb-4  space-y-4 leading-loose" style=" line-height: 1.5em;">
                        <?php echo $body; ?>

                    </div>
                    <?php if(isset($product->ifra_certificate)): ?>
                        <div class="flex items-center  mt-1 lg:mt-0 ">
                            <a href="<?php echo e(asset('storage/' . $product->ifra_certificate)); ?>"
                               class="  py-1 px-2  border-opacity-8 mb-1 rounded-xl label inline-flex text-black"
                               target="_blank" style="  text-decoration: none;background-color: rgb(212 212 216);">
                                <img src="/images/ifra.png" alt="Logo" width="20" height="20"
                                     class="text-black rounded-l ">
                                <span class="  px-2" style="color: rgb(38,46,58)">IFRA Certificate</span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($product->safety)): ?>
                        <div class="flex items-center  mt-1 lg:mt-0">
                            <a href="<?php echo e(asset('storage/' . $product->safety)); ?>"
                               class="  py-1 px-2  border-opacity-8 mb-1 rounded-xl label inline-flex text-black"
                               target="_blank" style="  text-decoration: none;background-color: rgb(212 212 216);">
                                <img src="/images/pdf.png" alt="Logo" width="20" height="20"
                                     class="text-black rounded-l">
                                <span class="  px-2" style="color: rgb(38,46,58)">Safety Data Sheet</span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($product->certificate)): ?>
                        <div class="flex items-center  mt-1 lg:mt-0 ">
                            <a href="<?php echo e(asset('storage/' . $product->certificate)); ?>"
                               class="  py-1 px-2  border-opacity-8 mb-1 rounded-xl label inline-flex text-black"
                               target="_blank" style="  text-decoration: none;background-color: rgb(212 212 216);">
                                <img src="/images/pdf.png" alt="Logo" width="20" height="20"
                                     class="text-black rounded-l">
                                <span class="  px-2" style="color: rgb(38,46,58)">Certificate</span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        <?php echo $__env->make('products._add-comment-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product-comment','data' => ['comment' => $comment]]); ?>
<?php $component->withName('product-comment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['comment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($comment)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </section>
                </div>
            </div>
        </article>

    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/products/show.blade.php ENDPATH**/ ?>