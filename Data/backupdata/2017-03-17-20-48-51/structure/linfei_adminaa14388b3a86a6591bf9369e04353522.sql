
-- ----------------------------
-- Table structure for linfei_admin
-- ----------------------------
DROP TABLE IF EXISTS `linfei_admin`;
CREATE TABLE `linfei_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `pwd` varchar(255) NOT NULL COMMENT '密码',
  `logintime` char(50) NOT NULL COMMENT '上次登录时间',
  `time` char(50) NOT NULL COMMENT '当前登录时间',
  `loginip` char(20) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwdstr` char(50) NOT NULL COMMENT '加密串',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `group` tinyint(2) NOT NULL DEFAULT '1',
  `addtime` char(50) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8