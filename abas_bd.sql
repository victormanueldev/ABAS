-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2019 at 12:20 PM
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

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'comercial', 'Área Comercial', NULL, NULL),
(2, 'contabilidad', 'Área de Contabilidad', NULL, NULL),
(3, 'programacion', 'Área de Programación', NULL, NULL),
(4, 'calidad', 'Área de Calidad', NULL, NULL),
(5, 'serviciocliente', 'Área de Servicio al Cliente', NULL, NULL),
(6, 'operaciones', 'Área de Operaciones', NULL, NULL);

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'asesorcom', 'Inspector Comercial', NULL, NULL),
(2, 'contabilidad', 'Auxiliar Contable', NULL, NULL),
(3, 'programacion', 'Programador', NULL, NULL),
(4, 'directorcom', 'Director Comercial', NULL, NULL),
(5, 'auditor', 'Auditor General', NULL, NULL),
(6, 'agentedeservicio', 'Representante de Servicio al Cliente', NULL, NULL),
(7, 'jefetecnico', 'Jefe Técnico', NULL, NULL),
(8, 'admin', 'Administrador General', '2019-05-27 05:00:00', '2019-05-27 05:00:00');

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre_comercial`, `tipo`, `presentacion`, `unidad_medida`, `total_unidades`, `valor_unidad`, `costo_total`, `created_at`, `updated_at`) VALUES
(1, 'Polvo', 'insecticida', 'po', 'gr', '9000', '2.01', 30000, NULL, '2019-05-16 01:47:33'),
(2, 'Gel', 'insecticida', 'gel', 'gr', '498.75', '150.00', 119000, NULL, '2019-05-19 17:02:52'),
(3, 'Fosfuro de Aluminio', 'insecticida', 'bp', 'un', '10045', '25000.00', 55000, NULL, '2019-05-11 01:02:10'),
(4, 'Cebo Café', 'insecticida', 'bp', 'un', '10003', '1500.00', 50000, NULL, '2019-05-11 00:14:56'),
(5, 'Cebo Verde', 'insecticida', 'bp', 'un', '10000.0', '1.00', 30000, NULL, NULL),
(6, 'Trampa Rata', 'insecticida', 'ec', 'un', '10000.0', '1.22', 30000, NULL, NULL),
(7, 'Trampa Raton', 'insecticida', 'ec', 'un', '10000.0', '1.14', 30000, NULL, NULL),
(8, 'Tram. Impacto', 'insecticida', 'sc', 'un', '10000.0', '1.90', 30000, NULL, NULL),
(9, 'Bromadiolona', 'insecticida', 'sc', 'un', '10000.0', '0.40', 30000, NULL, NULL),
(10, 'Brodifacoum', 'insecticida', 'sc', 'un', '10000.0', '1.10', 30000, NULL, NULL),
(11, 'Lam. Lampara', 'insecticida', 'bp', 'un', '10000.0', '1.20', 30000, NULL, NULL),
(12, 'Sani-T 10', 'insecticida', 'bp', 'ml', '10000.0', '1.70', 30000, NULL, NULL),
(13, 'Alfa-cipermetrina SC', 'insecticida', 'ec', 'ml', '10000.0', '1.30', 30000, NULL, NULL),
(14, 'Beta-cipermetrina SC', 'insecticida', 'ec', 'ml', '9900', '1.80', 30000, NULL, '2019-05-11 23:31:18'),
(15, 'Deltametrina SC', 'insecticida', 'ec', 'ml', '10000.0', '1.60', 30000, NULL, NULL),
(16, 'Cyfluthrin EC', 'insecticida', 'ec', 'ml', '9998.75', '1.65', 30000, NULL, '2019-05-12 00:16:21'),
(17, 'Deltametrina EC', 'insecticida', 'ec', 'ml', '10000.0', '1.44', 30000, NULL, NULL),
(18, 'Piretrina Natural', 'insecticida', 'ec', 'ml', '10000.0', '1.21', 30000, NULL, NULL),
(19, 'Fipronil SC', 'insecticida', 'sc', 'ml', '10205', '500.00', 380000, NULL, '2019-05-10 04:37:08'),
(20, 'Tiametoxan', 'insecticida', 'sc', 'gr', '10000.0', '1.96', 30000, NULL, NULL),
(21, 'Temephos', 'insecticida', 'sc', 'gr', '10000.0', '2.10', 30000, NULL, NULL),
(22, 'Bacillus Thuringiensis', 'insecticida', 'sc', 'gr', '10000.0', '3.20', 30000, NULL, NULL);

--
-- Dumping data for table `telefonos`
--

INSERT INTO `telefonos` (`id`, `numero`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, '81651849', 1, '2019-07-12 04:09:43', '2019-07-12 04:09:43'),
(2, '123456789', 1, '2019-07-12 04:09:43', '2019-07-12 04:09:43');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cedula`, `nombres`, `apellidos`, `iniciales`, `telefono`, `foto`, `email`, `permisos`, `password`, `area_id`, `cargo_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'public/5FsTQtBKM49CyE2yIhi3D7dkBjdESDNvU4djrqAA.jpeg', 'victormalsx@gmail.com', '[{\"crear_clientes\":\"true\",\"ver_clientes\":\"true\",\"crear_docs\":\"true\",\"asignar_metas\":\"true\",\"ver_progresos\":\"true\",\"ver_comisiones\":\"true\",\"resumen_comisiones\":\"true\",\"clientes_cerrados\":\"true\",\"asignar_facturas\":\"true\",\"control_pagos\":\"true\",\"agendar_servicios\":\"true\",\"horarios_tecnicos\":\"true\",\"listado_servicios\":\"true\",\"recepcion_docs\":\"true\",\"inventario_docs\":\"true\",\"reporte_docs\":\"true\",\"crear_novedades\":\"true\",\"crear_tecnicos\":\"true\",\"crear_usuarios\":\"true\",\"reporte_ganancias\":\"true\",\"gestion_productos\":\"true\",\"gastos\":\"true\"}]', '$2y$10$mABUq89Wj69VW5QOOSmnp.YJNdgwrbt5QKihYWdXPS4jhuTplSSfO', 6, 8, 'a6ggjoXkikp8SIvqfljrfkCjtHEeNCMrKzuPkFg5xPEDnRlSMpyzLvyyteuP', NULL, '2019-05-28 01:48:01'),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'public/a6.jpg', 'yurani@gmail.com', '[{\"crear_clientes\":\"false\",\"ver_clientes\":\"false\",\"crear_docs\":\"true\",\"asignar_metas\":\"true\",\"ver_progresos\":\"false\",\"ver_comisiones\":\"false\",\"resumen_comisiones\":\"false\",\"clientes_cerrados\":\"false\",\"asignar_facturas\":\"false\",\"control_pagos\":\"true\",\"agendar_servicios\":\"false\",\"horarios_tecnicos\":\"false\",\"listado_servicios\":\"true\",\"recepcion_docs\":\"false\",\"inventario_docs\":\"false\",\"reporte_docs\":\"false\",\"crear_novedades\":\"false\",\"crear_tecnicos\":\"false\",\"crear_usuarios\":\"false\",\"reporte_ganancias\":\"true\",\"gestion_productos\":\"false\",\"gastos\":\"true\"}]', '$2y$10$C279jhl0s46wYyr1uuu00OOouY1B4TYiQnbXXBK48l.yhUD7mN6ue', 2, 2, 'tUzOpzPc0kJys0pjxKDepNgcxju2G9zP6wQny4KJvUOdDgtRox9vdYSCCVRE', NULL, '2019-05-28 01:44:28'),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'public/a1.jpg', 'andres@gmail.com', '', '$2y$10$Du7JITRNBCrqvj/2loo8eORFsGbOXcUl/sW5tKKpGnZBS4y4Anz/m', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'public/a7.jpg', 'jhon@gmail.com', '[{\"crear_clientes\":\"false\",\"ver_clientes\":\"false\",\"crear_docs\":\"false\",\"asignar_metas\":\"false\",\"ver_progresos\":\"false\",\"ver_comisiones\":\"false\",\"resumen_comisiones\":\"false\",\"clientes_cerrados\":\"false\",\"asignar_facturas\":\"true\",\"control_pagos\":\"false\",\"agendar_servicios\":\"true\",\"horarios_tecnicos\":\"true\",\"listado_servicios\":\"true\",\"recepcion_docs\":\"false\",\"inventario_docs\":\"false\",\"reporte_docs\":\"false\",\"crear_novedades\":\"false\",\"crear_tecnicos\":\"true\",\"crear_usuarios\":\"false\",\"reporte_ganancias\":\"false\",\"gestion_productos\":\"false\",\"gastos\":\"false\"}]', '$2y$10$SbxWHsjMEtVC0K2ERjxCIe4K2zzMvSl/CkvktfZSEI4oyCN7KoXTG', 3, 3, 'IdlUJGf2eAREMKsQjq9MAFgAkaxh8k0Tn2Hv6IpxflPI0VdMDvp8yflAJHKF', NULL, '2019-05-30 06:17:33'),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'public/a9.jpg', 'jhonny@gmail.com', '', '$2y$10$UIDt0beHPXpkJ/pcuuuZtOoKRYoBhmqnhQgVzx2Laa8NjnbMvbSgG', 1, 4, NULL, NULL, NULL),
(6, 951789123, 'Jhon', 'Doe', 'JD', '3177777750', 'public/a10.jpg', 'jhon.doe@gmail.com', '', '$2y$10$RH/f89iBHKiMNcc6p2h8qupNtOconBR1UAE88LeRzqQygFmjHgfCC', 4, 5, 'K3tW4AkCUHQQ4UzqwOs4rNpa6CUpRDgijuLRcLVnGdGoQud9znSOGlDVbH90', NULL, NULL),
(7, 1062545984, 'Diego', 'Leguizamo', 'DLL', '321654987', 'public/a11.jpg', 'diego@gmail.com', '', '$2y$10$Y2xgM9E4rPRgeaOzkxtKG.8d9snUTey4.w2tuG0luPzRkxNNs9h0q', 6, 7, NULL, NULL, NULL),
(8, 687459687, 'Sarah', 'Jhonson', 'SCJ', '3177777750', 'public/a12.jpg', 'sarah@gmail.com', '', '$2y$10$twKtAG0AtB5Y3RvelIJTAeUVOtQMXIbj87s/1YfeKiWh9rJv37cn2', 5, 6, 'XzyB4OweXavIfsvNyb1YaKmZcRbftxvIlZsq5r8Qam7FHlUej39zmMzJtvrj', NULL, NULL),
(9, 99999999, 'Fernando', 'Serna', 'FS', '3177777750', 'public/default-user.jpg', 'fernandoserna@sanicontrol.com', '[{\"crear_clientes\":\"true\",\"ver_clientes\":\"true\",\"crear_docs\":\"true\",\"asignar_metas\":\"true\",\"ver_progresos\":\"true\",\"ver_comisiones\":\"true\",\"resumen_comisiones\":\"true\",\"clientes_cerrados\":\"true\",\"asignar_facturas\":\"true\",\"control_pagos\":\"true\",\"agendar_servicios\":\"true\",\"horarios_tecnicos\":\"true\",\"listado_servicios\":\"true\",\"recepcion_docs\":\"true\",\"inventario_docs\":\"true\",\"reporte_docs\":\"true\",\"crear_novedades\":\"true\",\"crear_tecnicos\":\"true\",\"crear_usuarios\":\"true\",\"reporte_ganancias\":\"true\",\"gestion_productos\":\"true\",\"gastos\":\"true\"}]', '$2y$10$7L.tN71DkEjAY7bhTzcC1uIrT3ACdKBPk28dGkXphrGpecDNsKxN.', 1, 1, NULL, NULL, NULL),
(10, 88888888, 'Cristian', 'León', 'CL', '3177777750', 'public/default-user.jpg', 'cristianleon@sanicontrol.com', '', '$2y$10$4cTNY0zGtG6wfzYApi/f/.yVJLVfW.4zi5a9WQuZWJ/e2mqtWTOFK', 1, 1, NULL, NULL, NULL),
(11, 111111111, 'Programador', 'Sanicontrol', 'PS', '3177777750', 'public/default-user.jpg', 'programacion@sanicontrol.com', '', '$2y$10$w8uvk.q/.5eaAZ1yW2YehOJVLqRzWRDeMoPEjEHDtLrb/ReXhtOpy', 3, 3, NULL, NULL, NULL),
(14, 123123, 'USER', 'TEST', 'UST', '123198', 'public/hHU7PQqzMUTvX9SgZZ0K2fXVemjbeRYIEe74aMyi.jpeg', 'user@gmail.com', '[{\"crear_clientes\":\"true\",\"ver_clientes\":\"false\",\"crear_docs\":\"false\",\"asignar_metas\":\"false\",\"ver_progresos\":\"false\",\"ver_comisiones\":\"false\",\"resumen_comisiones\":\"true\",\"clientes_cerrados\":\"false\",\"asignar_facturas\":\"true\",\"control_pagos\":\"false\",\"agendar_servicios\":\"false\",\"horarios_tecnicos\":\"false\",\"listado_servicios\":\"false\",\"recepcion_docs\":\"true\",\"inventario_docs\":\"false\",\"reporte_docs\":\"false\",\"crear_novedades\":\"false\",\"crear_tecnicos\":\"false\",\"crear_usuarios\":\"true\",\"reporte_ganancias\":\"true\",\"gestion_productos\":\"true\",\"gastos\":\"true\"}]', '$2y$10$O5tbp9yryM9BKc2wNAT1JOz2iQ2V2xRKtQtNgUG9YSboaPyKO37cm', 2, 2, NULL, '2019-05-27 05:04:29', '2019-05-27 05:04:29');

--
-- Dumping data for table `valor_generals`
--

INSERT INTO `valor_generals` (`id`, `descripcion`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'porcentaje_recompras', '3', NULL, NULL),
(2, 'porcentaje_clientes_nuevos', '5', NULL, NULL),
(3, 'porcentaje_clientes_contrato', '8', NULL, NULL),
(4, 'minuto_hombre', '250', '2019-05-22 05:00:00', '2019-05-22 05:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
