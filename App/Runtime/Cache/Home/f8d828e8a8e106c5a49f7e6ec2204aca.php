<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>洪雅轩古建筑修缮设计</title>
	<meta charset="utf-8">
	<meta content="网站关键字" name="keywords">
	<meta content="网站关键字seo" name="description">
	<link rel="stylesheet" type="text/css" href="<?php echo ($style); ?>/css/index.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ($style); ?>/css/list.css">
<link rel="stylesheet" href="<?php echo ($style); ?>/Css/public.css">
<link rel="stylesheet" href="<?php echo ($style); ?>/Css/result.css">
<script type="text/javascript" src="<?php echo ($style); ?>/js/scroll_image.js"></script>
<script type="text/javascript" src="<?php echo ($style); ?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo ($style); ?>/js/jquery.banner.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo ($style); ?>/js/banner.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ($style); ?>/css/lbt.css">
</head>
<body>
<a name="returnTop"></a>
<div id="header" class="header">
  <div class="head_top">
    <div class="body_item"> <span class="fl"><?php echo ($custom['tel']); ?></span> </div>
  </div>
  <div class="header-cr">
    <div class="header_l" id="header_l" onClick="return showhidediv('nav')">
      <div class="logo" style="background-image:url(<?php echo ($config['logo']); ?>);"></div>
      <div class="company">
        <dd><?php echo ($config['name']); ?></dd>
      </div>
      <div class="en"><?php echo ($config['company']); ?></div>
    </div>
    <div class="nav" onclick="showhidediv('nav');"   id="nav">
      <ul>
      <!-- 栏目分类 -->
        <li><a href="<?php echo U('Home/index');?>" title="<?php echo ($config['name']); ?>"><?php echo ($config['home']); ?></a></li>
       <?php if(is_array($classtop)): foreach($classtop as $key=>$v): ?><li><a href="<?php echo U($v['url_name']);?>" target="_blank" rel="nofollow" title="<?php echo ($v['name']); ?>"><?php echo ($v['name']); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</div>

<div class="clear"></div>
<!--轮播图 -->
<div class="headB" style="width:100%;height:30px;background:url(<?php echo ($style); ?>/images/bk.png)repeat-x;""></div>
	<!-- 主体区域 -->

	<main class="main">

		<!-- 轮播图 -->
		<!-- 轮播图 -->
		  <div id="wrapper">
				<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<ul>
							<li data-transition="3dcurtain-horizontal" data-slotamount="15" data-masterspeed="300">
								<img src="<?php echo ($style); ?>/images/slide3.jpg" alt="" />									
							</li>				
						</ul>
					</div>

				</div>
			</div>	
			<div class="lubT"></div>

	<!-- 轮播图结束 -->

	<!-- 轮播图结束 -->
		<!-- 正文开始 -->
		<div class="listMain">
			<div class="listT">
				<h3>古建筑设计修缮相关案例</h3>
				<p>HONGYAXUAN ◎ HISTORIC BUILDINGS DECORATE RELATED CASES</p>
			</div>
			<div class="newList">
				<ul>
				<?php if(is_array($article)): foreach($article as $key=>$v): ?><li>
						<img src="<?php echo homeimg($v['id'],300,200,'article');?>">
						<div class="news">
							<h2><a href="<?php echo ($v['url']); ?>"><?php echo getsubstr($v['title'],0,50);?></a></h2>
							<p><?php echo getsubstr($v['description'],0,230);?></p>
							<h3>TAG:<a href="<?php echo ($v['url']); ?>">古建牌坊</a> <a href="<?php echo ($v['url']); ?>">中式传统建筑</a> <a href="#">牌楼牌坊文化</a><span><a href="#">查看详情&gt;&gt;</a></span></h3>
						</div>
						<div class="cl"></div>
					</li><?php endforeach; endif; ?>
							
					</ul>
			</div>
			<div class="listPage">
				<ul>
					<li><a href="#">共22条</a></li>
					<?php echo ($page); ?>
					<div class="cl"></div>
				</ul>

			</div>

		</div>
	<!-- 第七屏结束 -->
	<div class="s8">
		<div class="s8Main">
			<div class="s8L">
				<h3>联系客服，提出您的装修需求</h3>
				<h3>即可获得最贴心的一站式服务</h3>
			</div>
			<div class="s8R">
				<span><a href="#">在线咨询</a></span>
				<span><a href="#">预约设计</a></span>
			</div>
			<div class="cl"></div>
		</div>

	</div>

		<div class="cl"></div>
	</main>
		<div class="cl"></div>
<!-- 底部 -->
	<footer class="footer">

		<div class="footMain" onselectstart="return false">
			<div class="foot1">
				<dl>
					<dt>关于我们</dt>
					<dd><a href="#">公司简介</a></dd>
					<dd><a href="#">联系我们</a></dd>
					<dd><a href="#">收费标准</a></dd>
					<dd><a href="#">人才招聘</a></dd>
					<dd><a href="#">服务流程</a></dd>
					<dd><a href="#">网站地图</a></dd>
					</dl>
				<dl>
					<dt>项目分类</dt>
					<dd><a href="#">四合院</a></dd>
					<dd><a href="#">寺庙寺院</a></dd>
					<dd><a href="#">古建园林</a></dd>
					<dd><a href="#">美容院</a></dd>
					<dd><a href="#">办公室</a></dd>
					<dd><a href="#">洗浴桑拿</a></dd>
					</dl>
				<dl style="margin-top: 20px;">
					<dd><a href="#">茶楼茶馆</a></dd>
					<dd><a href="#">会所装修</a></dd>
					</dl>
			</div>
			
			<div class="foot2">
				<p>电话：400-030-8710　010-84308710</p>
				<p>邮箱：service@hongyaxuan.com</p>
				<p>地址：北京市朝阳区环铁艺术城C-007</p>
			</div>

			<div class="foot3">
				<dl>
					<dt>关注洪雅轩</dt>
					<dd><a href="#" class="jguanzhu1"></a></dd>
					<dd><a href="#" class="jshouting"></a></dd>
					<dd><a href="#" class="jguangzhu2"></a></dd>
					</dl>
			</div>
		<div class="cl"></div>
		</div>
		<div class="footerT">
			<div class="footerTL">
				<p>Copyright 2009-2016 hongyaxuan.net All rights reserved.</p>
				<p>洪雅轩（北京）国际艺术设计事务所版权所有</p>
				<p>京ICP备14034020号</p>
			</div>
			<div class="footerTR"></div>
			<div class="cl"></div>
		</div>
	</footer>
</body>
</html>