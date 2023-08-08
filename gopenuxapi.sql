-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 00:49:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gopenuxapi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `direccion_envio` varchar(100) NOT NULL,
  `total_pedido` float NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `usuario_id`, `direccion_envio`, `total_pedido`, `producto_id`) VALUES
(1, 2, 'cucutilla', 14000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `cantidad_disponible` int(11) NOT NULL,
  `precio_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `cantidad_disponible`, `precio_unitario`) VALUES
(1, 'Producto A', 50, 10.99),
(2, 'Producto B', 30, 25.5),
(3, 'Producto C', 20, 15.75),
(4, 'Producto D', 15, 8.25),
(5, 'Producto E', 40, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `autorizacion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `nombre`, `contraseña`, `direccion`, `telefono`, `email`, `autorizacion`) VALUES
(1, 'usuario1', 'Juan Pérez', 'clave123', 'Calle 123, Ciudad', '123-456-7890', 'juan@example.com', 1),
(2, 'usuario2', 'María García', 'password456', 'Avenida XYZ, Pueblo', '987-654-3210', 'maria@example.com', 0),
(3, 'usuario3', 'Pedro Rodríguez', 'segura456', 'Plaza ABC, Villa', '555-123-4567', 'pedro@example.com', 1),
(4, 'usuario4', 'Ana Martínez', 'secreta123', 'Ruta 987, Aldea', '333-444-5555', 'ana@example.com', 0),
(5, 'usuario5', 'Carlos López', 'contraseña789', 'Carretera 456, Municipio', '111-222-3333', 'carlos@example.com', 1),
(6, 'Trina03', 'Trina Esmeralda', 'cscvssdcds', 'ciudad linda', '324454423', 'art_trina@gmail.com', 0),
(7, 'Trina03', 'Trina Esmeralda', 'cscvssdcds', 'ciudad linda', '324454423', 'art_trina@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_compra_usuario` (`usuario_id`),
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `fk_compra_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
