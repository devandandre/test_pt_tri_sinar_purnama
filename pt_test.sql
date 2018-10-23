/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50527
Source Host           : 127.0.0.1:3306
Source Database       : pt_test

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2018-10-23 16:39:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_data_pelaporan
-- ----------------------------
DROP TABLE IF EXISTS `tb_data_pelaporan`;
CREATE TABLE `tb_data_pelaporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `flag_status` int(11) NOT NULL COMMENT '0:Antrian, 1:Belum Selesai, 2 : Selesai',
  `date_request` datetime NOT NULL,
  `date_finished` datetime NOT NULL,
  `user_finished` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_data_pelaporan
-- ----------------------------
INSERT INTO `tb_data_pelaporan` VALUES ('1', 'Lapor PC Rusak', 'PC di gedung G ruang rindu rusak , sepertinya hardwarenya yang rusak , tolong segera dicek ', '2', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2018-10-20 23:10:47', 'karyawan');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) DEFAULT NULL COMMENT '1: Admin, 2: IT Manager, 3: Karyawan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');
INSERT INTO `tb_user` VALUES ('2', 'karyawan', '21232f297a57a5a743894a0e4a801fc3', '3');
INSERT INTO `tb_user` VALUES ('3', 'administrasi', '21232f297a57a5a743894a0e4a801fc3', '2');
