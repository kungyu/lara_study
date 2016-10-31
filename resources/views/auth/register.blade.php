<!DOCTYPE HTML>
<html>
<head>
    <title>精简历--登录</title>
    <!-- Custom Theme files -->
    <link href="stastic/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
<script src="/stastic/js/jquery.min.js"></script>
<script src="/stastic/js/layer/layer.js"></script>
    <link rel="stylesheet" href="/stastic/home/css/font-awesome.min.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/stastic/home/css/bootstrap.min.css">
    <!-- Animate.css -->

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/stastic/home/css/owl.carousel.css">
    <!-- Grid Component css -->
    <link rel="stylesheet" href="/stastic/home/css/component.css">
    <!-- Slit Slider css -->
    <link rel="stylesheet" href="/stastic/home/css/slit-slider.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/stastic/home/css/main.css">
    <!-- Media Queries -->
    <link rel="stylesheet" href="/stastic/home/css/media-queries.css">

</head>
<body>
<header id="navigation" class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <a class="navbar-brand" href="/index.php">
                <h1 id="logo">
                    <img src="/images/logo-meghna.png" alt="Meghna" />
                </h1>
            </a>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
            <ul id="nav" class="nav navbar-nav">
                <li class="current"><a href="/index.php">首页</a></li>
                <li><a href="/home">个人中心</a></li>
                <li><a href="/login">登录</a></li>
                <li><a href="/register">注册</a></li>
            </ul>
        </nav>
        <!-- /main nav -->

    </div>
</header>
<div class="login">
    <h2></h2>
    <div class="login-top">
        <h1>请注册</h1>
        <form class="form-horizontal" role="form" method="POST" onsubmit="return checkForm();" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <input id="name" type="text"  name="name" placeholder="昵称" value="{{ old('name') }}">
            <input type="text" placeholder="邮箱"  value="{{ old('email') }}" id="email" name="email" >
            <input type="text" placeholder="手机号码(用于简历中联系方式)"  value="{{ old('mobile') }}" id="mobile" name="mobile" >
            <input id="password" type="password"  name="password" placeholder="请输入登录密码">
            <input id="password-confirm" type="password"  name="password_confirmation" placeholder="请确认登录密码">

            <div class="forgot">
                {{--<a href="#">forgot Password</a>--}}
                <input type="submit" value="注册" >
            </div>
        </form>
    </div>
    <div class="login-bottom">
        <h3>已注册用户请 &nbsp;<a href="/login">登录</a>&nbsp </h3>
    </div>
</div>
<div class="copyright">
    <p>Copyright &copy; 2016.精简历 版权所有.</p>
</div>
<script>
    function checkForm(){
        if($("#name").val() == ''){
            layer.msg('昵称不能为空');
            return false;
        }
        if($("#email").val() == ''){
            layer.msg('邮箱不能为空');
            return false;
        }
        var mobile = $("#mobile").val();
        if(!(/^1[3|4|5|7|8]\d{9}$/.test(mobile))){
            layer.msg("手机号码有误，请重新填写");
            return false;
        }
        var password = $("#password").val();
        if(password.length < 6){
            layer.msg('密码长度不能小于6位');
            return false;
        }
        var password_con = $("#password-confirm").val();
        if(password_con != password){
            layer.msg('两次输入密码不一致');
            return false;
        }
    }
</script>

</body>
</html>