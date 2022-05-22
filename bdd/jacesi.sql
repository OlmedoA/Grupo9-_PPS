-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 00:12:01
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acople`
--

CREATE TABLE `acople` (
  `ID_acople` int(11) NOT NULL,
  `ID_Presupuesto` int(11) NOT NULL,
  `ID_servicios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `Descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio$` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ID_Proced`, `Descripcion`, `Precio$`) VALUES
(1, 'Servicio Tecnico', '3100.00'),
(4, 'Hora de servicio tecnico', '2500.00'),
(5, 'Servicio de Atencion de emergencia', '4300.00'),
(6, 'Servicio de atencion de Emergencia fuera de horario de servicio tecnico', '6600.00'),
(7, 'Servicio de Atencion Domiciliaria', '2500.00'),
(8, 'Traslado de datos de un equipo a otro (hasta 5Gb)', '720.00'),
(9, 'Traslado de datos adicional costo por Gb', '180.00'),
(10, 'Inicializacion de Equipo Nuevo. Personalizacion del Windows. Activacion del Antivirus y demas tareas para dejarlo operativo\r\n', '4500.00'),
(11, 'Instalacion de Sistema Operativo Server para utilizarlo como Terminal Server + Drivers + Antivirus', '12000.00'),
(12, 'Configuracion de periferico con drivers bajados de internet', '1240.00'),
(13, 'Eliminacion de Virus - Troyanos - Spyware - etc', '4500.00'),
(14, 'Mantenimiento y optimizacion software PC', '2500.00'),
(15, 'Instalacion Sistema Operativo, driver, paquete de oficina, Antivirus, ', '6400.00'),
(16, 'Reparación mínima Notebook', '4500.00'),
(17, 'Instalacion de Antivirus y actualizacion', '1240.00'),
(18, 'Actualizacion version de Antivirus', '1240.00'),
(19, 'Instalacion de programa especifico provisto por el cliente', '2500.00'),
(20, 'Instalacion de sistema SIAP hasta 3 modulos', '2500.00'),
(21, 'Instalacion modulo adicional de sistema SIAP (cada uno)', '660.00'),
(22, 'BackUP de datos de SIAP', '2350.00'),
(23, 'Migracion de perfil de usuario', '4500.00'),
(24, 'Recuperacion de Sistema Operativo', '4500.00'),
(25, 'Reinstalacion completa de Sistema Operativo y programas del usuario, limpieza completa del interior del CPU y recuperacion de datos del usuario. Puesta en lugar y configuracion de recursos compartidos', '9500.00'),
(26, 'Instalacion de Service Pack', '2500.00'),
(27, 'Clonado de Disco Rigido sin errores S.M.A.R.T', '4500.00'),
(28, 'Downgrade / Upgrade de Version de Windows', '5500.00'),
(29, 'Recuperacion funcionalidad de Server', '9100.00'),
(30, 'Gestion de contratacion de Hosting, delegacion de dominio y creacion de cuentas de e-mail', '12000.00'),
(31, 'Gestion anual de administracion de Hosting', '4500.00'),
(32, 'Instalacion disco rigido', '1250.00'),
(33, 'Formateo de disco rigido y chequeo de estado de S.M.A.R.T.', '1250.00'),
(34, 'Instalacion banco de memoria Ram', '1250.00'),
(35, 'Limpieza completa interior de la CPU con lubricacion de coolers', '4500.00'),
(36, 'Instalacion Placa controladora con drivers desde internet', '3100.00'),
(37, 'Cambio de fuente de alimentacion (mano de obra)', '1250.00'),
(38, 'Cambio de gabinete', '3100.00'),
(39, 'Testeo y reconexion de conectores USB frontales', '1250.00'),
(40, 'Instalacion Pc en puesto de trabajo', '2500.00'),
(41, 'Testeo de Equipo, Hora o fraccion', '1250.00'),
(42, 'Reparacion minima de Hardware de Notebook', '12000.00'),
(43, 'Cambio agarre del zocalo del procesador en el Mother', '4500.00'),
(44, 'Adicional limpieza completa interior de la CPU con lubricacion de coolers(Computadora gamer)', '2350.00'),
(45, 'Limpieza interna del circuito de refrigeracion de Notebook', '9100.00'),
(46, 'Limpieza lente y ajuste de Foco camara CCTV', '2500.00'),
(47, 'Gestion de Garantia de Discos Rigidos', '4500.00'),
(48, 'Configuracion de parametros de red TCP/IP', '1250.00'),
(49, 'Configuracion de discos compartidos', '1250.00'),
(50, 'Configuracion de impresora compartida', '1250.00'),
(51, 'Configuracion de usuarios, permisos y carpetas compartidas (por usuario)', '1250.00'),
(52, 'Configuracion Router para ADSL', '3500.00'),
(53, 'Configuracion Router con WiFi para ADSL', '4500.00'),
(54, 'Configuracion Access Point WiFi', '4500.00'),
(55, 'Configuracion Software administracion remota de server', '2500.00'),
(56, 'Configuracion Router ADSL para traspaso de puertos', '4500.00'),
(57, 'Configuracion servicio no-ip, DynDNS, etc', '4500.00'),
(58, 'Contratacion anual servicio No-Ip', '4500.00'),
(59, 'Configuracion de PC que comparte internet', '2500.00'),
(60, 'Armado e bocas de red', '2500.00'),
(61, 'Armado de Pared Tecnica (Router + Switch)', '4500.00'),
(62, 'Armado Rack de comunicaciones', '5500.00'),
(63, 'Desinstalacion equipos de red (Router + Switch)', '4500.00'),
(64, 'Puesta en lugar y configuracion de red en Server', '2600.00'),
(65, 'Configuracion Print Server', '2350.00'),
(66, 'Configuracion servidor VPN', '13000.00'),
(67, 'Configuracion cliente VPN', '2500.00'),
(68, 'Actualizacion Firmware Router / AP / WiFi', '3500.00'),
(69, 'Montaje Camara de video para DVR', '2500.00'),
(70, 'Configuracion sistema DVR por ampliacion de camaras', '2350.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acople`
--
ALTER TABLE `acople`
  ADD PRIMARY KEY (`ID_acople`,`ID_Presupuesto`,`ID_servicios`),
  ADD KEY `ID_acople` (`ID_acople`,`ID_Presupuesto`,`ID_servicios`);

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
  ADD KEY `ID_Proced` (`ID_Proced`,`Descripcion`,`Precio$`),
  ADD KEY `ID_Proced_2` (`ID_Proced`,`Descripcion`,`Precio$`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
