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
        <div class="sidebar" id="sidebar">
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
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
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
                        <form action="index.php" method="get" >
                            <div class="row">
                                    <div class='col-sm-2'>
                                        <select class="form-control" name='sort_id'>
                                            <option value="0">全部栏目</option>
                                            {$goodsSort}
                                        </select>
                                        <script>
                                            $("select[name='sort_id'] option[value='{$sort_id}']").attr('selected', 'selected');
                                        </script>
                                    </div>
                                    <div class='col-sm-2'>
                                        <input class="form-control" placeholder=商品标题 type="text" name='title' value='{$title}'  />
                                    </div>
                                    <div class='col-sm-2'>
                                        <input class="form-control" placeholder=添加人 type="text" name='add_uname' value='{$add_uname}'  />
                                    </div>
                                    <div class='col-sm-2'>                                        
                                            <button type="submit" class="btn btn-purple btn-sm">
                                                搜索
                                                <i class="icon-search icon-on-right bigger-110"></i>
                                            </button>
                                    </div>
                                            
                            </div>
                            <div class="space-6"></div>
                        </form>
                    </div>          


                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->                        
                        <form action="{:U('admin/goodsList',array('op'=>'order'))}" method="post">                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="color428bca">
                                            <th width="50">排序</th>
                                            <th width="100" style="text-align:center">图片</th>
                                            <th>商品名称</th>
                                            <th>商品类型</th>
                                            <th>折扣价(元)</th>
                                            <th>原价格(元)</th>
                                            <th>添加人</th>
                                            <th>状态</th>
                                            <th>添加时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($product){ ?>
                                    <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr class="pointer even" title="">
                                            <td data_id="{$data['goods_id']}" style=""><input type="text" name="order_{$data['goods_id']}" value="{$data['order']}" style="width:30px;padding:0 5px;margin:0"/></td>
                                            <td><a href="{$data['pic_url']}" target='_blank'><img src="{$data['pic_url']}" style="width:100px"></a></td>
                                            <td><a href="{:U('goods/detail',array('id'=>$data['goods_id']))}" target='_blank'>{$data['title']}</a></td>
                                            <td>{$data['goods_type']}</td>
                                            <td>{$data['discount_price']}</td>
                                            <td>{$data['price']}</td>
                                            <td>{$data['add_uname']}</td>
                                            <td><a id="" onclick="return ajHref(this);" href="{:U('admin/goodslist',array('op'=>'state','goods_id'=>$data['goods_id']))}" title="">{$data['state']?'<font color="green">上架</font>':'<font color="red">下架</font>'}</a></td>
                                            <td>{:date('Y-m-d H:i:s',$data['ctime'])}</td>
                                            <td> 
                                                <a target="_blank" href='http://pub.alimama.com/myunion.htm?spm=a2320.7388781.a214tr8.d006.IyDOZN#!/promo/self/items?q={:urlencode($data[item_url])}'>查看</a>
                                                |
                                                <a id="" href="{:U('admin/addgoods',array('goods_id'=>$data['goods_id']))}" title="">编辑</a>
                                                |
                                                <a id="" onclick="if(confirm('确定删除')){return ajHref(this);};return false;" href="{:U('admin/goodsList',array('op'=>'del','goods_id'=>$data['goods_id']))}" title="删除">删除</a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class='col-sm-6'>
                                        <div class="row">
                                            <button class="col-sm-1 btn  btn-success" type="submit" name="btSave" value="更新">                                            
                                            排序
                                            </button>
                                            <button id="quanxuan" class="col-sm-1 btn  btn-warning" type="button" value="全选">
                                            全选
                                            </button>
                                            <button onclick="deletes()" class="col-sm-1 btn  btn-danger" type="button" value="删除">
                                            删除
                                            </button>
                                            <button onclick="state(1)" class="col-sm-1 btn  btn-purple" type="button" value="删除">
                                            上架
                                            </button>
                                            <button onclick="state(0)" class="col-sm-1 btn  btn-inverse" type="button" value="删除">
                                            下架
                                            </button>
                                            <?php  ?>
                                            <select class="col-sm-2" id="topic" name="topic">
			                                    <option value="">选择专场分类</option>
			                                    <?php if(is_array($topic)): $i = 0; $__LIST__ = $topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="{$data['sort_id']}">{$data['topic_name']}----{$data['sort_name']}</option><?php endforeach; endif; else: echo "" ;endif; ?>
			                                </select>
			                                
			                                <button onclick="pullTopic()" class="col-sm-2 btn  btn-warning" type="button">添加到专场分类</button>
                                        </div>
                                    </div>
                                                                        
                                    <?php if($page){ ?>
                                    <div class="col-sm-6 ">
                                        <ul class='pagination pull-right'>{$page}</ul>
                                    </div> 
                                </div>


                                <?php } ?>  

                                <?php }else{ ?>
                                <tr><td colspan="8" class="empty"><span class="empty"><i>没有找到数据.</i></span></td></tr>
                                </tbody>
                                </table>

                                <?php } ?>
                            </div>
                        </form>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
    <style>
        .orange{background:orange;}
    </style>
<script type="text/javascript">
function pullTopic(){
	if(confirm('确定添加到专场')){
        var ids = '';
        $('tbody tr').each(function(){
            var data_id = $(this).find('td:first[style!=""]').attr('data_id')
            if(data_id!=undefined){
                ids +=data_id+':';
            }
        })
        if(!submit) return false;
        showmsg('正在提交');
        submit = false;        
        $.get("index.php?m=admin&a=goodslist&op=pulltopic&tid="+$("#topic").val()+"&goods_id="+ids,function(data){
            submit = true;
            if(data.state==1) window.location.reload();
            showmsg(data.msg);
        },'json');
        return false;
    }
}
function state(state){
    if(confirm(state==1?'确定批量上架':'确定批量下架')){
        var ids = '';
        $('tbody tr').each(function(){
            var data_id = $(this).find('td:first[style!=""]').attr('data_id')
            if(data_id!=undefined){
                ids +=data_id+':';
            }
        })
        if(!submit) return false;
        showmsg('正在提交');
        submit = false;
        $.get("index.php?m=admin&a=goodslist&op=state&state="+state+"&goods_id="+ids,function(data){
            submit = true;
            if(data.state==1) window.location.reload();
            showmsg(data.msg);
        },'json');
        return false;
    }
}
function deletes(){
    if(confirm('确定删除')){
        var ids = '';
        $('tbody tr').each(function(){
            var data_id = $(this).find('td:first[style!=""]').attr('data_id')
            if(data_id!=undefined){
                ids +=data_id+':';
            }
        })
        if(!submit) return false;
        showmsg('正在提交');
        submit = false;
        $.get("index.php?m=admin&a=goodslist&op=del&goods_id="+ids,function(data){
            submit = true;
            if(data.state==1) window.location.reload();//setTimeout(function(){window.location.reload();},500);
            showmsg(data.msg);
        },'json');
        return false;
    }    
}
	var quanxuan = 'background:orange';
    $(function(){    	
    	$("#quanxuan").click(function(){
    		$('tbody tr td').attr('style',quanxuan);
			quanxuan = quanxuan == ''?'background:orange':'';
    	});
        $("tbody tr").click(function(){
            var obj = $(this);
            if(obj.find('td:first').attr('style')==''){
                obj.find('td').attr('style','background:orange');
            }else{
                obj.find('td').attr('style','');
            }
        });
    });
    (function(win,doc){
        var s = doc.createElement("script"), h = doc.getElementsByTagName("head")[0];
        if (!win.alimamatk_show) {
            s.charset = "utf8";
            s.async = true;
            s.src = "http://a.alimama.cn/tkapi.js";
            h.insertBefore(s, h.firstChild);
        };
        var o = {
            pid: "mm_43412205_9948295_33168978",/*推广单元ID，用于区分不同的推广渠道*/
            appkey: "23189880",/*通过TOP平台申请的appkey，设置后引导成交会关联appkey*/
            unid: "",/*自定义统计字段*/
            type: "click" /* click 组件的入口标志 （使用click组件必设）*/
        };
        win.alimamatk_onload = win.alimamatk_onload || [];
        win.alimamatk_onload.push(o);
    })(window,document);
</script>
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