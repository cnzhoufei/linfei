
-- ----------------------------
-- Table structure for linfei_pic
-- ----------------------------
DROP TABLE IF EXISTS `linfei_pic`;
CREATE TABLE `linfei_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '轮播图名',
  `url` varchar(255) NOT NULL COMMENT '链接地址',
  `img` varchar(255) NOT NULL COMMENT '图片',
  `blank` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否新窗口打开(1是 0否)',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态(1显示 0不显示)',
  `remarks` varchar(255) DEFAULT NULL COMMENT '备注',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8