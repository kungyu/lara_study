@extends('layouts.resume')

@section('content')
    <div>
        @if(!empty($random_str))
        <label style="float:left; margin-top:10px;margin-left:19px;">
            <a  class="btn btn-success btn-mini" href="/resumeview?id={{$random_str}}" target="_blank">预览简历</a>
        </label>
        @else
            <label for="image" class="btn btn-success btn-mini">
                请先创建简历
            </label>
        @endif
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-picture"></i>
                        </span>
                        <h5>模板选择</h5>
                    </div>
                    <div class="widget-content">
                        <ul class="thumbnails">

                                    <li class="span2" class="simple_1">
                                        <a href="javascript:;"  onclick="set_temp(1);" class="thumbnail">
                                            <img src="/images/temp/simple_1.png" alt="" style="max-height: 100px;" />
                                        </a>
                                    </li>

                            <li class="span2">
                                <a href="javascript:;" onclick="set_temp(2);" class="thumbnail">
                                    <img src="/images/temp/simple_2.png" alt="" style="max-height: 100px;"  />
                                </a>
                            </li>

                            <li class="span2">
                                <a href="javascript:;" onclick="set_temp(3);" class="thumbnail">
                                    <img src="/images/temp/simple_3.png" alt="" style="max-height: 100px;"  />
                                </a>
                            </li>

                            <li class="span2">
                                <a href="javascript:;" onclick="set_temp(4);" class="thumbnail">
                                    <img src="/images/temp/simple_4.png" alt="" style="max-height: 100px;"  />
                                </a>
                            </li>

                            <li class="span2">
                                <a href="javascript:;" onclick="set_temp(5);" class="thumbnail">
                                    <img src="/images/temp/simple_5.png" alt="" style="max-height: 100px;"  />
                                </a>
                            </li>

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