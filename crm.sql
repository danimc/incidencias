-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2017 a las 19:08:38
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id_activo` int(10) NOT NULL,
  `n_serie` varchar(25) NOT NULL,
  `clasificacion` int(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `situacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_ticket`
--

CREATE TABLE `categoria_ticket` (
  `id_cat` int(10) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_activos`
--

CREATE TABLE `clasificacion_activos` (
  `id_clasificacion` int(10) NOT NULL,
  `clasificacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencia` int(10) NOT NULL,
  `nombre_dependencia` varchar(15) NOT NULL,
  `abreviatura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dependencia`, `nombre_dependencia`, `abreviatura`) VALUES
(1, 'Soporte Técnico', 'SIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion_trabajo`
--

CREATE TABLE `estacion_trabajo` (
  `id_estacion` int(5) NOT NULL,
  `coordenada` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(2) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `binario` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ip`
--

CREATE TABLE `ip` (
  `ip` char(15) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_activos`
--

CREATE TABLE `movimientos_activos` (
  `movimiento` int(10) NOT NULL,
  `activo` int(10) NOT NULL,
  `area` int(10) NOT NULL,
  `fecha_movimiento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(10) NOT NULL,
  `ticket` int(10) NOT NULL,
  `sintoma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion_activos`
--

CREATE TABLE `situacion_activos` (
  `id_situacion` int(5) NOT NULL,
  `situacion` varchar(25) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion_ticket`
--

CREATE TABLE `situacion_ticket` (
  `id` int(10) NOT NULL,
  `situacion` varchar(15) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion_usuarios`
--

CREATE TABLE `situacion_usuarios` (
  `id` int(10) NOT NULL,
  `situacion` varchar(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `situacion_usuarios`
--

INSERT INTO `situacion_usuarios` (`id`, `situacion`, `descripcion`) VALUES
(1, 'activo', 'Es es estatus que se le da a los usuarios que actualmetne laboran en la OAG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `folio` int(10) NOT NULL,
  `fecha_inicio` text NOT NULL,
  `hora_inicio` text NOT NULL,
  `usr_reportante` int(10) NOT NULL,
  `usr_incidente` int(10) DEFAULT NULL,
  `activo_incidente` int(10) DEFAULT NULL,
  `categoria` int(10) NOT NULL,
  `sintomas` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `estatus` int(10) NOT NULL,
  `prioridad` varchar(15) NOT NULL,
  `fecha_cierre` text,
  `hora_cierre` text,
  `usr_asignado` int(10) NOT NULL,
  `fecha_asignado` text NOT NULL,
  `hora_asignado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
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
  `foto` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `apellido`, `usuario`, `password`, `dependencia`, `cubiculo`, `puesto`, `rol`, `estatus`, `fecha_alta`, `fecha_baja`, `extension`, `correo`, `foto`) VALUES
(10001, 'Luis Daniel', 'Mora Carbajal', 'danimc', '123', 1, 1, 'Jefe Sistemas', 1, 1, '28/03/2017', NULL, 11570, 'luis.mora@redudg.udg.mx', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id_activo`);

--
-- Indices de la tabla `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `clasificacion_activos`
--
ALTER TABLE `clasificacion_activos`
  ADD PRIMARY KEY (`id_clasificacion`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencia`);

--
-- Indices de la tabla `estacion_trabajo`
--
ALTER TABLE `estacion_trabajo`
  ADD PRIMARY KEY (`id_estacion`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`ip`);

--
-- Indices de la tabla `movimientos_activos`
--
ALTER TABLE `movimientos_activos`
  ADD PRIMARY KEY (`movimiento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `situacion_activos`
--
ALTER TABLE `situacion_activos`
  ADD PRIMARY KEY (`id_situacion`);

--
-- Indices de la tabla `situacion_ticket`
--
ALTER TABLE `situacion_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `situacion_usuarios`
--
ALTER TABLE `situacion_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clasificacion_activos`
--
ALTER TABLE `clasificacion_activos`
  MODIFY `id_clasificacion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimientos_activos`
--
ALTER TABLE `movimientos_activos`
  MODIFY `movimiento` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `situacion_ticket`
--
ALTER TABLE `situacion_ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `situacion_usuarios`
--
ALTER TABLE `situacion_usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `folio` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
