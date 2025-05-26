-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2025 a las 02:25:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos_cee`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_e` int(11) NOT NULL,
  `cursos` varchar(100) NOT NULL,
  `fecha_curso` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario_creador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_e`, `cursos`, `fecha_curso`, `fecha_creacion`, `id_usuario_creador`) VALUES
(1, 'plataformero ', '2025-05-26', '2025-05-24 18:01:50', 3),
(2, 'soldaduras', '2025-05-27', '2025-05-24 18:01:50', 3),
(3, 'equipo pesado', '2025-05-28', '2025-05-24 18:01:50', 3),
(4, 'Mantenimiento de vehículos ', '2025-05-29', '2025-05-24 18:01:50', 3),
(27, 'Mantenimiento de vehiculos', '2025-05-24', '2025-05-24 05:00:00', 4),
(28, 'Mantenimiento de vehiculos', '2025-05-24', '2025-05-24 05:00:00', 4),
(29, 'Soldaduras', '2025-05-27', '2025-05-24 05:00:00', 5),
(30, 'plataformero', '2025-05-26', '2025-05-24 05:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha_inscripcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `id_usuario`, `id_curso`, `fecha_inscripcion`) VALUES
(2, 3, 1, '2025-05-24'),
(3, 3, 2, '2025-05-24'),
(4, 3, 4, '2025-05-24'),
(5, 3, 4, '2025-05-24'),
(6, 4, 4, '2025-05-24'),
(7, 4, 27, '2025-05-24'),
(8, 4, 2, '2025-05-24'),
(9, 4, 1, '2025-05-24'),
(10, 5, 29, '2025-05-24'),
(11, 5, 30, '2025-05-24'),
(12, 3, 1, '2025-05-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT current_timestamp(),
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `fecha_inscripcion`, `contraseña`) VALUES
(3, 'Frank', 'frank123@gmail', '2025-05-22 21:04:12', '123456'),
(4, 'Luis', 'luis1@gmail.com', '2025-05-24 18:49:32', '12345'),
(5, 'Gabriela', 'gabriela12345@gmail.com', '2025-05-24 18:53:34', '123'),
(6, 'alex', 'alesan2526@gmail.com', '2025-05-24 18:53:52', '1234'),
(8, 'Carlos', 'carlos12345@gmailcom', '2025-05-24 18:54:36', '1234567'),
(9, 'Ana', 'ana12345@gmail.com', '2025-05-24 18:54:59', '12345678'),
(10, 'Fernando', 'fernando12345@gmail.com', '2025-05-24 18:55:20', '123456789'),
(11, 'Sofia', 'sofia12345@gmail.com', '2025-05-24 18:55:51', '12345678910'),
(12, 'Marco', 'marco12345@gmail.com', '2025-05-24 18:56:23', '1234567891011'),
(13, 'Pablo', 'pablo12345@gmail.com', '2025-05-24 18:57:04', '3456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `fk_curso_usuario` (`id_usuario_creador`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_curso_usuario` FOREIGN KEY (`id_usuario_creador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_e`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
