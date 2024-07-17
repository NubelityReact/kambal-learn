-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-06-2024 a las 15:01:50
-- Versión del servidor: 10.2.36-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kambal_ovmx_qa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idialumno` int(11) NOT NULL,
  `idigenerales` int(11) DEFAULT NULL,
  `idicarrera` int(11) DEFAULT NULL,
  `TurnoId` int(11) DEFAULT NULL,
  `idiuser` int(11) DEFAULT NULL COMMENT 'usuario',
  `matricula` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `generacion` varchar(40) COLLATE utf8_bin DEFAULT NULL COMMENT 'generación de ingreso',
  `cuatrimestre` int(11) DEFAULT 1 COMMENT 'concurrente',
  `cuatrimestres_trasncurridos` int(11) DEFAULT 0 COMMENT 'número de cuatrimestres transcurridos',
  `beca_colegiatura` varchar(3) COLLATE utf8_bin DEFAULT '0' COMMENT 'Porcentaje de beca',
  `estatus` enum('Nuevo Ingreso','Activo','Reingreso','Baja Temporal','Baja Definitiva','Egresado','Bloqueado','No Inscrito','Sin especificar') COLLATE utf8_bin DEFAULT 'Activo' COMMENT 'Estatus',
  `rfc_factura` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `uso_factura` int(11) DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `perfil` varchar(50) COLLATE utf8_bin DEFAULT 'usermix.jpg',
  `firma` varchar(50) COLLATE utf8_bin DEFAULT 'empty_sing.png',
  `alta` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación de registro '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;


--
-- Disparadores `alumno`
--
DELIMITER $$
CREATE TRIGGER `after_insert_tbuser` AFTER INSERT ON `alumno` FOR EACH ROW BEGIN

INSERT INTO tbuser (idigenerales, idirole, user, categoria)
values (NEW.idigenerales, 5, NEW.matricula, 'general');


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoReporte`
--

CREATE TABLE `alumnoReporte` (
  `idiAlumnoReporte` int(11) NOT NULL,
  `idialumno` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `idiciclo` int(11) DEFAULT NULL,
  `idiprofesor` int(11) DEFAULT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `citatorio` tinyint(1) DEFAULT NULL,
  `fechaCita` date DEFAULT NULL,
  `horaCita` time DEFAULT NULL,
  `requiereTutor` tinyint(1) DEFAULT NULL,
  `precentoTutor` tinyint(1) DEFAULT NULL,
  `suspension` tinyint(1) DEFAULT NULL,
  `fechaInicioSuspension` date DEFAULT NULL,
  `fechaFinSuspension` date DEFAULT NULL,
  `Observaciones` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE `campus` (
  `idicampus` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `campus` varchar(128) COLLATE utf8_bin NOT NULL,
  `clave` varchar(15) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `hijo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idicarrera` int(11) NOT NULL,
  `NivelId` int(11) NOT NULL,
  `idicampus` int(11) DEFAULT 1,
  `idinotification` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `suspended` tinyint(1) DEFAULT 0,
  `nombre` varchar(140) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `working_day` varchar(255) COLLATE utf8_bin DEFAULT '''Sin especificar''',
  `salary` varchar(255) COLLATE utf8_bin DEFAULT '''Sin especificar''',
  `message` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `available` int(11) DEFAULT 0,
  `rvoe` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `numero_carrera` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `lms_course_id` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `files` mediumblob DEFAULT NULL,
  `files_name` varchar(255) COLLATE utf8_bin DEFAULT ''' ''',
  `files_size` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `files_type` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `clave` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `nivel` char(1) COLLATE utf8_bin DEFAULT NULL,
  `categoria` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `duracion` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cAulas`
--

CREATE TABLE `cAulas` (
  `AulaId` int(11) NOT NULL,
  `Clave` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Capacidad` varchar(100) DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL,
  `idicampus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cDocumentos`
--

CREATE TABLE `cDocumentos` (
  `ididocumento` int(11) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  `suspended` int(11) DEFAULT 0,
  `type` enum('Aspirante','Alumno','Profesor','Sin especificar') NOT NULL DEFAULT 'Sin especificar',
  `description` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cDocumentosGenerales`
--

CREATE TABLE `cDocumentosGenerales` (
  `ididocgral` int(11) NOT NULL,
  `ididocumento` int(11) NOT NULL,
  `idigenerales` int(11) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  `suspended` int(11) DEFAULT 0,
  `files` mediumblob DEFAULT NULL,
  `files_name` varchar(255) DEFAULT NULL,
  `files_size` varchar(30) DEFAULT NULL,
  `files_type` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `cDocumentosProfe`
--

CREATE TABLE `cDocumentosProfe` (
  `DocumentoProfeId` int(11) NOT NULL,
  `DocumentoSolicitadoId` int(11) NOT NULL,
  `idiprofesor` int(11) NOT NULL,
  `Entregado` tinyint(1) DEFAULT 1,
  `tamanio` varchar(10) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `archivo` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cGrados`
--

CREATE TABLE `cGrados` (
  `GradosId` int(11) NOT NULL,
  `NivelId` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `Descripcion` varchar(100) NOT NULL,
  `Abreviatura` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cHorasHorario`
--

CREATE TABLE `cHorasHorario` (
  `HoraHorarioId` int(11) NOT NULL,
  `idicarrera` int(11) DEFAULT NULL,
  `TurnoId` int(11) DEFAULT NULL,
  `HoraInicial` time NOT NULL,
  `HoraFinal` time NOT NULL,
  `NivelId` int(11) NOT NULL,
  `TodasCarreras` tinyint(4) DEFAULT NULL,
  `PlantelId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cliclo`
--

CREATE TABLE `cliclo` (
  `idiciclo` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `NivelId` int(11) DEFAULT NULL,
  `PlantelId` int(11) DEFAULT NULL,
  `abrev` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ciclo` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `termino` date DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `limite_inscipcion` date DEFAULT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8_bin DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cMedioContacto`
--

CREATE TABLE `cMedioContacto` (
  `idimedio` int(11) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  `suspended` int(11) DEFAULT 0,
  `medio` varchar(250) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


--
-- Estructura de tabla para la tabla `cModalidadCiclos`
--

CREATE TABLE `cModalidadCiclos` (
  `ModalidadId` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cNiveles`
--

CREATE TABLE `cNiveles` (
  `NivelId` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Abreviatura` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `idicredencial` int(11) NOT NULL,
  `idialumno` int(11) DEFAULT NULL,
  `iSiteCode` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `codigo_credencial` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `estatus` enum('Activo','Reinscrito','Baja temporal','Baja definitiva','Egresado','Bloqueado','No reinscrito') COLLATE utf8_bin DEFAULT 'Activo',
  `vigencia` date DEFAULT '2019-12-12',
  `bloqueo` enum('1','2') COLLATE utf8_bin DEFAULT '1' COMMENT 'Motivo de Bloqueo',
  `fecha_mod` datetime DEFAULT current_timestamp() COMMENT 'Fecha de modificacion',
  `creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `idimoodle` int(11) DEFAULT NULL COMMENT 'id de alumno in moodle',
  `moodle_request` varchar(140) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cSituacion`
--

CREATE TABLE `cSituacion` (
  `SituacionId` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cTipoEvaluacionPeriodo`
--

CREATE TABLE `cTipoEvaluacionPeriodo` (
  `TipoEvaluacionPeriodoId` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `NivelEvaluacion` int(11) DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cTurno`
--

CREATE TABLE `cTurno` (
  `TurnoId` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) DEFAULT 0,
  `Descripcion` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `cuatrimestre`
--

CREATE TABLE `cuatrimestre` (
  `id` int(11) NOT NULL,
  `idiciclo` int(11) DEFAULT NULL,
  `PeriodoId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_generales`
--

CREATE TABLE `datos_generales` (
  `idigenerales` int(11) NOT NULL,
  `idimedio` int(11) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `estatus` enum('pre-inscrito','Inscrito','normal') COLLATE utf8_bin DEFAULT 'pre-inscrito',
  `nombre` varchar(128) COLLATE utf8_bin NOT NULL,
  `apellido_paterno` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `apellido_materno` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Sin especificar') COLLATE utf8_bin DEFAULT 'Sin especificar' COMMENT 'Masculino / Femenino',
  `estado_civil` enum('Sin especificar','Soltero / a','Casado / a','Unión libre o unión de hecho','Separado / a','Viudo / a') COLLATE utf8_bin NOT NULL DEFAULT 'Sin especificar',
  `edad` int(11) DEFAULT 18,
  `curp` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `rfc` varchar(20) COLLATE utf8_bin DEFAULT 'XAXX010101000',
  `nss` varchar(125) COLLATE utf8_bin DEFAULT NULL COMMENT 'Numero de seguridad social',
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `movil` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email2` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `ciudad` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `municipio` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `escegreso` varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT 'escuela de egreso',
  `nivelegreso` varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT 'ultimo grado de estudios',
  `entidad_fed` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `fecha_inicio` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `fechaegreso` varchar(16) COLLATE utf8_bin DEFAULT NULL COMMENT 'fecha de egreso',
  `cedula` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `infoadicional` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'informacion adicional',
  `tiposangre` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `alergias` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `fecha_nacimiento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `interes` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `turno` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `emergencias` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Disparadores `datos_generales`
--
DELIMITER $$
CREATE TRIGGER `after_insert` AFTER INSERT ON `datos_generales` FOR EACH ROW BEGIN

INSERT INTO tbregistro_generales (idigenerales)
VALUES (NEW.idigenerales)    ;

END
$$
DELIMITER ;

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idifactura` int(11) NOT NULL,
  `folio` int(11) DEFAULT NULL,
  `ticket` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `venta` int(11) DEFAULT NULL,
  `serie` varchar(3) COLLATE utf8_bin DEFAULT 'UCP',
  `tipo_comprobante` enum('Ingreso','Egreso','Pago') COLLATE utf8_bin DEFAULT 'Ingreso',
  `rfc_emisor` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `rfc` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `fecha_emision` timestamp NULL DEFAULT current_timestamp(),
  `metodo_pago` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `forma_pago` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `usocfdi` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `nocertificado` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `sello` text COLLATE utf8_bin DEFAULT NULL,
  `certificado` text COLLATE utf8_bin DEFAULT NULL,
  `fecha_timbrado` varchar(19) COLLATE utf8_bin DEFAULT NULL,
  `sellosat` text COLLATE utf8_bin DEFAULT NULL,
  `certificado_sat` text COLLATE utf8_bin DEFAULT NULL,
  `sellocfd` text COLLATE utf8_bin DEFAULT NULL,
  `rfcprov_certificacion` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `cadena_original` text COLLATE utf8_bin DEFAULT NULL,
  `uuid` varchar(36) COLLATE utf8_bin DEFAULT NULL,
  `xml` mediumblob DEFAULT NULL,
  `pdf` mediumblob DEFAULT NULL,
  `qr` mediumblob DEFAULT NULL,
  `alumno` int(11) DEFAULT NULL,
  `descripcion` varchar(128) COLLATE utf8_bin DEFAULT '',
  `titulo` varchar(128) COLLATE utf8_bin DEFAULT '',
  `contenido` mediumblob DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `estatus` enum('Vigente','Cancelado') COLLATE utf8_bin DEFAULT 'Vigente',
  `estatus_cancelacion` enum('Cancelado con aceptación','Solicitud rechazada','En proceso','Cancelado plazo vencido','Cancelado sin aceptación','') COLLATE utf8_bin DEFAULT '',
  `fecha_cancelacion` datetime DEFAULT NULL,
  `acuse_cancelacion` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `id` int(11) NOT NULL,
  `factura` int(11) DEFAULT NULL,
  `idiventa_as_servicio` int(11) DEFAULT NULL,
  `servicio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(15,2) DEFAULT NULL,
  `importe` decimal(15,2) DEFAULT NULL,
  `impuesto` decimal(10,2) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_emisor`
--

CREATE TABLE `factura_emisor` (
  `id` int(11) NOT NULL,
  `rfc` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `persona` enum('Moral','Fisica') CHARACTER SET latin1 DEFAULT 'Moral',
  `Calle` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `NoExterior` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `NoInterior` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Colonia` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Localidad` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Referencia` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Municipio` varchar(100) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pais` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cp` varchar(5) CHARACTER SET latin1 NOT NULL,
  `regimen_fiscal` int(11) DEFAULT NULL,
  `banco` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `NoCuenta` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `ClaveInterbancaria` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Telefono` int(25) DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL,
  `esPruebas` tinyint(4) NOT NULL,
  `Email` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `forgot_password`
--

CREATE TABLE `forgot_password` (
  `idiforgot` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Token Valido',
  `intentos` int(11) DEFAULT 0,
  `token` varchar(100) NOT NULL,
  `idigenerales` int(11) NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `limite_min` int(11) NOT NULL DEFAULT 30 COMMENT 'Limite '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `form_datos_generales`
--

CREATE TABLE `form_datos_generales` (
  `idiform` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `category` enum('Datos personales','Datos de contacto','Dirección','Datos escolares','Experiencia profesional') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idimatricula` int(11) NOT NULL,
  `matricula` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `ciclo_escolar` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `plantel` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `nivel` char(1) COLLATE utf8_bin DEFAULT NULL,
  `carrera` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `consecutivo` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `idinotification` int(11) NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `comments` mediumtext DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `message` mediumtext NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `files` mediumblob DEFAULT NULL,
  `files_name` varchar(255) DEFAULT '',
  `files_size` varchar(30) DEFAULT NULL,
  `files_type` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `notifications_events`
--

CREATE TABLE `notifications_events` (
  `idievent` int(11) NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `comments` mediumtext DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `notifications_targets`
--

CREATE TABLE `notifications_targets` (
  `iditarget` int(11) NOT NULL,
  `idinotification` int(11) NOT NULL,
  `idigenerales` int(11) NOT NULL,
  `idievent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `oferta_form`
--

CREATE TABLE `oferta_form` (
  `idioferta` int(11) NOT NULL,
  `idicarrera` int(11) NOT NULL,
  `idiform` int(11) NOT NULL,
  `col` varchar(30) NOT NULL DEFAULT 'col-sm-12',
  `required` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idipago` int(11) NOT NULL,
  `idiventa` int(11) DEFAULT NULL,
  `matricula` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT 'Matricula del estudiante',
  `folio` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `estatus` enum('Pagado','Pendiente','Cancelado','') COLLATE utf8_bin DEFAULT NULL COMMENT 'Estatus del pago',
  `subtotal` float DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `metodo_pago` enum('Efectivo','Cheque','Transferencia','Tarjetas de crédito','Monederos electrónicos','Dinero electrónico','Vales de despensa','Tarjeta de Débito','Tarjeta de Servicio','Por Definir','Depósito Bancario','deposito') COLLATE utf8_bin DEFAULT NULL,
  `comentarios` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `idiusuario` varchar(140) COLLATE utf8_bin DEFAULT NULL COMMENT 'Usuario que enero la transacción',
  `abono` double DEFAULT 0,
  `banco` enum('BANAMEX','BANCOMER','BANORTE','SCOTIA BANK','SANTANDER','HSBC','OXXO','N/A') COLLATE utf8_bin DEFAULT 'N/A',
  `iditransaccion` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT 'ID de la transacción bancaria o deposito',
  `digitos` varchar(4) COLLATE utf8_bin DEFAULT NULL COMMENT 'Últimos 4 digitos de la tarjeta',
  `titular_tarjeta` varchar(240) COLLATE utf8_bin DEFAULT NULL COMMENT 'Titular de la tarjeta',
  `facturado` enum('No','Si','3') COLLATE utf8_bin DEFAULT 'No',
  `folio_facturado` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT 'Este campo se actualiza con el Numero de folio de la tabla factura cuando se sella y se genera el CFDI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idipermiso` int(11) NOT NULL,
  `showInMenu` enum('Si','No') COLLATE utf8_bin DEFAULT 'Si',
  `icon` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `icon_color` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `btnBack` varchar(50) COLLATE utf8_bin NOT NULL,
  `resumen` varchar(500) COLLATE utf8_bin NOT NULL,
  `permiso` varchar(140) COLLATE utf8_bin NOT NULL COMMENT 'Descripcion permiso',
  `categoria` enum('Gerencia','Admisión','Alumnos','Servicios','Profesores','Reportes','Catálogos','Planes de estudio','Control escolar','Conducta','Configuración','Catálogo_Escolares','NA','public_student') COLLATE utf8_bin DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `plan_pago`
--

CREATE TABLE `plan_pago` (
  `idiplan` int(11) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  `suspended` int(11) DEFAULT 0,
  `created` datetime DEFAULT current_timestamp(),
  `clave` varchar(10) NOT NULL,
  `descripcion` varchar(240) NOT NULL,
  `estatus` enum('activo','bloqueado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idiprofesor` int(11) NOT NULL,
  `idicampus` int(11) DEFAULT NULL,
  `Clave` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellido_paterno` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `apellido_materno` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `genero` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `curp` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `rfc` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `nss` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT 'Numero de seguridad social',
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `movil` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email2` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `ciudad` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `municipio` varchar(140) COLLATE utf8_bin DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `cedula` varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT 'escuela de egreso',
  `grado` varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT 'nicel de egreso',
  `perfil` varchar(140) COLLATE utf8_bin DEFAULT NULL COMMENT 'fecha de egreso',
  `infoadicional` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'informacion adicional',
  `tiposangre` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `alergias` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp() COMMENT 'fecha de creacion de registro',
  `fecha_nacimiento` date DEFAULT NULL,
  `emergencias` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `imagen_perfil` varchar(140) COLLATE utf8_bin DEFAULT 'usermix.jpg',
  `imagen_firma` varchar(140) COLLATE utf8_bin DEFAULT 'empty_sing.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `idirole` int(11) NOT NULL,
  `role` varchar(140) COLLATE utf8_bin NOT NULL COMMENT 'Role descripcion',
  `estatus` enum('Activo','Inactivo') COLLATE utf8_bin DEFAULT 'Activo',
  `edit` tinyint(1) DEFAULT 0,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `role_as_permiso`
--

CREATE TABLE `role_as_permiso` (
  `idirol_permiso` int(11) NOT NULL,
  `idirole` int(11) DEFAULT NULL,
  `idipermiso` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;


-------------------------SAT----------------------------------------------
--
-- Estructura de tabla para la tabla `sat_claveprodserv`
--

CREATE TABLE `sat_claveprodserv` (
  `id` int(11) NOT NULL,
  `Codigo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Descripion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `sat_claveunidad`
--

CREATE TABLE `sat_claveunidad` (
  `id` int(11) NOT NULL,
  `Clave` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Descripcion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `Simbolo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `sat_formapago`
--

CREATE TABLE `sat_formapago` (
  `id` int(11) NOT NULL,
  `Clave` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Descripcion` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `sat_metodopago`
--

CREATE TABLE `sat_metodopago` (
  `id` int(11) NOT NULL,
  `Clave` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Descripcion` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `sat_regimenfiscal`
--

CREATE TABLE `sat_regimenfiscal` (
  `id` int(11) NOT NULL,
  `Clave` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Descripcion` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `AplicaPersonaFisica` tinyint(4) NOT NULL,
  `AplicaPersonaMoral` tinyint(4) DEFAULT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `sat_usocfdi`
--

CREATE TABLE `sat_usocfdi` (
  `id` int(11) NOT NULL,
  `Clave` varchar(3) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `AplicaFisicas` tinyint(4) NOT NULL,
  `AplicaMorales` tinyint(4) NOT NULL,
  `Estatus` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

---------------------------END SAT-----------------------------------------------
--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idiservicio` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(128) COLLATE utf8_bin NOT NULL,
  `precio` double NOT NULL,
  `apply_discount` tinyint(1) NOT NULL DEFAULT 1,
  `es_facturable` int(11) DEFAULT 0,
  `descuento` int(11) NOT NULL DEFAULT 0,
  `activo` varchar(5) COLLATE utf8_bin DEFAULT 'si',
  `estatus` varchar(140) COLLATE utf8_bin DEFAULT 'Activo',
  `codigo_sat` int(11) DEFAULT NULL,
  `unidad_sat` int(11) DEFAULT NULL,
  `categoria` enum('miselaneo','colegiatura','ninguno') COLLATE utf8_bin DEFAULT 'colegiatura',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbAlumnoGrupo`
--

CREATE TABLE `tbAlumnoGrupo` (
  `AlumnoGruposId` int(11) NOT NULL,
  `idialumno` int(6) DEFAULT NULL,
  `GrupoId` int(6) DEFAULT NULL,
  `MateriaId` int(6) DEFAULT NULL,
  `SituacionAsignacionId` int(6) DEFAULT 4,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbBitacoraAcceso`
--

CREATE TABLE `tbBitacoraAcceso` (
  `idibitacora` int(11) NOT NULL,
  `idiusuario` int(11) NOT NULL,
  `acceso` datetime NOT NULL DEFAULT current_timestamp(),
  `adress` varchar(100) DEFAULT NULL,
  `currentpage` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbBloques`
--

CREATE TABLE `tbBloques` (
  `BloqueId` int(11) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `CicloId` int(11) NOT NULL,
  `Estatus` tinyint(4) NOT NULL,
  `GrupoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbButtonPyament`
--

CREATE TABLE `tbButtonPyament` (
  `idibutton` int(11) NOT NULL,
  `idiservicio` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `button` mediumtext NOT NULL,
  `description` varchar(255) NOT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `tbCalificaciones`
--

CREATE TABLE `tbCalificaciones` (
  `CalificacionId` int(11) NOT NULL,
  `NivelId` int(11) DEFAULT NULL,
  `CarreraId` int(11) DEFAULT NULL,
  `GrupoId` int(11) DEFAULT NULL,
  `MateriaId` int(11) DEFAULT NULL,
  `CicloId` int(11) DEFAULT NULL,
  `PeriodoId` int(11) DEFAULT NULL,
  `AlumnoId` int(11) DEFAULT NULL,
  `MaestroTitularId` int(11) DEFAULT NULL,
  `MaestroAlternoId` int(11) DEFAULT NULL,
  `PorcentajeTitular` int(11) DEFAULT NULL,
  `PorcentajeAlterno` int(11) DEFAULT NULL,
  `CalificacionTitular` varchar(100) DEFAULT NULL,
  `CalificacionAlterno` varchar(100) DEFAULT NULL,
  `Promedio` varchar(100) DEFAULT NULL,
  `NoSesiones` int(11) DEFAULT NULL,
  `NoFaltas` int(11) DEFAULT NULL,
  `PublicadoAlumnos` tinyint(4) DEFAULT NULL,
  `YaAsentoMaestro` tinyint(4) DEFAULT NULL,
  `YaAsentoControlEscolar` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbCiclos`
--

CREATE TABLE `tbCiclos` (
  `CicloId` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `NivelId` int(11) NOT NULL,
  `PlantelId` int(11) NOT NULL,
  `SituacionCicloId` int(11) NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `ModalidadId` int(11) NOT NULL,
  `VariosBloques` tinyint(4) NOT NULL,
  `Estatus` tinyint(4) NOT NULL,
  `PermiteVariasCapturasCalificaciones` tinyint(4) NOT NULL,
  `CicloNormal` tinyint(4) NOT NULL,
  `esDespresurizado` tinyint(4) NOT NULL,
  `DescripcionDetallada` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbconfig`
--

CREATE TABLE `tbconfig` (
  `idiconfig` int(11) NOT NULL,
  `idifactura` int(11) DEFAULT NULL,
  `deployment_folder` varchar(100) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(250) COLLATE utf8_bin NOT NULL,
  `shortname` varchar(20) COLLATE utf8_bin NOT NULL,
  `summary` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `clave_instituto` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin NOT NULL,
  `lms_token` varchar(40) COLLATE utf8_bin NOT NULL,
  `lms_domainname` varchar(100) COLLATE utf8_bin NOT NULL,
  `frontpageimage` varchar(250) COLLATE utf8_bin DEFAULT 'kambal.png',
  `frontpagecolor` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT '#3399ff',
  `theme` int(11) NOT NULL DEFAULT 1,
  `sessiontimeout` int(11) NOT NULL DEFAULT 7200,
  `forcetimezone` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT 'America/Mexico_City',
  `country` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT 'México',
  `defaultcity` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT 'CDMX',
  `lang` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT 'es',
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;


--
-- Volcado de datos para la tabla `tbconfig`
--

INSERT INTO `tbconfig` (`idiconfig`, `idifactura`, `deployment_folder`, `fullname`, `shortname`, `summary`, `clave_instituto`, `website`, `lms_token`, `lms_domainname`, `frontpageimage`, `frontpagecolor`, `theme`, `sessiontimeout`, `forcetimezone`, `country`, `defaultcity`, `lang`, `fecha`) VALUES
(1, 1, 'ovmx_qa', 'Learn', 'ovmx', 'Cultura, Educación, Gobierno, Idiomas, Comunicación', '101070174', 'https://ortegavasconcelos.mx', 'ac161d240f89a11d30d84ac291faad4e', 'https://kw.kambal.com.mx/learn/', 'kambal.png', '#3399ff', 1, 7200, 'America/Mexico_City', 'México', 'CDMX', 'es', '2021-10-29 18:37:16');


--
-- Estructura de tabla para la tabla `tbCustomForm`
--

CREATE TABLE `tbCustomForm` (
  `idicustomform` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `form_title` varchar(255) NOT NULL,
  `form_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estructura de tabla para la tabla `tbCustomFormContent`
--

CREATE TABLE `tbCustomFormContent` (
  `idcustomformcontent` int(11) NOT NULL,
  `idigenerales` int(11) NOT NULL,
  `idicustomform` int(11) NOT NULL,
  `container` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `tbCustomFormInputs`
--

CREATE TABLE `tbCustomFormInputs` (
  `idicustomimput` int(11) NOT NULL,
  `idicustomform` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `input_title` varchar(255) NOT NULL,
  `input_type` varchar(255) NOT NULL,
  `input_name` varchar(255) NOT NULL,
  `input_label` varchar(255) NOT NULL,
  `input_col` varchar(255) NOT NULL,
  `input_maxlength` int(11) NOT NULL DEFAULT 255,
  `input_id` varchar(255) NOT NULL DEFAULT '1',
  `input_required` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `tbGrupos`
--

CREATE TABLE `tbGrupos` (
  `GrupoId` int(11) NOT NULL,
  `idicarrera` int(11) DEFAULT NULL,
  `GradosId` int(11) DEFAULT NULL,
  `idiciclo` int(11) DEFAULT NULL,
  `TurnoId` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `suspended` int(11) DEFAULT 0,
  `Clave` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbHorarioGrupo`
--

CREATE TABLE `tbHorarioGrupo` (
  `HorarioGrupoId` int(11) NOT NULL,
  `GrupoId` int(11) DEFAULT NULL,
  `HorarioId` int(11) DEFAULT NULL,
  `Lun` tinyint(4) NOT NULL DEFAULT 0,
  `AulaLunId` varchar(240) DEFAULT NULL,
  `profLunId` varchar(240) DEFAULT NULL,
  `asgLunId` varchar(240) DEFAULT NULL,
  `Mar` tinyint(4) NOT NULL DEFAULT 0,
  `AulaMarId` varchar(240) DEFAULT NULL,
  `profMarId` varchar(240) DEFAULT NULL,
  `asgMarId` varchar(240) DEFAULT NULL,
  `Mie` tinyint(4) NOT NULL DEFAULT 0,
  `AulaMieId` varchar(240) DEFAULT NULL,
  `profMieId` varchar(240) DEFAULT NULL,
  `asgMieId` varchar(240) DEFAULT NULL,
  `Jue` tinyint(4) NOT NULL DEFAULT 0,
  `AulaJueId` varchar(240) DEFAULT NULL,
  `profJueId` varchar(240) DEFAULT NULL,
  `asgJueId` varchar(240) DEFAULT NULL,
  `Vie` tinyint(4) NOT NULL DEFAULT 0,
  `AulaVieId` varchar(240) DEFAULT NULL,
  `profVieId` varchar(240) DEFAULT NULL,
  `asgVieId` varchar(240) DEFAULT NULL,
  `Sab` tinyint(4) NOT NULL DEFAULT 0,
  `AulaSabId` varchar(240) DEFAULT NULL,
  `profSabId` varchar(240) DEFAULT NULL,
  `asgSabId` varchar(240) DEFAULT NULL,
  `Dom` tinyint(4) NOT NULL DEFAULT 0,
  `AulaDomId` varchar(240) DEFAULT NULL,
  `profDomId` varchar(240) DEFAULT NULL,
  `asgDomId` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


--
-- Estructura de tabla para la tabla `tbMaterias`
--

CREATE TABLE `tbMaterias` (
  `MateriaId` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `idicarrera` int(11) NOT NULL,
  `GradosId` int(11) NOT NULL,
  `DescripcionPlan` varchar(100) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT NULL,
  `Creditos` varchar(100) DEFAULT NULL,
  `Unidades` varchar(100) DEFAULT NULL,
  `HorasSemana` varchar(100) DEFAULT NULL,
  `TipoEvaluacionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbPeriodo`
--

CREATE TABLE `tbPeriodo` (
  `PeriodoId` int(11) NOT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Abreviatura` varchar(100) DEFAULT NULL,
  `TipoEvaluacionId` int(11) NOT NULL,
  `Estatus` tinyint(4) NOT NULL,
  `CambioAutomatico` tinyint(4) NOT NULL,
  `BloqueId` int(11) DEFAULT NULL,
  `Temporal` int(11) DEFAULT NULL,
  `DependeDeTemporal` int(11) DEFAULT NULL,
  `GrupoId` int(11) DEFAULT NULL,
  `MateriaId` int(11) DEFAULT NULL,
  `MaestroCapturaCalificaciones` tinyint(4) DEFAULT NULL,
  `CicloId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbProfesoresGrupos`
--

CREATE TABLE `tbProfesoresGrupos` (
  `ProfesoresGruposId` int(11) NOT NULL,
  `ProfesoresId` int(11) NOT NULL,
  `GrupoId` int(11) NOT NULL,
  `MateriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbregistro_generales`
--

CREATE TABLE `tbregistro_generales` (
  `idiregistro` int(11) NOT NULL,
  `idigenerales` int(11) NOT NULL,
  `idiregistromotivo` int(11) NOT NULL DEFAULT 1,
  `send_promotions` tinyint(1) NOT NULL DEFAULT 1,
  `tipo_registro` enum('interesado','tutor','otro') NOT NULL DEFAULT 'interesado',
  `estatus` enum('Nuevo Registro','Se envió información','No está interesado') NOT NULL DEFAULT 'Nuevo Registro',
  `medio_contacto` varchar(50) DEFAULT NULL,
  `comentarios` varchar(300) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `idicampus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tbregistro_motivo`
--

CREATE TABLE `tbregistro_motivo` (
  `idiregistromotivo` int(11) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `status` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


--
-- Estructura de tabla para la tabla `tbuser`
--

CREATE TABLE `tbuser` (
  `idiuser` int(11) NOT NULL,
  `idigenerales` int(11) NOT NULL,
  `idiconfig` int(11) NOT NULL DEFAULT 1,
  `idirole` int(11) DEFAULT 1,
  `idicampus` int(11) NOT NULL DEFAULT 1,
  `user` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT '123456789',
  `force_change_password` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estatus` enum('Activo','Suspendido') COLLATE utf8_bin DEFAULT 'Activo',
  `categoria` enum('root','admin','general') COLLATE utf8_bin DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `iditutor` int(11) NOT NULL,
  `idialumno` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `parentesco` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellidos` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `email2` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `cuidad` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `cp` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `addinfo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `vencimiento`
--

CREATE TABLE `vencimiento` (
  `idivencimiento` int(11) NOT NULL,
  `idiplan` int(6) NOT NULL,
  `idiciclo` int(6) NOT NULL,
  `NivelId` int(6) NOT NULL,
  `TurnoId` int(6) NOT NULL,
  `idiservicio` int(6) NOT NULL,
  `fecha_limite` datetime DEFAULT NULL,
  `porcentaje_cargo` int(11) DEFAULT 0,
  `mVence` enum('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE','-') DEFAULT '-',
  `vigencia` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idiventa` int(11) NOT NULL,
  `folio` varchar(40) COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Estructura de tabla para la tabla `venta_as_servicio`
--

CREATE TABLE `venta_as_servicio` (
  `idiventa_as_servicio` int(11) NOT NULL,
  `idialumno` int(11) DEFAULT NULL,
  `idiservicio` int(11) DEFAULT NULL,
  `idiventa` int(11) DEFAULT NULL,
  `precio` float NOT NULL,
  `realdiscount` varchar(255) COLLATE utf8_bin DEFAULT '0',
  `realsurcharge` varchar(255) COLLATE utf8_bin DEFAULT '0',
  `unidad` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `idiuser` int(11) DEFAULT NULL COMMENT 'Usuario que enero la transacción',
  `periodo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `comentario` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `estatus` enum('Pagado','Pendiente','Cancelado','Proceso') COLLATE utf8_bin DEFAULT 'Pendiente',
  `fecha_mod` datetime DEFAULT NULL COMMENT 'Si la partida no tiene Fecha de moificacion = Aun se debe',
  `migrado` tinyint(1) DEFAULT 1,
  `descuento` varchar(6) COLLATE utf8_bin NOT NULL,
  `recargo` float DEFAULT 0,
  `fecha_limite` date DEFAULT NULL COMMENT 'Fecha limite de pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idialumno`) USING BTREE,
  ADD KEY `idicarrera` (`idicarrera`) USING BTREE,
  ADD KEY `idigenerales` (`idigenerales`) USING BTREE,
  ADD KEY `TurnoId` (`TurnoId`);

--
-- Indices de la tabla `alumnoReporte`
--
ALTER TABLE `alumnoReporte`
  ADD PRIMARY KEY (`idiAlumnoReporte`) USING BTREE,
  ADD KEY `idiciclo` (`idiciclo`) USING BTREE,
  ADD KEY `idiprofesor` (`idiprofesor`) USING BTREE,
  ADD KEY `idialumno` (`idialumno`) USING BTREE;

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`idicampus`) USING BTREE;

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idicarrera`) USING BTREE,
  ADD KEY `idicampus` (`idicampus`) USING BTREE,
  ADD KEY `NivelId` (`NivelId`) USING BTREE,
  ADD KEY `idinotification` (`idinotification`);

--
-- Indices de la tabla `cAulas`
--
ALTER TABLE `cAulas`
  ADD PRIMARY KEY (`AulaId`) USING BTREE,
  ADD KEY `FkCampus` (`idicampus`) USING BTREE;

--
-- Indices de la tabla `cDocumentos`
--
ALTER TABLE `cDocumentos`
  ADD PRIMARY KEY (`ididocumento`) USING BTREE;

--
-- Indices de la tabla `cDocumentosGenerales`
--
ALTER TABLE `cDocumentosGenerales`
  ADD PRIMARY KEY (`ididocgral`),
  ADD KEY `ididocumento` (`ididocumento`),
  ADD KEY `idigenerales` (`idigenerales`);

--
-- Indices de la tabla `cDocumentosProfe`
--
ALTER TABLE `cDocumentosProfe`
  ADD PRIMARY KEY (`DocumentoProfeId`) USING BTREE,
  ADD KEY `DocumentoSolicitadoId` (`DocumentoSolicitadoId`) USING BTREE,
  ADD KEY `idiprofesor` (`idiprofesor`) USING BTREE;

--
-- Indices de la tabla `cGrados`
--
ALTER TABLE `cGrados`
  ADD PRIMARY KEY (`GradosId`) USING BTREE,
  ADD KEY `NivelId` (`NivelId`);

--
-- Indices de la tabla `cHorasHorario`
--
ALTER TABLE `cHorasHorario`
  ADD PRIMARY KEY (`HoraHorarioId`) USING BTREE,
  ADD KEY `horas_ibfk_1` (`TurnoId`) USING BTREE,
  ADD KEY `idicarrera` (`idicarrera`) USING BTREE;

--
-- Indices de la tabla `cliclo`
--
ALTER TABLE `cliclo`
  ADD PRIMARY KEY (`idiciclo`) USING BTREE,
  ADD KEY `NivelId` (`NivelId`),
  ADD KEY `PlantelId` (`PlantelId`);

--
-- Indices de la tabla `cMedioContacto`
--
ALTER TABLE `cMedioContacto`
  ADD PRIMARY KEY (`idimedio`) USING BTREE;

--
-- Indices de la tabla `cModalidadCiclos`
--
ALTER TABLE `cModalidadCiclos`
  ADD PRIMARY KEY (`ModalidadId`) USING BTREE;

--
-- Indices de la tabla `cNiveles`
--
ALTER TABLE `cNiveles`
  ADD PRIMARY KEY (`NivelId`) USING BTREE;

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`idicredencial`) USING BTREE,
  ADD KEY `idialumno` (`idialumno`);

--
-- Indices de la tabla `cSituacion`
--
ALTER TABLE `cSituacion`
  ADD PRIMARY KEY (`SituacionId`) USING BTREE;

--
-- Indices de la tabla `cTipoEvaluacionPeriodo`
--
ALTER TABLE `cTipoEvaluacionPeriodo`
  ADD PRIMARY KEY (`TipoEvaluacionPeriodoId`) USING BTREE;

--
-- Indices de la tabla `cTurno`
--
ALTER TABLE `cTurno`
  ADD PRIMARY KEY (`TurnoId`) USING BTREE;

--
-- Indices de la tabla `cuatrimestre`
--
ALTER TABLE `cuatrimestre`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`idigenerales`) USING BTREE,
  ADD KEY `idimedio` (`idimedio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idifactura`) USING BTREE;

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `factura_emisor`
--
ALTER TABLE `factura_emisor`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `regimen` (`regimen_fiscal`) USING BTREE;

--
-- Indices de la tabla `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`idiforgot`) USING BTREE,
  ADD KEY `idigenerales` (`idigenerales`) USING BTREE;

--
-- Indices de la tabla `form_datos_generales`
--
ALTER TABLE `form_datos_generales`
  ADD PRIMARY KEY (`idiform`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idimatricula`) USING BTREE;

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`idinotification`) USING BTREE;

--
-- Indices de la tabla `notifications_events`
--
ALTER TABLE `notifications_events`
  ADD PRIMARY KEY (`idievent`) USING BTREE;

--
-- Indices de la tabla `notifications_targets`
--
ALTER TABLE `notifications_targets`
  ADD PRIMARY KEY (`iditarget`) USING BTREE,
  ADD KEY `idinotification` (`idinotification`) USING BTREE,
  ADD KEY `idigenerales` (`idigenerales`) USING BTREE,
  ADD KEY `idievent` (`idievent`) USING BTREE;

--
-- Indices de la tabla `oferta_form`
--
ALTER TABLE `oferta_form`
  ADD PRIMARY KEY (`idioferta`),
  ADD KEY `idicarrera` (`idicarrera`),
  ADD KEY `idiform` (`idiform`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idipago`) USING BTREE,
  ADD KEY `idiventa` (`idiventa`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idipermiso`) USING BTREE;

--
-- Indices de la tabla `plan_pago`
--
ALTER TABLE `plan_pago`
  ADD PRIMARY KEY (`idiplan`) USING BTREE;

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idiprofesor`) USING BTREE,
  ADD KEY `idicampus` (`idicampus`) USING BTREE;

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idirole`) USING BTREE;

--
-- Indices de la tabla `role_as_permiso`
--
ALTER TABLE `role_as_permiso`
  ADD PRIMARY KEY (`idirol_permiso`) USING BTREE,
  ADD KEY `idirole` (`idirole`) USING BTREE,
  ADD KEY `idipermiso` (`idipermiso`) USING BTREE;

--
-- Indices de la tabla `sat_claveprodserv`
--
ALTER TABLE `sat_claveprodserv`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sat_claveunidad`
--
ALTER TABLE `sat_claveunidad`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sat_formapago`
--
ALTER TABLE `sat_formapago`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sat_metodopago`
--
ALTER TABLE `sat_metodopago`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sat_regimenfiscal`
--
ALTER TABLE `sat_regimenfiscal`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `sat_usocfdi`
--
ALTER TABLE `sat_usocfdi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idiservicio`) USING BTREE;

--
-- Indices de la tabla `tbAlumnoGrupo`
--
ALTER TABLE `tbAlumnoGrupo`
  ADD PRIMARY KEY (`AlumnoGruposId`) USING BTREE,
  ADD KEY `idialumno` (`idialumno`),
  ADD KEY `GrupoId` (`GrupoId`);

--
-- Indices de la tabla `tbBitacoraAcceso`
--
ALTER TABLE `tbBitacoraAcceso`
  ADD PRIMARY KEY (`idibitacora`) USING BTREE,
  ADD KEY `idiusuario` (`idiusuario`) USING BTREE;

--
-- Indices de la tabla `tbBloques`
--
ALTER TABLE `tbBloques`
  ADD PRIMARY KEY (`BloqueId`) USING BTREE,
  ADD KEY `CicloId` (`CicloId`) USING BTREE;

--
-- Indices de la tabla `tbButtonPyament`
--
ALTER TABLE `tbButtonPyament`
  ADD PRIMARY KEY (`idibutton`),
  ADD KEY `idiservicio` (`idiservicio`);

--
-- Indices de la tabla `tbCalificaciones`
--
ALTER TABLE `tbCalificaciones`
  ADD PRIMARY KEY (`CalificacionId`) USING BTREE,
  ADD KEY `CarreraId` (`CarreraId`),
  ADD KEY `GrupoId` (`GrupoId`),
  ADD KEY `MateriaId` (`MateriaId`),
  ADD KEY `CicloId` (`CicloId`),
  ADD KEY `PeriodoId` (`PeriodoId`),
  ADD KEY `AlumnoId` (`AlumnoId`);

--
-- Indices de la tabla `tbCiclos`
--
ALTER TABLE `tbCiclos`
  ADD PRIMARY KEY (`CicloId`) USING BTREE,
  ADD KEY `fkPlantel` (`PlantelId`) USING BTREE,
  ADD KEY `fkModalidad` (`ModalidadId`) USING BTREE,
  ADD KEY `fkSituacion` (`SituacionCicloId`) USING BTREE,
  ADD KEY `deNivelFk` (`NivelId`) USING BTREE;

--
-- Indices de la tabla `tbconfig`
--
ALTER TABLE `tbconfig`
  ADD PRIMARY KEY (`idiconfig`) USING BTREE,
  ADD KEY `idifactura` (`idifactura`) USING BTREE;

--
-- Indices de la tabla `tbCustomForm`
--
ALTER TABLE `tbCustomForm`
  ADD PRIMARY KEY (`idicustomform`);

--
-- Indices de la tabla `tbCustomFormContent`
--
ALTER TABLE `tbCustomFormContent`
  ADD PRIMARY KEY (`idcustomformcontent`),
  ADD KEY `tbCustomForm` (`idicustomform`),
  ADD KEY `idigenerales` (`idigenerales`);

--
-- Indices de la tabla `tbCustomFormInputs`
--
ALTER TABLE `tbCustomFormInputs`
  ADD PRIMARY KEY (`idicustomimput`),
  ADD KEY `idicustomform` (`idicustomform`);

--
-- Indices de la tabla `tbGrupos`
--
ALTER TABLE `tbGrupos`
  ADD PRIMARY KEY (`GrupoId`) USING BTREE,
  ADD KEY `idicarrera` (`idicarrera`),
  ADD KEY `idiciclo` (`idiciclo`),
  ADD KEY `GradosId` (`GradosId`),
  ADD KEY `TurnoId` (`TurnoId`);

--
-- Indices de la tabla `tbHorarioGrupo`
--
ALTER TABLE `tbHorarioGrupo`
  ADD PRIMARY KEY (`HorarioGrupoId`) USING BTREE,
  ADD KEY `GrupoId` (`GrupoId`),
  ADD KEY `HorarioId` (`HorarioId`);

--
-- Indices de la tabla `tbMaterias`
--
ALTER TABLE `tbMaterias`
  ADD PRIMARY KEY (`MateriaId`) USING BTREE,
  ADD KEY `idicarrera` (`idicarrera`),
  ADD KEY `GradosId` (`GradosId`);

--
-- Indices de la tabla `tbPeriodo`
--
ALTER TABLE `tbPeriodo`
  ADD PRIMARY KEY (`PeriodoId`) USING BTREE,
  ADD KEY `GrupoId` (`GrupoId`) USING BTREE,
  ADD KEY `MateriaId` (`MateriaId`) USING BTREE,
  ADD KEY `TipoEvaluacionId` (`TipoEvaluacionId`) USING BTREE,
  ADD KEY `BloqueId` (`BloqueId`) USING BTREE,
  ADD KEY `CicloId` (`CicloId`) USING BTREE;

--
-- Indices de la tabla `tbProfesoresGrupos`
--
ALTER TABLE `tbProfesoresGrupos`
  ADD PRIMARY KEY (`ProfesoresGruposId`) USING BTREE,
  ADD KEY `GrupoId` (`GrupoId`) USING BTREE,
  ADD KEY `MateriaId` (`MateriaId`) USING BTREE,
  ADD KEY `ProfesoresId` (`ProfesoresId`) USING BTREE;

--
-- Indices de la tabla `tbregistro_generales`
--
ALTER TABLE `tbregistro_generales`
  ADD PRIMARY KEY (`idiregistro`) USING BTREE,
  ADD KEY `idiregistromotivo` (`idiregistromotivo`) USING BTREE,
  ADD KEY `tbregistro_generales_ibfk_2` (`idigenerales`) USING BTREE,
  ADD KEY `idicampus` (`idicampus`) USING BTREE;

--
-- Indices de la tabla `tbregistro_motivo`
--
ALTER TABLE `tbregistro_motivo`
  ADD PRIMARY KEY (`idiregistromotivo`) USING BTREE;

--
-- Indices de la tabla `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idiuser`) USING BTREE,
  ADD KEY `idigenerales` (`idigenerales`),
  ADD KEY `idirole` (`idirole`),
  ADD KEY `idiconfig` (`idiconfig`),
  ADD KEY `idicampus` (`idicampus`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`iditutor`) USING BTREE,
  ADD KEY `idialumno` (`idialumno`) USING BTREE;

--
-- Indices de la tabla `vencimiento`
--
ALTER TABLE `vencimiento`
  ADD PRIMARY KEY (`idivencimiento`) USING BTREE,
  ADD KEY `idiplan` (`idiplan`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idiventa`) USING BTREE;

--
-- Indices de la tabla `venta_as_servicio`
--
ALTER TABLE `venta_as_servicio`
  ADD PRIMARY KEY (`idiventa_as_servicio`) USING BTREE,
  ADD KEY `venta_as_servicio_ibfk_2` (`idiservicio`) USING BTREE,
  ADD KEY `idialumno` (`idialumno`),
  ADD KEY `idiventa` (`idiventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idialumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `alumnoReporte`
--
ALTER TABLE `alumnoReporte`
  MODIFY `idiAlumnoReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `idicampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idicarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cAulas`
--
ALTER TABLE `cAulas`
  MODIFY `AulaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cDocumentos`
--
ALTER TABLE `cDocumentos`
  MODIFY `ididocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cDocumentosGenerales`
--
ALTER TABLE `cDocumentosGenerales`
  MODIFY `ididocgral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cDocumentosProfe`
--
ALTER TABLE `cDocumentosProfe`
  MODIFY `DocumentoProfeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cGrados`
--
ALTER TABLE `cGrados`
  MODIFY `GradosId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cHorasHorario`
--
ALTER TABLE `cHorasHorario`
  MODIFY `HoraHorarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cliclo`
--
ALTER TABLE `cliclo`
  MODIFY `idiciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cMedioContacto`
--
ALTER TABLE `cMedioContacto`
  MODIFY `idimedio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cNiveles`
--
ALTER TABLE `cNiveles`
  MODIFY `NivelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `credencial`
--
ALTER TABLE `credencial`
  MODIFY `idicredencial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `cSituacion`
--
ALTER TABLE `cSituacion`
  MODIFY `SituacionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cTipoEvaluacionPeriodo`
--
ALTER TABLE `cTipoEvaluacionPeriodo`
  MODIFY `TipoEvaluacionPeriodoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cTurno`
--
ALTER TABLE `cTurno`
  MODIFY `TurnoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuatrimestre`
--
ALTER TABLE `cuatrimestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `idigenerales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idifactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_emisor`
--
ALTER TABLE `factura_emisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `idiforgot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `form_datos_generales`
--
ALTER TABLE `form_datos_generales`
  MODIFY `idiform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idimatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `idinotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `notifications_events`
--
ALTER TABLE `notifications_events`
  MODIFY `idievent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notifications_targets`
--
ALTER TABLE `notifications_targets`
  MODIFY `iditarget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oferta_form`
--
ALTER TABLE `oferta_form`
  MODIFY `idioferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idipago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idipermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `plan_pago`
--
ALTER TABLE `plan_pago`
  MODIFY `idiplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idiprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `idirole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `role_as_permiso`
--
ALTER TABLE `role_as_permiso`
  MODIFY `idirol_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT de la tabla `sat_claveprodserv`
--
ALTER TABLE `sat_claveprodserv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52840;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idiservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbAlumnoGrupo`
--
ALTER TABLE `tbAlumnoGrupo`
  MODIFY `AlumnoGruposId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbBitacoraAcceso`
--
ALTER TABLE `tbBitacoraAcceso`
  MODIFY `idibitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbButtonPyament`
--
ALTER TABLE `tbButtonPyament`
  MODIFY `idibutton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbCalificaciones`
--
ALTER TABLE `tbCalificaciones`
  MODIFY `CalificacionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbconfig`
--
ALTER TABLE `tbconfig`
  MODIFY `idiconfig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbCustomForm`
--
ALTER TABLE `tbCustomForm`
  MODIFY `idicustomform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbCustomFormContent`
--
ALTER TABLE `tbCustomFormContent`
  MODIFY `idcustomformcontent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbCustomFormInputs`
--
ALTER TABLE `tbCustomFormInputs`
  MODIFY `idicustomimput` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbGrupos`
--
ALTER TABLE `tbGrupos`
  MODIFY `GrupoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbHorarioGrupo`
--
ALTER TABLE `tbHorarioGrupo`
  MODIFY `HorarioGrupoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `tbMaterias`
--
ALTER TABLE `tbMaterias`
  MODIFY `MateriaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `tbPeriodo`
--
ALTER TABLE `tbPeriodo`
  MODIFY `PeriodoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbProfesoresGrupos`
--
ALTER TABLE `tbProfesoresGrupos`
  MODIFY `ProfesoresGruposId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbregistro_generales`
--
ALTER TABLE `tbregistro_generales`
  MODIFY `idiregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `tbregistro_motivo`
--
ALTER TABLE `tbregistro_motivo`
  MODIFY `idiregistromotivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idiuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `iditutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `vencimiento`
--
ALTER TABLE `vencimiento`
  MODIFY `idivencimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idiventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `venta_as_servicio`
--
ALTER TABLE `venta_as_servicio`
  MODIFY `idiventa_as_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idicarrera`) REFERENCES `carrera` (`idicarrera`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`TurnoId`) REFERENCES `cTurno` (`TurnoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkDatosGrale` FOREIGN KEY (`idigenerales`) REFERENCES `datos_generales` (`idigenerales`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnoReporte`
--
ALTER TABLE `alumnoReporte`
  ADD CONSTRAINT `alumnoReporte_ibfk_1` FOREIGN KEY (`idiciclo`) REFERENCES `cliclo` (`idiciclo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnoReporte_ibfk_2` FOREIGN KEY (`idiprofesor`) REFERENCES `profesor` (`idiprofesor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnoReporte_ibfk_3` FOREIGN KEY (`idialumno`) REFERENCES `alumno` (`idialumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`idicampus`) REFERENCES `campus` (`idicampus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrera_ibfk_2` FOREIGN KEY (`NivelId`) REFERENCES `cNiveles` (`NivelId`),
  ADD CONSTRAINT `carrera_ibfk_3` FOREIGN KEY (`idinotification`) REFERENCES `notifications` (`idinotification`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cDocumentosGenerales`
--
ALTER TABLE `cDocumentosGenerales`
  ADD CONSTRAINT `cDocumentosGenerales_ibfk_1` FOREIGN KEY (`ididocumento`) REFERENCES `cDocumentos` (`ididocumento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cDocumentosGenerales_ibfk_2` FOREIGN KEY (`idigenerales`) REFERENCES `datos_generales` (`idigenerales`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cGrados`
--
ALTER TABLE `cGrados`
  ADD CONSTRAINT `cGrados_ibfk_1` FOREIGN KEY (`NivelId`) REFERENCES `cNiveles` (`NivelId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliclo`
--
ALTER TABLE `cliclo`
  ADD CONSTRAINT `cliclo_ibfk_1` FOREIGN KEY (`NivelId`) REFERENCES `cNiveles` (`NivelId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliclo_ibfk_2` FOREIGN KEY (`PlantelId`) REFERENCES `campus` (`idicampus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD CONSTRAINT `credencial_ibfk_1` FOREIGN KEY (`idialumno`) REFERENCES `alumno` (`idialumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD CONSTRAINT `datos_generales_ibfk_1` FOREIGN KEY (`idimedio`) REFERENCES `cMedioContacto` (`idimedio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notifications_targets`
--
ALTER TABLE `notifications_targets`
  ADD CONSTRAINT `notifications_targets_ibfk_1` FOREIGN KEY (`idinotification`) REFERENCES `notifications` (`idinotification`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_targets_ibfk_2` FOREIGN KEY (`idigenerales`) REFERENCES `datos_generales` (`idigenerales`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_targets_ibfk_3` FOREIGN KEY (`idievent`) REFERENCES `notifications_events` (`idievent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oferta_form`
--
ALTER TABLE `oferta_form`
  ADD CONSTRAINT `oferta_form_ibfk_1` FOREIGN KEY (`idicarrera`) REFERENCES `carrera` (`idicarrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oferta_form_ibfk_2` FOREIGN KEY (`idiform`) REFERENCES `form_datos_generales` (`idiform`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idiventa`) REFERENCES `venta` (`idiventa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbAlumnoGrupo`
--
ALTER TABLE `tbAlumnoGrupo`
  ADD CONSTRAINT `tbAlumnoGrupo_ibfk_1` FOREIGN KEY (`idialumno`) REFERENCES `alumno` (`idialumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbAlumnoGrupo_ibfk_2` FOREIGN KEY (`GrupoId`) REFERENCES `tbGrupos` (`GrupoId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbButtonPyament`
--
ALTER TABLE `tbButtonPyament`
  ADD CONSTRAINT `tbButtonPyament_ibfk_1` FOREIGN KEY (`idiservicio`) REFERENCES `servicios` (`idiservicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbCalificaciones`
--
ALTER TABLE `tbCalificaciones`
  ADD CONSTRAINT `tbCalificaciones_ibfk_1` FOREIGN KEY (`CarreraId`) REFERENCES `carrera` (`idicarrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbCalificaciones_ibfk_2` FOREIGN KEY (`GrupoId`) REFERENCES `tbGrupos` (`GrupoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbCalificaciones_ibfk_3` FOREIGN KEY (`MateriaId`) REFERENCES `tbMaterias` (`MateriaId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbCalificaciones_ibfk_4` FOREIGN KEY (`CicloId`) REFERENCES `cliclo` (`idiciclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbCalificaciones_ibfk_5` FOREIGN KEY (`PeriodoId`) REFERENCES `tbPeriodo` (`PeriodoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbCalificaciones_ibfk_6` FOREIGN KEY (`AlumnoId`) REFERENCES `alumno` (`idialumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbCustomFormContent`
--
ALTER TABLE `tbCustomFormContent`
  ADD CONSTRAINT `tbCustomFormContent_ibfk_1` FOREIGN KEY (`idicustomform`) REFERENCES `tbCustomForm` (`idicustomform`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbCustomFormContent_ibfk_2` FOREIGN KEY (`idigenerales`) REFERENCES `datos_generales` (`idigenerales`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbCustomFormInputs`
--
ALTER TABLE `tbCustomFormInputs`
  ADD CONSTRAINT `tbCustomFormInputs_ibfk_1` FOREIGN KEY (`idicustomform`) REFERENCES `tbCustomForm` (`idicustomform`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbGrupos`
--
ALTER TABLE `tbGrupos`
  ADD CONSTRAINT `tbGrupos_ibfk_1` FOREIGN KEY (`idicarrera`) REFERENCES `carrera` (`idicarrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbGrupos_ibfk_2` FOREIGN KEY (`idiciclo`) REFERENCES `cliclo` (`idiciclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbGrupos_ibfk_3` FOREIGN KEY (`GradosId`) REFERENCES `cGrados` (`GradosId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbGrupos_ibfk_4` FOREIGN KEY (`TurnoId`) REFERENCES `cTurno` (`TurnoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbHorarioGrupo`
--
ALTER TABLE `tbHorarioGrupo`
  ADD CONSTRAINT `tbHorarioGrupo_ibfk_1` FOREIGN KEY (`GrupoId`) REFERENCES `tbGrupos` (`GrupoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbHorarioGrupo_ibfk_2` FOREIGN KEY (`HorarioId`) REFERENCES `cHorasHorario` (`HoraHorarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbMaterias`
--
ALTER TABLE `tbMaterias`
  ADD CONSTRAINT `tbMaterias_ibfk_1` FOREIGN KEY (`idicarrera`) REFERENCES `carrera` (`idicarrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbMaterias_ibfk_2` FOREIGN KEY (`GradosId`) REFERENCES `cGrados` (`GradosId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbregistro_generales`
--
ALTER TABLE `tbregistro_generales`
  ADD CONSTRAINT `tbregistro_generales_ibfk_3` FOREIGN KEY (`idicampus`) REFERENCES `campus` (`idicampus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbuser`
--
ALTER TABLE `tbuser`
  ADD CONSTRAINT `tbuser_ibfk_1` FOREIGN KEY (`idigenerales`) REFERENCES `datos_generales` (`idigenerales`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbuser_ibfk_2` FOREIGN KEY (`idirole`) REFERENCES `role` (`idirole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbuser_ibfk_3` FOREIGN KEY (`idiconfig`) REFERENCES `tbconfig` (`idiconfig`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbuser_ibfk_4` FOREIGN KEY (`idicampus`) REFERENCES `campus` (`idicampus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vencimiento`
--
ALTER TABLE `vencimiento`
  ADD CONSTRAINT `vencimiento_ibfk_1` FOREIGN KEY (`idiplan`) REFERENCES `plan_pago` (`idiplan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_as_servicio`
--
ALTER TABLE `venta_as_servicio`
  ADD CONSTRAINT `venta_as_servicio_ibfk_1` FOREIGN KEY (`idiservicio`) REFERENCES `servicios` (`idiservicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_as_servicio_ibfk_2` FOREIGN KEY (`idialumno`) REFERENCES `alumno` (`idialumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_as_servicio_ibfk_3` FOREIGN KEY (`idiventa`) REFERENCES `venta` (`idiventa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
