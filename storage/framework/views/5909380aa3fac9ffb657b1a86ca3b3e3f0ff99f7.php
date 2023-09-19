<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
    <!-- остальные теги head -->
</head>

<form method="post" action="/<?php echo e(app()->getLocale()); ?>/calculate" id="calculator-form">
    <?php echo csrf_field(); ?>
    <div>
        <label for="initial_mixture"><?php echo e(__('Изначальное количество смеси (г)')); ?>:</label>
        <input type="number" step="0.01" name="initial_mixture" id="initial_mixture" required>
    </div>
    <div>
        <label for="wax"><?php echo e(__('Воск (г)')); ?>:</label>
        <input type="number" step="0.01" name="wax" id="wax" required>
    </div>
    <div>
        <label for="fragrance_percentage"><?php echo e(__('Процент ароматизатора')); ?>:</label>
        <input type="number" step="0.01" name="fragrance_percentage" id="fragrance_percentage" required>
    </div>
    <div>
        <label for="fragrance"><?php echo e(__('Ароматизатор (г)')); ?>:</label>
        <input type="number" step="0.01" name="fragrance" id="fragrance" required>
    </div>
    <button type="submit"><?php echo e(__('Рассчитать')); ?></button>
</form>

<?php if(isset($ratio)): ?>
    <div><?php echo e(__('Соотношение воска к ароматизатору')); ?>: <span id="ratio"><?php echo e($ratio); ?></span></div>
    <div><?php echo e(__('Количество ароматизатора (г)')); ?>: <span id="fragrance-grams"><?php echo e($fragranceGrams); ?></span></div>
    <div><?php echo e(__('Общее количество смеси (г)')); ?>: <span id="total-mixture"><?php echo e($totalMixture); ?></span></div>
    <div><?php echo e(__('Изначальное количество смеси (г)')); ?>: <span id="initial-mixture"><?php echo e($initialMixture); ?></span></div>
<?php endif; ?>

<script>
    const form = document.querySelector('#calculator-form');
    const ratioElement = document.querySelector('#ratio');
    const fragranceGramsElement = document.querySelector('#fragrance-grams');
    const totalMixtureElement = document.querySelector('#total-mixture');
    const initialMixtureElement = document.querySelector('#initial-mixture');

    if (form && ratioElement && fragranceGramsElement && totalMixtureElement && initialMixtureElement) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    ratioElement.textContent = data.ratio;
                    fragranceGramsElement.textContent = data.fragranceGrams;
                    totalMixtureElement.textContent = data.totalMixture;
                    initialMixtureElement.textContent = data.initialMixture;
                });
        });
    }
</script>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/calculate.blade.php ENDPATH**/ ?>