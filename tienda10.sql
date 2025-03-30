-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2025 a las 23:17:35
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
  `IdAlmacen` int(11) NOT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `IdCantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdAlmacen`),
  KEY `IdProducto` (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`IdAlmacen`, `IdProducto`, `IdCantidad`) VALUES
(1, 1, 234),
(2, 2, 185),
(3, 3, 489),
(4, 4, 124),
(5, 5, 216),
(6, 6, 128),
(7, 7, 336),
(8, 8, 461),
(9, 9, 61),
(10, 10, 261),
(11, 11, 350),
(12, 12, 466),
(13, 13, 203),
(14, 14, 463),
(15, 15, 423),
(16, 16, 186),
(17, 17, 102),
(18, 18, 477),
(19, 19, 341),
(20, 20, 41),
(21, 21, 227),
(22, 22, 436),
(23, 23, 206),
(24, 24, 412),
(25, 25, 323),
(26, 26, 253),
(27, 27, 380),
(28, 28, 386),
(29, 29, 146),
(30, 30, 24),
(31, 31, 440),
(32, 32, 170),
(33, 33, 66),
(34, 34, 156),
(35, 35, 38),
(36, 36, 475),
(37, 37, 410),
(38, 38, 207),
(39, 39, 480),
(40, 40, 173),
(41, 41, 116),
(42, 42, 479),
(43, 43, 309),
(44, 44, 353),
(45, 45, 125),
(46, 46, 159),
(47, 47, 351),
(48, 48, 100),
(49, 49, 1000),
(50, 50, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefe`
--

CREATE TABLE IF NOT EXISTS `jefe` (
  `IdJefe` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `ApellidoMaterno` varchar(255) NOT NULL,
  `ApellidoPaterno` varchar(255) NOT NULL,
  `DiaNacimiento` date NOT NULL,
  `IdVendedor` int(11) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`IdJefe`),
  KEY `IdVendedor` (`IdVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jefe`
--

INSERT INTO `jefe` (`IdJefe`, `Nombre`, `ApellidoMaterno`, `ApellidoPaterno`, `DiaNacimiento`, `IdVendedor`, `Password`) VALUES
(201, 'Marco', 'Sandoval', 'Vallarta', '2000-01-24', 101, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `IdLocalidad` int(11) NOT NULL,
  `NombreLocalidad` varchar(255) NOT NULL,
  PRIMARY KEY (`IdLocalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`IdLocalidad`, `NombreLocalidad`) VALUES
(1, 'Amecameca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `IdMarca` int(11) NOT NULL,
  `NombreMarca` varchar(255) NOT NULL,
  PRIMARY KEY (`IdMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`IdMarca`, `NombreMarca`) VALUES
(1, 'Certified Angus Beef '),
(2, 'USDA Prime Beef'),
(3, 'Wagyu Beef'),
(4, 'Kobe Beef'),
(5, 'Snake River Farms'),
(6, 'Creekstone Farms'),
(7, 'Greater Omaha '),
(8, 'Swift Beef'),
(9, 'Grass Run Farms'),
(10, 'Omaha Steaks'),
(11, 'Nestre'),
(12, 'Lala'),
(13, 'Alpura'),
(14, 'Nestle la Lechera'),
(15, 'Yakult'),
(16, 'Lala Deslactosada'),
(17, 'Lala Crema'),
(18, 'Oikos'),
(19, 'Leche Lala'),
(20, 'Nutri'),
(21, 'Coca Cola'),
(22, 'Boing'),
(23, 'Bonafont'),
(24, 'Volt'),
(25, 'Squirt'),
(26, 'Epura'),
(27, 'Sangrias'),
(28, 'Gatorade'),
(29, 'Red Cola'),
(30, 'Pepsi Cola'),
(31, 'Saladet'),
(32, 'Chiapas'),
(33, 'Campo Vivo'),
(34, 'Siete Colores'),
(35, 'Verde'),
(36, 'Hass'),
(37, 'Blanca'),
(38, 'Italiana'),
(39, 'Rollo'),
(40, 'Huacalito'),
(41, 'Chedrahui'),
(42, 'Bodega'),
(43, 'Turbo Teen'),
(44, 'RedKite'),
(45, 'Whiskas'),
(46, 'Clean'),
(47, 'Arena'),
(48, 'Dog Chow'),
(49, 'Pedigree'),
(50, 'Ganador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `IdProducto` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `IdMarca` int(11) DEFAULT NULL,
  `FechaCaducidad` date DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `IdTipoDaño` int(11) DEFAULT NULL,
  `imagenes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `IdMarca` (`IdMarca`),
  KEY `IdTipoDaño` (`IdTipoDaño`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `Nombre`, `IdMarca`, `FechaCaducidad`, `Cantidad`, `Precio`, `IdTipoDaño`, `imagenes`) VALUES
(1, 'Bistec Pulpa Blanca de Res', 1, '2025-06-20', 234, '164.00', 1, 'Carnes/1.png'),
(2, 'Bistec Pulpa Negra de Res', 2, '2027-08-20', 185, '165.00', 1, 'Carnes/2.png'),
(3, 'Filete Basa Blanco', 3, '2025-09-23', 489, '72.00', 1, 'Carnes/3.png'),
(4, 'Camaron Grande sin Cabeza', 4, '2027-02-07', 124, '267.00', 1, 'Carnes/4.png'),
(5, 'Medallones de Atun', 5, '2026-02-06', 216, '250.00', 1, 'Carnes/5.png'),
(6, 'Bistec Lomo para Asar de Res', 6, '2026-12-25', 128, '166.00', 1, 'Carnes/6.png'),
(7, 'Camaron Chico sin Cabeza', 7, '2026-02-05', 336, '161.00', 1, 'Carnes/7.png'),
(8, 'Bistec Aguayon de Ternera', 8, '2027-03-29', 461, '168.00', 1, 'Carnes/8.png'),
(9, 'Filete de Salmon Neptuno', 9, '2026-04-03', 61, '104.00', 1, 'Carnes/9.png'),
(10, 'Molilla de Res', 10, '2027-04-24', 261, '118.00', 1, 'Carnes/10.png'),
(11, 'Leche Evaporada', 11, '2025-04-20', 350, '30.00', 1, 'Lacteos/1.png'),
(12, 'Media Crema Lala', 12, '2025-10-11', 466, '20.00', 1, 'Lacteos/2.png'),
(13, 'Leche Alpura Deslactosada', 13, '2025-09-11', 203, '100.00', 1, 'Lacteos/3.png'),
(14, 'Leche Condensada', 14, '2026-12-10', 463, '17.00', 1, 'Lacteos/4.png'),
(15, 'Yakult', 15, '2026-09-20', 423, '60.00', 1, 'Lacteos/5.png'),
(16, 'Leche Lala Deslactosada', 16, '2026-05-26', 186, '150.00', 1, 'Lacteos/6.png'),
(17, 'Crema Lala', 17, '2025-12-15', 102, '16.00', 1, 'Lacteos/7.png'),
(18, 'Yoghur Griego Oikos', 18, '2027-04-07', 477, '25.00', 1, 'Lacteos/8.png'),
(19, 'Leche Lala Entera', 19, '2027-09-07', 341, '151.00', 1, 'Lacteos/9.png'),
(20, 'Nutri Leche', 20, '2026-01-08', 41, '40.00', 1, 'Lacteos/10.png'),
(21, 'Tomate', 21, '2025-11-02', 227, '20.00', 1, 'frutas y verduras/10.png'),
(22, 'Platano', 22, '2027-03-16', 436, '29.00', 1, 'frutas y verduras/1.png'),
(23, 'Zanahoria', 23, '2026-01-10', 206, '10.00', 1, 'frutas y verduras/2.png'),
(24, 'Cebolla Blanca', 24, '2026-04-22', 412, '40.00', 1, 'frutas y verduras/3.png'),
(25, 'Limon sin Semilla', 25, '2026-11-20', 323, '23.00', 1, 'frutas y verduras/4.png'),
(26, 'Pepino Verde', 26, '2026-07-08', 253, '25.00', 1, 'frutas y verduras/5.png'),
(27, 'Aguacate', 27, '2027-03-20', 380, '80.00', 1, 'frutas y verduras/6.png'),
(28, 'Papa Blanca', 28, '2025-06-12', 386, '40.00', 1, 'frutas y verduras/7.png'),
(29, 'Calabaza Italiana', 29, '2026-09-03', 146, '30.00', 1, 'frutas y verduras/8.png'),
(30, 'Cilantro Rollo', 30, '2026-06-28', 24, '12.00', 1, 'frutas y verduras/9.png'),
(31, 'Refresco Coca Cola', 31, '2025-09-17', 440, '19.00', 1, 'Bebidas/1.png'),
(32, 'Boing Sabor Mango', 32, '2026-07-21', 170, '13.00', 1, 'Bebidas/2.png'),
(33, 'Agua Natural Bonafont', 33, '2027-01-11', 66, '8.00', 1, 'Bebidas/3.png'),
(34, 'Volt Blue Regular', 34, '2025-06-27', 156, '17.00', 1, 'Bebidas/4.png'),
(35, 'Refresco Squirt', 35, '2027-12-28', 38, '14.00', 1, 'Bebidas/5.png'),
(36, 'Agua Natural Epura', 36, '2027-11-05', 475, '11.00', 1, 'Bebidas/6.png'),
(37, 'Refresco Sangria Senorial', 37, '2025-01-26', 410, '16.00', 1, 'Bebidas/7.png'),
(38, 'Gatorade Naranja', 38, '2027-07-04', 207, '25.00', 1, 'Bebidas/8.png'),
(39, 'Refresco Red Cola', 39, '2025-12-14', 480, '13.00', 1, 'Bebidas/9.png'),
(40, 'Refresco Pepsi Cola', 40, '2027-01-22', 173, '14.00', 1, 'Bebidas/10.png'),
(41, 'Alpiste Simple', 41, '2026-03-03', 116, '21.00', 1, 'Mascotas/1.png'),
(42, 'Alpiste Compuesto', 42, '2026-02-16', 479, '22.00', 1, 'Mascotas/2.png'),
(43, 'Alimento para Tortuga', 43, '2025-12-21', 309, '17.00', 1, 'Mascotas/3.png'),
(44, 'Alimento para Conejo', 44, '2026-11-24', 353, '160.00', 1, 'Mascotas/4.png'),
(45, 'Alimento Humedo para Gatos', 45, '2026-04-29', 125, '10.00', 1, 'Mascotas/5.png'),
(46, 'Arena para Gato', 46, '2027-10-20', 159, '750.00', 1, 'Mascotas/6.png'),
(47, 'Arena con Aroma', 47, '2025-05-18', 351, '50.00', 1, 'Mascotas/7.png'),
(48, 'Purina Dog Chow', 48, '2027-06-30', 100, '11.00', 1, 'Mascotas/8.png'),
(49, 'Alimento Humedo para Perros', 49, '2026-02-11', 1000, '13.00', 1, 'Mascotas/9.png'),
(50, 'Alimento Seco para Perro Ganador', 50, '2027-05-21', 150, '700.00', 1, 'Mascotas/10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `IdMarca` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdProveedor`),
  KEY `IdMarca` (`IdMarca`),
  KEY `IdProducto` (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `IdMarca`, `IdProducto`) VALUES
(4321567, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldo`
--

CREATE TABLE IF NOT EXISTS `sueldo` (
  `IdVendedor` int(11) NOT NULL,
  `Sueldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sueldo`
--

INSERT INTO `sueldo` (`IdVendedor`, `Sueldo`) VALUES
(101, '15000.00'),
(102, '17000.00'),
(103, '16000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `IdTienda` int(11) NOT NULL,
  `IdLocalidad` int(11) DEFAULT NULL,
  `IdVendedor` int(11) DEFAULT NULL,
  `IdJefe` int(11) DEFAULT NULL,
  `IdProveedor` char(10) DEFAULT NULL,
  PRIMARY KEY (`IdTienda`),
  KEY `IdLocalidad` (`IdLocalidad`),
  KEY `IdVendedor` (`IdVendedor`),
  KEY `IdJefe` (`IdJefe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`IdTienda`, `IdLocalidad`, `IdVendedor`, `IdJefe`, `IdProveedor`) VALUES
(1, 1, 101, 201, '4321567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdaño`
--

CREATE TABLE IF NOT EXISTS `tiposdaño` (
  `IdTipoDaño` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`IdTipoDaño`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposdaño`
--

INSERT INTO `tiposdaño` (`IdTipoDaño`, `Descripcion`) VALUES
(1, 'Intacto'),
(2, 'Envase Dañado'),
(3, 'Producto Roto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE IF NOT EXISTS `vendedor` (
  `IdVendedor` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `ApellidoMaterno` varchar(255) NOT NULL,
  `ApellidoPaterno` varchar(255) NOT NULL,
  `DiaNacimiento` date NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`IdVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`IdVendedor`, `Nombre`, `ApellidoMaterno`, `ApellidoPaterno`, `DiaNacimiento`, `Password`) VALUES
(101, 'Luis', 'Ortega', 'Dominguez', '2001-01-24', '12345'),
(102, 'Danel', 'Carballar', 'Haro', '2002-01-23', '123456'),
(103, 'Alejandro', 'Marroquin', 'Diaz', '2002-01-23', '1234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int(11) NOT NULL,
  `IdVendedor` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `IdVendedor` (`IdVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdVendedor`, `Fecha`, `Monto`) VALUES
(301, 101, '2004-02-01', '5000.00'),
(302, 102, '2004-02-02', '7000.00'),
(303, 103, '2004-02-03', '6000.00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `jefe`
--
ALTER TABLE `jefe`
  ADD CONSTRAINT `jefe_ibfk_1` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IdMarca`) REFERENCES `marcas` (`IdMarca`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`IdTipoDaño`) REFERENCES `tiposdaño` (`IdTipoDaño`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`IdMarca`) REFERENCES `marcas` (`IdMarca`),
  ADD CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `sueldo`
--
ALTER TABLE `sueldo`
  ADD CONSTRAINT `sueldo_ibfk_1` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

--
-- Filtros para la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD CONSTRAINT `tienda_ibfk_1` FOREIGN KEY (`IdLocalidad`) REFERENCES `localidad` (`IdLocalidad`),
  ADD CONSTRAINT `tienda_ibfk_2` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`),
  ADD CONSTRAINT `tienda_ibfk_3` FOREIGN KEY (`IdJefe`) REFERENCES `jefe` (`IdJefe`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedor` (`IdVendedor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
