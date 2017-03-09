create table if not exists `linfei_adv`(
`id` int unsigned not null auto_increment primary key,
`pid` int not null default 0 COMMENT '广告位id',
`title` varchar(255) not null default '' COMMENT '广告标题',
`img` varchar(255) not null default '' COMMENT '轮播图片',
`url` varchar(255) not null default '' COMMENT '广告链接',
`text` text not null default '' COMMENT '广告文本',
`sorting` char(20) not null default '0' COMMENT '排序',
`clicks` int not null default 0 COMMENT '浏览量',
`blank` tinyint(1) not null default 1 COMMENT '是否新窗口打开(1是 0否)',
`status` tinyint(1) not null default 1 COMMENT '是否开启广告(1是 0否)',
`other` varchar(255) COMMENT '其他',
`starttime` int not null default 0 COMMENT '起始时间',
`endtime` int not null default 0 COMMENT '结束时间',
`addtime` int COMMENT '添加时间'
)engine=innodb default charset=utf8;