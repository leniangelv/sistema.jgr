-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2023 a las 23:13:00
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
-- Base de datos: `jgr_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jgr_auth`
--

CREATE TABLE `jgr_auth` (
  `id` int(11) NOT NULL,
  `auth` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jgr_ci`
--

CREATE TABLE `jgr_ci` (
  `id` int(11) NOT NULL,
  `ci` varchar(100) NOT NULL,
  `nacionality` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jgr_ci`
--

INSERT INTO `jgr_ci` (`id`, `ci`, `nacionality`, `name`) VALUES
(3, '28482348', '', 'Admin'),
(27, '11124799', NULL, 'Alnordo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jgr_data`
--

CREATE TABLE `jgr_data` (
  `id` int(11) NOT NULL,
  `cedula_id` varchar(100) NOT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `token` varchar(100) NOT NULL DEFAULT 'not-token-avild',
  `role_id` int(11) DEFAULT 2,
  `status` varchar(100) DEFAULT 'no activo',
  `callback` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jgr_data`
--

INSERT INTO `jgr_data` (`id`, `cedula_id`, `email_id`, `password`, `token`, `role_id`, `status`, `callback`) VALUES
(1, '3', NULL, '28482348', 'not-token-defined', 1, 'active', NULL),
(13, '27', NULL, '11124799', 'not-token-avild', 2, 'no activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jgr_emails`
--

CREATE TABLE `jgr_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jgr_files`
--

CREATE TABLE `jgr_files` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp(),
  `creathe_by` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jgr_files`
--

INSERT INTO `jgr_files` (`id`, `title`, `description`, `url`, `type`, `date_save`, `creathe_by`, `auth_id`) VALUES
(18, 'titulo', '786hy7', 'uploaded_files/1686886195comentario.png', 'image/png', '2023-06-16 03:29:55', 1, 1),
(19, 'rfr66rf', 'rtftr', 'uploaded_files/1686886262file.pdf', 'application/pdf', '2023-06-16 03:31:02', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jgr_roles`
--

CREATE TABLE `jgr_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jgr_roles`
--

INSERT INTO `jgr_roles` (`id`, `role`, `description`) VALUES
(1, '1', 'Administrador'),
(2, '2', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `expires` int(11) UNSIGNED NOT NULL,
  `data` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`session_id`, `expires`, `data`) VALUES
('3P7qeAbAEhNd6qBpwGK4XJiueVnyR8Tc', 1686431097, '{\"cookie\":{\"originalMaxAge\":null,\"expires\":null,\"httpOnly\":true,\"path\":\"/\"},\"flash\":{},\"passport\":{\"user\":3}}'),
('4SKH5pXU8IcSLMKci2LdqS5BaK1Al-GT', 1686480636, '{\"cookie\":{\"originalMaxAge\":null,\"expires\":null,\"httpOnly\":true,\"path\":\"/\"},\"flash\":{}}'),
('CeJf50MBDvDZi2gq3gwd3epuzO8DpycW', 1686445760, '{\"cookie\":{\"originalMaxAge\":null,\"expires\":null,\"httpOnly\":true,\"path\":\"/\"},\"flash\":{}}'),
('SsUeP4zq494mvqM5Hl6lOeehpYikil-e', 1686447111, '{\"cookie\":{\"originalMaxAge\":null,\"expires\":null,\"httpOnly\":true,\"path\":\"/\"},\"flash\":{}}');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jgr_auth`
--
ALTER TABLE `jgr_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jgr_ci`
--
ALTER TABLE `jgr_ci`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jgr_data`
--
ALTER TABLE `jgr_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jgr_emails`
--
ALTER TABLE `jgr_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jgr_files`
--
ALTER TABLE `jgr_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jgr_roles`
--
ALTER TABLE `jgr_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jgr_auth`
--
ALTER TABLE `jgr_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jgr_ci`
--
ALTER TABLE `jgr_ci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `jgr_data`
--
ALTER TABLE `jgr_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `jgr_emails`
--
ALTER TABLE `jgr_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jgr_files`
--
ALTER TABLE `jgr_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `jgr_roles`
--
ALTER TABLE `jgr_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
