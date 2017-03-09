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