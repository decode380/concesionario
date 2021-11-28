-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2021 a las 19:14:05
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `catid` int(11) NOT NULL,
  `catipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`catid`, `catipo`) VALUES
(1, 'Campero'),
(2, 'Automovil'),
(3, 'Camioneta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `datid` int(11) NOT NULL,
  `usuid` int(11) NOT NULL,
  `datnombre` varchar(50) NOT NULL,
  `datapellido` varchar(50) NOT NULL,
  `datipoid` varchar(20) NOT NULL,
  `datnumeroid` varchar(20) NOT NULL,
  `datelefono` varchar(20) NOT NULL,
  `datcorreo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`datid`, `usuid`, `datnombre`, `datapellido`, `datipoid`, `datnumeroid`, `datelefono`, `datcorreo`) VALUES
(1, 1, 'Vendedor Uno', 'Vendedor', 'Cedula de ciudadanía', '123456789', '321321321', 'vendedor@gmail.com'),
(2, 2, 'Comprador Uno', 'Comprador', 'Cedula de ciudadanía', '123456789', '321321321', 'comprador@gmail.com'),
(3, 3, 'Vendedor Dos', 'Vendedor y Comprador', 'Cedula de ciudadanía', '123456789', '321321321', 'vendedorycomprador@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rolid` int(11) NOT NULL,
  `roltipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rolid`, `roltipo`) VALUES
(1, 'Vendedor'),
(2, 'Comprador'),
(3, 'Vendedor y Comprador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuid` int(11) NOT NULL,
  `usulogin` varchar(20) NOT NULL,
  `usupassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuid`, `usulogin`, `usupassword`) VALUES
(1, 'vendedor1', 'vendedor1'),
(2, 'comprador1', 'comprador1'),
(3, 'vendedor2', 'vendedor2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `rolid` int(11) NOT NULL,
  `usuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`rolid`, `usuid`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `vehplaca` varchar(10) NOT NULL,
  `datid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `vehmodelo` int(11) NOT NULL,
  `vehmarca` varchar(50) NOT NULL,
  `vehestado` varchar(30) NOT NULL,
  `vehprecio` int(11) NOT NULL,
  `vehcolor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`catid`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`datid`),
  ADD KEY `usuid` (`usuid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rolid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuid`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD KEY `rolid` (`rolid`),
  ADD KEY `usuid` (`usuid`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`vehplaca`),
  ADD KEY `datid` (`datid`),
  ADD KEY `catid` (`catid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `datid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD CONSTRAINT `datospersonales_ibfk_1` FOREIGN KEY (`usuid`) REFERENCES `usuario` (`usuid`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`usuid`) REFERENCES `usuario` (`usuid`),
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`rolid`) REFERENCES `rol` (`rolid`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `categoria` (`catid`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`datid`) REFERENCES `datospersonales` (`datid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
