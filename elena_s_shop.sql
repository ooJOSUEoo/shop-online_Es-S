-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2021 a las 17:53:55
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elena's_shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(10) NOT NULL,
  `NombreC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `NombreC`) VALUES
(1, 'Perfumeria.'),
(2, 'Avon'),
(3, 'Calzado'),
(4, 'Ropa'),
(5, 'Recipientes');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cliente` (
`idcliente` int(10)
,`Nombre` varchar(20)
,`ApellidoPaterno` varchar(20)
,`ApellidoMaterno` varchar(20)
,`Email` text
,`Tel` int(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(10) NOT NULL,
  `idproducto` int(10) DEFAULT NULL,
  `idcliente` int(10) DEFAULT NULL,
  `FechaHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Total` decimal(10,2) DEFAULT NULL,
  `Targeta` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `idproducto`, `idcliente`, `FechaHora`, `Total`, `Targeta`) VALUES
(1, 1, 5, '2021-07-28 19:20:15', '499.99', 12345678),
(2, 4, 4, '2021-07-28 19:20:18', '2989.99', 98765432),
(3, 8, 1, '2021-07-13 16:42:40', '159.00', NULL),
(4, 3, 2, '2021-07-13 16:42:43', '2099.00', NULL),
(6, 2, 4, '2021-07-13 16:42:50', '800.00', NULL),
(7, 5, 3, '2021-07-13 16:42:53', '970.00', NULL),
(8, 10, 6, '2021-07-25 16:43:16', '849.25', NULL),
(9, 6, 8, '2021-07-13 16:42:58', '999.00', NULL),
(10, 7, 10, '2021-07-13 16:43:01', '359.00', NULL),
(11, 1, 5, '2021-07-16 18:20:54', '100.00', NULL),
(13, NULL, 1, '2021-07-28 21:04:42', NULL, 2147483647),
(20, 10, 1, '2021-07-28 22:20:51', '849.00', 2147483647),
(21, 10, 1, '2021-07-28 22:23:28', '849.00', 2147483647),
(22, 10, 1, '2021-07-28 22:23:41', '849.00', 2147483647),
(23, 2, 5, '2021-08-02 14:28:22', '500.00', 6268842),
(25, 7, 1, '2021-08-02 21:38:34', '358.99', 2147483647),
(27, 7, 1, '2021-08-02 21:41:17', '358.99', 2147483647);

--
-- Disparadores `compra`
--
DELIMITER $$
CREATE TRIGGER `compra_after_insert` AFTER INSERT ON `compra` FOR EACH ROW UPDATE productos INNER JOIN compra ON compra.idproducto=productos.idproductos SET productos.Cantidad=productos.Cantidad-1 WHERE productos.idproductos=compra.idproducto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(10) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `idproveedor` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `Nombre`, `idproveedor`) VALUES
(1, 'Avon.', 1),
(2, 'Tupperware', 2),
(3, '...........', 3),
(4, 'Chanel', 4),
(5, 'Lacoste', 5),
(6, 'Versace', 6),
(7, 'Calvin Klein', 8),
(8, 'Nike', 8),
(9, 'Adidas', 9),
(10, 'Levi\'s.', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(10) NOT NULL,
  `idcategoria` int(10) DEFAULT NULL,
  `NombreP` varchar(50) DEFAULT NULL,
  `Genero` varchar(3) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Cantidad` int(10) DEFAULT NULL,
  `Caducidad` date DEFAULT NULL,
  `Talla` varchar(25) DEFAULT NULL,
  `marca` int(10) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `idcategoria`, `NombreP`, `Genero`, `Precio`, `Cantidad`, `Caducidad`, `Talla`, `marca`, `img`) VALUES
(1, 1, 'Far Away Gold 10', 'M', 500.01, -2, '0000-00-00', '', 1, '4.png'),
(2, 1, 'Coco Mademoiselle T', 'M', 799.99, -2, '0000-00-00', '*', 4, '2.png'),
(3, 3, 'Tenis Nike Air Force', 'H-M', 2101.01, 3, '2021-07-25', '24-, 25, 26', 8, '2.png'),
(4, 5, 'Far Away Gold.', 'M', 498, 0, '0000-00-00', 'l', 2, '4.png'),
(5, 4, 'Levi\'s 19491-0131 Su', 'H', 969.99, 5, '0000-00-00', 'M, G', 10, '1.png'),
(6, 3, 'Tenis Adidas Grand C', 'H', 999, 4, '0000-00-00', '22-, 23', 9, '2.png'),
(7, 2, 'Rare Pearls', 'M', 358.99, -1, '0000-00-00', '*', 1, '3.png'),
(8, 5, 'Set de Recipientes d', 'H-M', 159, 1, '0000-00-00', '*', 2, '4.png'),
(9, 4, 'Vata con estampado B', 'M', 11685, 4, '0000-00-00', 'Ch, M,', 6, '1.png'),
(10, 1, 'Chanse.', 'M', 849, 6, '0000-00-00', '*', 4, '2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(10) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `ApellidoPaterno` varchar(20) DEFAULT NULL,
  `ApellidoMaterno` varchar(20) DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Tel` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Email`, `Tel`) VALUES
(1, 'Manuel', 'Peres', 'Gomez', 'Manuel561@gmail.com', '5401564020'),
(2, 'Juana', 'Fernandez', 'Sanchez', 'Juana632@gmail.com', '2012057897'),
(3, 'Luis', 'Peres', 'Gomez', 'Luis5451@gmail.com', '2225801470'),
(4, 'Manuel', 'Hernandez', 'Sanchez', 'Manuel741@gmail.com', '2145876309'),
(5, 'Miguel', 'Flores', 'Ruiz', 'Miguel1515@gmail.com', '2393571450'),
(6, 'Maria', 'Peres', 'Gomez', 'Maria644@gmail.com', '2582574169'),
(8, 'Luis', 'Hernandez', 'Sanchez', 'Luis77@gmail.com', '9517536482'),
(9, 'Manuel', 'Perez', 'Montes', 'Manuel4224@gmail.com', '3574862190'),
(10, 'Miguel', 'Peres', 'Gomez', 'Miguel826@gmail.com', '2504700692');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_inventario`
--

CREATE TABLE `reporte_inventario` (
  `idreporte` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `archivo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte_inventario`
--

INSERT INTO `reporte_inventario` (`idreporte`, `nombre`, `archivo`) VALUES
(1, 'Semana 1', 'reporte.xlsx'),
(2, 'Semana 2', 'reporte.xlsx'),
(3, 'Semana 3', 'reporte.xlsx'),
(4, 'Semana 4', 'Calendarizacion.xlsx'),
(6, 'semana 10', 'semana 10.xls'),
(8, 'reporte10', 'reporte.pdf');

-- --------------------------------------------------------

--
-- Estructura para la vista `cliente`
--
DROP TABLE IF EXISTS `cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cliente`  AS   (select `cliente1`.`idcliente` AS `idcliente`,`cliente1`.`Nombre` AS `Nombre`,`cliente1`.`ApellidoPaterno` AS `ApellidoPaterno`,`cliente1`.`ApellidoMaterno` AS `ApellidoMaterno`,`cliente1`.`Email` AS `Email`,`cliente1`.`Tel` AS `Tel` from `cliente1`)  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `FK_producto` (`idproducto`),
  ADD KEY `FK_cliente` (`idcliente`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `FK_marca` (`marca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `reporte_inventario`
--
ALTER TABLE `reporte_inventario`
  ADD PRIMARY KEY (`idreporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reporte_inventario`
--
ALTER TABLE `reporte_inventario`
  MODIFY `idreporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `FK_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente1` (`idcliente`),
  ADD CONSTRAINT `FK_producto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproductos`);

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_marca` FOREIGN KEY (`marca`) REFERENCES `marca` (`idmarca`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
