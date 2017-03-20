<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <title><?php echo e(config('app.name', 'Laravel')); ?> | <?php echo e(isset($pageName) ? $pageName : ""); ?></title>
    <meta name="description" content="Nigerian Defence Academy Human Resource Portal v1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Umoru Godfrey, E. Natview Technology, Abuja Nigeria, godfrey.umoru@natviewtechnology.com" />
    <meta name="date" content="29th January, 2017" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/css/font.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/css/app.v1.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/fuelux/fuelux.css')); ?>" type="text/css" />
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/select2/select2.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/select2/theme.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/datepicker/datepicker.css')); ?>" type="text/css" />
    <!-- DTable -->
    <link rel="stylesheet" href="<?php echo e(asset('incs/js/datatables/datatables.css')); ?>" type="text/css" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('incs/js/jquery.datatables/bootstrap-adapter/css/datatables.css')); ?>" />
    <link type="image/x-icon" href="<?php echo e(asset('incs/images/hr_logobig.png')); ?>" rel="shortcut icon"/>

    
    <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
    <![endif]-->
</head>

<body class="">
    <section class="vbox">
        <header class="bg-primary dker header navbar navbar-fixed-top-xs">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo e(asset('incs/images/hr_logo.png')); ?>" class="m-r-lg"></a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
            </div>
            
        </header>
        <section>
            <section class="hbox stretch">
                <section id="content">
                   <?php echo $__env->yieldContent('content'); ?>
                </section>
            </section>
        </section>
    </section>
    


    <!-- App -->
    <script src="<?php echo e(asset('incs/js/app.v1.js')); ?>"></script>
    
    <script src="<?php echo e(asset('incs/js/app.plugin.js')); ?>"></script>
     <script src="<?php echo e(asset('incs/js/datepicker/bootstrap-datepicker.js')); ?>"></script>
</body>

</html>