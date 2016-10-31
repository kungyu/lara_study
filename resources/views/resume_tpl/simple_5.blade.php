<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@if(!is_null($base)) {{$base->real_name}} @endif -- 个人简历</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="resume_tpl/simple_5/css/default.css">
    <link rel="stylesheet" href="resume_tpl/simple_5/css/layout.css">
    <link rel="stylesheet" href="resume_tpl/simple_5/css/media-queries.css">
    <link rel="stylesheet" href="resume_tpl/simple_5/css/magnific-popup.css">

    <!-- Script
    ================================================== -->
    <script src="resume_tpl/simple_5/js/modernizr.js"></script>

    <!-- Favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >

</head>

<body>




<!-- About Section
================================================== -->
<section id="about">

    <div class="row">

        <div class="three columns">

            <img class="profile-pic"  src="images/blog/user.jpg" alt="" />

        </div>

        <div class="nine columns main-col">

            <h2>关于我</h2>



                <div class="columns contact-details">
                    <ul class="address">
                        <li class="portfolio-item-meta">所在地:{{$base->locate_name}}</li>
                        <li class="portfolio-item-meta">电话:{{$user->phone}}</li>
                        <li class="portfolio-item-meta">邮箱:{{$user->email}}</li>
                        <li class="portfolio-item-meta">期望行业:{{$base->industry}}</li>
                        <li class="portfolio-item-meta">期望职位:{{$base->hope_job}}</li>
                        <li class="portfolio-item-meta">期望薪资:{{$base->hope_salary}}万元/年</li>
                    </ul>


                </div>



        </div> <!-- end .main-col -->

    </div>

</section> <!-- About Section End-->


<!-- Resume Section
================================================== -->
<section id="resume">

    @if(!is_null($education))
    <!-- Education
    ----------------------------------------------- -->
    <div class="row education">

        <div class="three columns header-col">
            <h1><span>教育经历</span></h1>
        </div>

        <div class="nine columns main-col">
            @foreach($education as $edu)
            <div class="row item">

                <div class="twelve columns">

                    <h3>{{$edu->school}}</h3>
                    <p class="info">{{$edu->major}} - {{$record_name[$edu->record]}} <span>&bull;</span> <em class="date">{{$edu->start_time}} - {{$edu->end_time}}</em></p>

                </div>

            </div> <!-- item end -->
            @endforeach

        </div> <!-- main-col end -->

    </div> <!-- End Education -->
    @endif
    @if(!is_null($work))
    <!-- Work
    ----------------------------------------------- -->
    <div class="row work">

        <div class="three columns header-col">
            <h1><span>工作经历</span></h1>
        </div>

        <div class="nine columns main-col">
            @foreach($work as $work_val)
            <div class="row item">

                <div class="twelve columns">

                    <h3>{{$work_val->company}}</h3>
                    <p class="info">{{$work_val->job_name}} <span>&bull;</span> <em class="date">{{$work_val->start_time}} - {{$work_val->end_time}}</em></p>

                    <p>
                        {{$work_val->job_content}}
                    </p>

                </div>

            </div> <!-- item end -->
            @endforeach

        </div> <!-- main-col end -->

    </div> <!-- End Work -->
    @endif

    @if(!is_null($project))
        <!-- Work
    ----------------------------------------------- -->
            <div class="row work">

                <div class="three columns header-col">
                    <h1><span>项目经历</span></h1>
                </div>

                <div class="nine columns main-col">
                    @foreach($project as $work_val)
                        <div class="row item">

                            <div class="twelve columns">

                                <h3>{{$work_val->project_name}}</h3>

                                <p>
                                    {{$work_val->project_content}}
                                </p>

                            </div>

                        </div> <!-- item end -->
                    @endforeach

                </div> <!-- main-col end -->

            </div> <!-- End Work -->
    @endif

    @if(!is_null($skill))
    <!-- Skills
    ----------------------------------------------- -->
    <div class="row skill">

        <div class="three columns header-col">
            <h1><span>专业技能</span></h1>
        </div>

        <div class="nine columns main-col">


            <div class="bars">

                <ul class="skills">
                    @foreach($skill as $skill_val)
                    <li><span class="bar-expand" style="width:{{$skill_val->proficiency}}%"></span><em>{{$skill_val->skill_name}}</em></li>
                    @endforeach
                </ul>

            </div><!-- end skill-bars -->

        </div> <!-- main-col end -->

    </div> <!-- End skills -->
    @endif
</section> <!-- Resume Section End-->

@if(!is_null($gallery))
<!-- Portfolio Section
================================================== -->
<section id="portfolio">

    <div class="row">

        <div class="twelve columns collapsed">

            <h1>作品展示</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                @foreach($gallery as $gallery_key=>$gallery_val)
                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#modal-{$gallery_key+1}" title="">
                            <img alt="" src="{{$gallery_val->thumb_url}}">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div> <!-- item end -->
                @endforeach
                

            </div> <!-- portfolio-wrapper end -->

        </div> <!-- twelve columns end -->


    </div> <!-- row End -->

</section> <!-- Portfolio Section End-->
@endif



<!-- footer
================================================== -->
<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="copyright">
                @include('shared.resume_footer')
            </ul>

        </div>

        <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>

    </div>

</footer> <!-- Footer End-->

<!-- Java Script
================================================== -->
<script src="resume_tpl/simple_5/js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="resume_tpl/simple_5/js/jquery-1.10.2.min.js"><\/script>')</script>
<script type="text/javascript" src="resume_tpl/simple_5/js/jquery-migrate-1.2.1.min.js"></script>

<script src="resume_tpl/simple_5/js/jquery.flexslider.js"></script>
<script src="resume_tpl/simple_5/js/waypoints.js"></script>
<script src="resume_tpl/simple_5/js/jquery.fittext.js"></script>
<script src="resume_tpl/simple_5/js/magnific-popup.js"></script>
<script src="resume_tpl/simple_5/js/init.js"></script>

</body>

</html>