
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE DATABASE IF NOT EXISTS clean_db;

CREATE USER IF NOT EXISTS 'phpappuser'@'%' IDENTIFIED BY 'phpapppassword';
GRANT ALL PRIVILEGES ON clean_db.* TO 'phpappuser'@'%';


USE clean_db;



--`
-- Base de datos: `clean_db`
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
values (NEW.idigenerales, 2, NEW.matricula, 'general');


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

INSERT INTO `campus` (`idicampus`, `campus`, `clave`) VALUES 
(1, 'Campus0', 'C0');

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

INSERT INTO `cMedioContacto` (idimedio, medio) VALUES (1, 'Google');


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

INSERT INTO `datos_generales` (idigenerales, nombre, apellido_paterno, apellido_materno, email, telefono) VALUES 
(4, 'Root', 'Super', 'Admin', 'v.gonzalez@nubelity.com', '+15123795244');

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

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (1, 0, 0, 'Nombre', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" >
                                                        <input type="hidden" class="form-control" id="estatus" name="estatus" value="pre-inscrito">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (2, 0, 0, 'Apellido paterno', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="apellido_paterno">Apellido paterno</label>
                                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140" >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (3, 0, 0, 'Apellido materno', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="apellido_materno">Apellido materno</label>
                                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140" required >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (4, 0, 0, 'Correo electrónico', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="email">Correo electrónico</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (5, 0, 0, '¿Cuál es tu fecha de nacimiento?', '<div class="col-sm-12">
<div class="form-group">
                                                <label for="edad" class="text-primary">¿Cuál es tu fecha de nacimiento?</label>
                                                <input type="date" max="2002-12-31" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter edad" required>
                                                <input type="hidden" class="form-control" id="edad" name="edad" placeholder="Enter edad" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
</div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (6, 0, 0, 'Género', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="genero">Género</label>
                                                        <select class="form-control" id="genero" name="genero" placeholder="Ingrese genero" required>
                                                            <option value="">Seleccione genero</option>
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (7, 0, 0, 'CURP', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="curp">CURP</label>
                                                        <input type="text" class="form-control" id="curp" name="curp" placeholder="Opcional" maxlength="20" oninput="validarInput(this)" style="text-transform: uppercase" required>
                                                        <pre id="resultado"></pre>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (8, 0, 0, 'RFC', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="rfc">RFC</label>
                                                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Opcional" maxlength="20" style="text-transform: uppercase" >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (9, 0, 0, 'Número seguridad social', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nss">Número seguridad social</label>
                                                        <input type="text" class="form-control" id="nss" name="nss" placeholder="Ingrese nss" style="text-transform: uppercase" >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (10, 0, 0, 'Tipo de sangre', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="tiposangre">Tipo de sangre</label>
                                                        <input type="text" class="form-control" id="tiposangre" name="tiposangre" placeholder="Ingrese tipo de sangre" maxlength="15" style="text-transform: uppercase">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (11, 0, 0, 'Alergias', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="alergias">Alergias</label>
                                                    <input type="text" class="form-control" id="alergias" name="alergias" placeholder="Ingrese alergias" maxlength="200">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Datos personales', '2020-10-16 09:53:27');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (12, 0, 0, 'Teléfono emergencias', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="emergencias">Teléfono emergencias</label>
                                                    <input type="text" class="form-control" id="emergencias" name="emergencias" placeholder="Enter emergencias">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Datos de contacto', '2020-10-16 09:55:17');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (13, 0, 0, 'Teléfono fijo', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono fijo</label>
                                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono" maxlength="20" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos de contacto', '2020-10-16 09:55:17');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (14, 0, 0, 'Teléfono Móvil', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="movil">Teléfono Móvil</label>
                                                        <input type="tel" class="form-control" id="movil" name="movil" placeholder="Ingrese movil" maxlength="20" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos de contacto', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (15, 0, 0, 'Correo alterno', '<div class="col-sm-12">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="email2">Correo alterno</label>
                                                        <input type="email" class="form-control" id="email2" name="email2" placeholder="Ingrese email2" maxlength="140">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>', 'Datos de contacto', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (16, 0, 0, 'Dirección (Calle y número)', '<div class="col-sm-12">
                                                <label for="Dirección">Dirección (Calle y número)</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control col-sm-2" placeholder="#" name="num" id="street_number">
                                                    <input type="text" class="form-control" id="route" name="direccion" disabled="true">
                                                </div>
                                            </div>', 'Dirección', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (17, 0, 0, 'Ciudad', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ciudad">Ciudad</label>
                                                    <input type="text" class="form-control" id="locality" name="ciudad" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Dirección', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (18, 0, 0, 'Estado', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="estado">Estado</label>
                                                    <input type="text" class="form-control" id="administrative_area_level_1" name="municipio" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Dirección', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (19, 0, 0, 'Código postal', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="cp">Código postal</label>
                                                    <input type="text" class="form-control" id="postal_code" name="cp" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Dirección', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (20, 0, 0, 'País', '<div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="pais">País</label>
                                                    <input type="text" class="form-control" id="country" name="pais" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>', 'Dirección', '2020-10-16 09:59:39');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (21, 0, 0, 'Escuela de egreso', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="escegreso">Escuela de egreso</label>
                                                        <input type="text" class="form-control" id="escegreso" name="escegreso" placeholder="Ingrese Escuela de egreso" maxlength="140" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos escolares', '2020-10-16 10:02:11');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (22, 0, 0, '¿Cuál es tu último grado de estudio?', '<div class="form-group">
                                                <label for="nivelegreso" class="text-primary">¿Cuál es tu último grado de estudio?</label>
                                                <select class="form-control" id="nivelegreso" name="nivelegreso" placeholder="Escriba  nivel de egreso" required>
                                                    <option value="">Selecciona uno</option>
                                                    <option value="Educación Básica">Educación Básica</option>
                                                    <option value="Medio Superior">Medio Superior</option>
                                                    <option value="Licenciatura">Licenciatura</option>
                                                    <option value="Maestría">Maestría</option>
                                                    <option value="Doctorado">Doctorado</option>
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>', 'Datos escolares', '2020-10-16 10:02:11');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (23, 0, 0, 'Año de egreso', '<div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="fechaegreso">Año de egreso</label>
                                                        <input type="number" class="form-control" id="fechaegreso" name="fechaegreso" placeholder="Ingrese año de egreso" required="">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>', 'Datos escolares', '2020-10-16 10:02:11');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (24, 0, 0, 'Información Adicional', '<div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="infoadicional">Información Adicional</label>
                                                <textarea class="form-control" rows="2" id="infoadicional" name="infoadicional" placeholder="Ingrese Info Adicional" maxlength="200"></textarea>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>', 'Datos escolares', '2020-10-16 10:02:11');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (25, 0, 0, 'Comentarios', '<div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="comment" class="text-primary">Comentarios:</label>
                                                <textarea class="form-control" rows="5" id="comentarios" name="comentarios" placeholder="puede sugerir horario de llamada, o agregar alguna solicitud particular."></textarea>
                                            </div>
                                        </div>', 'Datos escolares', '2020-10-16 10:02:11');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (26, 0, 0, '¿Cómo te enteraste de la oferta?', '<div class="col-sm-12">
<div class="form-group">
                                                <label for="medio" class="text-primary">¿Cómo te enteraste de la oferta?</label>
                                                <div id="cMedioContacto" class="cMedioContacto"></div>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
</div>', 'Experiencia profesional', '2020-10-16 20:03:30');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (27, 0, 0, 'Información adicional', '<div class="col-sm-12">
<div class="form-group">
                                                <label for="infoadicional" class="text-primary">Información adicional</label>
                                                <input type="number" min="0" max="99" class="form-control" id="infoadicional" name="infoadicional" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div></div>', 'Experiencia profesional', '2020-10-16 20:03:30');

INSERT INTO `form_datos_generales` (`idiform`, `deleted`, `suspended`, `name`, `description`, `category`, `created`) VALUES (28, 0, 0, '¿Cuál es tu estado civil?', '<div class="form-group">
<label for="estado_civil" class="text-primary">¿Cuál es tu estado civil?</label>
<select class="form-control" id="estado_civil" name="estado_civil" title="selecciona tu estado civil" required>
<option value="">Selecciona uno</option>
<option value="Sin especificar">Sin especificar</option>
<option value="Soltero / a">Soltero / a</option>
<option value="Casado / a">Casado / a</option>
<option value="Unión libre o unión de hecho">Unión libre o unión de hecho</option>
<option value="Separado / a">Separado / a</option>
<option value="Viudo / a">Viudo / a</option>
</select>
<div class="help-block with-errors text-danger"></div>
</div>', 'Datos personales', '2020-10-28 16:21:40');



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
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idipermiso`, `showInMenu`, `icon`, `icon_color`, `descripcion`, `btnBack`, `resumen`, `permiso`, `categoria`, `fecha`) VALUES
(1, 'Si', 'pe-7s-study', 'bg-c-pink', 'Becas', 'menu.php', 'Seleccione un alumno de la lista para otorgarle una beca', 'core_gerencia_Becas.php', 'Gerencia', '2020-02-05 11:01:26'),
(2, 'Si', 'pe-7s-study', 'bg-c-pink', 'Convalidación ', 'core_alumnos_getAlumnos.php', 'Escriba la matrícula de un estudiante para convalidar materias', 'core_alumnos_revalidacion.php', 'Gerencia', '2020-02-05 11:02:01'),
(3, 'Si', 'icofont icofont-school-bag card1-icon', 'bg-c-pink', 'Re inscripciones', 'core_alumnos_getAlumnos.php', 'Seleccione un alumno de la lista', 'core_alumnos_reincripcion.php', 'Alumnos', '2020-02-05 11:03:37'),
(4, 'Si', 'icofont icofont-school-bag', 'bg-c-green', 'Nuevo Ingreso', 'core_alumnos_getAlumnos.php', 'Seleccione un aspirante', 'core_alumno_addAlumno.php', 'Alumnos', '2020-02-05 11:03:37'),
(5, 'Si', 'icofont icofont-school-bag', 'bg-c-blue', 'Alumnos', 'menu.php', 'Seleccione un alumno de la lista para editar las preferencias', 'core_alumnos_getAlumnos.php', 'Alumnos', '2020-02-05 11:04:22'),
(6, 'Si', 'icofont icofont-group-students card1-icon', 'bg-c-blue', 'Aspirantes', 'menu.php', 'Seleccione un aspirante de la lista para editar las preferencias', 'getDatosGenerales.php', 'Admisión', '2020-02-05 11:05:44'),
(7, 'Si', 'icofont icofont-group-students card1-icon', 'bg-c-green', 'Nuevo Aspirante', 'getDatosGenerales.php', 'Llene los campos que se solicitan', 'addgenerales.php', 'Admisión', '2020-02-05 11:05:44'),
(8, 'Si', 'pe-7s-piggy', 'bg-c-yellow', 'Cobrar colegiaturas', 'menu.php', 'En este módulo, usted podrá ver los adeudos y cobrar las colegiaturas de los estudiantes', 'cobro.php', 'Servicios', '2020-02-05 11:08:19'),
(9, 'Si', 'fa fa-shopping-bag', 'bg-c-yellow', 'Tienda escolar', 'menu.php', 'En este módulo, usted podrá cobrar servicios adicionales a los estudiante.', 'cobro_otros.php', 'Servicios', '2020-02-05 11:08:19'),
(10, 'Si', 'fa fa-file-pdf', 'bg-c-green', 'Facturación', 'menu.php', 'En este módulo, usted podrá ver los pagos o parcialidades realizadas. Así como reimprimir el ticket y facturar', 'getCobros.php', 'Servicios', '2020-02-05 11:08:19'),
(11, 'Si', 'pe-7s-date', 'bg-c-yellow', 'Planes de pago', 'menu.php', 'En este módulo, usted podrá organizar los planes de pago vigentes para los estudiantes\r\n', 'core_gerencia_planPagos.php', 'Servicios', '2020-02-05 11:08:19'),
(12, 'Si', 'fa fa-signal', 'bg-c-yellow', 'Ciclos escolares', 'menu.php', 'En este módulo, usted podrá configurar los ciclos escolares de su organización ', 'core_gerencia_getClicloEscolar.php', 'Control escolar', '2020-02-05 11:25:11'),
(13, 'Si', 'icofont icofont-school-bag', 'bg-c-lite-green', 'Grupos', 'menu.php', 'En este módulo, usted podrá configurar los grupos', 'core_escolares_grupo.php', 'Control escolar', '2020-02-05 11:25:11'),
(14, 'Si', 'ti-stats-up', 'bg-dribble', 'Reportes de caja', 'menu.php', 'En este módulo, usted podrá consultar los reportes de ingresos por rango de dias  ', 'core_gerencia_reporte_caja.php', 'Reportes', '2020-02-05 11:25:40'),
(15, 'Si', 'fa fa-shopping-bag', 'bg-c-pink', 'Servicios', 'menu.php', 'En este módulo, usted podrá consultar los servicios que ofrece su institución ', 'core_gerencia_getServicios.php', 'Catálogos', '2020-02-05 11:29:26'),
(16, 'Si', 'fa fa-chalkboard-teacher', 'bg-c-green', 'Aulas', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de aulas de su organización ', 'core_escolares_aulas.php', 'Catálogo_Escolares', '2020-02-05 11:29:26'),
(17, 'Si', 'fa fa-university', 'bg-c-lite-green', 'Campus', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de campus de su organización ', 'core_campus_getCampus.php', 'Planes de estudio', '2020-02-05 11:31:09'),
(18, 'Si', 'pe-7s-wristwatch', 'bg-c-yellow', 'Horarios', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de horarios en el cual se imparten las clases en su organización ', 'core_escolares_horario.php', 'Catálogo_Escolares', '2020-02-05 11:31:09'),
(19, 'Si', 'pe pe-7s-sun', 'bg-c-yellow', 'Turnos', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de turnos en el cual se imparten las clases en su organización ', 'core_cTurno_getcTurno.php', 'Catálogo_Escolares', '2020-02-05 11:31:48'),
(20, 'No', 'fa fa-graduation-cap', 'bg-c-green', 'Ver plan de estudios', 'menu.php', 'En este módulo, usted podrá configurar los planes de estudio que ofrece su institución ', 'core_planes_estudio.php', 'Planes de estudio', '2020-02-05 11:33:36'),
(21, 'No', 'fa fa-book', 'bg-c-lite-green', 'Asignaturas', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de materias que se imparte en su organización ', 'core_planes_materias.php', 'Catálogo_Escolares', '2020-02-05 11:33:36'),
(22, 'Si', 'pe-7s-diamond pe', 'bg-c-green', 'Niveles de estudio', 'menu.php', 'En este módulo, usted podrá configurar los niveles de estudio que ofrece su institución ', 'core_cNiveles_getNiveles.php', 'Planes de estudio', '2020-02-05 11:34:49'),
(23, 'Si', 'fa fa-pen', 'bg-c-green', 'Asignaturas', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de materias de su organización ', 'core_planes_materias.php', 'Planes de estudio', '2020-02-05 11:34:49'),
(24, 'Si', 'fa fa-signal', 'bg-c-green', 'Grados', 'menu.php', 'En este módulo, usted podrá configurar el catalogo de grados de su organización ', 'core_cGrados_getcGrados.php', 'Planes de estudio', '2020-02-05 11:35:16'),
(25, 'Si', 'pe-7s-user', 'bg-c-blue', 'Ver profesores', 'menu.php', 'Seleccione un profesor de la lista para editar las preferencias', 'core_profesor_getProfesores.php', 'Profesores', '2020-02-05 11:36:32'),
(26, 'Si', 'pe-7s-add-user', 'bg-c-pink', 'Agregar profesor', 'core_profesor_getProfesores.php', 'Llene los campos que se solicitan', 'core_profesor_addprofesor.php', 'Profesores', '2020-02-05 11:36:32'),
(27, 'Si', 'pe-7s-tools', 'bg-c-orenge', 'Ajustes del sitio', 'menu.php', 'Puede actualizar la información de su organización', 'core_config_kambal.php', 'Configuración', '2020-02-05 11:37:21'),
(28, 'Si', 'pe-7s-date', 'bg-c-yellow', 'Roles y Permisos', 'menu.php', 'Puede permitir a las personas que tienen los roles de la izquierda acceder a los modulos de la columna de la derecha.                                Seleccione qué rol(es) puede(n) ser validado(s) por cada rol de la columna izquierda.          <br>                           Tenga en cuenta que estos ajustes sólo se aplican a los usuarios que tienen las capacidades  permitidas.', 'core_gerencia_role_as_permision.php', 'Configuración', '2020-02-05 11:37:50'),
(29, 'Si', 'pe-7s-user', 'bg-c-lite-green', 'Administrar usuarios', 'menu.php', 'Seleccione un usuario de la lista para editar las preferencias', 'core_gerencia_user_get.php', 'Configuración', '2020-02-05 11:38:49'),
(30, 'No', 'pe-7s-user', 'bg-c-lite-green', 'Agregar nuevo usuario', 'core_gerencia_user_get.php', 'Llene los campos que se solicitan', 'core_gerencia_user_add.php', 'Configuración', '2020-02-05 11:38:49'),
(31, 'No', 'fa fa-home', 'bg-c-lite-green', 'Menu', 'menu.php', '', 'menu.php', 'NA', '2020-02-05 11:40:34'),
(32, 'No', 'pe-7s-study', 'bg-c-blue', 'Alumnos', 'menu.php', 'Seleccione un alumno de la lista para editar preferencias', 'getAlumnos.php', 'NA', '2020-02-05 11:40:34'),
(33, 'No', 'icofont icofont-school-bag', 'bg-c-green', 'Kardex Alumno', 'core_alumnos_getAlumnos.php', '', 'updateAlumno.php', 'Alumnos', '2020-02-05 12:24:44'),
(34, 'No', 'pe-7s-cart', 'bg-c-pink', 'Cuentas por cobrar', 'cobro.php', 'En este módulo, usted podrá cobrar los pagos o parcialidades del estudiante', 'CxC2.php', 'Servicios', '2020-02-05 12:27:03'),
(35, 'No', 'pe pe-7s-sun', 'bg-c-yellow', 'Pago Referenciado', 'menu.php', '', 'core_referenced_payment.php', 'public_student', '2020-02-05 12:31:35'),
(36, 'No', 'icofont icofont-school-bag', 'bg-c-lite-green', 'Detalle de Grupo', 'menu.php', 'En este módulo, usted podrá configurar los grupos', 'core_escolares_getbAlumnoGrupo.php', 'Control escolar', '2020-02-05 12:34:47'),
(37, 'No', 'icofont icofont-group-students card1-icon', 'bg-c-yellow', 'Actualizar datos del aspirante', 'getDatosGenerales.php', 'Usted puede actualizar la información del aspirante', 'putgenerales.php', 'Admisión', '2020-02-05 12:40:33'),
(38, 'No', 'pe-7s-date pe', 'bg-c-lite-green', 'Nuevo ciclo escolar', 'core_gerencia_getClicloEscolar.php', 'Llene los campos que se solicitan', 'core_gerencia_addCicloEscolar.php', 'Control escolar', '2020-02-05 13:03:30'),
(39, 'No', 'fa fa-signal', 'bg-c-yellow', 'Actualizar ciclo escolar', 'core_gerencia_getClicloEscolar.php', 'Puede actualizar la información del ciclo escolar', 'core_gerencia_updateCicloEscolar.php', 'Control escolar', '2020-02-05 13:05:11'),
(40, 'No', 'pe-7s-pen', 'bg-c-yellow', 'Actualizar datos profesor', 'core_profesor_getProfesores.php', 'Puede actualizar la información del profesor', 'core_profesor_updateProfesor.php', 'Profesores', '2020-02-05 13:09:28'),
(41, 'No', 'pe-7s-user', 'bg-c-yellow', 'Actualizar datos del usuario', 'core_gerencia_user_get.php', 'Puede actualizar la información del uduario', 'core_gerencia_user_update.php', 'Configuración', '2020-02-05 13:21:13'),
(42, 'No', 'pe-7s-users', 'bg-c-yellow', 'Tablero del alumno', 'menu.php', '', 'core_public_student_dashboard.php', 'public_student', '2020-02-05 13:35:47'),
(43, 'Si', 'fa fa-shopping-bag ', 'bg-c-pink', 'Actualizar datos del servicio', 'core_gerencia_getServicios.php', 'Llene los campos que se solicitan', 'core_gerencia_updateServicio.php', 'Catálogo_Escolares', '2020-02-19 11:51:55'),
(44, 'No', 'fa fa-shopping-bag ', 'bg-c-pink', 'Actualizar datos del servicio', 'core_gerencia_getServicios.php', 'Llene los campos que se solicitan', 'core_gerencia_updateServicio.php', 'Catálogos', '2020-02-19 11:51:58'),
(45, 'Si', 'pe pe-7s-study', 'bg-c-blue', 'Oferta educativa', 'menu.php', 'Lista que muestra el detalle de la oferta académica de la organización', 'core_Carrera_addCarrera.php', 'Planes de estudio', '2020-03-10 11:14:04'),
(46, 'Si', 'pe pe-7s-date', 'bg-c-pink', 'Periodos de evaluación', 'menu.php', 'En este módulo, usted podrá configurar los periodos de evaluación organizados por el ciclo escolar', 'core_escolares_periodos_evaluacion.php', NULL, '2020-03-10 16:34:37'),
-- (49, 'Si', 'pe pe-7s-date', 'bg-c-pink', 'Periodos de evaluación', 'menu.php', 'En este módulo, usted podrá configurar los periodos de evaluación<br> necesarios para emitir las calificaciones de los estudiantes del ciclo en turno\r\n', 'core_escolares_periodos_evaluacion.php', 'Control escolar', '2020-03-10 16:34:37'),
(47, 'No', 'pe-7s-diamond pe', 'bg-c-green', 'Nuevo Nivel', 'core_cNiveles_getNiveles.php', 'Agregar nuevo Nivel de estudios', 'core_cNiveles_addcNiveles.php', 'Catálogo_Escolares', '2020-03-11 11:38:21'),
(48, 'No', 'pe-7s-diamond pe', 'bg-c-pink', 'Actualizar datos del Nivel', 'core_cNiveles_getNiveles.php', 'Llene los campos que se solicitan', 'core_cNiveles_updateNivel.php', 'Catálogo_Escolares', '2020-03-11 11:41:06'),
(49, 'No', 'pe pe-7s-sun', 'bg-c-yellow', 'Actualizar datos del turno', 'core_cTurno_getcTurno.php', 'Llene la información que se solicita', 'core_cTurno_updatecTurno.php', 'Catálogo_Escolares', '2020-03-11 12:02:43'),
(50, 'No', 'pe pe-7s-sun', 'bg-c-yellow', 'Nuevo Turno', 'core_cTurno_getcTurno.php', 'Llene la información que se solicita', 'core_cTurno_add.php', 'Catálogo_Escolares', '2020-03-11 12:05:30'),
(51, 'No', 'fa fa-shopping-bag ', 'bg-c-pink', 'Nuevo Servicio', 'core_gerencia_getServicios.php', 'Llene la información que se solicita', 'core_gerencia_addServicio.php', 'Catálogo_Escolares', '2020-03-11 12:12:36'),
(52, 'No', 'pe pe-7s-file', 'bg-c-green', 'Subir Aspirantes CSV', 'getDatosGenerales.php', 'Vista Previa', 'core_aspirantes_upload_csv.php', 'Admisión', '2020-03-20 12:20:11'),
(53, 'No', 'pe pe-7s-file', 'bg-c-green', 'Subir Servicios CSV', 'core_gerencia_getServicios.php', 'Vista Previa', 'core_servicios_upload_csv.php', 'Catálogo_Escolares', '2020-03-25 16:33:04'),
(54, 'No', 'fa fa-chalkboard-teacher', 'bg-c-pink', 'Aulas', 'core_escolares_aulas.php', 'Llene la información que se solicita', 'core_Aulas_addAulas.php', 'Catálogo_Escolares', '2020-04-02 12:39:15'),
(55, 'No', 'fa fa-chalkboard-teacher', 'bg-c-pink', 'Editar aula', 'core_escolares_aulas.php', 'Llene la información que se solicita', 'core_Aulas_updateAulas.php', 'Catálogo_Escolares', '2020-04-02 12:41:48'),
(56, 'No', 'pe pe-7s-file', 'bg-c-green', 'Subri Aulas CSV', 'core_escolares_aulas.php', 'Vista Previa', 'core_aulas_upload_csv.php', 'Catálogo_Escolares', '2020-04-02 17:06:34'),
(57, 'No', 'pe pe-7s-file', 'bg-c-green', 'Subir Horarios CSV', 'core_escolares_horario.php', 'Vista Previa', 'core_horarios_upload_csv.php', 'Catálogo_Escolares', '2020-04-02 18:30:09'),
(58, 'No', 'pe pe-7s-pen', 'bg-c-green', 'Grados', 'core_cGrados_getcGrados.php', 'Llene la información que se solicita', 'core_cGrados_addcGrados.php', 'Catálogo_Escolares', '2020-04-03 09:39:03'),
(59, 'No', 'pe pe-7s-pen', 'bg-c-green', 'Agregar Nueva Materia', 'core_materia_getMaterias.php', 'Llene la información que se solicita', 'core_materia_addMateria.php', 'Catálogo_Escolares', '2020-04-03 09:53:08'),
(60, 'No', 'pe pe-7s-pen', 'bg-c-green', 'Editar Materia', 'core_materias_getMaterias.php', 'Llene la información que se solicita', 'core_materias_updateMaterias.php', 'Catálogo_Escolares', '2020-04-03 10:02:05'),
(61, 'No', 'fa fa-mail-bulk', 'bg-c-pink', 'Plantilla de notificación', 'core_notification_gets.php', 'En este módulo puede crear una nueva plantilla de notificación de correo electrónico que podrá ser enviada de manera automática a los destinatarios que así lo requieran en base a una acción determinada del sistema \n\n', 'core_notification_template.php', 'Configuración', '2020-10-07 10:23:29'),
(62, 'No', 'fa fa-mail-bulk', 'bg-c-green', 'Plantilla de notificación', 'core_notification_gets.php', 'En este módulo puede actualizar una plantilla de notificación de correo electrónico existente, que podrá ser enviada de manera automática a los destinatarios que así lo requieran en base a una acción determinada del sistema.', 'core_notification_template_update.php', 'Configuración', '2020-10-07 13:18:56'),
(63, 'Si', 'fa fa-mail-bulk', 'bg-c-blue', 'Plantillas de notificaciones', 'menu.php', 'Lista de plantilllas', 'core_notification_gets.php', 'Configuración', '2020-10-07 17:55:08'),
(64, 'No', 'fa fa-mail-bulk', 'bg-c-pink', 'Plantilla de notificación', 'core_notification_gets.php', 'En este módulo puede crear una nueva plantilla de notificación de correo electrónico que podrá ser enviada de manera automática a los destinatarios que así lo requieran en base a una acción determinada del sistema \n\n', 'core_notification_template.php', 'Configuración', '2020-10-07 10:23:29'),
(65, 'No', 'fa fa-mail-bulk', 'bg-c-green', 'Plantilla de notificación', 'core_notification_gets.php', 'En este módulo puede actualizar una plantilla de notificación de correo electrónico existente, que podrá ser enviada de manera automática a los destinatarios que así lo requieran en base a una acción determinada del sistema.', 'core_notification_template_update.php', 'Configuración', '2020-10-07 13:18:56'),
-- (66, 'Si', 'fa fa-mail-bulk', 'bg-c-blue', 'Plantillas de notificaciones', 'menu.php', 'Lista de plantilllas', 'core_notification_gets.php', 'Configuración', '2020-10-07 17:55:08'),
(67, 'No', 'fa fa-briefcase', 'bg-c-blue', 'Oferta educativa', 'core_Carrera_addCarrera.php', 'Llene los campos que se solicitan', 'core_carrera_create.php', 'Planes de estudio', '2020-10-14 16:00:28'),
(68, 'No', 'fa fa-briefcase', 'bg-c-blue', 'Oferta educativa', 'core_Carrera_addCarrera.php', 'En este módulo puede actualizar los datos de una Oferta educativa existente, así como configurar los campos personalizados que aparecerán en el formulario de registro', 'core_carrera_update.php', 'Planes de estudio', '2020-08-14 16:13:31'),
(69, 'No', 'icofont icofont-school-bag', 'bg-c-lite-green', 'Grupo', 'core_escolares_grupo.php', 'Para crear un grupo llene los campos que se solicitan', 'core_escolares_grupo_add.php', 'Catálogo_Escolares', '2020-10-29 19:24:18'),
(70, 'No', 'fa fa-signal ', 'bg-c-green', 'Grados', 'core_cGrados_getcGrados.php', ' En este módulo, usted podrá actualizar el catalogo de grados de su organización\r\n', 'core_cGrados_updateGrados.php', 'Planes de estudio', '2020-11-04 12:41:48'),
(71, 'No', 'fa fa-book ', 'bg-c-lite-green', 'Asignaturas', 'core_planes_materias.php', 'En este módulo, usted podrá configurar el catalogo de materias que se imparte en su organización', 'core_planes_materias_add.php', 'Planes de estudio', '2020-11-04 16:15:25'),
(72, 'No', 'fa fa-book ', 'bg-c-lite-green', 'Asignaturas', 'core_planes_materias.php', 'En este módulo, usted podrá actualizarel catalogo de materias que se imparte en su organización', 'core_planes_materia_update.php', 'Control escolar', '2020-11-04 18:31:10'),
(73, 'Si', 'fa fa-file-pdf', 'bg-c-green', 'Documentos', 'menu.php', 'Lista de documentos probatorios', 'core_docs_getdoc.php', 'Catálogo_Escolares', '2021-01-07 13:18:50'),
(74, 'No', 'fa fa-file-pdf', 'bg-c-blue', 'Nuevo Documento', 'core_docs_getdoc.php', 'Crear nuevo documento ', 'core_docs_create.php', 'Catálogo_Escolares', '2021-01-07 13:45:15'),
(75, 'No', 'fa fa-file-pdf', 'bg-c-pink', 'Actualizar Documento', 'core_docs_getdoc.php', '-', 'core_docs_update.php', 'Catálogo_Escolares', '2021-01-07 14:14:07'),
(76, 'Si', 'fa fa-shopping-bag', 'bg-c-green', 'Botónes de Pago', 'menu.php', ' ', 'core_button_payment_get.php', 'Catálogos', '2021-01-07 15:27:49'),
(77, 'No', 'fa fa-shopping-bag', 'bg-c-blue', 'Nuevo Botón de Pago', 'core_button_payment_get.php', ' ', 'core_button_payment_create.php', 'Catálogos', '2021-01-07 15:35:05'),
(78, 'No', 'fa fa-shopping-bag', 'bg-c-pink', 'Actualizar Botón de Pago', 'core_button_payment_get.php', ' ', 'core_button_payment_update.php', 'Catálogos', '2021-01-07 15:37:27'),
(79, 'No', 'pe pe-7s-pen', 'bg-c-green', 'Campos Personalizados', 'core_custom_form_inputs_get.php', 'Supported Form Controls\r\n', 'core_custom_form_inputs_create.php', 'Alumnos', '2021-01-08 10:00:33'),
(80, 'No', 'pe pe-7s-pen', 'bg-c-green', 'Formularios ', 'core_custom_form_inputs_get.php', 'Cree un formulario personalizado', 'core_custom_form_create.php', 'Alumnos', '2021-01-08 11:38:56'),
(81, 'Si', 'pe pe-7s-pen', 'bg-c-blue', 'Formularios', 'menu.php', 'Lista de Formularios', 'core_custom_form_inputs_get.php', 'Alumnos', '2021-01-08 12:51:21'),
(82, 'No', 'pe pe-7s-pen', 'bg-c-pink', 'Custom Form', 'core_custom_form_inputs_get.php', ' Llene los campos que se solicitan', 'core_custom_form_preview.php', 'Alumnos', '2021-01-08 15:16:14');



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

INSERT INTO `role` (`idirole`, `role`, `edit`) VALUES
(1, 'root', 1),
(2, 'Estudiante', 1);

--
-- Estructura de tabla para la tabla `role_as_permiso`
--

CREATE TABLE `role_as_permiso` (
  `idirol_permiso` int(11) NOT NULL,
  `idirole` int(11) DEFAULT NULL,
  `idipermiso` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- Generate 80 insert statements
INSERT INTO `role_as_permiso` (`idirol_permiso`, `idirole`, `idipermiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45),
(46, 1, 46),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50),
(51, 1, 51),
(52, 1, 52),
(53, 1, 53),
(54, 1, 54),
(55, 1, 55),
(56, 1, 56),
(57, 1, 57),
(58, 1, 58),
(59, 1, 59),
(60, 1, 60),
(61, 1, 61),
(62, 1, 62),
(63, 1, 63),
(64, 1, 64),
(65, 1, 65),
-- (66, 1, 66),
(67, 1, 67),
(68, 1, 68),
(69, 1, 69),
(70, 1, 70),
(71, 1, 71),
(72, 1, 72),
(73, 1, 73),
(74, 1, 74),
(75, 1, 75),
(76, 1, 76),
(77, 1, 77),
(78, 1, 78),
(79, 1, 79),
(80, 1, 80),
(81,1,81),
(82,1,82),
(83,1,83),
(84, 2,42),
(85, 2,35);



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
(1, 1, 'control-escolar', 'Nubelity Training Center', 'Nubelity TC', 'Empower your career', '101070174', 'https://nubelity.com', 'ac161d240f89a11d30d84ac291faad4e', 'https://nubelity-solutions/learn/', 'nubelity_logo.webp', '#3399ff', 1, 7200, 'America/Mexico_City', 'México', 'CDMX', 'es', '2021-10-29 18:37:16');

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

-- password is 1p0q2o9w

INSERT INTO `tbuser` (`idiuser`, `idigenerales`, `idiconfig`, `idirole`, `idicampus`, `user`, `password`, `categoria`) VALUES 
(4, 4, 1, 1, 1, 'root', '55e80eb24ea0dbdfcff5264854aeb2e755b7dd3a4760d7f7b1c8544b06cb3e45', 'root');

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
