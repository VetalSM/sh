<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.layout-art','data' => []]); ?>
<?php $component->withName('articles.layout-art'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

    <?php if(App::currentLocale()==='ru' && isset($article->title_ru)): ?>
        <?php
            $title = $article->title_ru;
            $body = $article->body_ru;
              $excerpt = $article->excerpt_ru;
        ?>
        <?php $__env->startSection('title'); ?>
            <?php echo e($title); ?>| Всё про свечи | Украина MadeIS
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('title_m'); ?>
            <?php echo e($article->meta_title_ru); ?>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('description'); ?>
            <?php echo e($article->meta_description_ru); ?>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('keywords'); ?>
            <?php echo e($article->meta_keywords); ?>

        <?php $__env->stopSection(); ?>
    <?php else: ?>
        <?php
            $title = $article->title;
             $body = $article->body;
             $excerpt = $article->excerpt;
        ?>
        <?php $__env->startSection('title'); ?>
            <?php echo e($title); ?> | Виготовлення свічок | MadeIS Україна
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('title_m'); ?>
            <?php echo e($article->meta_title); ?>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('description'); ?>
            <?php echo e($article->meta_description); ?>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('keywords'); ?>
            <?php echo e($article->meta_keywords); ?>

        <?php $__env->stopSection(); ?>

    <?php endif; ?>
    <?php $__env->startSection('og:image'); ?>
        <?php echo e(asset('storage/' . $article->thumbnail)); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('og:title'); ?>
        <?php echo e($title); ?>

    <?php $__env->stopSection(); ?>
    <?php if(App::currentLocale()=='ua'): ?>
        <?php $__env->startSection('og:description'); ?><?php echo e(strip_tags($article->excerpt )); ?><?php $__env->stopSection(); ?>
        <?php elseif(App::currentLocale()=='ru'): ?>

            <?php $__env->startSection('og:description'); ?><?php echo e(strip_tags($article->excerpt_ru )); ?><?php $__env->stopSection(); ?>
            <?php endif; ?>


        <?php $__env->startSection('og:page_url'); ?>
            <?php echo e(url()->current()); ?>

        <?php $__env->stopSection(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
        <main class="max-w-6xl mx-auto px-3 mt-5 lg:mt-20 space-y-6">
            <article class="max-w-4sm mx-auto lg:grid lg:grid-cols-11 gap-x-5">
                <div class="col-span-4  lg:pt-14  ">
                    <div class=" text-center ">
                        <div class=" text-center ">

                            <img src="<?php echo e(asset('storage/' . $article->thumbnail)); ?>" loading="lazy"
                                 alt="<?php echo e($article->title); ?>" class=" rounded-xl" style="display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                width:100%;">
                        </div>
                    </div>

                </div>
                <div class="col-span-7">
                    <h1 class="font-bold text-2xl lg:text-3xl text-center  mt-3 lg:mt-0 mb-4">
                        <?php echo e($title); ?>

                    </h1>
                    <div class=" rounded-xl " style="line-height: 1.5em; background-color: rgba(230,232,230,0.47)">
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
                            <?php echo e(__("Назад")); ?>

                        </a>


                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <?php
                            $ratings = \App\Models\Rating::where('prod_id', 'art.'.$article->id)->get();
                            $rating_sum =  \App\Models\Rating::where('prod_id','art.'.$article->id)->sum('stars_rated');
                            if($ratings!==0 && $rating_sum!==0){
                            $rating_value = $rating_sum/$ratings->count();
                            $rate_num = number_format($rating_value);}else{
                            $rate_num=0;
                            }
                        ?>
                        <div>

                            <div>
                                <div class="d-inline " style="padding-left: 5px;">

                                    <?php for($i=1; $i<=$rate_num; $i++): ?>
                                        <i class=" fa fa-star checked"></i>
                                    <?php endfor; ?>
                                    <?php for($j = $rate_num+1;$j <=5;$j++): ?>
                                        <i class="fa fa-star nochecked "></i>
                                    <?php endfor; ?>
                                    <?php if($rate_num >0): ?>
                                </div>
                                <span class="d-inline-block font-bold">
                              &nbsp;  <?php echo e($ratings->count()); ?>

                            </span>
                                <span class=" text-sm">
                                 &nbsp;  <?php echo e(__("Кількість оцінок")); ?>

                                </span>

                                <hr style="height:2px; margin-bottom: 0rem;"/>
                                <?php else: ?>
                                    <span class=" text-sm">
                                    &nbsp; &nbsp;  <?php echo e(__("Немає оцінок")); ?>

                                </span>
                                    <hr style="height:2px;"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="px-2 mb-4 space-y-4 leading-loose" style=" line-height: 1.5em;">
                            <?php echo $excerpt; ?>

                        </div>
                        <section class="col-span-8 col-start-5 mt-10 space-y-6">
                            
                            
                            
                            
                        </section>
                    </div>

                </div>
            </article>

            <div class="px-2" > <?php echo $body; ?></div>
            <hr style="height:2px;"/>
            <div><span class="font-semibold"><?php echo e(__('Пошук за хештегами:')); ?></span>
                <?php $__currentLoopData = $article->hashtags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hashtag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-4">   <a style=" text-decoration: none"
                                             href="/<?php echo e(app()->getLocale()); ?>/articles/?hashtag=<?php echo e($hashtag->name); ?>&<?php echo e(http_build_query(request()->except('hashtag', 'page'))); ?>">
        <?php if(App::currentLocale()==='ua'): ?>
                                #<?php echo e(__(ucwords($hashtag->name))); ?>

                            <?php else: ?>
                                #<?php echo e(__(ucwords($hashtag->name_ru))); ?>

                            <?php endif; ?>
    </a></span>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr style="height:2px;"/>
            <div>
                <div>
                    <div>

                        <form action="<?php echo e(url('/'.app()->getLocale().'/add-rating')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="art.<?php echo e($article->id); ?>">
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">
                                                <?php echo e(__("Оцінити")); ?> <?php echo e($article->title); ?></h5>
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
                                                    class=" bg-blue-500 text-white uppercase font-semibold text-xl lg:text-sm py-2.5 px-8 rounded-2xl hover:bg-blue-600">
                                                <?php echo e(__("Оцінити")); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-inline-block">
                    <button type="button"
                            class="inline-block bg-blue-500 text-white   py-1 px-6 rounded-2xl hover:bg-blue-600"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <?php echo e(__("Оцінити")); ?>

                    </button>
                </div>
                <span class="inline-block  py-1 px-6 float-right"><?php echo e($article->created_at->format("d-m-Y")); ?></span>
                <span class="inline-block   py-1 float-right"><?php echo e(__('Перегляди:')); ?> <?php echo e($article->views); ?></span>
            </div>
        </main>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/articles/show.blade.php ENDPATH**/ ?>