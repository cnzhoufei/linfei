
-- ----------------------------
-- Table structure for linfei_prdoctmodels
-- ----------------------------
DROP TABLE IF EXISTS `linfei_prdoctmodels`;
CREATE TABLE `linfei_prdoctmodels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL COMMENT '表单类型',
  `instructions` varchar(255) DEFAULT NULL COMMENT '中文说明',
  `field` varchar(255) DEFAULT NULL COMMENT '字段名称',
  `value` varchar(255) DEFAULT NULL COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8