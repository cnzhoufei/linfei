
-- ----------------------------
-- Table structure for linfei_config
-- ----------------------------
DROP TABLE IF EXISTS `linfei_config`;
CREATE TABLE `linfei_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置id',
  `name` varchar(255) NOT NULL DEFAULT '公司名称' COMMENT '公司名称',
  `company` varchar(255) NOT NULL DEFAULT '' COMMENT '公司英文名称',
  `title` varchar(255) NOT NULL DEFAULT '网站主标题' COMMENT '网站主标题',
  `keywords` varchar(255) NOT NULL DEFAULT '站点关键字' COMMENT '站点关键字',
  `description` text COMMENT '站点描述',
  `home` varchar(255) NOT NULL DEFAULT '主页' COMMENT '主页链接名',
  `logo` varchar(255) NOT NULL DEFAULT '/Templates/Default/Public/default.png' COMMENT '网站LOGO',
  `copyright` varchar(255) NOT NULL DEFAULT '版权信息' COMMENT '版权信息',
  `record` varchar(255) NOT NULL DEFAULT '备案信息' COMMENT '备案信息',
  `address` varchar(255) NOT NULL DEFAULT '广州市白云区金沙洲沙凤商业大厦8楼' COMMENT '联系地址',
  `statistics` varchar(255) DEFAULT NULL COMMENT '站长统计',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '站点状态 1开启  0关闭',
  `url` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'url模式(1动态 2伪静态 3静态)',
  `navstyle` tinyint(1) NOT NULL DEFAULT '1',
  `time` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8