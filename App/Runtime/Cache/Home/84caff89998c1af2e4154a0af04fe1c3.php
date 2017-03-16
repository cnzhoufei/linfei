<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo ($productlist['title']); ?></title>
    <meta name="keywords" content="<?php echo ($productlist['keywords']); ?>">
   <meta name="description" content="<?php echo ($productlist['description']); ?>" /> 
      <link rel="shortcut icon" href="/linfei.ico" type="image/x-icon" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/common.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo ($style); ?>/nav/nav.css">
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/fadeIn.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/index.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/slick.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/css-20141102.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/service.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/main-add.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/search.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/newscenter.css" /> 
  <link rel="stylesheet" href="<?php echo ($style); ?>/css/newproduct.css" /> 
  <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="http://www.gzlingmu.com/statics/css/lingmu/css/ie/ie.css">
    <![endif]--> 
  <script type="text/javascript">
        var tagArray = ["header","nav","article","footer"];for(var i = 0; i < tagArray.length; i++){document.createElement(tagArray[i]);}
    </script> 
  <link rel="stylesheet" type="text/css" id="TQCSS0.8638596886303276" href="<?php echo ($style); ?>/css/style.css" />
  <script id="TQJS0.2792270297650248" src="<?php echo ($style); ?>/js/getonline.js"></script>
  <script id="TQJS0.5847389281261712" src="<?php echo ($style); ?>/js/float.js"></script>
  <script type="text/javascript" charset="UTF-8" src="<?php echo ($style); ?>/js/bsl.js"></script>
  <!-- <script type="text/javascript" charset="UTF-8" src="<?php echo ($style); ?>/js/main_icon_invite_mess_api.js"></script> -->
  <link type="text/css" rel="stylesheet" href="<?php echo ($style); ?>/css/m-webim-lite.css" />
 </head> 
 <body>

<div class="header">
  <div class="header_top" style="width:1000px;">
      <div class="logo"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>" title="<?php echo ($config['name']); ?>">
      <img src="<?php echo ($config['logo']); ?>" alt="<?php echo ($config['name']); ?>"></a></div>
                
   <div class="header_r">
      <div class="ssuo">
    <form action="/search.asp" method="get">
      <input value="请输入关键字..." name="keys" class="ssuoa" onclick="if(this.value=='请输入关键字...'){this.value='';}" onblur="if(this.value==''){this.value='请输入关键字...';}" type="text">
      <input value="" class="ssuob" type="submit">
    </form>
        <div style="float:right;">
                       <span><img src="<?php echo ($style); ?>/nav/index_08.png" alt="珠海办公家具,广东办公家具,个性办公家具,高端办公家具厂家,广州办公家具厂,广州办公家具公司&quot;">服务热线:<?php echo ($custom['tel']); ?></span>
                       </div>
      </div>
      <div class="clear"></div>
      
     <div class="xiangp_contentRX">
 <script>
function settab(n){
  tli=document.getElementById('tits').getElementsByTagName("li");
  for(i=0;i<tli.length;i++){
    k=i+1
    if (k==n ){
      tli[i].className="cur";
      document.getElementById('con_'+k).style.display=""; 
    }else{
      tli[i].className="";
      document.getElementById('con_'+k).style.display="none";
    }
  }
}
function mOut(){
  tli=document.getElementById('tits').getElementsByTagName("li");
  for(i=0;i<tli.length;i++){
    k=i+1
        tli[i].className="";
      document.getElementById('con_'+k).style.display="none";
  }
 }
</script>
      
      <div class="nav" id="tits">
        <ul>
    
             <li onmouseover="settab(1)" class=""><a href="http://<?php echo ($_SERVER['HTTP_HOST']); ?>"><?php echo ($config['home']); ?></a></li>
            <?php if(is_array($classtop)): foreach($classtop as $k=>$v): ?><li onmouseover="settab(<?php echo ($k+2); ?>)" class=""><a href="<?php echo ($v['url']); ?>"><?php echo ($v['name']); ?></a></li><?php endforeach; endif; ?>
             <li onmouseover="settab(100)"><a href="" class="topYyBtn">免费量尺</a></li>


             <div class="clear"></div>
          </ul>
          <div class="cons " id="con_1" style="display: none;"></div>
        <?php if(is_array($classtop)): foreach($classtop as $kk=>$vv): ?><div class="cons " id="con_<?php echo ($kk+2); ?>" style="display: none;" onmouseover="settab(<?php echo ($kk+2); ?>)" onmouseout="mOut(this)">
          
          <div class="child_nav ">
          
             <div class="child_navLeft<?php echo ($kk+2); ?>">
                 <h3 title="<?php echo ($vv['title']); ?>"><?php echo ($vv['name']); ?></h3>
                 <div class="child_navLeftB child_navLeftB<?php echo ($kk+2); ?>">
                    <p><?php echo ($vv['text']); ?></p>
                 </div>
             </div>
       
             <div class="child_navRihgt_pr">
       
        <?php if(is_array($vv['son'])): foreach($vv['son'] as $kkk=>$vvv): ?><dl>
                    <a title="<?php echo ($vvv['title']); ?>" href="<?php echo ($vvv['url']); ?>"><dt><?php echo ($vvv['name']); ?></dt></a>
          
                        <?php if(is_array($vvv['grandson'])): foreach($vvv['grandson'] as $key=>$vvvv): ?><dd><a title="<?php echo ($vvvv['title']); ?>" href="<?php echo ($vvvv['url']); ?>">&gt; <?php echo ($vvvv['name']); ?></a></dd><?php endforeach; endif; ?>
          
                </dl><?php endforeach; endif; ?>
                   <div class="clear"></div> 
             </div>
             <div class="clear"></div>
          </div>
          </div><?php endforeach; endif; ?>


          <div class="cons " id="con_100 " style="display:none;">
          
          <div class="child_nav ">
           
             <div class="child_navLeft">
                 <h3>免费量尺</h3>
                 <div class="child_navLeftB">
                   
                 </div>
             </div>
       
             <div class="child_navRihgt">
             
                   <div class="clear"></div> 
             </div>
             <div class="clear"></div>
          </div>
          </div>

 
 
      </div>
   </div>
   <div class="clear" onmouseover="mOut(this)"></div>
</div>
  </div>
</div>

  <div style="width:100%;clear:both;height:110px;"></div>

<div class="splitX"></div>
</div>
<div class="topbg">
                <?php $Model = new \Think\Model(); $sql = "select * from linfei_adv where pid = 111"; $adv = $Model->query($sql); foreach($adv as $key=>$v):?><img src="<?php echo ($v['img']); ?>"><?php endforeach;?>
</div>
<div class="title-bg">
	<div class="title-jiaju"></div>
</div>
<div class="content clearfix">

	<div class="sidebar">
    	<div class="title">
    		<img src="<?php echo ($style); ?>/images/jiaju-title-bg.jpg">
        </div>
<ul class="sub">
        <?php if(is_array($productclass)): foreach($productclass as $key=>$p_v): if(is_array($p_v['son'])): foreach($p_v['son'] as $key=>$p_vv): ?><li>
            <a href="javascript:;"><?php echo ($p_vv['name']); ?></a>
            <ul class="sub2">
            <?php if(is_array($p_vv['grandson'])): foreach($p_vv['grandson'] as $key=>$p_vvv): ?><li><a href="<?php echo ($p_vvv['url']); ?>"><?php echo ($p_vvv['name']); ?></a></li><?php endforeach; endif; ?>
            </ul>
            </li><?php endforeach; endif; endforeach; endif; ?>
        </ul>
    </div>
    <div class="pro-detail">
    	<ul class="pro-list clearfix">
        <?php if(is_array($product)): foreach($product as $key=>$vvv): ?><li>
            	<a href="<?php echo ($vvv['url']); ?>" target="_blank" title="<?php echo ($vvv['title']); ?>">
                	<img src="<?php echo homeimg($vvv['id'],373,248,'product');?>" width="373" height="248">
                    <div class="text">
                    	<?php echo ($vvv['title']); ?>
                    </div>
                </a>
            </li><?php endforeach; endif; ?>	

	   <div style="float:right; font-size:18px;" class="paging">

       <a class="a1"><?php echo ($count); ?>条</a> 
       <?php echo ($page); ?>

       </div>

        </ul>

    </div>

    

</div>
 <div class="areaT3"> 
     <div class="wrap footer"> 
      <div class="footerItem" id="product"> 
       <h3>Product</h3> 
       <ul> 
        <?php if(is_array($productclass)): foreach($productclass as $key=>$product_v): ?><li><a href="<?php echo ($product_v['url']); ?>"><?php echo ($product_v['name']); ?></a></li>
        <?php if(is_array($product_v['son'])): foreach($product_v['son'] as $key=>$product_v2): ?><li><a href="<?php echo ($product_v2['url']); ?>"><?php echo ($product_v2['name']); ?></a></li>
        <?php if(is_array($product_v2['grandson'])): foreach($product_v2['grandson'] as $key=>$product_v3): ?><li><a href="<?php echo ($product_v3['url']); ?>"><?php echo ($product_v3['name']); ?></a></li><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
       </ul> 
      </div> 
      <div class="footerItem" id="information"> 
       <h3>Information</h3> 
       <ul> 
       <?php if(is_array($articleclass)): foreach($articleclass as $key=>$article_v): ?><li><a href="<?php echo ($article_v['url']); ?>"><?php echo ($article_v['name']); ?></a></li>
        <?php if(is_array($article_v['son'])): foreach($article_v['son'] as $key=>$article_v2): ?><li><a href="<?php echo ($article_v2['url']); ?>"><?php echo ($article_v2['name']); ?></a></li>
        <?php if(is_array($article_v2['grandson'])): foreach($article_v2['grandson'] as $key=>$article_v3): ?><li><a href="<?php echo ($article_v3['url']); ?>"><?php echo ($article_v3['name']); ?></a></li><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
        
       </ul> 
      </div> 
      <div class="footerItem" id="contact"> 
       <h3>Contact us</h3> 
       <p> </p>
       <p><span style="font-size:16px;"><?php echo ($config['name']); ?></span><br /> 
       <span style="color:#66ffff;">
       <span style="font-size:16px;">电话：<?php echo ($custom['bottomtel']); ?></span></span></p> 
       <p><span style="font-size:16px;">地址：
       <span style="font-size:12px;"><?php echo ($config['address']); ?></span></span></p> 
       <p></p> 
      </div> 

                      <?php $Model = new \Think\Model(); $sql = "select * from linfei_adv where pid = 9"; $adv = $Model->query($sql); foreach($adv as $key=>$vv_9):?><div class="footerItem" id="follow"> 
       <h3><?php echo ($vv_9['title']); ?></h3> 
       <div class="followArea"> 
        <div class="followItem" id="wx"> 
         <div class="wxewmBox" style="display: none;"> 
          <img src="<?php echo ($vv_9['img']); ?>" alt="<?php echo ($vv_9['other']); ?>" /> 
         </div> 
         <a id="forwx"></a> 
         <p><?php echo ($vv_9['other']); ?></p> 
        </div> 
       
       </div> 
      </div><?php endforeach;?>

     </div> 
    </div> 
    <div class="areaT31"> 
     <p><?php echo ($config['copyright']); ?><span><?php echo ($config['record']); ?></span></p>
    </div> 
    <script src="<?php echo ($style); ?>/js/jquery-1.8.0.min.js"></script> 
    <script src="<?php echo ($style); ?>/js/mmj_global-min.js"></script> 
    <script src="<?php echo ($style); ?>/js/move-min.js"></script> 
    <script src="<?php echo ($style); ?>/js/slick-min.js"></script> 
    <script src="<?php echo ($style); ?>/js/slideMove-min.js"></script> 
    <script src="<?php echo ($style); ?>/js/jquery.gridAccordition.min.js"></script> 
    <script src="<?php echo ($style); ?>/js/index-20141102.min.js"></script> 
    <script src="<?php echo ($style); ?>/js/jquery.flexslider-min.js"></script> 
    <script>
$(function(){
  $('.flexslider').flexslider({
    animation: "slide", 
    slideshow: true, 
    slideshowSpeed: 7000,             
    directionNav: true, //左右控制按钮
    controlNav: true,   //B控制菜单
  });
});
</script> 
    <input type="hidden" id="Count" value="0" /> 
    <input type="hidden" id="CurrentNum" value="0" /> 
    <input type="hidden" id="getUrl" val="" value="service/product/plist?areaid=0" /> 
    <script src="<?php echo ($style); ?>/js/chooseArea-min.js"></script> 
    <script type="text/javascript">

  

     $('.csbtn').live('click',

             function() {

      

                var idData =$("#proId").val();

                var store = new Persist.Store('My Data Store');

                store.set('saved_data', idData);

                location.href = "/signup.shtml";

                return false;

            });



</script> 
    <script>

$(function(){

  $(".sidebar ul.sub>li").click(function(){

    $(this).children("ul.sub2").stop(false,true).slideToggle(300);

  })

  $(".pro-detail .pro-list li").each(function(index) {

        index+=1;

    if(index%2 == 0){

      $(this).css("margin-right",0);  

    }

    });

})

</script> 
    <script>

  $("ul.about-tj-list li").each(function(index) {

    index+=1;

    if(index%3 == 0){

      $(this).css("margin-right",0);  

    }

  });

  $(".about-tj a").each(function(index){

    $(this).hover(function(){

      $(this).addClass("active").siblings().removeClass("active");

      $("ul.about-tj-list").addClass("hide").eq(index).removeClass("hide");

    });

  });

</script> 
    <script>



    $.chooseArea();

$(function(){

        var listBox=$("#listing");

        listBox.html('');

        var href=window.location.href;

        href=setNewUrl(href);

        var param= getArgs(href),type=param.areaid,isType;

        var ao=$("#qynav a");

        var po=$("#qypic a");

        if(param.areaid != 0){

            for(var i=0;i<ao.length;i++){

                var aoObj = $(ao[i]);

                var links=aoObj.attr("href");

                isType=links.search(type);

                if(isType!=-1){

                    aoObj.addClass('cur');

                    aoObj.find('i').css('display','block');

                }

            }

            for(var i=0;i<po.length;i++){

                var poObj = $(po[i]);

                var links=poObj.attr("href");

                isType=links.search(type);

                if(isType!=-1){

                    poObj.addClass('cur');

                    poObj.find('i').css('display','block');

                }

            }

            productAnimate();

        }else{

            var aoObj = $(ao[0]);

            aoObj.addClass('cur');

        }

        ajaxOperate(href,lazyLoad);

    })

  



</script> 
    <script type="text/javascript">

  

     $('.csbtn').live('click',

             function() {

                var idData =$("#proId").val();

                var store = new Persist.Store('My Data Store');

                store.set('saved_data', idData);

                location.href = "/signup.shtml";

                return false;

            });

$("#tab-show a").each(function(index) {

    $(this).hover(function(){

    $(this).addClass("cur").siblings().removeClass("cur");

    $(".tab_body .sub").hide().eq(index).show();

  });

});

</script> 
    <!-- <script src="<?php echo ($style); ?>/js/all_20100501.js"></script> -->
    <!-- <script language="javascript" src="<?php echo ($style); ?>/js/tqurl_config.js"></script> -->
    <!-- <script language="javascript" src="<?php echo ($style); ?>/js/_all_20100501.js"></script> -->
    <!-- <script src="<?php echo ($style); ?>/js/as.js"></script> -->

    <!-- <script src="<?php echo ($style); ?>/js/jquery.magnifier.js"></script>  -->
   </div>
  </div>
 </body>
</html>