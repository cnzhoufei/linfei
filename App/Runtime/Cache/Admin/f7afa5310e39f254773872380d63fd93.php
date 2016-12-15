<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Uploadify</title>
<link rel="stylesheet" type="text/css" href="/Public/uploadify/uploadify.css" />
<body>
<style>#fileQueue img{width:100px;}</style>
<div class="W">
	<div class="Bg"></div>
	<div class="Wrap" id="Wrap">
		<div class="Title">
			<h3 class="MainTit" id="MainTit"></h3>
			<a href="javascript:Close();" title="关闭" class="Close"></a>
		</div>
		<div class="Cont">
			<p class="Note">最多上传<strong><?php echo ($num); ?></strong>个附件,单文件最大<strong>4M</strong>,类型<strong>jpg,png,gif,jpeg</strong></p>
                        <form class="form-horizontal" role="form" action="<?php echo U('Uploads/uploads');?>?num=<?php echo ($num); ?>&name=<?php echo ($name); ?>" method="post" enctype="multipart/form-data">

			<div class="flashWrap">
				<input name="uploadify[]" id="uploadify" type="file" multiple="true" onchange="check(this)" />
			</div>
			<div class="fileWarp">
				<fieldset>
					<legend>列表</legend>
					<ul id="imgs">
					</ul>
					<div id="fileQueue">
					</div>
				</fieldset>
			</div>
			<div class="btnBox">
				<button class="submit" id="SaveBtn">保存</button>
				&nbsp;
				<button class="btn" id="CancelBtn">取消</button>
				</form>
			</div>
		</div>
		<!--[if IE 6]>
		<iframe frameborder="0" style="width:100%;height:100px;background-color:transparent;position:absolute;top:0;left:0;z-index:-1;"></iframe>
		<![endif]-->
	</div>
</div>

<script src="/Public/uploadify/jquery.min.js" type="text/javascript"></script> 
<!--防止客户端缓存文件，造成uploadify.js不更新，而引起的“喔唷，崩溃啦”-->
</script>			
<script src="/Public/uploadify/uploadify-move.js" type="text/javascript"></script> 
<script type="text/javascript">
function Close(){
	$("iframe.uploadframe", window.parent.document).remove();
}

$("#CancelBtn").click(function(){
	$("iframe.uploadframe", window.parent.document).remove();
	//$('#uploadify').uploadifyClearQueue();
	//$(".fileWarp ul li").remove();
});





    function check(obj){
        // $('#div_pic').css('display','');
        // $('#div_pic .imgss').remove();
        for(var i = 0;i < obj.files.length;i++){
          $("<img class='imgss' src='"+ window.URL.createObjectURL(obj.files[i]) +"' />").appendTo($('#fileQueue'));
          
        }
    }

function SetImgContent(data){	
	var obj=eval('('+data+')');
	if(obj.state == 'SUCCESS'){
		var sLi = "";
		sLi += '<li class="img">';
		sLi += '<img src="' + obj.url + '" width="100" height="100" onerror="this.src=\'/Public/uploadify/nopic.png\'">';
		sLi += '<input type="hidden" name="fileurl_tmp[]" value="' + obj.url + '">';
		sLi += '<a href="javascript:void(0);">删除</a>';
		sLi += '</li>';
		return sLi;
	}else{
		//window.parent.message(obj.text,8,2);
		alert(obj.text);
		return;
	}
}



/*点击保存按钮时
 *判断允许上传数，检测是单一文件上传还是组文件上传
 *如果是单一文件，上传结束后将地址存入$input元素
 *如果是组文件上传，则创建input样式，添加到$input后面
 *隐藏父框架，清空列队，移除已上传文件样式*/
$("#SaveBtn").click(function(){	
// 	var callback = "callback1";
// 	var num = 1;
// 	var fileurl_tmp = [];
// 	if(callback != "undefined"){	
// 		if(num > 1){	
// 			 $("input[name^='fileurl_tmp']").each(function(index,dom){
// 				fileurl_tmp[index] = dom.value;
// 			 });	
// 		}else{
// 			fileurl_tmp = $("input[name^='fileurl_tmp']").val();	
// 		}
// 		eval('window.parent.'+callback+'(fileurl_tmp)');
// 		$(window.parent.document).find("iframe.uploadframe").remove();
// 		return;
// 	}					 
// 	if(num > 1){
// 			var fileurl_tmp = "";
// 			$("input[name^='fileurl_tmp']").each(function(){
// 				fileurl_tmp += '<li rel="'+ this.value +'"><input class="input-text" type="text" name="newsimg[]" value="'+ this.value +'" /><a href="javascript:void(0);" onclick="ClearPicArr(\''+ this.value +'\',\'\')">删除</a></li>';	
// 			});			
// 			$(window.parent.document).find("#newsimg").append(fileurl_tmp);
// 	}else{
// 			$(window.parent.document).find("#newsimg").val($("input[name^='fileurl_tmp']").val());
// 	}
	
	// $(window.parent.document).find("iframe.uploadframe").remove();
	$(window.parent.document).find("iframe.uploadframe").css('z-index','-1');
	// $(window.parent.document).find("iframe.uploadframe")
	// $(fileQueue)
	$(window.parent.document).find("#<?php echo ($id); ?>").html($('#fileQueue').html());
});
</script>
</body>
</html>