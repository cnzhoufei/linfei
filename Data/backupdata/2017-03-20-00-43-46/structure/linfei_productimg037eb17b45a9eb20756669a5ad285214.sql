
-- ----------------------------
-- Table structure for linfei_productimg
-- ----------------------------
DROP TABLE IF EXISTS `linfei_productimg`;
CREATE TABLE `linfei_productimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL COMMENT '产品id',
  `img` varchar(255) NOT NULL DEFAULT '' COMMENT '产品图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8