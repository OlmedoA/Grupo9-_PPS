-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2022 a las 00:03:58
-- Versión del servidor: 5.6.36
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `javi02_budgetsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(6) UNSIGNED NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `access` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `ID_Proyecto` int(7) NOT NULL,
  `Descripción` int(70) NOT NULL,
  `PrecioTotal` int(7) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID_Proced` int(5) NOT NULL,
  `Descripción` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `PrecioUSD` decimal(10,2) NOT NULL,
  `Precio$` decimal(10,2) NOT NULL,
  `ID_proyecto` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ID_Proced`, `Descripción`, `PrecioUSD`, `Precio$`, `ID_proyecto`) VALUES
(1, 'Servicio Tecnico', '15.12', '3100.00', NULL),
(4, 'Hora de servicio tecnico', '12.19', '2500.00', NULL),
(5, 'Servicio de Atencion de emergencia', '20.98', '4300.00', NULL),
(6, 'Servicio de atencion de Emergencia fuera de horario de servicio tecnico', '32.20', '6600.00', NULL),
(7, 'Servicio de Atencion Domiciliaria', '12.20', '2500.00', NULL),
(8, 'Traslado de datos de un equipo a otro (hasta 5Gb)', '3.51', '720.00', NULL),
(9, 'Traslado de datos adicional costo por Gb', '0.88', '180.00', NULL),
(10, 'Inicializacion de Equipo Nuevo. Personalizacion del Windows. Activacion del Antivirus y demas tareas para dejarlo operativo\r\n', '21.95', '4500.00', NULL),
(11, 'Instalacion de Sistema Operativo Server para utilizarlo como Terminal Server + Drivers + Antivirus', '58.54', '12000.00', NULL),
(12, 'Configuracion de periferico con drivers bajados de internet', '6.05', '1240.00', NULL),
(13, 'Eliminacion de Virus - Troyanos - Spyware - etc', '21.95', '4500.00', NULL),
(14, 'Mantenimiento y optimizacion software PC', '12.20', '2500.00', NULL),
(15, 'Instalacion Sistema Operativo, driver, paquete de oficina, Antivirus, ', '31.22', '6400.00', NULL),
(16, 'Reparación mínima Notebook', '21.95', '4500.00', NULL),
(17, 'Instalacion de Antivirus y actualizacion', '6.05', '1240.00', NULL),
(18, 'Actualizacion version de Antivirus', '6.05', '1240.00', NULL),
(19, 'Instalacion de programa especifico provisto por el cliente', '12.20', '2500.00', NULL),
(20, 'Instalacion de sistema SIAP hasta 3 modulos', '12.20', '2500.00', NULL),
(21, 'Instalacion modulo adicional de sistema SIAP (cada uno)', '3.22', '660.00', NULL),
(22, 'BackUP de datos de SIAP', '11.46', '2350.00', NULL),
(23, 'Migracion de perfil de usuario', '21.95', '4500.00', NULL),
(24, 'Recuperacion de Sistema Operativo', '21.95', '4500.00', NULL),
(25, 'Reinstalacion completa de Sistema Operativo y programas del usuario, limpieza completa del interior del CPU y recuperacion de datos del usuario. Puesta en lugar y configuracion de recursos compartidos', '46.34', '9500.00', NULL),
(26, 'Instalacion de Service Pack', '12.20', '2500.00', NULL),
(27, 'Clonado de Disco Rigido sin errores S.M.A.R.T', '21.95', '4500.00', NULL),
(28, 'Downgrade / Upgrade de Version de Windows', '26.83', '5500.00', NULL),
(29, 'Recuperacion funcionalidad de Server', '44.39', '9100.00', NULL),
(30, 'Gestion de contratacion de Hosting, delegacion de dominio y creacion de cuentas de e-mail', '58.54', '12000.00', NULL),
(31, 'Gestion anual de administracion de Hosting', '21.95', '4500.00', NULL),
(32, 'Instalacion disco rigido', '6.10', '1250.00', NULL),
(33, 'Formateo de disco rigido y chequeo de estado de S.M.A.R.T.', '6.10', '1250.00', NULL),
(34, 'Instalacion banco de memoria Ram', '6.10', '1250.00', NULL),
(35, 'Limpieza completa interior de la CPU con lubricacion de coolers', '21.95', '4500.00', NULL),
(36, 'Instalacion Placa controladora con drivers desde internet', '15.12', '3100.00', NULL),
(37, 'Cambio de fuente de alimentacion (mano de obra)', '6.10', '1250.00', NULL),
(38, 'Cambio de gabinete', '15.12', '3100.00', NULL),
(39, 'Testeo y reconexion de conectores USB frontales', '6.10', '1250.00', NULL),
(40, 'Instalacion Pc en puesto de trabajo', '12.20', '2500.00', NULL),
(41, 'Testeo de Equipo, Hora o fraccion', '6.10', '1250.00', NULL),
(42, 'Reparacion minima de Hardware de Notebook', '58.54', '12000.00', NULL),
(43, 'Cambio agarre del zocalo del procesador en el Mother', '21.95', '4500.00', NULL),
(44, 'Adicional limpieza completa interior de la CPU con lubricacion de coolers(Computadora gamer)', '11.46', '2350.00', NULL),
(45, 'Limpieza interna del circuito de refrigeracion de Notebook', '44.39', '9100.00', NULL),
(46, 'Limpieza lente y ajuste de Foco camara CCTV', '12.20', '2500.00', NULL),
(47, 'Gestion de Garantia de Discos Rigidos', '21.95', '4500.00', NULL),
(48, 'Configuracion de parametros de red TCP/IP', '6.10', '1250.00', NULL),
(49, 'Configuracion de discos compartidos', '6.10', '1250.00', NULL),
(50, 'Configuracion de impresora compartida', '6.10', '1250.00', NULL),
(51, 'Configuracion de usuarios, permisos y carpetas compartidas (por usuario)', '6.10', '1250.00', NULL),
(52, 'Configuracion Router para ADSL', '17.07', '3500.00', NULL),
(53, 'Configuracion Router con WiFi para ADSL', '21.95', '4500.00', NULL),
(54, 'Configuracion Access Point WiFi', '21.95', '4500.00', NULL),
(55, 'Configuracion Software administracion remota de server', '12.20', '2500.00', NULL),
(56, 'Configuracion Router ADSL para traspaso de puertos', '21.95', '4500.00', NULL),
(57, 'Configuracion servicio no-ip, DynDNS, etc', '21.95', '4500.00', NULL),
(58, 'Contratacion anual servicio No-Ip', '21.95', '4500.00', NULL),
(59, 'Configuracion de PC que comparte internet', '12.20', '2500.00', NULL),
(60, 'Armado e bocas de red', '12.20', '2500.00', NULL),
(61, 'Armado de Pared Tecnica (Router + Switch)', '21.95', '4500.00', NULL),
(62, 'Armado Rack de comunicaciones', '26.83', '5500.00', NULL),
(63, 'Desinstalacion equipos de red (Router + Switch)', '21.00', '4500.00', NULL),
(64, 'Puesta en lugar y configuracion de red en Server', '12.68', '2600.00', NULL),
(65, 'Configuracion Print Server', '11.46', '2350.00', NULL),
(66, 'Configuracion servidor VPN', '63.41', '13000.00', NULL),
(67, 'Configuracion cliente VPN', '12.20', '2500.00', NULL),
(68, 'Actualizacion Firmware Router / AP / WiFi', '17.07', '3500.00', NULL),
(69, 'Montaje Camara de video para DVR', '12.20', '2500.00', NULL),
(70, 'Configuracion sistema DVR por ampliacion de camaras', '11.46', '2350.00', NULL);

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
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`) NOT NULL AUTO_INCREMENT;

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`ID_Proyecto`),
  ADD KEY `ID_Proyecto` (`ID_Proyecto`,`Descripción`,`PrecioTotal`),
  ADD KEY `Fecha` (`Fecha`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID_Proced`),
  ADD KEY `ID_Proced` (`ID_Proced`,`Descripción`,`PrecioUSD`,`Precio$`),
  ADD KEY `ID_Proced_2` (`ID_Proced`,`Descripción`,`PrecioUSD`,`Precio$`),
  ADD KEY `ID_proyecto` (`ID_proyecto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `ID_Proyecto` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ID_Proced` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`ID_proyecto`) REFERENCES `presupuesto` (`ID_Proyecto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
