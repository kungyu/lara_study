<!DOCTYPE html>
<html>
<head>
    <title>@if(!is_null($base)) {{$base->real_name}} @endif -- 个人简历</title>
    <!--fonts-->

    <!--//fonts-->
    <link href="resume_tpl/simple_4/css/bootstrap.css" rel="stylesheet">
    <link href="resume_tpl/simple_4/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!-- js -->
    <script type="text/javascript" src="resume_tpl/simple_4/js/jquery.min.js"></script>
    <script src="resume_tpl/simple_4/js/modernizr.custom.97074.js"></script>
    <!-- js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="resume_tpl/simple_4/js/move-top.js"></script>
    <script type="text/javascript" src="resume_tpl/simple_4/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>
<body>
<script type="text/javascript" src="resume_tpl/simple_4/js/circles.js"></script>
<!-- my skills -->
<div class="our-skills">
    <div class="container">
        <div class="skill-info">
            <h2>专业技能</h2>
        </div>
        <div class="skill-grids">
            @foreach($skill as $skill_key=>$skill_val)
            <div class="col-md-3 skills-grid text-center">
                <div class="circle" id="circles-{{$skill_key+1}}"></div>
                <p>{{$skill_val->skill_name}}</p>
            </div>
                <script>
                    var colors = [
                        ['#ced7df', '#76b852'], ['#ced7df', '#76b852'], ['#ced7df', '#76b852'], ['#ced7df', '#76b852']
                    ];
                        Circles.create({
                            id:         "circles-{{$skill_key+1}}",
                            percentage: "{{$skill_val->proficiency}}",
                            radius:     80,
                            width:      10,
                            number:   	"{{$skill_val->proficiency}}" ,
                            text:       '%',
                            colors:     ['#ced7df', '#76b852']
                        });

                </script>
            @endforeach

            <div class="clearfix"> </div>


        </div>
    </div>
</div>
<!-- //my skills -->
@if(!is_null($work))
<!--services-->
<div id="services" class="services">
    <div class="container">
        <div class="ser-head">
            <h3>工作经验</h3>
        </div>
        <div class="wel-grids">
            @foreach($work as $work_val)
            <div class="col-md-4 wel-grid text-center">
                <div class="btm-clr">
                    <figure class="icon">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </figure>
                    <h3>{{$work_val->company}}</h3>
                    <p> {{$work_val->job_content}}</p>
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//services-->
@endif
@if(!is_null($project))
<!--news-->
<div class="news">
    <div class="container">
        <div class="ser-head">
            <h3>项目经验</h3>
        </div>
        <div class="wel-grids">
            @foreach($project as $work_val)
                <div class="col-md-4 wel-grid text-center">
                    <div class="btm-clr">
                        <figure class="icon">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </figure>
                        <h4>{{$work_val->project_name}}</h4>
                        <p> {{$work_val->project_content}}</p>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//news-->
@endif
@if(!is_null($gallery))
<div id="portfolio" class="gallery">
    <div class="container">
        <script src="resume_tpl/simple_4/js/jquery.chocolat.js"></script>
        <link rel="stylesheet" href="resume_tpl/simple_4/css/chocolat.css" type="text/css" media="screen" charset="utf-8">
        <!--light-box-files -->
        <script type="text/javascript" charset="utf-8">
            $(function() {
                $('.gallery a').Chocolat();
            });
        </script>
        <h3>作品展示</h3>
        <section>
            <ul id="da-thumbs" class="da-thumbs">
                @foreach($gallery as $gallery_val)

                <li>
                    <a href="{{$gallery_val->thumb_url}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
                        <img src="{{$gallery_val->thumb_url}}" alt="" />
                        <div>
                            <h5>VIEW</h5>
                        </div>
                    </a>
                </li>
                @endforeach
                <div class="clearfix"> </div>
            </ul>
        </section>
        <script type="text/javascript" src="resume_tpl/simple_4/js/jquery.hoverdir.js"></script>
        <script type="text/javascript">
            $(function() {
                $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
            });
        </script>
    </div>
</div>
<!--//gallery-->
@endif


<!-- contact-us -->
<div class="contact-us">
    <div class="container">
        <div class="contact-grids">
            <div class="col-md-4 contact-grid text-center">
                <div class="point-icon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
                <p>{{$base->locate_name}}</p>
            </div>
            <div class="col-md-4 contact-grid text-center">
                <div class="point-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                <p><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
            </div>
            <div class="col-md-4 contact-grid text-center">
                <div class="point-icon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>
                <p>{{$user->phone}}</p>
            </div>
            <div class="col-md-4 contact-grid text-center">
                <div class="point-icon">期望行业</div>
                <p>{{$base->industry}}</p>
            </div>
            <div class="col-md-4 contact-grid text-center">
                <div class="point-icon">期望职位</div>
                <p>{{$base->hope_job}}</p>
            </div>
            <div class="col-md-4 contact-grid text-center">
                <div class="point-icon">期望薪资</div>
                <p>{{$base->hope_salary}}万/年</p>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!-- //contact-us -->
<!-- footer -->
<div class="copy-right">
    <div class="container">
        @include('shared.resume_footer')
    </div>
</div>
<!-- footer -->
<!-- smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
</body>
</html>