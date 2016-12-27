<?php

//后台菜单
function adminmenu()
{
	return array(
		array('name'=>'系统设置','icon'=>'icon-cogs','child'=>
				array(
					array('name'=>'网站信息','c'=>'Config','f'=>'index'),
					array('name'=>'自定义信息','c'=>'Config','f'=>'custom'),
					array('name'=>'URL模式','c'=>'','f'=>''),
					// array('name'=>'积分设置','c'=>'','f'=>''),
					array('name'=>'邮件设置','c'=>'Config','f'=>'email'),
					array('name'=>'水印设置','c'=>'Config','f'=>'watermark'),
					// array('name'=>'QQ登录设置','c'=>'','f'=>''),
					// array('name'=>'UCENTER设置','c'=>'','f'=>''),
					// array('name'=>'注册字段设置','c'=>'','f'=>''),
					// array('name'=>'清除缓存','c'=>'','f'=>''),
				),
			),
			array('name'=>'分类管理','icon'=>'icon-tags','child'=>
				array(
					array('name'=>'分类列表','c'=>'Classify','f'=>'index','p'=>'?type=1'),
					array('name'=>'添加分类','c'=>'Classify','f'=>'addclassify'),
				),
			),
			array('name'=>'产品管理','icon'=>'icon-desktop','child'=>
				array(
					array('name'=>'产品列表','c'=>'Product','f'=>'index'),
					array('name'=>'添加产品','c'=>'Product','f'=>'addproduct'),
					array('name'=>'产品评论','c'=>'Product','f'=>''),
				),
			),
			array('name'=>'用户管理','icon'=>'icon-group','child'=>
				array(
					array('name'=>'用户列表','c'=>'User','f'=>'index'),
					array('name'=>'添加用户','c'=>'','f'=>''),
					array('name'=>'商品评论','c'=>'','f'=>''),
				),
			),
			
			
			array('name'=>'内容管理','icon'=>'icon-book','child'=>
				array(
					array('name'=>'文章列表','c'=>'','f'=>''),
					array('name'=>'添加文章','c'=>'','f'=>''),
				),
			),
			array('name'=>'广告管理','icon'=>'icon-bullhorn','child'=>
				array(
					array('name'=>'广告列表','c'=>'','f'=>''),
					array('name'=>'添加广告','c'=>'','f'=>''),
				),
			),
			array('name'=>'活动专场','icon'=>'icon-tasks','child'=>
				array(
					array('name'=>'专场列表','c'=>'','f'=>''),
					array('name'=>'添加专场','c'=>'','f'=>''),
				),
			),
			array('name'=>'模板管理','icon'=>'icon-adjust','child'=>
				array(
					array('name'=>'PC模板','c'=>'Templates','f'=>'pc'),
					array('name'=>'手机模板','c'=>'Templates','f'=>'mobile'),
				),
			),
		);
}


// //系统设置
// function config()
// {
// 	return array(
// 		//单标签
// 		'text'=>array(
// 				array('type'=>'text','key'=>'网站名称','name'=>'webname','val'=>'webname'),
// 				array('type'=>'text','key'=>'网站标题','name'=>'title','val'=>'title'),
// 		),
// 		//对标签
// 		'textarea'=>array(
// 				array('type'=>'textarea','key'=>'统计代码','name'=>'statistical','val'=>'statistical'),
// 		),
// 		//嵌套
// 		'select'=>array(

// 				array('type'=>'select','key'=>'统计代码','name'=>'select','val'=>array(
// 						array('type'=>'option','name'=>'1','val'=>'1'),
// 						array('type'=>'option','name'=>'2','val'=>'2'),
// 						array('type'=>'option','name'=>'3','val'=>'3'),

// 					)),
// 		),
		


// 		);
// }