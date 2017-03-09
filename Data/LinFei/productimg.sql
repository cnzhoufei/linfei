create table if not exists `linfei_productimg`(
`id` int unsigned not null auto_increment primary key,
`productid` int not null COMMENT '产品id',
`img` varchar(255) not null default '' COMMENT '产品图片'
)engine=innodb default charset=utf8;