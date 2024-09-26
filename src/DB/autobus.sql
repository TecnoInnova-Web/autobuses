-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2024 a las 21:18:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_autobuses`
--
CREATE DATABASE IF NOT EXISTS `db_autobuses` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_autobuses`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_autobuses`
--

CREATE TABLE `tbl_autobuses` (
  `id_autobus` int(11) NOT NULL,
  `codigo_autobus` int(11) NOT NULL,
  `placa_autobus` varchar(100) NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `color_autobus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_autobuses`
--

INSERT INTO `tbl_autobuses` (`id_autobus`, `codigo_autobus`, `placa_autobus`, `id_conductor`, `color_autobus`) VALUES
(1, 1, 'SQLASO', 1, 'VERDE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conductor`
--

CREATE TABLE `tbl_conductor` (
  `id_condutor` int(11) NOT NULL,
  `nombre_co` varchar(100) NOT NULL,
  `apellido_co` varchar(100) NOT NULL,
  `telefono_co` varchar(100) NOT NULL,
  `direccion_co` varchar(100) NOT NULL,
  `edad_co` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_conductor`
--

INSERT INTO `tbl_conductor` (`id_condutor`, `nombre_co`, `apellido_co`, `telefono_co`, `direccion_co`, `edad_co`) VALUES
(1, 'Jorge', 'Ferrer', '0424-6334784', 'Maracaibo', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id_horario` int(11) NOT NULL,
  `placa_autobus` varchar(100) NOT NULL,
  `hora_salida_cañ` int(11) NOT NULL,
  `hora_llegada_cañ` int(11) NOT NULL,
  `hora_salida_mcbo` int(11) NOT NULL,
  `hora_llegada_mcbo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_horario`
--

INSERT INTO `tbl_horario` (`id_horario`, `placa_autobus`, `hora_salida_cañ`, `hora_llegada_cañ`, `hora_salida_mcbo`, `hora_llegada_mcbo`) VALUES
(1, 'SQLASO', 11, 24, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas`
--

CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta_frec` varchar(100) NOT NULL,
  `respuesta_frec` varchar(100) NOT NULL,
  `fecha_ini` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_autobuses`
--
ALTER TABLE `tbl_autobuses`
  ADD PRIMARY KEY (`id_autobus`),
  ADD UNIQUE KEY `placa_autobus_3` (`placa_autobus`),
  ADD KEY `placa_autobus` (`placa_autobus`),
  ADD KEY `placa_autobus_2` (`placa_autobus`);

--
-- Indices de la tabla `tbl_conductor`
--
ALTER TABLE `tbl_conductor`
  ADD PRIMARY KEY (`id_condutor`);

--
-- Indices de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `placa_autobus` (`placa_autobus`);

--
-- Indices de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_autobuses`
--
ALTER TABLE `tbl_autobuses`
  MODIFY `id_autobus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_conductor`
--
ALTER TABLE `tbl_conductor`
  MODIFY `id_condutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_autobuses`
--
ALTER TABLE `tbl_autobuses`
  ADD CONSTRAINT `tbl_autobuses_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `tbl_conductor` (`id_condutor`);

--
-- Filtros para la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD CONSTRAINT `tbl_horario_ibfk_1` FOREIGN KEY (`placa_autobus`) REFERENCES `tbl_autobuses` (`placa_autobus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
