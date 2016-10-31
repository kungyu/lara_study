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
                        <form action="company_add" method="post" id="form" class="form-horizontal" >
                            {!! csrf_field() !!}
                            <div class="control-group">
                                <label class="control-label">企业名称</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" value="@if(!is_null($base)) {{$base->company_name}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">所在行业</label>
                                <div class="controls">
                                    <select name="industry">
                                        <option/>--请选择行业分类--
                                        @foreach($industry_son as $industry_val)
                                            <option value="{{$industry_val->industry_no}}"  @if(!is_null($base)) @if($base->industry == $industry_val->industry_no) selected @endif @endif />{{$industry_val->industry_name}}
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">当前状态</label>
                                <div class="controls">
                                    <input type="text" name="status" id="status" placeholder="例如:创业期,发展期,A轮,B轮等" value="@if(!is_null($base)) {{$base->status}} @endif">
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
                                <label class="control-label">联系电话</label>
                                <div class="controls">
                                    <input type="text" name="mobile" id="mobile" placeholder="" value="@if(!is_null($base)) {{$base->mobile}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">公司地址</label>
                                <div class="controls">
                                    <input type="text" name="address" id="address" placeholder="" value="@if(!is_null($base)) {{$base->address}} @endif">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">企业描述</label>
                                <div class="controls">
                                    <textarea name="description" rows="5" id="description">@if(!is_null($base)) {{$base->company_desc}} @endif</textarea>
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
