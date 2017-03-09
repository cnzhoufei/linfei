create table if not exists `linfei_custom`(
`id` int unsigned not null auto_increment primary key,
`key` char(30) not null default '' COMMENT '标识 下标',
`name` varchar(255) not null default '' COMMENT '中文说明',
`val` varchar(1000) not null default '' COMMENT '值',
`time` int unsigned not null COMMENT '时间'
)engine=innodb default charset=utf8;