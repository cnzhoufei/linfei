/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : linfei

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-03-06 15:58:21
*/
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for linfei_admin
-- ----------------------------
DROP TABLE IF EXISTS `linfei_admin`;
CREATE TABLE `linfei_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `pwd` varchar(255) NOT NULL COMMENT '密码',
  `logintime` char(50) NOT NULL COMMENT '上次登录时间',
  `time` char(50) NOT NULL COMMENT '当前登录时间',
  `loginip` char(20) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwdstr` char(50) NOT NULL COMMENT '加密串',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `group` tinyint(2) NOT NULL DEFAULT '1' COMMENT '管理组id',
  `addtime` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_admin
-- ----------------------------
INSERT INTO `linfei_admin` VALUES ('1', 'admin', '8e4ee84aaa3815d91f785be23e93791c', '1478240169', '1478240169', '127.0.0.1', '13539993040', 'vzhoufei@qq.com', '827ccb0eea8a706c4c34a16891f84e7b', '/Uploads/2016-12-15/5852374e150af.jpg', '1', '1', '0');
INSERT INTO `linfei_admin` VALUES ('4', 'zhoufei', '54f64ff12a4a3c7082fb9c89df29272f', '', '', null, '13539993040', 'vzhoufei@qq.com', '137c1db0fc5c2c246bed819cbd284f89', '/Uploads/2017-03-03/58b934425f945.png', '1', '2', '0');
INSERT INTO `linfei_admin` VALUES ('5', '周飞', '4910a55d36c94a2aea9bc58e70b1538c', '', '', null, '13539993040', 'vzhouei@qq.com', '861d0670624f2ba08a64268e8042b246', '/Uploads/2017-03-03/58b93558538f1.png', '1', '3', '0');
INSERT INTO `linfei_admin` VALUES ('6', 'cnzhoufei', '4d5cdc8e532d14c9a962c9cfe5b2d789', '', '', null, '13539993040s', 'vzhoufei@qq.com', '5ee46002cc67dbdd48c2891ed185b161', '/Uploads/2017-03-03/58b95be0d8e92.png', '1', '1', '1488542691');

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
  `clicks` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `sorting` char(20) NOT NULL DEFAULT '0' COMMENT '排序',
  `other` varchar(255) DEFAULT NULL COMMENT '其他',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启',
  `blank` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否新窗口打开',
  `starttime` int(11) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `endtime` int(11) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_adv
-- ----------------------------
INSERT INTO `linfei_adv` VALUES ('1', '1', '1111', '/Uploads/2017-02-13/58a1b32b745a1.jpg', 'http://www.baidu.com', '', '0', '10', '', '1', '1', '0', '0', null);
INSERT INTO `linfei_adv` VALUES ('4', '2', '文本测试', '/Uploads/thumb/product/13/13_100_75_admin.jpeg', 'http://www.baidu.com', 'ssssssssssssssssssssss', '0', '1', null, '1', '1', '0', '0', null);
INSERT INTO `linfei_adv` VALUES ('6', '1', '广告测试', '/Uploads/2017-02-14/58a25bde754ec.jpg', 'www.baidu.com', '<p><img src=\"/Uploads/image/20170210/1486688861119628.jpg\" title=\"1486688861119628.jpg\" alt=\"20160130045846253.jpg\"/></p>', '0', '3', '这是一个测试广告', '1', '1', '0', '0', null);
INSERT INTO `linfei_adv` VALUES ('7', '2', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '', 'www.baidu.com', '<p><img src=\"/Uploads/image/20170213/1486987638914812.jpg\" title=\"1486987638914812.jpg\" alt=\"网站优化.jpg\"/></p>', '0', '10', '', '1', '1', '1486915200', '1487174400', null);
INSERT INTO `linfei_adv` VALUES ('8', '1', '第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品', '/Uploads/2017-02-13/58a1af42b6471.jpg', 'http://www.baidu.com', '', '0', '2', '图片测试', '1', '1', '1486915200', '1489102800', null);
INSERT INTO `linfei_adv` VALUES ('12', '2', '测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本', '', 'http://www.linfei.cc', '<p>sssssssssssssssssssssssssssssssssss测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本测试多个文本<img src=\"/Uploads/image/20170214/1487036329550462.jpg\" title=\"1487036329550462.jpg\" alt=\"联系我们1.jpg\"/></p>', '0', '100', '', '1', '1', '1487001600', '1487262900', '1487036331');
INSERT INTO `linfei_adv` VALUES ('13', '100', '第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品', '', '', '<p><img src=\"/Uploads/image/20170214/1487037781658687.jpg\" title=\"1487037781658687.jpg\" alt=\"网站优化1.jpg\"/></p><p><br/></p><p><br/></p><p><br/></p><table><tbody><tr class=\"firstRow\"><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">1</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">2</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><span style=\"font-size: 24px;\"></span><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">3</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">4</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">5</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">6</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">7</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">8</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">9</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr><tr><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\" style=\"word-break: break-all;\">10</td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td><td width=\"102\" valign=\"top\"><br/></td></tr></tbody></table><p><br/></p>', '0', '0', '', '1', '1', '1487001600', '1487347200', '1487037805');

-- ----------------------------
-- Table structure for linfei_advlocation
-- ----------------------------
DROP TABLE IF EXISTS `linfei_advlocation`;
CREATE TABLE `linfei_advlocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `width` char(10) NOT NULL DEFAULT '0px' COMMENT '广告宽',
  `height` char(10) NOT NULL DEFAULT '0px' COMMENT '广告高',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '广告类型 1图片 2文本',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_advlocation
-- ----------------------------
INSERT INTO `linfei_advlocation` VALUES ('1', '主页第一个广告', '0px', '0px', '1', '0');
INSERT INTO `linfei_advlocation` VALUES ('2', '主页第一个广告', '0px', '0px', '2', '0');
INSERT INTO `linfei_advlocation` VALUES ('3', '主页第三个广告', '0px', '0px', '2', '0');
INSERT INTO `linfei_advlocation` VALUES ('4', '主页第三个广告', '0px', '0px', '2', '0');
INSERT INTO `linfei_advlocation` VALUES ('5', '主页第5个广告', '0px', '0px', '2', '0');
INSERT INTO `linfei_advlocation` VALUES ('100', '主页第六个广告', '100px', '100px', '2', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_article
-- ----------------------------
INSERT INTO `linfei_article` VALUES ('12', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '26', '/Uploads/2017-02-15/58a3e5ff6e9b7.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488114717', '1', '1', '1', '0', '/Home/gujianwenhua/cs.html', 'cs', '1487078602');
INSERT INTO `linfei_article` VALUES ('13', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109086', '1', '1', '1', '0', '/Home/gujianwenhua/article_13.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('14', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109090', '1', '1', '1', '0', '/Home/gujianwenhua/article_14.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('15', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109095', '1', '1', '1', '0', '/Home/gujianwenhua/article_15.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('16', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109099', '1', '1', '1', '0', '/Home/gujianwenhua/article_16.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('17', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109104', '1', '1', '1', '0', '/Home/gujianwenhua/article_17.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('18', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109110', '1', '1', '1', '0', '/Home/gujianwenhua/article_18.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('19', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109114', '1', '1', '1', '0', '/Home/gujianwenhua/article_19.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('20', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109118', '1', '1', '1', '0', '/Home/gujianwenhua/article_20.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('21', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109123', '1', '1', '1', '0', '/Home/gujianwenhua/article_21.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('22', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-15/58a3e6714fcc3.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109126', '1', '1', '1', '0', '/Home/gujianwenhua/article_22.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('23', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-15/58a3e66257f24.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109131', '1', '1', '1', '0', '/Home/gujianwenhua/article_23.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('24', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109137', '1', '1', '1', '0', '/Home/gujianwenhua/article_24.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('25', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109141', '1', '1', '1', '0', '/Home/gujianwenhua/article_25.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('26', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109145', '1', '1', '1', '0', '/Home/gujianwenhua/article_26.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('27', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '商品相册测试', '', '26', '/Uploads/2017-02-14/58a304bdbfa90.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20170214/1487078601473134.jpg&quot; title=&quot;1487078601473134.jpg&quot; alt=&quot;contact.jpg&quot;/&gt;&lt;/p&gt;', '1488109150', '1', '1', '1', '0', '/Home/gujianwenhua/article_27.html', '', '1487078602');
INSERT INTO `linfei_article` VALUES ('28', '十二年', '十二年', '十二年', '十二年十二年十二年十二年十二年', '26', '/Uploads/2017-03-03/58b9631e9d7ed.png', '0', '1', '&lt;p&gt;&lt;embed type=&quot;application/x-shockwave-flash&quot; class=&quot;edui-faked-music&quot; pluginspage=&quot;http://www.macromedia.com/go/getflashplayer&quot; src=&quot;http://box.baidu.com/widget/flash/bdspacesong.swf?from=tiebasongwidget&amp;url=&amp;name=%E5%8D%81%E4%BA%8C%E5%B9%B4&amp;artist=%E9%82%B1%E6%B0%B8%E4%BC%A0&amp;extra=%E5%8D%81%E4%BA%8C%E5%B9%B4&amp;autoPlay=false&amp;loop=true&quot; width=&quot;400&quot; height=&quot;95&quot; align=&quot;none&quot; wmode=&quot;transparent&quot; play=&quot;true&quot; loop=&quot;false&quot; menu=&quot;false&quot; allowscriptaccess=&quot;never&quot; allowfullscreen=&quot;true&quot;/&gt;&lt;/p&gt;', '1488544599', '0', '0', '0', '0', '/Home/gujianwenhua/article_28.html', '', '1488544544');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_classify
-- ----------------------------
INSERT INTO `linfei_classify` VALUES ('24', '古建案例', '古建案例', '古建案例', '古建案例', '古建案例', '0', 'product', '0_24', '1', null, '10', '1488111667', '1', ' /Home/gujiananli.html', 'gujiananli', '1', '1', '1', 'productlist', 'product', '');
INSERT INTO `linfei_classify` VALUES ('25', '古建工程', '古建工程', '古建工程', '古建工程', '古建工程', '0', 'product', '0_25', '1', null, '10', '1488375455', '1', '/Home/gujiangongcheng.html', 'gujiangongcheng', '1', '1', '1', 'productlist', 'article', 'http://www.baidu.com');
INSERT INTO `linfei_classify` VALUES ('26', '古建文华', '古建文华', '古建文华', '古建文华', '古建文华', '0', 'article', '0_26', '1', null, '10', '1488544699', '1', '/Home/gujianwenhua.html', 'gujianwenhua', '1', '1', '1', 'articlelist', 'product', '');
INSERT INTO `linfei_classify` VALUES ('27', '收费标准', '收费标准', '收费标准', '收费标准', '收费标准', '0', 'cover', '0_27', '1', '<p><img src=\"/Uploads/image/20170301/1488375688106159.jpg\" title=\"1488375688106159.jpg\" alt=\"TB22oGgcmVmpuFjSZFFXXcZApXa_!!1991586799.jpg\"/></p>', '10', '1488375690', '1', '/Home/shoufeibiaozhun66.html', 'shoufeibiaozhun66', '1', '1', '1', 'coverlist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('28', '联系我们', '联系我们', '联系我们', '联系我们', '联系我们', '0', 'cover', '0_28', '1', '<p><img src=\"/Uploads/image/20170226/1488115496772549.jpg\" title=\"1488115496772549.jpg\" alt=\"TB2PqeMbNXlpuFjSsphXXbJOXXa_!!1991586799.jpg\" width=\"1232\" height=\"1229\" style=\"width: 1232px; height: 1229px;\"/></p><span class=\"edui-editor-imagescale-hand1\" style=\"box-sizing: border-box; position: absolute; width: 6px; height: 6px; overflow: hidden; font-size: 0px; display: block; background-color: rgb(60, 157, 208); cursor: n-resize; top: 0px; margin-top: -4px; left: 616px; margin-left: -4px; color: rgb(57, 57, 57); font-family: &quot;Open Sans&quot;;\"></span><span class=\"edui-editor-imagescale-hand2\" style=\"box-sizing: border-box; position: absolute; width: 6px; height: 6px; overflow: hidden; font-size: 0px; display: block; background-color: rgb(60, 157, 208); cursor: ne-resize; top: 0px; margin-top: -4px; left: 1232px; margin-left: -3px; color: rgb(57, 57, 57); font-family: &quot;Open Sans&quot;;\"></span><span class=\"edui-editor-imagescale-hand3\" style=\"box-sizing: border-box; position: absolute; width: 6px; height: 6px; overflow: hidden; font-size: 0px; display: block; background-color: rgb(60, 157, 208); cursor: w-resize; top: 507px; margin-top: -4px; left: 0px; margin-left: -4px; color: rgb(57, 57, 57); font-family: &quot;Open Sans&quot;;\"></span><span class=\"edui-editor-imagescale-hand4\" style=\"box-sizing: border-box; position: absolute; width: 6px; height: 6px; overflow: hidden; font-size: 0px; display: block; background-color: rgb(60, 157, 208); cursor: e-resize; top: 507px; margin-top: -4px; left: 1232px; margin-left: -3px; color: rgb(57, 57, 57); font-family: &quot;Open Sans&quot;;\"></span><span class=\"edui-editor-imagescale-hand5\" style=\"box-sizing: border-box; position: absolute; width: 6px; height: 6px; overflow: hidden; font-size: 0px; display: block; background-color: rgb(60, 157, 208); cursor: sw-resize; top: 1014px; margin-top: -3px; left: 0px; margin-left: -4px; color: rgb(57, 57, 57); font-family: &quot;Open Sans&quot;;\"></span>', '5', '1488115602', '1', ' /Home/lianxiwomen.html', 'lianxiwomen', '1', '1', '1', 'coverlist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('29', '古建案例二级', '古建案例二级', '古建案例二级', '古建案例二级', '古建案例二级', '24', 'product', '0_24_29', '1', null, '0', '1488374330', '2', '/Home/gujiananlierji.html', 'gujiananlierji', '1', '1', '1', 'productlist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('30', '古建案例三级', '古建案例三级', '古建案例三级', '古建案例三级', '古建案例三级', '29', 'product', '0_24_29_30', '1', null, '0', '1488375332', '3', '/Home/gujiananlisanji.html', 'gujiananlisanji', '1', '1', '1', 'productlist', 'config.php', '');
INSERT INTO `linfei_classify` VALUES ('31', '古建文华二级', '古建文华二级', '古建文华二级', '古建文华二级', '古建文华二级', '26', 'article', '0_26_31', '1', null, '0', '1488372437', '2', ' /Home/gujianwenhuaerji.html', 'gujianwenhuaerji', '1', '1', '1', 'articlelist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('32', '古建文华三级', '古建文华三级', '古建文华三级', '古建文华三级', '古建文华三级', '31', 'article', '0_26_31_32', '1', null, '0', '1488375283', '3', '/Home/gujianwenhuasanji.html', 'gujianwenhuasanji', '1', '1', '1', 'articlelist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('33', '供应平台', '供应平台', '供应平台', '供应平台', '供应平台', '24', 'product', '0_24_33', '1', null, '1', '1488375340', '2', '/Home/gongyingpingtai.html', 'gongyingpingtai', '1', '1', '1', 'productlist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('34', '测试url', '测试url', '测试url', '测试url', '测试url', '26', 'article', '0_26_34', '1', '<p>sss</p>', '100', '1488370100', '2', '/Home/ceshiurl.html', 'ceshiurl', '1', '1', '1', 'articlelist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('36', '文件生成测试', '文件生成测试', '文件生成测试sss', '文件生成测试', '文件生成测试', '0', 'product', '0_36', '1', null, '0', '1488372843', '1', '/Home/tests.html', 'tests', '1', '1', '1', 'articlelist', 'article', '');
INSERT INTO `linfei_classify` VALUES ('37', 'test2', 'test2', 'test2', 'test2', 'test2', '0', 'product', '0_37', '1', null, '0', '1488375307', '1', '/Home/test9.html', 'test9', '1', '1', '1', 'articlelist', 'article', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_config
-- ----------------------------
INSERT INTO `linfei_config` VALUES ('1', '洪雅轩古建筑修缮设计', 'Hong Yaxuan (Beijing) International Art Design Firm', '林飞网络', '林飞网络', '林飞网络林飞网络林飞网络林飞网络', '网站首页', '/Uploads/2017-02-13/58a1357e0af57.jpg', '林飞网络', '林飞网络', '林飞网络', 'ssssssssss66', '1', '1', '0', '1487131955');

-- ----------------------------
-- Table structure for linfei_custom
-- ----------------------------
DROP TABLE IF EXISTS `linfei_custom`;
CREATE TABLE `linfei_custom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` char(30) NOT NULL DEFAULT '' COMMENT '标识 下标',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '中文说明',
  `val` varchar(1000) NOT NULL DEFAULT '' COMMENT '值',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_custom
-- ----------------------------
INSERT INTO `linfei_custom` VALUES ('1', 'qq', 'Q Q', '869688800', '123456789');
INSERT INTO `linfei_custom` VALUES ('2', 'm', '手机', '13539993040', '1488543769');
INSERT INTO `linfei_custom` VALUES ('3', 'email', '邮箱', '869688800@qq.com', '1481804027');
INSERT INTO `linfei_custom` VALUES ('4', 'tel', '电话', '400-030-8710 010-84308710', '1487126603');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_friendship
-- ----------------------------
INSERT INTO `linfei_friendship` VALUES ('2', 'admin', 'http://www.baidu.com', '/Uploads/2017-02-14/58a2ffa57ecc6.jpg', 'baidu@baidu.com', '1000', '1', '1', '', '1487077087');

-- ----------------------------
-- Table structure for linfei_group
-- ----------------------------
DROP TABLE IF EXISTS `linfei_group`;
CREATE TABLE `linfei_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '组名',
  `permissions` text,
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_group
-- ----------------------------
INSERT INTO `linfei_group` VALUES ('1', '超级管理组', 'all', '0');
INSERT INTO `linfei_group` VALUES ('2', 'test', 'Config@index,Config@custom,Config@settingurl,Config@email,Config@watermark,Classify@index,Classify@addclassify,Product@index,Product@addproduct,Product@,Article@index,Article@addarticle,Advertising@index,Advertising@adv,Advertising@addadvertising,Pic@index,Pic@addpic,Friendship@index,Friendship@addfriendship,@,@,Templates@pc,Templates@mobile', '1488519419');
INSERT INTO `linfei_group` VALUES ('3', 'test2', 'Config@index,Config@custom,Config@settingurl,Config@email,Config@watermark,Classify@index,Classify@addclassify,Product@index,Product@addproduct,Product@,Article@index,Article@addarticle,User@index,User@addadmin,User@adduser,User@grouplist,Advertising@index,Advertising@adv,Advertising@addadvertising,Pic@index,Pic@addpic,Friendship@index,Friendship@addfriendship,@,@,Templates@pc,Templates@mobile', '1488520091');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_pic
-- ----------------------------
INSERT INTO `linfei_pic` VALUES ('2', '第二个轮播图', 'http://www.baidu.com', '/Uploads/2017-02-14/58a284c961a4d.jpg', '1', '12', '1', '备注', '1487045834');
INSERT INTO `linfei_pic` VALUES ('3', '第一张', 'http://www.baidu.com', '/Uploads/2017-02-14/58a310185e0bf.jpg', '1', '0', '1', '', '1487081501');
INSERT INTO `linfei_pic` VALUES ('4', '第二张', 'http://www.baidu.com', '/Uploads/2017-02-14/58a310318df90.jpg', '1', '0', '1', '备注', '1487081522');
INSERT INTO `linfei_pic` VALUES ('5', '第三涨', 'http://www.baidu.com', '/Uploads/2017-02-14/58a310452c3b0.jpg', '1', '0', '1', '备注', '1487081542');
INSERT INTO `linfei_pic` VALUES ('6', '第四张', 'http://www.baidu.com', '/Uploads/2017-02-14/58a3105a8d612.jpg', '1', '0', '1', '备注', '1487081563');
INSERT INTO `linfei_pic` VALUES ('7', '第五章', 'http://www.baidu.com', '/Uploads/2017-02-14/58a310715d6c7.jpg', '1', '0', '1', '备注', '1487081586');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_product
-- ----------------------------
INSERT INTO `linfei_product` VALUES ('1', '第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品', '第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品第一个测试产品', '第一个测试产品', '第一个测试产品', '25', '/Uploads/2016-12-29/586509206d537.jpg', '0', '1', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161220/1482242446580197.jpg&quot; title=&quot;1482242446580197.jpg&quot; alt=&quot;20160219040238843.jpg&quot;/&gt;&lt;/p&gt;', '1482242451', '1488109057', '3', '1', '1', '/Home/gujiangongcheng/product_1.html', '', '1');
INSERT INTO `linfei_product` VALUES ('2', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品第二个测试产品', '第二个测试产品', '第二个测试产品', '25', '/Uploads/2016-12-27/58626326a263e.jpg', '0', '1', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161226/1482756310205648.jpg&quot; title=&quot;1482756310205648.jpg&quot; alt=&quot;20160130044357770.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161226/1482756440129116.jpg&quot; title=&quot;1482756440129116.jpg&quot; alt=&quot;20160130044902235.jpg&quot;/&gt;&lt;/p&gt;', '1482242533', '1488109064', '4', '1', '1', '/Home/gujiangongcheng/product_2.html', '', '1');
INSERT INTO `linfei_product` VALUES ('3', '第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品', '第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品', '第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品', '第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品第三个产品', '25', '/Uploads/2016-12-28/58631d2a8b0f3.jpg', '0', '1', '', '1482890614', '1488109068', '5', '1', '1', '/Home/gujiangongcheng/product_3.html', '', '1');
INSERT INTO `linfei_product` VALUES ('13', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '6666', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '25', '/Uploads/2017-02-14/58a28ac1cb38e.jpg', '0', '1', '&lt;p&gt;&lt;img src=&quot;/Uploads/image/20161230/1483080229855902.jpg&quot; title=&quot;1483080229855902.jpg&quot; alt=&quot;20160130044902235.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;试试事实上事实上事实上事实上事实上事实上事实上事实上事实上事实上事实上事实上事实上事实上&lt;/p&gt;', '1482890768', '1488109072', '60', '1', '1', '/Home/gujiangongcheng/product_13.html', '', '1');
INSERT INTO `linfei_product` VALUES ('14', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '25', '/Uploads/2016-12-29/5865094bacb21.jpg', '0', '1', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111956281427.jpg&quot; style=&quot;&quot; title=&quot;1488111956281427.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111956162315.jpg&quot; style=&quot;&quot; title=&quot;1488111956162315.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111956634546.jpg&quot; style=&quot;&quot; title=&quot;1488111956634546.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111957998681.jpg&quot; style=&quot;&quot; title=&quot;1488111957998681.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111957940760.jpg&quot; style=&quot;&quot; title=&quot;1488111957940760.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111957133656.jpg&quot; style=&quot;&quot; title=&quot;1488111957133656.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488111957107897.jpg&quot; style=&quot;&quot; title=&quot;1488111957107897.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1482890768', '1488112454', '2', '1', '1', '/Home/gujiangongcheng/product_14.html', '', '1');
INSERT INTO `linfei_product` VALUES ('15', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '关键字', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2016-12-29/586509993dfec.jpg', '0', '1', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378119034.jpg&quot; style=&quot;&quot; title=&quot;1488113378119034.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378927937.jpg&quot; style=&quot;&quot; title=&quot;1488113378927937.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378651070.jpg&quot; style=&quot;&quot; title=&quot;1488113378651070.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378132365.jpg&quot; style=&quot;&quot; title=&quot;1488113378132365.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378122167.jpg&quot; style=&quot;&quot; title=&quot;1488113378122167.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378122089.jpg&quot; style=&quot;&quot; title=&quot;1488113378122089.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378214212.jpg&quot; style=&quot;&quot; title=&quot;1488113378214212.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378955649.jpg&quot; style=&quot;&quot; title=&quot;1488113378955649.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20170226/1488113378476361.jpg&quot; style=&quot;&quot; title=&quot;1488113378476361.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1482890768', '1488113387', '2', '1', '1', '/Home/gujiananli/product_15.html', '', '1');
INSERT INTO `linfei_product` VALUES ('16', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2016-12-29/586505cf81372.jpg', '0', '1', '', '1482890768', '1488109015', '2', '1', '1', '/Home/gujiananli/product_16.html', '', '1');
INSERT INTO `linfei_product` VALUES ('17', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2016-12-29/586509a4799e0.jpg', '0', '1', '&lt;p&gt;2016-12-29&lt;img src=&quot;/Uploads/image/20161229/1482979880113776.jpg&quot; title=&quot;1482979880113776.jpg&quot; alt=&quot;20160130044357770.jpg&quot; width=&quot;1233&quot; height=&quot;612&quot; style=&quot;width: 1233px; height: 612px;&quot;/&gt;&lt;/p&gt;', '1482890768', '1488109020', '2', '1', '1', '/Home/gujiananli/product_17.html', '', '1');
INSERT INTO `linfei_product` VALUES ('18', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2016-12-29/586509afea32b.jpg', '0', '1', '', '1482890768', '1488109024', '2', '1', '1', '/Home/gujiananli/product_18.html', '', '1');
INSERT INTO `linfei_product` VALUES ('19', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2016-12-28/58631e04b1eb2.jpg', '0', '1', '', '1482890768', '1488109029', '2', '1', '1', '/Home/gujiananli/product_19.html', '', '1');
INSERT INTO `linfei_product` VALUES ('20', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2017-02-15/58a3e2a9647ef.jpg', '0', '1', '', '1482890768', '1488109035', '2', '1', '1', '/Home/gujiananli/product_20.html', '', '1');
INSERT INTO `linfei_product` VALUES ('21', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2017-02-15/58a3e3208cf8f.jpg', '0', '1', '', '1482890768', '1488109040', '2', '1', '1', '/Home/gujiananli/product_21.html', '', '1');
INSERT INTO `linfei_product` VALUES ('25', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2017-02-15/58a3e3d787c12.jpg', '0', '1', '', '1482890768', '1488109044', '2', '1', '1', '/Home/gujiananli/product_25.html', '', '1');
INSERT INTO `linfei_product` VALUES ('28', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2017-02-15/58a3e3a0b73f7.jpg', '0', '1', '', '1482890768', '1488109049', '2', '1', '1', '/Home/gujiananli/product_28.html', '', '1');
INSERT INTO `linfei_product` VALUES ('29', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '', '第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品第四个产品', '24', '/Uploads/2017-02-15/58a3e4fb39d23.jpg', '0', '1', '', '1482890768', '1488109053', '2', '1', '1', '/Home/gujiananli/product_29.html', '', '1');

-- ----------------------------
-- Table structure for linfei_productimg
-- ----------------------------
DROP TABLE IF EXISTS `linfei_productimg`;
CREATE TABLE `linfei_productimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL COMMENT '产品id',
  `img` varchar(255) NOT NULL DEFAULT '' COMMENT '产品图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_productimg
-- ----------------------------
INSERT INTO `linfei_productimg` VALUES ('18', '2', '/Uploads/2016-12-26/586111e0152d8.jpg');
INSERT INTO `linfei_productimg` VALUES ('19', '1', '/Uploads/2016-12-27/58626096d0778.jpg');
INSERT INTO `linfei_productimg` VALUES ('20', '1', '/Uploads/2016-12-27/58626096d233f.jpg');
INSERT INTO `linfei_productimg` VALUES ('21', '1', '/Uploads/2016-12-27/58626096d3790.jpg');
INSERT INTO `linfei_productimg` VALUES ('22', '3', '/Uploads/2016-12-28/58631d333f9ee.jpg');
INSERT INTO `linfei_productimg` VALUES ('23', '3', '/Uploads/2016-12-28/58631d33408e2.jpg');
INSERT INTO `linfei_productimg` VALUES ('24', '3', '/Uploads/2016-12-28/58631d3341887.jpg');
INSERT INTO `linfei_productimg` VALUES ('25', '3', '/Uploads/2016-12-28/58631d33433c5.jpg');
INSERT INTO `linfei_productimg` VALUES ('26', '4', '/Uploads/2016-12-28/58631e0cada8b.jpg');
INSERT INTO `linfei_productimg` VALUES ('27', '4', '/Uploads/2016-12-28/58631e0caebc3.jpg');
INSERT INTO `linfei_productimg` VALUES ('28', '4', '/Uploads/2016-12-28/58631e0cafb42.jpg');
INSERT INTO `linfei_productimg` VALUES ('29', '4', '/Uploads/2016-12-28/58631e0cb096d.jpg');
INSERT INTO `linfei_productimg` VALUES ('30', '31', '/Uploads/2016-12-28/5863d0f9b215c.jpg');
INSERT INTO `linfei_productimg` VALUES ('31', '31', '/Uploads/2016-12-28/5863d0f9b3170.jpg');
INSERT INTO `linfei_productimg` VALUES ('32', '31', '/Uploads/2016-12-28/5863d0f9b45f8.jpg');
INSERT INTO `linfei_productimg` VALUES ('36', '7', '/Uploads/2016-12-29/5864f4af46d64.jpg');
INSERT INTO `linfei_productimg` VALUES ('37', '7', '/Uploads/2016-12-29/5864f4af486d9.jpg');
INSERT INTO `linfei_productimg` VALUES ('38', '7', '/Uploads/2016-12-29/5864f4af49f3e.jpg');

-- ----------------------------
-- Table structure for linfei_test
-- ----------------------------
DROP TABLE IF EXISTS `linfei_test`;
CREATE TABLE `linfei_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_test
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of linfei_watermark
-- ----------------------------
INSERT INTO `linfei_watermark` VALUES ('1', '0', '1', '0', '林飞建站系统', '/Uploads/2016-12-27/58622c5cb6c82.gif', '9', '50');




create table if not exists `yd_msg`(
  `id` int unsigned not null auto_increment primary key COMMENT 'id',
  `send` char(50) not null default ''  COMMENT '发送通道',
  `receive` char(50) not null default '' COMMENT '接收通道',
  `msg` text not null COMMENT '消息',
  `nickname1` varchar(255) not null default '' COMMENT '发送通道昵称',
  `nickname2` varchar(255) not null default '' COMMENT '接收通道昵称',
  `addtime` int not null default 0
)engine=InnoDB default charset=utf8;

