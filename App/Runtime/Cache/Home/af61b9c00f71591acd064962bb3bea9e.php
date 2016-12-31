<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>

</ul>

<div>


                    <?php $Model = new \Think\Model(); $sql = "select * from linfei_adv where pid = 1"; $adv = $Model->query($sql); foreach($adv as $k=>$v):?><a class="<?php echo ($k); ?>" href="<?php echo ($v[url]); ?>"><img src="<?php echo advertisingimg($v[id],500,500);?>" /></a><?php endforeach;?>
    


</div>
</body>
</html>