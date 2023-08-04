-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-08-2023 a las 22:37:26
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `college`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `hourly_intensity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `hourly_intensity`, `created_at`, `updated_at`) VALUES
(21, 'Mysql', 100, '2023-08-04 17:34:12', '2023-08-04 17:34:12'),
(22, 'Python', 150, '2023-08-04 17:34:12', '2023-08-04 17:34:12'),
(23, 'Java', 120, '2023-08-04 22:35:22', '2023-08-04 22:35:22'),
(24, 'JavaScript', 200, '2023-08-04 23:21:59', '2023-08-04 23:21:59'),
(25, 'Mongo', 150, '2023-08-04 23:22:13', '2023-08-04 23:22:13'),
(26, 'Django', 200, '2023-08-04 23:22:34', '2023-08-04 23:22:34'),
(27, 'Angular', 180, '2023-08-04 23:22:45', '2023-08-04 23:22:45'),
(28, 'SQL', 80, '2023-08-04 23:25:37', '2023-08-04 23:25:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(250) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2023-08-04 17:32:48', '2023-08-04 17:32:48'),
(2, 'Alumno', '2023-08-04 17:33:15', '2023-08-04 17:33:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `rememberToken` varchar(250) DEFAULT NULL,
  `id_profile` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rememberToken`, `id_profile`, `created_at`, `updated_at`) VALUES
(7, 'admin', 'admin@mail.com', NULL, '$2y$10$F13ZmBrnatyObCflpyyvGO8TEIgWkIv5IiUM1HmLWMeklvZZKdvLe', NULL, 1, '2023-08-04 23:21:30', '2023-08-04 23:21:30'),
(8, 'alumno1', 'alumno1@mail.com', NULL, '$2y$10$O8Sn/tWKcS2Hh6ujcprzNuDy.cAGFnW9m9lXNvB96DaoMztCnlh6u', NULL, 2, '2023-08-04 23:23:15', '2023-08-04 23:23:15'),
(9, 'alumno2', 'alumno2@mail.com', NULL, '$2y$10$P1jRXtx6BeCgaP76TGRnIuhyPAkaS2CxyfvyXICVtOX3zuzkki87G', NULL, 2, '2023-08-04 23:23:41', '2023-08-04 23:23:41'),
(10, 'alumno3', 'alumno3@mail.com', NULL, '$2y$10$lxBM95xX/h9kenj.vOhqS.6O3psoXji6P/jV.crYhqrwyebGcC1r2', NULL, 2, '2023-08-04 23:24:04', '2023-08-04 23:24:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_courses`
--

CREATE TABLE `users_courses` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_course` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_courses`
--

INSERT INTO `users_courses` (`id`, `id_user`, `id_course`, `created_at`, `updated_at`) VALUES
(1, 5, 21, '2023-08-04 22:42:42', '2023-08-04 22:42:42'),
(2, 5, 22, '2023-08-04 22:42:57', '2023-08-04 22:42:57'),
(3, 6, 23, '2023-08-04 22:43:05', '2023-08-04 22:43:05'),
(4, 8, 21, '2023-08-04 23:24:17', '2023-08-04 23:24:17'),
(5, 8, 23, '2023-08-04 23:24:34', '2023-08-04 23:24:34'),
(6, 9, 22, '2023-08-04 23:25:13', '2023-08-04 23:25:13'),
(7, 9, 26, '2023-08-04 23:25:23', '2023-08-04 23:25:23'),
(8, 9, 28, '2023-08-04 23:25:48', '2023-08-04 23:25:48'),
(9, 10, 24, '2023-08-04 23:26:02', '2023-08-04 23:26:02'),
(10, 10, 27, '2023-08-04 23:26:14', '2023-08-04 23:26:14'),
(11, 10, 25, '2023-08-04 23:26:27', '2023-08-04 23:26:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_courses`
--
ALTER TABLE `users_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users_courses`
--
ALTER TABLE `users_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
