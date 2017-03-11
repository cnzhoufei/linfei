
-- ----------------------------
-- Table structure for linfei_group
-- ----------------------------
DROP TABLE IF EXISTS `linfei_group`;
CREATE TABLE `linfei_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '组名',
  `permissions` text,
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8