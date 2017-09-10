<!DOCTYPE html>
<html lang="en">
<title>Billing</title>
<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-material/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Sep 2016 09:18:31 GMT -->
@include('pos.layout.headlink')

<style>

</style>

<body>
<!-- Preloader -->
<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
      @if (Session::has('message'))
        <div class="alert alert-danger">
          {{ Session::get('message') }}

        </div>
      @endif
      @if (Session::has('message_logout'))
        <div class="alert alert-success">
          {{ Session::get('message_logout') }}

        </div>
      @endif
        <?php $value=count($all_info);?>
        <?php if ($value>0) {?>
      <div align="center">
        <img style="height:100px;width:100px;" src="public/images/logo1.png"  alt='logo'>
      </div>
      <div align="center">
        <h4> {{$all_info[0]->name}}</h4>
      </div>

        <?php }?>
        

      <form class="form-horizontal form-material" id="loginform"  onsubmit="return get_login()" action="{{url('login/login_check')}}" method="post">
        {{csrf_field()}}
        <!--<h3 class="">সাইন ইন করুন</h3>-->
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" id="email" name="email" placeholder="Email">
            <div id="must_email" style="display:none">
              <p style="color:red;">* Required</p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" id="pass" name="password" placeholder="password">
            <div id="must_pass" style="display:none">
              <p style="color:red;">* Required</p>
            </div>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" name="login">Login</button>
          </div>
        </div>
      </form>

    </div>
  </div>

  @include('pos.layout.footerlink')
  <script>
    var base_url=$('#base_url').val();
  </script>
  <script>
    function get_login()
    {
      flag=true;
      var user=$('#email').val();
      if(user=='' || user==null || user== 0)
      {
        flag=false;
        $('#must_email').show();
      }
      else
      {
        $("#must_email").hide();
      }
      var password=$('#pass').val();
      if(password=='' || password==null || password== 0)
      {
        flag=false;
        $('#must_pass').show();
      }
      else
      {
        $("#must_pass").hide();
      }
     return flag;
    }
  </script>
</body>
</html>
