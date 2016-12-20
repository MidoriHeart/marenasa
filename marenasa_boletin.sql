-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-12-2016 a las 01:59:46
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `marenasa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_boletin`
--

CREATE TABLE IF NOT EXISTS `marenasa_boletin` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `archivo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_boletin`
--

INSERT INTO `marenasa_boletin` (`id`, `fecha`, `nombre`, `archivo`) VALUES
(1, '2016-12-07', 'ejemplo1', 'ad2e3ae2fda234565c2d58d1c68c5dbb.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marenasa_boletin`
--
ALTER TABLE `marenasa_boletin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marenasa_boletin`
--
ALTER TABLE `marenasa_boletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
