<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-material/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Sep 2016 09:18:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/')}}/<?=$company_info[0]->logo;?>">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{url('resources/assets/pos/')}}/css/style_dashboard.css">

    <!-- Bootstrap Core CSS -->
    <link href="{{url('resources/assets/pos/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-table/dist/bootstrap-table.min.css"
          rel="stylesheet" type="text/css"/>

    <!-- Menu CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{url('resources/assets/pos/')}}/bower_components/dropify/dist/css/dropify.min.css">

    <!-- page CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('resources/assets/pos/')}}/bower_components/custom-select/custom-select.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('resources/assets/pos/')}}/bower_components/switchery/dist/switchery.min.css" rel="stylesheet"/>
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-select/bootstrap-select.min.css"
          rel="stylesheet"/>
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"
          rel="stylesheet"/>
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css"
          rel="stylesheet"/>
    <link href="{{url('resources/assets/pos/')}}/bower_components/multiselect/css/multi-select.css" rel="stylesheet"
          type="text/css"/>


    <!-- Custom CSS -->
    <link href="{{url('resources/assets/pos/')}}/css/style.css" rel="stylesheet">


</head>

<body>

<input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">

<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="loadingDiv" style="position: fixed;z-index: 10000;top: 20%;left: 50%;"><img
            src="{{url('public/images/loading.gif')}}" alt=""></div>
<div id="wrapper">
    @include('pos.layout.top_nav')

    <div class="row" style="height: 3px; background: #999">
    </div>
    <!-- Page Content -->
    <div class="row">
        <div id="page-wrapper" style="background: white!important; margin-left: 0px !important">
            <div class="container-fluid">
                <div class="row">

                    <div class="nav navbar">
                        <div>
                            <a href="{{url('home/dashboard')}}" class="dashboard" style="padding-left: 20px;">
                                <img src="{{url('public/images/dashboard.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="container" style="background: {{url('public/images/background_img.jpg')}} !important;">
                        <img class="dash-img" src="{{url('public/images/background_img.jpg')}}" alt=""/>
                        <div class=" col-sm-offset-8 col-sm-4 col-xs-offset-0 col-xs-12">
                            <div class="ana">
                                <div class="big-round"/>
                                <a class="menu1-label" href="{{url('prescription/add')}}">New
	                            Prescription</a>
	                        <a class="menu2-label" href="{{url('patient/show')}}">View Patients
	                            List</a>
	                        <a class="menu3-label" href="{{url('medicine/show')}}">Drugs</a>
	                        <a class="menu4-label" href="{{url('prescription/known_case')}}">Known Case</a>
	                        <a class="menu5-label" href="{{url('home/db_backup')}}">DB Backup</a>
                                <a class="menu1" href="{{url('prescription/add')}}"></a>
                                <a class="menu2" href="{{url('patient/show')}}"></a>
                                <a class="menu3" href="{{url('medicine/show')}}"></a>
                                <a class="menu4" href="{{url('prescription/known_case')}}"></a>
                                <a class="menu5" href="{{url('home/db_backup')}}"></a>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row" style="text-align: center; padding: 15px;">
        <footer>2017 &copy; All right reserved by <a style="color:#EF9" target="_blank"
                                                     href="http://www.bditfactory.com/">bditfactory</a></footer>
    </div>
</div>

@include('pos.layout.footerlink')
<script>
    var base_url = $('#base_url').val();
</script>
</body>
</html>
