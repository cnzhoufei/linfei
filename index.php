<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
	die('require PHP > 5.3.0 !');
}

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', True);

// //登录地址配置
// define('__LOGIN__','linfei');

//隐藏Home
$arr = explode('/', $_SERVER['PHP_SELF']);
if ((count($arr) > 2 && $arr[2] !== 'Admin' && $arr[2] !== 'admin' && $arr[2] !== 'mobile' && $arr[2] !== 'Mobile' && $arr[2] !== 'Install' && $arr[2] !== 'install') || @!$arr[2]) {

	define('BIND_MODULE', 'Home');
}

// 定义应用目录
define('APP_PATH', './App/');
define('ADMIN_MSG',__DIR__);

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
