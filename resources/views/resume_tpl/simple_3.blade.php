<!DOCTYPE HTML>
<html>
<head>
    <title>@if(!is_null($base)) {{$base->real_name}} @endif -- 个人简历</title>
    <link href="resume_tpl/simple_3/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="resume_tpl/simple_3/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="resume_tpl/simple_3/css/swipebox.css">
    <script src="resume_tpl/simple_3/js/jquery.min.js"></script>
    <script type="text/javascript" src="resume_tpl/simple_3/js/move-top.js"></script>
    <script type="text/javascript" src="resume_tpl/simple_3/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!------ Light Box ------>
    <script src="resume_tpl/simple_3/js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!------ Eng Light Box ------>

</head>
<body>
<!-- header -->
<div class="banner">
    <div class="container">
        <div class="banner-info">
            <h2>嗨,我是@if(!is_null($base)) {{$base->real_name}} @endif</h2>
            <h3>这里有一些我的相关介绍</h3>
        </div>
    </div>
</div>
<!-- header -->
<!-- about -->
<div class="about">
    <div class="container">
        <h3>专业技能</h3>
        <div class="study2">
            <div class="col-md-6 about-left">
                @foreach($skill as $skill_val)
                <h4>{{$skill_val->skill_name}}</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger-3" role="progressbar" aria-valuenow="{{$skill_val->proficiency}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill_val->proficiency}}%">
                        <span class="sr-only">{{$skill_val->proficiency}}% Complete (success)</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- about -->

<!-- services -->
<div class="services">
    <div class="container">
        <h3>工作经验</h3>
        <div class="service-grids">
            @foreach($work as $work_val)
            <div class="col-md-4 service-grid">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                <h4>{{$work_val->company}}</h4>
                <span>{{$work_val->job_name}} </span>
                <p>{{$work_val->job_content}}</p>
            </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- services -->
@if(!is_null($project))
<!-- client -->
<div class="client">
    <div class="container">
        <h3>项目经验</h3>
        <div class="service-grids">
            @foreach($project as $work_val)
                <div class="col-md-4 service-grid">
                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                    <h4 style="margin-top:10px;">{{$work_val->project_name}}</h4>
                    <span>{{$work_val->project_job}} </span>
                    <p>{{$work_val->project_content}}</p>
                </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!-- client -->
@endif
@if(!is_null($gallery) && is_object($gallery))
<!-- portfolio -->
<div class="gallery">
    <div class="container">
        <h3>作品展示</h3>
        <div class="portfolio">
            <div id="portfoliolist">
                @foreach($gallery as $gallery_val)
                <div class="portfolio card mix_all  wow bounceIn" data-wow-delay="0.4s" data-cat="card" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper grid_box">
                        <a href="{{$gallery_val->thumb_url}}" class="swipebox"  title="Image Title"> <img src="{{$gallery_val->thumb_url}}" class="img-responsive" alt=""><span class="zoom-icon"></span> </a>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!-- portfolio -->
@endif

<!-- contact -->
<div class="contact" id="contact">
    <div class="container">
        <h3>联系方式</h3>
        <div class="footer-left">
            <li><i class="add"> </i>{{$base->locate_name}}</li>
            <li><i class="phone"> </i>{{$user->phone}}</li>
            <li><a href="mailto:{{$user->email}}"><i class="mail"> </i>{{$user->email}} </a></li>
            <li><i> 期望行业:</i>{{$base->industry}} </li>
            <li><i> 期望职位:</i>{{$base->hope_job}} </li>
            <li><i> 期望薪资:</i>{{$base->hope_salary}}万/年 </li>
            <li><i> 求职状态:</i>{{$base->job_status_desc}} </li>
        </div>

    </div>
    <div class="map">
    </div>
    @include('shared.resume_footer')
</div>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
<!-- contact -->
</body>
</html>