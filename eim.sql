/*
Navicat MySQL Data Transfer

Source Server         : Default
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : eim

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-07-14 23:59:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `eim_docx`
-- ----------------------------
DROP TABLE IF EXISTS `eim_docx`;
CREATE TABLE `eim_docx` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) NOT NULL,
  `time` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_docx
-- ----------------------------
INSERT INTO `eim_docx` VALUES ('61', '撒打发色短发.docx', '1405350794');
INSERT INTO `eim_docx` VALUES ('62', '123.docx', '1405350797');
INSERT INTO `eim_docx` VALUES ('63', '周星驰.docx', '1405350799');
INSERT INTO `eim_docx` VALUES ('64', '黄家琪.docx', '1405350802');
INSERT INTO `eim_docx` VALUES ('65', '黄家琪.docx', '1405350829');

-- ----------------------------
-- Table structure for `eim_ent_assets`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_assets`;
CREATE TABLE `eim_ent_assets` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rights` varchar(255) DEFAULT '',
  `rights_num` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT '',
  `space` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '',
  `memo` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE,
  CONSTRAINT `eid` FOREIGN KEY (`eid`) REFERENCES `eim_ent_basic` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_assets
-- ----------------------------
INSERT INTO `eim_ent_assets` VALUES ('1', '1', '', '0', '许在 ', '', '', '0', '', '');
INSERT INTO `eim_ent_assets` VALUES ('2', '33', '不动产', '股东产撒旦发卡v看没', '撒旦发教科书疯狂了 ', '卡夫卡冷风机揭开了', '非抵抗力风刀霜剑咖啡店数据库雷', '0', '对数据库里几颗看了', '等封口费揭开了');
INSERT INTO `eim_ent_assets` VALUES ('3', '33', '动产', '非教科书打飞机考虑放大镜看了风纪扣了', '揭开了揭开了揭开了', '陈想那么洗面奶超小美女', ' 蛮舒服美女范德萨', '0', '买多少放卖弄对方什么， ', '');

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
  `establish` varchar(255) DEFAULT NULL,
  `business_limit` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `kind` varchar(255) DEFAULT NULL,
  `major_business` varchar(255) DEFAULT NULL,
  `business_range` varchar(255) DEFAULT NULL,
  `org_num` varchar(255) DEFAULT NULL,
  `national_tax` varchar(255) DEFAULT NULL,
  `land_tax` varchar(255) DEFAULT NULL,
  `loan` varchar(255) DEFAULT NULL,
  `loan_check` varchar(255) DEFAULT NULL,
  `sln` varchar(255) DEFAULT NULL,
  `award_certifications` varchar(255) DEFAULT NULL,
  `space` varchar(255) DEFAULT NULL,
  `space_source` varchar(255) DEFAULT NULL,
  `ppl_num` varchar(255) DEFAULT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  UNIQUE KEY `eit` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

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
INSERT INTO `eim_ent_basic` VALUES ('33', '惠州市金钟家禽发展有限公司', '441302000005354', '三农企业', '惠州市惠城区汝湖镇', '800万元', '2005年2月3日', '2022年9月16日', '畜牧业', '私营企业', '养殖、销售鸡苗、肉鸡', '养殖、销售鸡苗、肉鸡', '743651445-1', '1223455667', '1234556678', '44130202055930417980', '1233452346', '123412361341', '获得“惠州市农业产业化龙头企业”、“拥军先进单位”、“惠州市标准养殖示范区”', '1000平方米', '租赁', '60', '鸡场');

-- ----------------------------
-- Table structure for `eim_ent_debt`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_debt`;
CREATE TABLE `eim_ent_debt` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `lender` varchar(255) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_debt
-- ----------------------------
INSERT INTO `eim_ent_debt` VALUES ('1', '1', '0', '0000-00-00', '0', '', '0', '');
INSERT INTO `eim_ent_debt` VALUES ('2', '33', '其委托他', '0000-00-00', '0', '企鹅王人员', '0', '蝴蝶飞过');
INSERT INTO `eim_ent_debt` VALUES ('3', '33', '兴致勃勃成本', '0000-00-00', '0', '周星驰v许则从v', '0', ' 在许昌现场');
INSERT INTO `eim_ent_debt` VALUES ('4', '33', '', '2015-10-22', '0', 'ads飞', '0', 'ads飞 ');

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
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_expenses
-- ----------------------------
INSERT INTO `eim_ent_expenses` VALUES ('2', '1', null, '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('3', '1', null, '1231232', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('4', '33', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('5', '33', '2', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('6', '33', '3', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('7', '33', '4', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('8', '33', '5', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_expenses` VALUES ('9', '33', '6', '0', '0', '0', '0', '0', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_focus
-- ----------------------------
INSERT INTO `eim_ent_focus` VALUES ('1', '1', '说的方法神v', '沈大飞阿什顿飞');
INSERT INTO `eim_ent_focus` VALUES ('2', '33', '撒打发色短发', 'ads飞撒旦发');
INSERT INTO `eim_ent_focus` VALUES ('3', '33', '撒旦发撒旦发', '阿什顿费撒旦发');
INSERT INTO `eim_ent_focus` VALUES ('4', '33', '请问ads', '');

-- ----------------------------
-- Table structure for `eim_ent_managers`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_managers`;
CREATE TABLE `eim_ent_managers` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned NOT NULL,
  `position` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `marriage` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `mbirth` varchar(255) DEFAULT NULL,
  `mnative` varchar(255) DEFAULT NULL,
  `mid` varchar(255) DEFAULT NULL,
  `maddress` varchar(255) DEFAULT NULL,
  `mcontact` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_managers
-- ----------------------------
INSERT INTO `eim_ent_managers` VALUES ('1', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_ent_managers` VALUES ('2', '1', '1', '撒打发色短发', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_ent_managers` VALUES ('3', '33', '0', '苏耀辉', '1966年7月', '玩你老大', '44295012196607092212', '已婚', '你想住到哪里去', '18274920192', '啥啥啥', '那啥那啥那啥', '醒了没', '玩吧', '您么可能', 'sdk将功能', 'sdk房间');
INSERT INTO `eim_ent_managers` VALUES ('4', '33', '1', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '', '', '');
INSERT INTO `eim_ent_managers` VALUES ('5', '33', '法人', '玩你老大', '玩你老大', '玩你老大', '玩你老大', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_ent_managers` VALUES ('6', '33', '总经理', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '苏耀辉', '', '', '', '', '', '', '', '', '');

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
  `receiv` int(15) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_production
-- ----------------------------
INSERT INTO `eim_ent_production` VALUES ('11', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('12', '1', '123', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('13', '33', '2', '7085286', '6357519', '72776690', '12331235', '12345', '这只是测试数据');
INSERT INTO `eim_ent_production` VALUES ('15', '33', '3', '89057784', '5673738', '64365532', '1234124', '4212', '另一条测试数据');
INSERT INTO `eim_ent_production` VALUES ('16', '33', '4', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('17', '33', '5', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('18', '33', '6', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('19', '33', '7', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('20', '33', '8', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('21', '33', '9', '0', '0', '0', '0', '0', '');
INSERT INTO `eim_ent_production` VALUES ('22', '33', '10', '0', '0', '0', '0', '0', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_related
-- ----------------------------
INSERT INTO `eim_ent_related` VALUES ('1', '1', 'v许修正粉丝的', '撒旦佛v许从 ', '', '');
INSERT INTO `eim_ent_related` VALUES ('2', '33', '这是一个小米', '对抗', '神看门狗', '到哪关');
INSERT INTO `eim_ent_related` VALUES ('3', '33', '迟点不是', '迟点不是', '秩序', '阿斯顿辅导费');
INSERT INTO `eim_ent_related` VALUES ('4', '33', '吃饱饭', '各位', '邱伟忠', '并v抄袭');

-- ----------------------------
-- Table structure for `eim_ent_shareholders`
-- ----------------------------
DROP TABLE IF EXISTS `eim_ent_shareholders`;
CREATE TABLE `eim_ent_shareholders` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `shares` varchar(255) DEFAULT NULL,
  `info_1` varchar(255) DEFAULT NULL,
  `info_2` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_ent_shareholders
-- ----------------------------
INSERT INTO `eim_ent_shareholders` VALUES ('1', '1', '0', '阿什顿飞沈大飞', '0', '', '', '');
INSERT INTO `eim_ent_shareholders` VALUES ('2', '33', '完了米', '大口大口', '23%', '这是啥', '佛vmv', '打开');

-- ----------------------------
-- Table structure for `eim_person_assets`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_assets`;
CREATE TABLE `eim_person_assets` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
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
INSERT INTO `eim_person_assets` VALUES ('1', '1', null, '0', '许在 ', '', '', '0', '', '');

-- ----------------------------
-- Table structure for `eim_person_basic`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_basic`;
CREATE TABLE `eim_person_basic` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `marriage` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `mbirth` varchar(255) DEFAULT NULL,
  `mnative` varchar(255) DEFAULT NULL,
  `mid` varchar(255) DEFAULT NULL,
  `maddress` varchar(255) DEFAULT NULL,
  `mcontact` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `eid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_person_basic
-- ----------------------------
INSERT INTO `eim_person_basic` VALUES ('1', '123', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('2', '撒打发色短发', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('3', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `eim_person_basic` VALUES ('4', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `eim_person_basic` VALUES ('5', '周星驰', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('6', '黄家琪', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('7', '林嘉欣', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('8', '郑嘉颖', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `eim_person_basic` VALUES ('9', '测试公司123', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `eim_person_debt`
-- ----------------------------
DROP TABLE IF EXISTS `eim_person_debt`;
CREATE TABLE `eim_person_debt` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `type` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eim_sys_users
-- ----------------------------
INSERT INTO `eim_sys_users` VALUES ('1', 'admin', 'f12bRGMbvlxnKDT1762yGOjEAxiN4XocDTtV58nPIBbDl2Q', '管理员', '系统管理员1', '1221', '');
