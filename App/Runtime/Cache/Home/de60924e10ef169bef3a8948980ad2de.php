<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="applicable-device"content="pc,mobile">
<meta name="renderer" content="webkit">
<title><?php echo ($config['title']); ?></title>
<meta name="keywords" content="<?php echo ($config['keywords']); ?>">
<meta name="description" content="<?php echo ($config['description']); ?>">

<!-- 头部 -->
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
 <div id="wrapper">
        <div class="fullwidthbanner-container">
          <div class="fullwidthbanner">
            <ul>
            <?php if(is_array($pic)): foreach($pic as $key=>$vv): ?><li data-transition="3dcurtain-horizontal" data-slotamount="15" data-masterspeed="300">
                <img src="<?php echo homeimg($vv['id'],1920,452,'pic');?>" alt="<?php echo ($vv['name']); ?>" onclick="window.location.href='<?php echo ($vv['url']); ?>'" style="cursor:pointer;" />                  
              </li><?php endforeach; endif; ?>
            </ul>
          </div>

        </div>
      </div>  
      <div class="lubT"></div>
<div class="clear"></div>
<div class="xk"></div>
<div class="clear"></div>
<!--寺庙 start-->
<div class="main-temple gujian">
    <div class="c">
	<div class="title">精选古建筑<dl> </dl>园林案例</div>
	<div class="explain">致力于古建修缮重建、古建装修、文物建筑保护、古建筑设计、古典园林等一体化工程</div>
	<div class="LeftHandle" id="scrollArrLeft1"></div>
	<div class="rollBoxc" id="scrollCont1">
	
    <div id="conmm">
      <?php if(is_array($recommended)): foreach($recommended as $key=>$r_v): ?><div class="anli"><a href="<?php echo ($r_v['url']); ?>" target="_blank" title="<?php echo ($r_v['title']); ?>">
                  <img src="<?php echo homeimg($r_v['id'],327,418,'product');?>" alt="<?php echo ($r_v['title']); ?>"><div class="index_title"><?php echo getsubstr($r_v['title'],0,55);?></div></a></div><?php endforeach; endif; ?>
    </div>  
 </div>					
  <div class="RightHandle" id="scrollArrRight1"></div>
  </div>
</div>
<div class="clear"></div>
<div class="kePublic-5">
<div class="scene">
<div class="c">
<div class="title">古建修缮设计施工现场</div>
<div class="explain">优秀的古建筑修缮、文物建筑保护工程遍布全球</div>
</div>
<div class="LeftHandle" id="scrollArrLeft2">&nbsp;</div>
<div class="rollBox-scene" id="scrollCont2">
		<div class="scrollCont-2">
						<!--box begin-->
                          <?php $Model = new \Think\Model(); $sql = "select * from linfei_product where cid in(24,25) AND status = 1 limit 1,5"; $product = $Model->query($sql); foreach($product as $key=>$vvv):?><div class="pic"><a href="<?php echo ($vvv['url']); ?>" target="_blank">
      <img src="<?php echo homeimg($vvv['id'],470,592,'product');?>" alt="<?php echo ($vvv['title']); ?>"></a>
			           <div class="pic-cn"><a href="<?php echo ($vvv['url']); ?>" target="_blank"><?php echo getsubstr($vvv['title'],0,25);?></a></div>
			</div><?php endforeach;?>
				</div>
</div>
<div class="RightHandle" id="scrollArrRight2">&nbsp;</div></div>

<div class="index_box">
<div class="index_news">
  <div class="news_title">
                      <?php $Model = new \Think\Model(); $sql = "select * from linfei_classify where id = 25 AND status = 1"; $column = $Model->query($sql); foreach($column as $c_v): echo ($c_v['name']); ?>
  <a href="<?php echo ($c_v['ulr_name']); ?>" target="_blank">更多 ></a><?php endforeach;?>
  </div>
    <ul class="news_list">
                        <?php $Model = new \Think\Model(); $sql = "select * from linfei_product where cid in(25) AND status = 1 limit 5"; $product = $Model->query($sql); foreach($product as $key=>$v):?><li><span class="point"></span><a href="<?php echo ($v['url']); ?>" target="_blank"><?php echo getsubstr($v['title'],0,25);?></a><i><?php echo date('Y-m-d',$v['time']);?></i></li><?php endforeach;?>  
      </ul>
  </div>
<div class="index_news">
  <div class="news_title">
                      <?php $Model = new \Think\Model(); $sql = "select * from linfei_classify where id = 26 AND status = 1"; $column = $Model->query($sql); foreach($column as $v): echo ($v['name']); ?><a href="<?php echo ($v['url_name']); ?>" target="_blank">更多 ></a><?php endforeach;?>
  </div>
    <ul class="news_list">
                        <?php $Model = new \Think\Model(); $sql = "select * from linfei_article where cid in(26) AND status = 1 limit 5"; $article = $Model->query($sql); foreach($article as $key=>$v):?><li><span class="point"></span><a href="<?php echo ($v['url']); ?>" target="_blank"><?php echo getsubstr($v['title'],0,25);?></a><i><?php echo date('Y-m-d',$v['time']);?></i></li><?php endforeach;?>
      </ul>
  </div>
</div>
<div class="clear"></div>
</div>



<div class="clear"></div>
<div class="team">
  <div class="team-c">
    <div class="l">
    <a href="#" target="_blank" class="cor" rel="nofollow"><img src="<?php echo ($style); ?>/Picture/jiakejian.png">
    <div class="explain">
	<div class="t">贾克俭</div>
	<div class="explain-c">[古建/园林设计总监]</div>	
	<div class="explain-c-2">
	在洪雅轩任职前中国文化遗产研究院 高级工程师 从事古建筑保护设计和仿古建筑设计三十余年 <div class="cor">更多 &gt;&gt;</div>
	</div>
	</div>
	</a>    </div>
    <div class="r">
      <div class="title">关于洪雅轩</div>
      <div class="b"> 企业全称： 洪雅轩（北京）国际艺术设计事务所<br>
        企业身份： 中式主义设计的永远倡导者<br>
        企业主张： 中式主义 面向国际<br>
        企业精神： 学习 竞争 超越<br>
     
        企业理论： 洪雅轩面向国际、国内的中式城市规划、中式地产规划、中式园林、中式建筑、中式装修、中式家具的全案设计、施工、定制、外采、摆场、售后的服务，我们致力于成为国际一流的中式主义设计公司
        <div class="telephone">
        <span>设计咨询热线：</span>
        <div class="tel">400-030-8710</div>
        <a href="#" target="_blank" class="cor">设计预约</a>
        <a href="#" target="_blank">留言咨询</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clear"></div>
<div class="choice">
  <div class="c">
    <div class="title">古建设计服务流程 仅仅四步</div>
  </div>                       
  <div class="c l">
    <span><img src="<?php echo ($style); ?>/Picture/vb_02.png">提出您的装修需求</span> 
    <span><img src="<?php echo ($style); ?>/Picture/vb_03.png">专业顾问电话沟通</span> 
    <span><img src="<?php echo ($style); ?>/Picture/vb_04.png">签订设计装修合同</span> 
    <span><img src="<?php echo ($style); ?>/Picture/vb_05.png">开始设计装修</span>
  </div>
  <div class="clear"></div>
  <div class="apply"><a href="#" target="_blank">立即在线预约</a><span>[ 资深设计师团队，为您而等候 ]</span></div>
</div>

<div class="clear"></div>

<!-- rollbox-->
<div class="rollbox">
    <div class="c">
	<div class="title">我们的客户及合作伙伴</div>
	<div class="LeftHandle" id="scrollArrLeft3"></div>
	<div class="rollBoxc" id="scrollCont3">
    	<!--box begin-->
		<div class="anli"><img src="<?php echo ($style); ?>/Picture/youqian_3.jpg" ></div>
        <div class="anli"><img src="<?php echo ($style); ?>/Picture/youqian_1.jpg" ></div>
        <div class="anli"><img src="<?php echo ($style); ?>/Picture/youqian_2.jpg" ></div>
		<div class="anli"><img src="<?php echo ($style); ?>/Picture/youqian_4.jpg" ></div>
    	<!--box end-->
    	</div>					
  <div class="RightHandle" id="scrollArrRight3"></div>
  </div>
</div>

<script type="text/javascript">
  window.onload=function(){
   function adsorption(){
    var headerWrap=document.getElementById('nav');
    var scrollTop=0;
    window.onscroll=function(){
     scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
     if(scrollTop>20){
      document.getElementById('header').style.cssText =" display:none;" 
     }else{
     document.getElementById('header').style.cssText ="display:block;" 
     }
    }
   }
   adsorption();
  }
 </script>

<div class="clear"></div>
<div class="laylogin">
  <div class="c">
    <p class="l">联系客服，提出您的装修需求<br>即可获得最贴心的一站式服务</p>
    <div class="r">
    <a href="#" target="_blank" rel="nofollow">在线咨询</a>
    <a href="#" target="_blank" rel="nofollow">设计预约</a>
    </div>
  </div>
</div>


<div id="footer">
<div class="w">
<ul>
  <li>
    <dl>
    <dt>关于我们</dt>
    <dd><a href="#" target="_blank">公司简介</a></dd>
    <dd><a href="#" target="_blank">联系我们</a></dd>
    <dd><a href="#" target="_blank">收费标准</a></dd>
    <dd><a href="#" target="_blank">人才招聘</a></dd>
    <dd><a href="#" target="_blank">服务流程</a></dd>
    <dd><a href="#" target="_blank">网站地图</a></dd>
    </dl>
  </li>
<li>
<dl>
<dt>项目分类</dt>
<dd><a href="#" title="四合院装修" target="_blank">四合院</a></dd>
<dd><a href="#" title="寺庙寺院装修" target="_blank">寺庙寺院</a></dd>
<dd><a href="#" title="古建筑装修" target="_blank">古建园林</a></dd>
<dd><a href="#" title="美容院装修" target="_blank">美容院</a></dd>
<dd><a href="#" title="办公室装修" target="_blank">办公室</a></dd>
<dd><a href="#" title="洗浴桑拿装修" target="_blank">洗浴桑拿</a></dd>
</dl>
</li>
<li>
<dl>
<dt>　</dt>
<dd><a href="#" title="茶楼中式装修" target="_blank">茶楼茶馆</a></dd>
<dd><a href="#" title="会所装修" target="_blank">会所装修</a></dd>
</dl>
</li>
<li class="wa">
<dl>
<dt>　</dt>
<dd>电话：400-030-8710　010-84308710</dd>
<dd>邮箱：service@hongyaxuan.com</dd>
<dd>地址：北京市朝阳区环铁艺术城C-007</dd>
</dl>
</li>
<li>
<dl class="ico">
<dt>关注洪雅轩</dt>
<dd><a href="#" target="_blank" title="新浪微博" class="sina" rel="nofollow"></a></dd>
<dd><a href="#" target="_blank" title="腾讯微博" class="qweibo" rel="nofollow"></a></dd>
<dd><a href="#" target="_blank" title="QQ空间" class="qzone" rel="nofollow"></a></dd>
</dl>
</li>
<li>
<dl>
<dt>洪雅轩微信公众号</dt>
<dd><img src="<?php echo ($style); ?>/Picture/weixin.jpg" alt="洪雅轩微信公众号二维码" height="100" width="100"></dd>
</dl>
</li>
</ul>
<div class="clear"></div>

  <div class="copyRight">
          <div class="l" style="text-align:left">
          Copyright 2009-2016 hongyaxuan.net All rights reserved. <br>
          洪雅轩（北京）国际艺术设计事务所版权所有<br>
          京ICP备14034020号 
          <a href="#" target="_blank">XML</a> 
          </div>
          <div class="r" style="width: 700px;">
          <a href="#" class="link" target="_blank">古建修缮</a>
          <a href="#" class="link" target="_blank">玉溪装修网</a>
          <a href="# class="link" target="_blank">广州办公家具</a>
          <a href="#" class="link" target="_blank">张家口装修网</a>
          <a href="#" class="link" target="_blank">龙岗厂房出租</a>
          <a href="#" class="link" target="_blank"> 深圳生活指南</a>
          <a href="#" class="link" target="_blank">泗阳装修网 </a>
          <a href="#" class="link" target="_blank">沧州装修公司</a>
          <a href="#" class="link" target="_blank">万州区土地转让</a>
          <a href="#" class="link" target="_blank">纯木门窗</a>
          <a href="#" class="link" target="_blank">泰安樱花</a>
          <a href="#" class="link" target="_blank"> 上海矿棉板</a>
          <a href="#" class="link" target="_blank">258星座</a>
          <a href="#" class="link" target="_blank">福州房产网  </a>
          <a href="#" class="link" target="_blank">苏州装修公司</a>
          </div>
  </div>

</div>
</div>
<!-- help-box -->
<div class="help-box">
  <ul>
    <li class="qq"><a target="_blank" href="#" class="link" title="点击在线咨询"><i class="fa fa-qq"></i></a></li>
    <li class="tel"><a href="javascript:void(0);" class="link" title="联系电话"><i class="fa fa-phone"></i></a>
      <div class="dialog hide">
        <div class="arrow"></div>
        <div class="item">业务咨询:  400-030-8710</div>
        <div class="item">业务咨询:  010-84308710</div>
      </div>
    </li>
    <li class="weixin"><a href="javascript:void(0);" class="link" title="扫码关注微信"><i class="fa fa-weixin"></i></a>
      <div class="dialog hide">
        <div class="arrow"></div>
        <div class="qrcode"><img src="<?php echo ($style); ?>/Picture/shouji.jpg" alt="微信二维码" width="150"><br>微信扫一扫 关注洪雅轩</div>
      </div>
    </li>
    <li>
      <div class="bdsharebuttonbox"> <a title="#" href="#" class="bds_tsina" data-cmd="tsina"></a> </div>
    </li>
    <li class="feedback"><a href="#" target="_blank" data-toggle="modal" data-target="#feedbackModal" class="link" title="装修咨询"><i class="fa fa-comment"></i></a></li>
    <li class="back2top"><a href="#"" title="返回顶部"><i class="fa fa-comment"></i></a></li>
  </ul>
</div>
<div class="message" id="gotop1">
   <div class="message-c">
    <span>
	<a href="tel:4000308710" class="dh">电话咨询</a>
	<a href="#" class="home">预约设计</a>
	<a href="#" class="ifh">关于我们</a>
	</span>
   </div>
</div>
<!-- <script type="text/javascript" src="js/3g.js"></script> -->
<script type="text/javascript" src="<?php echo ($style); ?>/js/gujian.js"></script>

</body>
</html>