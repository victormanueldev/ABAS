-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2019 at 10:01 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `area_novedad`
--

CREATE TABLE `area_novedad` (
  `area_id` int(11) NOT NULL,
  `novedad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `certificados`
--

CREATE TABLE `certificados` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_tratada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tratamientos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solicitud_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_cliente` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit_cedula` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_cliente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon_social` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sector_economico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barrio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zona` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_negociacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Prospecto',
  `estado_facturacion` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `estado_agendamiento` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Activo',
  `estado_registro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_contacto_inicial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto_inicial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_contacto_inicial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contacto_inicial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_contacto_facturacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto_facturacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_contacto_facturacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contacto_facturacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_actual` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon_cambio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medio_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otro_medio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_rut` tinyint(1) NOT NULL DEFAULT '0',
  `doc_identidad` tinyint(1) NOT NULL DEFAULT '0',
  `doc_camara_comercio` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comisions`
--

CREATE TABLE `comisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio_comision` date NOT NULL,
  `fecha_fin_comision` date NOT NULL,
  `valor_pagado` int(11) NOT NULL,
  `valor_pendiente` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_factura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `total_unidades` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_unidad` decimal(10,2) NOT NULL,
  `costo_total` bigint(20) UNSIGNED NOT NULL,
  `producto_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inicial',
  `estado_aprobacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no_aprobada',
  `valor` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio_vigencia` date NOT NULL,
  `fecha_fin_vigencia` date NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `dia_completo` tinyint(1) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asunto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `sede_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_evento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion_evento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_factura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio_vigencia` date NOT NULL,
  `fecha_fin_vigencia` date NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspeccions`
--

CREATE TABLE `inspeccions` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `frecuencia` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visitas` text COLLATE utf8_unicode_ci NOT NULL,
  `valor_plan_saneamiento` int(11) NOT NULL,
  `frecuencia_visitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones_visitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detalle_servicios` text COLLATE utf8_unicode_ci NOT NULL,
  `total_detalle_servicios` int(11) NOT NULL,
  `tipo_facturacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forma_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrato` tinyint(1) NOT NULL,
  `factura_maestra` tinyint(1) NOT NULL,
  `residencias` text COLLATE utf8_unicode_ci NOT NULL,
  `cant_lampara_lamina` int(11) NOT NULL,
  `cant_lampara_insectocutora` int(11) NOT NULL,
  `cant_trampas` int(11) NOT NULL,
  `cant_jaulas` int(11) NOT NULL,
  `cant_estaciones_roedor` int(11) NOT NULL,
  `observaciones_estaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cant_cajas_alca_elec` int(11) NOT NULL,
  `sumideros` int(11) NOT NULL,
  `compra_dispositivos` text COLLATE utf8_unicode_ci NOT NULL,
  `dispositivos_comodato` text COLLATE utf8_unicode_ci NOT NULL,
  `gestion_calidad` text COLLATE utf8_unicode_ci NOT NULL,
  `medio_contacto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otro` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_clientes_nuevos` int(11) NOT NULL,
  `tipo_meta` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `meta_equipo_clientes_nuevos` int(11) DEFAULT '0',
  `meta_recompras` int(11) NOT NULL,
  `meta_equipo_recompras` int(11) DEFAULT '0',
  `mes_vigencia` int(11) NOT NULL,
  `meta_anual_inpector` int(11) DEFAULT '0',
  `meta_anual_equipo` int(11) DEFAULT '0',
  `anio_vigencia` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(614, '2014_10_12_000000_create_users_table', 1),
(615, '2014_10_12_100000_create_password_resets_table', 1),
(616, '2018_04_12_022651_create_areas_table', 1),
(617, '2018_04_12_023001_create_cargos_table', 1),
(618, '2018_04_12_190550_create_clientes_table', 1),
(619, '2018_04_12_193958_create_sedes_table', 1),
(620, '2018_04_12_195156_create_tareas_table', 1),
(621, '2018_04_12_235243_create_novedads_table', 1),
(622, '2018_04_13_011115_create_area_novedad_table', 1),
(623, '2018_04_15_175902_create_eventos_table', 1),
(624, '2018_05_10_203827_create_notifications_table', 1),
(625, '2018_05_14_205719_create_solicitudes_table', 1),
(626, '2018_05_30_215131_create_telefonos_table', 1),
(627, '2018_06_22_111550_create_servicios_table', 1),
(628, '2018_06_22_115017_create_tecnicos_table', 1),
(629, '2018_07_27_215505_create_tipo_servicios_table', 1),
(630, '2018_07_27_220255_create_servicio_tecnico', 1),
(631, '2018_08_01_220413_create_servicio_tipo_servicio_table', 1),
(632, '2018_11_08_185829_create_certificados_table', 1),
(633, '2018_11_11_100214_create_rutas_table', 1),
(634, '2018_11_27_214335_create_cotizaciones_table', 1),
(635, '2018_11_29_200551_create_metas_table', 1),
(636, '2018_11_30_195752_create_facturas_table', 1),
(637, '2019_01_10_190005_create_novedad_temporals_table', 1),
(638, '2019_01_25_233108_create_orden_servicios_table', 1),
(639, '2019_01_26_001133_create_productos_table', 1),
(640, '2019_01_26_003818_create_orden_servicio_producto', 1),
(641, '2019_01_27_175935_create_orden_servico_tecnico', 1),
(642, '2019_01_27_221128_create_producto_ruta', 1),
(643, '2019_02_19_225749_create_inspeccions_table', 1),
(644, '2019_04_13_200938_create_comisions_table', 1),
(645, '2019_05_01_155648_create_valor_generals_table', 1),
(646, '2019_05_03_205251_create_documentos_table', 1),
(647, '2019_05_09_204650_create_compras_table', 1),
(648, '2019_05_15_201525_ruta_tecnico', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `novedads`
--

CREATE TABLE `novedads` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'publicada',
  `user2_id` int(11) DEFAULT NULL,
  `prioridad` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `user_id` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Novedad',
  `area_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `comentario` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `novedad_temporals`
--

CREATE TABLE `novedad_temporals` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completado` tinyint(1) NOT NULL DEFAULT '0',
  `cliente_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orden_servicios`
--

CREATE TABLE `orden_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `areas_plagas` text COLLATE utf8_unicode_ci,
  `nivel_actividad` text COLLATE utf8_unicode_ci NOT NULL,
  `realizo_inspeccion` tinyint(1) NOT NULL DEFAULT '0',
  `tratamiento_correctivo` tinyint(1) NOT NULL DEFAULT '0',
  `tratamiento_preventivo` tinyint(1) NOT NULL DEFAULT '0',
  `requiere_refuerzo` tinyint(1) NOT NULL DEFAULT '0',
  `mejorar_frecuencia` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orden_servicio_producto`
--

CREATE TABLE `orden_servicio_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `orden_servicio_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_aplicada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orden_servicio_tecnico`
--

CREATE TABLE `orden_servicio_tecnico` (
  `id` int(10) UNSIGNED NOT NULL,
  `orden_servicio_id` int(11) NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_comercial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `presentacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `total_unidades` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor_unidad` decimal(10,2) NOT NULL,
  `costo_total` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `producto_ruta`
--

CREATE TABLE `producto_ruta` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_aplicada` decimal(5,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rutas`
--

CREATE TABLE `rutas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solicitud_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruta_tecnico`
--

CREATE TABLE `ruta_tecnico` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sedes`
--

CREATE TABLE `sedes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barrio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zona_ruta` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_contacto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `frecuencia` smallint(5) UNSIGNED DEFAULT NULL,
  `frecuencia_str` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serie` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `duracion` mediumint(8) UNSIGNED DEFAULT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `solicitud_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicio_tecnico`
--

CREATE TABLE `servicio_tecnico` (
  `servicio_id` int(11) NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicio_tipo_servicio`
--

CREATE TABLE `servicio_tipo_servicio` (
  `id_servicio_tipo` int(10) UNSIGNED NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL,
  `numero_factura` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'na',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `frecuencia` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visitas` text COLLATE utf8_unicode_ci NOT NULL,
  `valor_plan_saneamiento` int(11) NOT NULL,
  `frecuencia_visitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones_visitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detalle_servicios` text COLLATE utf8_unicode_ci NOT NULL,
  `total_detalle_servicios` int(11) NOT NULL,
  `tipo_facturacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forma_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrato` tinyint(1) NOT NULL,
  `residencias` text COLLATE utf8_unicode_ci NOT NULL,
  `cant_lampara_lamina` int(11) NOT NULL,
  `cant_lampara_insectocutora` int(11) NOT NULL,
  `cant_trampas` int(11) NOT NULL,
  `cant_jaulas` int(11) NOT NULL,
  `cant_estaciones_roedor` int(11) NOT NULL,
  `observaciones_estaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cant_cajas_alca_elec` int(11) NOT NULL,
  `sumideros` int(11) NOT NULL,
  `compra_dispositivos` text COLLATE utf8_unicode_ci NOT NULL,
  `dispositivos_comodato` text COLLATE utf8_unicode_ci NOT NULL,
  `gestion_calidad` text COLLATE utf8_unicode_ci NOT NULL,
  `areas` text COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `sede_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `id` int(10) UNSIGNED NOT NULL,
  `asunto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completado` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activo',
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `iniciales` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `permisos` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cedula`, `nombres`, `apellidos`, `iniciales`, `telefono`, `foto`, `email`, `permisos`, `password`, `area_id`, `cargo_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'public/a4.jpg', 'victormalsx@gmail.com', '[{\"crear_clientes\":\"true\",\"ver_clientes\":\"true\",\"crear_docs\":\"true\",\"asignar_metas\":\"true\",\"ver_progresos\":\"true\",\"ver_comisiones\":\"true\",\"resumen_comisiones\":\"true\",\"clientes_cerrados\":\"true\",\"asignar_facturas\":\"true\",\"control_pagos\":\"true\",\"agendar_servicios\":\"true\",\"horarios_tecnicos\":\"true\",\"listado_servicios\":\"true\",\"recepcion_docs\":\"true\",\"inventario_docs\":\"true\",\"reporte_docs\":\"true\",\"crear_novedades\":\"true\",\"crear_tecnicos\":\"true\",\"crear_usuarios\":\"true\",\"reporte_ganancias\":\"true\",\"gestion_productos\":\"true\",\"gastos\":\"true\"}]', '$2y$10$ApzshZDpFrvQzf0ycAJDT.yMarzR5iXY4oMUyxZHsxl1lqDMZIWOu', 1, 1, 'gsaI2U8aTCwB3hADySdXzUc1NIumlqk9MxJhbHiPowhVYjBub4Y0ojNmrDVm', NULL, '2019-05-30 13:47:36'),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'a6.jpg', 'yurani@gmail.com', '', '$2y$10$C279jhl0s46wYyr1uuu00OOouY1B4TYiQnbXXBK48l.yhUD7mN6ue', 2, 2, 'mWJBsslloCxdenyDG2LgzFBD6UZgKRS5cIr3hm1HdXKVf8ABXjy7gcvCGOn9', NULL, NULL),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'a1.jpg', 'andres@gmail.com', '', '$2y$10$Du7JITRNBCrqvj/2loo8eORFsGbOXcUl/sW5tKKpGnZBS4y4Anz/m', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'a7.jpg', 'jhon@gmail.com', '', '$2y$10$SbxWHsjMEtVC0K2ERjxCIe4K2zzMvSl/CkvktfZSEI4oyCN7KoXTG', 3, 3, '2GpyNjqGR3iOdjdWIbJfXkxBfdcsMrQyaL3T9Ru0wVAymxZiMaeGXQDB6iUa', NULL, NULL),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'a9.jpg', 'jhonny@gmail.com', '', '$2y$10$UIDt0beHPXpkJ/pcuuuZtOoKRYoBhmqnhQgVzx2Laa8NjnbMvbSgG', 3, 4, NULL, NULL, NULL),
(6, 951789123, 'Jhon', 'Doe', 'JD', '3177777750', 'a10.jpg', 'jhon.doe@gmail.com', '', '$2y$10$RH/f89iBHKiMNcc6p2h8qupNtOconBR1UAE88LeRzqQygFmjHgfCC', 4, 5, 'K3tW4AkCUHQQ4UzqwOs4rNpa6CUpRDgijuLRcLVnGdGoQud9znSOGlDVbH90', NULL, NULL),
(7, 1062545984, 'Diego', 'Leguizamo', 'DLL', '321654987', 'a11.jpg', 'diego@gmail.com', '', '$2y$10$Y2xgM9E4rPRgeaOzkxtKG.8d9snUTey4.w2tuG0luPzRkxNNs9h0q', 6, 7, NULL, NULL, NULL),
(8, 687459687, 'Sarah', 'Jhonson', 'SCJ', '3177777750', 'a12.jpg', 'sarah@gmail.com', '', '$2y$10$twKtAG0AtB5Y3RvelIJTAeUVOtQMXIbj87s/1YfeKiWh9rJv37cn2', 5, 6, 'XzyB4OweXavIfsvNyb1YaKmZcRbftxvIlZsq5r8Qam7FHlUej39zmMzJtvrj', NULL, NULL),
(9, 99999999, 'Fernando', 'Serna', 'FS', '3177777750', 'default-user.jpg', 'fernandoserna@sanicontrol.com', '', '$2y$10$7L.tN71DkEjAY7bhTzcC1uIrT3ACdKBPk28dGkXphrGpecDNsKxN.', 1, 1, NULL, NULL, NULL),
(10, 88888888, 'Cristian', 'León', 'CL', '3177777750', 'default-user.jpg', 'cristianleon@sanicontrol.com', '', '$2y$10$4cTNY0zGtG6wfzYApi/f/.yVJLVfW.4zi5a9WQuZWJ/e2mqtWTOFK', 1, 1, NULL, NULL, NULL),
(11, 111111111, 'Programador', 'Sanicontrol', 'PS', '3177777750', 'default-user.jpg', 'programacion@sanicontrol.com', '', '$2y$10$w8uvk.q/.5eaAZ1yW2YehOJVLqRzWRDeMoPEjEHDtLrb/ReXhtOpy', 3, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `valor_generals`
--

CREATE TABLE `valor_generals` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `valor_generals`
--

INSERT INTO `valor_generals` (`id`, `descripcion`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'porcentaje_recompras', '3', NULL, NULL),
(2, 'porcentaje_clientes_nuevos', '5', NULL, NULL),
(3, 'porcentaje_clientes_contrato', '8', NULL, NULL),
(4, 'minuto_hombre', '250', '2019-05-22 05:00:00', '2019-05-22 05:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_nombre_unique` (`nombre`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargos_nombre_unique` (`nombre`);

--
-- Indexes for table `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comisions`
--
ALTER TABLE `comisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comisions_codigo_unique` (`codigo`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facturas_numero_factura_unique` (`numero_factura`);

--
-- Indexes for table `inspeccions`
--
ALTER TABLE `inspeccions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `novedads`
--
ALTER TABLE `novedads`
  ADD UNIQUE KEY `novedads_id_unique` (`id`);

--
-- Indexes for table `novedad_temporals`
--
ALTER TABLE `novedad_temporals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden_servicios`
--
ALTER TABLE `orden_servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orden_servicios_codigo_unique` (`codigo`);

--
-- Indexes for table `orden_servicio_producto`
--
ALTER TABLE `orden_servicio_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden_servicio_tecnico`
--
ALTER TABLE `orden_servicio_tecnico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto_ruta`
--
ALTER TABLE `producto_ruta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rutas_codigo_unique` (`codigo`);

--
-- Indexes for table `ruta_tecnico`
--
ALTER TABLE `ruta_tecnico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicio_tipo_servicio`
--
ALTER TABLE `servicio_tipo_servicio`
  ADD PRIMARY KEY (`id_servicio_tipo`);

--
-- Indexes for table `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `valor_generals`
--
ALTER TABLE `valor_generals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comisions`
--
ALTER TABLE `comisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inspeccions`
--
ALTER TABLE `inspeccions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;

--
-- AUTO_INCREMENT for table `novedad_temporals`
--
ALTER TABLE `novedad_temporals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orden_servicios`
--
ALTER TABLE `orden_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orden_servicio_producto`
--
ALTER TABLE `orden_servicio_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orden_servicio_tecnico`
--
ALTER TABLE `orden_servicio_tecnico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `producto_ruta`
--
ALTER TABLE `producto_ruta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruta_tecnico`
--
ALTER TABLE `ruta_tecnico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicio_tipo_servicio`
--
ALTER TABLE `servicio_tipo_servicio`
  MODIFY `id_servicio_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `valor_generals`
--
ALTER TABLE `valor_generals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
