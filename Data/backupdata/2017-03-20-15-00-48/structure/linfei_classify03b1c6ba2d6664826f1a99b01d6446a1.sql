
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
  `external` varchar(100) NOT NULL DEFAULT '' COMMENT '外部链接',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '栏目链接',
  `url_name` char(30) NOT NULL DEFAULT '' COMMENT '栏目url命名 拼音',
  `path` varchar(255) NOT NULL COMMENT '栏目路径',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目状态 1在前端显示 0不显示',
  `m_is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '手机端导航是否显示 1在前端显示 0不显示',
  `top` tinyint(1) NOT NULL DEFAULT '1' COMMENT '顶部导航 1在前端显示 0不显示',
  `bottom` tinyint(1) NOT NULL DEFAULT '1' COMMENT '底部导航 1在前端显示 0不显示',
  `text` text COMMENT '栏目内容',
  `sorting` char(20) NOT NULL DEFAULT '50' COMMENT '排序',
  `layer` char(1) NOT NULL DEFAULT '0' COMMENT '标识栏目层级',
  `tpl` char(30) NOT NULL DEFAULT 'tpl.html' COMMENT '此栏目模板',
  `tpl2` char(30) NOT NULL DEFAULT 'article.html' COMMENT '文章模板',
  `m` char(50) DEFAULT NULL COMMENT '模型表',
  `time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8