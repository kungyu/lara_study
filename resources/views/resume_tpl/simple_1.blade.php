<!DOCTYPE HTML>
<html>
<head>
    <title>@if(!is_null($base)) {{$base->real_name}} @endif -- 个人简历</title>
    <link href="/resume_tpl/simple_1/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script src="/resume_tpl/simple_1/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="/resume_tpl/simple_1/css/dashboard.css" rel="stylesheet">
    <link href="/resume_tpl/simple_1/css/style.css" rel='stylesheet' type='text/css' />

    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Curriculum Vitae Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- start menu -->

</head>
<body>
<!-- header -->
<div class="col-sm-3 col-md-2 sidebar">
    <div class="sidebar_top">
        <h1>
            @if(!is_null($base)) {{$base->real_name}} @endif
        </h1>
    </div>
    @if(!is_null($base))
    <div class="details">
        <address>
            <h3>所在城市</h3>
            <span>{{$base->locate_name}}</span>
        </address>
        <h3>期望行业</h3>
        <p>{{$base->industry}}</p>
        <h3>期望职位</h3>
        <p>{{$base->hope_job}}</p>
        <h3>期望薪资</h3>
        <p>{{$base->hope_salary}}万/年</p>
        <h3>求职状态</h3>
        <p>{{$base->job_status_desc}}</p>
    </div>
    @endif
    <div class="clearfix"></div>
</div>
<!---->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!---//pop-up-box---->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="content">
        <div class="details_header">
            <ul>
                <li><a href="tel:{{$user->phone}}"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>{{$user->phone}}</a></li>
                <li><a href="mailto:{{$user->email}}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>{{$user->email}}</a></li>
            </ul>
        </div>
        @if(!is_null($work))
        <div class="company">
            <h3 class="clr1">工作经历</h3>
                @foreach($work as $work_val)
            <div class="company_details">
                <h4>{{$work_val->company}} </h4>
                <h6>{{$work_val->start_time}} - {{$work_val->end_time}}</h6>
                <h6>{{$work_val->job_name}}</h6>
                <p class="cmpny1">{{$work_val->job_content}}</p>
            </div>
                @endforeach

            {{--<div class="company_details">
                <h4>Company Name <span>NOVEMBER 2007 - MAY 2015</span></h4>
                <h6>WEB DESIGNER</h6>
                <p>Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
                    Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
                    Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
            </div>--}}
        </div>
        @endif
        @if(!is_null($project))
        <div class="company">
            <h3 class="clr4">项目经验</h3>
                @foreach($project as $work_val)
                    <div class="company_details">
                        <h4>{{$work_val->project_name}}</h4>
                        <h6>{{$work_val->start_time}} - {{$work_val->end_time}}</h6>
                        <h6>{{$work_val->project_job}}</h6>
                        <p class="cmpny1">{{$work_val->project_content}}</p>
                    </div>
                @endforeach
        </div>
        @endif
        @if(!is_null($skill))
        <div class="skills">
            <h3 class="clr2">专业技能</h3>
            <div class="skill_list">
                <ul>
                    @foreach($skill as $skill_val)
                    <li>{{$skill_val->skill_name}} ---- <span>熟练度:{{$skill_val->proficiency}}%</span></li>
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        @endif
        @if(!is_null($education))
        <div class="education">
            <h3 class="clr3">教育经历</h3>
            @foreach($education as $edu)
            <div class="education_details">
                <h4>{{$edu->school}}<span>{{$edu->start_time}} - {{$edu->end_time}}</span></h4>
                <h6>{{$edu->major}} - {{$record_name[$edu->record]}}</h6>
                {{--<p class="cmpny1">Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
                    Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
                    Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>--}}
            </div>
            @endforeach
        </div>
        @endif
        <div class="copywrite">
            @include('shared.resume_footer')
        </div>
    </div>
</div>
<!---->
</body>
</html>