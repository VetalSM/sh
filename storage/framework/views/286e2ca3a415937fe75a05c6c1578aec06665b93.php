<!DOCTYPE html>
<html>
<head>
    <title>List of Routes</title>
</head>
<body>
<h1>List of Routes</h1>

<table>
    <thead>
    <tr>
        <th>URI</th>
        <th>Methods</th>
        <th>Name</th>
        <th>Action</th>
        <th>Status Code</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php dd($routes); ?>
        <tr>
            <td><?php echo e($route['uri']); ?></td>
            <td><?php echo e(implode(', ', $route['methods'])); ?></td>
            <td><?php echo e($route['name']); ?></td>
            <td><?php echo e($route['action']); ?></td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</body>
</html>
<?php /**PATH /home/vitalii/Desktop/PhpstormProjects/sp/test price/shop/resources/views/list-routes.blade.php ENDPATH**/ ?>