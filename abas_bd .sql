-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 05:30 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

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
(7, 'jefetecnico', 'Jefe Técnico', NULL, NULL);

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_cliente`, `nit_cedula`, `nombre_cliente`, `razon_social`, `sector_economico`, `municipio`, `direccion`, `barrio`, `zona`, `estado_negociacion`, `estado_facturacion`, `estado_agendamiento`, `estado_registro`, `nombre_contacto_inicial`, `cargo_contacto_inicial`, `celular_contacto_inicial`, `email_contacto_inicial`, `nombre_contacto_tecnico`, `cargo_contacto_tecnico`, `celular_contacto_tecnico`, `email_contacto_tecnico`, `nombre_contacto_facturacion`, `cargo_contacto_facturacion`, `celular_contacto_facturacion`, `email_contacto_facturacion`, `empresa_actual`, `razon_cambio`, `medio_contacto`, `otro_medio`, `doc_rut`, `doc_identidad`, `doc_camara_comercio`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Persona Juridica', '135246849-7', 'Fruver los Paisas', 'Fruver Colombia S.A.S.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Normal', 'Activo', 'recompra', 'Jenny Molina', 'Gerente General', '3154874545', 'jenny@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Plagas S.A.S.', 'Mal servicio', NULL, NULL, 1, 1, 1, 1, '2018-05-07 13:50:00', '2019-05-01 18:32:03'),
(2, 'Persona Natural', '32135686', 'Luis Felipe Cortéz', NULL, 'indefinido', 'Santiago de Cali', 'CRA 4 # 12A - 399', 'Caldas', 'Suroccidente', 'Prospecto', 'Normal', 'Activo', 'recompra', 'Luis Felipe Cortéz', 'Independiente', '311565468', 'luis@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indefinido', 'indefinido', NULL, NULL, 0, 1, 0, 3, '2018-05-07 13:50:00', '2019-05-01 18:32:03'),
(3, 'Persona Natural', '987656546', 'Lina Maria Chavez', NULL, 'indefinido', 'indefinido', 'CRA 4A # 45A - 34', 'La Campiña', 'Norte', 'Prospecto', 'Normal', 'Activo', 'recompra', 'Lina Maria Chavez', 'Independiente', '318546813', 'lian@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indefinido', 'indefinido', NULL, NULL, 1, 1, 0, 3, '2018-05-07 13:50:00', '2019-05-01 18:42:20'),
(4, 'Persona Juridica', '654984651-7', 'Supermercado Super Inter', 'Exito S.A.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Normal', 'Activo', 'recompra', 'Jenny Molina', 'Gerente General', '3154874545', 'jenny@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Plagas S.A.S.', 'Mal servicio', NULL, NULL, 0, 0, 0, 1, '2018-05-07 13:50:00', '2019-05-01 18:32:03'),
(5, 'Persona Juridica', '00161654758-7', 'La California', 'California S.A.', 'Comercial', 'Santiago de Cali', 'CRA 32 # 10 - 39', 'Departamental', 'Sur', 'Prospecto', 'Normal', 'Activo', 'recompra', 'Pepito Perez', 'Gerente General', '3106546567', 'pepe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indefinido', 'ninguna', NULL, NULL, 0, 0, 1, 5, '2018-05-07 13:50:00', '2019-05-01 18:32:03'),
(6, 'Persona Natural', '65465465', 'Felipe López', NULL, 'indefinido', 'indefinido', 'AV 6 # 60AN - 34', 'Santa Mónica', 'Norte', 'Prospecto', 'Normal', 'Activo', 'recompra', 'Felipe Lopez', 'Independiente', '3195191511', 'felipe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indefinido', 'indefinido', NULL, NULL, 1, 0, 0, 5, '2018-05-07 13:50:00', '2019-05-01 18:32:03'),
(7, 'Persona Juridica', '98165468-1', 'PRACTY LABS', 'PRACTY LABS S.A.S.', 'RESIDENCIAL', 'CALI', 'SANTA MONICA', 'AV 7 # 25 - 49', 'NORTE', 'Prospecto', 'Normal', 'Activo', 'cliente_nuevo', 'FRANCISCO CANO', 'REPRESETANTE LEGAL', '300265465', 'FRAN@GMAIL.COM', 'JULIAN RODRIGUEZZ', 'TECNOLOGIA', '3008245668', 'JULIAN@GMAIL.COM', 'FELIPE DUQUE', 'GERENTE', '3012154645', 'FELIPE@GMAIL.COM', 'NINGUNA', 'NINGUNA', 'AMIGO', '', 0, 0, 0, 1, '2019-05-01 20:05:46', '2019-05-01 20:11:13');

--
-- Dumping data for table `comisions`
--

INSERT INTO `comisions` (`id`, `codigo`, `fecha_inicio_comision`, `fecha_fin_comision`, `valor_pagado`, `valor_pendiente`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'CM1052019', '2019-05-01', '2019-05-31', 75660, 46000, 1, '2019-05-01 20:27:02', '2019-05-01 20:27:02'),
(2, 'CM3052019', '2019-05-01', '2019-05-31', 33000, 18600, 3, '2019-05-01 20:27:13', '2019-05-01 20:27:13');

--
-- Dumping data for table `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `codigo`, `estado`, `estado_aprobacion`, `valor`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'CT-VMA-1', 'Final', 'no_aprobada', 756000, 1, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(2, 'CT-VMA-2', 'Final', 'no_aprobada', 350000, 2, '2019-10-29 20:21:00', '2019-10-30 01:21:00'),
(3, 'CT-VMA-4', 'Final', 'no_aprobada', 875000, 4, '2019-09-29 20:21:00', '2019-09-30 01:21:00'),
(4, 'CT-VMA-3', 'Final', 'no_aprobada', 450000, 3, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(5, 'CT-JVP-5', 'Final', 'no_aprobada', 640000, 5, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(6, 'CT-JVP-6', 'Final', 'no_aprobada', 710000, 6, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(7, '465798', 'Final', 'no_aprobada', 510000, 7, '2019-05-01 20:08:16', '2019-05-01 20:08:16');

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `fecha_inicio`, `fecha_fin`, `dia_completo`, `color`, `asunto`, `tipo`, `cliente_id`, `sede_id`, `telefono_evento`, `direccion_evento`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2018-04-15 14:00:00', '2018-04-15 15:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 03219689', 'Llamada', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, '2018-04-14 14:00:00', '2018-04-14 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 03219689', 'Visita', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(3, '2018-04-03 14:00:00', '2018-04-03 17:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 9865465', 'Llamada', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(4, '2018-04-14 14:00:00', '2018-04-18 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 96546ASD', 'Visita', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(5, '2019-05-01 00:00:00', '2019-05-01 01:00:00', NULL, NULL, 'llevar todos los implementos para revision completa', 'visita', 7, '6', NULL, NULL, 1, '2019-05-01 20:05:46', '2019-05-01 20:05:46');

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id`, `numero_factura`, `valor`, `estado`, `tipo`, `fecha_inicio_vigencia`, `fecha_fin_vigencia`, `fecha_pago`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, '912878931', 500000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 1, '2019-05-01 18:38:56', '2019-05-01 18:38:56'),
(2, '9879283', 350000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 1, '2019-05-01 18:39:08', '2019-05-01 18:39:08'),
(3, '12312313', 422000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 1, '2019-05-01 18:39:20', '2019-05-01 18:39:20'),
(4, '787867', 450000, 'Pendiente', 'individial', '2019-05-01', '2019-05-01', NULL, 1, '2019-05-01 18:39:33', '2019-05-01 18:39:33'),
(5, '546464', 300000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 3, '2019-05-01 18:40:04', '2019-05-01 18:40:04'),
(6, '234241114', 550000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 3, '2019-05-01 18:40:16', '2019-05-01 18:40:16'),
(7, '6516548', 620000, 'Pendiente', 'individial', '2019-05-01', '2019-05-01', NULL, 3, '2019-05-01 18:40:28', '2019-05-01 18:40:28'),
(8, '876871', 250000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 3, '2019-05-01 18:40:41', '2019-05-01 18:40:41'),
(9, '28716837', 980000, 'Pendiente', 'maestra', '2019-11-01', '2019-12-31', NULL, 1, '2019-05-01 18:41:22', '2019-05-01 18:41:22'),
(10, '2327684', 450000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 7, '2019-05-01 20:12:56', '2019-05-01 20:12:56'),
(11, '566666', 300000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-01', 7, '2019-05-01 20:13:10', '2019-05-01 20:13:10'),
(12, '844444', 650000, 'Pendiente', 'individial', '2019-05-01', '2019-05-01', NULL, 7, '2019-05-01 20:13:22', '2019-05-01 20:13:22');

--
-- Dumping data for table `inspeccions`
--

INSERT INTO `inspeccions` (`id`, `codigo`, `nombre_usuario`, `fecha`, `frecuencia`, `observaciones`, `visitas`, `valor_plan_saneamiento`, `frecuencia_visitas`, `observaciones_visitas`, `detalle_servicios`, `total_detalle_servicios`, `tipo_facturacion`, `forma_pago`, `contrato`, `factura_maestra`, `residencias`, `cant_lampara_lamina`, `cant_lampara_insectocutora`, `cant_trampas`, `cant_jaulas`, `cant_estaciones_roedor`, `observaciones_estaciones`, `cant_cajas_alca_elec`, `sumideros`, `compra_dispositivos`, `dispositivos_comodato`, `gestion_calidad`, `medio_contacto`, `otro`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'FS6619', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '20', 'asdasd', '[{\"tipo_servicio\":\"TERMONEBULIZACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Mensual\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'green', '8_dias', 0, 1, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"122222\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"adasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"2\",\"total_dispositivo\":\"3333\",\"observacion_dispositivo\":\"aasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"22222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"mapas_estaciones_lamparas\",\"frecuencia_documento\":\"semanal\",\"observacion_documento\":\"asdasd\"}]', 'amigo', NULL, 1, 1, '2019-05-01 18:37:15', '2019-05-01 18:37:15'),
(2, 'FS6705', 'Andres Stiven Medina Bejarano', '2019-05-01', 'Ocasional', 'asdasd', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 2123, '15', '123asdasd', '[{\"tipo_servicio\":\"GASIFICACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'sc', '90_dias', 1, 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"12312\",\"tiempo_estimado\":\"62\",\"observaciones_residencia\":\"asdasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"12222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"aswasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"1\",\"total_dispositivo\":\"1\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"bimestral\",\"observacion_documento\":\"asdasd\"}]', 'amigo', NULL, 3, 0, '2019-05-01 18:37:27', '2019-05-01 18:37:27'),
(3, 'FS2032', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '12', '5564654', '[{\"tipo_servicio\":\"CONTROL DE PLAGAS BASICO SIN ROEDORES\",\"valor_servicio\":\"15000\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 15000, 'green', '8_dias', 0, 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"250000\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"obvarsoinas\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"estaciones_de_roedor\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"111111\",\"total_dispositivo\":\"121211\",\"observacion_dispositivo\":\"observaciones\"}]', '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"11\",\"total_dispositivo\":\"1111\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"quincenal\",\"observacion_documento\":\"asdasd\"}]', 'amigo', NULL, 7, 6, '2019-05-01 20:11:04', '2019-05-01 20:11:04');

--
-- Dumping data for table `novedads`
--

INSERT INTO `novedads` (`id`, `descripcion`, `estado`, `user2_id`, `prioridad`, `user_id`, `area_id`, `cliente_id`, `sede_id`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 04456 presenta plaga de ratas en la sede principal', 'publicada', NULL, 'Normal', 1, 3, NULL, NULL, 'Novedad resuleta con éxito', '2018-04-18 21:58:00', NULL),
(2, 'La factura 00565468 no ha sido pagada', 'publicada', NULL, 'Normal', 2, 2, NULL, NULL, NULL, '2018-04-17 20:58:00', NULL),
(3, 'Cliente No. 20316 no ha pagado el servicio', 'publicada', NULL, 'Normal', 1, 1, NULL, NULL, NULL, '2018-04-19 20:21:00', NULL);

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre_comercial`, `tipo`, `presentacion`, `unidad_medida`, `total_unidades`, `valor_unidad`, `costo_total`, `created_at`, `updated_at`) VALUES
(1, 'Polvo', 'insecticida', 'po', 'gr', '15000.0', '2.01', 30000, NULL, NULL),
(2, 'Gel', 'insecticida', 'gel', 'gr', '10000.0', '1.08', 30000, NULL, NULL),
(3, 'Fosfuro de Aluminio', 'insecticida', 'bp', 'un', '10000.0', '1.50', 30000, NULL, NULL),
(4, 'Cebo Café', 'insecticida', 'bp', 'un', '10000.0', '1.80', 30000, NULL, NULL),
(5, 'Cebo Verde', 'insecticida', 'bp', 'un', '10000.0', '1.00', 30000, NULL, NULL),
(6, 'Trampa Rata', 'insecticida', 'ec', 'un', '10000.0', '1.22', 30000, NULL, NULL),
(7, 'Trampa Raton', 'insecticida', 'ec', 'un', '10000.0', '1.14', 30000, NULL, NULL),
(8, 'Tram. Impacto', 'insecticida', 'sc', 'un', '10000.0', '1.90', 30000, NULL, NULL),
(9, 'Bromadiolona', 'insecticida', 'sc', 'un', '10000.0', '0.40', 30000, NULL, NULL),
(10, 'Brodifacoum', 'insecticida', 'sc', 'un', '10000.0', '1.10', 30000, NULL, NULL),
(11, 'Lam. Lampara', 'insecticida', 'bp', 'un', '10000.0', '1.20', 30000, NULL, NULL),
(12, 'Sani-T 10', 'insecticida', 'bp', 'ml', '10000.0', '1.70', 30000, NULL, NULL),
(13, 'Alfa-cipermetrina SC', 'insecticida', 'ec', 'ml', '10000.0', '1.30', 30000, NULL, NULL),
(14, 'Beta-cipermetrina SC', 'insecticida', 'ec', 'ml', '10000.0', '1.80', 30000, NULL, NULL),
(15, 'Deltametrina SC', 'insecticida', 'ec', 'ml', '10000.0', '1.60', 30000, NULL, NULL),
(16, 'Cyfluthrin EC', 'insecticida', 'ec', 'ml', '10000.0', '1.65', 30000, NULL, NULL),
(17, 'Deltametrina EC', 'insecticida', 'ec', 'ml', '10000.0', '1.44', 30000, NULL, NULL),
(18, 'Piretrina Natural', 'insecticida', 'ec', 'ml', '10000.0', '1.21', 30000, NULL, NULL),
(19, 'Fipronil SC', 'insecticida', 'sc', 'ml', '10000.0', '1.30', 30000, NULL, NULL),
(20, 'Tiametoxan', 'insecticida', 'sc', 'gr', '10000.0', '1.96', 30000, NULL, NULL),
(21, 'Temephos', 'insecticida', 'sc', 'gr', '10000.0', '2.10', 30000, NULL, NULL),
(22, 'Bacillus Thuringiensis', 'insecticida', 'sc', 'gr', '10000.0', '3.20', 30000, NULL, NULL);

--
-- Dumping data for table `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `direccion`, `ciudad`, `barrio`, `zona_ruta`, `nombre_contacto`, `telefono_contacto`, `celular_contacto`, `email_contacto`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'Fruver Santa Librada', 'CRA 46 #54 - 44', 'Cali', 'Santa Librada', 'Centro', 'Ricardo', '126456', '31321898', 'ricardo@gmail.com', 1, NULL, NULL),
(2, 'Fruver Chipichape', 'CRA 6 #51 - 44', 'Cali', 'Chipichape', 'Norte', 'Francisco', '126456', '31321898', 'francisco@gmail.com', 1, NULL, NULL),
(3, 'Super Inter La  Flora', 'CRA 5 #65 - 44', 'Cali', 'La Flora', 'Norte', 'juan', '126456', '31321898', 'juan@gmail.com', 4, NULL, NULL),
(4, 'Super Inter San Fernando', 'CRA 46 #54 - 44', 'Cali', 'San Fernando', 'Centro', 'Jorge', '126456', '31321898', 'Jorge@gmail.com', 4, NULL, NULL),
(5, 'California La Rivera', 'CLL 70 #35 - 44', 'Cali', 'La Rivera', 'Norte', 'Alfredo', '9516546', '31321800', 'alfredo@gmail.com', 5, NULL, NULL),
(6, 'PRACTY NORTE', 'AV7 # 25 - 49', 'CALI', 'SANTA MONICA', 'NORTE', 'FRANCISCO CANO', '81654654', '3100351654', 'FRAN@GMAIL.COM', 7, '2019-05-01 20:05:46', '2019-05-01 20:05:46'),
(7, 'PRACTY CHIPICHAPE', 'AV 6 # 45 - 15', 'CALI', 'CHIPICHAPE', 'NORTE', 'FELIPE DUQUE', '3216546', '1313132565', 'FELIPE@GMAIL.COM', 7, '2019-05-01 20:06:36', '2019-05-01 20:06:36');

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `frecuencia`, `frecuencia_str`, `serie`, `tipo`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `duracion`, `confirmado`, `estado`, `color`, `observaciones`, `solicitud_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'meses', 'S1', 'Normal', '2019-05-02', '12:00:00', '2019-05-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, '2019-05-01 18:38:01', '2019-05-01 20:12:15'),
(2, 2, 'meses', 'S1', 'Normal', '2019-07-02', '12:00:00', '2019-07-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(3, 2, 'meses', 'S1', 'Normal', '2019-09-02', '12:00:00', '2019-09-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(4, 2, 'meses', 'S1', 'Normal', '2019-11-02', '12:00:00', '2019-11-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(5, 2, 'meses', 'S1', 'Normal', '2020-01-02', '12:00:00', '2020-01-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(6, 2, 'meses', 'S1', 'Normal', '2020-03-02', '12:00:00', '2020-03-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(7, 2, 'meses', 'S1', 'Normal', '2020-05-02', '12:00:00', '2020-05-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(8, 2, 'meses', 'S1', 'Normal', '2020-07-02', '12:00:00', '2020-07-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(9, 2, 'meses', 'S1', 'Normal', '2020-09-02', '12:00:00', '2020-09-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(10, 2, 'meses', 'S1', 'Normal', '2020-11-02', '12:00:00', '2020-11-02', '13:00:00', 60, 0, 'Pendiente', 'rgb(69,130,29)', 'observaciones', 1, NULL, NULL),
(11, 2, 'meses', 'S11', 'Normal', '2019-05-10', '13:00:00', '2019-05-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, '2019-05-01 18:38:29', '2019-05-01 18:38:29'),
(12, 2, 'meses', 'S11', 'Normal', '2019-07-10', '13:00:00', '2019-07-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(13, 2, 'meses', 'S11', 'Normal', '2019-09-10', '13:00:00', '2019-09-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(14, 2, 'meses', 'S11', 'Normal', '2019-11-11', '13:00:00', '2019-11-11', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(15, 2, 'meses', 'S11', 'Normal', '2020-01-10', '13:00:00', '2020-01-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(16, 2, 'meses', 'S11', 'Normal', '2020-03-10', '13:00:00', '2020-03-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(17, 2, 'meses', 'S11', 'Normal', '2020-05-11', '13:00:00', '2020-05-11', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(18, 2, 'meses', 'S11', 'Normal', '2020-07-10', '13:00:00', '2020-07-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(19, 2, 'meses', 'S11', 'Normal', '2020-09-10', '13:00:00', '2020-09-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(20, 2, 'meses', 'S11', 'Normal', '2020-11-10', '13:00:00', '2020-11-10', '15:00:00', 120, 0, 'Pendiente', 'rgb(255,130,0)', 'asdasd', 2, NULL, NULL),
(21, 2, 'meses', 'S21', 'Normal', '2019-05-06', '13:00:00', '2019-05-06', '15:02:00', 122, 1, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, '2019-05-01 20:11:58', '2019-05-01 20:12:08'),
(22, 2, 'meses', 'S21', 'Normal', '2019-07-06', '13:00:00', '2019-07-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(23, 2, 'meses', 'S21', 'Normal', '2019-09-06', '13:00:00', '2019-09-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(24, 2, 'meses', 'S21', 'Normal', '2019-11-06', '13:00:00', '2019-11-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(25, 2, 'meses', 'S21', 'Normal', '2020-01-06', '13:00:00', '2020-01-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(26, 2, 'meses', 'S21', 'Normal', '2020-03-06', '13:00:00', '2020-03-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(27, 2, 'meses', 'S21', 'Normal', '2020-05-06', '13:00:00', '2020-05-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(28, 2, 'meses', 'S21', 'Normal', '2020-07-06', '13:00:00', '2020-07-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(29, 2, 'meses', 'S21', 'Normal', '2020-09-07', '13:00:00', '2020-09-07', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL),
(30, 2, 'meses', 'S21', 'Normal', '2020-11-06', '13:00:00', '2020-11-06', '15:02:00', 122, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, NULL, NULL);

--
-- Dumping data for table `servicio_tecnico`
--

INSERT INTO `servicio_tecnico` (`servicio_id`, `tecnico_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 5, NULL, NULL),
(2, 1, NULL, NULL),
(2, 5, NULL, NULL),
(3, 1, NULL, NULL),
(3, 5, NULL, NULL),
(4, 1, NULL, NULL),
(4, 5, NULL, NULL),
(5, 1, NULL, NULL),
(5, 5, NULL, NULL),
(6, 1, NULL, NULL),
(6, 5, NULL, NULL),
(7, 1, NULL, NULL),
(7, 5, NULL, NULL),
(8, 1, NULL, NULL),
(8, 5, NULL, NULL),
(9, 1, NULL, NULL),
(9, 5, NULL, NULL),
(10, 1, NULL, NULL),
(10, 5, NULL, NULL),
(11, 4, NULL, NULL),
(12, 4, NULL, NULL),
(13, 4, NULL, NULL),
(14, 4, NULL, NULL),
(15, 4, NULL, NULL),
(16, 4, NULL, NULL),
(17, 4, NULL, NULL),
(18, 4, NULL, NULL),
(19, 4, NULL, NULL),
(20, 4, NULL, NULL),
(21, 3, NULL, NULL),
(22, 3, NULL, NULL),
(23, 3, NULL, NULL),
(24, 3, NULL, NULL),
(25, 3, NULL, NULL),
(26, 3, NULL, NULL),
(27, 3, NULL, NULL),
(28, 3, NULL, NULL),
(29, 3, NULL, NULL),
(30, 3, NULL, NULL);

--
-- Dumping data for table `servicio_tipo_servicio`
--

INSERT INTO `servicio_tipo_servicio` (`id_servicio_tipo`, `servicio_id`, `tipo_servicio_id`, `numero_factura`, `valor`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '912878931', 500000, 'Pagado', '2019-05-01 18:38:01', '2019-05-01 20:00:46'),
(2, 1, 6, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(3, 1, 14, '9879283', 350000, 'Pagado', '2019-05-01 18:38:01', '2019-05-01 20:00:48'),
(4, 2, 3, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(5, 2, 6, '12312313', 422000, 'Pagado', '2019-05-01 18:38:01', '2019-05-01 20:00:54'),
(6, 2, 14, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(7, 3, 3, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(8, 3, 6, '787867', 450000, 'Pendiente', '2019-05-01 18:38:01', NULL),
(9, 3, 14, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(10, 4, 3, '28716837', 980000, 'Pendiente', '2019-05-01 18:38:01', NULL),
(11, 4, 6, '28716837', 980000, 'Pendiente', '2019-05-01 18:38:01', NULL),
(12, 4, 14, '28716837', 980000, 'Pendiente', '2019-05-01 18:38:01', NULL),
(13, 5, 3, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(14, 5, 6, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(15, 5, 14, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(16, 6, 3, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(17, 6, 6, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(18, 6, 14, NULL, NULL, 'na', '2019-05-01 18:38:01', NULL),
(19, 7, 3, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(20, 7, 6, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(21, 7, 14, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(22, 8, 3, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(23, 8, 6, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(24, 8, 14, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(25, 9, 3, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(26, 9, 6, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(27, 9, 14, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(28, 10, 3, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(29, 10, 6, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(30, 10, 14, NULL, NULL, 'na', '2019-05-01 18:38:02', NULL),
(31, 11, 5, '546464', 300000, 'Pagado', '2019-05-01 18:38:29', '2019-05-01 20:01:15'),
(32, 11, 13, '876871', 250000, 'Pagado', '2019-05-01 18:38:29', '2019-05-01 20:01:17'),
(33, 11, 16, '234241114', 550000, 'Pagado', '2019-05-01 18:38:29', '2019-05-01 20:01:20'),
(34, 12, 5, NULL, NULL, 'na', '2019-05-01 18:38:29', NULL),
(35, 12, 13, '6516548', 620000, 'Pendiente', '2019-05-01 18:38:29', NULL),
(36, 12, 16, NULL, NULL, 'na', '2019-05-01 18:38:29', NULL),
(37, 13, 5, NULL, NULL, 'na', '2019-05-01 18:38:29', NULL),
(38, 13, 13, NULL, NULL, 'na', '2019-05-01 18:38:29', NULL),
(39, 13, 16, NULL, NULL, 'na', '2019-05-01 18:38:29', NULL),
(40, 14, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(41, 14, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(42, 14, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(43, 15, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(44, 15, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(45, 15, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(46, 16, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(47, 16, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(48, 16, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(49, 17, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(50, 17, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(51, 17, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(52, 18, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(53, 18, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(54, 18, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(55, 19, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(56, 19, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(57, 19, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(58, 20, 5, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(59, 20, 13, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(60, 20, 16, NULL, NULL, 'na', '2019-05-01 18:38:30', NULL),
(61, 21, 4, '2327684', 450000, 'Pagado', '2019-05-01 20:11:58', '2019-05-01 20:13:42'),
(62, 21, 14, NULL, NULL, 'na', '2019-05-01 20:11:58', NULL),
(63, 22, 4, '566666', 300000, 'Pagado', '2019-05-01 20:11:58', '2019-05-01 20:13:44'),
(64, 22, 14, NULL, NULL, 'na', '2019-05-01 20:11:58', NULL),
(65, 23, 4, NULL, NULL, 'na', '2019-05-01 20:11:58', NULL),
(66, 23, 14, '844444', 650000, 'Pendiente', '2019-05-01 20:11:58', NULL),
(67, 24, 4, NULL, NULL, 'na', '2019-05-01 20:11:58', NULL),
(68, 24, 14, NULL, NULL, 'na', '2019-05-01 20:11:58', NULL),
(69, 25, 4, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(70, 25, 14, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(71, 26, 4, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(72, 26, 14, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(73, 27, 4, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(74, 27, 14, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(75, 28, 4, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(76, 28, 14, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(77, 29, 4, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(78, 29, 14, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(79, 30, 4, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL),
(80, 30, 14, NULL, NULL, 'na', '2019-05-01 20:11:59', NULL);

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `codigo`, `nombre_usuario`, `fecha`, `frecuencia`, `observaciones`, `visitas`, `valor_plan_saneamiento`, `frecuencia_visitas`, `observaciones_visitas`, `detalle_servicios`, `total_detalle_servicios`, `tipo_facturacion`, `forma_pago`, `contrato`, `residencias`, `cant_lampara_lamina`, `cant_lampara_insectocutora`, `cant_trampas`, `cant_jaulas`, `cant_estaciones_roedor`, `observaciones_estaciones`, `cant_cajas_alca_elec`, `sumideros`, `compra_dispositivos`, `dispositivos_comodato`, `gestion_calidad`, `areas`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'INSP5969', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '20', 'asdasd', '[{\"tipo_servicio\":\"TERMONEBULIZACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Mensual\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'green', '8_dias', 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"122222\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"adasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"2\",\"total_dispositivo\":\"3333\",\"observacion_dispositivo\":\"aasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"22222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"mapas_estaciones_lamparas\",\"frecuencia_documento\":\"semanal\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"sasa\",\"tiempo_estimado\":\"61\",\"plagas_area\":[\"moscas\",\"garrapatas\"],\"nivel_actividad_area\":\"medio\"}]', 1, 1, '2019-05-01 18:34:39', '2019-05-01 18:34:39'),
(2, 'INSP2223', 'Andres Stiven Medina Bejarano', '2019-05-01', 'Ocasional', 'asdasd', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 2123, '15', '123asdasd', '[{\"tipo_servicio\":\"GASIFICACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'sc', '90_dias', 1, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"12312\",\"tiempo_estimado\":\"62\",\"observaciones_residencia\":\"asdasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"12222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"aswasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"1\",\"total_dispositivo\":\"1\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"bimestral\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"sasa\",\"tiempo_estimado\":\"NaN\",\"nivel_actividad_area\":\"alto\"}]', 3, 0, '2019-05-01 18:36:44', '2019-05-01 18:36:44'),
(3, 'INSP4479', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '12', '5564654', '[{\"tipo_servicio\":\"CONTROL DE PLAGAS BASICO SIN ROEDORES\",\"valor_servicio\":\"15000\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 15000, 'green', '8_dias', 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"250000\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"obvarsoinas\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"estaciones_de_roedor\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"111111\",\"total_dispositivo\":\"121211\",\"observacion_dispositivo\":\"observaciones\"}]', '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"11\",\"total_dispositivo\":\"1111\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"quincenal\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"OficiNA pRINCIPAl\",\"tiempo_estimado\":\"120\",\"plagas_area\":[\"pulgas\"],\"nivel_actividad_area\":\"bajo\"}]', 7, 6, '2019-05-01 20:10:40', '2019-05-01 20:10:40');

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id`, `asunto`, `completado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Llamar al cliente #0321498', 0, 1, NULL, NULL),
(2, 'Pagar recibo de Energia', 1, 1, NULL, NULL),
(3, 'LLamar a Jhon', 0, 1, NULL, NULL),
(4, 'Pasar lso clientes a ABAS', 0, 2, NULL, NULL),
(5, 'Poner en el calendario algo', 1, 2, NULL, NULL);

--
-- Dumping data for table `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nombre`, `estado`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Antonio Pérez', 'activo', 'rgb(69,130,29)', NULL, NULL),
(2, 'Luis Alejandro Rojas', 'activo', 'rgb(219,165,37)', NULL, NULL),
(3, 'Fernando López', 'activo', 'rgb(92,174,39)', NULL, NULL),
(4, 'Andrés Stiven Bejarano', 'activo', 'rgb(255,130,0)', NULL, NULL),
(5, 'Jhon Alex Barrios', 'activo', 'rgb(2,112,192)', NULL, NULL);

--
-- Dumping data for table `telefonos`
--

INSERT INTO `telefonos` (`id`, `numero`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, '8362465', 7, '2019-05-01 20:05:46', '2019-05-01 20:05:46');

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

INSERT INTO `users` (`id`, `cedula`, `nombres`, `apellidos`, `iniciales`, `telefono`, `foto`, `email`, `password`, `area_id`, `cargo_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'default-user.jpg', 'victormalsx@gmail.com', '$2y$10$ApzshZDpFrvQzf0ycAJDT.yMarzR5iXY4oMUyxZHsxl1lqDMZIWOu', 1, 1, 'UPQqrhS5zWuro2UiZSK41ZhdHxP0gdhPVD9OMJeeuFZ2LAmz4QEHil7zRO4T', NULL, NULL),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'a6.jpg', 'yurani@gmail.com', '$2y$10$C279jhl0s46wYyr1uuu00OOouY1B4TYiQnbXXBK48l.yhUD7mN6ue', 2, 2, 'mWJBsslloCxdenyDG2LgzFBD6UZgKRS5cIr3hm1HdXKVf8ABXjy7gcvCGOn9', NULL, NULL),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'a1.jpg', 'andres@gmail.com', '$2y$10$Du7JITRNBCrqvj/2loo8eORFsGbOXcUl/sW5tKKpGnZBS4y4Anz/m', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'a7.jpg', 'jhon@gmail.com', '$2y$10$SbxWHsjMEtVC0K2ERjxCIe4K2zzMvSl/CkvktfZSEI4oyCN7KoXTG', 3, 3, 'zrTlT7GMI4oD5gx6IAqvdFlJqqH1US8A5fWrf82qbJ0NQPYfBndSBObPQyiA', NULL, NULL),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'a9.jpg', 'jhonny@gmail.com', '$2y$10$UIDt0beHPXpkJ/pcuuuZtOoKRYoBhmqnhQgVzx2Laa8NjnbMvbSgG', 3, 4, NULL, NULL, NULL),
(6, 951789123, 'Jhon', 'Doe', 'JD', '3177777750', 'a10.jpg', 'jhon.doe@gmail.com', '$2y$10$RH/f89iBHKiMNcc6p2h8qupNtOconBR1UAE88LeRzqQygFmjHgfCC', 4, 5, NULL, NULL, NULL),
(7, 1062545984, 'Diego', 'Leguizamo', 'DLL', '321654987', 'a11.jpg', 'diego@gmail.com', '$2y$10$Y2xgM9E4rPRgeaOzkxtKG.8d9snUTey4.w2tuG0luPzRkxNNs9h0q', 6, 7, NULL, NULL, NULL),
(8, 687459687, 'Sarah', 'Jhonson', 'SCJ', '3177777750', 'a12.jpg', 'sarah@gmail.com', '$2y$10$twKtAG0AtB5Y3RvelIJTAeUVOtQMXIbj87s/1YfeKiWh9rJv37cn2', 5, 6, NULL, NULL, NULL),
(9, 99999999, 'Fernando', 'Serna', 'FS', '3177777750', 'default-user.jpg', 'fernandoserna@sanicontrol.com', '$2y$10$7L.tN71DkEjAY7bhTzcC1uIrT3ACdKBPk28dGkXphrGpecDNsKxN.', 1, 1, NULL, NULL, NULL),
(10, 88888888, 'Cristian', 'León', 'CL', '3177777750', 'default-user.jpg', 'cristianleon@sanicontrol.com', '$2y$10$4cTNY0zGtG6wfzYApi/f/.yVJLVfW.4zi5a9WQuZWJ/e2mqtWTOFK', 1, 1, NULL, NULL, NULL),
(11, 111111111, 'Programador', 'Sanicontrol', 'PS', '3177777750', 'default-user.jpg', 'programacion@sanicontrol.com', '$2y$10$w8uvk.q/.5eaAZ1yW2YehOJVLqRzWRDeMoPEjEHDtLrb/ReXhtOpy', 3, 3, NULL, NULL, NULL);

--
-- Dumping data for table `valor_generals`
--

INSERT INTO `valor_generals` (`id`, `descripcion`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'porcentaje_recompras', '3', NULL, NULL),
(2, 'porcentaje_clientes_nuevos', '5', NULL, NULL),
(3, 'porcentaje_clientes_contrato', '8', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
