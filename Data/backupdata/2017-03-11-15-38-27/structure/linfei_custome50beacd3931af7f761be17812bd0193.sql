
-- ----------------------------
-- Table structure for linfei_custom
-- ----------------------------
DROP TABLE IF EXISTS `linfei_custom`;
CREATE TABLE `linfei_custom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` char(30) NOT NULL DEFAULT '' COMMENT '标识 下标',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '中文说明',
  `val` varchar(1000) NOT NULL DEFAULT '' COMMENT '值',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8