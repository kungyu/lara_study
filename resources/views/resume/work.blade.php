@extends('layouts.resume')

@section('content')
    <a href="work_add" class="btn btn-success btn-mini" style="float:left; margin-top:10px;margin-left:19px;">新增</a>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-comment"></i>
								</span>
                        <h5>工作经历</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <ul class="recent-comments">
                            @foreach ($works as $work)
                            <li>
                                <div class="comments">
                                    <span class="user-info">
                                        {{$work->start_time}} 至 {{$work->end_time}}  {{$work->company}}
                                    </span>
                                    <p class="user-info">
                                         {{$work->job_name}}
                                    </p>
                                    <p>
                                        <a href="work_edit_{{$work->id}}.html">{{$work->job_content}}</a>
                                    </p>
                                    <a href="work_edit_{{$work->id}}.html" class="btn btn-primary btn-mini">修改</a>  <a href="javascript:;" del_url="work_del_{{$work->id}}.html" class="btn btn-danger btn-del btn-mini">删除</a>
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
