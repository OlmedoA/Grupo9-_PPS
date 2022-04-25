-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2022 a las 00:31:22
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jacesi`
--
CREATE DATABASE IF NOT EXISTS `jacesi` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `jacesi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `ID_Proced` int(5) NOT NULL,
  `Descripción` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `PrecioUnitario` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `ID_Proyecto` int(5) NOT NULL,
  `Descripción` int(70) NOT NULL,
  `ID_Proced` int(5) NOT NULL,
  `PrecioTotal` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(3) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Contrasenia` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `Rol` varchar(7) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`ID_Proced`),
  ADD KEY `ID_Proced` (`ID_Proced`,`Descripción`,`Cantidad`,`PrecioUnitario`),
  ADD KEY `ID_Proced_2` (`ID_Proced`,`Descripción`,`Cantidad`,`PrecioUnitario`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`ID_Proyecto`),
  ADD KEY `ID_Proyecto` (`ID_Proyecto`,`Descripción`,`ID_Proced`,`PrecioTotal`),
  ADD KEY `ID_Proced` (`ID_Proced`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `ID_Proced` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `ID_Proyecto` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`ID_Proced`) REFERENCES `procedimientos` (`ID_Proced`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
