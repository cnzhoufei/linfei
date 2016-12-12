<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>管理登录</title>
		<meta name="keywords" content="云报名cms" />
		<meta name="description" content="云报名cms" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="/App/Admin/View/style/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/App/Admin/View/style/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/App/Admin/View/style/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="/App/Admin/View/style/css/css.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="/App/Admin/View/style/css/ace.min.css" />
		<link rel="stylesheet" href="/App/Admin/View/style/css/ace-rtl.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/App/Admin/View/style/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/App/Admin/View/style/js/html5shiv.js"></script>
		<script src="/App/Admin/View/style/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
									<h1>
										<i class="icon-desktop green"></i>
										<span class="red">林飞CMS后台管理</span>
									</h1>
                                                            <img src="http://xiaocaocms.com/tpl/simplebootx/Public/images/jp-app-90.png" />
									<h5 class="blue">获取升级包和更多实用工具关注小草CMS官方微信</h5>
                                                                        <h5 class="blue">小草CMS客服QQ88482528</h5>                                                                        
								</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												<?php echo ((isset($_GET['error']) && ($_GET['error'] !== ""))?($_GET['error']):'请输入账号、密码'); ?>
											</h4>

											<div class="space-6"></div>

											<form action="<?php echo U('Login/login');?>" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="name" placeholder="用户名" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="passwd" placeholder="密码" />
															<i class="icon-lock"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="code" placeholder="验证码" />
															<i class="icon-barcode"></i> 
														</span>
													</label>

													<div class="space"></div>
													<div class="clearfix">
														<label class="inline">
															<span class="lbl"><img src="<?php echo U('code');?>" alt="验证码" style="width:150px;" onclick="this.src='<?php echo U('code');?>?'+Math.random()" /></span>
														</label>

														<button type="submit" id="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															登陆
														</button>
													</div>

													<div class="space-4"></div>
													</fieldset>
											  </form>
										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="/" target="_blank" class="forgot-password-link">
													<i class="icon-arrow-left"></i>
													前台首页
												</a>
											</div>

											<div>
												<a href="javascript:;" class="user-signup-link">
													我要去注册
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div>
                                                                                                                                                                
									</div><!-- /widget-body -->                                                                        
								</div><!-- /login-box -->                                                                
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="/App/Admin/View/style/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/App/Admin/View/style/js/jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/App/Admin/View/style/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/App/Admin/View/style/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/App/Admin/View/style/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			$(function(){
				
			})
		</script>
</body>
</html>