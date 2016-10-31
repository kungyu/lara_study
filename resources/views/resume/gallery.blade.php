@extends('layouts.resume')

@section('content')
    <div>
        {!! csrf_field() !!}
        <label for="image" class="btn btn-success btn-mini"  style="float:left; margin-top:10px;margin-left:19px;">上传图片</label>
        <input id="image"  name="image"   type="file" onchange='uploadFile("image");' style="display:none;">
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-picture"></i>
                        </span>
                        <h5>作品展示</h5>
                    </div>
                    <div class="widget-content">
                        <ul class="thumbnails">
                            @if(!empty($works))
                                @foreach($works as $key=>$work)
                                    <li class="span2">
                                        <a href="javascript:;" onclick="get_gallery({{$key}});" class="thumbnail">
                                            <img src="{{$work->thumb_url}}" alt="" />
                                        </a>
                                        <div class="actions">
                                            <a title="" href="javascript:;" onclick="img_del(this,{{$work->id}})"><i style="font-style: normal;color:white">删除</i></a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="no_pic">还没有作品,赶紧上传吧.</li>
                            @endif
                            {{--<li class="span2">
                                <a href="#" class="thumbnail">
                                    <img src="http://placehold.it/140x140" alt="" />
                                </a>
                                <div class="actions">
                                    <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                    <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                                </div>
                            </li>--}}
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