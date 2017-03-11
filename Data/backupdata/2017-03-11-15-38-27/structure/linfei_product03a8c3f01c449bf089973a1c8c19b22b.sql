
-- ----------------------------
-- Table structure for linfei_product
-- ----------------------------
DROP TABLE IF EXISTS `linfei_product`;
CREATE TABLE `linfei_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '产品名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '产品标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text NOT NULL COMMENT '产品描述',
  `cid` int(10) unsigned NOT NULL COMMENT '所属栏目',
  `img` text NOT NULL COMMENT '产品缩略图',
  `clicks` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '产品状态 0在前端显示 1不显示',
  `text` text NOT NULL COMMENT '产品内容',
  `time` int(11) NOT NULL COMMENT '添加时间',
  `newtime` int(11) NOT NULL DEFAULT '0',
  `sorting` char(20) NOT NULL DEFAULT '0',
  `recommended` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL COMMENT '产品链接',
  `custom` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义名称',
  `selling` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8