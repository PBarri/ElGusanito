-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-07-2012 a las 11:21:07
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `elgusanito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `IdHora` time NOT NULL,
  `IdPista` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdHora`,`IdPista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`IdHora`, `IdPista`) VALUES
('10:00:00', 1),
('10:00:00', 6),
('10:00:00', 7),
('10:00:00', 8),
('10:00:00', 9),
('10:30:00', 2),
('10:30:00', 3),
('11:00:00', 4),
('11:00:00', 5),
('11:00:00', 6),
('11:00:00', 7),
('12:00:00', 1),
('12:00:00', 6),
('12:00:00', 7),
('12:00:00', 8),
('12:00:00', 9),
('12:30:00', 2),
('12:30:00', 3),
('13:00:00', 4),
('13:00:00', 5),
('13:00:00', 6),
('13:00:00', 7),
('14:00:00', 1),
('14:00:00', 6),
('14:00:00', 7),
('14:00:00', 8),
('14:00:00', 9),
('14:30:00', 2),
('14:30:00', 3),
('15:00:00', 4),
('15:00:00', 5),
('15:00:00', 6),
('15:00:00', 7),
('16:00:00', 1),
('16:00:00', 6),
('16:00:00', 7),
('16:00:00', 8),
('16:00:00', 9),
('16:30:00', 2),
('16:30:00', 3),
('17:00:00', 4),
('17:00:00', 5),
('17:00:00', 6),
('17:00:00', 7),
('18:00:00', 1),
('18:00:00', 6),
('18:00:00', 7),
('18:00:00', 8),
('18:00:00', 9),
('18:30:00', 2),
('18:30:00', 3),
('19:00:00', 4),
('19:00:00', 5),
('19:00:00', 6),
('19:00:00', 7),
('20:00:00', 1),
('20:00:00', 6),
('20:00:00', 7),
('20:00:00', 8),
('20:00:00', 9),
('20:30:00', 2),
('20:30:00', 3),
('21:00:00', 4),
('21:00:00', 5),
('21:00:00', 6),
('21:00:00', 7),
('22:00:00', 1),
('22:00:00', 6),
('22:00:00', 7),
('22:00:00', 8),
('22:00:00', 9),
('22:30:00', 2),
('22:30:00', 3),
('23:00:00', 4),
('23:00:00', 5),
('23:00:00', 6),
('23:00:00', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE IF NOT EXISTS `instalaciones` (
  `IdPista` tinyint(1) NOT NULL,
  `TipoPista` set('Fútbol 11','Fútbol 7','Baloncesto','Tenis','Padel') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdPista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`IdPista`, `TipoPista`) VALUES
(1, 'Fútbol 11'),
(2, 'Fútbol 7'),
(3, 'Fútbol 7'),
(4, 'Baloncesto'),
(5, 'Baloncesto'),
(6, 'Padel'),
(7, 'Padel'),
(8, 'Tenis'),
(9, 'Tenis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Contenido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID`, `Titulo`, `Contenido`, `Imagen`, `Fecha`) VALUES
(17, 'INAUGURACIÃ“N DE UNA NUEVA ESTATUA DE D. FCO. JAVIER RODRÃGUEZ', 'La semana pasada, en nuestro establecimiento se inaugurÃ³ una estatua que rendirÃ¡ homenaje a nuestro creador. Dicha estatuta es obra del escultor Don Pablo Barrientos, que cuenta con la desinteresada colaboraciÃ³n de FÃ©lix Blanco.\r\n\r\nPara la inauguraciÃ³n tenemos preparada una inolvidable fiesta, con la que agradecer a el creador de nuestras instalaciones todo su esfuerzo. ActuarÃ¡n diversos grupos locales.\r\n\r\nEsperamos su asistencia', 'estatua.jpg', '2012-07-12 04:53:13'),
(18, 'CURSOS ESCUELAS DEPORTIVAS DE FÃšTBOL SALA Y BALONCESTO', 'En la Ãºltima semana del primer trimestre de las escuelas deportivas de fÃºtbol sala en el complejo deportivo el Gusanito, ya estÃ¡n abiertos los plazos de inscripciÃ³n de dichos cursos.\r\n\r\nPara las escuelas de fÃºtbol sala y baloncesto aÃºn quedan unos dÃ­as mÃ¡s, ya que hasta el 4 de Enero no termina el primer trimestre. Los interesados en renovar un trimestre mÃ¡s, asÃ­ como los nuevos interesados, pueden hacerlo desde el pasado 14 de Diciembre, para comenzar los entrenamientos el 9 de Enero', 'futbol.jpg', '2012-07-12 04:55:44'),
(19, 'RENOVACIÃ“N CURSOS DE PADEL Y TENIS', 'Finaliza el primer bimestre de los cursos de pÃ¡del y tenis, que se han venido desarrollando de Lunes a SÃ¡bado a lo largo de los meses de Octubre-Noviembre-Diciembre. Reabrimos los plazos de inscripciÃ³n para el inicio o renovaciÃ³n de dichos cursos. Todos los que estÃ©is interesados en nuestros deportes de raqueta, en aprender y corregir los golpes, pasaros por recepciÃ³n y matricularos en las horas y dÃ­as disponibles.', 'tenis.jpg', '2012-07-12 04:58:18'),
(21, 'PÃGINA WEB EN PERIODO DE PRUEBA', 'Informamos a todos los interesados que estan pensando en hacerse socios del polideportivo EL Gusanito, que al estar la nueva aplicaciÃ³n web en periodo de prueba durante este mes, tanto hacerse socio, como la reserva de las distintas pistas mediante la pÃ¡gina web es gratis.\r\n\r\nGracias por su confianza.', '', '2012-07-12 05:03:22'),
(22, 'NUEVO DEPORTE', 'ASdakjghakjgh klwhtklfjsfs,gjsn f,jrlhtukdsfnsdf, skdfjkdfnld', '', '2012-07-13 03:39:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `IdReserva` int(20) NOT NULL AUTO_INCREMENT,
  `IdPista` tinyint(4) NOT NULL,
  `DNI` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IdHora` time NOT NULL,
  `IdFecha` date NOT NULL,
  `FechaMostrar` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdReserva`),
  UNIQUE KEY `IdPista` (`IdPista`,`DNI`,`IdHora`,`IdFecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IdReserva`, `IdPista`, `DNI`, `IdHora`, `IdFecha`, `FechaMostrar`) VALUES
(2, 6, '49070704C', '12:30:00', '2012-08-01', 'MiÃ©rcoles 1 Agosto 2012'),
(3, 4, '49070704C', '21:00:00', '2012-08-24', 'Viernes 24 Agosto 2012'),
(8, 3, '49070704C', '10:30:00', '2012-07-26', 'Jueves 26 Julio 2012'),
(9, 8, '31190392T', '10:00:00', '2012-08-15', 'MiÃ©rcoles 15 Agosto 2012');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE IF NOT EXISTS `socios` (
  `DNI` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `TipoUsuario` set('admin','socio','monitor') COLLATE utf8_spanish_ci NOT NULL,
  `Foto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Usuario`),
  UNIQUE KEY `DNI` (`DNI`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nac`, `Email`, `Usuario`, `Password`, `TipoUsuario`, `Foto`) VALUES
('00000000A', 'admin', 'admin', 'admin', '2012-07-04', 'admin@elgusanito.com', 'admin', 'admin', 'admin', ''),
('31190392T', 'Juan Manuel', 'Barrientos', 'Villar', '2006-07-01', 'juan.barrientos@uca.es', 'Juan', 'juan', 'socio', '31190392T.jpg'),
('49070704C', 'Pablo', 'Barrientos', 'Lobato', '1989-07-21', 'pablo.barrientos.13@gmail.com', 'Pablo13', 'pablo665', 'socio', '49070704C.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
