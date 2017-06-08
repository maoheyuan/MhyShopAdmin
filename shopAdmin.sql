/*
Navicat MySQL Data Transfer

Source Server         : localhost（本机）
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : mhyshop

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-06-08 16:57:17
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

-- ----------------------------
-- Table structure for `mhy_member`
-- ----------------------------
DROP TABLE IF EXISTS `mhy_member`;
CREATE TABLE `mhy_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `member_name` varchar(50) NOT NULL COMMENT '会员名称',
  `member_truename` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `member_avatar` varchar(50) DEFAULT NULL COMMENT '会员头像',
  `member_sex` tinyint(1) DEFAULT NULL COMMENT '会员性别 1男 2女',
  `member_birthday` date DEFAULT NULL COMMENT '生日',
  `member_passwd` varchar(32) NOT NULL COMMENT '会员密码',
  `member_mobile` varchar(11) DEFAULT '' COMMENT '会员手机号',
  `member_email` varchar(100) NOT NULL COMMENT '会员邮箱',
  `member_qq` varchar(100) DEFAULT NULL COMMENT 'qq',
  `member_time` varchar(10) NOT NULL COMMENT '会员注册时间',
  `member_points` int(11) NOT NULL DEFAULT '0' COMMENT '会员积分',
  `member_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员的开启状态 1为开启 0为关闭',
  `member_areaid` int(11) DEFAULT NULL COMMENT '地区ID',
  `member_cityid` int(11) DEFAULT NULL COMMENT '城市ID',
  `member_provinceid` int(11) DEFAULT NULL COMMENT '省份ID',
  `member_areainfo` varchar(255) DEFAULT NULL COMMENT '地区内容',
  `member_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '会员金额',
  PRIMARY KEY (`member_id`),
  KEY `member_name` (`member_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=353 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of mhy_member
-- ----------------------------
INSERT INTO `mhy_member` VALUES ('127', 'R3aV', 'Jc5hR', 'x2gU1png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2862288@qq.com', '4463474', '1496382391', '0', '1', null, null, null, null, '92.00');
INSERT INTO `mhy_member` VALUES ('128', 'OhDY', 'QFZZg', 'oJV76png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '1712514@qq.com', '2552692', '1496382392', '0', '0', null, null, null, null, '83.00');
INSERT INTO `mhy_member` VALUES ('129', 'NlTQ', 'v0GxS', 'JUqKhpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '7316245@qq.com', '7232415', '1496382392', '0', '0', null, null, null, null, '3.00');
INSERT INTO `mhy_member` VALUES ('130', 'HkKF', 'Gyr3C', 'pEBCypng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '8247721@qq.com', '6678019', '1496382392', '0', '0', null, null, null, null, '93.00');
INSERT INTO `mhy_member` VALUES ('131', '47su', '95I6j', 'GXcQDpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '452513@qq.com', '7146285', '1496382392', '0', '1', null, null, null, null, '71.00');
INSERT INTO `mhy_member` VALUES ('132', 'gjpL', 'vAD3u', 'xG3hTpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '4831022@qq.com', '4099740', '1496382392', '0', '0', null, null, null, null, '76.00');
INSERT INTO `mhy_member` VALUES ('133', 'OD09', 'GNZKh', 'eRH2Xpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '1029661@qq.com', '4215418', '1496382392', '0', '1', null, null, null, null, '21.00');
INSERT INTO `mhy_member` VALUES ('134', 'e7zX', 'mXq6r', 'CTf2Mpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '8093865@qq.com', '5865751', '1496382392', '0', '1', null, null, null, null, '43.00');
INSERT INTO `mhy_member` VALUES ('135', 'kc8M', 'Kwcqy', '3eqZfpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '6910596@qq.com', '1354538', '1496382392', '0', '1', null, null, null, null, '100.00');
INSERT INTO `mhy_member` VALUES ('136', 'Jbvv', 'zn8bg', 'aiQXkpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '4618870@qq.com', '3727855', '1496382392', '0', '1', null, null, null, null, '74.00');
INSERT INTO `mhy_member` VALUES ('137', 'f91h', '3J9qi', '3mzU9png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '8840041@qq.com', '4406786', '1496382392', '0', '0', null, null, null, null, '1.00');
INSERT INTO `mhy_member` VALUES ('138', 'QcCp', 'zecEH', 'os5Aopng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '8879566@qq.com', '5362617', '1496382394', '0', '1', null, null, null, null, '45.00');
INSERT INTO `mhy_member` VALUES ('139', 'upmE', 'rvGsp', 'BxWOBpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '7575791@qq.com', '429959', '1496382395', '0', '1', null, null, null, null, '84.00');
INSERT INTO `mhy_member` VALUES ('140', 'HTsE', 'nYCiW', 'HEKJKpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '5746987@qq.com', '5533462', '1496382395', '0', '0', null, null, null, null, '0.00');
INSERT INTO `mhy_member` VALUES ('141', 'QbdM', 'jgaT2', 'B4cxjpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '1051293@qq.com', '7978652', '1496382395', '0', '1', null, null, null, null, '27.00');
INSERT INTO `mhy_member` VALUES ('142', '5cPT', 'jq46X', 'DB4vMpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '2344952@qq.com', '2249893', '1496382395', '0', '1', null, null, null, null, '69.00');
INSERT INTO `mhy_member` VALUES ('143', 'uRpb', 'OCtvY', 'bi12wpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '8904115@qq.com', '6277322', '1496382395', '0', '0', null, null, null, null, '50.00');
INSERT INTO `mhy_member` VALUES ('144', 'cdjo', '0qz0B', 'ZfDdKpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7203969@qq.com', '4450073', '1496382395', '0', '0', null, null, null, null, '32.00');
INSERT INTO `mhy_member` VALUES ('145', 'brHC', '9ZLUJ', 'cfWTgpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2849036@qq.com', '7954588', '1496382395', '0', '0', null, null, null, null, '36.00');
INSERT INTO `mhy_member` VALUES ('146', 'p2hv', 'LN2K4', 'mCbiRpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '7793873@qq.com', '8111494', '1496382395', '0', '0', null, null, null, null, '33.00');
INSERT INTO `mhy_member` VALUES ('147', '01Mu', 'mtoVs', 'aXEFWpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '5561408@qq.com', '7788438', '1496382395', '0', '1', null, null, null, null, '23.00');
INSERT INTO `mhy_member` VALUES ('148', 'zGxG', 'zEuPf', 'S4yBopng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '3361751@qq.com', '3078944', '1496382395', '0', '0', null, null, null, null, '41.00');
INSERT INTO `mhy_member` VALUES ('149', 'jFB8', 'fVzYz', 'scux7png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '909083@qq.com', '7037124', '1496382407', '0', '0', null, null, null, null, '49.00');
INSERT INTO `mhy_member` VALUES ('150', 'M3SQ', 'KiVtr', 'fVT5Ipng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '3976252@qq.com', '2235005', '1496382408', '0', '1', null, null, null, null, '62.00');
INSERT INTO `mhy_member` VALUES ('151', 'qId2', 'rjBJ5', 'MyipJpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '3139637@qq.com', '988271', '1496382408', '0', '1', null, null, null, null, '85.00');
INSERT INTO `mhy_member` VALUES ('152', 'xO8Y', 'Dcc5R', 'Q4C5Lpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '1251983@qq.com', '4041040', '1496382408', '0', '0', null, null, null, null, '95.00');
INSERT INTO `mhy_member` VALUES ('153', 'VGcT', 'UHpGF', 'gNg4Xpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '7630606@qq.com', '6879235', '1496382408', '0', '1', null, null, null, null, '49.00');
INSERT INTO `mhy_member` VALUES ('154', 'J6oe', '3JLn2', 'YF03Vpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '2620865@qq.com', '1057305', '1496382408', '0', '0', null, null, null, null, '64.00');
INSERT INTO `mhy_member` VALUES ('155', 'Mv1o', 'IBqMe', 'uLYKapng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '7195301@qq.com', '2131473', '1496382408', '0', '1', null, null, null, null, '33.00');
INSERT INTO `mhy_member` VALUES ('156', 'xgFR', 'lSwFF', '99hwapng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '3692268@qq.com', '2791486', '1496382408', '0', '0', null, null, null, null, '49.00');
INSERT INTO `mhy_member` VALUES ('157', '56Aa', 'xaPqI', 'EsEYzpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '1950623@qq.com', '6578043', '1496382408', '0', '1', null, null, null, null, '72.00');
INSERT INTO `mhy_member` VALUES ('158', 'LPbs', 'PwMTG', 'UMVI8png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4711857@qq.com', '1670980', '1496382408', '0', '1', null, null, null, null, '68.00');
INSERT INTO `mhy_member` VALUES ('159', 'eYpX', 'oNd02', '5ZLigpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4649264@qq.com', '8085864', '1496382408', '0', '1', null, null, null, null, '38.00');
INSERT INTO `mhy_member` VALUES ('160', '7elK', 'n5Ryo', 'B4wkWpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '480963@qq.com', '6012944', '1496382408', '0', '1', null, null, null, null, '38.00');
INSERT INTO `mhy_member` VALUES ('161', 'PGOB', '8K1Yi', 'wK8t9png', '2', '2011-02-26', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '2419341@qq.com', '5398523', '1496382408', '0', '0', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('162', 'Q5Es', 'ehMt0', 'cNVyEpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '2897412@qq.com', '8043127', '1496382408', '0', '0', null, null, null, null, '82.00');
INSERT INTO `mhy_member` VALUES ('163', 'rxOq', 'obTa5', '4pCKfpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '2890619@qq.com', '6658307', '1496382408', '0', '1', null, null, null, null, '18.00');
INSERT INTO `mhy_member` VALUES ('164', 'xv5f', 'xEZ11', 'UgsePpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7111933@qq.com', '8602891', '1496382408', '0', '0', null, null, null, null, '42.00');
INSERT INTO `mhy_member` VALUES ('165', 'x8qZ', 'xnA1o', 'UE5Jwpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '4004452@qq.com', '7876103', '1496382408', '0', '0', null, null, null, null, '57.00');
INSERT INTO `mhy_member` VALUES ('166', '2huN', 'lmct9', 'qD9CXpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2523330@qq.com', '3964076', '1496382408', '0', '0', null, null, null, null, '73.00');
INSERT INTO `mhy_member` VALUES ('167', 't9JK', 'aVktP', 'p7Vz4png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '8488786@qq.com', '6461514', '1496382408', '0', '0', null, null, null, null, '40.00');
INSERT INTO `mhy_member` VALUES ('168', 'tXaV', 'NytDC', 'gCZetpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '7092748@qq.com', '4380772', '1496382408', '0', '1', null, null, null, null, '6.00');
INSERT INTO `mhy_member` VALUES ('169', 'qvxS', 'MQDfg', 'JYiHMpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '140988@qq.com', '6775325', '1496382408', '0', '0', null, null, null, null, '30.00');
INSERT INTO `mhy_member` VALUES ('170', 'ahia', 'vFn8Y', 'YFrcYpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '1179147@qq.com', '6618797', '1496382408', '0', '1', null, null, null, null, '67.00');
INSERT INTO `mhy_member` VALUES ('171', 'Lg3J', 'C3ch1', 'wPCZ4png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '7584508@qq.com', '3343905', '1496382408', '0', '0', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('172', 'IxVq', 'RfEbq', 'QqDz0png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '8267203@qq.com', '4221424', '1496382408', '0', '0', null, null, null, null, '9.00');
INSERT INTO `mhy_member` VALUES ('173', 'f8xG', 'WOxeU', '2qnjJpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '1583638@qq.com', '2987803', '1496382408', '0', '1', null, null, null, null, '52.00');
INSERT INTO `mhy_member` VALUES ('174', '5H4E', 'Xm93s', 'ymLMPpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '565374@qq.com', '5646698', '1496382408', '0', '0', null, null, null, null, '27.00');
INSERT INTO `mhy_member` VALUES ('175', 'kDjd', 'Ep8cQ', '8VdWGpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '3352432@qq.com', '2451524', '1496382408', '0', '1', null, null, null, null, '9.00');
INSERT INTO `mhy_member` VALUES ('176', 'Dyjm', 'PIbp8', 'dPDBYpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '6792177@qq.com', '8504717', '1496382408', '0', '1', null, null, null, null, '3.00');
INSERT INTO `mhy_member` VALUES ('177', '4YHs', 'WCvkY', 'O50Zkpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '8694918@qq.com', '2079055', '1496382408', '0', '0', null, null, null, null, '77.00');
INSERT INTO `mhy_member` VALUES ('178', 'GOBI', 'wnzDh', 'ZV41kpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '8796659@qq.com', '4406370', '1496382408', '0', '1', null, null, null, null, '26.00');
INSERT INTO `mhy_member` VALUES ('179', 'beoO', 'SpRJ3', 'a7o2ppng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '4968739@qq.com', '2807967', '1496382408', '0', '0', null, null, null, null, '58.00');
INSERT INTO `mhy_member` VALUES ('180', 'uV2t', 'n9neu', 'q3u8lpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7199744@qq.com', '3735072', '1496382408', '0', '0', null, null, null, null, '38.00');
INSERT INTO `mhy_member` VALUES ('181', 'rdaO', 'wwb1m', 'nGct5png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2849097@qq.com', '1585206', '1496382408', '0', '1', null, null, null, null, '35.00');
INSERT INTO `mhy_member` VALUES ('182', 'lPPE', 'NN0Kh', 'E2qIqpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '2365263@qq.com', '1600267', '1496382408', '0', '0', null, null, null, null, '27.00');
INSERT INTO `mhy_member` VALUES ('183', 'YUCz', '0nwCU', 'rn1yYpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2175149@qq.com', '4923614', '1496382408', '0', '1', null, null, null, null, '17.00');
INSERT INTO `mhy_member` VALUES ('184', 'JYsf', 'FbGTm', 'fQDrHpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '6973201@qq.com', '1535354', '1496382408', '0', '1', null, null, null, null, '52.00');
INSERT INTO `mhy_member` VALUES ('185', 'Yp3u', 'mFnb5', 'xr6ILpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '5779969@qq.com', '7777858', '1496382408', '0', '1', null, null, null, null, '95.00');
INSERT INTO `mhy_member` VALUES ('186', 'i0ly', 'r39VU', 'RHwSYpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '1536476@qq.com', '397756', '1496382408', '0', '0', null, null, null, null, '57.00');
INSERT INTO `mhy_member` VALUES ('187', 'F4LJ', 'pSs1p', 'cdObHpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '39967@qq.com', '7768648', '1496382408', '0', '1', null, null, null, null, '79.00');
INSERT INTO `mhy_member` VALUES ('188', 'FtWO', 's4h0T', 'KQw3Hpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '4288965@qq.com', '4811821', '1496382408', '0', '0', null, null, null, null, '72.00');
INSERT INTO `mhy_member` VALUES ('189', 'uwcC', 'uTU4H', 'giOqVpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '4021499@qq.com', '5540389', '1496382408', '0', '0', null, null, null, null, '31.00');
INSERT INTO `mhy_member` VALUES ('190', 'f0yl', 'x5gYR', '7tlXHpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '1278305@qq.com', '7186165', '1496382408', '0', '0', null, null, null, null, '8.00');
INSERT INTO `mhy_member` VALUES ('191', 'cY4H', 'giZd4', 'NH0lTpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '3709860@qq.com', '4713230', '1496382408', '0', '1', null, null, null, null, '88.00');
INSERT INTO `mhy_member` VALUES ('192', 'lIDb', '7q2HC', 'YmnKepng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '7267547@qq.com', '2957816', '1496382408', '0', '1', null, null, null, null, '88.00');
INSERT INTO `mhy_member` VALUES ('193', 'fdd2', 'WyZwo', 'pOSjJpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '3724570@qq.com', '4250403', '1496382408', '0', '0', null, null, null, null, '60.00');
INSERT INTO `mhy_member` VALUES ('194', 'UC22', '7iCgs', 'QYfbhpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '3860855@qq.com', '1993461', '1496382408', '0', '0', null, null, null, null, '33.00');
INSERT INTO `mhy_member` VALUES ('195', 'SD8b', 'Swtvx', '5vY7upng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '823385@qq.com', '7948794', '1496382408', '0', '0', null, null, null, null, '4.00');
INSERT INTO `mhy_member` VALUES ('196', 'gVPw', '4Mm0Z', 'JiBoopng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '3716816@qq.com', '5305670', '1496382408', '0', '1', null, null, null, null, '49.00');
INSERT INTO `mhy_member` VALUES ('197', 'eFwv', 'ZPyz6', 'Mb6Lipng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '1602502@qq.com', '4230589', '1496382408', '0', '1', null, null, null, null, '18.00');
INSERT INTO `mhy_member` VALUES ('198', 'INsK', 'j9mKz', 'FQRmipng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2802694@qq.com', '689515', '1496382408', '0', '1', null, null, null, null, '22.00');
INSERT INTO `mhy_member` VALUES ('199', 'pbUW', 'fwxSL', '1yk5ipng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '440513@qq.com', '7097128', '1496382408', '0', '0', null, null, null, null, '45.00');
INSERT INTO `mhy_member` VALUES ('200', '7xjf', '6bGYY', 'XVSerpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4014322@qq.com', '1000819', '1496382408', '0', '1', null, null, null, null, '62.00');
INSERT INTO `mhy_member` VALUES ('201', 'QlD1', 'IYqE1', '26ecqpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '7210545@qq.com', '4118330', '1496382408', '0', '1', null, null, null, null, '16.00');
INSERT INTO `mhy_member` VALUES ('202', 'JOqv', 'UqW5S', 'UCeGBpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7726488@qq.com', '7656557', '1496382408', '0', '1', null, null, null, null, '31.00');
INSERT INTO `mhy_member` VALUES ('203', '8iF5', 'SsVKI', 'ezznVpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '707732@qq.com', '8822468', '1496382408', '0', '1', null, null, null, null, '94.00');
INSERT INTO `mhy_member` VALUES ('204', 'cKdZ', 'LQDa1', '4BTo0png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '3044155@qq.com', '220938', '1496382408', '0', '0', null, null, null, null, '58.00');
INSERT INTO `mhy_member` VALUES ('205', 'pTvv', 'esEo5', 'cnuFopng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '1023260@qq.com', '6949530', '1496382408', '0', '0', null, null, null, null, '22.00');
INSERT INTO `mhy_member` VALUES ('206', 'ADpz', '5ME3H', 'xznLSpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '1540535@qq.com', '6105858', '1496382408', '0', '1', null, null, null, null, '62.00');
INSERT INTO `mhy_member` VALUES ('207', '0NqK', 'AJ0Ae', 'r5lZUpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '6695194@qq.com', '3526770', '1496382408', '0', '0', null, null, null, null, '15.00');
INSERT INTO `mhy_member` VALUES ('208', 'xDQq', '77XMQ', 'gEZdYpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7707176@qq.com', '7200676', '1496382408', '0', '1', null, null, null, null, '14.00');
INSERT INTO `mhy_member` VALUES ('209', 'UNEY', '9dRzR', 'kA4rnpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '4232944@qq.com', '1319343', '1496382408', '0', '1', null, null, null, null, '51.00');
INSERT INTO `mhy_member` VALUES ('210', '2khe', 'KnSWi', 'Ih9nhpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '4744759@qq.com', '31493', '1496382408', '0', '0', null, null, null, null, '38.00');
INSERT INTO `mhy_member` VALUES ('211', 'o8ky', 'D5E0i', 'RPXKnpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '5021995@qq.com', '5344450', '1496382408', '0', '1', null, null, null, null, '23.00');
INSERT INTO `mhy_member` VALUES ('212', 'vA49', 'OtEtl', 'jeaEopng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '1175093@qq.com', '6672095', '1496382408', '0', '1', null, null, null, null, '98.00');
INSERT INTO `mhy_member` VALUES ('213', 'TCgK', 'uBkgz', 'TbolPpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '4831638@qq.com', '3023040', '1496382408', '0', '1', null, null, null, null, '15.00');
INSERT INTO `mhy_member` VALUES ('214', 'oayk', 'MardB', 'wDHXdpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '5299469@qq.com', '5133347', '1496382408', '0', '1', null, null, null, null, '8.00');
INSERT INTO `mhy_member` VALUES ('215', 'CO0T', 'Vq1g0', '8D6xQpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '4136288@qq.com', '2607528', '1496382408', '0', '0', null, null, null, null, '73.00');
INSERT INTO `mhy_member` VALUES ('216', 'Jtvc', 'wiWEK', 's7lgLpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '8449865@qq.com', '2902220', '1496382408', '0', '1', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('217', 'jQl5', 'j3Grh', 'AT1IApng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '1460329@qq.com', '4766882', '1496382408', '0', '0', null, null, null, null, '55.00');
INSERT INTO `mhy_member` VALUES ('218', 'hocW', 'LydIT', 'oEwAipng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '1612344@qq.com', '827063', '1496382408', '0', '0', null, null, null, null, '47.00');
INSERT INTO `mhy_member` VALUES ('219', '0Teh', '87yoc', '8wMIXpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '6009221@qq.com', '228820', '1496382408', '0', '1', null, null, null, null, '15.00');
INSERT INTO `mhy_member` VALUES ('220', '6EPp', 'Vsflg', 'lw8bSpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '7875457@qq.com', '8619133', '1496382408', '0', '0', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('221', 'e4zv', '81zv5', 'UiVBlpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '4577996@qq.com', '1543511', '1496382408', '0', '0', null, null, null, null, '9.00');
INSERT INTO `mhy_member` VALUES ('222', 'GbIv', 'oneAs', 'nWj0Apng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4455930@qq.com', '8256980', '1496382408', '0', '1', null, null, null, null, '47.00');
INSERT INTO `mhy_member` VALUES ('223', '2fp2', 'vsDNr', 'LGVikpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '8289028@qq.com', '5962715', '1496382408', '0', '1', null, null, null, null, '30.00');
INSERT INTO `mhy_member` VALUES ('224', 'I0MM', '4bAT1', 'Gv375png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '8186046@qq.com', '8213002', '1496382408', '0', '1', null, null, null, null, '2.00');
INSERT INTO `mhy_member` VALUES ('225', '3Wgk', 'yG1In', 'n560Ppng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7987304@qq.com', '8868174', '1496382408', '0', '1', null, null, null, null, '79.00');
INSERT INTO `mhy_member` VALUES ('226', 'IvzL', 'mZAoy', '4u2h7png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '6755665@qq.com', '5465224', '1496382408', '0', '1', null, null, null, null, '9.00');
INSERT INTO `mhy_member` VALUES ('227', 'Z6b9', 'v5tsY', '5XgvWpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '4287807@qq.com', '1767416', '1496382408', '0', '0', null, null, null, null, '23.00');
INSERT INTO `mhy_member` VALUES ('228', 'jVCw', 'swRyD', 'iVRt9png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4102025@qq.com', '8605199', '1496382408', '0', '0', null, null, null, null, '93.00');
INSERT INTO `mhy_member` VALUES ('229', 'qYm1', 'Ne8JU', 'Yq0SUpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '4629788@qq.com', '1799147', '1496382408', '0', '0', null, null, null, null, '68.00');
INSERT INTO `mhy_member` VALUES ('230', 'Bp5q', 'f902i', 'NsxBopng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '277232@qq.com', '6777982', '1496382408', '0', '1', null, null, null, null, '72.00');
INSERT INTO `mhy_member` VALUES ('231', 'rYyd', 'bAUTx', 'WUKIHpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '354223@qq.com', '8898979', '1496382408', '0', '1', null, null, null, null, '10.00');
INSERT INTO `mhy_member` VALUES ('232', '3dLk', 'v0xqU', 'siybWpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '745677@qq.com', '7410268', '1496382408', '0', '0', null, null, null, null, '30.00');
INSERT INTO `mhy_member` VALUES ('233', 'LfCY', 'mxA6G', 'MvNObpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '577295@qq.com', '6350578', '1496382408', '0', '1', null, null, null, null, '53.00');
INSERT INTO `mhy_member` VALUES ('234', 'quT3', 'PZt9L', 'hibIbpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '8529251@qq.com', '5781102', '1496382408', '0', '0', null, null, null, null, '75.00');
INSERT INTO `mhy_member` VALUES ('235', 'a8Vf', 'TcNVp', 'q1nf6png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '2467664@qq.com', '6648648', '1496382408', '0', '0', null, null, null, null, '16.00');
INSERT INTO `mhy_member` VALUES ('236', 'Qllp', 'ES8Be', '0Jb1gpng', '2', '2011-07-23', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '7940008@qq.com', '3261720', '1496382408', '0', '1', null, null, null, null, '44.00');
INSERT INTO `mhy_member` VALUES ('237', 'Dofs', 'e9EmH', 'HqaU3png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7392084@qq.com', '5335899', '1496382408', '0', '1', null, null, null, null, '12.00');
INSERT INTO `mhy_member` VALUES ('238', '2x5J', 'r2fBl', 'PY5n2png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '2798223@qq.com', '6647372', '1496382408', '0', '1', null, null, null, null, '72.00');
INSERT INTO `mhy_member` VALUES ('239', 'Nc9N', 's7E0F', 'LlIsXpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '2373509@qq.com', '3102326', '1496382408', '0', '1', null, null, null, null, '100.00');
INSERT INTO `mhy_member` VALUES ('240', 'sYjq', 'f0D4z', 'J8fqzpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4103598@qq.com', '5735064', '1496382408', '0', '1', null, null, null, null, '15.00');
INSERT INTO `mhy_member` VALUES ('241', 'uFTT', 'TZCFu', 'I1Dzvpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '6152980@qq.com', '5743754', '1496382408', '0', '1', null, null, null, null, '47.00');
INSERT INTO `mhy_member` VALUES ('242', 'fKiK', 'Jb9XR', 'uxewKpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4740014@qq.com', '3075709', '1496382408', '0', '0', null, null, null, null, '91.00');
INSERT INTO `mhy_member` VALUES ('243', 'QJXY', '1z2ba', '45K2Cpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '8313541@qq.com', '8081439', '1496382408', '0', '0', null, null, null, null, '21.00');
INSERT INTO `mhy_member` VALUES ('244', 's1fS', '163Wk', 'uRxYTpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7532536@qq.com', '5296922', '1496382408', '0', '0', null, null, null, null, '96.00');
INSERT INTO `mhy_member` VALUES ('245', 'h4Az', 'wm4Cf', 'qfh9Ipng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '4619159@qq.com', '8340576', '1496382408', '0', '1', null, null, null, null, '24.00');
INSERT INTO `mhy_member` VALUES ('246', 'zfCu', 'EjHEt', 'kZcAHpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '5719559@qq.com', '962334', '1496382408', '0', '1', null, null, null, null, '79.00');
INSERT INTO `mhy_member` VALUES ('247', 'g9X8', 'rSGTp', 'FLppOpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7368917@qq.com', '2778634', '1496382408', '0', '0', null, null, null, null, '47.00');
INSERT INTO `mhy_member` VALUES ('248', '8qtj', 'dXvjp', 'a42m2png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '4219285@qq.com', '1608355', '1496382408', '0', '1', null, null, null, null, '7.00');
INSERT INTO `mhy_member` VALUES ('249', '6NNi', 'I6AmQ', 'UcwyUpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '6014107@qq.com', '4801787', '1496382408', '0', '1', null, null, null, null, '36.00');
INSERT INTO `mhy_member` VALUES ('250', 'CoFF', 'e9USh', 'nswDBpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '4081160@qq.com', '6124807', '1496382409', '0', '1', null, null, null, null, '84.00');
INSERT INTO `mhy_member` VALUES ('251', 'jwCQ', 'RV5p4', 'Jaoyupng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '8226505@qq.com', '6571915', '1496382410', '0', '0', null, null, null, null, '91.00');
INSERT INTO `mhy_member` VALUES ('252', 'FGLg', 'lpvrA', 'bPPD0png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '5451358@qq.com', '8848560', '1496382410', '0', '0', null, null, null, null, '29.00');
INSERT INTO `mhy_member` VALUES ('253', 'b9jf', 'u7GEr', 'HZLpNpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '2192655@qq.com', '2555094', '1496382410', '0', '1', null, null, null, null, '74.00');
INSERT INTO `mhy_member` VALUES ('254', '956c', 'UdbsY', 'Sc8qIpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '46826@qq.com', '480938', '1496382410', '0', '0', null, null, null, null, '12.00');
INSERT INTO `mhy_member` VALUES ('255', 'lIFX', 'QmQy7', 'vfN3Zpng', '2', '2011-01-13', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '4224694@qq.com', '3213986', '1496382410', '0', '1', null, null, null, null, '56.00');
INSERT INTO `mhy_member` VALUES ('256', 'Gg5R', 'WNAO0', 'WE4fnpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '1816678@qq.com', '2487448', '1496382410', '0', '0', null, null, null, null, '18.00');
INSERT INTO `mhy_member` VALUES ('257', 'bUj8', 'v6lyU', '2qzKVpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '1141354@qq.com', '6632161', '1496382410', '0', '0', null, null, null, null, '92.00');
INSERT INTO `mhy_member` VALUES ('258', 'wtXM', 'DgAHC', 'rXNkMpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '5603723@qq.com', '8799306', '1496382410', '0', '1', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('259', '34Um', 'HTTBk', 'k0R5kpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '8718168@qq.com', '7560698', '1496382410', '0', '1', null, null, null, null, '74.00');
INSERT INTO `mhy_member` VALUES ('260', 'MtQ2', 'lYZht', 'MsGTNpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '8668215@qq.com', '6229831', '1496382410', '0', '0', null, null, null, null, '29.00');
INSERT INTO `mhy_member` VALUES ('261', 'lK8r', 'ccJXz', 'y5binpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '3020978@qq.com', '8719888', '1496382410', '0', '0', null, null, null, null, '0.00');
INSERT INTO `mhy_member` VALUES ('262', 'AmcN', 'GbF1M', 'ZBcyspng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '5678483@qq.com', '2938143', '1496382410', '0', '1', null, null, null, null, '41.00');
INSERT INTO `mhy_member` VALUES ('263', 'f6FU', 'F5NMp', 'KESaspng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '2421141@qq.com', '6249979', '1496382410', '0', '0', null, null, null, null, '57.00');
INSERT INTO `mhy_member` VALUES ('264', 'fvTR', 'Xd0Qg', 'FTn7rpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '2050539@qq.com', '5977688', '1496382410', '0', '0', null, null, null, null, '24.00');
INSERT INTO `mhy_member` VALUES ('265', 'RoGX', 'LEhqW', 'tqKd1png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '2812652@qq.com', '2339468', '1496382410', '0', '0', null, null, null, null, '11.00');
INSERT INTO `mhy_member` VALUES ('266', 'Io63', 'FibyN', '7oZjOpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '293743@qq.com', '5312258', '1496382410', '0', '0', null, null, null, null, '3.00');
INSERT INTO `mhy_member` VALUES ('267', '8ljL', '67qYE', 'b9QG3png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '2123588@qq.com', '5851819', '1496382410', '0', '1', null, null, null, null, '63.00');
INSERT INTO `mhy_member` VALUES ('268', 'xzcg', 'BGRno', 'aaaYhpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '5307043@qq.com', '3001714', '1496382410', '0', '1', null, null, null, null, '49.00');
INSERT INTO `mhy_member` VALUES ('269', 'WY4A', 'UTlLl', 'G0Hkdpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '1792265@qq.com', '66527', '1496382410', '0', '1', null, null, null, null, '22.00');
INSERT INTO `mhy_member` VALUES ('270', 'lwnV', 'CYEWc', 'KgODVpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '4228480@qq.com', '6309271', '1496382410', '0', '1', null, null, null, null, '76.00');
INSERT INTO `mhy_member` VALUES ('271', 'N8BF', 'eLk4W', 'scmqWpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '3025078@qq.com', '6831230', '1496382410', '0', '0', null, null, null, null, '93.00');
INSERT INTO `mhy_member` VALUES ('272', 'ebVY', 'TDMDF', 'zDeAupng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '4609019@qq.com', '5282564', '1496382410', '0', '1', null, null, null, null, '80.00');
INSERT INTO `mhy_member` VALUES ('273', 'MG7Y', 'e1Bxe', 'TKO5hpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '3069783@qq.com', '6782970', '1496382410', '0', '0', null, null, null, null, '1.00');
INSERT INTO `mhy_member` VALUES ('274', 'nPi2', '6lxLK', 'pZNzapng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '7395053@qq.com', '1389163', '1496382410', '0', '1', null, null, null, null, '42.00');
INSERT INTO `mhy_member` VALUES ('275', 'I14a', '4n1gI', 'EQpMNpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '301005@qq.com', '8308790', '1496382410', '0', '1', null, null, null, null, '91.00');
INSERT INTO `mhy_member` VALUES ('276', 'ssuZ', 'adLZO', 'Zf6Ugpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '2571822@qq.com', '6340179', '1496382410', '0', '1', null, null, null, null, '51.00');
INSERT INTO `mhy_member` VALUES ('277', 'tKf8', 'wg8aE', 'RaDkXpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '4736089@qq.com', '5141213', '1496382410', '0', '0', null, null, null, null, '28.00');
INSERT INTO `mhy_member` VALUES ('278', '4r9S', 'Ldosa', 'JMbZzpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '1288213@qq.com', '3783601', '1496382410', '0', '1', null, null, null, null, '62.00');
INSERT INTO `mhy_member` VALUES ('279', '9Djm', 'It3Rx', '9wGP6png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '3123518@qq.com', '3187041', '1496382410', '0', '1', null, null, null, null, '37.00');
INSERT INTO `mhy_member` VALUES ('280', 'vThp', '7wAVm', 'WpohOpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '5344156@qq.com', '5173263', '1496382410', '0', '1', null, null, null, null, '11.00');
INSERT INTO `mhy_member` VALUES ('281', '8Bk4', 'WZymi', 'YXriupng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '8226422@qq.com', '4657188', '1496382410', '0', '0', null, null, null, null, '20.00');
INSERT INTO `mhy_member` VALUES ('282', 'A6W4', 'HZENj', 'gIZjppng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '5499428@qq.com', '1912171', '1496382410', '0', '0', null, null, null, null, '12.00');
INSERT INTO `mhy_member` VALUES ('283', 'HDa1', 'EB0qv', 'S4shJpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '5329470@qq.com', '6890863', '1496382410', '0', '1', null, null, null, null, '94.00');
INSERT INTO `mhy_member` VALUES ('284', '89fJ', 'WWk16', '76zrHpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '3368708@qq.com', '1606428', '1496382410', '0', '0', null, null, null, null, '42.00');
INSERT INTO `mhy_member` VALUES ('285', 'uYan', 'fFo68', 'Qxqsvpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '3216999@qq.com', '5583249', '1496382410', '0', '0', null, null, null, null, '94.00');
INSERT INTO `mhy_member` VALUES ('286', '8knv', 'G2NLI', 'y2ll1png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '818163@qq.com', '6601874', '1496382410', '0', '1', null, null, null, null, '72.00');
INSERT INTO `mhy_member` VALUES ('287', 'MW7I', '9Y02X', 'j4aVtpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '5132946@qq.com', '5982521', '1496382410', '0', '1', null, null, null, null, '21.00');
INSERT INTO `mhy_member` VALUES ('288', 'miQt', 'tRCQk', 'PRY8Cpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '8235420@qq.com', '119736', '1496382410', '0', '1', null, null, null, null, '89.00');
INSERT INTO `mhy_member` VALUES ('289', 'Eig7', 'Ab6aJ', 'Ybqfgpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '2732077@qq.com', '1934722', '1496382410', '0', '1', null, null, null, null, '79.00');
INSERT INTO `mhy_member` VALUES ('290', 'oPoE', '1LtCv', '6qexnpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '778136@qq.com', '207701', '1496382410', '0', '0', null, null, null, null, '43.00');
INSERT INTO `mhy_member` VALUES ('291', 'ftId', 'Hoabf', 'Enxp2png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '5061594@qq.com', '3669442', '1496382410', '0', '1', null, null, null, null, '48.00');
INSERT INTO `mhy_member` VALUES ('292', 'Fw6u', 'f0tMM', 'eEy9mpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '4683917@qq.com', '2844926', '1496382410', '0', '1', null, null, null, null, '50.00');
INSERT INTO `mhy_member` VALUES ('293', '4Fic', '0yqez', 'd9wylpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '3436884@qq.com', '5934553', '1496382410', '0', '1', null, null, null, null, '63.00');
INSERT INTO `mhy_member` VALUES ('294', 'dDdZ', 'x2fYs', 'CXawqpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '5713220@qq.com', '3428080', '1496382410', '0', '0', null, null, null, null, '85.00');
INSERT INTO `mhy_member` VALUES ('295', 'qrQv', '8OqGS', 'hXrQwpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '4705068@qq.com', '5139009', '1496382410', '0', '1', null, null, null, null, '63.00');
INSERT INTO `mhy_member` VALUES ('296', 'Gqsv', 'q0aNq', 'hLGLFpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '919691@qq.com', '1578735', '1496382410', '0', '0', null, null, null, null, '60.00');
INSERT INTO `mhy_member` VALUES ('297', 'ZnkA', 'xjNZC', 'EdE4Spng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '2681086@qq.com', '7722617', '1496382410', '0', '1', null, null, null, null, '69.00');
INSERT INTO `mhy_member` VALUES ('298', 'RVsN', 'Ih3k6', 'WUh2wpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7871102@qq.com', '4310252', '1496382410', '0', '0', null, null, null, null, '8.00');
INSERT INTO `mhy_member` VALUES ('299', '2rcL', 'JdySo', 'h9emWpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '8500175@qq.com', '2401894', '1496382410', '0', '1', null, null, null, null, '30.00');
INSERT INTO `mhy_member` VALUES ('300', 'C5pu', 'yOQIJ', 'uS0Iqpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7564452@qq.com', '5511986', '1496382410', '0', '0', null, null, null, null, '4.00');
INSERT INTO `mhy_member` VALUES ('301', 'xCJC', 'tdnrC', 'MOsIVpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '5986099@qq.com', '2224000', '1496382410', '0', '0', null, null, null, null, '86.00');
INSERT INTO `mhy_member` VALUES ('302', '8CaC', '6paM3', '8Hwfzpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '8188385@qq.com', '8754923', '1496382410', '0', '1', null, null, null, null, '18.00');
INSERT INTO `mhy_member` VALUES ('303', 'CR3g', '6SICy', 'NJpz6png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '7727239@qq.com', '3698103', '1496382410', '0', '1', null, null, null, null, '8.00');
INSERT INTO `mhy_member` VALUES ('304', '2guN', 'BC9b5', 'yD9nIpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '5577816@qq.com', '2028196', '1496382410', '0', '1', null, null, null, null, '0.00');
INSERT INTO `mhy_member` VALUES ('305', 'lSEk', '3rCS4', 'MEvNDpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '7190376@qq.com', '5842654', '1496382410', '0', '1', null, null, null, null, '18.00');
INSERT INTO `mhy_member` VALUES ('306', '7sLg', 'Lk9vv', 'K4njupng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '3527232@qq.com', '7828203', '1496382410', '0', '1', null, null, null, null, '30.00');
INSERT INTO `mhy_member` VALUES ('307', '7dcd', '4Fpxo', '6gSfEpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '5926372@qq.com', '6285043', '1496382410', '0', '1', null, null, null, null, '72.00');
INSERT INTO `mhy_member` VALUES ('308', 'xUWd', '8Qgzp', 'c5HUypng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '4795816@qq.com', '3511371', '1496382410', '0', '1', null, null, null, null, '34.00');
INSERT INTO `mhy_member` VALUES ('309', 'J7P9', 'jbxvj', 'Ut3bYpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '956535@qq.com', '2036710', '1496382410', '0', '0', null, null, null, null, '63.00');
INSERT INTO `mhy_member` VALUES ('310', '5Lny', 'z4oBU', '4Fay9png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '3377982@qq.com', '4780368', '1496382410', '0', '0', null, null, null, null, '10.00');
INSERT INTO `mhy_member` VALUES ('311', '0LyO', 'dHrCU', 'jkbo4png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '8976352@qq.com', '5187456', '1496382410', '0', '0', null, null, null, null, '67.00');
INSERT INTO `mhy_member` VALUES ('312', '72ui', 'j43a2', 'LMc0qpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7957060@qq.com', '6029217', '1496382410', '0', '1', null, null, null, null, '17.00');
INSERT INTO `mhy_member` VALUES ('313', 'tz4C', 'x3SAm', 'CFFmGpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '4247229@qq.com', '2893264', '1496382410', '0', '1', null, null, null, null, '64.00');
INSERT INTO `mhy_member` VALUES ('314', 'vY7Z', 'aVg1v', 'gWIlPpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '8335034@qq.com', '2325405', '1496382410', '0', '0', null, null, null, null, '68.00');
INSERT INTO `mhy_member` VALUES ('315', 'yHuj', 'pSamu', 'nOYrspng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '6763275@qq.com', '5183206', '1496382410', '0', '1', null, null, null, null, '99.00');
INSERT INTO `mhy_member` VALUES ('316', 'ZNG8', 'vlNhB', 'NqyPxpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '418355@qq.com', '2190333', '1496382410', '0', '1', null, null, null, null, '89.00');
INSERT INTO `mhy_member` VALUES ('317', 'wFlJ', 'RvDu7', 'IHS6Zpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '3008193@qq.com', '7287389', '1496382410', '0', '0', null, null, null, null, '97.00');
INSERT INTO `mhy_member` VALUES ('318', '3Yvw', 'IX0r1', 'RPbXRpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '5793829@qq.com', '8049806', '1496382410', '0', '0', null, null, null, null, '11.00');
INSERT INTO `mhy_member` VALUES ('319', 'CygV', 'cbN22', 'hbNurpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '592629@qq.com', '8895750', '1496382410', '0', '0', null, null, null, null, '14.00');
INSERT INTO `mhy_member` VALUES ('320', 'wsN2', 'arisF', 'Fhosapng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '3321421@qq.com', '1564535', '1496382410', '0', '0', null, null, null, null, '56.00');
INSERT INTO `mhy_member` VALUES ('321', 'gJAY', 'BEwdi', 'JpQazpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '6043047@qq.com', '6819984', '1496382410', '0', '0', null, null, null, null, '68.00');
INSERT INTO `mhy_member` VALUES ('322', 'NCmO', 'smriZ', 'VIO6npng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '7502600@qq.com', '5173675', '1496382410', '0', '1', null, null, null, null, '29.00');
INSERT INTO `mhy_member` VALUES ('323', 'hZtD', 'rZBmq', 'aOczgpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '2985704@qq.com', '7182075', '1496382410', '0', '0', null, null, null, null, '80.00');
INSERT INTO `mhy_member` VALUES ('324', 'LZ0I', 'ieA2t', 'jxd1Xpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '8997347@qq.com', '8250380', '1496382410', '0', '0', null, null, null, null, '10.00');
INSERT INTO `mhy_member` VALUES ('325', 'scJe', '1PI3t', 'kY4Zbpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '3208906@qq.com', '5728597', '1496382410', '0', '0', null, null, null, null, '27.00');
INSERT INTO `mhy_member` VALUES ('326', 'jL3g', 'F4Yrx', 'EPe47png', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203586', '5140293@qq.com', '3797184', '1496382410', '0', '0', null, null, null, null, '14.00');
INSERT INTO `mhy_member` VALUES ('327', '1IdA', 'gOUgv', 'zUZhcpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '5339501@qq.com', '6411856', '1496382410', '0', '0', null, null, null, null, '5.00');
INSERT INTO `mhy_member` VALUES ('328', 'Of3A', 'QfRlM', 'a1yuopng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '7070244@qq.com', '3837222', '1496382410', '0', '1', null, null, null, null, '38.00');
INSERT INTO `mhy_member` VALUES ('329', 'Gj9S', 'dYOaJ', 'tlOpOpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '2354443@qq.com', '7281896', '1496382410', '0', '0', null, null, null, null, '21.00');
INSERT INTO `mhy_member` VALUES ('330', 'wpIQ', 'MczfL', '7vNcxpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '4401757@qq.com', '2758392', '1496382410', '0', '1', null, null, null, null, '8.00');
INSERT INTO `mhy_member` VALUES ('331', 'G3vX', 'ANPCf', 'Ys8Yypng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '8250513@qq.com', '6006314', '1496382410', '0', '1', null, null, null, null, '63.00');
INSERT INTO `mhy_member` VALUES ('332', 'D5Jl', 'UEyDo', 'PLvKkpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '2134658@qq.com', '6121319', '1496382410', '0', '0', null, null, null, null, '94.00');
INSERT INTO `mhy_member` VALUES ('333', 'yZXH', '87IbO', 'sejnOpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '2728566@qq.com', '1255844', '1496382410', '0', '1', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('334', 'LaKe', 'Tuz4S', 'enDcApng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '8021839@qq.com', '4784319', '1496382410', '0', '0', null, null, null, null, '1.00');
INSERT INTO `mhy_member` VALUES ('335', 'XHzT', 'YIXFj', 'WVtcmpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '7485915@qq.com', '6242567', '1496382410', '0', '1', null, null, null, null, '18.00');
INSERT INTO `mhy_member` VALUES ('336', 'hc24', 'I4cI0', 'IZar2png', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '970281@qq.com', '24056', '1496382410', '0', '1', null, null, null, null, '42.00');
INSERT INTO `mhy_member` VALUES ('337', 'WQ6A', 'ovGJ4', 'ytrNepng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '2705312@qq.com', '5402557', '1496382410', '0', '1', null, null, null, null, '26.00');
INSERT INTO `mhy_member` VALUES ('338', 'cw5Y', 'vREHg', 'jLK6vpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203587', '8869628@qq.com', '351130', '1496382410', '0', '0', null, null, null, null, '44.00');
INSERT INTO `mhy_member` VALUES ('339', 'xvTe', 'L8TiO', '7eEfBpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '3784426@qq.com', '1311888', '1496382410', '0', '0', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('340', 'lEUO', 'HLTw7', 'oa3Bdpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203584', '7719225@qq.com', '6268605', '1496382410', '0', '1', null, null, null, null, '48.00');
INSERT INTO `mhy_member` VALUES ('341', 'Sgqt', '9QCkk', 'pP70mpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203589', '824552@qq.com', '126866', '1496382410', '0', '0', null, null, null, null, '90.00');
INSERT INTO `mhy_member` VALUES ('342', 'QlwM', 'dsWcM', '7kTNcpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203585', '500310@qq.com', '5888153', '1496382410', '0', '0', null, null, null, null, '74.00');
INSERT INTO `mhy_member` VALUES ('343', 'BLVo', 'UJqcf', 'cqJWdpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203588', '2136357@qq.com', '8989130', '1496382410', '0', '0', null, null, null, null, '24.00');
INSERT INTO `mhy_member` VALUES ('344', 'AQ0Z', 'hAKfX', 'ejXcApng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203580', '5761050@qq.com', '1907062', '1496382410', '0', '0', null, null, null, null, '14.00');
INSERT INTO `mhy_member` VALUES ('345', '9T9W', 'k43ry', '5ZAcmpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '8231042@qq.com', '6398053', '1496382410', '0', '1', null, null, null, null, '23.00');
INSERT INTO `mhy_member` VALUES ('346', 'LAym', 'Yx8hh', 'BPbjppng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203583', '1562003@qq.com', '614347', '1496382410', '0', '0', null, null, null, null, '16.00');
INSERT INTO `mhy_member` VALUES ('347', 'trNP', 'DBZds', '6lSvhpng', '1', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203582', '3671743@qq.com', '2391499', '1496382410', '0', '0', null, null, null, null, '13.00');
INSERT INTO `mhy_member` VALUES ('348', 'gceO', '3SAVK', 'EtuWvpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '2507196@qq.com', '7388239', '1496382410', '0', '0', null, null, null, null, '27.00');
INSERT INTO `mhy_member` VALUES ('349', 'A28l', 'Fza8E', 'u12Rvpng', '2', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', '13548203581', '4119494@qq.com', '7070331', '1496382410', '0', '1', null, null, null, null, '64.00');
