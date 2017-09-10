<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-material/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Sep 2016 09:18:31 GMT -->
@include('pos.layout.headlink')

<body>

<input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">

<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="loadingDiv" style="position: fixed;z-index: 10000;top: 20%;left: 50%;"><img src="{{url('public/images/loading.gif')}}" alt=""></div>
<div id="wrapper">
    <!-- Top Navigation -->
    @include('pos.layout.top_nav')
            <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    @include('pos.layout.left_side_nav')
            <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">@yield('page_header')</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    @yield('page_breadcrumb')
                </div>
            </div>
            <div class="row">
                @yield('page_content')
            </div>
        </div>
        <footer class="footer text-center">2017 &copy; All right reserved by <a style="color:#EF9" target="_blank" href="http://www.bditfactory.com/">bditfactory</a></footer>
    </div>
</div>
@include('pos.layout.footerlink')
<script>
    var base_url=$('#base_url').val();
</script>
</body>
</html>
