-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2016 a las 13:27:48
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `clave` int(11) NOT NULL,
  `imagenp` varchar(200) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`clave`, `imagenp`, `comentario`, `fecha_publicacion`, `id_usuario`, `likes`) VALUES
(4, 'jkhadfkahsd', 'imagenes/', '2016-09-07 17:02:11', 10, 0),
(8, 'sf', 'imagenes/8.jpg', '2016-09-07 17:56:54', 10, 0),
(9, 'adsfasdf', 'imagenes/84C.jpg', '2016-09-07 18:02:03', 10, 0),
(10, 'adsfasdf', 'imagenes/84C.jpg', '2016-09-07 18:02:08', 10, 0),
(11, 'hola que ase', 'imagenes/170713-2004.jpg', '2016-09-19 06:12:21', 12, 0),
(12, '', 'imagenes/20160409_173722.jpg', '2016-09-19 19:09:49', 12, 0),
(13, '', 'imagenes/funny-pictures-auto-demotivation-bugs-bunny-362601.jpeg', '2016-09-19 23:26:05', 12, 0),
(14, 'jajaja', 'imagenes/10423527_1492672357611418_1347537091_n.jpg', '2016-09-19 23:48:17', 13, 0),
(15, 'jajaja', '', '2016-09-19 23:55:06', 12, 0),
(16, '', 'imagenes/10563044_738626342863255_8698307658875507129_n.jpg', '2016-09-19 23:56:24', 13, 0),
(17, '', 'imagenes/97.jpg', '2016-09-20 00:41:22', 12, 0),
(18, '', 'imagenes/6891337-bobcat-wallpaper.jpg', '2016-09-20 01:13:41', 12, 0),
(19, '', 'imagenes/753cbf4de6f361e450c0dc6b97c85f9a.jpg', '2016-09-20 01:41:56', 12, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secundaria`
--

CREATE TABLE `secundaria` (
  `clave_secundaria` int(11) NOT NULL,
  `clave` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secundaria`
--

INSERT INTO `secundaria` (`clave_secundaria`, `clave`, `id_usuario`, `comentario2`) VALUES
(1, 12, 12, 'jajajajajaja'),
(2, 12, 12, 'mmllml'),
(3, 13, 12, 'ajajaja'),
(4, 14, 12, 'hola'),
(5, 14, 12, 'a'),
(6, 16, 12, 'jajaja'),
(7, 16, 12, 'hola mundo estoy comentando!'),
(8, 13, 12, ''),
(9, 13, 12, 'HADKFJAKDJHFKALJDSHF'),
(10, 16, 12, ''),
(11, 13, 12, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `passw`, `foto`) VALUES
(1, 'Joaquin', 'Chacon', 'jchacon09@hotmail.com', '12345', ''),
(10, 'Juan', 'lopez', 'juan@hotmail.com', '12345', 'uploads/imagen.png'),
(11, '', '', '', '', 'uploads/'),
(12, 'Joaquin', 'Chacon', 'joaquin@hotmail.com', '12345', 'uploads/557601_491513120900967_719384795_n.jpg'),
(13, 'luis', 'perez', 'luis@hotmail.com', '12345', 'uploads/Storm-CHRON.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `secundaria`
--
ALTER TABLE `secundaria`
  ADD PRIMARY KEY (`clave_secundaria`),
  ADD KEY `clave` (`clave`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `secundaria`
--
ALTER TABLE `secundaria`
  MODIFY `clave_secundaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `secundaria`
--
ALTER TABLE `secundaria`
  ADD CONSTRAINT `secundaria_ibfk_1` FOREIGN KEY (`clave`) REFERENCES `publicacion` (`clave`) ON UPDATE CASCADE,
  ADD CONSTRAINT `secundaria_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
