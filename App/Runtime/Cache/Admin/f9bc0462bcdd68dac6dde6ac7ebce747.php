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
<?php echo ($ueditorinit); ?>
        <link rel="stylesheet" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

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
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->                        
                            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo ($ad['id']); ?>" />
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">广告位置<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-9">
                                    <?php $type = array(1=>'图片',2=>'文本');?>
                                    <select  class="col-sm-12" name="pid" onchange="types(this);">
                                            <option value="0">请选择广告位</option>
                                        <?php if(is_array($advlocation)): $i = 0; $__LIST__ = $advlocation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data['id']); echo ($data['type']); ?>" <?php if($ad['pid'] == $data['id']){echo 'selected';}?>><?php echo ($data['name']); ?>(<?php echo ($type[$data[type]]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>                                                                        
                                    </div>
                                    <script type='text/javascript'>
                                        $("select[name='code'] option[value='<?php echo $ad[code] ?>']").attr('selected','selected');
                                    </script>
                                </div>                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 标题 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                                <input type="text" name="title" value="<?php echo ($ad['title']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 链接 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="url" placeholder="例如：http://www.linfei.cc" value="<?php echo ($ad['url']); ?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sorting" value="<?php echo intval($ad['sorting']);?>" class="col-sm-12" />
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 其他 <span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="other" placeholder="例如：说明" value="<?php echo ($ad['other']); ?>" class="col-sm-12" />
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 开始日期</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="starttime" id="starttime" style="width:150px;" value="<?php if(($ad[starttime])): echo date('Y-m-d H:i:s',$ad[starttime]); endif; ?>" />
                                            <label> 终止日期</label>
                                            <input type="text" name="endtime" id="endtime" style="width:150px;" value="<?php if(($ad[endtime])): echo date('Y-m-d H:i:s',$ad[endtime]); endif; ?>" />
                                            <label>《不填写表示永不过期》当前时间:<?php echo date('Y-m-d H:i:s',time());?></label>
                                            
                                        </div>
                                        
                                </div>

                             
                                

                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 开启/关闭<span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                        <label>
                                            <input name="status" class="ace ace-switch ace-switch-7" type="checkbox" <?php if(!$ad['status']){ }else{ ?>checked='checked'<?php } ?> value='1'>
                                            <span class="lbl"></span>
                                        </label>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 新标签打开<span style="color:#f00;">*</span></label>
                                        <div class="col-sm-9">
                                        <label>
                                            <input name="blank" class="ace ace-switch ace-switch-7" type="checkbox" <?php if(!$ad['blank']){ }else{ ?>checked='checked'<?php } ?> value='1'>
                                            <span class="lbl"></span>
                                        </label>
                                        </div>
                                </div>



                            <style>#imgs img{width:50%;}</style>
                             
                            <div class="form-group" style="<?php if($ad['type'] != 1){echo 'display:none;';}?>" id="tupin">
                                <label  class="col-sm-2 control-label no-padding-right" for="form-field-1">广告图片<span style="color:#f00;">*</span></label>
                                <div class="col-sm-9">
                                <input  class="col-sm-12" type="button" value="上传图片" onClick="GetUploadify(1,'ggimg','imgs')" style="width:150px;" />   
                                </div>
                            </div>
                            <div class="form-group" style="<?php if($ad['type'] != 1){echo 'display:none;';}?>">
                                <label  class="col-sm-2 control-label no-padding-right" for="form-field-1"><span style="color:#f00;"></span></label>
                                <div class="col-sm-9">
                                </div>
                                <span id="imgs"><img src="<?php echo ($ad['img']); ?>"></span>
                            </div>
                            

                                
                            
                            <div class="form-group" style="<?php if($ad['type'] != 2){echo 'display:none;';}?>" id='wenben'>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 类容 <span style="color:#f00;">*</span></label>

                                        <div class="col-sm-9">
                                                <script id="guanggao" type="text" name="text" style="width:100%;height:500px;"><?php echo (htmlspecialchars_decode($ad['text'])); ?></script>
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
<script>
    $(function () {
        $('input[type="file"]').ace_file_input({
            no_file: 'No File ...',
            btn_choose: 'Choose',
            btn_change: 'Change',
            droppable: false,
            onchange: null,
            thumbnail: false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
        });
    });

    function types(obj){
        var str = $(obj).val();
        var v = str.substr(-1,1);
        if(v == 1){
            $('#wenben').css('display','none');
            $('#tupin').css('display','');
        }else if(v == 2){
            $('#wenben').css('display','');
            $('#tupin').css('display','none');
        }else{
            $('#tupin').css('display','none');
            $('#wenben').css('display','none');
        }
    }


</script>
    <script src="/Public/date/jquery-1.11.3.min.js"></script>
    <script src="/Public/date/foundation-datepicker.js"></script>
    <script src="/Public/date/locales/foundation-datepicker.zh-CN.js"></script>   
<script type="text/javascript">
$('#starttime').fdatepicker({
    format: 'yyyy-mm-dd hh:ii',
    pickTime: true
});
$('#endtime').fdatepicker({
    format: 'yyyy-mm-dd hh:ii',
    pickTime: true
});

var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#dpd1').fdatepicker({
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.update(newDate);
            }
            checkin.hide();
            $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').fdatepicker({
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout.hide();
        }).data('datepicker');

</script>

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