/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80011
Source Host           : localhost:3306
Source Database       : reservas

Target Server Type    : MYSQL
Target Server Version : 80011
File Encoding         : 65001

Date: 2018-08-02 18:41:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for reservas
-- ----------------------------
DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`usuario_id`  int(11) UNSIGNED NOT NULL ,
`sala_id`  int(11) UNSIGNED NOT NULL ,
`data_inicio`  datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP ,
`data_fim`  datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP ,
`created_at`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`),
FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `usuario_id` (`usuario_id`) USING BTREE ,
INDEX `sala_id` (`sala_id`) USING BTREE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of reservas
-- ----------------------------
BEGIN;
INSERT INTO `reservas` VALUES ('1', '1', '1', '2018-08-02 18:38:01', '2018-08-03 18:38:05', '2018-08-02 18:38:52');
COMMIT;

-- ----------------------------
-- Table structure for salas
-- ----------------------------
DROP TABLE IF EXISTS `salas`;
CREATE TABLE `salas` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`descricao`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`created_at`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of salas
-- ----------------------------
BEGIN;
INSERT INTO `salas` VALUES ('1', 'sala de reunião 1', '2018-08-02 18:39:26');
COMMIT;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`nome_exibicao`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`login`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`senha`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`created_at`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('1', 'LENON MAUER', 'lenon', '202cb962ac59075b964b07152d234b70', '2018-08-02 18:29:15');
COMMIT;

-- ----------------------------
-- Auto increment value for usuarios
-- ----------------------------
ALTER TABLE `usuarios` AUTO_INCREMENT=2;
SET FOREIGN_KEY_CHECKS=1;
