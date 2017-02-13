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
                   <!--  <div class="col-xs-12">
                        <form action="<?php echo U('product/search');?>" method="get" >
                            <div class="row">
                                    <div class='col-sm-2'>
                                        <select class="form-control" name='class'>
                                            <option value="0">全部栏目</option>
                                            <?php if(is_array($class)): foreach($class as $c_kk=>$c_vv): ?><option <?php if($classid == $c_kk) echo 'selected';?> value="<?php echo ($c_kk); ?>"><?php echo ($c_vv); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class='col-sm-2'>
                                        <input class="form-control" placeholder=产品标题 type="text" name='title' value='<?php echo ($title); ?>'  />
                                    </div>
                                    <div class='col-sm-2'>
                                        <input class="form-control" placeholder=产品名称 type="text" name='name' value='<?php echo ($name); ?>'  />
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
                    </div>           -->

                    <style type="text/css">th,td{text-align:center;} .td{text-align:left;}</style>
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->                        
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="color428bca">
                                            <th width="50">排序</th>
                                            <th width="50">ID</th>
                                            <th width="100">图片</th>
                                            <th width="100">广告位ID(PID)</th>
                                            <th style="width:16%;">广告标题</th>
                                            <th>浏览量</th>
                                            <th>是否新窗口打开</th>
                                            <th>广告状态</th>
                                            <th>开始时间</th>
                                            <th>结束时间</th>
                                            <th>添加时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($adv){ ?>
                                    <?php if(is_array($adv)): $i = 0; $__LIST__ = $adv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr class="pointer even" id="<?php echo ($data['id']); ?>" x='0' onclick="choose(this)">
                                            <td>
                                            <input type="text" value="<?php echo ($data['sorting']); ?>" style="width:50px;padding:0 5px;margin:0;border:none;" onchange="sorting('<?php echo U('Advertising/ajaxsorting');?>',this,'<?php echo ($data['id']); ?>')" />
                                            </td>
                                            <td><?php echo ($data['id']); ?></td>
                                            <td><img src="<?php echo advimgadmin($data['id'],100,75);?>"></td>
                                            <td><?php echo ($data['pid']); ?></td>
                                            <td class="td"><?php echo getsubstr($data['title'],0,60);?></td>
                                            <td><?php echo ($data['clicks']); ?></td>
                                           <td>
                                            <a  v="<?php echo ($data['blank']); ?>" href="javascript:;" onclick="status2('<?php echo U('Advertising/status');?>', '<?php echo ($data[id]); ?>', 'blank', this)">
                                            <?php if(($data['blank'])): ?><img src="/App/Admin/View/style/images/yes.png">
                                            <?php else: ?>
                                            <img src="/App/Admin/View/style/images/cancel.png"><?php endif; ?>
                                           </a></td>
                                          
                                           
                                            <td>
                                            <a  v="<?php echo ($data['status']); ?>" href="javascript:;" onclick="status2('<?php echo U('Advertising/status');?>', '<?php echo ($data[id]); ?>', 'status', this)">
                                            <?php if(($data['status'])): ?><img src="/App/Admin/View/style/images/yes.png">
                                            <?php else: ?>
                                            <img src="/App/Admin/View/style/images/cancel.png"><?php endif; ?>
                                           </a></td>
                                            <td><?php echo date('Y-m-d H:i:s',$data['starttime']);?></td >
                                            <td><?php echo date('Y-m-d H:i:s',$data['endtime']);?></td>
                                            <td><?php echo date('Y-m-d H:i:s',$data['addtime']);?></td>
                                            <td> 
                                                <a target="_blank" href="http://<?php echo ($_SERVER['HTTP_HOST']); echo U('/Article/info');?>">查看</a>
                                                |
                                                <a id="" href="<?php echo U('Advertising/addadvertising');?>?id=<?php echo ($data['id']); ?>" title="">编辑</a>
                                                |
                                                <a id="" onclick="mydelete('<?php echo ($data['id']); ?>','<?php echo U('Advertising/del');?>','<?php echo ($data['id']); ?>')" href="ajaxSrcipt:;" title="删除">删除</a> | 
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <style>button{min-width:80px;}</style>
                                <div class="row">
                                    <div class='col-sm-6'>
                                        <div class="row">
                                            <button class="col-sm-1 btn  btn-success" type="button"  value="更新" onclick="window.location.reload();">                                            
                                            排序
                                            </button>
                                            <button id="quanxuan" class="col-sm-1 btn  btn-primary" type="button" value="全选">
                                            全选
                                            </button>
                                            <button id="fanxuan" class="col-sm-1 btn  btn-warning" type="button" value="反选">
                                            反选
                                            </button>
                                            <button id="quxiao" class="col-sm-1 btn  btn-inverse" type="button" value="取消">
                                            取消
                                            </button>
                                            <button onclick="deletes()" class="col-sm-1 btn  btn-danger" type="button" value="删除">
                                            删除
                                            </button>
                                            <button onclick="states(1)" class="col-sm-1 btn  btn-purple" type="button" value="上架">
                                            上架
                                            </button>
                                            <button onclick="states(0)" class="col-sm-1 btn  btn-inverse" type="button" value="下架">
                                            下架
                                            </button>
                                            <?php  ?>
                                           
                                        </div>
                                    </div>
                                      <style type="text/css">.pagination a,.pagination span{display:inline-block;list-style:none;min-width:30px;border:3px solid #438EB9;text-align:center;margin-left:2px;}</style>                                  
                                    <?php if($page){ ?>
                                    <div class="col-sm-6 ">
                                        <div class='pagination pull-right pagination-large'><?php echo ($page); ?><a href="">共 <?php echo ($count); ?> 条数据</a></div>
                                    </div> 
                                </div>
                                <?php } ?>  
                                <?php }else{ ?>
                                <tr><td colspan="8" class="empty"><span class="empty"><i>没有找到数据.</i></span></td></tr>
                                </tbody>
                                </table>

                                <?php } ?>
                            </div>
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

<script type="text/javascript">

//选择
function choose(obj)
{
    var x = ($(obj).attr('x') == '1')?'0':'1';
    if(x == '1'){var back = 'background:orange';}else{var back = '';}
    $(obj).find('td').attr('style',back);
    $(obj).attr('x',x);
}

//全选
$('#quanxuan').click(function(){

    $('tbody tr td').attr('style','background:orange');
    $('tbody tr').attr('x','1');
})

//反选
$('#fanxuan').click(function(){
    var tr = $('tbody tr');
    tr.each(function(){
        var x = ($(this).attr('x') == '1')?'0':'1';
        if(x == '1'){var back = 'background:orange';}else{var back = '';}
        $(this).find('td').attr('style',back);
        $(this).attr('x',x);
    })

})


//取消
$('#quxiao').click(function(){

    $('tbody tr td').attr('style','background:');
    $('tbody tr').attr('x','0');
})


function states(v){
    var tr = $('tbody tr');
    var arr = new Array();
    tr.each(function(i){
        if($(this).attr('x') == '1'){
            arr[i] = $(this).attr('id');
        }
    })

    $.post("<?php echo U('Advertising/states');?>",{'v':v, 'arr':arr} ,function(res){

        if(res){
            showmsg('操作成功');
            window.location.reload();
        }else{
            showmsg('操作失败！');
            window.location.reload();
        }
    })

    
}

//批量删除
function deletes(v){
 if(confirm('你确定删除吗？')){
    var tr = $('tbody tr');
    var arr = new Array();
    tr.each(function(i){
        if($(this).attr('x') == '1'){
            arr[i] = $(this).attr('id');
        }
    })

    $.post("<?php echo U('Advertising/deletes');?>",{'v':v, 'arr':arr} ,function(res){

        if(res){
            tr.each(function(i){
            if($(this).attr('x') == '1'){
                $(this).remove();
            }
            })
            showmsg('操作成功');
        }else{
            showmsg('操作失败！');
            window.location.reload();
        }
    })

    
}
}
</script>

<!-- 18   -->