-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-03-2020 a las 05:51:16
-- Versión del servidor: 5.7.29-log
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yota`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestioncliente`
--

DROP TABLE IF EXISTS `gestioncliente`;
CREATE TABLE IF NOT EXISTS `gestioncliente` (
  `gestion_cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `gestion_id` int(11) NOT NULL,
  `atendido` int(11) NOT NULL DEFAULT '0',
  `creacion` datetime NOT NULL,
  PRIMARY KEY (`gestion_cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiones`
--

DROP TABLE IF EXISTS `gestiones`;
CREATE TABLE IF NOT EXISTS `gestiones` (
  `gestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_gestion` varchar(255) NOT NULL,
  `visita` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY (`gestion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gestiones`
--

INSERT INTO `gestiones` (`gestion_id`, `nombre_gestion`, `visita`, `usuario_id`, `fecha_creacion`) VALUES
(1, 'ARREGLO DE PAGO', 0, 1, '2020-03-08'),
(2, 'CANCELACIÃ“N', 0, 1, '2020-03-08'),
(3, 'COMPRA', 0, 1, '2020-03-08'),
(4, 'NUEVO SERVICIO', 0, 1, '2020-03-08'),
(5, 'RECLAMO', 0, 1, '2020-03-08'),
(6, 'RENOVACIÃ“N', 0, 1, '2020-03-08'),
(7, 'SOPORTE TÃ‰CNICO', 1, 1, '2020-03-08'),
(8, 'DEVOLUCIÃ“N', 0, 1, '2020-03-08'),
(9, 'CONSULTA', 0, 1, '2020-03-08'),
(10, 'REEMPLAZO', 0, 1, '2020-03-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `gestion_cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `gestion_id` int(11) NOT NULL,
  `problema` text NOT NULL,
  `solucion` text NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `permiso` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `clave`, `nombre`, `apellido`, `permiso`) VALUES
(1, 'asanchez', '$2y$15$H7KL0mCl12OwoViDjXz7m.z5bmDDQ0/INHMjTHDsmjS0eKy4xdzE6', 'Alexander', 'Sanchez', 1),
(6, 'jcenteno', '$2y$15$6gx5FF6zEZoEfwEgJq5wHuo5UXTFyv0zFAk8JqUFVrHeu20mr57yS', 'Juan', 'Centeno', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
