-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-10-2016 a las 23:48:23
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
-- Estructura de tabla para la tabla `marenasa_historia`
--

CREATE TABLE IF NOT EXISTS `marenasa_historia` (
  `id` int(11) unsigned NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_preguntas`
--

CREATE TABLE IF NOT EXISTS `marenasa_preguntas` (
  `id` int(11) NOT NULL,
  `id_marenasa` int(11) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_preguntas_categoria`
--

CREATE TABLE IF NOT EXISTS `marenasa_preguntas_categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marenasa_historia`
--
ALTER TABLE `marenasa_historia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_preguntas`
--
ALTER TABLE `marenasa_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_preguntas_categoria`
--
ALTER TABLE `marenasa_preguntas_categoria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marenasa_historia`
--
ALTER TABLE `marenasa_historia`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marenasa_preguntas_categoria`
--
ALTER TABLE `marenasa_preguntas_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
