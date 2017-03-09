<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>填写数据库</title>
	<script type="text/javascript" src="/Public/js/jquery-1.7.2.min.js"></script>
	<style type="text/css">
	tr{width:100%;}
	input{width:90%;height:30px;}
	tr:first-child td:first-child{
            text-align:left;
            width:120px;
          }
     td{text-align:left;height:50px;}

	</style>
</head>
<body>
	<div style="width:800px;margin:0 auto;margin-top:15%;background:#A9A9A9;">
		<form  method="post" action="" onsubmit="return mysubmit();">
		<table style="width:680px;margin-left:60px;">
			<tr>
				<td>数据库地址：</td>
				<td><input class="form-horizontal" type="text" name="ip"></td>
				<td style="width:220px;">IP、localhost、127.0.0.1</td>
			</tr>
			<tr>
				<td>数据库名：</td>
				<td><input type="text" name="name"></td>
				<td>数据库名称</td>

			</tr>
			<tr>
				<td>数据库用户名：</td>
				<td><input type="text" name="root"></td>
				<td>默认为root</td>

			</tr>
			<tr>
				<td>数据库密码：</td>
				<td><input type="password" name="password"></td>
				<td></td>

			</tr>
			<tr>
				<td>表前缀：</td>
				<td><input type="text" name="prefix"></td>
				<td>如：linfei_</td>

			</tr>
			<tr>
				<td>创建数据:</td>
				<td><input type="checkbox" name="data" style="width:30px;"></td>
				<td>勾选此项会为您创建演示数据</td>

			</tr>
			<tr><td colspan='3' style="text-align: center;"><input type="submit" value="安装" style="width:100px;"></td></tr>
		</table>
		</form>
	</div>
</body>
<script type="text/javascript">

function mysubmit()
{
	if(!$('input[name=ip]').val()){
		$('input[name=ip]').parent().next().html('数据库地址，不能为空！').css('color','#f00');
		return false;
	}
	if(!$('input[name=name]').val()){
		$('input[name=name]').parent().next().html('数据库名称，不能为空！').css('color','#f00');
	return false;
	}
	if(!$('input[name=root]').val()){
		$('input[name=root]').parent().next().html('数据库用户名，不能为空！').css('color','#f00');
	return false;
	}
	if(!$('input[name=password]').val()){
		$('input[name=password]').parent().next().html('数据库密码，不能为空！').css('color','#f00');
	return false;
	}


	return true;
}
$('input[name=password]').blur(function(){
	$.post("/Install/Index/connect.php", {'ip': $('input[name=ip]').val(), 'root':$('input[name=root]').val(), 'password':$('input[name=password]').val()} ,function(res){
		if(res.i != 1){
			$('input[name=password]').parent().next().html(res).css('color','#f00');
			
		}else{
		$('input[name=password]').parent().next().html(res.msg).css('color','#00f');

		}
	})
})

</script>
</html>