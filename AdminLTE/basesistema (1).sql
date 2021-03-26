-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2021 a las 01:25:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basesistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `idacceso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_hora_acceso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modificacion` datetime NOT NULL,
  `ip_conexion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`idacceso`, `idusuario`, `fecha_hora_acceso`, `fecha_modificacion`, `ip_conexion`) VALUES
(1, 2, '2021-03-12 21:05:46', '2021-03-12 17:02:51', '132332323'),
(2, 3, '2021-03-12 21:03:46', '2021-03-12 17:02:51', '45635430'),
(3, 4, '2021-03-12 21:28:35', '2021-03-12 17:02:51', '245543453'),
(4, 5, '2021-03-12 21:29:37', '2021-03-12 17:02:51', '74454254'),
(5, 6, '2021-03-12 21:30:06', '2021-03-12 17:02:51', '15782584'),
(6, 7, '2021-03-12 21:30:54', '2021-03-12 17:02:51', '78994562'),
(7, 8, '2021-03-12 21:32:03', '2021-03-12 17:02:51', '142424175'),
(8, 1, '2021-03-15 22:24:37', '2021-03-15 17:24:37', '321421426l'),
(9, 1, '2021-03-16 22:29:33', '2021-03-16 17:29:33', 'i42434241412'),
(10, 9, '2021-03-17 21:57:48', '2021-03-17 16:57:48', 'jk4452546'),
(11, 11, '2021-03-19 22:01:33', '2021-03-19 17:01:33', '8523358hg'),
(12, 11, '2021-03-19 22:03:25', '2021-03-19 17:03:25', 'hg254645645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idnivel` int(11) NOT NULL,
  `nivel` varchar(40) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idnivel`, `nivel`, `descripcion`, `estado`) VALUES
(1, 'Cliente', 'Persona Natural que compra productos para su consumo.', ''),
(2, 'Vendedor', 'Persona Natural o Jurídica que vende los productos comprados.', ''),
(3, 'Proovedor', 'Persona Jurídica encargada del abastecimiento de los productos.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(18) NOT NULL,
  `login` tinyint(1) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_comunicacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idnivel`, `nombre`, `apellidos`, `email`, `password`, `login`, `estado`, `fecha_creacion`, `fecha_comunicacion`) VALUES
(1, 1, 'Gustavo', 'Graos Santos', 'gustavograos01245@gmail.com', '123456', 1, 'habilitado', '2021-03-25 22:26:36', '2021-03-15 17:03:45'),
(2, 2, ' La Esquina', 'Bodega', 'bodegalaesquina@gmail.com', '14242424545757', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(3, 3, 'LG', 'Empresa de electrodomesticos', 'lg@gmail.com', '77565554575', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(4, 1, 'Andres', 'Jimenez Quispe', 'andresjq@gmail.com', '1424242657', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(5, 2, 'EL Comercio', 'Bodega', 'el comercio@gmail.com', '1424242545', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(6, 3, 'Doña Gumi', 'Abarrotes', 'contacto@doñagumi.com.pe', '142424242142', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(7, 1, 'Fernado', 'Gomez Perez', 'fernandogp@gmail.com', '14242424211', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(8, 3, 'Reyes', 'Articulos de Plásticos', 'contacto@reyes.com', '1424242414', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(9, 2, 'Vallejo', 'Bodega', 'bvallejo@gmail.com', '14242425445', 0, 'habilitado', '2021-03-16 02:58:22', '2021-03-15 17:03:45'),
(10, 3, 'A1', 'Abarrotes', 'contacto@a1.com.pe', 'jhko475a1', 0, 'habilitado', '2021-03-19 04:59:12', '2021-03-18 18:59:12'),
(11, 2, 'Huerta Grande ', 'Bodega', 'huertagrande@gmail.com', 'huertagrande', 0, 'habilitado', '2021-03-20 02:58:26', '2021-03-19 16:58:26'),
(12, 0, 'Gustavo', 'I202020737', 'grgs95859@gmail.com', '010403', 0, 'habilitado', '2021-03-26 02:19:20', '0000-00-00 00:00:00'),
(13, 0, 'Gustavo', 'España', 'grgs95859@gmail.com', '123456789', 0, 'habilitado', '2021-03-26 02:19:12', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`idacceso`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idnivel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idnivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
