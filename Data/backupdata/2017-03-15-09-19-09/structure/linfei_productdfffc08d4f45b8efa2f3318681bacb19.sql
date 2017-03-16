
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
  `newtime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `recommended` tinyint(1) DEFAULT '0' COMMENT '推荐  0未推荐 1推荐',
  `new` tinyint(1) DEFAULT '0' COMMENT '新品  0未推荐 1推荐',
  `selling` tinyint(1) DEFAULT '0' COMMENT '热卖  0未推荐 1推荐',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '产品链接',
  `custom` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义名称',
  `time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8