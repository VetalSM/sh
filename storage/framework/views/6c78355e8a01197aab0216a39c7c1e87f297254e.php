<!DOCTYPE html>
<html>
<head>
    <title>Баланс</title>
</head>
<body>
<?php if(isset($balance)): ?>
    <p>Баланс: <?php echo e($balance); ?></p>
<?php else: ?>
    <p><?php echo e($error); ?></p>
<?php endif; ?>
</body>
</html>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/balance.blade.php ENDPATH**/ ?>