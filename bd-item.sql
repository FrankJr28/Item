-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2022 a las 20:34:48
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `item`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adaptador`
--

CREATE TABLE `adaptador` (
  `id_a` bigint(11) NOT NULL,
  `marca_a` varchar(20) NOT NULL,
  `modelo_a` varchar(18) NOT NULL,
  `obs_a` varchar(75) NOT NULL,
  `disp_a` bit(1) NOT NULL,
  `actS_a` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adaptador`
--

INSERT INTO `adaptador` (`id_a`, `marca_a`, `modelo_a`, `obs_a`, `disp_a`, `actS_a`) VALUES
(10, 'Manhatan', 'oj19hdmi', '', b'1', b'1'),
(11, 'Genius', 'oj20vga', '', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adaptadorentradas`
--

CREATE TABLE `adaptadorentradas` (
  `id_a` bigint(11) NOT NULL,
  `id_e` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `codigo_a` bigint(11) NOT NULL,
  `nombre_a` varchar(25) NOT NULL,
  `app_a` varchar(25) NOT NULL,
  `apm_a` varchar(25) NOT NULL,
  `correo_a` varchar(55) NOT NULL,
  `contra_a` varchar(25) NOT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `actS_a` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`codigo_a`, `nombre_a`, `app_a`, `apm_a`, `correo_a`, `contra_a`, `telefono`, `actS_a`) VALUES
(1000, 'Francisco Javier', 'Vasquez', 'Jr', 'francisco.vasquezjr@alumnos.udg.mx', 'fra123', 3411490107, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bocina`
--

CREATE TABLE `bocina` (
  `id_b` bigint(11) NOT NULL,
  `marca_b` varchar(20) NOT NULL,
  `modelo_b` varchar(18) NOT NULL,
  `obs_b` varchar(75) NOT NULL,
  `disp_b` bit(1) NOT NULL,
  `actS_b` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bocina`
--

INSERT INTO `bocina` (`id_b`, `marca_b`, `modelo_b`, `obs_b`, `disp_b`, `actS_b`) VALUES
(20210301, 'logitech', 'B12', '', b'1', b'1'),
(20210302, 'logitech', 'B12', '', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cable`
--

CREATE TABLE `cable` (
  `id_c` bigint(11) NOT NULL,
  `marca_c` varchar(20) NOT NULL,
  `id_tc` int(3) DEFAULT NULL,
  `disp_c` bit(1) NOT NULL DEFAULT b'1',
  `actS_c` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cable`
--

INSERT INTO `cable` (`id_c`, `marca_c`, `id_tc`, `disp_c`, `actS_c`) VALUES
(20190401, 'Manhatan', 1, b'1', b'1'),
(20190402, 'Genérico', 2, b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_car` int(3) NOT NULL,
  `carrera` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_car`, `carrera`) VALUES
(1, 'Abogado'),
(2, 'Agrobiotecnología'),
(3, 'Agronegocios'),
(4, 'Cirujano dentista'),
(5, 'Cultura Física y Deportes'),
(6, 'Desarrollo Turístico Sustentab'),
(7, 'Cultura Física y Deportes'),
(8, 'Desarrollo Turístico Sustentab');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `id_edi` int(5) NOT NULL,
  `edificio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`id_edi`, `edificio`) VALUES
(1, 'Edificio C'),
(2, 'Edificio F'),
(3, 'Edificio G'),
(4, 'Edificio L'),
(5, 'Edificio P'),
(6, 'Edificio Q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_e` int(5) NOT NULL,
  `entrada` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_e`, `entrada`) VALUES
(1, 'HDMI'),
(2, 'VGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_adapt`
--

CREATE TABLE `esp_adapt` (
  `codigo_u` bigint(10) DEFAULT NULL,
  `id_a` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `esp_adapt`
--

INSERT INTO `esp_adapt` (`codigo_u`, `id_a`) VALUES
(3000000013, 11),
(2176953848, 10),
(3000000013, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_boc`
--

CREATE TABLE `esp_boc` (
  `codigo_u` bigint(10) NOT NULL,
  `id_b` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `esp_boc`
--

INSERT INTO `esp_boc` (`codigo_u`, `id_b`) VALUES
(3000000013, 20210301);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_cab`
--

CREATE TABLE `esp_cab` (
  `codigo_u` bigint(10) NOT NULL,
  `id_c` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `esp_cab`
--

INSERT INTO `esp_cab` (`codigo_u`, `id_c`) VALUES
(3000000013, 20190402),
(3000000013, 20190402),
(3000000013, 20190401);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_lap`
--

CREATE TABLE `esp_lap` (
  `codigo_u` bigint(10) NOT NULL,
  `id_l` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_proy`
--

CREATE TABLE `esp_proy` (
  `codigo_u` bigint(10) NOT NULL,
  `id_p` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laptop`
--

CREATE TABLE `laptop` (
  `id_l` bigint(11) NOT NULL,
  `marca_l` varchar(20) NOT NULL,
  `modelo_l` varchar(18) NOT NULL,
  `obs_l` varchar(75) NOT NULL,
  `disp_l` bit(1) NOT NULL,
  `actS_l` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laptop`
--

INSERT INTO `laptop` (`id_l`, `marca_l`, `modelo_l`, `obs_l`, `disp_l`, `actS_l`) VALUES
(2021004, 'Acer', 'pan6328', '', b'1', b'1'),
(2021005, 'Acer', 'pan6328', '', b'1', b'1'),
(2021006, 'Acer', 'Aspire 3', '', b'1', b'1'),
(20210010, 'Dell', 'Inspiron30', '', b'1', b'1'),
(20210011, 'Dell', 'Inspiron30', '', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_pres` bigint(10) NOT NULL,
  `id_ubi` int(5) DEFAULT NULL,
  `solicitud` datetime NOT NULL DEFAULT current_timestamp(),
  `inicio` datetime DEFAULT NULL,
  `finalizo` datetime DEFAULT NULL,
  `codigo_a` bigint(10) DEFAULT NULL,
  `codigo_u` bigint(10) DEFAULT NULL,
  `activo_pres` bit(1) NOT NULL,
  `nota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_pres`, `id_ubi`, `solicitud`, `inicio`, `finalizo`, `codigo_a`, `codigo_u`, `activo_pres`, `nota`) VALUES
(1, 1, '2022-03-31 10:33:02', '2022-03-31 14:42:17', '2022-03-31 16:40:53', 1000, 2188874217, b'0', NULL),
(2, 2, '2022-03-31 10:37:24', '2022-03-31 14:42:24', NULL, 1000, 218887456, b'0', NULL),
(3, 1, '2022-03-31 10:38:06', '2022-03-31 14:42:29', NULL, 1000, 218887456, b'0', NULL),
(4, 2, '2022-03-31 10:39:32', '2022-03-31 14:45:01', NULL, 1000, 218887456, b'0', NULL),
(5, 2, '2022-03-31 10:39:32', '2022-03-31 14:45:32', NULL, 1000, 2188874217, b'0', NULL),
(6, 12, '2022-03-31 11:04:31', '2022-03-31 14:47:05', '2022-03-31 15:48:31', 1000, 2175423186, b'0', NULL),
(7, 10, '2022-03-31 11:04:31', '2022-03-31 14:47:11', '2022-03-31 15:45:57', 1000, 2175968332, b'0', NULL),
(8, 12, '2022-03-31 11:06:01', '2022-03-31 16:40:27', NULL, 1000, 2175968332, b'0', NULL),
(10, 15, '2022-03-31 11:07:11', '2022-03-31 19:06:38', '2022-03-31 19:06:38', 1000, 218887456, b'0', NULL),
(11, 11, '2022-03-31 11:07:11', '2022-04-08 12:00:36', NULL, 1000, 2175423186, b'0', NULL),
(13, 11, '2022-03-31 11:08:07', NULL, NULL, 1000, 2175423186, b'0', NULL),
(14, 15, '2022-03-31 11:09:11', NULL, NULL, 1000, 2176953848, b'0', NULL),
(16, 11, '2022-03-31 16:31:39', NULL, NULL, 1000, 2175968332, b'0', NULL),
(17, 14, '2022-03-31 16:31:39', NULL, NULL, 1000, 2175968332, b'0', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_adapt`
--

CREATE TABLE `pres_adapt` (
  `id_pres` bigint(10) NOT NULL,
  `id_a` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_boc`
--

CREATE TABLE `pres_boc` (
  `id_pres` bigint(10) NOT NULL,
  `id_b` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_boc`
--

INSERT INTO `pres_boc` (`id_pres`, `id_b`) VALUES
(8, 20210301),
(1, 20210302),
(6, 20210301),
(2, 20210302);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_cab`
--

CREATE TABLE `pres_cab` (
  `id_pres` bigint(10) NOT NULL,
  `id_c` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_lap`
--

CREATE TABLE `pres_lap` (
  `id_pres` bigint(10) NOT NULL,
  `id_l` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_lap`
--

INSERT INTO `pres_lap` (`id_pres`, `id_l`) VALUES
(8, 2021004),
(1, 2021005),
(6, 2021004),
(2, 2021004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_proy`
--

CREATE TABLE `pres_proy` (
  `id_pres` bigint(10) NOT NULL,
  `id_p` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_proy`
--

INSERT INTO `pres_proy` (`id_pres`, `id_p`) VALUES
(1, 1914221),
(8, 1914220),
(6, 1914220),
(6, 1914221);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyector`
--

CREATE TABLE `proyector` (
  `id_p` bigint(11) NOT NULL,
  `marca_p` varchar(20) NOT NULL,
  `modelo_p` varchar(18) NOT NULL,
  `obs_p` varchar(75) NOT NULL,
  `disp_p` bit(1) NOT NULL,
  `actS_p` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyector`
--

INSERT INTO `proyector` (`id_p`, `marca_p`, `modelo_p`, `obs_p`, `disp_p`, `actS_p`) VALUES
(1914220, '3M', 'X20', '', b'1', b'1'),
(1914221, 'DELL', 'dx034', '', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocable`
--

CREATE TABLE `tipocable` (
  `id_tc` int(3) NOT NULL,
  `conexion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocable`
--

INSERT INTO `tipocable` (`id_tc`, `conexion`) VALUES
(1, 'HDMI'),
(2, 'VGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubi` int(5) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `id_edi` int(5) DEFAULT NULL,
  `actS_Ubi` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubi`, `ubicacion`, `id_edi`, `actS_Ubi`) VALUES
(1, 'Aula A', 1, b'1'),
(2, 'Aula B', 1, b'1'),
(6, 'F1', 2, b'1'),
(7, 'F2', 2, b'1'),
(8, 'F3', 2, b'1'),
(9, 'F4', 2, b'1'),
(10, 'F5', 2, b'1'),
(11, 'F6', 2, b'1'),
(12, 'F7', 2, b'1'),
(13, 'F8', 2, b'1'),
(14, 'F9', NULL, b'0'),
(15, 'F10', 2, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_u` bigint(10) NOT NULL,
  `nombre_u` varchar(25) NOT NULL,
  `app_u` varchar(25) NOT NULL,
  `apm_u` varchar(25) NOT NULL,
  `correo_u` varchar(60) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `semestre` int(2) NOT NULL,
  `id_car` int(3) DEFAULT NULL,
  `cred_u` varchar(100) NOT NULL,
  `link_photo` varchar(500) NOT NULL,
  `hol_u` bit(1) NOT NULL,
  `contra_u` varchar(25) NOT NULL,
  `actS_u` bit(1) NOT NULL,
  `banned` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_u`, `nombre_u`, `app_u`, `apm_u`, `correo_u`, `telefono`, `semestre`, `id_car`, `cred_u`, `link_photo`, `hol_u`, `contra_u`, `actS_u`, `banned`) VALUES
(218887456, 'Joaquin', 'Leonardo', 'Lázaro', 'joaquinll@alumnos.udg.mx', 3429874561, 2, 6, '', '', b'1', 'joa123', b'1', b'0'),
(2175423186, 'Karina', 'Vargas', 'López', 'karina.vargaslop@alumnos.udg.mx', 3416598742, 7, 6, '', '', b'1', 'kar123', b'1', b'0'),
(2175968332, 'José', 'Velasco', 'Medina', 'jose.velasco332@alumnos.udg.mx', 3329685347, 6, 3, '', '', b'1', 'jos123', b'1', b'0'),
(2176953848, 'German', 'Fermin', 'Castolo', 'german.ferminc@alumnos.udg.mx', 3426935287, 1, 3, '', '', b'1', 'ger123', b'1', b'0'),
(2188874217, 'Manuel', 'Jiménez', 'Ortega', 'manuel.jo@alumnos.udg.mx', 3465559865, 3, 1, '', '', b'1', 'man123', b'1', b'0'),
(3000000013, 'FRANCISCO JAVIER', 'VASQUEZ', 'JR', 'francisco.vasquezjr@alumnos.udg.mx', 0, 0, NULL, '', 'https://lh3.googleusercontent.com/a/AATXAJwQCQ0TIP8wam_jx95_PNkWBXvZvvhdkAgBTfPP=s96-c', b'0', '', b'0', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adaptador`
--
ALTER TABLE `adaptador`
  ADD PRIMARY KEY (`id_a`);

--
-- Indices de la tabla `adaptadorentradas`
--
ALTER TABLE `adaptadorentradas`
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_e` (`id_e`);

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`codigo_a`);

--
-- Indices de la tabla `bocina`
--
ALTER TABLE `bocina`
  ADD PRIMARY KEY (`id_b`);

--
-- Indices de la tabla `cable`
--
ALTER TABLE `cable`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `id_tc` (`id_tc`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_car`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`id_edi`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_e`);

--
-- Indices de la tabla `esp_adapt`
--
ALTER TABLE `esp_adapt`
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_a` (`id_a`);

--
-- Indices de la tabla `esp_boc`
--
ALTER TABLE `esp_boc`
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_b` (`id_b`);

--
-- Indices de la tabla `esp_cab`
--
ALTER TABLE `esp_cab`
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_c` (`id_c`);

--
-- Indices de la tabla `esp_lap`
--
ALTER TABLE `esp_lap`
  ADD KEY `esp_lap_ibfk_1` (`codigo_u`),
  ADD KEY `id_l` (`id_l`);

--
-- Indices de la tabla `esp_proy`
--
ALTER TABLE `esp_proy`
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_p` (`id_p`);

--
-- Indices de la tabla `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_l`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_pres`),
  ADD KEY `codigo_a` (`codigo_a`),
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_ubi` (`id_ubi`);

--
-- Indices de la tabla `pres_adapt`
--
ALTER TABLE `pres_adapt`
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_pres` (`id_pres`);

--
-- Indices de la tabla `pres_boc`
--
ALTER TABLE `pres_boc`
  ADD KEY `id_b` (`id_b`),
  ADD KEY `id_pres` (`id_pres`);

--
-- Indices de la tabla `pres_cab`
--
ALTER TABLE `pres_cab`
  ADD KEY `id_c` (`id_c`),
  ADD KEY `id_pres` (`id_pres`);

--
-- Indices de la tabla `pres_lap`
--
ALTER TABLE `pres_lap`
  ADD KEY `id_l` (`id_l`),
  ADD KEY `id_pres` (`id_pres`);

--
-- Indices de la tabla `pres_proy`
--
ALTER TABLE `pres_proy`
  ADD KEY `id_p` (`id_p`),
  ADD KEY `id_pres` (`id_pres`);

--
-- Indices de la tabla `proyector`
--
ALTER TABLE `proyector`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `tipocable`
--
ALTER TABLE `tipocable`
  ADD PRIMARY KEY (`id_tc`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubi`),
  ADD KEY `id_edi` (`id_edi`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_u`),
  ADD KEY `id_car` (`id_car`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adaptador`
--
ALTER TABLE `adaptador`
  MODIFY `id_a` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `codigo_a` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT de la tabla `bocina`
--
ALTER TABLE `bocina`
  MODIFY `id_b` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210303;

--
-- AUTO_INCREMENT de la tabla `cable`
--
ALTER TABLE `cable`
  MODIFY `id_c` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20190403;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_car` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_e` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id_l` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210012;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_pres` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `proyector`
--
ALTER TABLE `proyector`
  MODIFY `id_p` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1914222;

--
-- AUTO_INCREMENT de la tabla `tipocable`
--
ALTER TABLE `tipocable`
  MODIFY `id_tc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_u` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000000014;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adaptadorentradas`
--
ALTER TABLE `adaptadorentradas`
  ADD CONSTRAINT `adaptadorentradas_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `adaptador` (`id_a`),
  ADD CONSTRAINT `adaptadorentradas_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `adaptador` (`id_a`),
  ADD CONSTRAINT `adaptadorentradas_ibfk_3` FOREIGN KEY (`id_e`) REFERENCES `entrada` (`id_e`);

--
-- Filtros para la tabla `cable`
--
ALTER TABLE `cable`
  ADD CONSTRAINT `cable_ibfk_1` FOREIGN KEY (`id_tc`) REFERENCES `tipocable` (`id_tc`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `esp_adapt`
--
ALTER TABLE `esp_adapt`
  ADD CONSTRAINT `esp_adapt_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esp_adapt_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `adaptador` (`id_a`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `esp_boc`
--
ALTER TABLE `esp_boc`
  ADD CONSTRAINT `esp_boc_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esp_boc_ibfk_2` FOREIGN KEY (`id_b`) REFERENCES `bocina` (`id_b`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `esp_cab`
--
ALTER TABLE `esp_cab`
  ADD CONSTRAINT `esp_cab_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esp_cab_ibfk_2` FOREIGN KEY (`id_c`) REFERENCES `cable` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `esp_lap`
--
ALTER TABLE `esp_lap`
  ADD CONSTRAINT `esp_lap_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esp_lap_ibfk_2` FOREIGN KEY (`id_l`) REFERENCES `laptop` (`id_l`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `esp_proy`
--
ALTER TABLE `esp_proy`
  ADD CONSTRAINT `esp_proy_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esp_proy_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `proyector` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`codigo_a`) REFERENCES `admin` (`codigo_a`) ON DELETE SET NULL,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE SET NULL,
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`id_ubi`) REFERENCES `ubicacion` (`id_ubi`) ON DELETE SET NULL;

--
-- Filtros para la tabla `pres_adapt`
--
ALTER TABLE `pres_adapt`
  ADD CONSTRAINT `pres_adapt_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `adaptador` (`id_a`),
  ADD CONSTRAINT `pres_adapt_ibfk_2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_boc`
--
ALTER TABLE `pres_boc`
  ADD CONSTRAINT `pres_boc_ibfk_1` FOREIGN KEY (`id_b`) REFERENCES `bocina` (`id_b`),
  ADD CONSTRAINT `pres_boc_ibfk_2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_cab`
--
ALTER TABLE `pres_cab`
  ADD CONSTRAINT `pres_cab_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cable` (`id_c`),
  ADD CONSTRAINT `pres_cab_ibfk_2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_lap`
--
ALTER TABLE `pres_lap`
  ADD CONSTRAINT `pres_lap_ibfk_1` FOREIGN KEY (`id_l`) REFERENCES `laptop` (`id_l`),
  ADD CONSTRAINT `pres_lap_ibfk_2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_proy`
--
ALTER TABLE `pres_proy`
  ADD CONSTRAINT `pres_proy_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `proyector` (`id_p`),
  ADD CONSTRAINT `pres_proy_ibfk_2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`id_edi`) REFERENCES `edificio` (`id_edi`) ON DELETE SET NULL;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `carrera` (`id_car`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
