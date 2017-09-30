-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2017 at 02:44 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activos`
--

CREATE TABLE `activos` (
  `id_activo` int(10) NOT NULL,
  `n_serie` varchar(25) NOT NULL,
  `clasificacion` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descripcion` text,
  `situacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activos`
--

INSERT INTO `activos` (`id_activo`, `n_serie`, `clasificacion`, `marca`, `modelo`, `descripcion`, `situacion`) VALUES
(1910831, 'MXJ01400NP', 'C00194', 'HP', 'Compaq dc5850 Small From Factor', 'CPU de escritorio con 2 gbs de memoria RAM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categoria_ticket`
--

CREATE TABLE `categoria_ticket` (
  `id_cat` int(11) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_ticket`
--

INSERT INTO `categoria_ticket` (`id_cat`, `categoria`) VALUES
(1, 'Correo Electronico'),
(2, 'Bases de Datos'),
(3, 'Software'),
(4, 'Hardware'),
(5, 'Red e Internet'),
(6, 'Impresoras'),
(7, 'Telefonia'),
(8, 'Documentos y Formatos'),
(9, 'Sistema de Incidencias'),
(10, 'Otros');

-- --------------------------------------------------------

--
-- Table structure for table `clasificacion_activos`
--

CREATE TABLE `clasificacion_activos` (
  `id_clasificacion` varchar(10) NOT NULL,
  `clasificacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clasificacion_activos`
--

INSERT INTO `clasificacion_activos` (`id_clasificacion`, `clasificacion`) VALUES
('11', 'All-in-One'),
('6', 'Impresora'),
('7', 'Bocinas'),
('9', 'Regulador'),
('C00194', 'C.P.U.'),
('C00336', 'Computadora Portatil'),
('C00495', 'Disco Duro'),
('C00617', 'Escaner'),
('C00972', 'Monitor'),
('C00988', 'Mouse'),
('C01024', 'No-Break'),
('C01423', 'Teclado para Computadora'),
('C01426', 'Telefono'),
('ER05066', 'Reloj Checador');

-- --------------------------------------------------------

--
-- Table structure for table `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencia` int(10) NOT NULL,
  `nombre_dependencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `dependencias`
--

INSERT INTO `dependencias` (`id_dependencia`, `nombre_dependencia`, `abreviatura`) VALUES
(1, 'Soporte Tecnico', 'SIS'),
(2, 'Direccion', 'DIR'),
(3, 'Coordinacion de Normatividad Universitaria', 'CNU'),
(4, 'Unidad de Reglamentos', 'UR'),
(5, 'Unidad de Apoyo a Organos Colegiados', 'UAOC'),
(6, 'Coordinación Juridica', 'CJ'),
(7, 'Unidad de Asuntos Laborales', 'LABORAL'),
(8, 'Unidad de Asuntos Penales', 'UAP'),
(9, 'Unidad de Convenios y Contratos', 'CyC'),
(10, 'Unidad de Procedimientos y Asesoria Juridica', 'UPAJ'),
(11, 'Coordinacion de Enlace a la Red Universitaria', 'CERU'),
(12, 'Unidad de Servicios Migratorios', 'USM'),
(13, 'Unidad de Capacitacion', 'UC'),
(14, 'Unidad de Proteccion a la Propiedad Intelectual', 'UPPI');

-- --------------------------------------------------------

--
-- Table structure for table `estacion_trabajo`
--

CREATE TABLE `estacion_trabajo` (
  `id_estacion` int(5) NOT NULL,
  `coordenada` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estado_activo`
--

CREATE TABLE `estado_activo` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado_activo`
--

INSERT INTO `estado_activo` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'Almacenado'),
(3, 'fuera de servicio'),
(4, 'En reparacion');

-- --------------------------------------------------------

--
-- Table structure for table `h_ticket`
--

CREATE TABLE `h_ticket` (
  `id` int(11) NOT NULL,
  `folio` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `usr` int(11) DEFAULT NULL,
  `asignado` int(11) DEFAULT NULL,
  `mensaje` text,
  `fecha` varchar(15) DEFAULT NULL,
  `hora` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_ticket`
--

INSERT INTO `h_ticket` (`id`, `folio`, `categoria`, `estatus`, `usr`, `asignado`, `mensaje`, `fecha`, `hora`) VALUES
(1, 3, NULL, 2, 10001, 10001, NULL, '29-09-2017', '16:41:48'),
(2, 3, 8, 0, 10001, NULL, NULL, '29-09-2017', '17:59:08'),
(3, 3, 9, 0, 10001, NULL, NULL, '29-09-2017', '17:59:16'),
(4, 3, 0, 4, 10001, NULL, NULL, '29-09-2017', '18:01:10'),
(5, 3, NULL, 5, 10001, NULL, 'Se modifico el archivo PHP.ini, asi como el archivo Sendmail.ini para con la configuracion del servidor de correos de Google', '29-09-2017', '18:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` smallint(6) NOT NULL,
  `anchura` smallint(6) NOT NULL,
  `altura` smallint(6) NOT NULL,
  `tipo` char(15) NOT NULL,
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movimientos_activos`
--

CREATE TABLE `movimientos_activos` (
  `movimiento` int(10) NOT NULL,
  `activo` int(10) NOT NULL,
  `area` int(10) NOT NULL,
  `fecha_movimiento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `puesto_usr`
--

CREATE TABLE `puesto_usr` (
  `id` int(11) NOT NULL,
  `puesto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puesto_usr`
--

INSERT INTO `puesto_usr` (`id`, `puesto`) VALUES
(1, 'Administrativo'),
(2, 'Directivo'),
(3, 'Jefe de Unidad'),
(4, 'Coordinador'),
(5, 'Servicio Social'),
(6, 'Practicas Profesionales');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'usuario'),
(3, 'coordinador');

-- --------------------------------------------------------

--
-- Table structure for table `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(10) NOT NULL,
  `ticket` int(10) NOT NULL,
  `sintoma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `situacion_activos`
--

CREATE TABLE `situacion_activos` (
  `id_situacion` int(5) NOT NULL,
  `situacion` varchar(25) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `situacion_activos`
--

INSERT INTO `situacion_activos` (`id_situacion`, `situacion`, `descripcion`) VALUES
(1, 'Buen Estado', NULL),
(2, 'Estado Regular', NULL),
(3, 'Mal Estado', NULL),
(4, 'Falta piezas', NULL),
(5, 'Inoperante', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `situacion_ticket`
--

CREATE TABLE `situacion_ticket` (
  `id` int(10) NOT NULL,
  `situacion` varchar(15) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `situacion_ticket`
--

INSERT INTO `situacion_ticket` (`id`, `situacion`, `descripcion`) VALUES
(1, 'Abierto', ''),
(2, 'Asigado', ''),
(3, 'En Proceso', ''),
(4, 'Resuelto', ''),
(5, 'Cerrado', ''),
(6, 'Pendiente', '');

-- --------------------------------------------------------

--
-- Table structure for table `situacion_usuarios`
--

CREATE TABLE `situacion_usuarios` (
  `id` int(10) NOT NULL,
  `situacion` varchar(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `situacion_usuarios`
--

INSERT INTO `situacion_usuarios` (`id`, `situacion`, `descripcion`) VALUES
(1, 'activo', 'Es es estatus que se le da a los usuarios que actualmetne laboran en la OAG'),
(2, 'Licencia', 'Cuando el usuario dejara de presentarse a la oficina por un tiempo determinado'),
(3, 'incapacida', '');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `folio` int(10) NOT NULL,
  `fecha_inicio` text NOT NULL,
  `hora_inicio` text NOT NULL,
  `usr_reportante` int(10) NOT NULL,
  `usr_incidente` int(10) DEFAULT NULL,
  `activo_incidente` int(10) DEFAULT NULL,
  `categoria` int(10) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `estatus` int(10) NOT NULL,
  `prioridad` varchar(15) NOT NULL,
  `fecha_cierre` text,
  `hora_cierre` text,
  `usr_asignado` int(10) NOT NULL,
  `fecha_asignado` text NOT NULL,
  `hora_asignado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`folio`, `fecha_inicio`, `hora_inicio`, `usr_reportante`, `usr_incidente`, `activo_incidente`, `categoria`, `titulo`, `Descripcion`, `estatus`, `prioridad`, `fecha_cierre`, `hora_cierre`, `usr_asignado`, `fecha_asignado`, `hora_asignado`) VALUES
(1, '28-09-2017', '21:53:48', 10001, 10001, NULL, 1, 'El servidor se Daño :(', ':(', 1, '', NULL, NULL, 0, '', ''),
(2, '29-09-2017', '15:52:41', 10001, 10001, NULL, 1, 'Modificar Base Del File', 'registrar dos campos mas a la base de datos del file', 1, '', NULL, NULL, 0, '', ''),
(3, '29-09-2017', '15:54:45', 10001, 10001, NULL, 9, 'no se estan enviando correos ', 'No me estan llegando correos al levantar incidentes', 5, '', '29-09-2017', '18:02:07', 10001, '29-09-2017', '16:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dependencia` int(10) NOT NULL,
  `cubiculo` int(10) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `rol` int(10) NOT NULL,
  `estatus` int(10) NOT NULL,
  `fecha_alta` varchar(10) NOT NULL,
  `fecha_baja` varchar(10) DEFAULT '',
  `extension` int(5) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `apellido`, `usuario`, `password`, `dependencia`, `cubiculo`, `puesto`, `rol`, `estatus`, `fecha_alta`, `fecha_baja`, `extension`, `correo`, `foto`) VALUES
(10001, 'Luis Daniel', 'Mora Carbajal', 'danimc', '123', 1, 1, '1', 1, 1, '28/03/2017', NULL, 11570, 'luis.mora@redudg.udg.mx', 'img/usr/danimc.jpg'),
(10002, 'Saul Abraham', 'Torres Rodriguez', 'satoro', 'abc123', 2, 0, '1', 1, 1, '25-07-2017', '', 11570, 'saul.torres@redudg.udg.mx', 'img/usr/satoro.jpeg'),
(10025, 'Alberto', 'Casillas Carvajal', 'nano', '123', 1, 0, '1', 1, 1, '14-08-2017', '', 11571, 'alberto.casillas@redudg.udg.mx', 'img/usr/nano.jpg'),
(10026, 'Aransazu', 'Fernandez', 'Ara', '123', 3, 0, '5', 1, 1, '14-08-2017', '', 11596, 'aranzasu@hotmail.com', 'img/usr/Ara.jpg'),
(2007371, 'Herlinda  ', 'López Garza', 'Herlinda.López', '123', 14, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2009927, 'Francisco Javier ', 'Fernández Rubio', 'Francisco.Ferná', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2009935, 'Eduardo Alberto ', 'Gil González', 'Eduardo.Gil', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2021048, 'Claudia Edith ', 'Smeke Pérez', 'Claudia.Smeke', '123', 4, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2121646, 'Ramón  ', 'Serna Gallegos', 'Ramón.Serna', '123', 16, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2127563, 'Carmen Angélica ', 'Serrato Vázquez', 'Carmen.Serrato', '123', 5, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2129108, 'la Torre Hugo', 'Velázquez de', 'la.Velázquez', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2220857, 'Alicia Isabel ', 'Gutiérrez Gutiérrez', 'Alicia.Gutiérre', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2225417, 'Rosa Leticia ', 'Sánchez Rojo', 'Rosa.Sánchez', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2228262, 'María Paulina ', 'González Mendoza', 'María.González', '123', 19, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2228785, 'Hilda  ', 'Villanueva Lomelí', 'Hilda.Villanuev', '123', 14, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2232049, 'Susana Cristina ', 'Valadez Morales', 'Susana.Valadez', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2315351, 'Fatima  ', 'Garcia Andrade', 'Fatima.Garcia', '123', 14, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2324164, 'Raymundo René ', 'Hurtado Buendía', 'Raymundo.Hurtad', '123', 4, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2413132, 'María del Carmen', 'Loza Murillo', 'María.Loza', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2414848, 'Ruth Paola ', 'Carrera Juárez', 'Ruth.Carrera', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2415135, 'Laura Isabel ', 'Piceno García', 'Laura.Piceno', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2506076, 'Vilma  ', 'Delgado Castañeda', 'Vilma.Delgado', '123', 5, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2519925, 'Jonathan Ricardo ', 'Rivera Martínez', 'Jonathan.Rivera', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2520664, 'Ana Rosa ', 'Robles Ramírez', 'Ana.Robles', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2605678, 'Mónica Noemí ', 'Villarreal Aldana', 'Mónica.Villarre', '123', 4, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2624079, 'Edith', 'Roque Huerta', 'Edith.Roque', '123', 11, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2632098, 'Rocio  ', 'Romero Arellano', 'Rocio.Romero', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2634279, 'Francisco Javier ', 'Carvajal Padilla', 'Francisco.Carva', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2703378, 'Mónica Ruth ', 'Medina Rivas', 'Mónica.Medina', '123', 5, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2708841, 'Jessica  ', 'Nuño Villarruel', 'Jessica.Nuño', '123', 6, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2818523, 'Alma Dafné ', 'Rivera Becerril', 'Alma.Rivera', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2822288, 'Altagracia  ', 'González Aceves', 'Altagracia.Gonz', '123', 10, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2833379, 'José de Jesús', 'Sandoval Arceo', 'José.Sandoval', '123', 5, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2900262, 'Gabriel  ', 'Viramontes Zaragoza', 'Gabriel.Viramon', '123', 6, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2907542, 'Juan Antonio ', 'Pérez Gallardo', 'Juan.Pérez', '123', 6, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2907739, 'Patricia Maria ', 'Pérez Marin', 'Patricia.Pérez', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2907828, 'Roberto Carlos ', 'Paz Rodríguez', 'Roberto.Paz', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2914107, 'Gabriel  ', 'Lanzagorta Vallín', 'Gabriel.Lanzago', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2914689, 'María Verónica Aranzazu', 'Fernández Cordero', 'María.Fernández', '123', 11, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2925389, 'Eduardo Daniel ', 'González Vazquez', 'Eduardo.Gonzále', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2935619, 'Priscilla Themis ', 'Tafolla Soto', 'Priscilla.Tafol', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2935635, 'Julieta Elizabeth ', 'Lomeli Moran', 'Julieta.Lomeli', '123', 12, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2943806, 'Hugo Salvador ', 'Peñalosa Gamboa', 'Hugo.Peñalosa', '123', 10, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2944564, 'Israel Jared ', 'Padilla Barba', 'Israel.Padilla', '123', 6, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2944862, 'Alma Mónica ', 'Moya Romero', 'Alma.Moya', '123', 4, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2945968, 'Citlalli  ', 'García Loza', 'Citlalli.García', '123', 4, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2947141, 'Fernando Carlos ', 'Gutiérrez Uzarraga', 'Fernando.Gutiér', '123', 17, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2948138, 'Jonathan Tlacaelel ', 'Plascencia López', 'Jonathan.Plasce', '123', 4, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2948803, 'Gustavo Adrian ', 'Peña Portillo', 'Gustavo.Peña', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2949394, 'Erica Esmeralda ', 'Sánchez Rosales', 'Erica.Sánchez', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2949964, 'Paulina  ', 'López Abbadie', 'Paulina.López', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2951824, 'Franqueza  ', 'Orozco Felix', 'Franqueza.Orozc', '123', 17, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2951875, 'Fanny Janeth ', 'Aceves Bravo', 'Fanny.Aceves', '123', 10, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2952586, 'Andrés  ', 'Tostado Rodríguez', 'Andrés.Tostado', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2954524, 'María del Rocio', 'González Villa', 'María.González', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2955111, 'Irma Citlali ', 'Castellanos Arana', 'Irma.Castellano', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2957173, 'Edgar  ', 'Franco Velázquez', 'Edgar.Franco', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2957609, 'Alejandra  ', 'Romero Miramontes', 'Alejandra.Romer', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2957647, 'Guadalupe Natalie ', 'Ruvalcaba Apodaca', 'Guadalupe.Ruval', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2958349, 'Leonel Iván ', 'Carmona Barrera', 'Leonel.Carmona', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2958454, 'Karen Nigtenha ', 'Ochoa Orozco', 'Karen.Ochoa', '123', 14, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2958687, 'Luz Livier ', 'Salas García', 'Luz.Salas', '123', 6, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2959830, 'Noemi  ', 'Ruiz González', 'Noemi.Ruiz', '123', 19, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2960044, 'Rafael de Jesús', 'Díaz Ramírez', 'Rafael.Díaz', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2960163, 'Irma Adelaida ', 'Vázquez Muro', 'Irma.Vázquez', '123', 14, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2960760, 'Nazaret Guillermo ', 'López Rubio', 'Nazaret.López', '123', 14, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2960937, 'Centella  ', 'Briseño Montes', 'Centella.Briseñ', '123', 6, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2961140, 'Priscila  ', 'Aguayo Ortíz', 'Priscila.Aguayo', '123', 15, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2961462, 'Karla Lizeth ', 'Correa Mejía', 'Karla.Correa', '123', 12, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(2961463, 'Flores Karla Lorena', 'Del Valle', 'Flores.Del', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8001375, 'Ramiro  ', 'Contreras Acevedo', 'Ramiro.Contrera', '123', 13, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8006113, 'Graciela  ', 'Valdivia Rubio', 'Graciela.Valdiv', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8509573, 'Rosalba', 'Rodriguez Martinez', 'Rosalba.Rodrigu', '123', 11, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8803803, 'Ma. del Consuelo', 'Ambríz Cabrera', 'Ma..Ambríz', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8824193, 'Xochitl  ', 'Ferrer Sandoval', 'Xochitl.Ferrer', '123', 15, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8912793, 'Bertha Alicia ', 'Hernández Villanueva', 'Bertha.Hernánde', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(8912874, 'Juan Manuel ', 'Alejo Mayorga', 'Juan.Alejo', '123', 10, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9217932, 'Irma Guadalupe ', 'Mejía Anaya', 'Irma.Mejía', '123', 12, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9319581, 'María Magdalena ', 'Padilla Salazar', 'María.Padilla', '123', 17, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9405879, 'Efrain  ', 'Ferrer Sandoval', 'Efrain.Ferrer', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9506578, 'Cecilia  ', 'Torres Cabral', 'Cecilia.Torres', '123', 10, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9511318, 'Miguel Angel ', 'Alcantara Ochoa', 'Miguel.Alcantar', '123', 7, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9512861, 'Benedicto  ', 'Castañeda Larios', 'Benedicto.Casta', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9705112, 'Luis Fernando ', 'Ayala González', 'Luis.Ayala', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9714251, 'Gabriel  ', 'García Escobedo', 'Gabriel.García', '123', 9, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9800239, 'Verónica Ofelia ', 'Rodríguez Moreno', 'Verónica.Rodríg', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9801278, 'León Mónica Fabiola', 'Huerta de', 'León.Huerta', '123', 18, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9805753, 'Luz Elena ', 'Argote Michel', 'Luz.Argote', '123', 12, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9912576, 'Ivana Patsilly ', 'González Guerrero', 'Ivana.González', '123', 12, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9915427, 'Valeria  ', 'Gutiérrez Rojano', 'Valeria.Gutiérr', '123', 8, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9915428, 'nombre', 'apellido', 'usuario', 'password', 0, 0, 'puesto', 0, 0, 'fecha_alta', 'fecha_baja', 0, 'correo', 'foto'),
(9915429, 'Jonathan Isaí ', 'Rentería Alfaro', 'Jonathan.Renter', '123', 11, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL'),
(9915430, 'Crithian Emmanuel ', 'Guzmán Ceja', 'Crithian.Guzmán', '123', 13, 0, '1', 2, 1, '27/09/2017', 'NULL', 0, '0', 'NULL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id_activo`);

--
-- Indexes for table `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `clasificacion_activos`
--
ALTER TABLE `clasificacion_activos`
  ADD PRIMARY KEY (`id_clasificacion`);

--
-- Indexes for table `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencia`);

--
-- Indexes for table `estacion_trabajo`
--
ALTER TABLE `estacion_trabajo`
  ADD PRIMARY KEY (`id_estacion`);

--
-- Indexes for table `estado_activo`
--
ALTER TABLE `estado_activo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_ticket`
--
ALTER TABLE `h_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indexes for table `movimientos_activos`
--
ALTER TABLE `movimientos_activos`
  ADD PRIMARY KEY (`movimiento`);

--
-- Indexes for table `puesto_usr`
--
ALTER TABLE `puesto_usr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situacion_activos`
--
ALTER TABLE `situacion_activos`
  ADD PRIMARY KEY (`id_situacion`);

--
-- Indexes for table `situacion_ticket`
--
ALTER TABLE `situacion_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situacion_usuarios`
--
ALTER TABLE `situacion_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`folio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `estado_activo`
--
ALTER TABLE `estado_activo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `h_ticket`
--
ALTER TABLE `h_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movimientos_activos`
--
ALTER TABLE `movimientos_activos`
  MODIFY `movimiento` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `puesto_usr`
--
ALTER TABLE `puesto_usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `situacion_activos`
--
ALTER TABLE `situacion_activos`
  MODIFY `id_situacion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `situacion_ticket`
--
ALTER TABLE `situacion_ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `situacion_usuarios`
--
ALTER TABLE `situacion_usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `folio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9915431;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
