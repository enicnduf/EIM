/*
Navicat MySQL Data Transfer

Source Server         : Default
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : eim

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-07-10 00:18:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `eim_ent_assets`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_assets`;
CREATE TABLE `eim_ent_assets` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `type` int(1) NOT NULL,
  `rights` varchar(255) DEFAULT '',
  `rights_num` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT '',
  `space` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '',
  `memo` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE,
  CONSTRAINT `eid` FOREIGN KEY (`eid`) REFERENCES `eim_ent_basic` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_assets
-- ----------------------------
INSERT INTO `eim_ent_assets` VALUES ('1', '1', '0', '许在 ', '', '', '0', '', '');

-- ----------------------------
-- Table structure for `eim_ent_basic`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_basic`;
CREATE TABLE `eim_ent_basic` (
  `eid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `license` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reg_capital` varchar(255) DEFAULT NULL,
  `establish_date` varchar(255) DEFAULT NULL,
  `business_time_limit` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `kind` varchar(255) DEFAULT NULL,
  `major_business` varchar(255) DEFAULT NULL,
  `business_range` varchar(255) DEFAULT NULL,
  `org_num` varchar(255) DEFAULT NULL,
  `national_tax_num` varchar(255) DEFAULT NULL,
  `land_tax_num` varchar(255) DEFAULT NULL,
  `loan_num` varchar(255) DEFAULT NULL,
  `loan_check` varchar(255) DEFAULT NULL,
  `special_license_num` varchar(255) DEFAULT NULL,
  `award_certifications` varchar(255) DEFAULT NULL,
  `space` varchar(255) DEFAULT NULL,
  `space_source` varchar(255) DEFAULT NULL,
  `ppl_num` varchar(255) DEFAULT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  UNIQUE KEY `eit` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_basic
-- ----------------------------
INSERT INTO `eim_ent_basic` VALUES ('1', '测试公司123', '3123', '', '12', '123123', '', '', '123', '1231', '12312', '23123', '', '', '3123', '123123', '123', '', '', null, null, null, null);
INSERT INTO `eim_ent_basic` VALUES ('8', '432134', '', '123421342', '', '', '', '13421', '', '', '', '34', '', '1234', '', '2134', '', '', '', null, null, null, null);
INSERT INTO `eim_ent_basic` VALUES ('9', 'adsfsadfadsf', '', '123421342', '', '', '', '13421', '', '', '', '34', '', '1234', '', '2134', '', '', '', null, null, null, null);
INSERT INTO `eim_ent_basic` VALUES ('13', 'adsfsadfadsfasdf', '', '123421342', '', '', '', '13421', '', '', '', '34', '', '1234', '', '2134', '', '', '', null, null, null, null);
INSERT INTO `eim_ent_basic` VALUES ('17', '这是为什么呢', '', '', '', '', '', '', '周星驰', '', '撒旦发', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_ent_basic` VALUES ('18', '龙门客栈', 'ICAC1234', '酒店', '龙泉县', '213万', '212年', '2013男', '服务业', '私营', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_ent_basic` VALUES ('32', '', '', '', '', '阿什顿飞', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `eim_ent_debt`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_debt`;
CREATE TABLE `eim_ent_debt` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `type` int(2) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `lender` varchar(255) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_debt
-- ----------------------------
INSERT INTO `eim_ent_debt` VALUES ('1', '1', '0', '0000-00-00', '0', '', '0', '');

-- ----------------------------
-- Table structure for `eim_ent_expenses`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_expenses`;
CREATE TABLE `eim_ent_expenses` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `date` int(13) DEFAULT NULL,
  `water` int(15) DEFAULT NULL,
  `electric` int(15) DEFAULT NULL,
  `salary` int(15) DEFAULT NULL,
  `rent` int(15) DEFAULT NULL,
  `tax` int(15) DEFAULT '0',
  `memo` text,
  `dscrptn` text,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_expenses
-- ----------------------------
INSERT INTO `eim_ent_expenses` VALUES ('2', '1', null, '0', '0', '0', '0', '0', '', null);
INSERT INTO `eim_ent_expenses` VALUES ('3', '1', null, '1231232', '0', '0', '0', '0', '', null);

-- ----------------------------
-- Table structure for `eim_ent_focus`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_focus`;
CREATE TABLE `eim_ent_focus` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_focus
-- ----------------------------
INSERT INTO `eim_ent_focus` VALUES ('1', '1', '说的方法神v', '沈大飞阿什顿飞');

-- ----------------------------
-- Table structure for `eim_ent_managers`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_managers`;
CREATE TABLE `eim_ent_managers` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `position` int(3) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `marriage` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mate_name` varchar(255) DEFAULT NULL,
  `mate_birth` varchar(255) DEFAULT NULL,
  `mate_native` varchar(255) DEFAULT NULL,
  `mate_id_card` varchar(255) DEFAULT NULL,
  `mate_address` varchar(255) DEFAULT NULL,
  `mate_contact` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_managers
-- ----------------------------
INSERT INTO `eim_ent_managers` VALUES ('1', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_ent_managers` VALUES ('2', '1', '1', '撒打发色短发', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `eim_ent_production`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_production`;
CREATE TABLE `eim_ent_production` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `date` int(13) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `sales` int(15) DEFAULT NULL,
  `profit` int(15) DEFAULT NULL,
  `stock` int(15) DEFAULT NULL,
  `receivable` int(15) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_production
-- ----------------------------
INSERT INTO `eim_ent_production` VALUES ('11', '1', '0', '0', '0', '0', '0', '0', '');

-- ----------------------------
-- Table structure for `eim_ent_related`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_related`;
CREATE TABLE `eim_ent_related` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_related
-- ----------------------------
INSERT INTO `eim_ent_related` VALUES ('1', '1', 'v许修正粉丝的', '撒旦佛v许从 ', '', '');

-- ----------------------------
-- Table structure for `eim_ent_shareholders`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_shareholders`;
CREATE TABLE `eim_ent_shareholders` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `shares` int(10) DEFAULT NULL,
  `info_1` varchar(255) DEFAULT NULL,
  `info_2` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_shareholders
-- ----------------------------
INSERT INTO `eim_ent_shareholders` VALUES ('1', '1', '0', '阿什顿飞沈大飞', '0', '', '', '');

-- ----------------------------
-- Table structure for `eim_person_assets`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_assets`;
CREATE TABLE `eim_person_assets` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `type` int(1) NOT NULL,
  `rights` varchar(255) DEFAULT '',
  `rights_num` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT '',
  `space` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '',
  `memo` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `eid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_person_assets
-- ----------------------------
INSERT INTO `eim_person_assets` VALUES ('1', '1', '0', '许在 ', '', '', '0', '', '');

-- ----------------------------
-- Table structure for `eim_person_basic`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_basic`;
CREATE TABLE `eim_person_basic` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(3) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `marriage` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mate_name` varchar(255) DEFAULT NULL,
  `mate_birth` varchar(255) DEFAULT NULL,
  `mate_native` varchar(255) DEFAULT NULL,
  `mate_id_card` varchar(255) DEFAULT NULL,
  `mate_address` varchar(255) DEFAULT NULL,
  `mate_contact` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `eid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_person_basic
-- ----------------------------
INSERT INTO `eim_person_basic` VALUES ('1', '0', '123', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('2', '1', '撒打发色短发', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('3', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `eim_person_basic` VALUES ('4', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `eim_person_basic` VALUES ('5', '0', '周星驰', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('6', '0', '黄家琪', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('7', '0', '林嘉欣', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('8', '0', '郑嘉颖', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('9', '0', '测试公司123', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `eim_person_debt`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_debt`;
CREATE TABLE `eim_person_debt` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `type` int(2) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `lender` varchar(255) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_person_debt
-- ----------------------------
INSERT INTO `eim_person_debt` VALUES ('1', '1', '0', '0000-00-00', '0', '', '0', '');

-- ----------------------------
-- Table structure for `eim_person_focus`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_focus`;
CREATE TABLE `eim_person_focus` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_person_focus
-- ----------------------------
INSERT INTO `eim_person_focus` VALUES ('1', '1', '说的方法神v', '沈大飞阿什顿飞');

-- ----------------------------
-- Table structure for `eim_person_related`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_related`;
CREATE TABLE `eim_person_related` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_person_related
-- ----------------------------
INSERT INTO `eim_person_related` VALUES ('1', '1', 'v许修正粉丝的', '撒旦佛v许从 ', '', '');

-- ----------------------------
-- Table structure for `eim_sys_log`
-- ----------------------------
DROP TABLE IF EXISTS `eim_sys_log`;
CREATE TABLE `eim_sys_log` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `action` int(2) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_sys_log
-- ----------------------------

-- ----------------------------
-- Table structure for `eim_sys_users`
-- ----------------------------
DROP TABLE IF EXISTS `eim_sys_users`;
CREATE TABLE `eim_sys_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `role` int(4) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`) USING BTREE,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_sys_users
-- ----------------------------
INSERT INTO `eim_sys_users` VALUES ('1', 'admin', 'f12bRGMbvlxnKDT1762yGOjEAxiN4XocDTtV58nPIBbDl2Q', '管理员', '系统管理员1', '1111', '');
INSERT INTO `eim_sys_users` VALUES ('9', 'newman', '6fe0eh75YmS+g2ubE0zAmewc5ZoX4iJ4RwkSaaR0Bwh8C7g', '', 'admin', '1111', '');
INSERT INTO `eim_sys_users` VALUES ('10', 'tester', 'f12bRGMbvlxnKDT1762yGOjEAxiN4XocDTtV58nPIBbDl2Q', '测试账号', '测试部门', '1000', null);
