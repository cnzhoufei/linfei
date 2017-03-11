
-- ----------------------------
-- Table structure for linfei_watermark
-- ----------------------------
DROP TABLE IF EXISTS `linfei_watermark`;
CREATE TABLE `linfei_watermark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `status1` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否开启产品水印',
  `status2` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否开启文章水印',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '水印类型 0文字  1图片',
  `wenzi` varchar(255) NOT NULL DEFAULT '' COMMENT '文字',
  `tupin` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  `location` tinyint(1) NOT NULL DEFAULT '1' COMMENT '水印位置',
  `transparent` char(3) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8