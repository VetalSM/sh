<?php $attributes = $attributes->exceptProps(['article']); ?>
<?php foreach (array_filter((['article']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(App::currentLocale()==='ru' && isset($article->title_ru)): ?>
    <?php
        $title = $article->title_ru;
        $excerpt = $article->excerpt_ru;
    ?>
<?php else: ?>
    <?php
        $title = $article->title;
        $excerpt = $article->excerpt;
    ?>
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">

<article
    <?php echo e($attributes->merge(['class' => 'card-group transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])); ?>>
    <div class="lg:py-4 lg:px-5 py-3 px-4 h-full flex flex-col text-center ">

        <div class=" text-center ">
<?php if($article->status == "8"): ?>
    <?php if(auth()->guard()->check()): ?>
                    <a href="/<?php echo e(app()->getLocale()); ?>/admin/articles/<?php echo e($article->id); ?>/edit">in editing</a>
    <?php endif; ?>
<?php endif; ?>
    <?php if(auth()->guard()->check()): ?>

    <?php endif; ?>
            <img  src="<?php echo e(asset('storage/' . $article->thumbnail)); ?>" loading="lazy"
                  alt="<?php echo e($article->title); ?>" class=" rounded-xl" style="display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width:100%;">
        </div>


        <div class="py-2  flex flex-col justify-between  flex-1  ">
            <header>
                <div style="float:left;">

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.articles.category-art-button','data' => ['category' => $article->category]]); ?>
<?php $component->withName('articles.category-art-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($article->category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <div style="float:right;">
                       <span
                           class=" transition-colors  text-sm duration-300 py-1 px-2 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full "
                           style=" opacity: 0.8; ">
                               <?php echo e($article->created_at->format("d-m-Y")); ?>

                            </span>
                </div>
                <div class="mt-10 lg:mt-10  ">
                    <div>
                        <a href="/<?php echo e(app()->getLocale()); ?>/articles/<?php echo e($article->slug); ?>"  >
                            <h3><?php echo e($title); ?></h3>
                        </a>
                    </div>
                    <div class="mt-3">
                        <?php
                            $ratings = \App\Models\Rating::where('prod_id', 'art.'.$article->id)->get();
                            $rating_sum =  \App\Models\Rating::where('prod_id', 'art.'.$article->id)->sum('stars_rated');
            if($ratings!==0 && $rating_sum!==0){
                            $rating_value = $rating_sum/$ratings->count();
                            $rate_num = number_format($rating_value);}else{
                $rate_num=0;
                            }
                        ?>
                        <div>

                            <div >
                                <?php for($i=1; $i<=$rate_num; $i++): ?>
                                    <i class="fa fa-star checked"></i>
                                <?php endfor; ?>
                                <?php for($j = $rate_num+1;$j <=5;$j++): ?>
                                    <i class="fa fa-star nochecked "></i>
                                <?php endfor; ?>
                                <?php if($rate_num >0): ?>
                                    <span class="font-bold">
                                      &nbsp;  <?php echo e($ratings->count()); ?>

                                    </span>
                                        <span class="text-sm">
                                         &nbsp;  <?php echo e(__("Кількість оцінок")); ?>

                                        </span>
                                <?php else: ?>
                                        <span class="text-sm">
                                            &nbsp; &nbsp;  <?php echo e(__("Немає оцінок")); ?>

                                        </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <div class="mt-39 lg:mt-3  text-center">






                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <footer class=" mt-10 lg:mt-3">
                <div class="text-center">
                        <span name="price" class="transition-colors  text-sm duration-300 py-2 px-1 font-semibold bg-gray-100 hover:bg-gray-300 rounded-full  bt " style="color: #000000; float:left;">
                            <img class="inline px-1" src="/images/view.png" alt="" style="width: 28px;position: relative;  bottom: 3px !important;">
                            <?php echo e($article->views); ?>

                        </span>
                    <span style="float:right;">
                        <a class="   italic    cartbutton_art transition-colors  hover: rounded-3xl py-2 px-1 "
                           style="text-decoration: none;  border: 1px solid rgb(255, 179, 0);float:right;"
                           href="/<?php echo e(app()->getLocale()); ?>/articles/<?php echo e($article->slug); ?>"
                        ><?php echo e(__("Повний опис")); ?></a>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</article>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/articles/article-card.blade.php ENDPATH**/ ?>