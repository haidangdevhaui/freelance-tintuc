<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Đăng nhập quản trị </title>
<link rel="stylesheet" href="{{ url('css/style.default.css') }}" type="text/css" />

<script type="text/javascript" src="{{ url('js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/modernizr.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/custom.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>

<body class="loginpage">

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="message_login_admin_error">
            @include('errors.message_success')
            @include('errors.message_error')
        </div>
        <div class="logo animate0 bounceIn">
            <img src="{{ url('assets/images/logo.png') }}" alt="" />
        </div>
        <form id="login" action="" method="post">
            {{ csrf_field() }}
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Tên email hoặc mật khẩu không hợp lệ </div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="email" name="email" id="username" placeholder="Vui lòng nhập email" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Vui làm nhập mật khẩu" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Đăng nhập</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <label><input type="checkbox" class="remember" name="signin" />Giữ trạng thái đăng nhập </label>
            </div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2016 Copyright by {{ config('site.title') }} -  Powered by <a style="color:#FFF" href="http://dangvh" target="_blank">dangvh</a></p>
</div>

</body>
</html>
