-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 19:35:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(13) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `subtitulo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `autor` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `editorial` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `numejem` int(11) DEFAULT NULL,
  `numejemdisp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `ISBN`, `titulo`, `subtitulo`, `descripcion`, `autor`, `editorial`, `imagen`, `numejem`, `numejemdisp`) VALUES
(5, NULL, 'a', 'a', 'a', 'a', 'a', 'a', 1, 1),
(6, NULL, 'b', 'b', 'b', 'b', 'b', 'b', 1, 1),
(7, NULL, 'c', 'c', 'c', 'c', 'c', 'c', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
