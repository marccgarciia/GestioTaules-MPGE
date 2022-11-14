-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 16:30:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_gestiotaules`
--
CREATE DATABASE IF NOT EXISTS `bd_gestiotaules` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_gestiotaules`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camarero`
--

CREATE TABLE `tbl_camarero` (
  `Id_cam` int(11) NOT NULL,
  `Nombre_cam` varchar(50) NOT NULL,
  `Apellido_cam` varchar(50) NOT NULL,
  `Dni_cam` varchar(9) NOT NULL,
  `Telf_cam` int(9) NOT NULL,
  `Password_cam` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_camarero`
--

INSERT INTO `tbl_camarero` (`Id_cam`, `Nombre_cam`, `Apellido_cam`, `Dni_cam`, `Telf_cam`, `Password_cam`) VALUES
(1, 'Lucia', 'Beltran', '47599287M', 638132510, '25e68a4f7b2ec931715dbee1b34de9a0063cadc5'),
(2, 'Juan', 'Gonzalez', '57502572L', 666999666, '50770ab692c1eb63946f7314a2a1dd75bd1ccfb3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `Id_inc` int(11) NOT NULL,
  `sala_inc` int(11) NOT NULL,
  `mesa_inc` int(11) NOT NULL,
  `incidencia_inc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mantenimiento`
--

CREATE TABLE `tbl_mantenimiento` (
  `Id_man` int(11) NOT NULL,
  `Nombre_man` varchar(50) NOT NULL,
  `Apellido_man` varchar(50) NOT NULL,
  `Dni_man` varchar(9) NOT NULL,
  `Telf_cam` int(9) NOT NULL,
  `Password_man` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mantenimiento`
--

INSERT INTO `tbl_mantenimiento` (`Id_man`, `Nombre_man`, `Apellido_man`, `Dni_man`, `Telf_cam`, `Password_man`) VALUES
(1, 'Paco', 'Fernandez', '43492251X', 666999666, '90e0a60116e28f3b7b47ed3f46207ab4382363b2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `Id_mesa` int(11) NOT NULL,
  `capacidad_mesa` int(11) NOT NULL,
  `Estado` enum('ocupada','libre','mantenimiento') NOT NULL,
  `Sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`Id_mesa`, `capacidad_mesa`, `Estado`, `Sala`) VALUES
(1, 4, 'libre', 1),
(2, 4, 'libre', 1),
(3, 4, 'libre', 1),
(4, 2, 'libre', 1),
(5, 4, 'libre', 1),
(6, 4, 'libre', 1),
(7, 4, 'libre', 2),
(8, 4, 'libre', 2),
(9, 4, 'libre', 2),
(10, 4, 'libre', 2),
(11, 4, 'libre', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva_mesa`
--

CREATE TABLE `tbl_reserva_mesa` (
  `Id_reserva` int(11) NOT NULL,
  `Id_mesa` int(11) NOT NULL,
  `Id_cam` int(11) NOT NULL,
  `Dia_rm` date NOT NULL,
  `Hora_ini_rm` time NOT NULL,
  `Ocupacion_rm` int(11) NOT NULL,
  `Hora_final_rm` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reserva_mesa`
--

INSERT INTO `tbl_reserva_mesa` (`Id_reserva`, `Id_mesa`, `Id_cam`, `Dia_rm`, `Hora_ini_rm`, `Ocupacion_rm`, `Hora_final_rm`) VALUES
(162, 1, 1, '2022-11-10', '11:52:05', 4, '11:52:21'),
(163, 3, 1, '2022-11-10', '11:55:43', 1, '11:58:02'),
(164, 2, 1, '2022-11-10', '11:58:15', 2, '12:13:32'),
(165, 2, 1, '2022-11-10', '12:02:13', 2, '12:13:32'),
(166, 2, 1, '2022-11-10', '12:13:36', 1, '12:13:46'),
(167, 3, 1, '2022-11-10', '12:13:41', 1, '12:13:45'),
(168, 4, 1, '2022-11-10', '12:13:44', 1, '12:13:47'),
(169, 5, 1, '2022-11-10', '12:13:52', 5, '12:13:53'),
(170, 6, 1, '2022-11-10', '12:13:59', 4, '12:14:01'),
(171, 1, 1, '2022-11-10', '15:26:42', 4, '15:27:15'),
(172, 2, 1, '2022-11-10', '15:26:47', 3, '22:13:33'),
(173, 3, 1, '2022-11-10', '15:26:52', 4, '22:13:34'),
(174, 4, 1, '2022-11-10', '15:26:57', 2, '22:13:34'),
(175, 1, 1, '2022-11-10', '15:55:37', 1, '22:13:29'),
(176, 1, 1, '2022-11-10', '22:13:46', 4, '22:16:19'),
(177, 2, 1, '2022-11-10', '22:13:52', 3, '22:14:19'),
(178, 4, 1, '2022-11-11', '15:47:28', 1, '15:40:16'),
(179, 4, 1, '2022-11-11', '15:47:37', 1, '15:40:16'),
(180, 4, 1, '2022-11-11', '15:48:19', 1, '15:40:16'),
(181, 2, 1, '2022-11-11', '15:50:16', 4, '16:59:52'),
(182, 2, 1, '2022-11-11', '16:55:33', 1, '16:59:52'),
(183, 2, 1, '2022-11-11', '16:59:51', 1, '16:59:52'),
(184, 3, 1, '2022-11-11', '16:59:57', 1, '15:39:22'),
(185, 9, 1, '2022-11-11', '17:00:15', 2, '17:00:16'),
(186, 2, 1, '2022-11-11', '18:35:14', 4, '15:39:21'),
(187, 1, 1, '2022-11-13', '18:20:30', 4, '18:20:49'),
(188, 9, 1, '2022-11-14', '15:26:56', 4, '15:26:58'),
(189, 1, 1, '2022-11-14', '15:39:20', 3, '15:39:21'),
(190, 4, 1, '2022-11-14', '15:39:26', 2, '15:40:16'),
(191, 1, 1, '2022-11-14', '15:41:07', 4, '15:41:08'),
(192, 1, 1, '2022-11-14', '15:41:25', 3, '15:41:27'),
(193, 1, 2, '2022-11-14', '15:46:28', 4, '15:46:30'),
(194, 1, 2, '2022-11-14', '15:47:56', 4, '15:48:05'),
(195, 1, 1, '2022-11-14', '15:49:21', 3, '15:49:22'),
(196, 11, 1, '2022-11-14', '16:13:41', 4, '16:13:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva_sala`
--

CREATE TABLE `tbl_reserva_sala` (
  `Id_reserva_sala` int(11) NOT NULL,
  `Id_camarero` int(11) NOT NULL,
  `Dia_rs` int(11) NOT NULL,
  `Hora_rs` int(11) NOT NULL,
  `Id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sala`
--

CREATE TABLE `tbl_sala` (
  `Id_sala` int(11) NOT NULL,
  `capacidad_sala` int(11) NOT NULL,
  `nombre_sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_sala`
--

INSERT INTO `tbl_sala` (`Id_sala`, `capacidad_sala`, `nombre_sala`) VALUES
(1, 40, 'Terraza-1'),
(2, 32, 'Comedor-1'),
(3, 10, 'SalaPrivada-1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_camarero`
--
ALTER TABLE `tbl_camarero`
  ADD PRIMARY KEY (`Id_cam`);

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`Id_inc`),
  ADD KEY `mesa_inc` (`mesa_inc`),
  ADD KEY `sala_inc` (`sala_inc`);

--
-- Indices de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  ADD PRIMARY KEY (`Id_man`);

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`Id_mesa`);

--
-- Indices de la tabla `tbl_reserva_mesa`
--
ALTER TABLE `tbl_reserva_mesa`
  ADD PRIMARY KEY (`Id_reserva`),
  ADD KEY `Id_mesa` (`Id_mesa`),
  ADD KEY `Id_cam` (`Id_cam`);

--
-- Indices de la tabla `tbl_reserva_sala`
--
ALTER TABLE `tbl_reserva_sala`
  ADD PRIMARY KEY (`Id_reserva_sala`),
  ADD KEY `Id_reserva_sala` (`Id_reserva_sala`),
  ADD KEY `Id_camarero` (`Id_camarero`),
  ADD KEY `Id_reserva_sala_2` (`Id_reserva_sala`),
  ADD KEY `Id_sala` (`Id_sala`);

--
-- Indices de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD PRIMARY KEY (`Id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_camarero`
--
ALTER TABLE `tbl_camarero`
  MODIFY `Id_cam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `Id_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  MODIFY `Id_man` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `Id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva_mesa`
--
ALTER TABLE `tbl_reserva_mesa`
  MODIFY `Id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva_sala`
--
ALTER TABLE `tbl_reserva_sala`
  MODIFY `Id_reserva_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  MODIFY `Id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`mesa_inc`) REFERENCES `tbl_mesa` (`Id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_incidencia_ibfk_2` FOREIGN KEY (`sala_inc`) REFERENCES `tbl_sala` (`Id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_reserva_mesa`
--
ALTER TABLE `tbl_reserva_mesa`
  ADD CONSTRAINT `tbl_reserva_mesa_ibfk_1` FOREIGN KEY (`Id_cam`) REFERENCES `tbl_camarero` (`Id_cam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_mesa_ibfk_2` FOREIGN KEY (`Id_mesa`) REFERENCES `tbl_mesa` (`Id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_reserva_sala`
--
ALTER TABLE `tbl_reserva_sala`
  ADD CONSTRAINT `tbl_reserva_sala_ibfk_1` FOREIGN KEY (`Id_sala`) REFERENCES `tbl_sala` (`Id_sala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_sala_ibfk_2` FOREIGN KEY (`Id_camarero`) REFERENCES `tbl_camarero` (`Id_cam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
