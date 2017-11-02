CREATE DATABASE hospital;
use hospital;
//用户基本信息表
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `health_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '健康管理好',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别,0为男性，1为女性',
  `age` smallint(5) NOT NULL DEFAULT '0' COMMENT '年龄',
  `work` varchar(30) NOT NULL DEFAULT '' COMMENT '职业',
  `height` smallint(8) NOT NULL DEFAULT '0' COMMENT '身高',
  `weight` smallint(8) NOT NULL DEFAULT '0' COMMENT '体重',
  `pressure` varchar(10) DEFAULT NULL COMMENT '血压',
  `creat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_id` (`health_id`),
  KEY `idx_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
//就诊记录表
DROP TABLE IF EXISTS `record`;
CREATE TABLE `user_info` (
  `health_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '健康管理好',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别,0为男性，1为女性',
  `age` smallint(5) NOT NULL DEFAULT '0' COMMENT '年龄',
  `work` varchar(30) NOT NULL DEFAULT '' COMMENT '职业',
  `height` smallint(8) NOT NULL DEFAULT '0' COMMENT '身高',
  `weight` smallint(8) NOT NULL DEFAULT '0' COMMENT '体重',
  `identify` varchar(30) DEFAULT NULL DEFAULT '' COMMENT '身份证',
  `tel` varchar(15) DEFAULT NULL DEFAULT '' COMMENT '电话',
  `creat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`health_id`),
  KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000001 DEFAULT CHARSET=utf8;
//用户帐号信息
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '健康档案号',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `authKey` varchar(100) NOT NULL DEFAULT '',
  `accessToken` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000001  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `check_record`;
CREATE TABLE `check_record`(
  `health_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '健康管理好',
  `height` smallint(8) NOT NULL DEFAULT 0 COMMENT '身高',
  `weight` smallint(8) NOT NULL DEFAULT 0 COMMENT '体重',
  `waist` smallint(8) NOT NULL DEFAULT 0 COMMENT '腰围',
  `hip`  smallint(8) NOT NULL DEFAULT 0 COMMENT '臀围',
  `diet` varchar(30) NOT NULL DEFAULT 0 COMMENT '饮食',
  `motion` VARCHAR(30) NOT NULL DEFAULT 0 COMMENT '运动',
   `creat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_health_id` (`health_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
