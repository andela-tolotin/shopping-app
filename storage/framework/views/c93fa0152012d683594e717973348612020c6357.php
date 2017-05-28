<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/simple-line-icons.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/vendor/tooltipster.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/vendor/magnific-popup.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/vendor/owl.carousel.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/additional_styles.css')); ?>">
    <!-- favicon -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
</head>