<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
<?php if(is_array($product)): foreach($product as $k=>$v): ?><li><?php echo ($k); ?><img src="<?php echo (articletimg($v[id],500,500)); ?>"></li><?php endforeach; endif; ?>
</ul>
</body>
</html>