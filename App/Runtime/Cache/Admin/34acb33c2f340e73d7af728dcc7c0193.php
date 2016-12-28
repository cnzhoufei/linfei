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
                    <div class="col-sm-12">
                        <div class="tabbable">
                            <div class="tab-content">
                                <div id="home" class="tab-pane in active">
                                <div class="row">
                                        <div class="col-xs-12">
                                                <div class="row">
                                                    <div class='col-sm-2' style="float:right;">                                        
                                                        <button type="submit" class="btn btn-purple btn-sm" onclick="window.location.href='<?php echo U('Config/reditorcustom');?>'" >
                                                            添加
                                                            <i class=" icon-on-right bigger-110"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="space-6"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr class="color428bca">
                                                    <th>ID{id}</th>
                                                    <th>KEY{key}</th>
                                                    <th>中文名称{name}</th>
                                                    <th>值{name}</th>
                                                    <th>添加时间{time}</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($custom){ ?>
                                            <?php if(is_array($custom)): $i = 0; $__LIST__ = $custom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr class="pointer even" title="" id="custom_<?php echo ($data['id']); ?>">
                                                    <td><?php echo ($data['id']); ?></td>
                                                    <td><?php echo ($data['key']); ?></td>
                                                    <td><?php echo ($data['name']); ?></td>
                                                    <td><?php echo ($data['val']); ?></td>
                                                    <td><?php echo date('Y-m-d',$data['time']);?></td>
                                                    <td>
                                                    <a href="<?php echo U('Config/reditorcustom');?>?customid=<?php echo ($data['id']); ?>">编辑</a>|
                                                    <a onclick="mydelete('<?php echo ($data[id]); ?>', '<?php echo U('Config/deletecustom');?>', 'custom_<?php echo ($data[id]); ?>')" href="javascript:;">删除</a>
                                                </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <?php if($page){ ?>
                                        <div class="row">                                                
                                            <div class="col-sm-10 ">
                                                <ul class='pagination pull-right'><?php echo ($page); ?></ul>
                                            </div> 
                                        </div>
                                        <?php } ?>  
                                        <?php }else{ ?>
                                        <tr><td colspan="6" class="empty"><span class="empty"><i>没有找到数据.</i></span></td></tr>
                                        </tbody>
                                        </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->                        

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div>
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