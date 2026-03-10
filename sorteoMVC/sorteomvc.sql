-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2026 a las 16:45:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sorteomvc`
--
CREATE DATABASE IF NOT EXISTS `sorteomvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sorteomvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `precioTotal` decimal(10,2) DEFAULT NULL,
  `compraConfirmada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `telefono`, `precioTotal`, `compraConfirmada`) VALUES
(1, 'Natt', 1122334455, 6000.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compranumero`
--

CREATE TABLE IF NOT EXISTS `compranumero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clienteId` int(11) NOT NULL,
  `numeroId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clienteId_idx` (`clienteId`),
  KEY `numeroId_idx` (`numeroId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compranumero`
--

INSERT INTO `compranumero` (`id`, `clienteId`, `numeroId`) VALUES
(1, 1, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero`
--

CREATE TABLE IF NOT EXISTS `numero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `vendido` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numero`
--

INSERT INTO `numero` (`id`, `numero`, `vendido`) VALUES
(1, 1, 1),
(2, 2, NULL),
(3, 3, 1),
(4, 4, NULL),
(5, 5, NULL),
(6, 6, NULL),
(7, 7, NULL),
(8, 8, NULL),
(9, 9, NULL),
(10, 10, NULL),
(11, 11, NULL),
(12, 12, NULL),
(13, 13, NULL),
(14, 14, NULL),
(15, 15, NULL),
(16, 16, NULL),
(17, 17, NULL),
(18, 18, NULL),
(19, 19, NULL),
(20, 20, NULL),
(21, 21, NULL),
(22, 22, NULL),
(23, 23, NULL),
(24, 24, NULL),
(25, 25, NULL),
(26, 26, NULL),
(27, 27, NULL),
(28, 28, NULL),
(29, 29, NULL),
(30, 30, NULL),
(31, 31, NULL),
(32, 32, NULL),
(33, 33, NULL),
(34, 34, NULL),
(35, 35, NULL),
(36, 36, NULL),
(37, 37, NULL),
(38, 38, NULL),
(39, 39, NULL),
(40, 40, NULL),
(41, 41, NULL),
(42, 42, NULL),
(43, 43, NULL),
(44, 44, NULL),
(45, 45, NULL),
(46, 46, NULL),
(47, 47, NULL),
(48, 48, NULL),
(49, 49, NULL),
(50, 50, NULL),
(51, 51, NULL),
(52, 52, NULL),
(53, 53, NULL),
(54, 54, NULL),
(55, 55, NULL),
(56, 56, NULL),
(57, 57, NULL),
(58, 58, NULL),
(59, 59, NULL),
(60, 60, NULL),
(61, 61, NULL),
(62, 62, NULL),
(63, 63, NULL),
(64, 64, NULL),
(65, 65, NULL),
(66, 66, NULL),
(67, 67, NULL),
(68, 68, NULL),
(69, 69, NULL),
(70, 70, NULL),
(71, 71, NULL),
(72, 72, NULL),
(73, 73, NULL),
(74, 74, NULL),
(75, 75, NULL),
(76, 76, NULL),
(77, 77, NULL),
(78, 78, NULL),
(79, 79, NULL),
(80, 80, NULL),
(81, 81, NULL),
(82, 82, NULL),
(83, 83, NULL),
(84, 84, NULL),
(85, 85, NULL),
(86, 86, NULL),
(87, 87, NULL),
(88, 88, NULL),
(89, 89, NULL),
(90, 90, NULL),
(91, 91, NULL),
(92, 92, NULL),
(93, 93, NULL),
(94, 94, NULL),
(95, 95, NULL),
(96, 96, NULL),
(97, 97, NULL),
(98, 98, NULL),
(99, 99, NULL),
(100, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `fecha`, `imagen`, `precio`) VALUES
(1, 'ventilador de pie klauben kla v-20', '3 velocidades ajustables para adaptarse a tus necesidades de ventilación\r\nAspas metálicas color cobre de 20\" que garantizan un flujo de aire de 220 m³/h\r\nAltura ajustable hasta 170 Cm para una distribución óptima del aire\r\nSistema de seguridad automático ', '2026-03-04', NULL, 3000),
(2, 'ventilador de pie klauben kla v-20', '3 velocidades ajustables para adaptarse a tus necesidades de ventilación, Aspas metálicas color cobre de 20\" que garantizan un flujo de aire de 220 m³/h, Altura ajustable hasta 170 cm para una distribución óptima del aire, Sistema de seguridad automático ', '2026-03-04', NULL, 3000);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compranumero`
--
ALTER TABLE `compranumero`
  ADD CONSTRAINT `clienteId` FOREIGN KEY (`clienteId`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `numeroId` FOREIGN KEY (`numeroId`) REFERENCES `numero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
