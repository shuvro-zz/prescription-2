<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('public/images/')); ?>/<?=$company_info[0]->logo;?>">
    <title><?php echo $__env->yieldContent('page_title'); ?></title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo e(url('resources/assets/pos/')); ?>/compiled/flipclock.css">
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-table/dist/bootstrap-table.min.css"
          rel="stylesheet" type="text/css"/>
    <!--datatable-->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/www/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Menu CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Page plugins css -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/clockpicker/dist/jquery-clockpicker.min.css"
          rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/jquery-asColorPicker-master/css/asColorPicker.css"
          rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- summernotes CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- Daterange picker plugins css -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/timepicker/bootstrap-timepicker.min.css"
          rel="stylesheet">
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">

    <!-- page CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/custom-select/custom-select.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/switchery/dist/switchery.min.css" rel="stylesheet"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-select/bootstrap-select.min.css"
          rel="stylesheet"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"
          rel="stylesheet"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css"
          rel="stylesheet"/>
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/multiselect/css/multi-select.css" rel="stylesheet"
          type="text/css"/>

    <!-- toast CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo e(url('resources/assets/pos/')); ?>/css/colors/default.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(url('resources/assets/pos/')); ?>/css/simplebar.css"/>
    <link rel="stylesheet" href="<?php echo e(url('resources/assets/pos/')); ?>/css/demo.css"/>



    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <style>
        <?php echo $__env->yieldContent('prescription_style'); ?>

        body {
            background-image: url('public/images/shop.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100% 100%;
        }

        html {
            background-image: url('public/images/shop.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100% 100%;
        }

    </style>
</head>