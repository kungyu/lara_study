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
                        <h5>新增专业技能</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="skill_add" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="skill_id" value="@if(isset($work)) {{$work->id}} @else 0 @endif">

                            <div class="control-group">
                                <label class="control-label">技能名称</label>
                                <div class="controls">
                                    <input type="text"  name="skill" id="skill" value="@if(isset($work)) {{$work->skill_name}} @endif" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">熟练度</label>
                                <div class="controls">
                                    <input class="ex8" name="proficiency" id="proficiency" value="@if(isset($work)) {{$work->proficiency}} @else 80 @endif" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="@if(isset($work)) {{$work->proficiency}} @else 80 @endif"/> %
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
