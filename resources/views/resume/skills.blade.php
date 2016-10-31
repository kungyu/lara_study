@extends('layouts.resume')

@section('content')
    <div style="float:left; margin-top:10px;margin-left:19px;">
        <a href="skill_add" class="btn btn-success btn-mini" >新增</a>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-comment"></i>
								</span>
                        <h5>专业技能</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <ul class="recent-comments">

                            @foreach ($works as $work)
                            <li>
                                <div class="control-group">
                                    <label class="control-label">技能名称</label>
                                    <div class="controls">
                                        {{$work->skill_name}}
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">熟练度</label>
                                    <div class="progress progress-striped">
                                        <div style="width: {{$work->proficiency}}%;" class="bar">{{$work->proficiency}}%</div>
                                    </div>
                                    <a href="skill_edit_{{$work->id}}.html" class="btn btn-primary btn-mini">修改</a>  <a href="javascript:;" del_url="skill_del_{{$work->id}}.html" class="btn btn-danger btn-del btn-mini">删除</a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="row-fluid">
            @include('shared.footer')
        </div>
    </div>


@endsection
