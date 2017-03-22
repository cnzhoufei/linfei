
-- ----------------------------
-- Table structure for linfei_adv
-- ----------------------------
DROP TABLE IF EXISTS `linfei_adv`;
CREATE TABLE `linfei_adv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '广告位id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '广告标题',
  `img` varchar(255) NOT NULL DEFAULT '' COMMENT '轮播图片',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '广告链接',
  `text` text NOT NULL COMMENT '广告文本',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `clicks` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `blank` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否新窗口打开(1是 0否)',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启广告(1是 0否)',
  `other` varchar(255) DEFAULT NULL COMMENT '其他',
  `starttime` int(11) NOT NULL DEFAULT '0' COMMENT '起始时间',
  `endtime` int(11) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8