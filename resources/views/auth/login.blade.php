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

    <link rel="stylesheet" href="/stastic/home/css/font-awesome.min.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/stastic/home/css/bootstrap.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="/stastic/home/css/animate.css">
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
        <h1>请登录</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <input type="text" placeholder="注册邮箱" id="email" name="email" >
            <input id="password" type="password"  name="password" placeholder="请输入登录密码">

            <div class="forgot">
                {{--<a href="#">forgot Password</a>--}}
                <input type="submit" value="登录" >
            </div>
        </form>
    </div>
    <div class="login-bottom">
        <h3>新用户请 &nbsp;<a href="/register">注册</a>&nbsp </h3>
    </div>
</div>
<div class="copyright">
    <p>Copyright &copy; 2016.精简历 版权所有.</p>
</div>


</body>
</html>