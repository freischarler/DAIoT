<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e('App para IoT'); ?></title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Monitor')); ?></title>
    <!-- Favicon -->
    <link rel="icon" href=<?php echo e(asset('img/icon.png')); ?>>
    <!-- scripts -->
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <link href="<?php echo e(asset('/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/semantic.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- styles -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('/css/semantic.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/nunito.css')); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('css/all.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

          <!-- Chart -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
    

    <?php echo $__env->yieldContent('header'); ?>
</head>
<body id="page-top">
    <?php $__env->startComponent('layouts.menu'); ?>
    <?php if (isset($__componentOriginald955d735bfbb7dda6920f6bd98c96c7f36dbfc18)): ?>
<?php $component = $__componentOriginald955d735bfbb7dda6920f6bd98c96c7f36dbfc18; ?>
<?php unset($__componentOriginald955d735bfbb7dda6920f6bd98c96c7f36dbfc18); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
        <div id="app">
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->yieldContent('modal'); ?>
            <?php if(auth()->guard()->check()): ?>
            <modal-user-pwd-change title="Cambio de clave" modal-id="ModalPwdChange" :user-id=<?php echo e(Auth::user()->id); ?> ></modal-user-pwd-change>
            <?php echo $__env->yieldContent('bottom'); ?>
        </div>
    <?php endif; ?>
</body>
</html><?php /**PATH /home/martin/Documents/iot-sample-api/resources/views/spa.blade.php ENDPATH**/ ?>