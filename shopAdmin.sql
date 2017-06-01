/*
Navicat MySQL Data Transfer

Source Server         : localhost（本机）
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : mhyshop

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-06-01 15:07:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mhy_admin`
-- ----------------------------
DROP TABLE IF EXISTS `mhy_admin`;
CREATE TABLE `mhy_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_permission` varchar(3000) DEFAULT NULL COMMENT '管理权限',
  `admin_name` varchar(20) NOT NULL COMMENT '管理员名称',
  `admin_password` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `admin_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `admin_login_num` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `admin_is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  PRIMARY KEY (`admin_id`),
  KEY `member_id` (`admin_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of mhy_admin
-- ----------------------------
INSERT INTO `mhy_admin` VALUES ('1', 'login|setting|region|payment|mailtemplates|admin|goods_class|brand|goods|recommend|groupbuy|goods_stat|store_grade|store_class|store|member|notice|trade|article_class|article|document|link|navigation|db|consulting|adv|share_link|activity|coupon|coupon_class|clear_cache', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1486951947', '0', '1');
