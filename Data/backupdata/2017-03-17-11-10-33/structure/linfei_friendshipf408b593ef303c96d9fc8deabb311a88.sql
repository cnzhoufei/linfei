
-- ----------------------------
-- Table structure for linfei_friendship
-- ----------------------------
DROP TABLE IF EXISTS `linfei_friendship`;
CREATE TABLE `linfei_friendship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '链接名',
  `url` varchar(255) NOT NULL COMMENT '链接地址',
  `img` varchar(255) DEFAULT NULL COMMENT '链接图片',
  `email` varchar(255) DEFAULT NULL COMMENT '站长邮箱',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '链接状态 0显示 1不显示',
  `blank` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否新窗口打开(1是 0否)',
  `remarks` varchar(255) DEFAULT NULL COMMENT '备注',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8