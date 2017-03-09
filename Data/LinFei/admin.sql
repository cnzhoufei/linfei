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