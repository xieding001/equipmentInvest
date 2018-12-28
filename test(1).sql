/*
Navicat MySQL Data Transfer

Source Server         : guanyu
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-12-28 16:14:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for idcard
-- ----------------------------
DROP TABLE IF EXISTS `idcard`;
CREATE TABLE `idcard` (
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `wxid` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of idcard
-- ----------------------------
INSERT INTO `idcard` VALUES ('1', '1', '3', '1', '1', '1', '1', null, null, null);
INSERT INTO `idcard` VALUES ('2', '2', '2', '2', '2', '2', '2', null, null, null);
INSERT INTO `idcard` VALUES ('3', '3', '3', '3', '3', '3', '3', null, null, null);
INSERT INTO `idcard` VALUES ('4', '4', '4', '4', '4', '4', '4', null, null, null);
INSERT INTO `idcard` VALUES ('123', '123', '123', '123', '123', '123', '123', '123', '123', '123');

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `enterprise` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '企业名称',
  `ent_code` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '纳税人识别号',
  `equipment` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '设备名称',
  `withtax` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '含税价（元）',
  `notax` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '不含税价（元）',
  `invoice_num` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `inv_num` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '发票号码（报关号）',
  `invdate` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `authentic` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `create_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES ('1', 'asdasd', 'asd', 'asdasd', 'sad', 'asdas', 'asdas', 'asdas', 'asdasdasd', 'asdasd', 'sadas', '', '2018-12-28', '', '2018-12-28', '', null, '');
INSERT INTO `invoice` VALUES ('6', '溧阳索尔维稀土新材料有限公司', '91320481720591451B', '油量传感器、马达等', '3500', '3012.83', '3200162130', '17389840', '43211', '溧阳市溧城叉车配件经营部', '是', '', null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('4', '溧阳索尔维稀土新材料有限公司', '91320481720591451B', '机封、泵轴等', '7700', '6598.28', '3200162130', '20316083', '43210', '溧阳市振兴工业泵厂', '是', '', null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('2', '溧阳索尔维稀土新材料有限公司', '91320481720591451B', '蝶阀', '18500', '15872', '3100174130', '43134187', '43209', '上海仙锋自动化设备有限公司', '是', '', null, null, null, null, null, null);
INSERT INTO `invoice` VALUES ('1', '溧阳索尔维稀土新材料有限公司', '91320481720591451B', '纸板桶', '76800', '65668.38', '3200172130', '18851903', '43209', '句容市润越制桶厂', '是', '', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for sys_config
-- ----------------------------
DROP TABLE IF EXISTS `sys_config`;
CREATE TABLE `sys_config` (
  `variable` varchar(128) NOT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`variable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_config
-- ----------------------------

-- ----------------------------
-- Table structure for upload
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of upload
-- ----------------------------
INSERT INTO `upload` VALUES ('aDSAD', 'imgimgCR-1LTDShokMB.jpg');
INSERT INTO `upload` VALUES ('werq', 'imgimgCR-kBkYiT38rv.jpg');
INSERT INTO `upload` VALUES ('1231', 'imgimgCR-BvFeoRoDOe.jpg');
INSERT INTO `upload` VALUES ('23', 'imgimgCR-5NCzWTqMKX.jpg');
INSERT INTO `upload` VALUES ('32342', 'imgimgCR-A8f9MlQR6o.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '2');

-- ----------------------------
-- Table structure for z_test_importexcel
-- ----------------------------
DROP TABLE IF EXISTS `z_test_importexcel`;
CREATE TABLE `z_test_importexcel` (
  `duty_date` datetime DEFAULT NULL,
  `name_am` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `name_pm` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`name_pm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of z_test_importexcel
-- ----------------------------
INSERT INTO `z_test_importexcel` VALUES ('2013-08-01 00:00:00', '张三', '李四');
INSERT INTO `z_test_importexcel` VALUES ('2013-08-02 00:00:00', '王伟', '赵春');
INSERT INTO `z_test_importexcel` VALUES ('2013-08-03 00:00:00', '李慧', '王涛');
INSERT INTO `z_test_importexcel` VALUES ('2013-08-03 00:00:00', '四', '沙发');
