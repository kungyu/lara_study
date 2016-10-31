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
                        <form action="intention" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <div class="control-group">
                                <label class="control-label">期望行业</label>
                                <div class="controls">
                                    <select name="hope_industry">
                                        <option/>--请选择行业分类--
                                        @foreach($industry_son as $industry_val)
                                        <option value="{{$industry_val->industry_no}}"  @if(!is_null($base)) @if($base->hope_industry == $industry_val->industry_no) selected @endif @endif />{{$industry_val->industry_name}}
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">期望职位</label>
                                <div class="controls">
                                    <input type="text" name="hope_job" id="hope_job" placeholder="" value="@if(!is_null($base)) {{$base->hope_job}} @endif">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">期望年薪</label>
                                <div class="controls">
                                    <input type="text" name="hope_salary" id="hope_salary" value="@if(!is_null($base)) {{$base->hope_salary}} @endif">万元/年
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
