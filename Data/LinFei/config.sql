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

INSERT INTO `linfei_config` VALUES ('1', '林飞网络', 'linfei', '林飞网络', '林飞网络', '林飞网络林飞网络林飞网络林飞网络', '网站首页', '/Uploads/2017-02-13/58a1357e0af57.jpg', '林飞网络', '林飞网络', '林飞网络', 'ssssssssss66', '1', '1', '0', '1487131955');

