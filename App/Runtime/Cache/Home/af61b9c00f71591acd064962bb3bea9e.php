<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
<?php if(is_array($product)): foreach($product as $key=>$v): ?><li><img src="<?php echo (productimg($v[id],500,500)); ?>"></li><?php endforeach; endif; ?>
</ul>
</body>
</html>