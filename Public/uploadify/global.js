

/*
 * 上传图片 后台专用
 * @access  public
 * @null int 一次上传图片张图
 * @elementid string 上传成功后返回路径插入指定ID元素内
 * @path  string 指定上传保存文件夹,默认存在Public/upload/temp/目录
 * @callback string  回调函数(单张图片返回保存路径字符串，多张则为路径数组 )
 */
function GetUploadify(num,name,id)
{	   	
	var upurl ="/Admin/Uploads/uploads.php?num=" + num + '&name=' + name + '&id=' + id;
	var iframe_str='<iframe frameborder="0" ';
	iframe_str=iframe_str+'id=uploadify ';   		
	iframe_str=iframe_str+' src='+upurl;
	iframe_str=iframe_str+' allowtransparency="true" class="uploadframe" scrolling="no"> ';
	iframe_str=iframe_str+'</iframe>';    	    		
	$("body").append(iframe_str);	
	$("iframe.uploadframe").css("height",$(document).height()).css("width","100%").css("position","absolute").css("left","0px").css("top","0px").css("z-index","999999").show();
	$(window).resize(function(){
		$("iframe.uploadframe").css("height",$(document).height()).show();
	});
}

/*
 * 上传图片 前台专用
 * @access  public
 * @null int 一次上传图片张图
 * @elementid string 上传成功后返回路径插入指定ID元素内
 * @path  string 指定上传保存文件夹,默认存在Public/upload/temp/目录
 * @callback string  回调函数(单张图片返回保存路径字符串，多张则为路径数组 )
 */
function GetUploadify2(num,elementid,path,callback)
{	   	
	var upurl ='/index.php?m=Home&c=Uploadify&a=upload&num='+num+'&input='+elementid+'&path='+path+'&func='+callback;
	var iframe_str='<iframe frameborder="0" ';
	iframe_str=iframe_str+'id=uploadify ';   		
	iframe_str=iframe_str+' src='+upurl;
	iframe_str=iframe_str+' allowtransparency="true" class="uploadframe" scrolling="no"> ';
	iframe_str=iframe_str+'</iframe>';    	    		
	$("body").append(iframe_str);	
	$("iframe.uploadframe").css("height",$(document).height()).css("width","100%").css("position","absolute").css("left","0px").css("top","0px").css("z-index","999999").show();
	$(window).resize(function(){
		$("iframe.uploadframe").css("height",$(document).height()).show();
	});
}
/*
 * 删除组图input
 * @access   public
 * @val  string  删除的图片input
 */
function ClearPicArr(val)
{
	$("li[rel='"+ val +"']").remove();
	$.get(
		"{:U('Admin/Uploadify/delupload')}",{action:"del", filename:val},function(){}
	);
}
/*
 * 删除组图input
 * @access   public
 * @val  string  删除的图片input
 */
function ClearPicArr2(val)
{
    $("li[rel='"+ val +"']").remove();
    $.get(
        "{:U('Home/Uploadify/delupload')}",{action:"del", filename:val},function(){}
    );
}

