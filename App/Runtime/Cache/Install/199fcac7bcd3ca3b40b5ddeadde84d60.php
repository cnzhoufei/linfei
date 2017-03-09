<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>
<div style="width:500px;height:300px;margin:0 auto;margin-top:15%;background:#A9A9A9;line-height:300px;text-align:center;"><?php echo ($msg); ?></div>
</body>
<?php if($url){ ?>

<script>

window.location.href="<?php echo ($url); ?>";

</script>

<?php } ?>


</html>