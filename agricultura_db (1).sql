-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2026 a las 16:27:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agricultura_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Semillas', 'Semillas para diferentes cultivos'),
(2, 'Fertilizantes', 'Productos para mejorar el crecimiento'),
(3, 'Herramientas', 'Herramientas para trabajo agrícola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivos`
--

CREATE TABLE `cultivos` (
  `id_cultivo` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `tipo` enum('fruta','verdura','cereal','leguminosa','tuberculo','otro') DEFAULT 'otro',
  `temporada` varchar(60) DEFAULT NULL,
  `clima_recomendado` varchar(80) DEFAULT NULL,
  `riego_recomendado` varchar(80) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `hectareas_sembradas` decimal(10,2) DEFAULT NULL,
  `toneladas_por_hectarea` decimal(10,2) DEFAULT NULL,
  `precio_maiz` decimal(10,2) DEFAULT NULL,
  `precio_tomate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cultivos`
--

INSERT INTO `cultivos` (`id_cultivo`, `nombre`, `tipo`, `temporada`, `clima_recomendado`, `riego_recomendado`, `descripcion`, `hectareas_sembradas`, `toneladas_por_hectarea`, `precio_maiz`, `precio_tomate`) VALUES
(1, 'Maíz', 'cereal', 'Primavera-Verano', 'Cálido', 'Moderado', 'Cultivo básico, requiere buena luz solar.', NULL, NULL, NULL, NULL),
(2, 'Tomate', 'verdura', 'Todo el año', 'Templado', 'Frecuente', 'Necesita tutoreo y control de plagas.', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_contacto`
--

CREATE TABLE `mensajes_contacto` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `asunto` varchar(120) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `unidad` enum('kg','g','ton','pieza','litro','bolsa','caja') DEFAULT 'pieza',
  `descripcion` text DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `id_categoria`, `precio`, `stock`, `unidad`, `descripcion`, `imagen_url`, `creado_en`) VALUES
(1, 'maiz', NULL, 90.00, 100, 'kg', 'xdxdx', 'https://www.printables.com/es/model/998841-no-gordas/remixes', '2026-01-28 15:42:14'),
(2, 'mari', NULL, 128.00, 213897, 'kg', 'mioijhodasjklds1', 'https://www.printables.com/es/model/998841-no-gordas/remixes', '2026-01-29 15:20:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `rol` enum('admin','usuario') DEFAULT 'usuario',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password_hash`, `rol`, `creado_en`) VALUES
(1, 'Isaac', 'isaac@mail.com', '$2b$10$CBHW72XMZp0u2CYGPZhAt.zG3wavTeS3vM/qybNg7PYaOX8JrEAlm', 'admin', '2026-01-28 15:21:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `cultivos`
--
ALTER TABLE `cultivos`
  ADD PRIMARY KEY (`id_cultivo`);

--
-- Indices de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cultivos`
--
ALTER TABLE `cultivos`
  MODIFY `id_cultivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
