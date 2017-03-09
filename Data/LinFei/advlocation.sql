create table if not exists `linfei_advlocation`(
`id` int unsigned not null auto_increment primary key,
`name` varchar(255) not null default '' COMMENT '广告位名称',
`width` char(10) not null default '0px' COMMENT '广告宽',
`height` char(10) not null default '0px' COMMENT '广告高',
`type` tinyint(1) not null default 1 COMMENT '广告类型 1图片 2文本',
`addtime` int not null default 0 COMMENT '添加时间'
)engine=innodb default charset=utf8;