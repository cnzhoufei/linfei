
create database if not exists `linfei`;

--栏目表
create table if not exists `linfei_column`(
	`id` int unsigned not null auto_increment primary key COMMENT '栏目id',
	`name` varchar(255) not null COMMENT'栏目名称',
	`m_name` varchar(255) not null COMMENT'手机栏目名称',
	`title` varchar(255) not null default '栏目title',
	`keywords` varchar(255) not null default '关键字',
	`description` text not null COMMENT '栏目描述',
	`pid` char(20) not null COMMENT '栏目父id',
	`type` char(20) not null default 'product' COMMENT '栏目类型 默认为产品类型 共两种类型 产品和资讯news 封面cover',
	`url` varchar(100) not null default ' ' COMMENT	'栏目连接',
	`url_name` char(30) not null default ' ' COMMENT	'栏目url命名 拼音',
	`path` varchar(255) not null COMMENT '栏目路径',
	`status` tinyint(1) not null default 1 COMMENT '栏目状态 1在前端显示 0不显示',
	`top` tinyint(1) not null default 1 COMMENT '顶部导航 1在前端显示 0不显示',
	`bottom` tinyint(1) not null default 1 COMMENT '底部导航 1在前端显示 0不显示',
	`text` text COMMENT '栏目内容',
	`sorting` char(20) NOT NULL DEFAULT '50' COMMENT '排序',
	`layer` char(1) NOT NULL DEFAULT '0' COMMENT '标识栏目层级',
	`time` int not null COMMENT '添加时间'
)engine=innodb default charset=utf8;


--模型表
create table if not exists `linfei_model`(
	`id` int unsigned not null auto_increment primary key COMMENT '模型id',
	`text` text 

)engine=innodb default charset=utf8;

--文章表
  create table if not exists `linfei_article`(
   `id` int unsigned not null auto_increment primary key COMMENT '文章id',
   `userid` int unsigned not null COMMENT '用户id',
   `title` varchar(255) not null COMMENT '文章标题',
   `keywords` varchar(255) not null default '关键字',
   `description` text not null COMMENT '文章描述',
   `cid` int unsigned not null COMMENT '所属栏目',
   `pic` text not null COMMENT '文章缩略图',
   `publisher` char(50) not null default '未知发布者' COMMENT '发布者',
   `clicks` int unsigned not null default 0 COMMENT '点击数',
   `status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
   `text` text not null COMMENT '文章内容',
   `field` text COMMENT '用户自定义字段 储存的是窜行化数组',
   `recommended` tinyint(1) default 0 COMMENT '推荐  0未推荐 1推荐',
   `time` int not null COMMENT '添加时间'
   )engine=innodb default charset=utf8;
 alter table linfei_article add article_recommended tinyint(1) default 0 COMMENT '推荐  0未推荐 1推荐';

 create table if not exists `linfei_products`(
   `id` int unsigned not null auto_increment primary key COMMENT '文章id',
   `userid` int unsigned not null COMMENT '用户id',
   `title` varchar(255) not null COMMENT '文章标题',
   `keywords` varchar(255) not null default '关键字',
   `description` text not null COMMENT '文章描述',
   `cid` int unsigned not null COMMENT '所属栏目',
   `pic` text not null COMMENT '文章缩略图',
   `publisher` char(50) not null default '未知发布者' COMMENT '发布者',
   `clicks` int unsigned not null default 0 COMMENT '点击数',
   `status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
   `text` text not null COMMENT '文章内容',
   `field` text COMMENT '用户自定义字段 储存的是窜行化数组',
   `recommended` tinyint(1) default 0 COMMENT '推荐  0未推荐 1推荐',
   `time` int not null COMMENT '添加时间'
   )engine=innodb default charset=utf8;



--网站配置表
create table if not exists `linfei_config`(
	`id` int unsigned not null auto_increment primary key COMMENT '配置id',
	`name` varchar(255) not null default '公司名称' COMMENT '公司名称',
	`title` varchar(255) not null default '网站主标题' COMMENT '网站主标题',
	`keywords` varchar(255) not null default '站点关键字' COMMENT '站点关键字',
	`description` text COMMENT '站点描述',
	`home` varchar(255) not null default '主页' COMMENT '主页链接名',
	`logo` varchar(255) not null default '/Templates/Default/Public/default.png' COMMENT '网站LOGO',
	`copyright` varchar(255) not null default '版权信息' COMMENT '版权信息',
	`record` varchar(255) not null default '备案信息' COMMENT '备案信息',
	`address` varchar(255) not null default '广州市白云区金沙洲沙凤商业大厦8楼' COMMENT '联系地址',
	`statistics` varchar(255) COMMENT '站长统计',
	`status` tinyint(1) COMMENT '站点状态 1开启  0关闭',
	`time` int unsigned not null COMMENT '添加时间'
)engine=innodb default charset=utf8;

--自定义信息
create table if not exists `linfei_custom`(
`id` int unsigned not null auto_increment primary key,
`key` char(30) not null default '' COMMENT '标识 下标',
`name` varchar(255) not null default '' COMMENT '中文说明',
`val` varchar(1000) not null default '' COMMENT '值',
`time` int unsigned not null COMMENT '时间'
)engine=innodb default charset=utf8;


--单页面表
create table if not exists `linfei_single`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`userid` int unsigned not null COMMENT '用户id',
	`title` varchar(255) not null UNIQUE COMMENT '标题',
	`keywords` varchar(255) not null COMMENT '关键字',
	`description` text COMMENT '描述',
	`text` text COMMENT '主体内容',
	`pic` varchar(255) 	COMMENT '缩略图',
	`status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
	`publisher` char(50) default '未知发布者' COMMENT '发布者',
	`num` int not null default 0 COMMENT '点击量',
	`time` int unsigned not null COMMENT '添加时间'
)engine=innodb default charset=utf8;




--轮播图
create table if not exists `linfei_carousel`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`userid` int unsigned not null COMMENT '用户id',
	`name` varchar(255) not null COMMENT '轮播图名',
  	`url` varchar(255) not null COMMENT '链接地址',
  	`pic` varchar(255) not null COMMENT '图片',
  	`status` tinyint(1) default '0' COMMENT '状态 0显示 1不显示',
 	`remarks` varchar(255) default null COMMENT '备注',
  	`addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;



--友情链接
create table if not exists `linfei_friendship`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`name` varchar(255) NOT NULL COMMENT '连接名',
  	`url` varchar(255) NOT NULL COMMENT '连接地址',
  	`logo` varchar(255) DEFAULT NULL COMMENT '链接图片',
  	`email` varchar(255) DEFAULT NULL COMMENT '站长邮箱',
  	`status` tinyint(1) DEFAULT '0' COMMENT '连接状态 0显示 1不显示',
  	`remarks` varchar(255) DEFAULT NULL COMMENT '备注',
  	`addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;


--留言表
create table if not exists `linfei_message`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`userid` int unsigned not null COMMENT '用户id',
	`username` varchar(255) NOT NULL COMMENT '留言者姓名',
	`tel` varchar(255) NOT NULL COMMENT '留言者电话',
  	`url` varchar(255) NOT NULL COMMENT '留言页面',
  	`email` varchar(255) DEFAULT NULL COMMENT '留言者邮箱',
  	`qq` varchar(255) DEFAULT NULL COMMENT '留言者qq',
  	`text` text DEFAULT NULL COMMENT '留言内容',
  	`addtime` int unsigned default null COMMENT '留言时间'
)engine=innodb default charset=utf8;




--模板分类表
create table if not exists `template_type`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`name` varchar(255) COMMENT '模板分类名称',
	`pid` int COMMENT '模板父id',
	`path` varchar(255) default 0 COMMENT '路径',
  	`addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;


insert into tpl_type values(1,'服装、饰品、个人护理',0,123123123);



--海报图片表
create table if not exists `linfei_posters`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`userid` int unsigned not null COMMENT '用户id',
	`type` varchar(20) COMMENT '页面标识',
	`name` varchar(255) COMMENT '名称',
	`url` varchar(255) COMMENT '链接',
	`pic` varchar(255) COMMENT '图片',
  	`status` tinyint(1) DEFAULT '0' COMMENT '状态 0显示 1不显示',
  	`addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;

demo_linfei_0008
demo_shop_0001


--模板表
create table if not exists `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL DEFAULT '/Templates/Default/' COMMENT '模板路径',
  `name` varchar(255) NOT NULL COMMENT '模板名称',
  `type` tinyint(4) NOT NULL COMMENT '模板类型',
  `thumb` varchar(255) NOT NULL COMMENT '模板缩略图',
  `url` varchar(255) DEFAULT NULL,
  `dir` varchar(100) DEFAULT NULL,
  -- `width` char(10) NOT NULL DEFAULT '200' COMMENT '缩略图宽',
  -- `height` char(10) NOT NULL DEFAULT '100' COMMENT '缩略图高',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


alter table templates add width char(10) NOT NULL DEFAULT '200' COMMENT '缩略图宽' after dir;
alter table linfei_article add `article_recommended` tinyint(1) not null default 0 COMMENT '推荐  0未推荐 1推荐';





	头条[h]
	推荐[c]
	幻灯[f]
	特荐[a]
	滚动[s]
	加粗[b]
	图片[p]
	跳转[j]




管理员表
create table if not exists `linfei_admin`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`name` varchar(255) NOT NULL COMMENT '用户名',
	`pwd` varchar(255) not null COMMENT '密码',
	`logintime` char(50) not null COMMENT '上次登录时间',
	`time` char(50) not null COMMENT '当前登录时间',
	`loginip` char(20) default null,
	`tel` char(20) default null,
	`email` varchar(255) default null
)engine=innodb default charset=utf8;

insert into linfei_admin values(1,'admin','e10adc3949ba59abbe56e057f20f883e','1478240169','1478240169','127.0.0.1','13539993040','vzhoufei@qq.com')




create table if not exists ``(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`title` varchar(255) not null default '',
	`pic` text,
)engine=innodb default charset=utf8;