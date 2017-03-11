<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>选择模板</title>
	<link rel="stylesheet" href="/App/Admin/View/style/css/bootstrap.min.css" />
<script src="/Public/js/jquery-1.7.2.min"></script>
	<link rel="stylesheet" href="/App/Admin/View/style/css/font-awesome.min.css" />
	<style type="text/css">th{text-align:center;};td .icon-folder-close{color:#FFE793;background:#FFE793}
	tr{width:100%;border:1px solid #D5D5D5;}
	</style>
</head>
<body>
<div style="width:100%;">
	
	<table style="width:100%;border:1px solid #D5D5D5;">
	<tr>
	<td><a href="<?php echo U('SelectTemplets');?>?path=<?php echo ($top); ?>&tplname=<?php echo ($tplname); ?>">上级目录</a></td><td rowspan="1" colspan="2">当前目录：<?php echo ($path); ?></td>
	</tr>
	<tr>
		<th style="width:48%;">文件名</th>
		<th style="width:10%;">文件大小</th>
		<th style="width:39%;">最后更改时间</th>
	</tr>
	
		<?php if(is_array($dir)): foreach($dir as $key=>$v): ?><tr>
				<td><i class="<?php echo ($v['icon']); ?>"></i> &nbsp;&nbsp;<a <?php echo ($v['gb']); ?> href="<?php echo U('SelectTemplets');?>?path=<?php echo ($v['path']); ?>&tplname=<?php echo ($tplname); ?>"><?php echo ($v['name']); ?></a></td>
				<td style="text-align:center;"><?php echo ($v['size']); ?></td>
				<td style="text-align:center;"><?php echo ($v['time']); ?></td>
	</tr><?php endforeach; endif; ?>


	</table>

</div>
</body>
<script type="text/javascript">
function gb(filename)
{
	window.opener.document.form.<?php echo $tplname;?>.value=filename;//将此窗口的值写入到另一个窗口 name等于form下的name等于tpl的表单
	if(document.all) window.opener=true;
	window.close();//关闭窗口
}

</script>
</html>