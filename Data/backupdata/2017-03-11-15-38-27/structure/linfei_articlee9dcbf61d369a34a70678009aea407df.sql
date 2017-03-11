
-- ----------------------------
-- Table structure for linfei_article
-- ----------------------------
DROP TABLE IF EXISTS `linfei_article`;
CREATE TABLE `linfei_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '文章名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text NOT NULL COMMENT '文章描述',
  `cid` int(10) unsigned NOT NULL COMMENT '所属栏目',
  `img` text NOT NULL COMMENT '文章缩略图',
  `clicks` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章状态 0在前端显示 1不显示',
  `text` text NOT NULL COMMENT '文章内容',
  `newtime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `recommended` tinyint(1) DEFAULT '0' COMMENT '推荐  0未推荐 1推荐',
  `recommendeds` tinyint(1) DEFAULT '0' COMMENT '特荐  0未推荐 1推荐',
  `headlines` tinyint(1) DEFAULT '0' COMMENT '头条  0未推荐 1推荐',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '文章链接',
  `custom` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义名称',
  `time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65522 DEFAULT CHARSET=utf8