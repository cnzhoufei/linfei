<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
   <script src='/App/Admin/View/style/js/jquery-2.0.3.min.js'></script>
    <style type="text/css">
        div{
            width:100%;
        }
    </style>
</head>
<body>
<input type="button" name="sss" value="上传图片" onclick="test2()" />
<div style="width:600px;height: 600px;margin:0 auto;">

<iframe  src="" id="ifr"	style="width:500px;height: 500px;display: none;"></iframe>

</div>
   
    
<script>

function test2(){


	$('#ifr').css('display','').attr('src',"<?php echo U('User/test');?>");
	// $.post("<?php echo U('User/test2');?>", {} , function(res){




	// })
	// // alert(1)

	
}

</script>



</body>
</html>