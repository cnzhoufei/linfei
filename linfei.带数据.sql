-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-22 14:04:57
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linfei`
--

-- --------------------------------------------------------

--
-- 表的结构 `linfei_admin`
--

CREATE TABLE `linfei_admin` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `pwd` varchar(255) NOT NULL COMMENT '密码',
  `logintime` char(50) NOT NULL COMMENT '上次登录时间',
  `time` char(50) NOT NULL COMMENT '当前登录时间',
  `loginip` char(20) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwdstr` char(50) NOT NULL COMMENT '加密串',
  `icon` varchar(255) DEFAULT NULL COMMENT AS `头像`
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `linfei_admin`
--

INSERT INTO `linfei_admin` (`id`, `name`, `pwd`, `logintime`, `time`, `loginip`, `tel`, `email`, `pwdstr`, `icon`) VALUES
(1, 'admin', '8e4ee84aaa3815d91f785be23e93791c', '1478240169', '1478240169', '127.0.0.1', '13539993040', 'vzhoufei@qq.com', '827ccb0eea8a706c4c34a16891f84e7b', '/Uploads/2016-12-15/5852374e150af.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `linfei_classify`
--

CREATE TABLE `linfei_classify` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '栏目id',
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
  `sorting` char(20) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `linfei_classify`
--

INSERT INTO `linfei_classify` (`id`, `name`, `m_name`, `title`, `keywords`, `description`, `pid`, `type`, `path`, `status`, `text`, `sorting`, `time`, `layer`, `url`, `url_name`, `top`, `bottom`, `m_is_show`, `external`) VALUES
(1, '第一个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目', '0', 'product', '0_1', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478512250, '1', ' ', '', 1, 1, 1, NULL),
(2, '1二级测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目', '1', 'product', '0_1_2', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478512250, '2', ' ', '', 1, 0, 1, NULL),
(3, '1三级测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目', '2', 'product', '0_1_2_3', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478512250, '3', ' ', '', 1, 1, 1, NULL),
(4, '第二个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目', '0', 'product', '0_4', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2', 1478512250, '1', ' ', '', 1, 1, 1, NULL),
(6, '2三级测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目', '第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目第一个测试栏目', '1', 'product', '0_4_5_6', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478512250, '3', ' ', '', 1, 1, 1, NULL),
(7, '第三个栏目', '第三个栏目', '第三个栏目', '第三个栏目', '第三个栏目', '0', 'product', '0_7', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '3', 1478696988, '1', ' ', '', 1, 1, 1, NULL),
(8, '第三个栏目的二级栏目', '第三个栏目的二级栏目', '第三个栏目的二级栏目', '第三个栏目的二级栏目', '第三个栏目的二级栏目', '7', 'product', '0_7_8', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478609473, '2', ' ', '', 1, 1, 1, NULL),
(9, 'demo_cms_0009', '第三个栏目的二级栏目', '', '', '', '7', 'product', '0_7_9', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478609714, '2', ' ', '', 1, 1, 1, NULL),
(11, '第三', '第三', '第三', '第三', '第三', '0', 'news', '0_7_11', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478610284, '2', ' ', '', 1, 1, 1, NULL),
(12, 'sss', '第三个栏目的二级栏目', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '精细针织', '', '11', 'cover', '0_7_11_12', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478610652, '3', ' ', '', 1, 1, 1, NULL),
(13, 'wzcc', '第三个栏目的二级栏目', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '精细针织', '', '11', 'cover', '0_7_11_13', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="http://www.linfei.com/Uploads//20161109/14786959942325.png" _src="http://www.linfei.com/Uploads//20161109/14786959942325.png"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478696002, '3', ' ', '', 1, 1, 1, NULL),
(15, 'cpgg', 'cpgg', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '精细针织', '', '14', 'product', '0_1_14_15', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478611337, '3', ' ', '', 1, 1, 1, NULL),
(16, '产品展示', '产品展示', '产品展示', '产品展示', '产品展示', '4', 'product', '0_4_16', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478654071, '2', ' ', '', 1, 1, 1, NULL),
(17, '第二个栏目的二级栏目测试', '第二个栏目的二级栏目测试', '第二个栏目的二级栏目测试', '第二个栏目的二级栏目测试', '第二个栏目的二级栏目测试', '4', 'product', '0_4_17', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478655029, '2', ' ', '', 1, 1, 1, NULL),
(18, '来个三级', '来个三级', '来个三级', '来个三级', '来个三级', '17', 'product', '0_4_17_18', 1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1', 1478655067, '3', ' ', '', 1, 1, 1, NULL),
(19, '产品系列', '产品系列', '产品系列', '产品系列', '产品系列', '0', 'product', '0_24', 1, '', '0', 1482239340, '1', '/home/chanpinxilie.html', 'chanpinxilie', 1, 1, 1, 'http://www.baidu.com'),
(20, '手机产品', '手机产品', '手机产品', '手机产品', '手机产品', '0', 'product', '0_24', 1, '<p><img src="/Uploads/image/20161218/1482067257794797.jpg" title="1482067257794797.jpg" alt="banna.jpg"/></p>', '0', 1482151351, '1', '/home/shoujichanpin.html', 'shoujichanpin', 1, 1, 1, NULL),
(21, '文章测试', '文章测试', '文章测试', '文章测试', '文章测试', '0', 'news', '0_21', 1, '', '', 1482057962, '1', '/home/文章测试.html', '文章测试', 1, 1, 1, NULL),
(22, '封面测试', '封面测试', '封面测试封面测试封面测试', '封面测试封面测试封面测试', '封面测试封面测试封面测试封面测试', '0', 'cover', '0_22', 1, NULL, '', 1482060941, '1', '/home/fengmianceshi.html', 'fengmianceshi', 1, 1, 1, NULL),
(23, '封面测试2', '封面测试2', '封面测试2封面测试2', '封面测试2封面测试2', '封面测试2封面测试2封面测试2', '22', 'cover', '0_22_23', 1, NULL, '', 1482060972, '2', '/home/fengmianceshi2.html', 'fengmianceshi2', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `linfei_config`
--

CREATE TABLE `linfei_config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '配置id',
  `name` varchar(255) NOT NULL DEFAULT '公司名称' COMMENT '公司名称',
  `title` varchar(255) NOT NULL DEFAULT '网站主标题' COMMENT '网站主标题',
  `keywords` varchar(255) NOT NULL DEFAULT '站点关键字' COMMENT '站点关键字',
  `description` text COMMENT '站点描述',
  `home` varchar(255) NOT NULL DEFAULT '主页' COMMENT '主页链接名',
  `logo` varchar(255) NOT NULL DEFAULT '/Templates/Default/Public/default.png' COMMENT '网站LOGO',
  `copyright` varchar(255) NOT NULL DEFAULT '版权信息' COMMENT '版权信息',
  `record` varchar(255) NOT NULL DEFAULT '备案信息' COMMENT '备案信息',
  `address` varchar(255) NOT NULL DEFAULT '广州市白云区金沙洲沙凤商业大厦8楼' COMMENT '联系地址',
  `statistics` varchar(255) DEFAULT NULL COMMENT AS `站长统计`,
  `status` tinyint(1) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `linfei_config`
--

INSERT INTO `linfei_config` (`id`, `name`, `title`, `keywords`, `description`, `home`, `logo`, `copyright`, `record`, `address`, `statistics`, `status`, `time`) VALUES
(1, '林飞网络科技有限公司', '林飞网络', '林飞网络', '林飞网络林飞网络林飞网络林飞网络', '首页', '/Uploads/2016-12-15/585236096cc82.png', '林飞网络', '林飞网络', '林飞网络', 'ssssssssss66', 1, 1481782808);

-- --------------------------------------------------------

--
-- 表的结构 `linfei_custom`
--

CREATE TABLE `linfei_custom` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` char(30) NOT NULL DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `linfei_custom`
--

INSERT INTO `linfei_custom` (`id`, `key`, `name`, `val`, `time`) VALUES
(1, 'qq', 'Q Q', '869688800', 123456789),
(2, 'tel', '手机', '13539993040', 1481803816),
(3, 'email', '邮箱', '869688800@qq.com', 1481804027);

-- --------------------------------------------------------

--
-- 表的结构 `linfei_friendship`
--

CREATE TABLE `linfei_friendship` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT '连接名',
  `url` varchar(255) NOT NULL COMMENT '连接地址',
  `logo` varchar(255) DEFAULT NULL COMMENT AS `链接图片`,
  `email` varchar(255) DEFAULT NULL COMMENT AS `站长邮箱`,
  `status` tinyint(1) DEFAULT '0'COMMENT
) ;

-- --------------------------------------------------------

--
-- 表的结构 `linfei_product`
--

CREATE TABLE `linfei_product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '产品id',
  `name` varchar(255) NOT NULL DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `linfei_product`
--

INSERT INTO `linfei_product` (`id`, `name`, `title`, `keywords`, `description`, `cid`, `img`, `clicks`, `status`, `text`, `time`) VALUES
(1, '第一个测试产品', '第一个测试产品', '第一个测试产品', '第一个测试产品', 1, '/Uploads/2016-12-20/585939830a13f.jpg', 0, 1, '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161220/1482242446580197.jpg&quot; title=&quot;1482242446580197.jpg&quot; alt=&quot;20160219040238843.jpg&quot;/&gt;&lt;/p&gt;', 1482242451),
(2, '第二个测试产品', '第二个测试产品', '第二个测试产品', '第二个测试产品', 1, '/Uploads/2016-12-20/585939cc2586e.jpg', 0, 1, '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161220/1482242521967139.jpg&quot; style=&quot;&quot; title=&quot;1482242521967139.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161220/1482242521603176.jpg&quot; style=&quot;&quot; title=&quot;1482242521603176.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161220/1482242521122214.jpg&quot; style=&quot;&quot; title=&quot;1482242521122214.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 1482242533),
(3, '商品相册测试商品相册测试商品相册测试商品相册测试', '商品相册测试商品相册测试商品相册测试商品相册测试', '商品相册测试', '商品相册测试', 1, '/Uploads/2016-12-22/585bd6632cb85.jpg', 0, 1, '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161222/1482413692102837.jpg&quot; title=&quot;1482413692102837.jpg&quot; alt=&quot;20160130013919461.jpg&quot;/&gt;&lt;/p&gt;', 1482413701),
(4, '商品相册测试2商品相册测试2商品相册测试2商品相册测试2商品相册测试2商品相册测试2商品相册测试2', '商品相册测试2商品相册测试2商品相册测试2商品相册测试2商品相册测试2商品相册测试2', '商品相册测试2', '商品相册测试2', 1, '/Uploads/2016-12-22/585bd8de86581.jpg', 0, 1, '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/Uploads/image/20161222/1482414317503945.jpg&quot; title=&quot;1482414317503945.jpg&quot; alt=&quot;20160130045846253.jpg&quot;/&gt;&lt;/p&gt;', 1482414321);

-- --------------------------------------------------------

--
-- 表的结构 `linfei_productimg`
--

CREATE TABLE `linfei_productimg` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL COMMENT '产品id',
  `img` varchar(255) NOT NULL DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `linfei_productimg`
--

INSERT INTO `linfei_productimg` (`id`, `productid`, `img`) VALUES
(1, 4, '/Uploads/2016-12-22/585bd8e8714fe.jpg'),
(2, 4, '/Uploads/2016-12-22/585bd8e872760.jpg'),
(3, 4, '/Uploads/2016-12-22/585bd8e8735d4.jpg'),
(4, 4, '/Uploads/2016-12-22/585bd8e87450e.jpg'),
(5, 4, '/Uploads/2016-12-22/585bd8e875e91.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `linfei_admin`
--
ALTER TABLE `linfei_admin`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `linfei_admin`
--
ALTER TABLE `linfei_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `linfei_classify`
--
ALTER TABLE `linfei_classify`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目id';
--
-- 使用表AUTO_INCREMENT `linfei_config`
--
ALTER TABLE `linfei_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置id';
--
-- 使用表AUTO_INCREMENT `linfei_custom`
--
ALTER TABLE `linfei_custom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `linfei_friendship`
--
ALTER TABLE `linfei_friendship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- 使用表AUTO_INCREMENT `linfei_product`
--
ALTER TABLE `linfei_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '产品id';
--
-- 使用表AUTO_INCREMENT `linfei_productimg`
--
ALTER TABLE `linfei_productimg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
