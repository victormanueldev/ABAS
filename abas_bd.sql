-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2018 at 09:23 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

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
(2, 'contabilidad', 'Área Contabilidad', NULL, NULL),
(3, 'programacion', 'Área Programación', NULL, NULL);

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
(4, 'directorcom', 'Director Comercial', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificados`
--

CREATE TABLE `certificados` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_tratada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tratamientos` json NOT NULL,
  `productos` json NOT NULL,
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
  `nombre_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_actual` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon_cambio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_cliente`, `nit_cedula`, `nombre_cliente`, `razon_social`, `sector_economico`, `municipio`, `direccion`, `barrio`, `zona`, `estado_negociacion`, `nombre_contacto`, `contacto_tecnico`, `cargo_contacto_tecnico`, `cargo_contacto`, `email`, `extension`, `celular`, `empresa_actual`, `razon_cambio`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Persona Juridica', '135246849-7', 'Fruver los Paisas', 'Fruver Colombia S.A.S.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Jenny Molina', 'indefinido', 'indefinido', 'Gerente General', 'jenny@gmail.com', 'indefinido', '3154874545', 'Plagas S.A.S.', 'Mal servicio', 1, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(2, 'Persona Natural', '32135686', 'Luis Felipe Cortéz', NULL, 'indefinido', 'Santiago de Cali', 'CRA 4 # 12A - 399', 'Caldas', 'Suroccidente', 'Prospecto', 'Luis Felipe Cortéz', 'indefinido', 'indefinido', 'Independiente', 'luis@gmail.com', 'indefinido', '311565468', 'indefinido', 'indefinido', 3, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(3, 'Persona Natural', '987656546', 'Lina Maria Chavez', NULL, 'indefinido', 'indefinido', 'CRA 4A # 45A - 34', 'La Campiña', 'Norte', 'Prospecto', 'Lina Maria Chavez', 'indefinido', 'indefinido', 'Independiente', 'lian@gmail.com', 'indefinido', '318546813', 'indefinido', 'indefinido', 3, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(4, 'Persona Juridica', '654984651-7', 'Supermercado Super Inter', 'Exito S.A.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Jenny Molina', 'indefinido', 'indefinido', 'Gerente General', 'jenny@gmail.com', 'indefinido', '3154874545', 'Plagas S.A.S.', 'Mal servicio', 1, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(5, 'Persona Juridica', '00161654758-7', 'La California', 'California S.A.', 'Comercial', 'Santiago de Cali', 'CRA 32 # 10 - 39', 'Departamental', 'Sur', 'Prospecto', 'Pepito Perez', 'Andres Lopez', 'Recursos Humanos', 'Gerente General', 'pepe@gmail.com', 'indefinido', '3106546567', 'indefinido', 'ninguna', 5, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(6, 'Persona Natural', '65465465', 'Felipe López', NULL, 'indefinido', 'indefinido', 'AV 6 # 60AN - 34', 'Santa Mónica', 'Norte', 'Prospecto', 'Felipe Lopez', 'indefinido', 'indefinido', 'Independiente', 'felipe@gmail.com', 'indefinido', '3195191511', 'indefinido', 'indefinido', 5, '2018-05-07 13:50:00', '2018-05-08 15:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inicial',
  `valor` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `codigo`, `estado`, `valor`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'CT-VMA-1', 'Final', 756000, 1, '2018-11-29 20:21:00', '2018-11-30 01:21:00'),
(2, 'CT-VMA-2', 'Final', 350000, 2, '2018-10-29 20:21:00', '2018-10-30 01:21:00'),
(3, 'CT-VMA-4', 'Final', 875000, 4, '2018-09-29 20:21:00', '2018-09-30 01:21:00'),
(4, 'CT-VMA-3', 'Final', 450000, 3, '2018-11-29 20:21:00', '2018-11-30 01:21:00'),
(5, 'CT-JVP-5', 'Final', 640000, 5, '2018-11-29 20:21:00', '2018-11-30 01:21:00'),
(6, 'CT-JVP-6', 'Final', 710000, 6, '2018-11-29 20:21:00', '2018-11-30 01:21:00');

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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `fecha_inicio`, `fecha_fin`, `dia_completo`, `color`, `asunto`, `tipo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2018-04-15 14:00:00', '2018-04-15 15:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 03219689', 'Llamada', 1, NULL, NULL),
(2, '2018-04-14 14:00:00', '2018-04-14 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 03219689', 'Visita', 1, NULL, NULL),
(3, '2018-04-03 14:00:00', '2018-04-03 17:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 9865465', 'Llamada', 2, NULL, NULL),
(4, '2018-04-14 14:00:00', '2018-04-18 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 96546ASD', 'Visita', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_factura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id`, `numero_factura`, `valor`, `servicio_id`, `created_at`, `updated_at`) VALUES
(1, '651651658', 150000, 1, '2018-12-05 00:23:08', '2018-12-05 00:23:08'),
(2, '32165468', 350000, 99, '2018-12-05 00:23:17', '2018-12-05 00:23:17'),
(3, '32132435', 125000, 14, '2018-12-05 00:23:26', '2018-12-05 00:23:26'),
(4, '32133452', 320000, 33, '2018-12-05 00:23:35', '2018-12-05 00:23:35'),
(5, '77563576', 420000, 38, '2018-12-05 00:23:46', '2018-12-05 00:23:46'),
(6, '951951', 520000, 80, '2018-12-05 00:24:10', '2018-12-05 00:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_clientes_nuevos` int(11) NOT NULL,
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

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `meta_clientes_nuevos`, `meta_equipo_clientes_nuevos`, `meta_recompras`, `meta_equipo_recompras`, `mes_vigencia`, `meta_anual_inpector`, `meta_anual_equipo`, `anio_vigencia`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2500000, NULL, 3000000, NULL, 11, NULL, NULL, 2018, 1, '2018-12-05 00:40:53', '2018-12-05 00:40:53'),
(2, 2300000, NULL, 2500000, NULL, 11, NULL, NULL, 2018, 3, '2018-12-05 00:41:05', '2018-12-05 00:41:05'),
(3, 2300000, 12000000, 3500000, 15000000, 11, 45000000, 98000000, 2018, 5, '2018-12-05 00:55:14', '2018-12-05 00:55:14');

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
(228, '2014_10_12_000000_create_users_table', 1),
(229, '2014_10_12_100000_create_password_resets_table', 1),
(230, '2018_04_12_022651_create_areas_table', 1),
(231, '2018_04_12_023001_create_cargos_table', 1),
(232, '2018_04_12_190550_create_clientes_table', 1),
(233, '2018_04_12_193958_create_sedes_table', 1),
(234, '2018_04_12_195156_create_tareas_table', 1),
(235, '2018_04_12_235243_create_novedads_table', 1),
(236, '2018_04_13_011115_create_area_novedad_table', 1),
(237, '2018_04_15_175902_create_eventos_table', 1),
(238, '2018_05_10_203827_create_notifications_table', 1),
(239, '2018_05_14_205719_create_solicitudes_table', 1),
(240, '2018_05_30_215131_create_telefonos_table', 1),
(241, '2018_06_22_111550_create_servicios_table', 1),
(242, '2018_06_22_115017_create_tecnicos_table', 1),
(243, '2018_07_27_215505_create_tipo_servicios_table', 1),
(244, '2018_07_27_220255_create_servicio_tecnico', 1),
(245, '2018_08_01_220413_create_servicio_tipo_servicio_table', 1),
(246, '2018_11_08_185829_create_certificados_table', 1),
(247, '2018_11_11_100214_create_rutas_table', 1),
(248, '2018_11_27_214335_create_cotizaciones_table', 1),
(249, '2018_11_29_200551_create_metas_table', 1),
(250, '2018_11_30_195752_create_facturas_table', 1);

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
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `comentario` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `novedads`
--

INSERT INTO `novedads` (`id`, `descripcion`, `estado`, `user2_id`, `user_id`, `area_id`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 04456 presenta plaga de ratas en la sede principal', 'publicada', NULL, 1, 3, 'Novedad resuleta con éxito', '2018-04-18 21:58:00', NULL),
(2, 'La factura 00565468 no ha sido pagada', 'publicada', NULL, 2, 2, NULL, '2018-04-17 20:58:00', NULL),
(3, 'Cliente No. 20316 no ha pagado el servicio', 'publicada', NULL, 1, 1, NULL, '2018-04-19 20:21:00', NULL);

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
-- Table structure for table `rutas`
--

CREATE TABLE `rutas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` json NOT NULL,
  `solicitud_id` int(11) NOT NULL,
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
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zona_ruta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_contacto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_contacto` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `celular_contacto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `direccion`, `ciudad`, `barrio`, `zona_ruta`, `nombre_contacto`, `telefono_contacto`, `celular_contacto`, `email`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'Fruver Santa Librada', 'CRA 46 #54 - 44', 'Cali', 'Santa Librada', 'Centro', 'Ricardo', '126456', '31321898', 'ricardo@gmail.com', 1, NULL, NULL),
(2, 'Fruver Chipichape', 'CRA 6 #51 - 44', 'Cali', 'Chipichape', 'Norte', 'Francisco', '126456', '31321898', 'francisco@gmail.com', 1, NULL, NULL),
(3, 'Super Inter La  Flora', 'CRA 5 #65 - 44', 'Cali', 'La Flora', 'Norte', 'juan', '126456', '31321898', 'juan@gmail.com', 4, NULL, NULL),
(4, 'Super Inter San Fernando', 'CRA 46 #54 - 44', 'Cali', 'San Fernando', 'Centro', 'Jorge', '126456', '31321898', 'Jorge@gmail.com', 4, NULL, NULL),
(5, 'California La Rivera', 'CLL 70 #35 - 44', 'Cali', 'La Rivera', 'Norte', 'Alfredo', '9516546', '31321800', 'alfredo@gmail.com', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `frecuencia` smallint(5) UNSIGNED DEFAULT NULL,
  `serie` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `duracion` mediumint(8) UNSIGNED DEFAULT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `solicitud_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `frecuencia`, `serie`, `tipo`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `duracion`, `confirmado`, `color`, `solicitud_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'S1', 'Normal', '2018-12-01', '12:10:00', '2018-12-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, '2018-12-05 00:18:08', '2018-12-05 00:18:08'),
(2, 1, 'S1', 'Normal', '2019-01-01', '12:10:00', '2019-01-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(3, 1, 'S1', 'Normal', '2019-02-01', '12:10:00', '2019-02-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(4, 1, 'S1', 'Normal', '2019-03-01', '12:10:00', '2019-03-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(5, 1, 'S1', 'Normal', '2019-04-01', '12:10:00', '2019-04-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(6, 1, 'S1', 'Normal', '2019-05-01', '12:10:00', '2019-05-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(7, 1, 'S1', 'Normal', '2019-06-01', '12:10:00', '2019-06-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(8, 1, 'S1', 'Normal', '2019-07-01', '12:10:00', '2019-07-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(9, 1, 'S1', 'Normal', '2019-08-01', '12:10:00', '2019-08-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(10, 1, 'S1', 'Normal', '2019-09-01', '12:10:00', '2019-09-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(11, 1, 'S1', 'Normal', '2019-10-01', '12:10:00', '2019-10-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(12, 1, 'S1', 'Normal', '2019-11-01', '12:10:00', '2019-11-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(13, 1, 'S1', 'Normal', '2019-12-01', '12:10:00', '2019-12-01', '15:12:00', 182, 0, 'rgb(69,130,29)', 1, NULL, NULL),
(14, 3, 'S14', 'Normal', '2018-12-03', '14:00:00', '2018-12-03', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, '2018-12-05 00:18:37', '2018-12-05 00:18:37'),
(15, 3, 'S14', 'Normal', '2018-12-24', '14:00:00', '2018-12-24', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(16, 3, 'S14', 'Normal', '2019-01-14', '14:00:00', '2019-01-14', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(17, 3, 'S14', 'Normal', '2019-02-04', '14:00:00', '2019-02-04', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(18, 3, 'S14', 'Normal', '2019-02-25', '14:00:00', '2019-02-25', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(19, 3, 'S14', 'Normal', '2019-03-18', '14:00:00', '2019-03-18', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(20, 3, 'S14', 'Normal', '2019-04-08', '14:00:00', '2019-04-08', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(21, 3, 'S14', 'Normal', '2019-04-29', '14:00:00', '2019-04-29', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(22, 3, 'S14', 'Normal', '2019-05-20', '14:00:00', '2019-05-20', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(23, 3, 'S14', 'Normal', '2019-06-10', '14:00:00', '2019-06-10', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(24, 3, 'S14', 'Normal', '2019-07-01', '14:00:00', '2019-07-01', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(25, 3, 'S14', 'Normal', '2019-07-22', '14:00:00', '2019-07-22', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(26, 3, 'S14', 'Normal', '2019-08-12', '14:00:00', '2019-08-12', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(27, 3, 'S14', 'Normal', '2019-09-02', '14:00:00', '2019-09-02', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(28, 3, 'S14', 'Normal', '2019-09-23', '14:00:00', '2019-09-23', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(29, 3, 'S14', 'Normal', '2019-10-14', '14:00:00', '2019-10-14', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(30, 3, 'S14', 'Normal', '2019-11-04', '14:00:00', '2019-11-04', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(31, 3, 'S14', 'Normal', '2019-11-25', '14:00:00', '2019-11-25', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(32, 3, 'S14', 'Normal', '2019-12-16', '14:00:00', '2019-12-16', '16:00:00', 120, 0, 'rgb(219,165,37)', 2, NULL, NULL),
(33, 3, 'S33', 'Normal', '2018-12-05', '06:00:00', '2018-12-05', '08:02:00', 122, 0, 'rgb(255,130,0)', 5, '2018-12-05 00:19:06', '2018-12-05 00:19:06'),
(34, 3, 'S33', 'Normal', '2019-03-06', '06:00:00', '2019-03-06', '08:02:00', 122, 0, 'rgb(255,130,0)', 5, NULL, NULL),
(35, 3, 'S33', 'Normal', '2019-06-05', '06:00:00', '2019-06-05', '08:02:00', 122, 0, 'rgb(255,130,0)', 5, NULL, NULL),
(36, 3, 'S33', 'Normal', '2019-09-04', '06:00:00', '2019-09-04', '08:02:00', 122, 0, 'rgb(255,130,0)', 5, NULL, NULL),
(37, 3, 'S33', 'Normal', '2019-12-04', '06:00:00', '2019-12-04', '08:02:00', 122, 0, 'rgb(255,130,0)', 5, NULL, NULL),
(38, 9, 'S38', 'Normal', '2018-12-07', '15:00:00', '2018-12-07', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, '2018-12-05 00:19:36', '2018-12-05 00:19:36'),
(39, 9, 'S38', 'Normal', '2018-12-17', '15:00:00', '2018-12-17', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(40, 9, 'S38', 'Normal', '2018-12-26', '15:00:00', '2018-12-26', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(41, 9, 'S38', 'Normal', '2019-01-04', '15:00:00', '2019-01-04', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(42, 9, 'S38', 'Normal', '2019-01-14', '15:00:00', '2019-01-14', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(43, 9, 'S38', 'Normal', '2019-01-23', '15:00:00', '2019-01-23', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(44, 9, 'S38', 'Normal', '2019-02-01', '15:00:00', '2019-02-01', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(45, 9, 'S38', 'Normal', '2019-02-11', '15:00:00', '2019-02-11', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(46, 9, 'S38', 'Normal', '2019-02-20', '15:00:00', '2019-02-20', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(47, 9, 'S38', 'Normal', '2019-03-01', '15:00:00', '2019-03-01', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(48, 9, 'S38', 'Normal', '2019-03-11', '15:00:00', '2019-03-11', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(49, 9, 'S38', 'Normal', '2019-03-20', '15:00:00', '2019-03-20', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(50, 9, 'S38', 'Normal', '2019-03-29', '15:00:00', '2019-03-29', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(51, 9, 'S38', 'Normal', '2019-04-08', '15:00:00', '2019-04-08', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(52, 9, 'S38', 'Normal', '2019-04-17', '15:00:00', '2019-04-17', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(53, 9, 'S38', 'Normal', '2019-04-26', '15:00:00', '2019-04-26', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(54, 9, 'S38', 'Normal', '2019-05-06', '15:00:00', '2019-05-06', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(55, 9, 'S38', 'Normal', '2019-05-15', '15:00:00', '2019-05-15', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(56, 9, 'S38', 'Normal', '2019-05-24', '15:00:00', '2019-05-24', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(57, 9, 'S38', 'Normal', '2019-06-03', '15:00:00', '2019-06-03', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(58, 9, 'S38', 'Normal', '2019-06-12', '15:00:00', '2019-06-12', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(59, 9, 'S38', 'Normal', '2019-06-21', '15:00:00', '2019-06-21', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(60, 9, 'S38', 'Normal', '2019-07-01', '15:00:00', '2019-07-01', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(61, 9, 'S38', 'Normal', '2019-07-10', '15:00:00', '2019-07-10', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(62, 9, 'S38', 'Normal', '2019-07-19', '15:00:00', '2019-07-19', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(63, 9, 'S38', 'Normal', '2019-07-29', '15:00:00', '2019-07-29', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(64, 9, 'S38', 'Normal', '2019-08-07', '15:00:00', '2019-08-07', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(65, 9, 'S38', 'Normal', '2019-08-16', '15:00:00', '2019-08-16', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(66, 9, 'S38', 'Normal', '2019-08-26', '15:00:00', '2019-08-26', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(67, 9, 'S38', 'Normal', '2019-09-04', '15:00:00', '2019-09-04', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(68, 9, 'S38', 'Normal', '2019-09-13', '15:00:00', '2019-09-13', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(69, 9, 'S38', 'Normal', '2019-09-23', '15:00:00', '2019-09-23', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(70, 9, 'S38', 'Normal', '2019-10-02', '15:00:00', '2019-10-02', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(71, 9, 'S38', 'Normal', '2019-10-11', '15:00:00', '2019-10-11', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(72, 9, 'S38', 'Normal', '2019-10-21', '15:00:00', '2019-10-21', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(73, 9, 'S38', 'Normal', '2019-10-30', '15:00:00', '2019-10-30', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(74, 9, 'S38', 'Normal', '2019-11-08', '15:00:00', '2019-11-08', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(75, 9, 'S38', 'Normal', '2019-11-18', '15:00:00', '2019-11-18', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(76, 9, 'S38', 'Normal', '2019-11-27', '15:00:00', '2019-11-27', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(77, 9, 'S38', 'Normal', '2019-12-06', '15:00:00', '2019-12-06', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(78, 9, 'S38', 'Normal', '2019-12-16', '15:00:00', '2019-12-16', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(79, 9, 'S38', 'Normal', '2019-12-25', '15:00:00', '2019-12-25', '17:00:00', 120, 0, 'rgb(2,112,192)', 3, NULL, NULL),
(80, 3, 'S80', 'Normal', '2018-12-12', '03:00:00', '2018-12-12', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, '2018-12-05 00:21:01', '2018-12-05 00:21:01'),
(81, 3, 'S80', 'Normal', '2019-01-02', '03:00:00', '2019-01-02', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(82, 3, 'S80', 'Normal', '2019-01-23', '03:00:00', '2019-01-23', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(83, 3, 'S80', 'Normal', '2019-02-13', '03:00:00', '2019-02-13', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(84, 3, 'S80', 'Normal', '2019-03-06', '03:00:00', '2019-03-06', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(85, 3, 'S80', 'Normal', '2019-03-27', '03:00:00', '2019-03-27', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(86, 3, 'S80', 'Normal', '2019-04-17', '03:00:00', '2019-04-17', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(87, 3, 'S80', 'Normal', '2019-05-08', '03:00:00', '2019-05-08', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(88, 3, 'S80', 'Normal', '2019-05-29', '03:00:00', '2019-05-29', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(89, 3, 'S80', 'Normal', '2019-06-19', '03:00:00', '2019-06-19', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(90, 3, 'S80', 'Normal', '2019-07-10', '03:00:00', '2019-07-10', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(91, 3, 'S80', 'Normal', '2019-07-31', '03:00:00', '2019-07-31', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(92, 3, 'S80', 'Normal', '2019-08-21', '03:00:00', '2019-08-21', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(93, 3, 'S80', 'Normal', '2019-09-11', '03:00:00', '2019-09-11', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(94, 3, 'S80', 'Normal', '2019-10-02', '03:00:00', '2019-10-02', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(95, 3, 'S80', 'Normal', '2019-10-23', '03:00:00', '2019-10-23', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(96, 3, 'S80', 'Normal', '2019-11-13', '03:00:00', '2019-11-13', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(97, 3, 'S80', 'Normal', '2019-12-04', '03:00:00', '2019-12-04', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(98, 3, 'S80', 'Normal', '2019-12-25', '03:00:00', '2019-12-25', '06:00:00', 180, 0, 'rgb(92,174,39)', 6, NULL, NULL),
(99, 2, 'S99', 'Normal', '2018-11-27', '12:00:00', '2018-11-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, '2018-12-05 00:22:56', '2018-12-05 00:22:56'),
(100, 2, 'S99', 'Normal', '2019-01-27', '12:00:00', '2019-01-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, NULL, NULL),
(101, 2, 'S99', 'Normal', '2019-03-27', '12:00:00', '2019-03-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, NULL, NULL),
(102, 2, 'S99', 'Normal', '2019-05-27', '12:00:00', '2019-05-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, NULL, NULL),
(103, 2, 'S99', 'Normal', '2019-07-27', '12:00:00', '2019-07-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, NULL, NULL),
(104, 2, 'S99', 'Normal', '2019-09-27', '12:00:00', '2019-09-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, NULL, NULL),
(105, 2, 'S99', 'Normal', '2019-11-27', '12:00:00', '2019-11-27', '15:00:00', 180, 0, 'rgb(69,130,29)', 4, NULL, NULL);

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

--
-- Dumping data for table `servicio_tecnico`
--

INSERT INTO `servicio_tecnico` (`servicio_id`, `tecnico_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, NULL, NULL),
(3, 1, NULL, NULL),
(4, 1, NULL, NULL),
(5, 1, NULL, NULL),
(6, 1, NULL, NULL),
(7, 1, NULL, NULL),
(8, 1, NULL, NULL),
(9, 1, NULL, NULL),
(10, 1, NULL, NULL),
(11, 1, NULL, NULL),
(12, 1, NULL, NULL),
(13, 1, NULL, NULL),
(14, 2, NULL, NULL),
(15, 2, NULL, NULL),
(16, 2, NULL, NULL),
(17, 2, NULL, NULL),
(18, 2, NULL, NULL),
(19, 2, NULL, NULL),
(20, 2, NULL, NULL),
(21, 2, NULL, NULL),
(22, 2, NULL, NULL),
(23, 2, NULL, NULL),
(24, 2, NULL, NULL),
(25, 2, NULL, NULL),
(26, 2, NULL, NULL),
(27, 2, NULL, NULL),
(28, 2, NULL, NULL),
(29, 2, NULL, NULL),
(30, 2, NULL, NULL),
(31, 2, NULL, NULL),
(32, 2, NULL, NULL),
(33, 4, NULL, NULL),
(34, 4, NULL, NULL),
(35, 4, NULL, NULL),
(36, 4, NULL, NULL),
(37, 4, NULL, NULL),
(38, 5, NULL, NULL),
(39, 5, NULL, NULL),
(40, 5, NULL, NULL),
(41, 5, NULL, NULL),
(42, 5, NULL, NULL),
(43, 5, NULL, NULL),
(44, 5, NULL, NULL),
(45, 5, NULL, NULL),
(46, 5, NULL, NULL),
(47, 5, NULL, NULL),
(48, 5, NULL, NULL),
(49, 5, NULL, NULL),
(50, 5, NULL, NULL),
(51, 5, NULL, NULL),
(52, 5, NULL, NULL),
(53, 5, NULL, NULL),
(54, 5, NULL, NULL),
(55, 5, NULL, NULL),
(56, 5, NULL, NULL),
(57, 5, NULL, NULL),
(58, 5, NULL, NULL),
(59, 5, NULL, NULL),
(60, 5, NULL, NULL),
(61, 5, NULL, NULL),
(62, 5, NULL, NULL),
(63, 5, NULL, NULL),
(64, 5, NULL, NULL),
(65, 5, NULL, NULL),
(66, 5, NULL, NULL),
(67, 5, NULL, NULL),
(68, 5, NULL, NULL),
(69, 5, NULL, NULL),
(70, 5, NULL, NULL),
(71, 5, NULL, NULL),
(72, 5, NULL, NULL),
(73, 5, NULL, NULL),
(74, 5, NULL, NULL),
(75, 5, NULL, NULL),
(76, 5, NULL, NULL),
(77, 5, NULL, NULL),
(78, 5, NULL, NULL),
(79, 5, NULL, NULL),
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
(98, 3, NULL, NULL),
(99, 1, NULL, NULL),
(100, 1, NULL, NULL),
(101, 1, NULL, NULL),
(102, 1, NULL, NULL),
(103, 1, NULL, NULL),
(104, 1, NULL, NULL),
(105, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicio_tipo_servicio`
--

CREATE TABLE `servicio_tipo_servicio` (
  `servicio_id` int(11) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicio_tipo_servicio`
--

INSERT INTO `servicio_tipo_servicio` (`servicio_id`, `tipo_servicio_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 22),
(34, 22),
(35, 22),
(36, 22),
(37, 22),
(38, 20),
(39, 20),
(40, 20),
(41, 20),
(42, 20),
(43, 20),
(44, 20),
(45, 20),
(46, 20),
(47, 20),
(48, 20),
(49, 20),
(50, 20),
(51, 20),
(52, 20),
(53, 20),
(54, 20),
(55, 20),
(56, 20),
(57, 20),
(58, 20),
(59, 20),
(60, 20),
(61, 20),
(62, 20),
(63, 20),
(64, 20),
(65, 20),
(66, 20),
(67, 20),
(68, 20),
(69, 20),
(70, 20),
(71, 20),
(72, 20),
(73, 20),
(74, 20),
(75, 20),
(76, 20),
(77, 20),
(78, 20),
(79, 20),
(80, 26),
(81, 26),
(82, 26),
(83, 26),
(84, 26),
(85, 26),
(86, 26),
(87, 26),
(88, 26),
(89, 26),
(90, 26),
(91, 26),
(92, 26),
(93, 26),
(94, 26),
(95, 26),
(96, 26),
(97, 26),
(98, 26),
(99, 3),
(99, 5),
(100, 3),
(100, 5),
(101, 3),
(101, 5),
(102, 3),
(102, 5),
(103, 3),
(103, 5),
(104, 3),
(104, 5),
(105, 3),
(105, 5);

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `frecuencia` tinyint(3) UNSIGNED NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `sede_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `codigo`, `fecha`, `frecuencia`, `observaciones`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'FS001', '2018-04-19', 7, 'Observacion FS01', 1, 1, '2018-04-19 20:21:00', '2018-04-21 01:21:00'),
(2, 'FS003', '2018-04-19', 15, 'Observacion FS03', 2, 0, '2018-05-19 20:21:00', '2018-05-21 01:21:00'),
(3, 'FS004', '2018-04-19', 30, 'Observacion FS04', 3, 0, '2018-02-19 20:21:00', '2018-02-21 01:21:00'),
(4, 'FS005', '2018-04-19', 90, 'Observacion FS05', 4, 3, '2018-02-19 20:21:00', '2018-02-21 01:21:00'),
(5, 'FS006', '2018-04-19', 30, 'Observacion FS06', 5, 5, '2018-02-19 20:21:00', '2018-02-21 01:21:00'),
(6, 'FS007', '2018-04-19', 30, 'Observacion FS06', 6, 0, '2018-02-19 20:21:00', '2018-02-21 01:21:00');

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

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id`, `asunto`, `completado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Llamar al cliente #0321498', 0, 1, NULL, NULL),
(2, 'Pagar recibo de Energia', 1, 1, NULL, NULL),
(3, 'LLamar a Jhon', 0, 1, NULL, NULL),
(4, 'Pasar lso clientes a ABAS', 0, 2, NULL, NULL),
(5, 'Poner en el calendario algo', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nombre`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Antonio Pérez', 'rgb(69,130,29)', NULL, NULL),
(2, 'Luis Alejandro Rojas', 'rgb(219,165,37)', NULL, NULL),
(3, 'Fernando López', 'rgb(92,174,39)', NULL, NULL),
(4, 'Andrés Stiven Bejarano', 'rgb(255,130,0)', NULL, NULL),
(5, 'Jhon Alex Barrios', 'rgb(2,112,192)', NULL, NULL);

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

--
-- Dumping data for table `tipo_servicios`
--

INSERT INTO `tipo_servicios` (`id`, `nombre`) VALUES
(1, 'CONTROL DE PLAGAS BASICO SIN ROEDORES'),
(2, 'CONTROL DE PLAGAS BASICO Y ROEDORES'),
(3, 'CONTROL DE PLAGAS BASICO EN OFICINA'),
(4, 'CONTROL DE PLAGAS BASICO VEHICULOS'),
(5, 'CONTROL DE PLAGAS BASICO CONTAINER'),
(6, 'CONTROL SOLO ROEDORES'),
(7, 'CONTROL INSECTOS RASTREROS'),
(8, 'CONTROL INSECTOS VOLADORES'),
(9, 'CONTROL CHINCHES'),
(10, 'CONTROL GARRAPATAS'),
(11, 'CONTROL PULGAS'),
(12, 'CONTROL TERMITAS'),
(13, 'CONTROL ABEJAS'),
(14, 'CONTROL AVISPAS'),
(15, 'DESINFECCION'),
(16, 'ESPOLVOREO ELECTRICO'),
(17, 'NEBULIZACION'),
(18, 'TERMONEBULIZACION'),
(19, 'GASIFICACION'),
(20, 'RETIRO DE RESIDUOS / DESCARPADO'),
(21, 'INSTALACION ESTACIONES ROEDOR'),
(22, 'CONTROL DE PLAGAS EN ZONAS COMUNES'),
(23, 'CONTROL EN CASAS Y/O APARTAMENTOS'),
(24, 'CONTROL EN CAJAS DE ALCANTARILLA'),
(25, 'RUTA LAMPARAS CONTROL INSECTOS VOLADORES'),
(26, 'RUTA ESTACIONES CONTROL ROEDORES'),
(27, 'CONTROL CARACOLES'),
(28, 'CONTROL DE PLAGAS BASICO RESIDENCIAL');

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
  `telefono` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `cedula`, `nombres`, `apellidos`, `iniciales`, `telefono`, `foto`, `email`, `password`, `area_id`, `cargo_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'default-user.jpg', 'victormalsx@gmail.com', '$2y$10$tYQZut/CS.cU2McTcQtFp.DwyZCss5z9SCaH7Y7dA4AaoERIZrNZu', 1, 1, 'qA9rlFg5yOz6LceLs6xY4lnCXI52r9eJZzFutauhrvUqxkyg9xtbFxMloAO2', NULL, NULL),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'a6.jpg', 'yurani@gmail.com', '$2y$10$IE4XuUgEdso2DE74rjwcDeOnIXeueCArEkHTGpk0T5LQPD12RrauK', 2, 2, '6ENYZOAThUjOg9OefHBmFBrVT01kdEyT5da5Bu85nh1lihY4TinDWv8LLL69', NULL, NULL),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'a1.jpg', 'andres@gmail.com', '$2y$10$t6iGoYbLg7kcEA8DXmx/dOkRuR8/FHaqc.1cKR1OaMQcyH03CkIiG', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'a7.jpg', 'jhon@gmail.com', '$2y$10$V76V51lANhcSqswCHeVUGe.oNXa9zSkA4vet0gUw2vIX1n0TLJP1S', 3, 3, NULL, NULL, NULL),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'a9.jpg', 'jhonny@gmail.com', '$2y$10$1c52F1U4pv8o5zZ3K30fNeEABd52hdQV8pVU/mgtmNJq3TtgWO1fy', 1, 4, NULL, NULL, NULL);

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
-- Indexes for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rutas_codigo_unique` (`codigo`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
