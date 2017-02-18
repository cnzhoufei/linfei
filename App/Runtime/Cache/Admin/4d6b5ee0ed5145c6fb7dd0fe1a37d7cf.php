<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>后台管理</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/App/Admin/View/style/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/App/Admin/View/style/css/font-awesome.min.css" />
                <script type="text/javascript">
			window.jQuery || document.write("<script src='/App/Admin/View/style/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/App/Admin/View/style/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

                <link href="/App/Admin/View/style/css/css.css" rel="stylesheet" />

		<!-- ace styles -->

		<link rel="stylesheet" href="/App/Admin/View/style/css/ace.min.css" />
		<link rel="stylesheet" href="/App/Admin/View/style/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/App/Admin/View/style/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/App/Admin/View/style/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/App/Admin/View/style/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/App/Admin/View/style/js/html5shiv.js"></script>
		<script src="/App/Admin/View/style/js/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small>
							<i class=""><img src="/App/Admin/View/style/images/LINFEI.gif" style="height:25px;" alt=""></i>
							林飞CMS管理系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
				
				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo session('adminuser.icon');?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo session('adminuser.name');?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="{:U('admin/settingperson')}">
										<i class="icon-cog"></i>
										个人设置
									</a>
								</li>	
                                <li>
									<a href="/" target="_blank">
										<i class="icon-home"></i>
										前台首页
									</a>
								</li>								

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('Login/logout');?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
				<div class="navbar-header pull-right">
				<a href="<?php echo U('Admin/recycling');?>" class="navbar-brand">
						<small>
							<i class="icon-refresh"></i> 清除缓存
						</small>
					</a><!-- /.brand -->
				</div>
			</div><!-- /.container -->
		</div>
<script src="/Public/uploadify/global.js" type="text/javascript">//异步上传图片</script> 
<script src="/App/Admin/View/style/js/my/js.js" type="text/javascript"></script> 
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>
    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
<?php echo ($ueditorinit); ?>

        <div class="<?php echo ($navstyle['style1'][ $navnum ]); ?>" id="sidebar">
	<script type="text/javascript">
		try {
		            ace.settings.check('sidebar', 'fixed')
		        } catch (e) {
		        }
	</script>

	<ul class="nav nav-list">
<?php if(is_array($adminmenu)): foreach($adminmenu as $key=>$v): ?><li>
			<a href="#" class="dropdown-toggle">
				<i class="<?php echo ($v["icon"]); ?>"></i>
				<span class="menu-text"> <?php echo ($v["name"]); ?> </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
		<?php if(is_array($v['child'])): foreach($v['child'] as $key=>$vo): ?><li>
					<a href='<?php echo U("$vo[c]/$vo[f]"); echo ($vo["p"]); ?>' >
						<i class="icon-double-angle-right"></i> <?php echo ($vo["name"]); ?>
					</a>
				</li><?php endforeach; endif; ?>
			</ul>
		</li><?php endforeach; endif; ?>
	</ul>
	<script type="text/javascript">
		
					
				$('a[href^="'+'<?php echo ($url); ?>'+'"]').parent().show();
		        var obj = $('a[href^="'+'<?php echo ($url); ?>'+'"]');
		        var o1 = obj.parent();
		        var o2 = obj.parent().parent().parent();
		        o2.addClass('active').addClass('open');
		        o1.addClass('active');
		        
		        var m1 = o2.find('.menu-text').html();
		        var m2 = o1.find('a').html();
	</script>
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="<?php echo ($navstyle['style2'][ $navnum ]); ?>" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right" onclick="nav('<?php echo U('Config/navstyle');?>','<?php echo ($navnum); ?>')"></i>
	</div>
</div>
        <div class="main-content">            
            <div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i><a href="<?php echo U('Index/index');?>">主页</a>
        </li>
        <li><?php echo ($controller); ?></li>
        <li class="active">详情</li>
    </ul><!-- .breadcrumb -->
</div>
<style type="text/css">
    .breadcrumb .active i{display:none;}
</style>
<script type="text/javascript">
    var m1 = o2.find('.menu-text').html();
    var m2 = o1.find('a').html();        
    $("#breadcrumbs .breadcrumb li:eq(1)").html(m1);
    $("#breadcrumbs .breadcrumb li:eq(2)").html(m2);
</script>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                            <form class="form-horizontal" role="form" action="" method="post">
                            <input type="hidden" name="id" value="<?php echo ($classify['id']); ?>" />
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">类型<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-9">
                                    <select  class="col-sm-12" name="type" onchange="getclass('<?php echo U('classify/ajaxclass');?>',$(this).val(),'types')">
                                        <option <?php if($classify['type'] == 'product')echo 'selected'; ?> value="product">商品分类</option>
                                        <option <?php if($classify['type'] == 'news')echo 'selected'; ?> value="news">文章分类</option>
                                        <option <?php if($classify['type'] == 'cover')echo 'selected'; ?> value="cover">封面</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">父分类<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-9">
                                    <select  class="col-sm-12" name="pid" id="types" onchange="changesort($(this).val())">
                                        <option value="0">顶级分类</option>
                                        <?php if(is_array($classifys)): foreach($classifys as $key=>$vv): ?><option  <?php if($classify['pid'] == $vv['id'])echo 'selected'; ?> value="<?php echo ($vv["id"]); ?>"><?php echo ($vv["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 外部链接 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                                <input type="text" name="external" value="<?php echo ($classify['external']); ?>" class="col-sm-12" placeholder="填写外部链接后 将直接跳转到该链接 格式：http://www.linfei.cc" />
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类名称 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                                <input type="text" name="name" value="<?php echo ($classify['name']); ?>" class="col-sm-12" id="content" />
                                        </div>
                                </div>
                                 <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 手机分类名称 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                                <input type="text" name="m_name" value="<?php echo ($classify['m_name']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类排序 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <input type="text" name="sorting" value="<?php echo ($classify['sorting']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类标题 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <input type="text" name="title" value="<?php echo ($classify['title']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类关键词 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <input type="text" name="keywords" value="<?php echo ($classify['keywords']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类描述 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <input type="text" name="description" value="<?php echo ($classify['description']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                <?php if(!$classify['id']){ ?>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 前端url命名 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <input type="text" name="url_name" value="<?php echo ($classify['url_name']); ?>" style="width:200px;" class="col-sm-12" id="show" />
                                                &nbsp;&nbsp;<button type="button" style="height:28px;" onclick="pinyin()" >拼音</button>
                                        </div>
                                </div>
                                <?php } ?>

                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类 开启/关闭<span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                        <label>
                                            <input name="status" class="ace ace-switch ace-switch-7" type="checkbox" <?php if(!$classify['status']){ }else{ ?>checked='checked'<?php } ?> value='1'>
                                            <span class="lbl"></span>
                                        </label>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 顶部导航 开启/关闭<span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                        <label>
                                            <input name="top" class="ace ace-switch ace-switch-7" type="checkbox" <?php if(!$classify['top']){ }else{ ?>checked='checked'<?php } ?> value='1'>
                                            <span class="lbl"></span>
                                        </label>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 底部导航 开启/关闭<span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                        <label>
                                            <input name="bottom" class="ace ace-switch ace-switch-7" type="checkbox" <?php if(!$classify['bottom']){ }else{ ?>checked='checked'<?php } ?> value='1'>
                                            <span class="lbl"></span>
                                        </label>
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 分类类容 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <script id="class" type="text" name="text" style="width:100%;height:500px;"><?php echo ($classify['text']); ?></script>
                                        </div>
                                </div>
                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button class="btn btn-info btn-block" type="submit">
                                            <i class="icon-ok bigger-110"></i>
                                            确认
                                        </button>
                                    </div>
                                </div>
                            </form>                        
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->
<!-- basic scripts -->

<!--[if !IE]> -->

<script src="/App/Admin/View/style/js/jquery-2.0.3.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="/App/Admin/View/style/js/jquery-1.10.2.min.js"></script>
<![endif]-->

<!--[if !IE]> -->

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/App/Admin/View/style/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
	if ("ontouchend" in document) document.write("<script src='/App/Admin/View/style/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="/App/Admin/View/style/js/bootstrap.min.js"></script>
<script src="/App/Admin/View/style/js/typeahead-bs2.min.js"></script>
<!-- page specific plugin scripts -->
<!-- ace scripts -->
<script src="/App/Admin/View/style/js/ace-elements.min.js"></script>
<script src="/App/Admin/View/style/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<!-- <script type="text/javascript" src="/public/js/jquery.form.js"></script> -->
<!-- <script src="/public/date/js/lhgcalendar.min.js" type="text/javascript"></script> -->
<!-- <link href="/public/date/css/lhgcalendar.css" rel="stylesheet" type="text/css"> -->
<script>
	var submit = true;
	$(function() {
		$('.date').calendar();
		$("form[method!='get']").submit(function() {
			if (!submit) return false;
			$(this).ajaxSubmit({
				dataType: 'json',
				beforeSubmit: function() {
					submit = false;
					showmsg('正在提交');
				},
				success: function(data) {
					submit = true;
					if (data.state == 1) setTimeout(function() {
						var act = "{:ACTION_NAME}";
						if(act=='ajaxgetgoods'){
							window.location.href='/index.php?m=admin&a=goodslist';
						}else{
							window.location.reload();
						}
					}, 500);
					showmsg(data.msg);
				}
			});
			return false;
		});		
	});

	function ajHref(obj) {
		if (!submit) return false;
		showmsg('正在提交');
		submit = false;
		$.get($(obj).attr('href'), function(data) {
			submit = true;
			if (data.state == 1) window.location.reload(); //setTimeout(function(){window.location.reload();},500);
			showmsg(data.msg);
		}, 'json');
		return false;
	}

	function showmsg(msg) {
		$("#tip").remove();
		$tip = $('<div id="tip" style="font-weight:bold;position:fixed;top:240px;left: 50%;z-index:9999;background:rgb(111, 179, 224);padding:18px 30px;border-radius:8px;color:#fff;font-size:16px;">' + msg + '</div>');
		$('body').append($tip);
		$tip.stop(true).css('margin-left', -$tip.outerWidth() / 2).fadeIn(500).delay(2000).fadeOut(500);
	}

	function changesort($type) {
		$(".sortbox").hide();
		$(".sortbox select").prop('disabled', true);
		$(".sortbox[type='" + $type + "']").show();
		$(".sortbox[type='" + $type + "'] select").prop('disabled', false);
	}
	$(function() {
		$('.sortbox option').each(function() {
			html = $(this).html();
			if (html.indexOf('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') == 0) {
				$(this).prop('disabled', true);
			}
		});
	})
</script>

</body>

</html>
<script src="/Public/js/jquery-1.7.2.min"></script>
<script src="/Public/pinyin/jQuery.Hz2Py-min.js">//转换中文为拼音</script>
<script>

//转换中文为拼音
function pinyin()
{
        var str = $('#content').toPinyin();//转换成拼音
        str = str.toLocaleLowerCase();//转换成小写
        $('#show').val(Trim(str,'g'));//去除空格
}


  //去除字符中间空格
  function Trim(str,is_global)
        {
            var result;
            result = str.replace(/(^\s+)|(\s+$)/g,"");
            if(is_global.toLowerCase()=="g")
            {
                result = result.replace(/\s/g,"");
             }
            return result;
}

</script>