-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2019 at 07:09 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

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
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_cliente`, `nit_cedula`, `nombre_cliente`, `razon_social`, `sector_economico`, `municipio`, `direccion`, `barrio`, `zona`, `estado_negociacion`, `estado_facturacion`, `estado_agendamiento`, `estado_registro`, `nombre_contacto_inicial`, `cargo_contacto_inicial`, `celular_contacto_inicial`, `email_contacto_inicial`, `nombre_contacto_tecnico`, `cargo_contacto_tecnico`, `celular_contacto_tecnico`, `email_contacto_tecnico`, `nombre_contacto_facturacion`, `cargo_contacto_facturacion`, `celular_contacto_facturacion`, `email_contacto_facturacion`, `empresa_actual`, `razon_cambio`, `medio_contacto`, `otro_medio`, `doc_rut`, `doc_identidad`, `doc_camara_comercio`, `usuario`, `password`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Persona Natural', '1061807769', 'VICTOR MANUEL ARENAS', 'VICTOR MANUEL ARENAS', 'RESIDENCIAL', 'CALI', 'CLL 33 # 3BN - 49', 'PRADOS DEL NORTE', 'NORTE', 'Prospecto', 'Normal', 'Activo', 'recompra', 'VICTOR MANUEL', 'DEV', '3103195394', 'VICTORMALSX@GMAIL.COM', '', '', '', '', '', '', '', '', '', '', 'AMIGO', '', 0, 0, 0, 'victormalsx', '$2y$10$fKCQj5Tcc7ziLDeYc3mcHOrr3PKa19Jlakxdx05OiIrLKd6IhaQ12', 1, '2019-07-14 16:48:48', '2019-08-18 16:28:43'),
(2, 'Persona Juridica', '70098498-1', 'PRACTY LABS S.A.S', 'PRACTY LABS', 'SERVICIO', 'CALI', 'AV 7 - 25 - 1', 'NORTE', 'NORTE', 'Prospecto', 'Normal', 'Activo', 'cliente_contrato', 'VICTOR', 'DEV', '3103195394', 'VICTOR@GMAIL.COM', '', '', '', '', '', '', '', '', '', '', 'AMIGO', '', 0, 0, 0, NULL, NULL, 1, '2019-08-09 03:11:57', '2019-08-09 03:14:33');

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2648, '2014_10_12_000000_create_users_table', 1),
(2649, '2014_10_12_100000_create_password_resets_table', 1),
(2650, '2018_04_12_022651_create_areas_table', 1),
(2651, '2018_04_12_023001_create_cargos_table', 1),
(2652, '2018_04_12_190550_create_clientes_table', 1),
(2653, '2018_04_12_193958_create_sedes_table', 1),
(2654, '2018_04_12_195156_create_tareas_table', 1),
(2655, '2018_04_12_235243_create_novedads_table', 1),
(2656, '2018_04_13_011115_create_area_novedad_table', 1),
(2657, '2018_04_15_175902_create_eventos_table', 1),
(2658, '2018_05_10_203827_create_notifications_table', 1),
(2659, '2018_05_14_205719_create_solicitudes_table', 1),
(2660, '2018_05_30_215131_create_telefonos_table', 1),
(2661, '2018_06_22_111550_create_servicios_table', 1),
(2662, '2018_06_22_115017_create_tecnicos_table', 1),
(2663, '2018_07_27_215505_create_tipo_servicios_table', 1),
(2664, '2018_07_27_220255_create_servicio_tecnico', 1),
(2665, '2018_08_01_220413_create_servicio_tipo_servicio_table', 1),
(2666, '2018_11_08_185829_create_certificados_table', 1),
(2667, '2018_11_11_100214_create_rutas_table', 1),
(2668, '2018_11_27_214335_create_cotizaciones_table', 1),
(2669, '2018_11_29_200551_create_metas_table', 1),
(2670, '2018_11_30_195752_create_facturas_table', 1),
(2671, '2019_01_10_190005_create_novedad_temporals_table', 1),
(2672, '2019_01_25_233108_create_orden_servicios_table', 1),
(2673, '2019_01_26_001133_create_productos_table', 1),
(2674, '2019_01_26_003818_create_orden_servicio_producto', 1),
(2675, '2019_01_27_175935_create_orden_servico_tecnico', 1),
(2676, '2019_01_27_221128_create_producto_ruta', 1),
(2677, '2019_02_19_225749_create_inspeccions_table', 1),
(2678, '2019_04_13_200938_create_comisions_table', 1),
(2679, '2019_05_01_155648_create_valor_generals_table', 1),
(2680, '2019_05_03_205251_create_documentos_table', 1),
(2681, '2019_05_09_204650_create_compras_table', 1),
(2682, '2019_05_15_201525_ruta_tecnico', 1);

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre_comercial`, `tipo`, `presentacion`, `unidad_medida`, `total_unidades`, `valor_unidad`, `costo_total`, `created_at`, `updated_at`) VALUES
(1, 'Polvo', 'insecticida', 'po', 'gr', '8996', '2.01', 30000, NULL, '2019-08-04 03:35:23'),
(2, 'Gel', 'insecticida', 'gel', 'gr', '497.75', '150.00', 119000, NULL, '2019-08-04 03:35:23'),
(3, 'Fosfuro de Aluminio', 'insecticida', 'bp', 'un', '10040', '25000.00', 55000, NULL, '2019-08-04 03:35:23'),
(4, 'Cebo Café', 'insecticida', 'bp', 'un', '10003', '1500.00', 50000, NULL, '2019-05-11 00:14:56'),
(5, 'Cebo Verde', 'insecticida', 'bp', 'un', '10000.0', '1.00', 30000, NULL, NULL),
(6, 'Trampa Rata', 'insecticida', 'ec', 'un', '10000.0', '1.22', 30000, NULL, NULL),
(7, 'Trampa Raton', 'insecticida', 'ec', 'un', '10000.0', '1.14', 30000, NULL, NULL),
(8, 'Tram. Impacto', 'insecticida', 'sc', 'un', '10000.0', '1.90', 30000, NULL, NULL),
(9, 'Bromadiolona', 'insecticida', 'sc', 'un', '9997', '0.40', 30000, NULL, '2019-08-04 03:35:23'),
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
-- Dumping data for table `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nombre`, `estado`, `color`, `created_at`, `updated_at`) VALUES
(1, 'VICTOR ARENAS', 'activo', 'rgb(63,129,255)', '2019-08-01 03:27:50', '2019-08-01 03:27:50'),
(2, 'ANDRES CALAMARO', 'activo', 'rgb(64,204,0)', '2019-08-04 01:31:40', '2019-08-04 01:31:40');

--
-- Dumping data for table `telefonos`
--

INSERT INTO `telefonos` (`id`, `numero`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, '81651849', 1, '2019-07-12 04:09:43', '2019-07-12 04:09:43'),
(2, '123456789', 1, '2019-07-12 04:09:43', '2019-07-12 04:09:43'),
(3, '8165545', 1, '2019-07-14 16:48:48', '2019-07-14 16:48:48'),
(4, '8654879', 2, '2019-08-09 03:11:57', '2019-08-09 03:11:57');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cedula`, `nombres`, `apellidos`, `iniciales`, `telefono`, `foto`, `email`, `permisos`, `password`, `area_id`, `cargo_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'public/5FsTQtBKM49CyE2yIhi3D7dkBjdESDNvU4djrqAA.jpeg', 'victormalsx@gmail.com', '[{\"crear_clientes\":\"true\",\"ver_clientes\":\"true\",\"crear_docs\":\"true\",\"asignar_metas\":\"true\",\"ver_progresos\":\"true\",\"ver_comisiones\":\"true\",\"resumen_comisiones\":\"true\",\"clientes_cerrados\":\"true\",\"asignar_facturas\":\"true\",\"control_pagos\":\"true\",\"agendar_servicios\":\"true\",\"horarios_tecnicos\":\"true\",\"listado_servicios\":\"true\",\"recepcion_docs\":\"true\",\"inventario_docs\":\"true\",\"reporte_docs\":\"true\",\"crear_novedades\":\"true\",\"crear_tecnicos\":\"true\",\"crear_usuarios\":\"true\",\"reporte_ganancias\":\"true\",\"gestion_productos\":\"true\",\"gastos\":\"true\"}]', '$2y$10$mABUq89Wj69VW5QOOSmnp.YJNdgwrbt5QKihYWdXPS4jhuTplSSfO', 6, 8, 'HM0TgfbL7GqJqnQhXXZ88hqzd7W7DsJvB5lPOtppkvIu3UNkuaFsob9Oska4', NULL, '2019-05-28 01:48:01'),
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
(4, 'minuto_hombre', '1333,333333333', '2019-05-22 05:00:00', '2019-05-22 05:00:00'),
(5, 'hora_hombre', '80000', '2019-07-30 05:00:00', '2019-07-30 05:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
