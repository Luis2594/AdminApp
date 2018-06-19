-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2018 a las 22:23:16
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

CREATE DATABASE institution_submodule;
USE institution_submodule;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `institution_submodule`


--
-- Estructura de tabla para la tabla `areas`
--
CREATE TABLE `areas` (
  `pk` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `pk` int(11) NOT NULL,
  `cod` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fkarea` int(11) NOT NULL,
  `fkdaynumber` int(11) NOT NULL,
  `fkhour` int(11) NOT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `days`
--

CREATE TABLE `days` (
  `pk` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `enrollment`
--

CREATE TABLE `enrollment` (
  `pk` int(11) NOT NULL,
  `fkperson` int(11) NOT NULL,
  `fkcourse` int(11) NOT NULL,
  `enrollmentyear` int(11) NOT NULL,
  `enrollmentstatus` int(11) NOT NULL DEFAULT '0',
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `enrollmentstatus`
--

CREATE TABLE `enrollmentstatus` (
  `pk` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `hours`
--

CREATE TABLE `hours` (
  `pk` int(11) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `pk` int(11) NOT NULL,
  `dni` varchar(30) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `firstlastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `secondlastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `birthdate` date NOT NULL,
  `gender` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `enrollmentyear` int(11) NOT NULL,
  `responsable` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Estructura de tabla para la tabla `phone`
--

CREATE TABLE `phone` (
  `pk` int(11) NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fkperson` int(11) NOT NULL,
  `datastate` bit(1) NOT NULL DEFAULT b'1',
  `usertransacction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`pk`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fkdaynumber` (`fkdaynumber`),
  ADD KEY `fkhour` (`fkhour`),
  ADD KEY `fkarea` (`fkarea`);

--
-- Indices de la tabla `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`pk`);

--
-- Indices de la tabla `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fkperson` (`fkperson`),
  ADD KEY `fkcourse` (`fkcourse`);

--
-- Indices de la tabla `enrollmentstatus`
--
ALTER TABLE `enrollmentstatus`
  ADD PRIMARY KEY (`pk`);

--
-- Indices de la tabla `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`pk`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`pk`);

--
-- Indices de la tabla `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`pk`),
  ADD KEY `fkperson` (`fkperson`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `days`
--
ALTER TABLE `days`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313;
--
-- AUTO_INCREMENT de la tabla `enrollmentstatus`
--
ALTER TABLE `enrollmentstatus`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `hours`
--
ALTER TABLE `hours`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=899;
--
-- AUTO_INCREMENT de la tabla `phone`
--
ALTER TABLE `phone`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=944;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`fkdaynumber`) REFERENCES `days` (`pk`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`fkhour`) REFERENCES `hours` (`pk`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`fkarea`) REFERENCES `areas` (`pk`) ON DELETE CASCADE;

--
-- Filtros para la tabla `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`fkperson`) REFERENCES `person` (`pk`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`fkcourse`) REFERENCES `course` (`pk`) ON DELETE CASCADE;

--
-- Filtros para la tabla `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`fkperson`) REFERENCES `person` (`pk`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
