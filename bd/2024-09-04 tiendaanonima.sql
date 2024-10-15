-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2024 at 10:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiendaanonima`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrador`
--

CREATE TABLE `Administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Administrador`
--

INSERT INTO `Administrador` (`idAdministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Hector', 'Florez', 'hf@ta.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `Carrito`
--

CREATE TABLE `Carrito` (
  `Producto_idProducto` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `Categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categoria`
--

INSERT INTO `Categoria` (`idCategoria`, `nombre`) VALUES
(201, 'Nevera'),
(202, 'Lavadora'),
(203, 'Televisores'),
(204, 'Audio'),
(205, 'Drones');

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`idCliente`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(501, 'Sandra', 'Arjona', 'sanarj@hotmail.com', 'c12e01f2a13ff5587e1e9e4aedb8242d'),
(502, 'Pedro', 'Torres', 'petor@gmail.com', 'fc9fdf084e290f26a270390dc49061a2'),
(503, 'Thomas', 'Aguirre', 'tomasesteban20100@gmail.com', 'fec8f2a3f2e808ccb17c4d278b4fa469'),
(504, 'Sofia', 'Carvajal', 'Spfitp@gmail.com', 'd54185b71f614c30a396ac4bc44d3269'),
(505, 'Felipe', 'Sanchez', 'Sanchez08@gmail.com', 'bc7b36fe4d2924e49800d9b3dc4a325c'),
(506, 'Juan', 'Pérez', 'juan.perez@gmail.com', '55add3d845bfcd87a9b0949b0da49c0a'),
(507, 'Ana', 'Torres', 'ana.torres@gmail.com', '7d0db380a5b95a8ba1da0bca241abda1');

-- --------------------------------------------------------

--
-- Table structure for table `Factura`
--

CREATE TABLE `Factura` (
  `numeroFactura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `subtotal` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Marca`
--

CREATE TABLE `Marca` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Marca`
--

INSERT INTO `Marca` (`idMarca`, `nombre`) VALUES
(101, 'Whirlpool'),
(102, 'Kalley'),
(103, 'LG'),
(104, 'Samsung'),
(105, 'Challenger'),
(106, 'DJI');

-- --------------------------------------------------------

--
-- Table structure for table `Producto`
--

CREATE TABLE `Producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` int(11) NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `Marca_idMarca` int(11) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Producto`
--

INSERT INTO `Producto` (`idProducto`, `nombre`, `cantidad`, `precioCompra`, `precioVenta`, `Marca_idMarca`, `Categoria_idCategoria`, `Administrador_idAdministrador`) VALUES
(401, 'Lavadora WW19LTAHLA', 1000, 1500000, 1900000, 101, 202, 1),
(402, 'Nevera GB33WPT', 2000, 1500000, 1800000, 102, 201, 1),
(403, 'Televisor 50UR7410PSA', 10, 1000000, 1499900, 101, 201, 1),
(404, 'Televisor 65cu7000', 5, 2500000, 3099900, 102, 203, 1),
(405, 'Televisor UHD 65HW SMART BT', 10, 1500000, 2099900, 102, 203, 1),
(406, 'Lavadora LG Carga Frontal 22 Kilos WM22VV2S6BR Gris', 4, 3000000, 3499900, 103, 202, 1),
(407, 'DJI Mavic Air 2', 50, 3000000, 6000000, 106, 205, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProductoFactura`
--

CREATE TABLE `ProductoFactura` (
  `Producto_idProducto` int(11) NOT NULL,
  `Factura_numeroFactura` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indexes for table `Carrito`
--
ALTER TABLE `Carrito`
  ADD PRIMARY KEY (`Producto_idProducto`,`Cliente_idCliente`),
  ADD KEY `fk_Producto_has_Cliente_Cliente1_idx` (`Cliente_idCliente`),
  ADD KEY `fk_Producto_has_Cliente_Producto1_idx` (`Producto_idProducto`);

--
-- Indexes for table `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `Factura`
--
ALTER TABLE `Factura`
  ADD PRIMARY KEY (`numeroFactura`),
  ADD KEY `fk_Factura_Cliente1_idx` (`Cliente_idCliente`);

--
-- Indexes for table `Marca`
--
ALTER TABLE `Marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indexes for table `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_Producto_Marca_idx` (`Marca_idMarca`),
  ADD KEY `fk_Producto_Categoria1_idx` (`Categoria_idCategoria`),
  ADD KEY `fk_Producto_Administrador1_idx` (`Administrador_idAdministrador`);

--
-- Indexes for table `ProductoFactura`
--
ALTER TABLE `ProductoFactura`
  ADD PRIMARY KEY (`Producto_idProducto`,`Factura_numeroFactura`),
  ADD KEY `fk_Producto_has_Factura_Factura1_idx` (`Factura_numeroFactura`),
  ADD KEY `fk_Producto_has_Factura_Producto1_idx` (`Producto_idProducto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Factura`
--
ALTER TABLE `Factura`
  MODIFY `numeroFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Carrito`
--
ALTER TABLE `Carrito`
  ADD CONSTRAINT `fk_Producto_has_Cliente_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_has_Cliente_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Factura`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `fk_Factura_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `fk_Producto_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `Administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `Categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Marca` FOREIGN KEY (`Marca_idMarca`) REFERENCES `Marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ProductoFactura`
--
ALTER TABLE `ProductoFactura`
  ADD CONSTRAINT `fk_Producto_has_Factura_Factura1` FOREIGN KEY (`Factura_numeroFactura`) REFERENCES `Factura` (`numeroFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_has_Factura_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
