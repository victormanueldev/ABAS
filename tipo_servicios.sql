-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2019 at 12:39 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abas_bd`
--

-- --------------------------------------------------------
--
-- Dumping data for table `tipo_servicios`
--

INSERT INTO `tipo_servicios` (`id`, `nombre`) VALUES
(1, 'CONTROL DE PLAGAS BASICO SIN ROEDORES'),
(2, 'CONTROL DE PLAGAS BASICO Y ROEDORES'),
(3, 'CONTROL SOLO ROEDORES'),
(4, 'CONTROL INSECTOS RASTREROS'),
(5, 'CONTROL INSECTOS VOLADORES'),
(6, 'CONTROL CHINCHES'),
(7, 'CONTROL GARRAPATAS'),
(8, 'CONTROL PULGAS'),
(9, 'CONTROL TERMITAS'),
(10, 'CONTROL ABEJAS'),
(11, 'CONTROL AVISPAS'),
(12, 'DESINFECCION'),
(13, 'ESPOLVOREO ELECTRICO'),
(14, 'NEBULIZACION'),
(15, 'TERMONEBULIZACION'),
(16, 'GASIFICACION'),
(17, 'RETIRO DE RESIDUOS / DESCARPADO'),
(18, 'INSTALACION ESTACIONES ROEDOR'),
(19, 'CONTROL DE PLAGAS EN ZONAS COMUNES'),
(20, 'CONTROL EN CASAS Y/O APARTAMENTOS'),
(21, 'CONTROL EN CAJAS DE ALCANTARILLA'),
(22, 'RUTA LAMPARAS CONTROL INSECTOS VOLADORES'),
(23, 'CONTROL CARACOLES'),
(24, 'CONTROL DE PLAGAS BASICO RESIDENCIAL');

--
-- Indexes for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;