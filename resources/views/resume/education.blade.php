@extends('layouts.resume')

@section('content')
    <a href="edu_add" class="btn btn-success btn-mini" style="float:left; margin-top:10px;margin-left:19px;">新增</a>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-comment"></i>
								</span>
                        <h5>教育经历</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <ul class="recent-comments">
                            @foreach ($works as $work)
                                <li>
                                    <div class="comments">
                                    <span class="user-info">
                                        {{$work->start_time}} 至 {{$work->end_time}}
                                    </span>
                                        <p>
                                            {{$work->school}} {{$work->major}}
                                        </p>
                                        <p>
                                            @if($work->record == 1) 大专
                                                @elseif($work->record == 2) 本科
                                                @elseif($work->record == 3) 硕士
                                                @elseif($work->record == 4) 博士
                                                @endif
                                        </p>
                                        <a href="edu_edit_{{$work->id}}.html" class="btn btn-primary btn-mini">修改</a>  <a href="javascript:;" del_url="edu_del_{{$work->id}}.html" class="btn btn-danger btn-del btn-mini">删除</a>
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
