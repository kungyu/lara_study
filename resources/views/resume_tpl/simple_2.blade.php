<!DOCTYPE HTML>
<html>
<head>
    <title>@if(!is_null($base)) {{$base->real_name}} @endif -- 个人简历</title>
    <link href="/resume_tpl/simple_2/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="/resume_tpl/simple_2/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="/resume_tpl/simple_2/js/jquery-1.11.1.min.js"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="/resume_tpl/simple_2/js/move-top.js"></script>
    <script type="text/javascript" src="/resume_tpl/simple_2/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!---End-smoth-scrolling---->

</head>
<body>
<!--start-header-section-->
<div class="header-section">
    <div class="continer">
        <h1>@if(!is_null($base)) {{$base->real_name}} @endif</h1>
        <p>所在城市:{{$base->locate_name}}</p>
        <p>期望行业:{{$base->industry}}  </p>
        <p>期望职位:{{$base->hope_job}}  </p>
        <p>期望薪资:{{$base->hope_salary}}万/年  </p>
        <p>求职状态:{{$base->job_status_desc}}  </p>
        <p>
        <a href="tel:{{$user->phone}}" class="glyphicon glyphicon-phone">{{$user->phone}} </a>
        <a href="mailto:{{$user->email}}" class="glyphicon glyphicon-envelope">{{$user->email}}</a>
        </p>
    </div>
</div>
<!--end header-section-->

@if(!is_null($work))
<div class="service-section" id="service">
    <h3>工作经历</h3>

    <div class="container">

        <div class="service-grids">
            @foreach($work as $work_val)
            <div class="col-md-4 service-grid">
                <span class="glyphicon " aria-hidden="true"></span>
                <h4>{{$work_val->company}}</h4>
                <span>{{$work_val->start_time}} - {{$work_val->end_time}}</span>
                <h5>{{$work_val->job_name}}</h5>
                <p>{{$work_val->job_content}}</p>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endif

@if(!is_null($project))
    <div class="service-section" id="service">
        <h3>项目经验</h3>

        <div class="container">

            <div class="service-grids">
                @foreach($project as $work_val)
                    <div class="col-md-4 service-grid">
                        <span class="glyphicon " aria-hidden="true"></span>
                        <h4>{{$work_val->project_name}}</h4>
                        <span>{{$work_val->start_time}} - {{$work_val->end_time}}</span>
                        <h5>{{$work_val->project_job}}</h5>
                        <p>{{$work_val->project_content}}</p>
                    </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endif
<!--end services-section-->

<!--start-study-section-->
<div class="study-section">
    <div class="container">
        <div class="study-grids">
            @if(!is_null($education))
                <div class="col-md-6 study-grid">
                    <h3>教育经历</h3>
                    <div class="study1">
                        @foreach($education as $edu)
                            <p>{{$edu->school}} <label>( {{$edu->start_time}} - {{$edu->end_time}} )</label><br>
                                <span>{{$edu->major}} - {{$record_name[$edu->record]}}</span>
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(!is_null($skill))
                <div class="col-md-6 study-grid">
                    <h3>专业技能</h3>
                    <div class="study2">
                        @foreach($skill as $skill_val)
                            <h4>{{$skill_val->skill_name}}</h4>
                            <div class="progress">
                                <div class="progress-bar
                        @if($skill_val->proficiency <= 30) progress-bar-info
                         @elseif($skill_val->proficiency <= 50) progress-bar-success
                         @elseif($skill_val->proficiency <= 80) progress-bar-warning
                         @else progress-bar-danger
                         @endif
                                        " role="progressbar" aria-valuenow="{{$skill_val->proficiency}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill_val->proficiency}}%">
                                    <span class="sr-only">{{$skill_val->proficiency}}% Complete (success)</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!--start-social-section-->
@if(!is_null($gallery))
<div class="social-icons">
    <h3>作品展示</h3>
    <div class="container">
        @foreach($gallery as $gallery_val)
        <div class="col-md-2 face">
            <p><img src="{{$gallery_val->thumb_url}}"></p>
        </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
</div>
@endif
<!--end-social-section-->

<!--start-footer-section-->
<div class="footer-section">
    <div class="container">
        <div class="footer-top">
            @include('shared.resume_footer')
        </div>
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
</div>
<!--end-footer-section-->


</body>
</html>