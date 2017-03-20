
-- ----------------------------
-- Table structure for linfei_advlocation
-- ----------------------------
DROP TABLE IF EXISTS `linfei_advlocation`;
CREATE TABLE `linfei_advlocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `width` char(10) DEFAULT '0px' COMMENT '广告宽',
  `height` char(10) DEFAULT '0px' COMMENT '广告高',
  `type` tinyint(1) DEFAULT '1' COMMENT '广告类型 1图片 2文本',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8