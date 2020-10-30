-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2020 a las 18:54:00
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2daw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `dni` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `cargo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `dni`, `nombre`, `apellidos`, `email`, `telefono`, `fechanac`, `cargo`, `estado`) VALUES
(2, '47526684-B', 'Antonio', 'Almeida', 'antonioal@gmail.com', '632335544', '2000-05-09', 'RRHH', 'Activo'),
(7, '34454398-F', 'Manolo', 'Gómez', 'manologomez@gmail.com', '65625998', '1998-05-10', 'Director técnico', 'activo'),
(10, '34454391-F', 'Uno', '1', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(11, '34454392-F', 'Dos', '2', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(12, '34454393-F', 'Tres', '3', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(13, '34454394-F', 'Cuatro', '4', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(14, '34454395-F', 'Cinco', '5', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(15, '34454396-F', 'Seis', '6', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(16, '34454397-F', 'Siete', '7', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo'),
(17, '34454398-F', 'Ocho', '8', 'luis@gmail.com', '646251447', '1998-05-10', 'CEO2', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
