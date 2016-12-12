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
					<a href="{:U('admin/index')}" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							林飞CMS管理系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/App/Admin/View/style/avatars/user.jpg" alt="Jason's Photo" />
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
			</div><!-- /.container -->
		</div>
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {}
    </script>
    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
        <div class="sidebar" id="sidebar">
	<script type="text/javascript">
		try {
		            ace.settings.check('sidebar', 'fixed')
		        } catch (e) {
		        }
	</script>

	<ul class="nav nav-list">

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-desktop"></i>
				<span class="menu-text"> 商品管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="{:U('admin/goodslist')}">
						<i class="icon-double-angle-right"></i> 商品列表
					</a>
				</li>

				<li>
					<a href="{:U('admin/addgoods')}">
						<i class="icon-double-angle-right"></i> 添加商品
					</a>
				</li>
				
				<li>
					<a href="{:U('admin/commentlist')}">
						<i class="icon-double-angle-right"></i> 商品评论
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-group"></i>
				<span class="menu-text"> 用户管理 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/userlist')}">
						<i class="icon-double-angle-right"></i> 用户列表
					</a>
				</li>

				<li>
					<a href="{:U('admin/adduser')}">
						<i class="icon-double-angle-right"></i> 添加用户
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-cogs"></i>
				<span class="menu-text"> 系统设置 </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/settingperson')}">
						<i class="icon-double-angle-right"></i> 个人信息
					</a>
				</li>

				<li>
					<a href="{:U('admin/settingsite')}">
						<i class="icon-double-angle-right"></i> 网站信息
					</a>
				</li>

				<li>
					<a href="{:U('admin/settingseo')}">
						<i class="icon-double-angle-right"></i> SEO设置
					</a>
				</li>

				<li>
					<a href="{:U('admin/settingurl')}">
						<i class="icon-double-angle-right"></i> URL模式
					</a>
				</li>

				<li>
					<a href="{:U('admin/settingscore')}">
						<i class="icon-double-angle-right"></i> 积分设置
					</a>
				</li>

				<li>
					<a href="{:U('admin/settingqq')}">
						<i class="icon-double-angle-right"></i> QQ登录设置
					</a>
				</li>

				<li>
					<a href="{:U('admin/settingmail')}">
						<i class="icon-double-angle-right"></i> 邮箱设置
					</a>
				</li>
				
				<li>
					<a href="{:U('admin/settingucenter')}">
						<i class="icon-double-angle-right"></i> UCENTER设置
					</a>
				</li>
				
				<li>
					<a href="{:U('admin/settingregfield')}">
						<i class="icon-double-angle-right"></i> 注册字段设置
					</a>
				</li>

				<li>
					<a href="{:U('admin/clearcache')}">
						<i class="icon-double-angle-right"></i> 清除缓存
					</a>
				</li>
				
				<li>
					<a href="{:U('admin/sitemap')}">
						<i class="icon-double-angle-right"></i> 更新sitemap
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-tags"></i>
				<span class="menu-text"> 分类管理 </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/sortlist')}">
						<i class="icon-double-angle-right"></i> 分类列表
					</a>
				</li>

				<li>
					<a href="{:U('admin/addsort')}">
						<i class="icon-double-angle-right"></i> 添加分类
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-book"></i>
				<span class="menu-text"> 内容管理 </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/articlelist')}">
						<i class="icon-double-angle-right"></i> 文章列表
					</a>
				</li>

				<li>
					<a href="{:U('admin/addarticle')}">
						<i class="icon-double-angle-right"></i> 添加文章
					</a>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-cloud-download"></i>
				<span class="menu-text"> 采集管理 </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/caijigoods')}">
						<i class="icon-double-angle-right"></i> 商品采集
					</a>
				</li>

				<li class="">
					<a href="{:U('admin/jiukuaijiu')}">
						<i class="icon-double-angle-right"></i> 九块九采集
					</a>
				</li>
				
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-bullhorn"></i>
				<span class="menu-text"> 广告管理 </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/addad')}">
						<i class="icon-double-angle-right"></i> 添加广告
					</a>
				</li>

				<li>
					<a href="{:U('admin/adlist')}">
						<i class="icon-double-angle-right"></i> 广告列表
					</a>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-coffee"></i>
				<span class="menu-text"> 积分商城 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/jfgoodslist')}">
						<i class="icon-double-angle-right"></i> 商品列表
					</a>
				</li>

				<li>
					<a href="{:U('admin/addjfgoods')}">
						<i class="icon-double-angle-right"></i> 添加商品
					</a>
				</li>

				<li>
					<a href="{:U('admin/jfloglist')}">
						<i class="icon-double-angle-right"></i> 兑换信息
					</a>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-laptop"></i>
				<span class="menu-text"> 商家报名 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/topicgoodslist')}">
						<i class="icon-double-angle-right"></i> 审核列表
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="icon-tasks"></i>
				<span class="menu-text"> 活动专场 </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li class="">
					<a href="{:U('admin/topiclist')}">
						<i class="icon-double-angle-right"></i> 专场列表
					</a>
				</li>

				<li>
					<a href="{:U('admin/addtopic')}">
						<i class="icon-double-angle-right"></i> 添加专场
					</a>
				</li>
			</ul>
		</li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="icon-tasks"></i>
                <span class="menu-text"> 抽奖管理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="">
                    <a href="{:U('admin/choujiang')}">
                        <i class="icon-double-angle-right"></i>
                        抽奖列表
                    </a>
                </li>
                <li>
                    <a href="{:U('admin/addchoujiang')}">
                        <i class="icon-double-angle-right"></i>
                        添加抽奖活动
                    </a>
                </li>
                
                <li>
                    <a href="{:U('admin/cjgoods')}">
                        <i class="icon-double-angle-right"></i>
                        奖品列表
                    </a>
                </li>
                
                <li>
                    <a href="{:U('admin/addjfgoods',array('p'=>'cj'))}">
                        <i class="icon-double-angle-right"></i>
                        奖品添加
                    </a>
                </li>
                
            </ul>
        </li>
	</ul>
	<script type="text/javascript">
		<?php if($my['uid']>1){ ?>
		        $('.submenu li').hide();
		        <?php } ?>
		        <?php $myqx = unserialize($my['qx']); foreach($myqx as $val){ ?>
		            $('a[href^="'+'{:U("$mod/$val")}'+'"]').parent().show();
		            $('a[href^="'+'{:U("crawl/$val")}'+'"]').parent().show();
		        <?php } ?>
		        var obj = $('a[href^="'+'{:U("$mod/$act")}'+'"]');
		        var o1 = obj.parent();
		        var o2 = obj.parent().parent().parent();
		        o2.addClass('active').addClass('open');
		        o1.addClass('active');
		        
		        var m1 = o2.find('.menu-text').html();
		        var m2 = o1.find('a').html();
	</script>
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>
</div>
        <div class="main-content">
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="page-header">
                            <h1>
                                服务器信息
                                <small>
                                    <i class="icon-double-angle-right"></i>
                                </small>
                            </h1>
                        </div>
                        <div class="profile-user-info profile-user-info-striped">
                            <?php if(is_array($serverInfo)): $i = 0; $__LIST__ = $serverInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="profile-info-row">
                                    <div class="profile-info-name"> <?php echo ($data["name"]); ?> </div>
                                    <div class="profile-info-value">
                                        <span class="editable editable-click" id="username"><?php echo ($data["v"]); ?></span>
                                    </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <br>
                        <div class="page-header">
                            <h1>
                                开发团队
                                <small>
                                    <i class="icon-double-angle-right"></i>
                                </small>
                            </h1>
                        </div>
                        <div class="col-sm-12">
                            <h4>介绍</h4>
                        </div>
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
<script type="text/javascript" src="/public/js/jquery.form.js"></script>
<script src="/public/date/js/lhgcalendar.min.js" type="text/javascript"></script>
<link href="/public/date/css/lhgcalendar.css" rel="stylesheet" type="text/css">
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