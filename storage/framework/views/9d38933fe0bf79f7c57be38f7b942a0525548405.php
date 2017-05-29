<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo e(asset('images/favicon_1.ico')); ?>">

        <title>Tracking Celebryts</title>

        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/core.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/components.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/icons.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/pages.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo e(asset('js/modernizr.min.js')); ?>"></script>

    </head>
    <body>

        <!-- Application content -->
        <?php echo $__env->yieldContent('content'); ?>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/detect.js')); ?>"></script>
        <script src="<?php echo e(asset('js/fastclick.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.blockUI.js')); ?>"></script>
        <script src="<?php echo e(asset('js/waves.js')); ?>"></script>
        <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.scrollTo.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.core.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.app.js')); ?>"></script>

        <!-- Application Ajax-->
        <script src="<?php echo e(asset('js/ajax.js')); ?>"></script>

        <!-- Mains -->
        <script src="<?php echo e(asset('js/main-js-puro.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main-jquery.js')); ?>"></script>

        <!-- Masks -->
        <script src="<?php echo e(asset('js/jquery-mask.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-mask-custom.js')); ?>"></script>
        <script>
            localStorage.setItem('path_url', '<?php echo e(PATH_URL); ?>');
            localStorage.setItem('path_short_url', '<?php echo e(PATH_SHORT_URL); ?>');
        </script>

    </body>
</html>