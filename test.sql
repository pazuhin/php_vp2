/*
 Navicat Premium Data Transfer

 Source Server         : ls_vp2
 Source Server Type    : MySQL
 Source Server Version : 50643
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50643
 File Encoding         : 65001

 Date: 08/03/2019 10:29:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES (3, 13, '1.jpg');
INSERT INTO `photos` VALUES (5, 15, '1.jpg');
INSERT INTO `photos` VALUES (8, 14, 'cat.jpg');
INSERT INTO `photos` VALUES (9, 16, 'cat.jpg');
INSERT INTO `photos` VALUES (10, 16, '1.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `age` int(30) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (13, 'Andy', 14, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '1.jpg');
INSERT INTO `users` VALUES (14, 'Dima', 22, 'text', 'd93591bdf7860e1e4ee2fca799911215', '1.jpg');
INSERT INTO `users` VALUES (15, 'Masha', 34, 'test', '01cfcd4f6b8770febfb40cb906715822', '1.jpg');
INSERT INTO `users` VALUES (16, 'Yulia', 28, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'cat.jpg');

SET FOREIGN_KEY_CHECKS = 1;
