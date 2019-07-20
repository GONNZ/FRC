-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-07-2019 a las 17:10:45
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdfrc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategoriasservicios`
--

DROP TABLE IF EXISTS `tbcategoriasservicios`;
CREATE TABLE IF NOT EXISTS `tbcategoriasservicios` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idTipo` int(11) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcitas`
--

DROP TABLE IF EXISTS `tbcitas`;
CREATE TABLE IF NOT EXISTS `tbcitas` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `fechaInicial` date NOT NULL,
  `fechaCita` date NOT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestados`
--

DROP TABLE IF EXISTS `tbestados`;
CREATE TABLE IF NOT EXISTS `tbestados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfacdet`
--

DROP TABLE IF EXISTS `tbfacdet`;
CREATE TABLE IF NOT EXISTS `tbfacdet` (
  `idLinea` int(11) NOT NULL,
  `idFac` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `cantSesiones` int(11) NOT NULL,
  `totalLinea` double NOT NULL,
  PRIMARY KEY (`idLinea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfacenc`
--

DROP TABLE IF EXISTS `tbfacenc`;
CREATE TABLE IF NOT EXISTS `tbfacenc` (
  `idFac` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `fechaInicial` date NOT NULL,
  PRIMARY KEY (`idFac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbroles`
--

DROP TABLE IF EXISTS `tbroles`;
CREATE TABLE IF NOT EXISTS `tbroles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nomRol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicios`
--

DROP TABLE IF EXISTS `tbservicios`;
CREATE TABLE IF NOT EXISTS `tbservicios` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` int(11) NOT NULL,
  `costoxsesion` double NOT NULL,
  PRIMARY KEY (`idServicio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtiposservicios`
--

DROP TABLE IF EXISTS `tbtiposservicios`;
CREATE TABLE IF NOT EXISTS `tbtiposservicios` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nombreUsuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
