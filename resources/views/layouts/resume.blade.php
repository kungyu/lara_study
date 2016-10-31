<!DOCTYPE html>
<html lang="en">
<!-- container-fluid -->
<head>
    <title>精简历----选择属于你自己的简历风格</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/stastic/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/stastic/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/stastic/css/fullcalendar.css" />
    <link rel="stylesheet" href="/stastic/css/unicorn.main.css" />
    <link rel="stylesheet" href="/stastic/css/colorpicker.css" />
    <link rel="stylesheet" href="/stastic/css/datepicker.css" />
    <link rel="stylesheet" href="/stastic/css/uniform.css" />
    <link rel="stylesheet" href="/stastic/css/select2.css" />

    <link rel="stylesheet" href="/stastic/css/unicorn.grey.css" class="skin-color" />
    <link rel="stylesheet" media="screen" href="/stastic/css/bootstrap-slider.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type='text/css'>
        /* Example 1 custom styles */
        #ex1Slider .slider-selection {
            background: #BABABA;
        }

        /* Example 3 custom styles */
        #RGB {
            height: 20px;
            background: rgb(128, 128, 128);
        }
        #RC .slider-selection {
            background: #FF8282;
        }
        #RC .slider-handle {
            background: red;
        }
        #GC .slider-selection {
            background: #428041;
        }
        #GC .slider-handle {
            background: green;
        }
        #BC .slider-selection {
            background: #8283FF;
        }
        #BC .slider-handle {
            border-bottom-color: blue;
        }
        #R, #G, #B {
            width: 300px;
        }
    </style>

</head>
<body>


<div id="header">
    <a href="/index.php"><h1>精简历</h1></a>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> 菜单</a>
    <ul>
        <li class="active"><a href="home"><i class="icon icon-home"></i> <span>基本信息</span></a></li>
        {{--<li class="submenu">
            <a href="#"><i class="icon icon-th-list"></i> <span>表单组件</span> <span class="label">3</span></a>
            <ul>
                <li><a href="form-common.html">通用组件</a></li>
                <li><a href="form-validation.html">表单验证</a></li>
                <li><a href="form-wizard.html">表单提示</a></li>
            </ul>
        </li>--}}
        <li><a href="work"><i class="icon icon-tint"></i> <span>工作经历</span></a></li>
        <li><a href="project"><i class="icon icon-pencil"></i> <span>项目经验</span></a></li>
        <li><a href="education"><i class="icon icon-th"></i> <span>教育经历</span></a></li>
        <li><a href="skills"><i class="icon icon-th-list"></i> <span>专业技能</span></a></li>
        <li><a href="intention"><i class="icon icon-th-list"></i> <span>求职意向</span></a></li>

        <li>
            <a href="gallery"><i class="icon icon-signal"></i> <span>作品展示</span></a>
        </li>
        <li>
            <a href="tempselect"><i class="icon icon-th"></i> <span>简历模板</span></a>
        </li>
        <li>
            <a href="logout"><i class="icon icon-inbox"></i> <span>退出</span></a>
        </li>
    </ul>

</div>

<div id="content">
    @yield('content')
</div>


<script src="/stastic/js/excanvas.min.js"></script>
<script src="/stastic/js/jquery.min.js"></script>
<script src="/stastic/js/jquery.ui.custom.js"></script>
<script src="/stastic/js/bootstrap.min.js"></script>
<script src="/stastic/js/bootstrap-colorpicker.js"></script>
<script src="/stastic/js/bootstrap-datepicker.js"></script>
<script src="/stastic/js/jquery.uniform.js"></script>
<script src="/stastic/js/select2.min.js"></script>

<script src="/stastic/js/unicorn.form_common.js"></script>
<script src="/stastic/js/layer/layer.js"></script>


<script src="/stastic/js/jquery.flot.min.js"></script>
<script src="/stastic/js/jquery.flot.resize.min.js"></script>
<script src="/stastic/js/jquery.peity.min.js"></script>
<script src="/stastic/js/fullcalendar.min.js"></script>
<script src="/stastic/js/unicorn.js"></script>
<script src="/stastic/js/unicorn.dashboard.js"></script>
<script src="/stastic/js/jquery.act.js"></script>
<script type="text/javascript" src="/stastic/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="/stastic/js/ajaxfileupload.js"></script>



<script>
    // With JQuery
    $(".ex8").slider({
        tooltip: 'always'
    });

    // Without JQuery
        var slider = new Slider(".ex8", {
            tooltip: 'always'
        });
</script>

</body>
</html>