-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2016 a las 01:58:26
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
-- Estructura de tabla para la tabla `marenasa_producto_marcas`
--

CREATE TABLE IF NOT EXISTS `marenasa_producto_marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_producto_marcas`
--

INSERT INTO `marenasa_producto_marcas` (`id`, `marca`, `logo`, `descripcion`) VALUES
(1, 'Fruta', '5640f8fac1087f42093dcb4e7d0f105e.jpg', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit'),
(2, 'NAPA', 'ec1221166c4e5e8833075b5b5f3ee0b8.png', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Curabitur aliquet quam id dui posuer'),
(3, 'Planet Express', '1aa8a5c146c60493fee231cd52e8edbc.jpg', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt. Curabitur aliquet qua'),
(4, 'ACME', '4e36898811ddf7ffca2d493265ab1005.jpeg', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada feugiat. Curabitur aliquet quam id dui posuere bland');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marenasa_producto_marcas`
--
ALTER TABLE `marenasa_producto_marcas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marenasa_producto_marcas`
--
ALTER TABLE `marenasa_producto_marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
