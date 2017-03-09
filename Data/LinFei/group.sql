create table if not exists `linfei_group`(
`id` int unsigned not null auto_increment primary key COMMENT 'id',
`name` varchar(255) NOT NULL COMMENT '组名',
`permissions` text,
`addtime` int unsigned default null COMMENT '时间'
)engine=innodb default charset=utf8;
INSERT INTO `linfei_group` VALUES (1,'admin','all','');