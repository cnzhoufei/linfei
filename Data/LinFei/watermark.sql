create table if not exists `linfei_watermark`(
   `id` int unsigned not null auto_increment primary key COMMENT 'id',
   `status1` tinyint(1) not null default 0 COMMENT '是否开启产品水印',
   `status2` tinyint(1) not null default 0 COMMENT '是否开启文章水印',
   `type` tinyint(1) not null default 0 COMMENT '水印类型 0文字  1图片',
   `transparent` char(3) not null default '100' COMMENT '透明度',
   `wenzi` varchar(255) not null default '' COMMENT '文字',
   `tupin` varchar(255) not null default '' COMMENT '图片',
   `location` tinyint(1) not null default 1 COMMENT '水印位置'
   )engine=innodb default charset=utf8;