-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 15:05:43
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

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
  `Password_cam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_camarero`
--

INSERT INTO `tbl_camarero` (`Id_cam`, `Nombre_cam`, `Apellido_cam`, `Dni_cam`, `Telf_cam`, `Password_cam`) VALUES
(1, 'Lucia', 'Beltran', '47599287M', 638132510, 'Lucia1234@');

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
(9, 4, 'ocupada', 2);

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
(170, 6, 1, '2022-11-10', '12:13:59', 4, '12:14:01');

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
  MODIFY `Id_cam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `Id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva_mesa`
--
ALTER TABLE `tbl_reserva_mesa`
  MODIFY `Id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

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
