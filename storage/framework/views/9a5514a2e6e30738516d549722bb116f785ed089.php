<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []]); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if(App::currentLocale() ==='ua'): ?>
        <?php $__env->startSection('title'); ?>Калькулятори для свічковаріння, калькулятори для кендлмейкерів, калькулятори для розрахунку воску та віддушки.<?php $__env->stopSection(); ?>
        <?php $__env->startSection('description'); ?>Правильний розрахунок введення віддушки у віск, як розрахувати кількість аромаолії для свічки, розрахунок воску, розрахунок аромаолії, кількість віддушки для соєвого воску.Калькулятори для свічок, калькулятори для аромаолії, свічний калькулятор<?php $__env->stopSection(); ?>
    <?php else: ?>
        <?php $__env->startSection('title'); ?>Калькуляторы для свечения, калькуляторы для кендлмейкеров, калькуляторы для расчета воска и отдушки.<?php $__env->stopSection(); ?>
        <?php $__env->startSection('description'); ?>Правильный расчет ввода отдушки в воск, как рассчитать количество аромаоли для свечи, расчет воска, расчет аромаоли, количество отдушки для соевого воска.Калькуляторы для свечей, калькуляторы для ароматических масел, свечной калькулятор<?php $__env->stopSection(); ?>

    <?php endif; ?>

    <!-- start  fragranceWax-->
    <figure class="shadow-lg pin-r pin-y px-10 text-center">
        <h5 style="margin-bottom: 1rem; margin-top: 20px;">
            <?php echo e(__(" Вам підійде цей калькулятор, якщо у вас є дані: ")); ?>

        </h5>
        <div class=" calcul_bord">
            <figcaption class=" blockquote-footer" style="margin-bottom: 1rem; color: #13b003">
                <?php echo e(__("Вага чистого воску")); ?>

            </figcaption>
            <figcaption class="blockquote-footer" style="margin-bottom: 0rem; color: #13b003">
                <?php echo e(__("Бажаний % віддушки")); ?>

            </figcaption>
        </div>
        <blockquote class="blockquote">
            <p><a href="#" onclick="fragranceWax()"><?php echo e(__(("Відкрити калькулятор"))); ?></a></p>
        </blockquote>
    </figure>
    <!-- end  fragranceWax-->
    <!-- start  allWax-->
    <figure class="shadow-lg pin-r pin-y px-10 text-center">
        <h5 style="margin-bottom: 1rem; margin-top: 20px;">
            <?php echo e(__(" Вам підійде цей калькулятор, якщо у вас є дані: ")); ?>

        </h5>
        <div class=" calcul_bord">
            <figcaption class="blockquote-footer" style="margin-bottom: 1rem;color: #13b003">
                <?php echo e(__("Вага суміші (віск + віддушка)")); ?>

            </figcaption>
            <figcaption class="blockquote-footer" style="margin-bottom: 0rem;color: #13b003">
                <?php echo e(__("Бажаний % віддушки")); ?>

            </figcaption>
        </div>
        <blockquote class="blockquote">
            <p><a href="#" onclick="allWax()"><?php echo e(__(("Відкрити калькулятор"))); ?></a></p>
        </blockquote>
    </figure>
    <!-- end  allWax-->

    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    








    <!-- start  fragranceWax-->
    <script>
        function fragranceWax() {
            var calculatorModal = new bootstrap.Modal(document.getElementById('fragranceWax'))
            calculatorModal.show()
        }
    </script>
    <div class="modal fade" id="fragranceWax" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="calculatorModalLabel"><?php echo e(__("Визначення ваги віддушки у відношенні до ваги воску")); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="fragranceWax">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="wax" class="form-label"><?php echo e(__(("Віск"))); ?> (г):</label>
                            <input type="number" step="0.01" name="wax" id="fragranceWax_wax" class="form-control"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="fragrance_percentage"
                                   class="form-label"><?php echo e(__("Відсоток ароматизатору (від 3 до 10%):")); ?></label>
                            <input type="number" step="0.01" min="3" max="10" name="fragrance_percentage"
                                   id="fragranceWax_fragrance_percentage" class="form-control" required>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        <button type="submit" class="float-end btn btn-primary"><?php echo e(__("Розрахувати")); ?></button>
                        <p class="font-semibold"><?php echo e(__("Результат")); ?>: </p><span id="result"></span>

                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"><?php echo e(__("Закрити")); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Обработчик события submit для формы
        document.getElementById('fragranceWax').addEventListener('submit', function (event) {
            // Отменяем перенаправление на другую страницу
            event.preventDefault();

            // Получаем значения из полей ввода
            var wax = parseFloat(document.getElementById('fragranceWax_wax').value);
            // var fragrance = parseFloat(document.getElementById('fragrance').value);
            var percentage = parseFloat(document.getElementById('fragranceWax_fragrance_percentage').value);
            // Выполняем расчет
            var fragrance = (wax * percentage) / 100;
            var total = fragrance + wax;

            // Отображаем результаты в модальном окне
            document.getElementById('result').innerHTML =
                "<?php echo e(__("Віск")); ?>: " + wax + " г" + " " +
                "<br/>" + " <?php echo e(__("Відсоток")); ?>: " + percentage + "%" +
                "<br/>" + " <?php echo e(__("Віддушка")); ?>: " + fragrance.toFixed(2) + " г" +
                "<br/>" + " <?php echo e(__("Вага суміші (віск + віддушка)")); ?>: " + total + " г";


            // Закрываем модальное окно после выполнения расчета

        });
    </script>
    <!-- end  fragranceWax-->

    <!-- start  allWax-->
    <script>
        function allWax() {
            var calculatorModal = new bootstrap.Modal(document.getElementById('allWax'))
            calculatorModal.show()
        }
    </script>
    <div class="modal fade" id="allWax" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="calculatorModalLabel"><?php echo e(__("Визначення ваги віддушки у відношенні до ваги воску")); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="allWax">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="total_mixture" class="form-label"><?php echo e(__("Загальна кількість суміші")); ?>

                                (г):</label>
                            <input type="number" step="0.01" name="total_mixture" id="allWax_total_mixture"
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fragrance_percentage"
                                   class="form-label"><?php echo e(__("Відсоток ароматизатору (від 3 до 10%):")); ?></label>
                            <input type="number" step="0.01" min="3" max="10" name="fragrance_percentage"
                                   id="allWax_fragrance_percentage" class="form-control" required>
                        </div>
                        
                        
                        
                        

                        <button type="submit" class="float-end btn btn-primary"><?php echo e(__("Розрахувати")); ?></button>
                        <p class="font-semibold"><?php echo e(__("Результат")); ?>: </p><span id="result1"></span>

                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"><?php echo e(__("Закрити")); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Обработчик события submit для формы
        document.getElementById('allWax').addEventListener('submit', function (event) {
            // Отменяем перенаправление на другую страницу
            event.preventDefault();

            // Получаем значения из полей ввода
            var total_mixture = parseFloat(document.getElementById('allWax_total_mixture').value);
            // var fragrance = parseFloat(document.getElementById('fragrance').value);
            var percentage = parseFloat(document.getElementById('allWax_fragrance_percentage').value);
            // Выполняем расчет
            var fragrance = (total_mixture / (100 + percentage)) * percentage;
            var wax = (total_mixture / (100 + percentage)) * 100;


            // Отображаем результаты в модальном окне
            document.getElementById('result1').innerHTML =
                "<?php echo e(__("Віск")); ?>: " + wax.toFixed(2) + " г" + " " +
                "<br/>" + " <?php echo e(__("Відсоток")); ?>: " + percentage + "%" +
                "<br/>" + " <?php echo e(__("Віддушка")); ?>: " + fragrance.toFixed(2) + " г" +
                "<br/>" + " <?php echo e(__("Вага суміші (віск + віддушка)")); ?>: " + total_mixture + " г";


            // Закрываем модальное окно после выполнения расчета

        });
    </script>
    <!-- end  allWax-->


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/calculator/index.blade.php ENDPATH**/ ?>