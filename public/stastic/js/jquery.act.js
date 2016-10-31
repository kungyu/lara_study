/**
 * Created by kung on 16-9-12.
 */
$(".btn-submit").click(function(){
    var url = $("form").attr('action');
    var data = $("form").serialize();
    $.post(url,data,function(data){
        data = JSON.parse(data);

        layer.msg(data.info);
        if(data.state == 1)
            document.location.reload();
    });
    return false;
});

$(".btn-del").click(function(){
    var url = $(this).attr('del_url');
    var parent_obj = $(this).parent().parent();
    $.get(url,function(data){
        data = JSON.parse(data);
        if(data.state == 1)
            parent_obj.remove();
        layer.msg(data.info);
    })
});



function uploadFile(elementId){
    if($('#'+elementId).val()){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token]").val()
            }
        });

        $.ajaxFileUpload(
            {
                url:'imgup',//用于文件上传的服务器端请求地址
                data : {
                    _token : $("input[name=_token]").val(),
                },
                secureuri:false,//一般设置为false
                fileElementId:elementId,//文件上传空间的id属性  <input type="file" id="file" name="file" />
                dataType: 'json',//返回值类型 一般设置为json
                success: function (data)  //服务器成功响应处理函数
                {
                    if(data.status == 1){
                        var html = '<li class="span2">'+
                            '<a href="javascript:;" class="thumbnail">'+
                            '<img src="'+data.imgurl+'" alt="">'+
                            '</a>'+
                            '<div class="actions">'+
                            '<a title="" href="#"><i class="icon-remove icon-white"></i></a>'+
                            '</div>'+
                        '</li>';
                        $(".thumbnails").append(html);
                        $(".no_pic").remove();
                    }
                },
                error: function (data, status, e)//服务器响应失败处理函数
                {
                    layer.msg('上传失败')
                }
            }
        )
    }else{
        layer.msg('文件类型不合法,只能是 jpg、gif、bmp、png、jpeg 类型！')
    }
}

function region_click(){
    var layer_index = layer.prompt({
        title: '输入城市名称，并确认',
        formType: 0 //prompt风格，支持0-2
    }, function(text){
        $.get('/get_region?name='+text,function(data){
            data = JSON.parse(data);
            if(data.region_id != 0){
                $("#locate_name").val(data.region_name);
                $("#locate").val(data.region_id);
            }else{
                layer.msg("未找到对应城市,请重新输入城市名称")
            }
            layer.close(layer_index);
        });
    });

}

function get_gallery(n){
    n = parseInt(n);
    $.getJSON('/get_gallery', function(json){
        json.start = n;
        layer.photos({
            photos: json
        });
    });
}

function img_del(obj,img_id){
    $.get('img_del_'+img_id,function(data){
        data = JSON.parse(data);
        if(data.state == 1)
            $(obj).parent().parent().remove();
        layer.msg(data.info)
    })
}

function set_temp(id){
    $.get('/set_tpl_'+id,function(data){
        data = JSON.parse(data);
        if(data.state == 1){
            layer.msg('简历模板选择成功');
            $(".simple_"+id).attr("style","border:1px solid #08c");
        }
    })
}

