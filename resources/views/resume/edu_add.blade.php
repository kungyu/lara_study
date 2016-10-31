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
                        <h5>新增教育经历</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="edu_add" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="edu_id" value="@if(isset($work)) {{$work->id}} @else 0 @endif">
                            <div class="control-group">
                                <label class="control-label">开始时间</label>
                                <div class="controls">
                                    <input type="text" name="starttime"  id="starttime" data-date="2012-02-12" data-date-format="yyyy-mm-dd" value="@if(isset($work)) {{$work->start_time}} @endif" class="datepicker">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">结束时间</label>
                                <div class="controls">
                                    <input type="text" data-date="2012-02-12" data-date-format="yyyy-mm-dd" value="@if(isset($work)) {{$work->end_time}} @endif" class="datepicker"  name="endtime" id="endtime" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">学校名称</label>
                                <div class="controls">
                                    <input type="text"  name="school_name" id="school_name" value="@if(isset($work)) {{$work->school}} @endif" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">专业名称</label>
                                <div class="controls">
                                    <input type="text"  name="major_name" id="major_name" value="@if(isset($work)) {{$work->major}} @endif" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">学历</label>
                                <div class="controls">
                                    <select name="record">
                                        <option value="1"  @if(isset($work)) @if($work->record == 1) selected @endif @endif />大专
                                        <option value="2"  @if(isset($work)) @if($work->record == 2) selected @endif @endif />本科
                                        <option value="3"  @if(isset($work)) @if($work->record == 3) selected @endif @endif />硕士
                                        <option value="4"  @if(isset($work)) @if($work->record == 4) selected @endif @endif />博士
                                    </select>
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
