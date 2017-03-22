CREATE DATABASE IF NOT EXISTS `linfei` DEFAULT CHARSET utf8 COLLATE utf8_general_ci; 

--栏目表
create table if not exists `linfei_classify`(
	`id` int unsigned not null auto_increment primary key COMMENT '栏目id',
	`name` varchar(255) not null COMMENT'栏目名称',
	`m_name` varchar(255) not null COMMENT'手机栏目名称',
	`title` varchar(255) not null default '栏目title',
	`keywords` varchar(255) not null default '关键字',
	`description` text not null COMMENT '栏目描述',
	`pid` char(20) not null COMMENT '栏目父id',
	`type` char(20) not null default 'product' COMMENT '栏目类型 默认为产品类型 共两种类型 产品和资讯news 封面cover',
	`external` varchar(100) not null default '' COMMENT	'外部链接',
	`url` varchar(100) not null default '' COMMENT	'栏目链接',
	`url_name` char(30) not null default '' COMMENT	'栏目url命名 拼音',
	`path` varchar(255) not null COMMENT '栏目路径',
	`status` tinyint(1) not null default 1 COMMENT '栏目状态 1在前端显示 0不显示',
	`m_is_show` tinyint(1) not null default 1 COMMENT '手机端导航是否显示 1在前端显示 0不显示',
	`top` tinyint(1) not null default 1 COMMENT '顶部导航 1在前端显示 0不显示',
	`bottom` tinyint(1) not null default 1 COMMENT '底部导航 1在前端显示 0不显示',
	`text` text COMMENT '栏目内容',
	`sorting` char(20) NOT NULL DEFAULT '50' COMMENT '排序',
	`layer` char(1) NOT NULL DEFAULT '0' COMMENT '标识栏目层级',
	`tpl` char(30) NOT NULL DEFAULT 'tpl.html' COMMENT '此栏目模板',
	`tpl2` char(30) NOT NULL DEFAULT 'article.html' COMMENT '文章模板',
	`m` char(50)  COMMENT '模型表',
	`time` int not null COMMENT '添加时间'
)engine=innodb default charset=utf8;


--水印表
create table if not exists `linfei_watermark`(
   `id` int unsigned not null auto_increment primary key COMMENT 'id',
   `status1` tinyint(1) not null default 0 COMMENT '是否开启产品水印',
   `status2` tinyint(1) not null default 0 COMMENT '是否开启文章水印',
   `type` tinyint(1) not null default 0 COMMENT '水印类型 0文字  1图片',
   `transparent` char(3) not null default '100' COMMENT '透明度',
   `wenzi` varchar(255) not null default '' COMMENT '文字',
   `tupin` varchar(255) not null default '' COMMENT '图片',
   `location` tinyint(1) not null default 1 COMMENT '水印位置'
   )engine=innodb default charset=utf8;


--产品表
 create table if not exists `linfei_product`(
   `id` int unsigned not null auto_increment primary key COMMENT '产品id',
   `name` varchar(255) not null default '' COMMENT '产品名称',
   `title` varchar(255) not null default ''  COMMENT '产品标题',
   `keywords` varchar(255) not null default '' COMMENT '关键字',
   `description` text not null default '' COMMENT '产品描述',
   `cid` int unsigned not null COMMENT '所属栏目',
   `img` text not null default '' COMMENT '产品缩略图',
   `clicks` int unsigned not null default 0 COMMENT '点击数',
   `status` tinyint(1) not null default 0 COMMENT '产品状态 0在前端显示 1不显示',
   `text` text not null default '' COMMENT '产品内容',
   `newtime` int not null default 0 COMMENT '更新时间',
   `recommended` tinyint(1) default 0 COMMENT '推荐  0未推荐 1推荐',
   `new` tinyint(1) default 0 COMMENT '新品  0未推荐 1推荐',
   `selling` tinyint(1) default 0 COMMENT '热卖  0未推荐 1推荐',
   `sorting` char(20) not null default '0' COMMENT '排序',
   `url` varchar(255) not null default '' COMMENT '产品链接',
   `custom` varchar(255) not null default '' COMMENT '自定义名称',
   `time` int not null COMMENT '添加时间'
   )engine=innodb default charset=utf8;


 --文章表
 create table if not exists `linfei_article`(
   `id` int unsigned not null auto_increment primary key COMMENT '文章id',
   `name` varchar(255) not null default '' COMMENT '文章名称',
   `title` varchar(255) not null default ''  COMMENT '文章标题',
   `keywords` varchar(255) not null default '' COMMENT '关键字',
   `description` text not null default '' COMMENT '文章描述',
   `cid` int unsigned not null COMMENT '所属栏目',
   `img` text not null default '' COMMENT '文章缩略图',
   `clicks` int unsigned not null default 0 COMMENT '点击数',
   `status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
   `text` text not null default '' COMMENT '文章内容',
   `newtime` int not null default 0 COMMENT '更新时间',
   `recommended` tinyint(1) default 0 COMMENT '推荐  0未推荐 1推荐',
   `recommendeds` tinyint(1) default 0 COMMENT '特荐  0未推荐 1推荐',
   `headlines` tinyint(1) default 0 COMMENT '头条  0未推荐 1推荐',
   `url` varchar(255) not null default '' COMMENT '文章链接',
   `custom` varchar(255) not null default '' COMMENT '自定义名称',
   `sorting` char(20) not null default '0' COMMENT '排序',
   `time` int not null COMMENT '添加时间'
   )engine=innodb default charset=utf8;







--产品图片表
create table if not exists `linfei_productimg`(
`id` int unsigned not null auto_increment primary key,
`productid` int not null COMMENT '产品id',
`img` varchar(255) not null default '' COMMENT '产品图片'
)engine=innodb default charset=utf8;





--网站配置表
create table if not exists `linfei_config`(
	`id` int unsigned not null auto_increment primary key COMMENT '配置id',
	`name` varchar(255) not null default '' COMMENT '公司名称',
	`company` varchar(255) not null default '' COMMENT '公司英文名称',
	`title` varchar(255) not null default '' COMMENT '网站主标题',
	`keywords` varchar(255) not null default '' COMMENT '站点关键字',
	`description` text COMMENT '站点描述',
	`home` varchar(255) not null default '主页' COMMENT '主页链接名',
	`logo` varchar(255) not null default '/Templates/Default/Public/default.png' COMMENT '网站LOGO',
	`copyright` varchar(255) not null default '' COMMENT '版权信息',
	`record` varchar(255) not null default '' COMMENT '备案信息',
	`address` varchar(255) not null default '' COMMENT '联系地址',
	`statistics` varchar(255) COMMENT '站长统计',
	`status` tinyint(1) COMMENT '站点状态 1开启  0关闭',
	`navstyle` tinyint(1) not null default 1 COMMENT '后台菜单样式 0收起 1展开',
	`url` tinyint(1) not null default 1 COMMENT 'url模式(1动态 2伪静态 3静态)',
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





--广告表
create table if not exists `linfei_adv`(
`id` int unsigned not null auto_increment primary key,
`pid` int not null default 0 COMMENT '广告位id',
`title` varchar(255) not null default '' COMMENT '广告标题',
`img` varchar(255) not null default '' COMMENT '轮播图片',
`url` varchar(255) not null default '' COMMENT '广告链接',
`text` text  COMMENT '广告文本',
`sorting` char(20) not null default '0' COMMENT '排序',
`clicks` int not null default 0 COMMENT '浏览量',
`blank` tinyint(1) not null default 1 COMMENT '是否新窗口打开(1是 0否)',
`status` tinyint(1) not null default 1 COMMENT '是否开启广告(1是 0否)',
`other` varchar(255) COMMENT '其他',
`starttime` int not null default 0 COMMENT '起始时间',
`endtime` int not null default 0 COMMENT '结束时间',
`addtime` int COMMENT '添加时间'
)engine=innodb default charset=utf8;

--广告位表
create table if not exists `linfei_advlocation`(
`id` int unsigned not null auto_increment primary key,
`name` varchar(255) not null default '' COMMENT '广告位名称',
`width` char(10) default '0px' COMMENT '广告宽',
`height` char(10) default '0px' COMMENT '广告高',
`type` tinyint(1) default 1 COMMENT '广告类型 1图片 2文本',
`addtime` int not null default 0 COMMENT '添加时间'
)engine=innodb default charset=utf8;


--模型表 用户自己创建










--单页面表
-- create table if not exists `linfei_single`(
-- 	`id` int unsigned not null auto_increment primary key COMMENT 'id',
-- 	`userid` int unsigned not null COMMENT '用户id',
-- 	`title` varchar(255) not null UNIQUE COMMENT '标题',
-- 	`keywords` varchar(255) not null COMMENT '关键字',
-- 	`description` text COMMENT '描述',
-- 	`text` text COMMENT '主体内容',
-- 	`pic` varchar(255) 	COMMENT '缩略图',
-- 	`status` tinyint(1) not null default 0 COMMENT '文章状态 0在前端显示 1不显示',
-- 	`publisher` char(50) default '未知发布者' COMMENT '发布者',
-- 	`num` int not null default 0 COMMENT '点击量',
-- 	`time` int unsigned not null COMMENT '添加时间'
-- )engine=innodb default charset=utf8;




--轮播图
create table if not exists `linfei_pic`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`name` varchar(255) not null COMMENT '轮播图名',
  	`url` varchar(255) not null COMMENT '链接地址',
  	`img` varchar(255) not null COMMENT '图片',
	`sorting` char(20) not null default '0' COMMENT '排序',
	`blank` tinyint(1) not null default 1 COMMENT '是否新窗口打开(1是 0否)',
  	`status` tinyint(1) default '0' COMMENT '状态(1显示 0不显示)',
 	`remarks` varchar(255) default null COMMENT '备注',
  	`addtime` int unsigned default null COMMENT '添加时间'
)engine=innodb default charset=utf8;



--友情链接
create table if not exists `linfei_friendship`(
	`id` int unsigned not null auto_increment primary key COMMENT 'id',
	`name` varchar(255) NOT NULL COMMENT '链接名',
  	`url` varchar(255) NOT NULL COMMENT '链接地址',
  	`img` varchar(255) DEFAULT NULL COMMENT '链接图片',
  	`email` varchar(255) DEFAULT NULL COMMENT '站长邮箱',
	`sorting` char(20) not null default '0' COMMENT '排序',
  	`status` tinyint(1) DEFAULT '0' COMMENT '链接状态 0显示 1不显示',
	`blank` tinyint(1) not null default 1 COMMENT '是否新窗口打开(1是 0否)',
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
-- create table if not exists `template_type`(
-- 	`id` int unsigned not null auto_increment primary key COMMENT 'id',
-- 	`name` varchar(255) COMMENT '模板分类名称',
-- 	`pid` int COMMENT '模板父id',
-- 	`path` varchar(255) default 0 COMMENT '路径',
--   	`addtime` int unsigned default null COMMENT '添加时间'
-- )engine=innodb default charset=utf8;


insert into tpl_type values(1,'服装、饰品、个人护理',0,123123123);



--海报图片表
-- create table if not exists `linfei_posters`(
-- 	`id` int unsigned not null auto_increment primary key COMMENT 'id',
-- 	`userid` int unsigned not null COMMENT '用户id',
-- 	`type` varchar(20) COMMENT '页面标识',
-- 	`name` varchar(255) COMMENT '名称',
-- 	`url` varchar(255) COMMENT '链接',
-- 	`pic` varchar(255) COMMENT '图片',
--   	`status` tinyint(1) DEFAULT '0' COMMENT '状态 0显示 1不显示',
--   	`addtime` int unsigned default null COMMENT '添加时间'
-- )engine=innodb default charset=utf8;

demo_linfei_0008
demo_shop_0001


--模板表
-- create table if not exists `templates` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `path` varchar(255) NOT NULL DEFAULT '/Templates/Default/' COMMENT '模板路径',
--   `name` varchar(255) NOT NULL COMMENT '模板名称',
--   `type` tinyint(4) NOT NULL COMMENT '模板类型',
--   `thumb` varchar(255) NOT NULL COMMENT '模板缩略图',
--   `url` varchar(255) DEFAULT NULL,
--   `dir` varchar(100) DEFAULT NULL,
--   -- `width` char(10) NOT NULL DEFAULT '200' COMMENT '缩略图宽',
--   -- `height` char(10) NOT NULL DEFAULT '100' COMMENT '缩略图高',
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


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
	`email` varchar(255) default null,
	`pwdstr` char(50) NOT NULL COMMENT '加密串',
  	`icon` varchar(255) DEFAULT NULL COMMENT '头像',
  	`status` tinyint(1) not null default 0 COMMENT '状态',
  	`group` tinyint(2) not null default 1,
  	`addtime` char(50) not null COMMENT '添加时间'
)engine=innodb default charset=utf8;
INSERT INTO `linfei_admin` VALUES ('1', 'admin', '8e4ee84aaa3815d91f785be23e93791c', '1478240169', '1478240169', '127.0.0.1', '13539993040', 'vzhoufei@qq.com', '827ccb0eea8a706c4c34a16891f84e7b', '/Uploads/2016-12-15/5852374e150af.jpg', '1', '1', '0');

--管理组
create table if not exists `linfei_group`(
`id` int unsigned not null auto_increment primary key COMMENT 'id',
`name` varchar(255) NOT NULL COMMENT '组名',
`permissions` text,
`addtime` int unsigned default null COMMENT '时间'
)engine=innodb default charset=utf8;
INSERT INTO `linfei_group` VALUES (1,'admin','all','');

--会员表






-- create table if not exists `yd_photo`(
-- 	`id` int unsigned not null auto_increment primary key COMMENT 'id',
-- 	`store_id` int not null COMMENT '商户id',
-- 	`title` varchar(255) not null default '' COMMENT '相册标题',
-- 	`status` tinyint(1) not null default 0 COMMENT '是否显示 1是 0否',
-- 	`home` tinyint(1) not null default 0 COMMENT '是否在首页展示 1是 0否',
-- 	`time` int  
-- )engine=innodb default charset=utf8;

-- create table if not exists `yd_photoimg`(
-- 	`id` int unsigned not null auto_increment primary key COMMENT 'id',
-- 	`photoid` int not null COMMENT'相册id',
-- 	`img` varchar(255) COMMENT '相册图片'
-- )engine=innodb default charset=utf8;

