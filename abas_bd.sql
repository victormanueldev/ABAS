-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-12-2018 a las 07:40:17
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abas_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'comercial', 'Área Comercial', NULL, NULL),
(2, 'contabilidad', 'Área Contabilidad', NULL, NULL),
(3, 'programacion', 'Área Programación', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_novedad`
--

CREATE TABLE `area_novedad` (
  `area_id` int(11) NOT NULL,
  `novedad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'asesorcom', 'Inspector Comercial', NULL, NULL),
(2, 'contabilidad', 'Auxiliar Contable', NULL, NULL),
(3, 'programacion', 'Programador', NULL, NULL),
(4, 'directorcom', 'Director Comercial', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
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
-- Estructura de tabla para la tabla `clientes`
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
  `doc_rut` tinyint(1) NOT NULL DEFAULT '0',
  `doc_identidad` tinyint(1) NOT NULL DEFAULT '0',
  `doc_camara_comercio` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_cliente`, `nit_cedula`, `nombre_cliente`, `razon_social`, `sector_economico`, `municipio`, `direccion`, `barrio`, `zona`, `estado_negociacion`, `nombre_contacto`, `contacto_tecnico`, `cargo_contacto_tecnico`, `cargo_contacto`, `email`, `extension`, `celular`, `empresa_actual`, `razon_cambio`, `doc_rut`, `doc_identidad`, `doc_camara_comercio`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Persona Juridica', '135246849-7', 'Fruver los Paisas', 'Fruver Colombia S.A.S.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Jenny Molina', 'indefinido', 'indefinido', 'Gerente General', 'jenny@gmail.com', 'indefinido', '3154874545', 'Plagas S.A.S.', 'Mal servicio', 1, 1, 1, 1, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(2, 'Persona Natural', '32135686', 'Luis Felipe Cortéz', NULL, 'indefinido', 'Santiago de Cali', 'CRA 4 # 12A - 399', 'Caldas', 'Suroccidente', 'Prospecto', 'Luis Felipe Cortéz', 'indefinido', 'indefinido', 'Independiente', 'luis@gmail.com', 'indefinido', '311565468', 'indefinido', 'indefinido', 0, 1, 0, 3, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(3, 'Persona Natural', '987656546', 'Lina Maria Chavez', NULL, 'indefinido', 'indefinido', 'CRA 4A # 45A - 34', 'La Campiña', 'Norte', 'Prospecto', 'Lina Maria Chavez', 'indefinido', 'indefinido', 'Independiente', 'lian@gmail.com', 'indefinido', '318546813', 'indefinido', 'indefinido', 1, 1, 0, 3, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(4, 'Persona Juridica', '654984651-7', 'Supermercado Super Inter', 'Exito S.A.', 'Comercial', 'Santiago de Cali', 'CRA 2D # 62 - 39', 'Guayacanes', 'Suroriente', 'Prospecto', 'Jenny Molina', 'indefinido', 'indefinido', 'Gerente General', 'jenny@gmail.com', 'indefinido', '3154874545', 'Plagas S.A.S.', 'Mal servicio', 0, 0, 0, 1, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(5, 'Persona Juridica', '00161654758-7', 'La California', 'California S.A.', 'Comercial', 'Santiago de Cali', 'CRA 32 # 10 - 39', 'Departamental', 'Sur', 'Prospecto', 'Pepito Perez', 'Andres Lopez', 'Recursos Humanos', 'Gerente General', 'pepe@gmail.com', 'indefinido', '3106546567', 'indefinido', 'ninguna', 0, 0, 1, 5, '2018-05-07 13:50:00', '2018-05-08 15:31:00'),
(6, 'Persona Natural', '65465465', 'Felipe López', NULL, 'indefinido', 'indefinido', 'AV 6 # 60AN - 34', 'Santa Mónica', 'Norte', 'Prospecto', 'Felipe Lopez', 'indefinido', 'indefinido', 'Independiente', 'felipe@gmail.com', 'indefinido', '3195191511', 'indefinido', 'indefinido', 1, 0, 0, 5, '2018-05-07 13:50:00', '2018-05-08 15:31:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
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
-- Volcado de datos para la tabla `cotizaciones`
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
-- Estructura de tabla para la tabla `eventos`
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
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `fecha_inicio`, `fecha_fin`, `dia_completo`, `color`, `asunto`, `tipo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2018-04-15 14:00:00', '2018-04-15 15:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 03219689', 'Llamada', 1, NULL, NULL),
(2, '2018-04-14 14:00:00', '2018-04-14 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 03219689', 'Visita', 1, NULL, NULL),
(3, '2018-04-03 14:00:00', '2018-04-03 17:00:00', 0, 'rgb(219, 165, 37)', 'Llamar al cliente 9865465', 'Llamada', 2, NULL, NULL),
(4, '2018-04-14 14:00:00', '2018-04-18 17:00:00', 0, 'rgb(92, 174, 39)', 'Visita al cliente 96546ASD', 'Visita', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
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
-- Estructura de tabla para la tabla `metas`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2014_10_12_000000_create_users_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2018_04_12_022651_create_areas_table', 1),
(27, '2018_04_12_023001_create_cargos_table', 1),
(28, '2018_04_12_190550_create_clientes_table', 1),
(29, '2018_04_12_193958_create_sedes_table', 1),
(30, '2018_04_12_195156_create_tareas_table', 1),
(31, '2018_04_12_235243_create_novedads_table', 1),
(32, '2018_04_13_011115_create_area_novedad_table', 1),
(33, '2018_04_15_175902_create_eventos_table', 1),
(34, '2018_05_10_203827_create_notifications_table', 1),
(35, '2018_05_14_205719_create_solicitudes_table', 1),
(36, '2018_05_30_215131_create_telefonos_table', 1),
(37, '2018_06_22_111550_create_servicios_table', 1),
(38, '2018_06_22_115017_create_tecnicos_table', 1),
(39, '2018_07_27_215505_create_tipo_servicios_table', 1),
(40, '2018_07_27_220255_create_servicio_tecnico', 1),
(41, '2018_08_01_220413_create_servicio_tipo_servicio_table', 1),
(42, '2018_11_08_185829_create_certificados_table', 1),
(43, '2018_11_11_100214_create_rutas_table', 1),
(44, '2018_11_27_214335_create_cotizaciones_table', 1),
(45, '2018_11_29_200551_create_metas_table', 1),
(46, '2018_11_30_195752_create_facturas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
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
-- Estructura de tabla para la tabla `novedads`
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
-- Volcado de datos para la tabla `novedads`
--

INSERT INTO `novedads` (`id`, `descripcion`, `estado`, `user2_id`, `user_id`, `area_id`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 04456 presenta plaga de ratas en la sede principal', 'publicada', NULL, 1, 3, 'Novedad resuleta con éxito', '2018-04-18 21:58:00', NULL),
(2, 'La factura 00565468 no ha sido pagada', 'publicada', NULL, 2, 2, NULL, '2018-04-17 20:58:00', NULL),
(3, 'Cliente No. 20316 no ha pagado el servicio', 'publicada', NULL, 1, 1, NULL, '2018-04-19 20:21:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
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
-- Estructura de tabla para la tabla `sedes`
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
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `direccion`, `ciudad`, `barrio`, `zona_ruta`, `nombre_contacto`, `telefono_contacto`, `celular_contacto`, `email`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'Fruver Santa Librada', 'CRA 46 #54 - 44', 'Cali', 'Santa Librada', 'Centro', 'Ricardo', '126456', '31321898', 'ricardo@gmail.com', 1, NULL, NULL),
(2, 'Fruver Chipichape', 'CRA 6 #51 - 44', 'Cali', 'Chipichape', 'Norte', 'Francisco', '126456', '31321898', 'francisco@gmail.com', 1, NULL, NULL),
(3, 'Super Inter La  Flora', 'CRA 5 #65 - 44', 'Cali', 'La Flora', 'Norte', 'juan', '126456', '31321898', 'juan@gmail.com', 4, NULL, NULL),
(4, 'Super Inter San Fernando', 'CRA 46 #54 - 44', 'Cali', 'San Fernando', 'Centro', 'Jorge', '126456', '31321898', 'Jorge@gmail.com', 4, NULL, NULL),
(5, 'California La Rivera', 'CLL 70 #35 - 44', 'Cali', 'La Rivera', 'Norte', 'Alfredo', '9516546', '31321800', 'alfredo@gmail.com', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_tecnico`
--

CREATE TABLE `servicio_tecnico` (
  `servicio_id` int(11) NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_tipo_servicio`
--

CREATE TABLE `servicio_tipo_servicio` (
  `id_servicio_tipo` int(10) UNSIGNED NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL,
  `numero_factura` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
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
-- Volcado de datos para la tabla `solicitudes`
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
-- Estructura de tabla para la tabla `tareas`
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
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `asunto`, `completado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Llamar al cliente #0321498', 0, 1, NULL, NULL),
(2, 'Pagar recibo de Energia', 1, 1, NULL, NULL),
(3, 'LLamar a Jhon', 0, 1, NULL, NULL),
(4, 'Pasar lso clientes a ABAS', 0, 2, NULL, NULL),
(5, 'Poner en el calendario algo', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nombre`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Antonio Pérez', 'rgb(69,130,29)', NULL, NULL),
(2, 'Luis Alejandro Rojas', 'rgb(219,165,37)', NULL, NULL),
(3, 'Fernando López', 'rgb(92,174,39)', NULL, NULL),
(4, 'Andrés Stiven Bejarano', 'rgb(255,130,0)', NULL, NULL),
(5, 'Jhon Alex Barrios', 'rgb(2,112,192)', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
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
-- Estructura de tabla para la tabla `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_servicios`
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
-- Estructura de tabla para la tabla `users`
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cedula`, `nombres`, `apellidos`, `iniciales`, `telefono`, `foto`, `email`, `password`, `area_id`, `cargo_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1061807769, 'Victor Manuel', 'Arenas Lopez', 'VMA', '3103195394', 'default-user.jpg', 'victormalsx@gmail.com', '$2y$10$J11SKYScInIPP5WO7HqJkukY6JR1efKdA0Bjvw.zX9n9qWnzSuH2O', 1, 1, NULL, NULL, NULL),
(2, 987654321, 'Yurani', 'Calvo Ruiz', 'YCR', '3103195394', 'a6.jpg', 'yurani@gmail.com', '$2y$10$rpX5mEa5WPZHNL1zrc0ZxOJWr3vnW/rWgIGPraJAvTPupmpmVoOz6', 2, 2, NULL, NULL, NULL),
(3, 123456789, 'Andres Stiven', 'Medina Bejarano', 'ASM', '3115552222', 'a1.jpg', 'andres@gmail.com', '$2y$10$AMdBykNbaUbavEiXvkdVb.aO.Vz8Of0VJXmMbrwribaP4jl54djd2', 1, 1, NULL, NULL, NULL),
(4, 987654621, 'Jhon Edward', 'Nieto', 'JEN', '3177777750', 'a7.jpg', 'jhon@gmail.com', '$2y$10$kIIpfDL9hBciRMGaqkfJ..gWwNn8AHOW28FMIVFuouG/8XqhIDd7K', 3, 3, NULL, NULL, NULL),
(5, 654159789, 'Jhonny', 'Vargas Perez', 'JVP', '3177777750', 'a9.jpg', 'jhonny@gmail.com', '$2y$10$BoGnVk0oe9TJQ0bWsJ6yLOHjXpfFL3.ABGaGMARXeG4z9l62gAAaO', 3, 4, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_nombre_unique` (`nombre`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargos_nombre_unique` (`nombre`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indices de la tabla `novedads`
--
ALTER TABLE `novedads`
  ADD UNIQUE KEY `novedads_id_unique` (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rutas_codigo_unique` (`codigo`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_tipo_servicio`
--
ALTER TABLE `servicio_tipo_servicio`
  ADD PRIMARY KEY (`id_servicio_tipo`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio_tipo_servicio`
--
ALTER TABLE `servicio_tipo_servicio`
  MODIFY `id_servicio_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
