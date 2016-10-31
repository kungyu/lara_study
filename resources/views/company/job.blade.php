@extends('layouts.resume')

@section('content')
    <a href="job_add" class="btn btn-success btn-mini" style="float:left; margin-top:10px;margin-left:19px;">新增</a>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-comment"></i>
								</span>
                        <h5>招聘职位</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <ul class="recent-comments">
                            @foreach ($jobs as $work)
                            <li>
                                <div class="comments">
                                    <p class="user-info">
                                         {{$work->job_name}}
                                    </p>
                                    <p>
                                        <a href="job_edit_{{$work->id}}.html">{{$work->job_content}}</a>
                                    </p>
                                    <a href="job_edit_{{$work->id}}.html" class="btn btn-primary btn-mini">修改</a>  <a href="javascript:;" del_url="job_del_{{$work->id}}.html" class="btn btn-danger btn-del btn-mini">删除</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="row-fluid">
            <div id="footer" class="span12">
                2012 &copy; UniAdmin.</div>
        </div>
    </div>


@endsection
