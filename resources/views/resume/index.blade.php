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
                        <h5>基础信息设置</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="home" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <div class="control-group">
                                <label class="control-label">真实姓名</label>
                                <div class="controls">
                                    <input type="text" name="real_name" id="real_name" value="@if(!is_null($base)) {{$base->real_name}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">出生年份</label>
                                <div class="controls">
                                    <input type="text" name="birth" id="birth" placeholder="例如:1988" value="@if(!is_null($base)) {{$base->birth_year}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">工作年份</label>
                                <div class="controls">
                                    <input type="text" name="work" id="work" placeholder="例如:1988" value="@if(!is_null($base)) {{$base->work_year}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">所在地</label>
                                <div class="controls">
                                    <input type="text" name="locate_name" onclick="region_click();" value="@if(!is_null($base)) {{$base->locate_name}} @else青岛 @endif" id="locate_name">
                                    <input type="hidden" name="locate" value="@if(!is_null($base)) {{$base->locate}} @else 284 @endif" id="locate">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">当前年薪</label>
                                <div class="controls">
                                    <input type="text" name="salary" id="salary" value="@if(!is_null($base)) {{$base->salary_year}} @endif">万元/年
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">求职状态</label>
                                <div class="controls">
                                    <select name="job_status">
                                        <option value="1"  @if(!is_null($base)) @if($base->job_status == 1) selected @endif @endif />在职, 看看新机会
                                        <option value="2"  @if(!is_null($base)) @if($base->job_status == 2) selected @endif @endif />在职, 急需新工作
                                        <option value="3"  @if(!is_null($base)) @if($base->job_status == 3) selected @endif @endif />在职, 暂无跳槽打算
                                        <option value="4"  @if(!is_null($base)) @if($base->job_status == 4) selected @endif @endif />离职, 正在找工作
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
