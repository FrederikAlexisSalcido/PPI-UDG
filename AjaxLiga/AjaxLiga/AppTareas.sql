-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-04-2020 a las 08:35:09
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `AppTareas`
--
CREATE DATABASE IF NOT EXISTS `AppTareas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `AppTareas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tareas`
--

CREATE TABLE `Tareas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tareas`
--

INSERT INTO `Tareas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Escribir una sistesis', '					   Tengo que escribir una sintesis'),
(2, 'Programa de arreglos', '					   Hacer el ejemplo de arreglos'),
(3, 'Ver video youtube matrices', '					   Ver el video en yutube sobre multiplicacion de arreglos'),
(4, 'Responder el examen diagnostico', '		Responder el examen diagnostico publicado en classroom			   '),
(5, 'Hacer la presentacion powerpint', '					   Hacer la presentacion de powerpoint para la exposion del proximo martes'),
(6, 'Ir con Maria y Mario a hacer maqueta', '	Realizar maqueta en equipo junto con Maria y Mario				   ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
