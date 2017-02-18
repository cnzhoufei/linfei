<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>

</ul>

<div>


                    <?php $Model = new \Think\Model(); $sql = "select * from linfei_adv where pid = 1"; $adv = $Model->query($sql); foreach($adv as $k=>$v):?><a class="<?php echo ($k); ?>" href="<?php echo ($v[url]); ?>" <?php if($v['blank']){echo 'target="_blank"';}?>><img src="<?php echo homeimg($v[id],500,500,'adv');?>" alt="<?php echo ($v['title']); ?>" /></a><?php endforeach;?>

                    <?php $Model = new \Think\Model(); $sql = "select * from linfei_adv where pid = 2"; $adv = $Model->query($sql); foreach($adv as $k=>$v): echo ($v['text']); endforeach;?>
    


                    <?php $Model = new \Think\Model(); $sql = "select * from linfei_adv where pid = 100"; $adv = $Model->query($sql); foreach($adv as $k=>$v): echo ($v['text']); endforeach;?>


</div>
</body>
</html>