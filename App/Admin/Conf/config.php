<?php
return array(
			'TMPL_PARSE_STRING'  =>array(
					'ADMINSTYLE'     => '/App/Admin/View/style', // 增加新的image  css js  访问路径 
			   ),



   'LOAD_EXT_CONFIG' => 'dbconfig,emailconfig',    // 加载邮件配置文件
   'DEFAULT_MODULE'         =>      'Home', 
   'DEFAULT_CONTROLLER'     =>      'Index',
   'DEFAULT_ACTION'         =>      'index',                      // 默认操作名称
   'URL_MODEL'              =>      2,          		          //重写模式
   'SHOW_PAGE_TRACE'        =>      true,       		          //开启页面trace
   'URL_HTML_SUFFIX'        =>      'php',      		          //设置伪静态
   'TMPL_L_DELIM'    		    =>      '{{',
   'TMPL_R_DELIM'    		    =>      '}}',


    'TOKEN_ON'              =>      true,                          // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'            =>      '__hash__',                    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'            =>      'md5',                         //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'           =>      true,                          //令牌验证出错后是否重置令牌 默认为true

    // 'TMPL_ACTION_ERROR'     =>  ADMIN_MSG.'/App/Admin/View/Public/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    // 'TMPL_ACTION_SUCCESS'   =>  ADMIN_MSG.'/App/Admin/View/Public/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    // 'TMPL_EXCEPTION_FILE'   =>  ADMIN_MSG.'/App/Admin/View/Public/think_exception.tpl',// 异常页面的模板文件





    /*配置邮件发送服务器*/
    // 'MAIL_HOST'             =>      'smtp.163.com',                 /*smtp服务器的名称、smtp.163.com*/
    // 'MAIL_SMTPAUTH'         =>      TRUE,                           /*启用smtp认证*/
    // 'MAIL_DEBUG'            =>      FLASE,                          /*是否开启调试模式*/
    // 'MAIL_USERNAME'         =>      'vzhoufei@163.com',             /*邮箱名称*/
    // 'MAIL_FROM'             =>      'vzhoufei@163.com',             /*发件人邮箱*/
    // 'MAIL_FROMNAME'         =>      '周飞',                         /*发件人昵称*/
    // 'MAIL_PASSWORD'         =>      'ydjz888',                      /*发件人邮箱的密码*/
    // 'MAIL_CHARSET'          =>      'utf-8',                        /*字符集*/
    // 'MAIL_ISHTML'           =>      TRUE,                           /*是否HTML格式邮件*/

    // // 'DB_DEPLOY_TYPE'        =>      1,                           // 设置分布式数据库支持
    // 'SESSION_TYPE'          =>      'db',                           // session 保存方式
    // 'SESSION_TABLE'         =>      'session',                      // session表 
    // 'SESSION_EXPIRE'        =>      '1800',                         // session过期时间
    // 'DB_HOSTS'                =>      '47.90.81.73',                // session服务器地址
    // 'DB_NAMES'                =>      'session',                    // session数据库名
    // 'DB_USERS'                =>      'root',                       // session用户名
    // 'DB_PWDS'                 =>      '1sfsD83562GH></.8?*&',                           // session密码
);

// CREATE TABLE session (
//  session_id varchar(255) NOT NULL,
//  session_expire int(11) NOT NULL,
//  session_data blob,
//  UNIQUE KEY `session_id` (`session_id`)
// );
