-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2019 at 10:18 AM
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
  `nombre_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto_tecnico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_contacto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_actual` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon_cambio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_rut` tinyint(1) NOT NULL DEFAULT '0',
  `doc_identidad` tinyint(1) NOT NULL DEFAULT '0',
  `doc_camara_comercio` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_cliente`, `nit_cedula`, `nombre_cliente`, `razon_social`, `sector_economico`, `municipio`, `direccion`, `barrio`, `zona`, `estado_negociacion`, `estado_facturacion`, `estado_agendamiento`, `estado_registro`, `nombre_contacto`, `contacto_tecnico`, `cargo_contacto_tecnico`, `cargo_contacto`, `email`, `extension`, `celular`, `empresa_actual`, `razon_cambio`, `doc_rut`, `doc_identidad`, `doc_camara_comercio`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Persona Juridica', '135246849-7', 'Fruver los Paisas', 'Fruver Colombia S.A.S.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Normal', 'Activo', 'prospecto', 'Jenny Molina', 'indefinido', 'indefinido', 'Gerente General', 'jenny@gmail.com', 'indefinido', '3154874545', 'Plagas S.A.S.', 'Mal servicio', 1, 1, 1, 1, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(2, 'Persona Natural', '32135686', 'Luis Felipe Cortéz', NULL, 'indefinido', 'Santiago de Cali', 'CRA 4 # 12A - 399', 'Caldas', 'Suroccidente', 'Prospecto', 'Normal', 'Activo', 'prospecto', 'Luis Felipe Cortéz', 'indefinido', 'indefinido', 'Independiente', 'luis@gmail.com', 'indefinido', '311565468', 'indefinido', 'indefinido', 0, 1, 0, 3, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(3, 'Persona Natural', '987656546', 'Lina Maria Chavez', NULL, 'indefinido', 'indefinido', 'CRA 4A # 45A - 34', 'La Campiña', 'Norte', 'Prospecto', 'Normal', 'Activo', 'prospecto', 'Lina Maria Chavez', 'indefinido', 'indefinido', 'Independiente', 'lian@gmail.com', 'indefinido', '318546813', 'indefinido', 'indefinido', 1, 1, 0, 3, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(4, 'Persona Juridica', '654984651-7', 'Supermercado Super Inter', 'Exito S.A.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Normal', 'Activo', 'prospecto', 'Jenny Molina', 'indefinido', 'indefinido', 'Gerente General', 'jenny@gmail.com', 'indefinido', '3154874545', 'Plagas S.A.S.', 'Mal servicio', 0, 0, 0, 1, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(5, 'Persona Juridica', '00161654758-7', 'La California', 'California S.A.', 'Comercial', 'Santiago de Cali', 'CRA 32 # 10 - 39', 'Departamental', 'Sur', 'Prospecto', 'Normal', 'Activo', 'prospecto', 'Pepito Perez', 'Andres Lopez', 'Recursos Humanos', 'Gerente General', 'pepe@gmail.com', 'indefinido', '3106546567', 'indefinido', 'ninguna', 0, 0, 1, 5, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(6, 'Persona Natural', '65465465', 'Felipe López', NULL, 'indefinido', 'indefinido', 'AV 6 # 60AN - 34', 'Santa Mónica', 'Norte', 'Prospecto', 'Normal', 'Activo', 'prospecto', 'Felipe Lopez', 'indefinido', 'indefinido', 'Independiente', 'felipe@gmail.com', 'indefinido', '3195191511', 'indefinido', 'indefinido', 1, 0, 0, 5, '2018-05-07 13:50:00', '2018-05-08 15:31:00');

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

--
-- Dumping data for table `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `codigo`, `estado`, `estado_aprobacion`, `valor`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'CT-VMA-1', 'Final', 'no_aprobada', 756000, 1, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(2, 'CT-VMA-2', 'Final', 'no_aprobada', 350000, 2, '2019-10-29 20:21:00', '2019-10-30 01:21:00'),
(3, 'CT-VMA-4', 'Final', 'no_aprobada', 875000, 4, '2019-09-29 20:21:00', '2019-09-30 01:21:00'),
(4, 'CT-VMA-3', 'Final', 'no_aprobada', 450000, 3, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(5, 'CT-JVP-5', 'Final', 'no_aprobada', 640000, 5, '2019-11-29 20:21:00', '2019-11-30 01:21:00'),
(6, 'CT-JVP-6', 'Final', 'no_aprobada', 710000, 6, '2019-11-29 20:21:00', '2019-11-30 01:21:00');

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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `fecha_inicio`, `fecha_fin`, `dia_completo`, `color`, `asunto`, `tipo`, `cliente_id`, `sede_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2018-04-15 14:00:00', '2018-04-15 15:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 03219689', 'Llamada', NULL, NULL, 1, NULL, NULL),
(2, '2018-04-14 14:00:00', '2018-04-14 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 03219689', 'Visita', NULL, NULL, 1, NULL, NULL),
(3, '2018-04-03 14:00:00', '2018-04-03 17:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 9865465', 'Llamada', NULL, NULL, 2, NULL, NULL),
(4, '2018-04-14 14:00:00', '2018-04-18 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 96546ASD', 'Visita', NULL, NULL, 2, NULL, NULL);

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
(391, '2014_10_12_000000_create_users_table', 1),
(392, '2014_10_12_100000_create_password_resets_table', 1),
(393, '2018_04_12_022651_create_areas_table', 1),
(394, '2018_04_12_023001_create_cargos_table', 1),
(395, '2018_04_12_190550_create_clientes_table', 1),
(396, '2018_04_12_193958_create_sedes_table', 1),
(397, '2018_04_12_195156_create_tareas_table', 1),
(398, '2018_04_12_235243_create_novedads_table', 1),
(399, '2018_04_13_011115_create_area_novedad_table', 1),
(400, '2018_04_15_175902_create_eventos_table', 1),
(401, '2018_05_10_203827_create_notifications_table', 1),
(402, '2018_05_14_205719_create_solicitudes_table', 1),
(403, '2018_05_30_215131_create_telefonos_table', 1),
(404, '2018_06_22_111550_create_servicios_table', 1),
(405, '2018_06_22_115017_create_tecnicos_table', 1),
(406, '2018_07_27_215505_create_tipo_servicios_table', 1),
(407, '2018_07_27_220255_create_servicio_tecnico', 1),
(408, '2018_08_01_220413_create_servicio_tipo_servicio_table', 1),
(409, '2018_11_08_185829_create_certificados_table', 1),
(410, '2018_11_11_100214_create_rutas_table', 1),
(411, '2018_11_27_214335_create_cotizaciones_table', 1),
(412, '2018_11_29_200551_create_metas_table', 1),
(413, '2018_11_30_195752_create_facturas_table', 1),
(414, '2019_01_10_190005_create_novedad_temporals_table', 1),
(415, '2019_01_25_233108_create_orden_servicios_table', 1),
(416, '2019_01_26_001133_create_productos_table', 1),
(417, '2019_01_26_003818_create_orden_servicio_producto', 1),
(418, '2019_01_27_175935_create_orden_servico_tecnico', 1),
(419, '2019_01_27_221128_create_producto_ruta', 1);

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
  `area_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `comentario` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `novedads`
--

INSERT INTO `novedads` (`id`, `descripcion`, `estado`, `user2_id`, `prioridad`, `user_id`, `area_id`, `cliente_id`, `sede_id`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 04456 presenta plaga de ratas en la sede principal', 'publicada', NULL, 'Normal', 1, 3, NULL, NULL, 'Novedad resuleta con éxito', '2018-04-18 21:58:00', NULL),
(2, 'La factura 00565468 no ha sido pagada', 'publicada', NULL, 'Normal', 2, 2, NULL, NULL, NULL, '2018-04-17 20:58:00', NULL),
(3, 'Cliente No. 20316 no ha pagado el servicio', 'publicada', NULL, 'Normal', 1, 1, NULL, NULL, NULL, '2018-04-19 20:21:00', NULL);

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
  `cantidad_aplicada` decimal(5,1) NOT NULL,
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
  `hora_salida` time NOT NULL
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
  `total_unidades` decimal(10,1) NOT NULL,
  `valor_unidad` decimal(10,2) NOT NULL,
  `costo_total` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `observaciones` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
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
  `contacto_name_factura` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto_telefono_factura` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto_celular_factura` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_plan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instrucciones` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estaciones_roedor` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lamparas_control` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cajas_alcantarilla` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trampas_plasticas` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_casas` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_aptos` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_bodegas` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrato` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forma_pago` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facturacion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicios_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frecuencia_servicios_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_servicios_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicios_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frecuencia_servicios_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_servicios_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicios_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frecuencia_servicios_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_servicios_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_servicios` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivos_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dispositivos_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_dispositivos_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_dispositivos_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivos_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dispositivos_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_dispositivos_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_dispositivos_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivos_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dispositivos_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_dispositivos_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_dispositivos_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones_dispositivos` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivos_comodato_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dispositivos_comodato_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_dispositivos_comodato_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_dispositivos_comodato_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivos_comodato_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dispositivos_comodato_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_dispositivos_comodato_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_dispositivos_comodato_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispositivos_comodato_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_dispositivos_comodato_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidad_dispositivos_comodato_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_dispositivos_comodato_3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones_dispositivos_comodato` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medio_contacto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otro` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `sede_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `codigo`, `nombre_usuario`, `fecha`, `frecuencia`, `contacto_name_factura`, `contacto_telefono_factura`, `contacto_celular_factura`, `observaciones`, `total_plan`, `instrucciones`, `estaciones_roedor`, `lamparas_control`, `cajas_alcantarilla`, `trampas_plasticas`, `numero_casas`, `numero_aptos`, `numero_bodegas`, `contrato`, `forma_pago`, `facturacion`, `servicios_1`, `frecuencia_servicios_1`, `valor_servicios_1`, `servicios_2`, `frecuencia_servicios_2`, `valor_servicios_2`, `servicios_3`, `frecuencia_servicios_3`, `valor_servicios_3`, `total_servicios`, `dispositivos_1`, `cantidad_dispositivos_1`, `unidad_dispositivos_1`, `total_dispositivos_1`, `dispositivos_2`, `cantidad_dispositivos_2`, `unidad_dispositivos_2`, `total_dispositivos_2`, `dispositivos_3`, `cantidad_dispositivos_3`, `unidad_dispositivos_3`, `total_dispositivos_3`, `observaciones_dispositivos`, `dispositivos_comodato_1`, `cantidad_dispositivos_comodato_1`, `unidad_dispositivos_comodato_1`, `total_dispositivos_comodato_1`, `dispositivos_comodato_2`, `cantidad_dispositivos_comodato_2`, `unidad_dispositivos_comodato_2`, `total_dispositivos_comodato_2`, `dispositivos_comodato_3`, `cantidad_dispositivos_comodato_3`, `unidad_dispositivos_comodato_3`, `total_dispositivos_comodato_3`, `observaciones_dispositivos_comodato`, `medio_contacto`, `otro`, `cliente_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 'FS001', NULL, '2018-04-19', 'Semanal', NULL, NULL, NULL, 'Observacion FS01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-04-19 20:21:00', '2018-04-21 01:21:00'),
(2, 'FS003', NULL, '2018-04-19', 'Mensual', NULL, NULL, NULL, 'Observacion FS03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2018-05-19 20:21:00', '2018-05-21 01:21:00'),
(3, 'FS004', NULL, '2018-04-19', 'Bimestral', NULL, NULL, NULL, 'Observacion FS04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, '2018-02-19 20:21:00', '2018-02-21 01:21:00'),
(4, 'FS005', NULL, '2018-04-19', 'Trimestral', NULL, NULL, NULL, 'Observacion FS05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, '2018-02-19 20:21:00', '2018-02-21 01:21:00'),
(5, 'FS006', NULL, '2018-04-19', 'Semestral', NULL, NULL, NULL, 'Observacion FS06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, '2018-02-19 20:21:00', '2018-02-21 01:21:00'),
(6, 'FS007', NULL, '2018-04-19', 'Anual', NULL, NULL, NULL, 'Observacion FS06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, '2018-02-19 20:21:00', '2018-02-21 01:21:00');

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
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activo',
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nombre`, `estado`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Antonio Pérez', 'activo', 'rgb(69,130,29)', NULL, NULL),
(2, 'Luis Alejandro Rojas', 'activo', 'rgb(219,165,37)', NULL, NULL),
(3, 'Fernando López', 'activo', 'rgb(92,174,39)', NULL, NULL),
(4, 'Andrés Stiven Bejarano', 'activo', 'rgb(255,130,0)', NULL, NULL),
(5, 'Jhon Alex Barrios', 'activo', 'rgb(2,112,192)', NULL, NULL);

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
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'default-user.jpg', 'victormalsx@gmail.com', '$2y$10$peXpZCjfugAkusb.AkH81eOMEUYpS4t4A8QJXnHAVS7VfX2s4fWEi', 1, 1, NULL, NULL, NULL),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'a6.jpg', 'yurani@gmail.com', '$2y$10$a8trnIZBB5UUM3y2smKUlurwUFUx7Vbv6i/zn6eH3xNgjhrqprZ6i', 2, 2, NULL, NULL, NULL),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'a1.jpg', 'andres@gmail.com', '$2y$10$gwGjGVwP5s2ABeQ.HHytdOh/LZp1UQESJsMngoCvf7APspV50A1sm', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'a7.jpg', 'jhon@gmail.com', '$2y$10$.yHc1W1q985hOVwHVvhh3.vOIs5jj5/59KU/2dI210AJ4Vf4GANPS', 3, 3, NULL, NULL, NULL),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'a9.jpg', 'jhonny@gmail.com', '$2y$10$aZ1IGP6eK9mSUqdJ1jOXLusezzIphDSmGwVoZPAJvbTUM5zkSdi72', 3, 4, NULL, NULL, NULL),
(6, 951789123, 'Jhon', 'Doe', 'JD', '3177777750', 'a10.jpg', 'jhon.doe@gmail.com', '$2y$10$LKvO4yhrwKCqT0B/JhxErOhyhvfNJxmTgEYnpTnd/jWvCV4Nsyede', 4, 5, NULL, NULL, NULL),
(7, 1062545984, 'Diego', 'Leguizamo', 'DLL', '321654987', 'a11.jpg', 'diego@gmail.com', '$2y$10$AHu3d.wM7ePhxFQhwQA4IOupeRBffkW5Q9XIdjwpb4uGlNKr4JXYi', 6, 7, NULL, NULL, NULL),
(8, 687459687, 'Sarah', 'Jhonson', 'SCJ', '3177777750', 'a12.jpg', 'sarah@gmail.com', '$2y$10$VI/FB2lnoyz2DIwBnBri6eD2tGBngWKIb6mbYnWOyXQlC5dsRi83W', 5, 6, NULL, NULL, NULL);

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
-- Indexes for table `novedad_temporals`
--
ALTER TABLE `novedad_temporals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden_servicios`
--
ALTER TABLE `orden_servicios`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

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
-- AUTO_INCREMENT for table `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
