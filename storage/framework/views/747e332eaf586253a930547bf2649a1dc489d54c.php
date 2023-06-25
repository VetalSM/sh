<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<main class="max-w-6xl mx-auto my-8">
    <div class=" px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">

             <?php if(empty(Session::get('success')) and empty(Session::get('error'))): ?>
                <p style="color: #0a58ca">
                    <?php echo e(__("Додавання товару у кошик не є бронюванням. Для бронювання товару за вами, будь ласка оформіть замовлення до кінця!")); ?>

                </p>
             <?php endif; ?>

















                <p/>
                <?php if($message = Session::get('success')): ?>
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800 text-xl lg:text-base"><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <?php if($message = Session::get('error')): ?>
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class=" text-xl lg:text-base" style="color: #b90303"><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>

                <h3 class="text-3xl text-bold"><?php echo e(__("Кошик")); ?></h3>
                <div class="flex-1">
                    <table class="w-full md:table-auto" cellspacing="0">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left"><?php echo e(__("Найменування")); ?></th>
                            <th class="pl-5 text-left lg:text-center lg:pl-5">
                                <span class="lg:hidden" title="Quantity">К-ть</span>
                                <span class="hidden lg:inline"><?php echo e(__("Кількість")); ?></span>
                            </th>
                            <th class="hidden text-right md:table-cell"> <?php echo e(__("ціна")); ?></th>
                            <th class="hidden text-right md:table-cell"> <?php echo e(__("Видалити")); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="<?php echo e(asset('storage/' . $item->attributes->image )); ?>" alt="image"
                                             width="80" height="80">
                                    </a>
                                </td>
                                <td>
                                    <a href="#"></a>
                                        <?php
                                             $pricesName = $item->attributes->prices;
                                              $price = DB::table('prices')->where('name', "$pricesName")->where('price', "$item->price")->first();
                                             if(!isset($price->currency)) {
                                                 $price->currency=" ";
                                             }
                                        ?>
                                        <span class="mb-3 text-2xl lg:text-base"><?php echo e(Str::limit($item->name,10)); ?>

                                        </span>
                                        <br>
                                        <h10 class="font-bold text-2xl lg:text-base text-blue-700">
                                        <?php echo e($price->weight. $price->unit); ?> <span class="text-black"><?php echo e('('.$item->price.' '.$price->currency.')'); ?></span>
                                        </h10>



                                </td>
                                <td class="justify-center mt-8 md:justify-center md:flex">
                                    <div class="h-10 w-35">
                                        <div class="relative  flex flex-row w-full h-8">

                                            <form action="<?php echo e(route('cart.update',app()->getLocale())); ?>" method="POST">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="prod_weight" value="<?php echo e($item->attributes->weight); ?>">
                                                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                                <input type="hidden" name="id_prod" value="<?php echo e($item->attributes->prod_id); ?>">
                                                <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>"
                                                       class="w-7 text-center bg-gray-300" style="width: 2.5em"/>
                                                <button type="submit" class="px-1  ml-2 text-white text-base lg:text-base rounded-xl bg-blue-500">
                                                    <?php echo e(__("оновити")); ?>

                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden  text-right md:table-cell "  style="padding: 0px 0px 18px 0;">
                                <span class="text-2xl lg:text-base font-medium lg:text-base  max-height">
                                    <?php echo e($item->price*$item->quantity); ?> <?php echo e($price->currency); ?>

                                </span>
                                </td>
                                <td class="text-right md:table-cell " style="padding: 1px 25px 0px 0;">
                                    <form action="<?php echo e(route('cart.remove',app()->getLocale())); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($item->id); ?>" name="id">
                                        <button class="px-3 py-0.5 text-white bg-red-600  rounded-full">x</button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>













                    <div class="text-xl">
                        <?php if(isset($price->currency)): ?>




                                <?php echo e(__("Загальна вартість: ")); ?> <?php echo e(Cart::getTotal()); ?><?php echo e($price->currency); ?>

                                <input type="hidden" value="<?php echo e(Cart::getTotal()); ?>" name="total" class="text-xs" />











                        <?php endif; ?>

                    </div>
                    <br>
                    <div>
                        <form action="<?php echo e(route('cart.clear',app()->getLocale())); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="px-6 py-2 text-red-800 bg-red-300 text-xl lg:text-base  rounded-full"><?php echo e(__("Очистити кошик")); ?></button>
                        </form>

                        <form action="<?php echo e(route('order',app()->getLocale())); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                
                                <h3 style="color: #000000" for="escola"><?php echo e(__("Контактні дані:")); ?></h3>
                                <input type="hidden" value="<?php echo e($cartItems); ?>" name="name">












                                <?php
                                                                       $text=[];
                                          foreach($cartItems as $f=>$b){
                                                     $w = $b->attributes['weight'];
                                                     $p = $b->price;
                                         $price = DB::table('prices')->where('weight', "$w")->where('price', "$p")->first();
                                    if(!isset($price->currency)) {
                               $price->currency=" ";
                                                         }
                               $text[]=$b->name.' '.$price->weight.' '.$price->unit.': '.$b->price.' '.$price->currency.
                           ' к-во'.': '.$b->quantity. '|'.' Всього: '.$b->price*$b->quantity.' '.$price->currency."\n";}
                                ?>
                                <input type="hidden" value="<?php echo e(implode("", $text)); ?>" name="name" class="text-xs" required/>





                                    <input type="hidden" value="<?php echo e(Cart::getTotal()); ?>" name="total" class="text-xs" />

                              <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6">tel</p> <input type="tel" placeholder="+380" name="tel" value="<?php echo e(old('tel')); ?>" class="text-2xl lg:text-base border border-gray-200  p-2 w-full rounded" required/>
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
                             <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6"><?php echo e(__("email")); ?></p>  <input type="email" placeholder="email" name="email"  value="<?php echo e(old('email')); ?>"  class="text-2xl lg:text-base border border-gray-200  p-2 w-full rounded" required/>
                              <p class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6"><?php echo e(__("П.І.Б")); ?></p> <input type="text" placeholder="<?php echo e(__("Прізвище, Ім'я")); ?>" name="П.І.Б" value="<?php echo e(old('П_І_Б')); ?>" class="text-2xl lg:text-base border border-gray-200  p-2 w-full rounded" required/>
                               <p  class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6" ><?php echo e(__("Адреса: населений пункт, № відділення Нової Пошти")); ?></p>  <input type="text" placeholder="<?php echo e(__("Адреса")); ?>" name="address" value="<?php echo e(old('address')); ?>" class="border  text-2xl lg:text-base border-gray-200  p-2 w-full rounded" required/>
                                <p  class="block mb-2 uppercase font-bold text-2xl lg:text-base text-gray-700   w-full rounded mt-6" ><?php echo e(__("Коментар до замовлення")); ?></p>  <textarea  placeholder="<?php echo e(__("Коментар")); ?>" name="comment" class="border  text-2xl lg:text-base border-gray-200  p-2 w-full rounded" ><?php echo e(old('comment')); ?></textarea>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-danger btn-lg"><?php echo e(__("Замовити")); ?></button>
                                <a href="/<?php echo e(app()->getLocale()); ?>" class="btn btn-primary btn-lg"><?php echo e(__("Повернутись до покупок")); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php /**PATH /home/yx479316/madeis.com.ua/www/resources/views/components/cart.blade.php ENDPATH**/ ?>