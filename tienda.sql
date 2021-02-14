/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : tienda

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 13/02/2021 20:17:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `identificacion` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `celular` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`identificacion`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('Jose', 'Altamirano', '1104435362', 'jose@g.com', '3116843679');
INSERT INTO `clientes` VALUES ('nnnn', 'aaaa', '111', 'd@gmail.com', '22224444444444');
INSERT INTO `clientes` VALUES ('erwerwer', 'werwer', '1113', 's@gmial.com', '453453534534534');
INSERT INTO `clientes` VALUES ('defsdf', 'sdfsd', '123', 'asdasd@g.com', '564645645645645');
INSERT INTO `clientes` VALUES ('Jose', 'Mena', '3222222', 'josuedrivwe@gmail.com', '345345345345345');
INSERT INTO `clientes` VALUES ('dfsdfsdf', 'dfsfsdf', '324234', 's@df.co', '235424534534535');
INSERT INTO `clientes` VALUES ('rtrweter', 'ertert', '34324234', 's@f.com', '32423423423423');
INSERT INTO `clientes` VALUES ('Jose', 'Mena', '544', 'asdasdas@gmail.com', '54545454545');

-- ----------------------------
-- Table structure for inventario
-- ----------------------------
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `precio` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cantidad` int NULL DEFAULT NULL,
  `imagen` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of inventario
-- ----------------------------

-- ----------------------------
-- Table structure for referencias
-- ----------------------------
DROP TABLE IF EXISTS `referencias`;
CREATE TABLE `referencias`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente` int NULL DEFAULT NULL,
  `fecha` datetime(6) NULL DEFAULT NULL,
  `subtotal` double NULL DEFAULT NULL,
  `total` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of referencias
-- ----------------------------

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`  (
  `producto` int NOT NULL,
  `cantidad` int NULL DEFAULT NULL,
  `valor_venta` double NULL DEFAULT NULL,
  `referencia` int NOT NULL,
  PRIMARY KEY (`referencia`, `producto`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ventas
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
