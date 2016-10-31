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
                        <h5>新增工作经验</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="job_add" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="work_id" value="@if(isset($work)) {{$work->id}} @else 0 @endif">

                            <div class="control-group">
                                <label class="control-label">职位名称</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="@if(isset($work)) {{$work->job_name}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">工作内容</label>
                                <div class="controls">
                                    <textarea name="job_content" id="job_content">@if(isset($work)) {{$work->job_content}} @endif</textarea>
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
            <div id="footer" class="span12">
                2012 &copy; UniAdmin.</div>
        </div>
    </div>


@endsection
