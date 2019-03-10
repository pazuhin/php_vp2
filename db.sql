/*
 Navicat Premium Data Transfer

 Source Server         : ls_vp2
 Source Server Type    : MySQL
 Source Server Version : 50643
 Source Host           : localhost:3306
 Source Schema         : db

 Target Server Type    : MySQL
 Target Server Version : 50643
 File Encoding         : 65001

 Date: 10/03/2019 11:25:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (29, 39, '1.jpg', '2019-03-10 07:53:55', '2019-03-10 07:53:55');
INSERT INTO `files` VALUES (30, 40, 'cat.jpg', '2019-03-10 07:54:54', '2019-03-10 07:54:54');
INSERT INTO `files` VALUES (31, 41, '1.jpg', '2019-03-10 07:56:38', '2019-03-10 07:56:38');
INSERT INTO `files` VALUES (32, 42, '1.jpg', '2019-03-10 07:59:34', '2019-03-10 07:59:34');
INSERT INTO `files` VALUES (33, 43, '1.jpg', '2019-03-10 08:00:04', '2019-03-10 08:00:04');
INSERT INTO `files` VALUES (34, 44, 'cat.jpg', '2019-03-10 08:00:30', '2019-03-10 08:00:30');
INSERT INTO `files` VALUES (35, 45, '1.jpg', '2019-03-10 08:02:20', '2019-03-10 08:02:20');
INSERT INTO `files` VALUES (36, 39, 'cat.jpg', '2019-03-10 08:03:12', '2019-03-10 08:03:12');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL DEFAULT 18,
  `info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (39, 'Dima', 14, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '1.jpg', '2019-03-10 07:53:55', '2019-03-10 07:53:55');
INSERT INTO `users` VALUES (40, 'Andrey', 19, 'desc', 'b59c67bf196a4758191e42f76670ceba', 'cat.jpg', '2019-03-10 07:54:54', '2019-03-10 07:54:54');
INSERT INTO `users` VALUES (41, 'Andrey', 34, 'qwe', 'b59c67bf196a4758191e42f76670ceba', '1.jpg', '2019-03-10 07:56:38', '2019-03-10 07:56:38');
INSERT INTO `users` VALUES (42, 'Andrey', 23112, '234', 'b59c67bf196a4758191e42f76670ceba', '1.jpg', '2019-03-10 07:59:34', '2019-03-10 07:59:34');
INSERT INTO `users` VALUES (43, 'Andrey(edit)', 0, 'edit', '3d2172418ce305c7d16d4b05597c6a59', '1.jpg', '2019-03-10 08:00:04', '2019-03-10 08:03:58');
INSERT INTO `users` VALUES (44, 'Andrey', 98, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'cat.jpg', '2019-03-10 08:00:30', '2019-03-10 08:00:30');
INSERT INTO `users` VALUES (45, 'Dima', 78, 'test', 'd93591bdf7860e1e4ee2fca799911215', '1.jpg', '2019-03-10 08:02:20', '2019-03-10 08:02:20');

SET FOREIGN_KEY_CHECKS = 1;
