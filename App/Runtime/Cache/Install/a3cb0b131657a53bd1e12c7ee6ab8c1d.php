<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>填写数据库</title>
</head>
<body>
	<div style="width:1200px;margin:0 auto;">
		<form style="margin-left:400px;margin-top:300px;" method="post" action="">
			数据库地址：<input type="text" name="ip"><br>
			数据库名：<input type="text" name="name"><br>
			数据库用户名：<input type="text" name="root"><br>
			数据库密码：<input type="password" name="password"><br>
			表前缀：<input type="text" name="prefix"><br>
			创建数据：<input type="checkbox" name="sj"><br>
			<input type="submit" value="安装">
		</form>

	</div>
</body>
</html>