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

 Date: 14/02/2021 17:48:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administradores
-- ----------------------------
DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores`  (
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `correo` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`correo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administradores
-- ----------------------------
INSERT INTO `administradores` VALUES ('Jose Mena', 'josuedrive1998@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

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
INSERT INTO `clientes` VALUES ('asdasd', 'sdada', '1111', 'joses@g.com', '234234234234');
INSERT INTO `clientes` VALUES ('erwerwer', 'werwer', '1113', 's@gmial.com', '453453534534534');
INSERT INTO `clientes` VALUES ('defsdf', 'sdfsd', '123', 'asdasd@g.com', '564645645645645');
INSERT INTO `clientes` VALUES ('Jose', 'Mena', '123456789', 'josuedrive@gmail.com', '123123123123131');
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of inventario
-- ----------------------------
INSERT INTO `inventario` VALUES (1, 'Teclado', '50000', 0, '1.jpg');
INSERT INTO `inventario` VALUES (4, 'wwww', '2222', 0, 'img_20210214134824.png');
INSERT INTO `inventario` VALUES (5, 'Canes', '6500', 0, 'img_20210214212535.PNG');

-- ----------------------------
-- Table structure for pedidos
-- ----------------------------
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente` int NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL,
  `subtotal` double NULL DEFAULT NULL,
  `impuesto` double NULL DEFAULT NULL,
  `total` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pedidos
-- ----------------------------

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`  (
  `producto` int NOT NULL,
  `cantidad` int NULL DEFAULT NULL,
  `valor` double NULL DEFAULT NULL,
  `pedido` int NOT NULL,
  PRIMARY KEY (`pedido`, `producto`) USING BTREE,
  INDEX `producto`(`producto`) USING BTREE,
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `inventario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ventas
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
