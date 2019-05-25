-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2019 at 10:07 PM
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
-- Dumping data for table `area_novedad`
--

INSERT INTO `area_novedad` (`area_id`, `novedad_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL),
(2, 4, NULL, NULL),
(3, 4, NULL, NULL),
(4, 4, NULL, NULL),
(5, 4, NULL, NULL),
(6, 4, NULL, NULL);

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
-- Dumping data for table `certificados`
--

INSERT INTO `certificados` (`id`, `area_tratada`, `frecuencia`, `tratamientos`, `productos`, `solicitud_id`, `created_at`, `updated_at`) VALUES
(2, 'TODAS', 'Mensual', '[\"Desinsectacion\"]', '[{\"producto\":\"Insecticida\",\"nombreComercial\":\"POLVO\",\"toxicidad\":\"1\"},{\"producto\":\"Trampas\",\"nombreComercial\":\"OTRO\",\"toxicidad\":\"0\"}]', 3, '2019-05-11 21:41:30', '2019-05-11 21:41:30'),
(3, 'area prncipal', 'Mensual', '[\"Desinsectacion\"]', '[{\"producto\":\"Insecticida\",\"nombreComercial\":\"asdasd\",\"toxicidad\":\"1\"}]', 5, '2019-05-11 21:48:03', '2019-05-11 21:48:03'),
(4, 'OTROS', 'Mensual', '[\"Desinsectacion\"]', '[{\"producto\":\"Insecticida\",\"nombreComercial\":\"iuyiu\",\"toxicidad\":\"1\"}]', 1, '2019-05-11 22:25:29', '2019-05-11 22:25:29'),
(5, 'SALA', 'Mensual', '[\"Desinsectacion\"]', '[{\"producto\":\"Insecticida\",\"nombreComercial\":\"axczx\",\"toxicidad\":\"1\"}]', 2, '2019-05-11 22:26:06', '2019-05-11 22:26:06');

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
(7, 'Persona Juridica', '98165468-1', 'PRACTY LABS', 'PRACTY LABS S.A.S.', 'RESIDENCIAL', 'CALI', 'SANTA MONICA', 'AV 7 # 25 - 49', 'NORTE', 'Prospecto', 'Normal', 'Activo', 'cliente_contrato', 'FRANCISCO CANO', 'REPRESETANTE LEGAL', '300265465', 'FRAN@GMAIL.COM', 'JULIAN RODRIGUEZZ', 'TECNOLOGIA', '3008245668', 'JULIAN@GMAIL.COM', 'FELIPE DUQUE', 'GERENTE', '3012154645', 'FELIPE@GMAIL.COM', 'NINGUNA', 'NINGUNA', 'AMIGO', '', 0, 0, 0, 1, '2019-05-01 20:05:46', '2019-05-05 20:13:26');

--
-- Dumping data for table `comisions`
--

INSERT INTO `comisions` (`id`, `codigo`, `fecha_inicio_comision`, `fecha_fin_comision`, `valor_pagado`, `valor_pendiente`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'CM1052019', '2019-05-01', '2019-05-31', 75660, 46000, 1, '2019-05-01 20:27:02', '2019-05-01 20:27:02'),
(2, 'CM3052019', '2019-05-01', '2019-05-31', 33000, 18600, 3, '2019-05-01 20:27:13', '2019-05-01 20:27:13');

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id`, `numero_factura`, `unidad_medida`, `total_unidades`, `valor_unidad`, `costo_total`, `producto_id`, `created_at`, `updated_at`) VALUES
(2, '123423423', 'ml', '5', '450.00', 25, 19, '2019-05-10 04:33:59', '2019-05-10 04:33:59'),
(3, '123423423', 'ml', '5', '450.00', 25, 19, '2019-05-10 04:34:22', '2019-05-10 04:34:22'),
(4, '123423423', 'ml', '5', '450.00', 25, 19, '2019-05-10 04:35:12', '2019-05-10 04:35:12'),
(5, '484987', 'gr', '8000', '150.00', 89000, 2, '2019-05-19 05:00:00', '2019-05-19 17:02:52');

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
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id`, `codigo`, `tipo`, `fecha_inicio_vigencia`, `fecha_fin_vigencia`, `url`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'CSM120190501', 'diagnostico_inicial', '2019-04-01', '2019-05-09', 'www.google.com', 7, 6, '2019-05-03 05:00:00', '2019-05-03 05:00:00'),
(2, 'DGI620190401', 'cronograma_servicios', '2019-03-01', '2019-04-01', 'google-com', 7, 6, '2019-05-03 05:00:00', '2019-05-03 05:00:00'),
(3, 'CRS120190401', 'cronograma_servicios', '2019-05-01', '2019-04-01', 'asdasdasdas', 1, 1, NULL, NULL),
(4, 'CRS120190501', 'cronograma_servicios', '2019-05-09', '2019-05-01', 'asdasdasd', 3, 0, NULL, NULL),
(5, 'VC620190501', 'cronograma_servicios', '2019-05-01', '2019-05-01', 'asdasda', 7, 6, NULL, NULL);

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
(2, '9879283', 350000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-02', 1, '2019-05-01 18:39:08', '2019-05-01 18:39:08'),
(3, '12312313', 422000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-10', 1, '2019-05-01 18:39:20', '2019-05-01 18:39:20'),
(4, '787867', 450000, 'Pendiente', 'individial', '2019-05-01', '2019-05-01', NULL, 1, '2019-05-01 18:39:33', '2019-05-01 18:39:33'),
(5, '546464', 300000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-06', 3, '2019-05-01 18:40:04', '2019-05-01 18:40:04'),
(6, '234241114', 550000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-16', 3, '2019-05-01 18:40:16', '2019-05-01 18:40:16'),
(7, '6516548', 620000, 'Pendiente', 'individial', '2019-05-01', '2019-05-01', NULL, 3, '2019-05-01 18:40:28', '2019-05-01 18:40:28'),
(8, '876871', 250000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-17', 3, '2019-05-01 18:40:41', '2019-05-01 18:40:41'),
(9, '28716837', 980000, 'Pendiente', 'maestra', '2019-11-01', '2019-12-31', NULL, 1, '2019-05-01 18:41:22', '2019-05-01 18:41:22'),
(10, '2327684', 450000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-20', 7, '2019-05-01 20:12:56', '2019-05-01 20:12:56'),
(11, '566666', 300000, 'Pagado', 'individial', '2019-05-01', '2019-05-01', '2019-05-04', 7, '2019-05-01 20:13:10', '2019-05-01 20:13:10'),
(12, '844444', 650000, 'Pendiente', 'individial', '2019-05-01', '2019-05-01', NULL, 7, '2019-05-01 20:13:22', '2019-05-01 20:13:22');

--
-- Dumping data for table `inspeccions`
--

INSERT INTO `inspeccions` (`id`, `codigo`, `nombre_usuario`, `fecha`, `frecuencia`, `observaciones`, `visitas`, `valor_plan_saneamiento`, `frecuencia_visitas`, `observaciones_visitas`, `detalle_servicios`, `total_detalle_servicios`, `tipo_facturacion`, `forma_pago`, `contrato`, `factura_maestra`, `residencias`, `cant_lampara_lamina`, `cant_lampara_insectocutora`, `cant_trampas`, `cant_jaulas`, `cant_estaciones_roedor`, `observaciones_estaciones`, `cant_cajas_alca_elec`, `sumideros`, `compra_dispositivos`, `dispositivos_comodato`, `gestion_calidad`, `medio_contacto`, `otro`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'FS6619', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '20', 'asdasd', '[{\"tipo_servicio\":\"TERMONEBULIZACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Mensual\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'green', '8_dias', 0, 1, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"122222\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"adasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"2\",\"total_dispositivo\":\"3333\",\"observacion_dispositivo\":\"aasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"22222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"mapas_estaciones_lamparas\",\"frecuencia_documento\":\"semanal\",\"observacion_documento\":\"asdasd\"}]', 'amigo', NULL, 1, 1, '2019-05-01 18:37:15', '2019-05-01 18:37:15'),
(2, 'FS6705', 'Andres Stiven Medina Bejarano', '2019-05-01', 'Ocasional', 'asdasd', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 2123, '15', '123asdasd', '[{\"tipo_servicio\":\"GASIFICACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'sc', '90_dias', 1, 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"12312\",\"tiempo_estimado\":\"62\",\"observaciones_residencia\":\"asdasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"12222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"aswasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"1\",\"total_dispositivo\":\"1\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"bimestral\",\"observacion_documento\":\"asdasd\"}]', 'amigo', NULL, 3, 0, '2019-05-01 18:37:27', '2019-05-01 18:37:27'),
(3, 'FS2032', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '12', '5564654', '[{\"tipo_servicio\":\"CONTROL DE PLAGAS BASICO SIN ROEDORES\",\"valor_servicio\":\"15000\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 15000, 'green', '8_dias', 0, 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"250000\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"obvarsoinas\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"estaciones_de_roedor\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"111111\",\"total_dispositivo\":\"121211\",\"observacion_dispositivo\":\"observaciones\"}]', '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"11\",\"total_dispositivo\":\"1111\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"quincenal\",\"observacion_documento\":\"asdasd\"}]', 'amigo', NULL, 7, 6, '2019-05-01 20:11:04', '2019-05-01 20:11:04');

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('03e26017-86fc-4c70-9f3d-a317f1e3b103', 'ABAS\\Notifications\\NovedadPublicada', 5, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('1aeee6ad-fea9-4042-a902-844b0b82a3a6', 'ABAS\\Notifications\\NovedadPublicada', 10, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('3547197f-9c3a-49b1-91c9-dedaefb36dce', 'ABAS\\Notifications\\NovedadPublicada', 9, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('3f315c7b-266a-468f-bf51-3c65b7755b50', 'ABAS\\Notifications\\NovedadPublicada', 7, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('57c4ee5c-ce92-4b15-abc2-8734883aba14', 'ABAS\\Notifications\\NovedadPublicada', 11, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('7296056a-7b1d-437f-b110-0d31a21b2750', 'ABAS\\Notifications\\NovedadPublicada', 8, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('776574ce-2b27-4c86-bf04-f0b6a909ffb7', 'ABAS\\Notifications\\NovedadPublicada', 2, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('7c236629-ed53-4d5d-8145-8244353c80d7', 'ABAS\\Notifications\\NovedadPublicada', 4, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43'),
('f62037f4-d2a2-4bdf-8782-a10b48c83ca6', 'ABAS\\Notifications\\NovedadPublicada', 3, 'ABAS\\User', '{\"id\":0,\"descripcion\":\"Novedad de prueba\",\"user_id\":6,\"nombres\":\"Jhon\",\"apellidos\":\"Doe\",\"foto\":\"a10.jpg\"}', NULL, '2019-05-24 07:07:43', '2019-05-24 07:07:43');

--
-- Dumping data for table `novedads`
--

INSERT INTO `novedads` (`id`, `descripcion`, `estado`, `user2_id`, `prioridad`, `user_id`, `tipo`, `area_id`, `cliente_id`, `sede_id`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 04456 presenta plaga de ratas en la sede principal', 'publicada', NULL, 'Normal', 1, 'Novedad', 3, NULL, NULL, 'Novedad resuleta con éxito', '2018-04-18 21:58:00', NULL),
(2, 'La factura 00565468 no ha sido pagada', 'publicada', NULL, 'Normal', 2, 'Novedad', 2, NULL, NULL, NULL, '2018-04-17 20:58:00', NULL),
(3, 'Cliente No. 20316 no ha pagado el servicio', 'publicada', NULL, 'Normal', 1, 'Novedad', 1, NULL, NULL, NULL, '2018-04-19 20:21:00', NULL),
(4, 'Novedad de prueba', 'resuelta', 1, 'Normal', 6, 'Novedad', 0, NULL, NULL, 'Prueba resuelta', '2019-05-24 07:07:43', '2019-05-24 07:08:32');

--
-- Dumping data for table `orden_servicios`
--

INSERT INTO `orden_servicios` (`id`, `codigo`, `servicio_id`, `areas_plagas`, `nivel_actividad`, `realizo_inspeccion`, `tratamiento_correctivo`, `tratamiento_preventivo`, `requiere_refuerzo`, `mejorar_frecuencia`, `created_at`, `updated_at`) VALUES
(9, 'ODS-VMA.S1', 21, '[\"asdasd\"]', '[{\"plaga\":\"BLATELLA GERMANICA\",\"nivel\":\"0\"},{\"plaga\":\"PERIPLANETA\",\"nivel\":\"0\"},{\"plaga\":\"DULCERA\",\"nivel\":\"0\"},{\"plaga\":\"LOCA\",\"nivel\":\"0\"},{\"plaga\":\"FARAONA\",\"nivel\":\"0\"},{\"plaga\":\"FUEGO\",\"nivel\":\"0\"},{\"plaga\":\"FANTASMA\",\"nivel\":\"0\"},{\"plaga\":\"RATTUS RATTUS\",\"nivel\":\"0\"},{\"plaga\":\"RATTUS NORVEGICUS\",\"nivel\":\"0\"},{\"plaga\":\"MUS MUSCULUS\",\"nivel\":\"0\"},{\"plaga\":\"otra_1\",\"nivel\":\"0\"},{\"plaga\":\"otra_2\",\"nivel\":\"0\"}]', 1, 0, 1, 1, 1, '2019-05-11 23:25:56', '2019-05-11 23:25:56'),
(10, 'ODS-VMA.S2', 21, '[\"SALA\"]', '[{\"plaga\":\"BLATELLA GERMANICA\",\"nivel\":\"0\"},{\"plaga\":\"PERIPLANETA\",\"nivel\":\"0\"},{\"plaga\":\"DULCERA\",\"nivel\":\"0\"},{\"plaga\":\"LOCA\",\"nivel\":\"0\"},{\"plaga\":\"FARAONA\",\"nivel\":\"0\"},{\"plaga\":\"FUEGO\",\"nivel\":\"0\"},{\"plaga\":\"FANTASMA\",\"nivel\":\"0\"},{\"plaga\":\"RATTUS RATTUS\",\"nivel\":\"0\"},{\"plaga\":\"RATTUS NORVEGICUS\",\"nivel\":\"0\"},{\"plaga\":\"MUS MUSCULUS\",\"nivel\":\"0\"},{\"plaga\":\"otra_1\",\"nivel\":\"0\"},{\"plaga\":\"otra_2\",\"nivel\":\"0\"}]', 1, 0, 1, 1, 1, '2019-05-11 23:31:18', '2019-05-11 23:31:18');

--
-- Dumping data for table `orden_servicio_producto`
--

INSERT INTO `orden_servicio_producto` (`id`, `orden_servicio_id`, `producto_id`, `cantidad_aplicada`, `created_at`, `updated_at`) VALUES
(13, 9, 1, '500', '2019-05-11 23:25:56', '2019-05-11 23:25:56'),
(14, 10, 2, '1500', '2019-05-11 23:31:18', '2019-05-11 23:31:18'),
(15, 10, 14, '100', '2019-05-11 23:31:18', '2019-05-11 23:31:18');

--
-- Dumping data for table `orden_servicio_tecnico`
--

INSERT INTO `orden_servicio_tecnico` (`id`, `orden_servicio_id`, `tecnico_id`, `hora_entrada`, `hora_salida`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '14:30:00', '14:45:00', '2019-05-22 05:00:00', NULL),
(2, 2, 1, '13:18:00', '17:25:00', '2019-05-20 05:00:00', NULL),
(3, 3, 1, '13:18:00', '17:25:00', '2019-05-11 05:00:00', NULL),
(4, 4, 1, '13:18:00', '17:25:00', '2019-05-20 05:00:00', NULL),
(5, 5, 1, '13:18:00', '17:25:00', '2019-05-03 05:00:00', NULL),
(6, 6, 1, '13:18:00', '17:25:00', '2019-05-04 05:00:00', NULL),
(7, 7, 1, '13:18:00', '17:25:00', '2019-05-19 05:00:00', NULL),
(8, 8, 1, '13:18:00', '17:25:00', '2019-05-16 05:00:00', NULL),
(9, 9, 1, '13:18:00', '17:17:00', '2019-05-13 05:00:00', NULL),
(10, 10, 1, '15:30:00', '14:30:00', '2019-05-18 05:00:00', NULL);

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
-- Dumping data for table `producto_ruta`
--

INSERT INTO `producto_ruta` (`id`, `ruta_id`, `producto_id`, `cantidad_aplicada`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1.3', '2019-05-22 05:00:00', NULL),
(4, 2, 2, '1.3', '2019-05-20 05:00:00', NULL),
(5, 4, 1, '1500.0', '2019-05-12 05:00:00', NULL),
(6, 4, 2, '2500.0', '2019-05-11 05:00:00', NULL),
(7, 4, 1, '1500.0', '2019-05-19 05:00:00', NULL),
(8, 4, 2, '2500.0', '2019-05-18 05:00:00', NULL),
(9, 4, 1, '1500.0', '2019-05-05 05:00:00', NULL),
(10, 4, 2, '2500.0', '2019-05-09 05:00:00', NULL),
(11, 3, 1, '1000.0', '2019-05-10 05:00:00', NULL),
(12, 3, 2, '2000.0', '2019-05-01 05:00:00', NULL);

--
-- Dumping data for table `rutas`
--

INSERT INTO `rutas` (`id`, `tipo`, `codigo`, `contenido`, `solicitud_id`, `created_at`, `updated_at`) VALUES
(1, 'RUTA DE SANEAMIENTO', 'RS03', '[{\"area\":\"SALA\",\"frecuencia\":\"Mensual\"},{\"area\":\"OFICINA PRINCIPAL\",\"frecuencia\":\"Mensual\"}]', 3, '2019-05-11 21:30:26', '2019-05-11 21:30:26'),
(2, 'RUTA DE LAMPARAS', 'RL03', '[{\"area\":\"SALA\",\"tipoLampara\":\"lamina\"}]', 3, '2019-05-11 21:30:46', '2019-05-11 21:30:46'),
(3, 'RUTA DE ROEDORES EXTERNA', 'RRE03', '[{\"area\":\"SALA\",\"tipoTrampa\":\"Adhesiva\"}]', 3, '2019-05-11 21:31:04', '2019-05-11 21:31:04'),
(4, 'RUTA DE ROEDORES INTERNA', 'RRI03', '[{\"area\":\"OFICNA\",\"tipoTrampa\":\"Cebo\"}]', 3, '2019-05-11 21:31:04', '2019-05-11 21:31:04');

--
-- Dumping data for table `ruta_tecnico`
--

INSERT INTO `ruta_tecnico` (`id`, `ruta_id`, `tecnico_id`, `hora_entrada`, `hora_salida`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '02:30:00', '04:30:00', '2019-05-13 05:00:00', NULL),
(2, 3, 3, '17:30:00', '19:00:00', NULL, NULL);

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
(1, 0, 'dias', 'S1', 'Normal', '2019-05-01', '23:00:00', '2019-05-02', '02:00:00', 180, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 3, '2019-05-22 05:12:19', '2019-05-22 05:12:19'),
(2, 2, 'meses', 'S2', 'Normal', '2019-05-02', '14:02:00', '2019-05-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, '2019-05-22 05:13:03', '2019-05-22 05:13:03'),
(3, 2, 'meses', 'S2', 'Normal', '2019-07-02', '14:02:00', '2019-07-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(4, 2, 'meses', 'S2', 'Normal', '2019-09-02', '14:02:00', '2019-09-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(5, 2, 'meses', 'S2', 'Normal', '2019-11-02', '14:02:00', '2019-11-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(6, 2, 'meses', 'S2', 'Normal', '2020-01-02', '14:02:00', '2020-01-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(7, 2, 'meses', 'S2', 'Normal', '2020-03-02', '14:02:00', '2020-03-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(8, 2, 'meses', 'S2', 'Normal', '2020-05-02', '14:02:00', '2020-05-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(9, 2, 'meses', 'S2', 'Normal', '2020-07-02', '14:02:00', '2020-07-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(10, 2, 'meses', 'S2', 'Normal', '2020-09-02', '14:02:00', '2020-09-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(11, 2, 'meses', 'S2', 'Normal', '2020-11-02', '14:02:00', '2020-11-02', '17:03:00', 181, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, NULL, NULL),
(12, 2, 'dias', 'S12', 'Refuerzo', '2019-05-03', '15:00:00', '2019-05-03', '18:01:00', 181, 0, 'Pendiente', 'rgb(219,165,37)', 'observaciones', 3, '2019-05-22 05:14:40', '2019-05-22 05:14:40'),
(13, 2, 'anios', 'S13', 'Refuerzo', '2019-05-04', '00:07:00', '2019-05-04', '01:09:00', 62, 0, 'Pendiente', 'rgb(219,165,37)', 'observaciones', 3, '2019-05-22 05:20:18', '2019-05-22 05:20:18'),
(15, 2, 'anios', 'S15', 'Normal', '2019-05-06', '14:07:00', '2019-05-06', '19:07:00', 300, 0, 'Pendiente', 'rgb(219,165,37)', 'observaciones', 3, '2019-05-22 05:25:45', '2019-05-22 05:25:45'),
(17, 5, 'semanas', 'S16', 'Normal', '2019-06-11', '15:04:00', '2019-06-11', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(18, 5, 'semanas', 'S16', 'Normal', '2019-07-16', '15:04:00', '2019-07-16', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(19, 5, 'semanas', 'S16', 'Normal', '2019-08-20', '15:04:00', '2019-08-20', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(20, 5, 'semanas', 'S16', 'Normal', '2019-09-24', '15:04:00', '2019-09-24', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(21, 5, 'semanas', 'S16', 'Normal', '2019-10-29', '15:04:00', '2019-10-29', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(22, 5, 'semanas', 'S16', 'Normal', '2019-12-03', '15:04:00', '2019-12-03', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(23, 5, 'semanas', 'S16', 'Normal', '2020-01-07', '15:04:00', '2020-01-07', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(24, 5, 'semanas', 'S16', 'Normal', '2020-02-11', '15:04:00', '2020-02-11', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(25, 5, 'semanas', 'S16', 'Normal', '2020-03-17', '15:04:00', '2020-03-17', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(26, 5, 'semanas', 'S16', 'Normal', '2020-04-21', '15:04:00', '2020-04-21', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(27, 5, 'semanas', 'S16', 'Normal', '2020-05-26', '15:04:00', '2020-05-26', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(28, 5, 'semanas', 'S16', 'Normal', '2020-06-30', '15:04:00', '2020-06-30', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(29, 5, 'semanas', 'S16', 'Normal', '2020-08-04', '15:04:00', '2020-08-04', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(30, 5, 'semanas', 'S16', 'Normal', '2020-09-08', '15:04:00', '2020-09-08', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(31, 5, 'semanas', 'S16', 'Normal', '2020-10-13', '15:04:00', '2020-10-13', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(32, 5, 'semanas', 'S16', 'Normal', '2020-11-17', '15:04:00', '2020-11-17', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(33, 5, 'semanas', 'S16', 'Normal', '2020-12-22', '15:04:00', '2020-12-22', '17:05:00', 121, 0, 'Pendiente', 'rgb(255,130,0)', 'observaciones', 3, NULL, NULL),
(35, 6, 'anios', 'S35', 'Normal', '2019-05-07', '00:02:00', '2019-05-07', '02:03:00', 121, 0, 'Pendiente', 'rgb(2,112,192)', 'observaciones', 3, '2019-05-22 05:38:12', '2019-05-22 05:38:12'),
(40, 3, 'meses', 'S40', 'Normal', '2019-05-09', '02:03:00', '2019-05-09', NULL, 123, 0, 'Pendiente', 'rgb(219,165,37)', 'observaciones', 3, '2019-05-22 23:53:49', '2019-05-23 00:17:28'),
(70, 3, 'semanas', 'S70', 'Normal', '2019-05-31', '15:00:00', '2019-05-31', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, '2019-05-22 23:57:19', '2019-05-22 23:57:19'),
(71, 3, 'semanas', 'S70', 'Normal', '2019-06-21', '15:00:00', '2019-06-21', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(72, 3, 'semanas', 'S70', 'Normal', '2019-07-12', '15:00:00', '2019-07-12', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(73, 3, 'semanas', 'S70', 'Normal', '2019-08-02', '15:00:00', '2019-08-02', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(74, 3, 'semanas', 'S70', 'Normal', '2019-08-23', '15:00:00', '2019-08-23', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(75, 3, 'semanas', 'S70', 'Normal', '2019-09-13', '15:00:00', '2019-09-13', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(76, 3, 'semanas', 'S70', 'Normal', '2019-10-04', '15:00:00', '2019-10-04', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(77, 3, 'semanas', 'S70', 'Normal', '2019-10-25', '15:00:00', '2019-10-25', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(78, 3, 'semanas', 'S70', 'Normal', '2019-11-15', '15:00:00', '2019-11-15', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(79, 3, 'semanas', 'S70', 'Normal', '2019-12-06', '15:00:00', '2019-12-06', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(80, 3, 'semanas', 'S70', 'Normal', '2019-12-27', '15:00:00', '2019-12-27', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(81, 3, 'semanas', 'S70', 'Normal', '2020-01-17', '15:00:00', '2020-01-17', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(82, 3, 'semanas', 'S70', 'Normal', '2020-02-07', '15:00:00', '2020-02-07', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(83, 3, 'semanas', 'S70', 'Normal', '2020-02-28', '15:00:00', '2020-02-28', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(84, 3, 'semanas', 'S70', 'Normal', '2020-03-20', '15:00:00', '2020-03-20', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(85, 3, 'semanas', 'S70', 'Normal', '2020-04-10', '15:00:00', '2020-04-10', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(86, 3, 'semanas', 'S70', 'Normal', '2020-05-01', '15:00:00', '2020-05-01', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(87, 3, 'semanas', 'S70', 'Normal', '2020-05-22', '15:00:00', '2020-05-22', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(88, 3, 'semanas', 'S70', 'Normal', '2020-06-12', '15:00:00', '2020-06-12', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(89, 3, 'semanas', 'S70', 'Normal', '2020-07-03', '15:00:00', '2020-07-03', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(90, 3, 'semanas', 'S70', 'Normal', '2020-07-24', '15:00:00', '2020-07-24', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(91, 3, 'semanas', 'S70', 'Normal', '2020-08-14', '15:00:00', '2020-08-14', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(92, 3, 'semanas', 'S70', 'Normal', '2020-09-04', '15:00:00', '2020-09-04', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(93, 3, 'semanas', 'S70', 'Normal', '2020-09-25', '15:00:00', '2020-09-25', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(94, 3, 'semanas', 'S70', 'Normal', '2020-10-16', '15:00:00', '2020-10-16', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(95, 3, 'semanas', 'S70', 'Normal', '2020-11-06', '15:00:00', '2020-11-06', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(96, 3, 'semanas', 'S70', 'Normal', '2020-11-27', '15:00:00', '2020-11-27', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL),
(97, 3, 'semanas', 'S70', 'Normal', '2020-12-18', '15:00:00', '2020-12-18', '18:09:00', 189, 0, 'Pendiente', 'rgb(92,174,39)', 'observaciones', 1, NULL, NULL);

--
-- Dumping data for table `servicio_tecnico`
--

INSERT INTO `servicio_tecnico` (`servicio_id`, `tecnico_id`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL),
(2, 5, NULL, NULL),
(3, 5, NULL, NULL),
(4, 5, NULL, NULL),
(5, 5, NULL, NULL),
(6, 5, NULL, NULL),
(7, 5, NULL, NULL),
(8, 5, NULL, NULL),
(9, 5, NULL, NULL),
(10, 5, NULL, NULL),
(11, 5, NULL, NULL),
(17, 4, NULL, NULL),
(18, 4, NULL, NULL),
(19, 4, NULL, NULL),
(20, 4, NULL, NULL),
(21, 4, NULL, NULL),
(22, 4, NULL, NULL),
(23, 4, NULL, NULL),
(24, 4, NULL, NULL),
(25, 4, NULL, NULL),
(26, 4, NULL, NULL),
(27, 4, NULL, NULL),
(28, 4, NULL, NULL),
(29, 4, NULL, NULL),
(30, 4, NULL, NULL),
(31, 4, NULL, NULL),
(32, 4, NULL, NULL),
(33, 4, NULL, NULL),
(35, 5, NULL, NULL),
(70, 3, NULL, NULL),
(71, 3, NULL, NULL),
(72, 3, NULL, NULL),
(73, 3, NULL, NULL),
(74, 3, NULL, NULL),
(75, 3, NULL, NULL),
(76, 3, NULL, NULL),
(77, 3, NULL, NULL),
(78, 3, NULL, NULL),
(79, 3, NULL, NULL),
(80, 3, NULL, NULL),
(81, 3, NULL, NULL),
(82, 3, NULL, NULL),
(83, 3, NULL, NULL),
(84, 3, NULL, NULL),
(85, 3, NULL, NULL),
(86, 3, NULL, NULL),
(87, 3, NULL, NULL),
(88, 3, NULL, NULL),
(89, 3, NULL, NULL),
(90, 3, NULL, NULL),
(91, 3, NULL, NULL),
(92, 3, NULL, NULL),
(93, 3, NULL, NULL),
(94, 3, NULL, NULL),
(95, 3, NULL, NULL),
(96, 3, NULL, NULL),
(97, 3, NULL, NULL),
(40, 2, NULL, NULL);

--
-- Dumping data for table `servicio_tipo_servicio`
--

INSERT INTO `servicio_tipo_servicio` (`id_servicio_tipo`, `servicio_id`, `tipo_servicio_id`, `numero_factura`, `valor`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL, 'na', '2019-05-22 05:12:19', NULL),
(2, 2, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(3, 3, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(4, 4, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(5, 5, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(6, 6, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(7, 7, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(8, 8, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(9, 9, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(10, 10, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(11, 11, 6, NULL, NULL, 'na', '2019-05-22 05:13:03', NULL),
(12, 17, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(13, 17, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(14, 18, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(15, 18, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(16, 19, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(17, 19, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(18, 20, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(19, 20, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(20, 21, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(21, 21, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(22, 22, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(23, 22, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(24, 23, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(25, 23, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(26, 24, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(27, 24, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(28, 25, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(29, 25, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(30, 26, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(31, 26, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(32, 27, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(33, 27, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(34, 28, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(35, 28, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(36, 29, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(37, 29, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(38, 30, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(39, 30, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(40, 31, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(41, 31, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(42, 32, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(43, 32, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(44, 33, 2, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(45, 33, 4, NULL, NULL, 'na', '2019-05-22 05:29:26', NULL),
(47, 35, 2, NULL, NULL, 'na', '2019-05-22 05:38:12', NULL),
(48, 70, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(49, 71, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(50, 72, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(51, 73, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(52, 74, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(53, 75, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(54, 76, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(55, 77, 2, NULL, NULL, 'na', '2019-05-22 23:57:19', NULL),
(56, 78, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(57, 79, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(58, 80, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(59, 81, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(60, 82, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(61, 83, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(62, 84, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(63, 85, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(64, 86, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(65, 87, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(66, 88, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(67, 89, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(68, 90, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(69, 91, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(70, 92, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(71, 93, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(72, 94, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(73, 95, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(74, 96, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(75, 97, 2, NULL, NULL, 'na', '2019-05-22 23:57:20', NULL),
(76, 40, 3, NULL, NULL, 'na', '2019-05-23 00:17:28', NULL);

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `codigo`, `nombre_usuario`, `fecha`, `frecuencia`, `observaciones`, `visitas`, `valor_plan_saneamiento`, `frecuencia_visitas`, `observaciones_visitas`, `detalle_servicios`, `total_detalle_servicios`, `tipo_facturacion`, `forma_pago`, `contrato`, `residencias`, `cant_lampara_lamina`, `cant_lampara_insectocutora`, `cant_trampas`, `cant_jaulas`, `cant_estaciones_roedor`, `observaciones_estaciones`, `cant_cajas_alca_elec`, `sumideros`, `compra_dispositivos`, `dispositivos_comodato`, `gestion_calidad`, `areas`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'INSP5969', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '20', 'asdasd', '[{\"tipo_servicio\":\"TERMONEBULIZACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Mensual\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'green', '8_dias', 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"122222\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"adasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"2\",\"total_dispositivo\":\"3333\",\"observacion_dispositivo\":\"aasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"22222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"mapas_estaciones_lamparas\",\"frecuencia_documento\":\"semanal\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"sasa\",\"tiempo_estimado\":\"61\",\"plagas_area\":[\"moscas\",\"garrapatas\"],\"nivel_actividad_area\":\"medio\"}]', 1, 1, '2019-05-01 18:34:39', '2019-05-01 18:34:39'),
(2, 'INSP2223', 'Andres Stiven Medina Bejarano', '2019-05-01', 'Ocasional', 'asdasd', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 2123, '15', '123asdasd', '[{\"tipo_servicio\":\"GASIFICACION\",\"valor_servicio\":\"12222\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 12222, 'sc', '90_dias', 1, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"12312\",\"tiempo_estimado\":\"62\",\"observaciones_residencia\":\"asdasd\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"12222\",\"total_dispositivo\":\"22222\",\"observacion_dispositivo\":\"aswasd\"}]', '[{\"tipo_dispositivo\":\"identificadores_lamparas\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"1\",\"total_dispositivo\":\"1\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"bimestral\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"sasa\",\"tiempo_estimado\":\"NaN\",\"nivel_actividad_area\":\"alto\"}]', 3, 0, '2019-05-01 18:36:44', '2019-05-01 18:36:44'),
(3, 'INSP4479', 'Victor Manuel Arenas Lopez', '2019-05-01', 'Ocasional', 'observaciones', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 111111, '12', '5564654', '[{\"tipo_servicio\":\"CONTROL DE PLAGAS BASICO SIN ROEDORES\",\"valor_servicio\":\"15000\",\"frecuencia_servicio\":\"Quincenal\",\"observacion_servicio\":\"asdasd\"}]', 15000, 'green', '8_dias', 0, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"250000\",\"tiempo_estimado\":\"61\",\"observaciones_residencia\":\"obvarsoinas\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"estaciones_de_roedor\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"111111\",\"total_dispositivo\":\"121211\",\"observacion_dispositivo\":\"observaciones\"}]', '[{\"tipo_dispositivo\":\"identificadores_estaciones\",\"cant_dispositivo\":\"1\",\"valor_sin_iva\":\"11\",\"total_dispositivo\":\"1111\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"diagnostico_inicial\",\"frecuencia_documento\":\"trimestral\",\"observacion_documento\":\"asdasd\"},{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"semestral\",\"observacion_documento\":\"asdasd\"},{\"tipo_documento\":\"mapas_estaciones_lamparas\",\"frecuencia_documento\":\"anual\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"OficiNA pRINCIPAl\",\"tiempo_estimado\":\"120\",\"plagas_area\":[\"pulgas\"],\"nivel_actividad_area\":\"bajo\"}]', 7, 6, '2019-05-01 20:10:40', '2019-05-01 20:10:40'),
(5, 'INSP9870', 'Victor Manuel Arenas Lopez', '2019-05-05', 'Ocasional', 'asdasdasd', '[{\"num_visita\":\"1\",\"duracion\":\"61\"}]', 11111, '12', '111111', '[{\"tipo_servicio\":\"CONTROL TERMITAS\",\"valor_servicio\":\"222222\",\"frecuencia_servicio\":\"Semestral\",\"observacion_servicio\":\"222222\"}]', 222222, 'sc', '30_dias', 1, '[{\"tipo_residencia\":\"apto\",\"valor_residencia\":\"2222222\",\"tiempo_estimado\":\"121\",\"observaciones_residencia\":\"q\"}]', 1, 1, 1, 1, 1, '1', 1, 1, '[{\"tipo_dispositivo\":\"jaula_grande\",\"cant_dispositivo\":\"2\",\"valor_sin_iva\":\"2222\",\"total_dispositivo\":\"222\",\"observacion_dispositivo\":\"asasd\"}]', '[{\"tipo_dispositivo\":\"estaciones_de_roedor\",\"cant_dispositivo\":\"2\",\"valor_sin_iva\":\"222222\",\"total_dispositivo\":\"2222\",\"observacion_dispositivo\":\"asdasd\"}]', '[{\"tipo_documento\":\"diagnostico_inicial\",\"frecuencia_documento\":\"semanal\",\"observacion_documento\":\"asdasd\"},{\"tipo_documento\":\"cronograma_servicios\",\"frecuencia_documento\":\"trimestral\",\"observacion_documento\":\"asdasd\"},{\"tipo_documento\":\"mapas_estaciones_lamparas\",\"frecuencia_documento\":\"diario\",\"observacion_documento\":\"asdasd\"}]', '[{\"area\":\"asa\",\"tiempo_estimado\":\"601\",\"plagas_area\":[\"pulgas\"],\"nivel_actividad_area\":\"alto\"}]', 7, 7, '2019-05-05 20:14:45', '2019-05-05 20:14:45');

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
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'default-user.jpg', 'victormalsx@gmail.com', '$2y$10$ApzshZDpFrvQzf0ycAJDT.yMarzR5iXY4oMUyxZHsxl1lqDMZIWOu', 1, 1, 'zngBBXqGy44HSSrMJi4xebdLtmNS74T3eXTb4oKFpaamlIHPS1QNL0IdQ7O1', NULL, NULL),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'a6.jpg', 'yurani@gmail.com', '$2y$10$C279jhl0s46wYyr1uuu00OOouY1B4TYiQnbXXBK48l.yhUD7mN6ue', 2, 2, 'mWJBsslloCxdenyDG2LgzFBD6UZgKRS5cIr3hm1HdXKVf8ABXjy7gcvCGOn9', NULL, NULL),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'a1.jpg', 'andres@gmail.com', '$2y$10$Du7JITRNBCrqvj/2loo8eORFsGbOXcUl/sW5tKKpGnZBS4y4Anz/m', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'a7.jpg', 'jhon@gmail.com', '$2y$10$SbxWHsjMEtVC0K2ERjxCIe4K2zzMvSl/CkvktfZSEI4oyCN7KoXTG', 3, 3, '2GpyNjqGR3iOdjdWIbJfXkxBfdcsMrQyaL3T9Ru0wVAymxZiMaeGXQDB6iUa', NULL, NULL),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'a9.jpg', 'jhonny@gmail.com', '$2y$10$UIDt0beHPXpkJ/pcuuuZtOoKRYoBhmqnhQgVzx2Laa8NjnbMvbSgG', 3, 4, NULL, NULL, NULL),
(6, 951789123, 'Jhon', 'Doe', 'JD', '3177777750', 'a10.jpg', 'jhon.doe@gmail.com', '$2y$10$RH/f89iBHKiMNcc6p2h8qupNtOconBR1UAE88LeRzqQygFmjHgfCC', 4, 5, 'K3tW4AkCUHQQ4UzqwOs4rNpa6CUpRDgijuLRcLVnGdGoQud9znSOGlDVbH90', NULL, NULL),
(7, 1062545984, 'Diego', 'Leguizamo', 'DLL', '321654987', 'a11.jpg', 'diego@gmail.com', '$2y$10$Y2xgM9E4rPRgeaOzkxtKG.8d9snUTey4.w2tuG0luPzRkxNNs9h0q', 6, 7, NULL, NULL, NULL),
(8, 687459687, 'Sarah', 'Jhonson', 'SCJ', '3177777750', 'a12.jpg', 'sarah@gmail.com', '$2y$10$twKtAG0AtB5Y3RvelIJTAeUVOtQMXIbj87s/1YfeKiWh9rJv37cn2', 5, 6, 'XzyB4OweXavIfsvNyb1YaKmZcRbftxvIlZsq5r8Qam7FHlUej39zmMzJtvrj', NULL, NULL),
(9, 99999999, 'Fernando', 'Serna', 'FS', '3177777750', 'default-user.jpg', 'fernandoserna@sanicontrol.com', '$2y$10$7L.tN71DkEjAY7bhTzcC1uIrT3ACdKBPk28dGkXphrGpecDNsKxN.', 1, 1, NULL, NULL, NULL),
(10, 88888888, 'Cristian', 'León', 'CL', '3177777750', 'default-user.jpg', 'cristianleon@sanicontrol.com', '$2y$10$4cTNY0zGtG6wfzYApi/f/.yVJLVfW.4zi5a9WQuZWJ/e2mqtWTOFK', 1, 1, NULL, NULL, NULL),
(11, 111111111, 'Programador', 'Sanicontrol', 'PS', '3177777750', 'default-user.jpg', 'programacion@sanicontrol.com', '$2y$10$w8uvk.q/.5eaAZ1yW2YehOJVLqRzWRDeMoPEjEHDtLrb/ReXhtOpy', 3, 3, NULL, NULL, NULL);

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
