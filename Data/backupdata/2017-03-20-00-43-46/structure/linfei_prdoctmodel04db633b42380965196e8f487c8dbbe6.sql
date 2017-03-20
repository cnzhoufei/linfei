
-- ----------------------------
-- Table structure for linfei_prdoctmodel
-- ----------------------------
DROP TABLE IF EXISTS `linfei_prdoctmodel`;
CREATE TABLE `linfei_prdoctmodel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL COMMENT '文章产品id',
  `jicai` varchar(255) DEFAULT NULL,
  `peijian` varchar(255) DEFAULT NULL,
  `yanse` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8