-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2016 a las 02:03:32
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marenasa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_carrusel_qs`
--

CREATE TABLE `marenasa_carrusel_qs` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_carrusel_qs`
--

INSERT INTO `marenasa_carrusel_qs` (`id`, `imagen`) VALUES
(1, '93bfda614fe2936ef6cc868c93b9f917.png'),
(2, 'd187cbac40c17710d3326983e0d3bb7d.jpg'),
(3, '7c8c1547e29c55715512b8cbd8a5199e.png'),
(4, '00373a0355dd160906ce530160c8e403.png'),
(5, '42be74937963e2a1f02f33932a128aa1.png'),
(6, 'c8b080e3a8659863c5962449022a6066.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_inicio_carrusel`
--

CREATE TABLE `marenasa_inicio_carrusel` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_inicio_carrusel`
--

INSERT INTO `marenasa_inicio_carrusel` (`id`, `imagen`) VALUES
(1, 'd2d8da5deea3cca4c851714e6a059b76.jpg'),
(2, '80383728ab7231f7c92419d21864e566.jpeg'),
(3, 'ef1e4b042fa6343939a147bb9487b092.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_misionvision`
--

CREATE TABLE `marenasa_misionvision` (
  `id` int(11) NOT NULL,
  `mision` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `vision` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_misionvision`
--

INSERT INTO `marenasa_misionvision` (`id`, `mision`, `vision`) VALUES
(1, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus.\r\n					 Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada \r\n					 feugiat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cur', 'Mauris blandit aliquet elit, eget ti					quis ac lectus. Donec rutrum congue leo eget malesuada. Proin	');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_preguntas`
--

CREATE TABLE `marenasa_preguntas` (
  `id` int(11) NOT NULL,
  `id_marenasa` int(11) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_preguntas`
--

INSERT INTO `marenasa_preguntas` (`id`, `id_marenasa`, `pregunta`, `respuesta`) VALUES
(1, 1, ' esta es una pregunta de ejemplo', 'qweqwdsdsi, pretium ut lacinia in, elementum id enim. Vew sed sit amet dui. Curabitur aliquet quam id dui posuere blandit. '),
(2, 1, 'Realizan entregas a domicilio', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Cras u'),
(3, 1, 'esta es solo una prueba', 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_preguntas_categoria`
--

CREATE TABLE `marenasa_preguntas_categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_preguntas_categoria`
--

INSERT INTO `marenasa_preguntas_categoria` (`id`, `categoria`) VALUES
(1, 'Categoria 1'),
(2, 'Categoria 2'),
(3, 'Categoria 3'),
(4, 'Categoria 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_productos`
--

CREATE TABLE `marenasa_productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `articulo` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dimensiones` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_productos`
--

INSERT INTO `marenasa_productos` (`id`, `id_categoria`, `id_marca`, `articulo`, `descripcion`, `dimensiones`, `imagen`, `precio`) VALUES
(3, 1, 1, 'Llantas', '', '11 x 45 in', '018cd783b1b5e9a7e1212f60582d4b6f.jpg', '1200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_producto_categorias`
--

CREATE TABLE `marenasa_producto_categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_producto_categorias`
--

INSERT INTO `marenasa_producto_categorias` (`id`, `categoria`, `imagen`) VALUES
(1, 'Color', 'f03ebd8eec7de4086e8172db713bc74c.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_producto_marcas`
--

CREATE TABLE `marenasa_producto_marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_producto_marcas`
--

INSERT INTO `marenasa_producto_marcas` (`id`, `marca`, `logo`) VALUES
(1, 'Fruta', '19a3a450034b6595ad0930620b6164f4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_promociones`
--

CREATE TABLE `marenasa_promociones` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_inicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_final` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marenasa_promociones`
--

INSERT INTO `marenasa_promociones` (`id`, `id_producto`, `fecha_inicio`, `fecha_final`, `porcentaje`) VALUES
(1, 3, '2016-11-14', '2016-11-30', 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_quienesomos`
--

CREATE TABLE `marenasa_quienesomos` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_quienesomos`
--

INSERT INTO `marenasa_quienesomos` (`id`, `titulo`, `subtitulo`, `descripcion`) VALUES
(1, 'Quienes somos?', 'Adentrando a la historia', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marenasa_sucursales`
--

CREATE TABLE `marenasa_sucursales` (
  `id` int(11) NOT NULL,
  `imagen` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `horarios` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono1` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono2` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `email` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marenasa_sucursales`
--

INSERT INTO `marenasa_sucursales` (`id`, `imagen`, `nombre`, `direccion`, `horarios`, `telefono1`, `telefono2`, `email`) VALUES
(1, '96e50b445ebd9c9abf679543c2611fd1.jpg', 'Sucursal 1 tepic', 'esto es un ejemplo', '<p>12:00 - 0:00</p>', '111 11 11', '122 22 22', 'marenasa@marenasa.com'),
(2, '3f0ab98672a4b2093c19c6bcb61e6ac2.jpg', 'Sucursal 2 tepic', 'esta direccion no existe', '<p>1:00 - 3:00</p>', '111 111 12', '123 33 33', 'marenasa@marenasa.com'),
(3, 'd2ade699bda579e97ff2d8089a3b746c.jpg', 'Sucursal 3 tepic', 'nueva direccion', '<p>10:00-12:00</p>', '123 45 67', '234 56 78', 'marenasa@marenasa.com'),
(4, '5183cd4f273d5a7f5ec1e2d98fcb467b.jpg', 'sucursal 4 tepic', 'otra dicreccio', '<p>11:00 -15:00</p>', '234 56 78 ', '342 56 34', 'marenasa@marenasa.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marenasa_carrusel_qs`
--
ALTER TABLE `marenasa_carrusel_qs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_inicio_carrusel`
--
ALTER TABLE `marenasa_inicio_carrusel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_misionvision`
--
ALTER TABLE `marenasa_misionvision`
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
-- Indices de la tabla `marenasa_productos`
--
ALTER TABLE `marenasa_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_producto_categorias`
--
ALTER TABLE `marenasa_producto_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_producto_marcas`
--
ALTER TABLE `marenasa_producto_marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_promociones`
--
ALTER TABLE `marenasa_promociones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `marenasa_quienesomos`
--
ALTER TABLE `marenasa_quienesomos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marenasa_sucursales`
--
ALTER TABLE `marenasa_sucursales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marenasa_carrusel_qs`
--
ALTER TABLE `marenasa_carrusel_qs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `marenasa_inicio_carrusel`
--
ALTER TABLE `marenasa_inicio_carrusel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `marenasa_preguntas_categoria`
--
ALTER TABLE `marenasa_preguntas_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `marenasa_productos`
--
ALTER TABLE `marenasa_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `marenasa_producto_categorias`
--
ALTER TABLE `marenasa_producto_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marenasa_producto_marcas`
--
ALTER TABLE `marenasa_producto_marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marenasa_promociones`
--
ALTER TABLE `marenasa_promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marenasa_quienesomos`
--
ALTER TABLE `marenasa_quienesomos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marenasa_sucursales`
--
ALTER TABLE `marenasa_sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `marenasa_promociones`
--
ALTER TABLE `marenasa_promociones`
  ADD CONSTRAINT `marenasa_promociones_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `marenasa_productos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
