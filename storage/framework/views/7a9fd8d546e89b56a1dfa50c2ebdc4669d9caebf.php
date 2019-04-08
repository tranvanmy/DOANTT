<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>UTT-Cook</title>
    <link rel="shortcut icon" type="icon" href="/images/favicon.ico">
    <?php echo e(Html::style('css/style.css')); ?>

    <?php echo e(Html::style('css/animate.css')); ?>

    <?php echo e(Html::style('bower/font-awesome/css/font-awesome.min.css')); ?>

    <?php echo e(Html::style('bower/bootstrap/dist/css/bootstrap.min.css')); ?>

    <?php echo e(Html::style('bower/sweetalert/dist/sweetalert.css')); ?>

    <?php echo e(Html::style('bower/toastr/toastr.min.css')); ?>

    <meta id="token" name="csrf-token" value="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('style'); ?>

</head>
<body class="home">
<script lang="javascript">var _vc_data = {id : 5689903, secret : '13be534852c70016e7d3d4ba30445c90'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js?id=5689903';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>                
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo e(Html::script('bower/sweetalert/dist/sweetalert.min.js')); ?>

    <?php echo e(Html::script('bower/jquery/dist/jquery.min.js')); ?>

    <?php echo e(Html::script('bower/bootstrap/dist/js/bootstrap.min.js')); ?>

    <?php echo e(Html::script('js/jquery.slicknav.min.js')); ?>

    <?php echo e(Html::script('js/scripts.js')); ?>

    <?php echo e(Html::script('bower/jquery.uniform/dist/js/jquery.uniform.standalone.js')); ?>

    <?php echo e(Html::script('bower/wow/dist/wow.min.js')); ?>

    <?php echo e(Html::script('bower/axios/dist/axios.min.js')); ?>

    <?php echo e(Html::script('bower/vue/dist/vue.min.js')); ?>

    <?php echo e(Html::script('bower/toastr/toastr.min.js')); ?>

    <?php echo e(Html::script('js/profile.js')); ?>

    <?php echo e(Html::script('js/subcrice.js')); ?>

    <?php echo e(Html::script('sites_custom/js/cart.js')); ?>

    <?php echo $__env->yieldContent('script'); ?>

</body>
</html>
