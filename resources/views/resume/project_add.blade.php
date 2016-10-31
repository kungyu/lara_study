@extends('layouts.resume')

@section('content')

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>
								</span>
                        <h5>新增项目经验</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="project_add" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="project_id" value="@if(isset($work)) {{$work->id}} @else 0 @endif">
                            <div class="control-group">
                                <label class="control-label">开始时间</label>
                                <div class="controls">
                                    <input type="text" name="starttime"  id="starttime" data-date="2012-02-12" data-date-format="yyyy-mm-dd" value="@if(isset($work)) {{$work->start_time}} @endif" class="datepicker">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">结束时间</label>
                                <div class="controls">
                                    <input type="text" data-date="2012-02-12" data-date-format="yyyy-mm-dd" value="@if(isset($work)) {{$work->end_time}} @endif" class="datepicker"  name="endtime" id="endtime" placeholder="项目尚未终止,请选择当前日期" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">项目名称</label>
                                <div class="controls">
                                    <input type="text"  name="project_name" id="project_name" value="@if(isset($work)) {{$work->project_name}} @endif" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">工作职责</label>
                                <div class="controls">
                                    <textarea name="project_content" id="project_content">@if(isset($work)) {{$work->project_content}} @endif</textarea>
                                </div>
                            </div>

                            <div class="form-actions">
                            <button type="button" class="btn btn-primary btn-submit">保存</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            @include('shared.footer')
        </div>
    </div>


@endsection
