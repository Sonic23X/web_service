-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2018 a las 02:37:13
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `departamento` varchar(60) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento`, `status`) VALUES
(110, 'Higiene y belleza', 1),
(111, 'Jugos y bebidas', 1),
(112, 'Carnes y pescados', 1),
(113, 'Frutas y verduras', 1),
(114, 'Oficina y papelería', 1),
(115, 'Vinos y licores', 1),
(116, 'Limpieza y mascotas', 1),
(117, 'Farmacia', 1),
(118, 'Salchichonería', 1),
(119, 'Lácteos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleados` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE `impuestos` (
  `id_impuestos` int(11) NOT NULL,
  `impuesto` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id_privilegios` int(11) NOT NULL,
  `privilegio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo_barras` bigint(11) NOT NULL,
  `producto` varchar(80) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `stock_control` int(11) DEFAULT NULL,
  `_id_medida` int(11) DEFAULT NULL,
  `_id_departamento` int(11) DEFAULT NULL,
  `costo_compra` double DEFAULT NULL,
  `costo_venta` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo_barras`, `producto`, `marca`, `stock`, `stock_control`, `_id_medida`, `_id_departamento`, `costo_compra`, `costo_venta`, `status`) VALUES
(70104290111, '\r\nLavatrastes líquido', 'Salvo limón ', 178, 190, 51, 116, 34.5, 36.9, 1),
(70104290324, '\r\nLavatrastes líquido', 'Axion limón', 200, 210, 51, 116, 38.2, 39.9, 1),
(70104290353, 'Limpiador líquido ', 'fabuloso fresca ', 178, 190, 51, 116, 19.3, 25, 1),
(70104290388, 'Refresco', 'Manzanita Lift', 180, 190, 52, 111, 10.5, 13, 1),
(75010323064, 'Yoghurt natural', 'yoplait', 200, 212, 50, 119, 23.7, 26.5, 1),
(75010553042, 'Alimento para tortuga', 'wardley turtle', 50, 56, 53, 116, 27.7, 29, 1),
(75010553047, 'Refresco', 'Coca cola', 200, 210, 51, 111, 34.6, 36.5, 1),
(75010553064, 'Leche', 'Santa clara', 229, 232, 51, 119, 18.3, 19.5, 1),
(75010553702, '\r\nJugo de tomate', 'clamato el original', 213, 220, 51, 111, 43.9, 55, 1),
(75010883047, 'Limpiador líquido ', 'pinol el original ', 200, 210, 51, 116, 54.3, 60.5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_de_medida`
--

CREATE TABLE `unidad_de_medida` (
  `id_unidad` int(11) NOT NULL,
  `unidad_medida` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad_de_medida`
--

INSERT INTO `unidad_de_medida` (`id_unidad`, `unidad_medida`) VALUES
(50, 'Kg'),
(51, 'Litro'),
(52, 'ml'),
(53, 'gr'),
(54, 'm'),
(55, 'Pieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `contrasena` varchar(256) DEFAULT NULL,
  `_id_privilegio` int(11) DEFAULT NULL,
  `_id_empleado` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `user_login` varchar(40) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `efectivo` double DEFAULT NULL,
  `cambio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_venta` int(11) NOT NULL,
  `_codigo_barras` bigint(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `_id_impuesto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleados`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`id_impuestos`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id_privilegios`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo_barras`),
  ADD KEY `medida_idx` (`_id_medida`),
  ADD KEY `departamento_idx` (`_id_departamento`);

--
-- Indices de la tabla `unidad_de_medida`
--
ALTER TABLE `unidad_de_medida`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `privilegios_idx` (`_id_privilegio`),
  ADD KEY `empleado_idx` (`_id_empleado`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `producto_idx` (`_codigo_barras`),
  ADD KEY `impuesto_idx` (`_id_impuesto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `id_impuestos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id_privilegios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad_de_medida`
--
ALTER TABLE `unidad_de_medida`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `departamento` FOREIGN KEY (`_id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medida` FOREIGN KEY (`_id_medida`) REFERENCES `unidad_de_medida` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `empleado` FOREIGN KEY (`_id_empleado`) REFERENCES `empleados` (`id_empleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `privilegios` FOREIGN KEY (`_id_privilegio`) REFERENCES `privilegios` (`id_privilegios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `impuesto` FOREIGN KEY (`_id_impuesto`) REFERENCES `impuestos` (`id_impuestos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto` FOREIGN KEY (`_codigo_barras`) REFERENCES `productos` (`codigo_barras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
