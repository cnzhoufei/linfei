
-- ----------------------------
-- Table structure for linfei_classify
-- ----------------------------
DROP TABLE IF EXISTS `linfei_classify`;
CREATE TABLE `linfei_classify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `name` varchar(255) NOT NULL COMMENT '栏目名称',
  `m_name` varchar(255) NOT NULL COMMENT '手机栏目名称',
  `title` varchar(255) NOT NULL DEFAULT '栏目title',
  `keywords` varchar(255) NOT NULL DEFAULT '关键字',
  `description` text NOT NULL COMMENT '栏目描述',
  `pid` char(20) NOT NULL COMMENT '栏目父id',
  `type` char(20) NOT NULL DEFAULT 'product' COMMENT '栏目类型 默认为产品类型 共两种类型 产品和资讯news 封面cover',
  `path` varchar(255) NOT NULL COMMENT '栏目路径',
  `status` tinyint(1) NOT NULL DEFAULT '50' COMMENT '栏目状态 0在前端显示 1不显示',
  `text` text COMMENT '栏目内容',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `time` int(11) NOT NULL COMMENT '添加时间',
  `layer` char(1) NOT NULL DEFAULT '1',
  `url` varchar(100) NOT NULL DEFAULT ' ',
  `url_name` char(30) NOT NULL DEFAULT '',
  `top` tinyint(1) NOT NULL DEFAULT '1' COMMENT '顶部导航 1在前端显示 0不显示',
  `bottom` tinyint(1) NOT NULL DEFAULT '1' COMMENT '底部导航 1在前端显示 0不显示',
  `m_is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '手机端导航是否显示 1在前端显示 0不显示',
  `tpl` char(30) NOT NULL DEFAULT 'tpl.html',
  `tpl2` char(30) NOT NULL DEFAULT 'article.html' COMMENT '文章模板',
  `external` varchar(100) DEFAULT NULL COMMENT '外部链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8