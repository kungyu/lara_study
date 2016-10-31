<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <link href="/public/stastic/index/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="/public/stastic/index/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Kronos Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <script src="/public/stastic/index/js/jquery-1.8.3.min.js"></script>
    <script src="/public/stastic/index/js/scripts.js" type="text/javascript"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="/public/stastic/index/js/move-top.js"></script>
    <script type="text/javascript" src="/public/stastic/index/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!---End-smoth-scrolling---->
    <!------ Light Box ------>
    <link rel="stylesheet" href="/public/stastic/index/css/swipebox.css">
    <script src="/public/stastic/index/js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!------ Eng Light Box ------>
    <!-- Script for gallery Here -->
    <script type="text/javascript" src="/public/stastic/index/js/jquery.mixitup.min.js"></script>
    <script type="text/javascript">
        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist').mixitup({
                        targetSelector: '.portfolio',
                        filterSelector: '.filter',
                        effects: ['fade'],
                        easing: 'snap',
                        // call the hover effect
                        onMixEnd: filterList.hoverEffect()
                    });

                },

                hoverEffect: function () {

                    // Simple parallax effect
                    $('#portfoliolist .portfolio').hover(
                            function () {
                                $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                                $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                            },
                            function () {
                                $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                                $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                            }
                    );

                }

            };

            // Run the show!
            filterList.init();


        });
    </script>
    <!-- Gallery Script Ends -->
</head>
<body>
<div class="header-banner" id="head">
    <div class="container">
        <div class="logo">
            <a href="#"><img src="images/logo.png"></a>
        </div>
        <h1>HELLO, WE ARE KRONOS</h1>
        <p>We are here to help you. So, what you need?</p>
        <div class="arrow">
            <a href="#service" class="scroll"><img src="images/top-arrow.png"></a>
        </div>
    </div>
</div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费模板</a></div>
<div class="header-bottom">
    <div class="fixed-header">
        <div class="container">
            <div class="top-menu">
                <span class="menu"> </span>
                <ul>
                    <nav class="cl-effect-5">

                        <li><a class="scroll" href="#home"><span data-hover="Home">home</span></a></li>
                        <li><a class="scroll" href="#service"><span data-hover="service">service</span></a></li>
                        <li><a class="scroll" href="#team"><span data-hover="team">team</span></a></li>
                        <li><a class="scroll" href="#portfolio"><span data-hover="portfolio">portfolio</span></a></li>
                        <li><a class="scroll" href="#blog"><span data-hover="blog">blog</span></a></li>
                        <li><a class="scroll" href="#clients"><span data-hover="clients">clients</span></a></li>
                        <li><a class="scroll" href="#facts"><span data-hover="facts">facts</span></a></li>
                        <li><a class="scroll" href="#depoiments"><span data-hover="depoiments">depoiments</span></a></li>
                    </nav>
                </ul>
                <!-- script for menu -->
                <!--script-nav-->
                <script>
                    $("span.menu").click(function(){
                        $(".top-menu ul").slideToggle("slow" , function(){
                        });
                    });
                </script>

                <!-- //script for menu -->

                <!-- script-for sticky-nav -->
                <script>
                    $(document).ready(function() {
                        var navoffeset=$(".header-bottom").offset().top;
                        $(window).scroll(function(){
                            var scrollpos=$(window).scrollTop();
                            if(scrollpos >=navoffeset){
                                $(".header-bottom").addClass("fixed");
                            }else{
                                $(".header-bottom").removeClass("fixed");
                            }
                        });

                    });
                </script>
                <!-- //script-for sticky-nav -->
            </div>

        </div>
    </div>
</div>
<div class="content">
    <div class="service-section" id="service">
        <div class="container">
            <div class="service-header">
                <h3>our services</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="service-grids">
                <div class="col-md-4 service-grid">
                    <img src="images/icon1.jpg">
                    <h4>THE BEST DESIGN</h4>
                    <span> </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                </div>
                <div class="col-md-4 service-grid">
                    <img src="images/icon2.jpg">
                    <h4>THE BEST SUPPORT</h4>
                    <span> </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                </div>
                <div class="col-md-4 service-grid">
                    <img src="images/icon3.jpg">
                    <h4>THE BEST SOLUTIONS</h4>
                    <span> </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="team-section" id="team">
        <div class="container">
            <div class="team-header">
                <h3> meet our team</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div class="profile">
            <div class="container">
                <div class="recommand-section">
                    <div class="recommand-section-grids">

                        <div class="standards">
                            <ul class="selectors_wrapper">
                                <li class="selector active" data-selector="1">Mike Foster</li>
                                <li class="selector" data-selector="2">Anabelle Braz</li>
                                <li class="selector" data-selector="3">Anthony Diaz</li>
                                <li class="selector" data-selector="4">Marian Sezaro</li>
                                <li class="selector" data-selector="5">Erick Paul</li>
                                <li class="selector" data-selector="6">Brian Seemann</li>
                            </ul>
                            <div class="standard_content">
                                <div class="standard active" data-selector="1">
                                    <img src="images/pic1.jpg" class="img-responsive" alt="" />
                                </div>
                                <div class="skills-info">
                                    <div id="canvas">
                                        <div class="row skill-grids text-center">
                                            <div class="top-grid">
                                                <div class="grid-1">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-1"> </div>
                                                        <h5 class="web"><p>Photography</p></h5>
                                                    </div>
                                                </div>
                                                <div class="grid-2">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-2"> </div>
                                                        <h5 class="web"><p>Photoshop</p></h5>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="bottom-grid">
                                                <div class="grid-3">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-3"> </div>
                                                        <h5 class="web"><p>Marketing</p></h5>
                                                    </div>
                                                </div>

                                                <div class="grid-4">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-4"> </div>
                                                        <h5 class="web"><p>Photoshop</p></h5>
                                                    </div>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            <script type="text/javascript" src="/public/stastic/index/js/circles.js"></script>
                                            <script>
                                                var colors = [
                                                    ['#202835', '#9770dd'], ['#202835', '#9770dd'], ['#202835', '#9770dd'], ['#202835', '#9770dd']
                                                ];
                                                for (var i = 1; i <= 6; i++) {
                                                    var child = document.getElementById('circles-' + i),
                                                            percentage = 50 + (i * 10);

                                                    Circles.create({
                                                        id:         child.id,
                                                        percentage: percentage,
                                                        radius:     80,
                                                        width:      10,
                                                        number:   	percentage / 10,
                                                        text:       '%',
                                                        colors:     colors[i - 1]
                                                    });
                                                }

                                            </script>
                                            <!--/-->
                                            <div class="clearfix"> </div>
                                        </div>



                                    </div>

                                </div>



                                <script>$(document).ready(function(c) {
                                        $('.close-3').on('click', function(c){
                                            $('.contact-info').fadeOut('slow', function(c){
                                                $('.contact-info').remove();
                                            });
                                        });
                                    });
                                </script>

                                <div class="standard" data-selector="2">
                                    <img src="images/pic10.jpg" class="img-responsive" alt="" />
                                </div>
                                <div class="skills-info">
                                    <div id="canvas">
                                        <div class="row skill-grids text-center">
                                            <div class="top-grid">
                                                <div class="grid-1">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-1"> </div>
                                                    </div>
                                                </div>
                                                <div class="grid-2">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-2"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="bottom-grid">
                                                <div class="grid-3">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-3"> </div>
                                                    </div>
                                                </div>

                                                <div class="grid-4">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            <script type="text/javascript" src="/public/stastic/index/js/circles.js"></script>
                                            <script>
                                                var colors = [
                                                    ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd']
                                                ];
                                                for (var i = 1; i <= 6; i++) {
                                                    var child = document.getElementById('circles-' + i),
                                                            percentage = 50 + (i * 10);

                                                    Circles.create({
                                                        id:         child.id,
                                                        percentage: percentage,
                                                        radius:     80,
                                                        width:      10,
                                                        number:   	percentage / 10,
                                                        text:       '%',
                                                        colors:     colors[i - 1]
                                                    });
                                                }

                                            </script>
                                            <!--/-->
                                            <div class="clearfix"> </div>
                                        </div>



                                    </div>

                                </div>



                                <script>$(document).ready(function(c) {
                                        $('.close-3').on('click', function(c){
                                            $('.contact-info').fadeOut('slow', function(c){
                                                $('.contact-info').remove();
                                            });
                                        });
                                    });
                                </script>
                                <div class="standard" data-selector="3">
                                    <img src="images/pic11.jpg" class="img-responsive" alt="" />
                                </div>
                                <div class="skills-info">
                                    <div id="canvas">
                                        <div class="row skill-grids text-center">
                                            <div class="top-grid">
                                                <div class="grid-1">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-1"> </div>
                                                    </div>
                                                </div>
                                                <div class="grid-2">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-2"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="bottom-grid">
                                                <div class="grid-3">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-3"> </div>
                                                    </div>
                                                </div>

                                                <div class="grid-4">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            <script type="text/javascript" src="/public/stastic/index/js/circles.js"></script>
                                            <script>
                                                var colors = [
                                                    ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd']
                                                ];
                                                for (var i = 1; i <= 6; i++) {
                                                    var child = document.getElementById('circles-' + i),
                                                            percentage = 50 + (i * 10);

                                                    Circles.create({
                                                        id:         child.id,
                                                        percentage: percentage,
                                                        radius:     80,
                                                        width:      10,
                                                        number:   	percentage / 10,
                                                        text:       '%',
                                                        colors:     colors[i - 1]
                                                    });
                                                }

                                            </script>
                                            <!--/-->
                                            <div class="clearfix"> </div>
                                        </div>



                                    </div>

                                </div>



                                <script>$(document).ready(function(c) {
                                        $('.close-3').on('click', function(c){
                                            $('.contact-info').fadeOut('slow', function(c){
                                                $('.contact-info').remove();
                                            });
                                        });
                                    });
                                </script>
                                <div class="standard" data-selector="4">
                                    <img src="images/pic12.jpg" class="img-responsive" alt="" />
                                </div>
                                <div class="skills-info">
                                    <div id="canvas">
                                        <div class="row skill-grids text-center">
                                            <div class="top-grid">
                                                <div class="grid-1">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-1"> </div>
                                                    </div>
                                                </div>
                                                <div class="grid-2">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-2"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="bottom-grid">
                                                <div class="grid-3">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-3"> </div>
                                                    </div>
                                                </div>

                                                <div class="grid-4">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            <script type="text/javascript" src="/public/stastic/index/js/circles.js"></script>
                                            <script>
                                                var colors = [
                                                    ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd']
                                                ];
                                                for (var i = 1; i <= 6; i++) {
                                                    var child = document.getElementById('circles-' + i),
                                                            percentage = 50 + (i * 10);

                                                    Circles.create({
                                                        id:         child.id,
                                                        percentage: percentage,
                                                        radius:     80,
                                                        width:      10,
                                                        number:   	percentage / 10,
                                                        text:       '%',
                                                        colors:     colors[i - 1]
                                                    });
                                                }

                                            </script>
                                            <!--/-->
                                            <div class="clearfix"> </div>
                                        </div>



                                    </div>

                                </div>



                                <script>$(document).ready(function(c) {
                                        $('.close-3').on('click', function(c){
                                            $('.contact-info').fadeOut('slow', function(c){
                                                $('.contact-info').remove();
                                            });
                                        });
                                    });
                                </script>
                                <div class="standard" data-selector="5">
                                    <img src="images/pic10.jpg" class="img-responsive" alt="" />
                                </div>
                                <div class="skills-info">
                                    <div id="canvas">
                                        <div class="row skill-grids text-center">
                                            <div class="top-grid">
                                                <div class="grid-1">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-1"> </div>
                                                    </div>
                                                </div>
                                                <div class="grid-2">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-2"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="bottom-grid">
                                                <div class="grid-3">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-3"> </div>
                                                    </div>
                                                </div>

                                                <div class="grid-4">
                                                    <div class="skill-grid">
                                                        <div class="circle" id="circles-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                            <script type="text/javascript" src="/public/stastic/index/js/circles.js"></script>
                                            <script>
                                                var colors = [
                                                    ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd']
                                                ];
                                                for (var i = 1; i <= 6; i++) {
                                                    var child = document.getElementById('circles-' + i),
                                                            percentage = 50 + (i * 10);

                                                    Circles.create({
                                                        id:         child.id,
                                                        percentage: percentage,
                                                        radius:     80,
                                                        width:      10,
                                                        number:   	percentage / 10,
                                                        text:       '%',
                                                        colors:     colors[i - 1]
                                                    });
                                                }

                                            </script>
                                            <!--/-->
                                            <div class="clearfix"> </div>
                                        </div>



                                    </div>

                                </div>



                                <script>$(document).ready(function(c) {
                                        $('.close-3').on('click', function(c){
                                            $('.contact-info').fadeOut('slow', function(c){
                                                $('.contact-info').remove();
                                            });
                                        });
                                    });
                                </script>
                                <div class="standard" data-selector="6">
                                    <img src="images/pic1.jpg" class="img-responsive" alt="" />

                                    <div class="skills-info">
                                        <div id="canvas">
                                            <div class="row skill-grids text-center">
                                                <div class="top-grid">
                                                    <div class="grid-1">
                                                        <div class="skill-grid">
                                                            <div class="circle" id="circles-1"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid-2">
                                                        <div class="skill-grid">
                                                            <div class="circle" id="circles-2"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="bottom-grid">
                                                    <div class="grid-3">
                                                        <div class="skill-grid">
                                                            <div class="circle" id="circles-3"> </div>
                                                        </div>
                                                    </div>

                                                    <div class="grid-4">
                                                        <div class="skill-grid">
                                                            <div class="circle" id="circles-4"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                                <script type="text/javascript" src="/public/stastic/index/js/circles.js"></script>
                                                <script>
                                                    var colors = [
                                                        ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd'], ['#303538', '#9770dd']
                                                    ];
                                                    for (var i = 1; i <= 6; i++) {
                                                        var child = document.getElementById('circles-' + i),
                                                                percentage = 50 + (i * 10);

                                                        Circles.create({
                                                            id:         child.id,
                                                            percentage: percentage,
                                                            radius:     80,
                                                            width:      10,
                                                            number:   	percentage / 10,
                                                            text:       '%',
                                                            colors:     colors[i - 1]
                                                        });
                                                    }

                                                </script>
                                                <!--/-->
                                                <div class="clearfix"> </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>

                                <script>$(document).ready(function(c) {
                                        $('.close-3').on('click', function(c){
                                            $('.contact-info').fadeOut('slow', function(c){
                                                $('.contact-info').remove();
                                            });
                                        });
                                    });
                                </script>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-section" id="portfolio">
        <div class="container">
            <div class="portfolio-header">
                <h3>last services</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <ul id="filters" class="clearfix">
                <li><span class="filter active" data-filter="app card icon web logo1"> all</span></li>
                <li><span class="filter" data-filter="app"> Photography</span></li>
                <li><span class="filter" data-filter="card">Marketing</span></li>
                <li><span class="filter" data-filter="icon">Graphic Design</span></li>
            </ul>

            <div id="portfoliolist">
                <div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper grid_box">
                        <a href="images/pic2.jpg" class="swipebox"><img src="images/pic2.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="port-info">
                        <h5>photo graphy</h5>
                        <p><img src="images/month1.png"> 15/10/14</p>
                    </div></a>
                </div>

                <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper grid_box">
                        <div class="grid2">
                            <a href="images/pic3.jpg" class="swipebox"><img src="images/pic3.jpg" class="img-responsive" alt="">
                                <div class="port-info1">
                                    <h5>photo graphy</h5>
                                    <p><img src="images/month1.png"> 20/10/14</p>
                                </div></a>
                        </div>

                        <div class="grid3">
                            <a href="images/pic4.jpg" class="swipebox"><img src="images/pic4.jpg" class="img-responsive" alt="">
                                <div class="port-info1">
                                    <h5>photo graphy</h5>
                                    <p><img src="images/month1.png"> 15/01/15</p>
                                </div></a>
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper grid_box">
                        <div class="grid2">
                            <a href="images/pic5.jpg" class="swipebox"> <img src="images/pic5.jpg" class="img-responsive" alt="">
                                <div class="port-info1">
                                    <h5>photo graphy</h5>
                                    <p><img src="images/month1.png"> 01/02/15</p>
                                </div></a>
                        </div>
                        <div class="grid3">
                            <a href="images/pic6.jpg" class="swipebox"> <img src="images/pic6.jpg" class="img-responsive" alt="">
                                <div class="port-info1">
                                    <h5>photo graphy</h5>
                                    <p><img src="images/month1.png"> 15/3/15</p>
                                </div></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="portfolio app mix_all"  data-cat="app" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper grid_box">
                        <a href="images/pic7.jpg" class="swipebox"><img src="images/pic7.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="port-info">
                        <h5>photo graphy</h5>
                        <p><img src="images/month1.png">19/01/15</p>
                    </div></a>
                </div>

                <div class="clearfix"> </div>
            </div>


        </div>
    </div>
    <div class="portfolio-bottom">
        <div class="social-icons">
            <div class="container">
                <div class="col-md-3 face">
                    <p><i class="facebook"> </i> 733k</p>
                    <h4>facebook link</h4>
                </div>
                <div class="col-md-3 face">
                    <p><i class="twitter"> </i> 620k</p>
                    <h4>twitter followers</h4>
                </div>
                <div class="col-md-3 face">
                    <p><i class="google"> </i> 412k</p>
                    <h4>google+ followers</h4>
                </div>
                <div class="col-md-3 face">
                    <p><i class="youtube"> </i> 322k</p>
                    <h4>youtube followers</h4>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- portfolio-section-ends -->


    <div class="blog-section" id="blog">
        <div class="blog-header">
            <div class="container">
                <h3>this is our blog</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div class="blog-grids">

            <div class="col-md-2 blog-grid">
                <img src="images/pic8.jpg" class="img-responsive">
            </div>
            <div class="col-md-2 blog-grid1">
                <h6> tag1</h6>
                <h4>one blog article</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                <a class="button2" href="#">readmore</a>
            </div>
            <div class="col-md-2 blog-grid">
                <img src="images/pic9.jpg" class="img-responsive">
            </div>
            <div class="col-md-2 blog-grid1">
                <h6> tag2</h6>
                <h4>one blog article</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                <a class="button2" href="#">readmore</a>
            </div>
            <div class="col-md-2 blog-grid">
                <img src="images/pic8.jpg" class="img-responsive">
            </div>
            <div class="col-md-2 blog-grid1">
                <h6> tag1</h6>
                <h4>one blog article</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                <a class="button2" href="#">readmore</a>
            </div>

            <div class="clearfix"> </div>
        </div>

    </div>
    <div class="clients-section" id="clients">
        <div class="container">
            <div class="clients-header">
                <h3>happy with us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="some-happy-clients-list text-center">
                <div class="clients">
                    <ul id="flexiselDemo3">
                        <li><img src="images/c1.png" alt=""/></li>
                        <li><img src="images/c2.png" alt=""/></li>
                        <li><img src="images/c3.png" alt=""/></li>
                        <li><img src="images/c4.png" alt=""/></li>
                        <li><img src="images/c1.png" alt=""/></li>
                        <li><img src="images/c2.png" alt=""/></li>
                        <li><img src="images/c3.png" alt=""/></li>
                        <li><img src="images/c4.png" alt=""/></li>
                    </ul>
                    <script type="text/javascript">
                        $(window).load(function() {

                            $("#flexiselDemo3").flexisel({
                                visibleItems: 4,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint:480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint:640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint:768,
                                        visibleItems: 3
                                    }
                                }
                            });
                        });
                    </script>
                    <script type="text/javascript" src="/public/stastic/index/js/jquery.flexisel.js"></script>

                </div>
            </div>
        </div>
    </div>
    <div class="funfacts-section" id="facts">
        <div class="container">
            <div class="funfacts-header">
                <h3>fun facts</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="funfacts-grids">
                <div class="col-md-3 fun-grid">
                    <img src="images/project.png">
                    <h6>PROJECTS</h6>
                </div>
                <div class="col-md-3 fun-grid">
                    <img src="images/client.png">
                    <h6>HAPPY CLIENTS</h6>
                </div>
                <div class="col-md-3 fun-grid">
                    <img src="images/clock.png">
                    <h6>WORKING HOURS</h6>
                </div>
                <div class="col-md-3 fun-grid">
                    <img src="images/star.png">
                    <h6>AWARDS WON</h6>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="depoiments-section" id="depoiments">
        <div class="container">
            <div class="members">
                <div class="col-md-7 member1">
                    <div class="course_demo">
                        <ul id="flexiselDemo4">
                            <li>
                                <div class="client-text">
                                    <h4>paulo seemann</h4>
                                    <h5>founder google.com</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="client-text">
                                    <h4>paulo seemann</h4>
                                    <h5>founder google.com</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="client-text">
                                    <h4>paulo seemann</h4>
                                    <h5>founder google.com</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-5 description">
                    <img src="images/banner4.jpg" alt="" />
                    <script type="text/javascript">
                        $(window).load(function() {
                            $("#flexiselDemo4").flexisel({
                                visibleItems: 1,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint:480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint:640,
                                        visibleItems: 1
                                    },
                                    tablet: {
                                        changePoint:768,
                                        visibleItems: 1
                                    }
                                }
                            });

                        });
                    </script>
                    <script type="text/javascript" src="/public/stastic/index/js/jquery.flexisel.js"></script>

                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <div class="contact-section">
        <div class="container">
            <div class="contact-text">
                <form>
                    <h4>YOUR NAME</h4>
                    <input type="text" class="text" value="Enter your full name " onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Enter your full name';}">
                    <h4>YOUR EMAIL</h4>
                    <input type="text" class="text" value="Enter your email address " onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Enter your email address ';}">
                    <h4>YOUR MESSAGE</h4>
                    <textarea value="Enter your message" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Enter your message';}">Enter your message </textarea>
                    <input type="submit" value="send message">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="fotter-section">
    <div class="container">
        <div class="footer-top">
            <div class="footer-indicate">
                <ul>
                    <li><i class="phone"> </i></li>
                    <li><p>(055) 555 555 1234/35</p></li>

                    <li><i class="indicate"> </i></li>
                    <li><p>Seventh Avenue in Chelsea, Manhattan</p></li>

                    <li><i class="message"> </i></li>
                    <li><a href="mailto:example@mail.com" >contact@kronos.com</a></li>
                </ul>
            </div>
            <div class="footer-socialicons">
                <a href="#"><i class="icon"> </i></a>
                <a href="#"><i class="icon2"> </i></a>
                <a href="#"><i class="icon3"> </i></a>
                <a href="#"><i class="icon4"> </i></a>
                <a href="#"><i class="icon5"> </i></a>
                <a href="#"><i class="icon6"> </i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></p>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 var defaults = {@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
        </script>
        <a class="scroll" href="#head" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
</div>
</body>
</html>