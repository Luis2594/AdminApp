-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2018 a las 17:41:26
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

CREATE DATABASE institution;
USE institution;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `institution`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `coursecode` varchar(10) CHARACTER SET utf8 NOT NULL,
  `coursename` varchar(200) CHARACTER SET utf8 NOT NULL,
  `coursecredits` int(11) NOT NULL,
  `courselesson` int(11) NOT NULL,
  `coursepdf` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `coursespeciality` int(11) NOT NULL,
  `coursetype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `courseapproved`
--

CREATE TABLE `courseapproved` (
  `courseapprovedid` int(11) NOT NULL,
  `courseapprovedperson` int(11) NOT NULL,
  `courseapprovedcourse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courseperiod`
--

CREATE TABLE `courseperiod` (
  `courseid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `coursetype`
--

CREATE TABLE `coursetype` (
  `coursetypeid` int(11) NOT NULL,
  `coursetype` varchar(13) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE `curriculum` (
  `curriculumid` int(11) NOT NULL,
  `curriculumname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `curriculumyear` varchar(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `curriculumcourse`
--

CREATE TABLE `curriculumcourse` (
  `curriculumcourseid` int(11) NOT NULL,
  `curriculumcoursecurriculum` int(11) NOT NULL,
  `curriculumcoursecourse` int(11) NOT NULL,
  `curriculumcourseperiod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollmentid` int(11) NOT NULL,
  `enrollmentperson` int(11) NOT NULL,
  `enrollmentcourse` int(11) NOT NULL,
  `enrollmentgroup` int(11) NOT NULL,
  `enrollmentperiod` int(11) NOT NULL,
  `enrollmentstatus` int(11) NOT NULL,
  `enrollmentdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `forum`
--

CREATE TABLE `forum` (
  `forumid` int(11) NOT NULL,
  `forumname` varchar(80) CHARACTER SET utf8 NOT NULL,
  `forumcourse` int(11) NOT NULL,
  `forumgroup` int(11) NOT NULL,
  `forumprofessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forumcomment`
--

CREATE TABLE `forumcomment` (
  `forumcommentid` int(11) NOT NULL,
  `forumcommentcomment` varchar(400) CHARACTER SET utf8 NOT NULL,
  `forumcommentforumconversation` int(11) NOT NULL,
  `forumcommentperson` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forumconversation`
--

CREATE TABLE `forumconversation` (
  `forumconversationid` int(11) NOT NULL,
  `forumid` int(11) NOT NULL,
  `forumconversation` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `groupid` int(11) NOT NULL,
  `groupnumber` varchar(5) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `groupschedule`
--

CREATE TABLE `groupschedule` (
  `groupscheduleid` int(11) NOT NULL,
  `groupscheduleidgroup` int(11) NOT NULL,
  `groupscheduleidprofessor` int(11) NOT NULL,
  `groupscheduleidcourse` int(11) NOT NULL,
  `groupschedulehour` int(11) NOT NULL,
  `groupscheduleday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `institution`
--

CREATE TABLE `institution` (
  `institutionid` int(11) NOT NULL,
  `institutionname` varchar(80) CHARACTER SET utf8 NOT NULL,
  `institutionaddress` varchar(500) CHARACTER SET utf8 NOT NULL,
  `institutionfax` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `institutionphone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `institutionmission` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `institutionview` varchar(1000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE `notification` (
  `notificationid` int(11) NOT NULL,
  `notificationtext` varchar(400) CHARACTER SET utf8 NOT NULL,
  `notificationprofessor` int(11) DEFAULT NULL,
  `notificationcourse` int(11) DEFAULT NULL,
  `notificationstudent` int(11) DEFAULT NULL,
  `notificationforum` int(11) DEFAULT NULL,
  `notificationread` int(11) DEFAULT NULL,
  `notificationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `period`
--

CREATE TABLE `period` (
  `periodid` int(11) NOT NULL,
  `period` varchar(3) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `personid` int(11) NOT NULL,
  `persondni` varchar(30) CHARACTER SET utf8 NOT NULL,
  `personfirstname` varchar(42) CHARACTER SET utf8 NOT NULL,
  `personfirstlastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `personsecondlastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `personemail` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `personbirthdate` date NOT NULL,
  `personage` int(11) NOT NULL,
  `persongender` char(1) DEFAULT NULL,
  `personnationality` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `personimage` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `personuser`
--

CREATE TABLE `personuser` (
  `userid` int(11) NOT NULL,
  `userusername` varchar(30) CHARACTER SET utf8 NOT NULL,
  `useruserpass` varchar(30) CHARACTER SET utf8 NOT NULL,
  `userusertype` int(11) NOT NULL,
  `userperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `phone`
--

CREATE TABLE `phone` (
  `phoneid` int(11) NOT NULL,
  `phonephone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phoneperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `professor`
--

CREATE TABLE `professor` (
  `professorid` int(11) NOT NULL,
  `professorperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `professorcourse`
--

CREATE TABLE `professorcourse` (
  `professorcourseid` int(11) NOT NULL,
  `professorcourseperson` int(11) NOT NULL,
  `professorcoursegroup` int(11) NOT NULL,
  `professorcourseperiod` int(11) NOT NULL,
  `professorcoursecourse` int(11) NOT NULL,
  `professorcourseyear` varchar(4) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `requirement`
--

CREATE TABLE `requirement` (
  `requirementid` int(11) NOT NULL,
  `requirementcourse` int(11) NOT NULL,
  `requirementcourserequired` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speciality`
--

CREATE TABLE `speciality` (
  `specialityid` int(11) NOT NULL,
  `specialityname` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `studentadecuacy` int(11) NOT NULL,
  `studentyearincome` varchar(4) CHARACTER SET utf8 NOT NULL,
  `studentyearout` varchar(4) CHARACTER SET utf8 DEFAULT '0000',
  `studentlocation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `studentmanager` varchar(50) CHARACTER SET utf8 NOT NULL,
  `studentperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `studentcourse`
--

CREATE TABLE `studentcourse` (
  `studentcourseid` int(11) NOT NULL,
  `studentcourseperson` int(11) NOT NULL,
  `studentcoursecourse` int(11) NOT NULL,
  `studentcourseperiod` int(11) NOT NULL,
  `studentcourseyear` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `studentcourseenrollment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `studentforum`
--

CREATE TABLE `studentforum` (
  `studentforumforum` int(11) NOT NULL,
  `studentforumstudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `studentsgroup`
--

CREATE TABLE `studentsgroup` (
  `studentgroupgroup` int(11) NOT NULL,
  `studentgroupperson` int(11) NOT NULL,
  `studentsgrouppriority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `coursespeciality` (`coursespeciality`),
  ADD KEY `coursetype` (`coursetype`);

--
-- Indices de la tabla `courseapproved`
--
ALTER TABLE `courseapproved`
  ADD PRIMARY KEY (`courseapprovedid`),
  ADD KEY `courseapprovedperson` (`courseapprovedperson`),
  ADD KEY `courseapprovedcourse` (`courseapprovedcourse`);

--
-- Indices de la tabla `courseperiod`
--
ALTER TABLE `courseperiod`
  ADD PRIMARY KEY (`courseid`,`periodid`),
  ADD KEY `periodid` (`periodid`);

--
-- Indices de la tabla `coursetype`
--
ALTER TABLE `coursetype`
  ADD PRIMARY KEY (`coursetypeid`);

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`curriculumid`);

--
-- Indices de la tabla `curriculumcourse`
--
ALTER TABLE `curriculumcourse`
  ADD PRIMARY KEY (`curriculumcourseid`),
  ADD KEY `curriculumcoursecurriculum` (`curriculumcoursecurriculum`),
  ADD KEY `curriculumcoursecourse` (`curriculumcoursecourse`),
  ADD KEY `curriculumcourseperiod` (`curriculumcourseperiod`);

--
-- Indices de la tabla `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollmentid`),
  ADD KEY `enrollmentperson` (`enrollmentperson`),
  ADD KEY `enrollmentcourse` (`enrollmentcourse`),
  ADD KEY `enrollmentgroup` (`enrollmentgroup`),
  ADD KEY `enrollmentperiod` (`enrollmentperiod`);

--
-- Indices de la tabla `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forumid`),
  ADD UNIQUE KEY `forumname` (`forumname`),
  ADD KEY `forumcourse` (`forumcourse`),
  ADD KEY `forumprofessor` (`forumprofessor`);

--
-- Indices de la tabla `forumcomment`
--
ALTER TABLE `forumcomment`
  ADD PRIMARY KEY (`forumcommentid`),
  ADD KEY `forumcommentforumconversation` (`forumcommentforumconversation`),
  ADD KEY `forumcommentperson` (`forumcommentperson`);

--
-- Indices de la tabla `forumconversation`
--
ALTER TABLE `forumconversation`
  ADD PRIMARY KEY (`forumconversationid`),
  ADD KEY `forumid` (`forumid`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupid`);

--
-- Indices de la tabla `groupschedule`
--
ALTER TABLE `groupschedule`
  ADD PRIMARY KEY (`groupscheduleid`),
  ADD KEY `groupscheduleidgroup` (`groupscheduleidgroup`),
  ADD KEY `groupscheduleidprofessor` (`groupscheduleidprofessor`),
  ADD KEY `groupscheduleidcourse` (`groupscheduleidcourse`);

--
-- Indices de la tabla `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`institutionid`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationid`);

--
-- Indices de la tabla `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`periodid`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personid`);

--
-- Indices de la tabla `personuser`
--
ALTER TABLE `personuser`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userusername` (`userusername`),
  ADD UNIQUE KEY `userperson` (`userperson`);

--
-- Indices de la tabla `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneid`),
  ADD KEY `phoneperson` (`phoneperson`);

--
-- Indices de la tabla `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`professorid`),
  ADD KEY `professorperson` (`professorperson`);

--
-- Indices de la tabla `professorcourse`
--
ALTER TABLE `professorcourse`
  ADD PRIMARY KEY (`professorcourseid`),
  ADD KEY `professorcourseperson` (`professorcourseperson`),
  ADD KEY `professorcoursecourse` (`professorcoursecourse`),
  ADD KEY `professorcoursegroup` (`professorcoursegroup`),
  ADD KEY `professorcourseperiod` (`professorcourseperiod`);

--
-- Indices de la tabla `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`requirementid`),
  ADD KEY `requirementcourse` (`requirementcourse`),
  ADD KEY `requirementcourserequired` (`requirementcourserequired`);

--
-- Indices de la tabla `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`specialityid`),
  ADD UNIQUE KEY `specialityname` (`specialityname`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `studentperson` (`studentperson`);

--
-- Indices de la tabla `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD PRIMARY KEY (`studentcourseid`),
  ADD KEY `studentcourseperson` (`studentcourseperson`),
  ADD KEY `studentcoursecourse` (`studentcoursecourse`),
  ADD KEY `studentcourseperiod` (`studentcourseperiod`),
  ADD KEY `studentcourseenrollment` (`studentcourseenrollment`);

--
-- Indices de la tabla `studentforum`
--
ALTER TABLE `studentforum`
  ADD PRIMARY KEY (`studentforumforum`,`studentforumstudent`),
  ADD KEY `studentforumstudent` (`studentforumstudent`);

--
-- Indices de la tabla `studentsgroup`
--
ALTER TABLE `studentsgroup`
  ADD PRIMARY KEY (`studentgroupgroup`,`studentgroupperson`),
  ADD KEY `studentgroupperson` (`studentgroupperson`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `courseapproved`
--
ALTER TABLE `courseapproved`
  MODIFY `courseapprovedid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `coursetype`
--
ALTER TABLE `coursetype`
  MODIFY `coursetypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `curriculumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `curriculumcourse`
--
ALTER TABLE `curriculumcourse`
  MODIFY `curriculumcourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5794;
--
-- AUTO_INCREMENT de la tabla `forum`
--
ALTER TABLE `forum`
  MODIFY `forumid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `forumcomment`
--
ALTER TABLE `forumcomment`
  MODIFY `forumcommentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `forumconversation`
--
ALTER TABLE `forumconversation`
  MODIFY `forumconversationid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `groupschedule`
--
ALTER TABLE `groupschedule`
  MODIFY `groupscheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;
--
-- AUTO_INCREMENT de la tabla `institution`
--
ALTER TABLE `institution`
  MODIFY `institutionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT de la tabla `period`
--
ALTER TABLE `period`
  MODIFY `periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `personid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;
--
-- AUTO_INCREMENT de la tabla `personuser`
--
ALTER TABLE `personuser`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;
--
-- AUTO_INCREMENT de la tabla `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=869;
--
-- AUTO_INCREMENT de la tabla `professor`
--
ALTER TABLE `professor`
  MODIFY `professorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `professorcourse`
--
ALTER TABLE `professorcourse`
  MODIFY `professorcourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT de la tabla `requirement`
--
ALTER TABLE `requirement`
  MODIFY `requirementid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `speciality`
--
ALTER TABLE `speciality`
  MODIFY `specialityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;
--
-- AUTO_INCREMENT de la tabla `studentcourse`
--
ALTER TABLE `studentcourse`
  MODIFY `studentcourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5794;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`coursespeciality`) REFERENCES `speciality` (`specialityid`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`coursetype`) REFERENCES `coursetype` (`coursetypeid`);

--
-- Filtros para la tabla `courseapproved`
--
ALTER TABLE `courseapproved`
  ADD CONSTRAINT `courseapproved_ibfk_1` FOREIGN KEY (`courseapprovedperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE,
  ADD CONSTRAINT `courseapproved_ibfk_2` FOREIGN KEY (`courseapprovedcourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `courseperiod`
--
ALTER TABLE `courseperiod`
  ADD CONSTRAINT `courseperiod_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `courseperiod_ibfk_2` FOREIGN KEY (`periodid`) REFERENCES `period` (`periodid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `curriculumcourse`
--
ALTER TABLE `curriculumcourse`
  ADD CONSTRAINT `curriculumcourse_ibfk_1` FOREIGN KEY (`curriculumcoursecurriculum`) REFERENCES `curriculum` (`curriculumid`) ON DELETE CASCADE,
  ADD CONSTRAINT `curriculumcourse_ibfk_2` FOREIGN KEY (`curriculumcoursecourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `curriculumcourse_ibfk_3` FOREIGN KEY (`curriculumcourseperiod`) REFERENCES `period` (`periodid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`enrollmentperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`enrollmentcourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_3` FOREIGN KEY (`enrollmentgroup`) REFERENCES `groups` (`groupid`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_4` FOREIGN KEY (`enrollmentperiod`) REFERENCES `period` (`periodid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`forumcourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_ibfk_2` FOREIGN KEY (`forumprofessor`) REFERENCES `professor` (`professorperson`);

--
-- Filtros para la tabla `forumcomment`
--
ALTER TABLE `forumcomment`
  ADD CONSTRAINT `forumcomment_ibfk_1` FOREIGN KEY (`forumcommentforumconversation`) REFERENCES `forumconversation` (`forumconversationid`) ON DELETE CASCADE,
  ADD CONSTRAINT `forumcomment_ibfk_2` FOREIGN KEY (`forumcommentperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `forumconversation`
--
ALTER TABLE `forumconversation`
  ADD CONSTRAINT `forumconversation_ibfk_1` FOREIGN KEY (`forumid`) REFERENCES `forum` (`forumid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `groupschedule`
--
ALTER TABLE `groupschedule`
  ADD CONSTRAINT `groupschedule_ibfk_1` FOREIGN KEY (`groupscheduleidgroup`) REFERENCES `groups` (`groupid`) ON DELETE CASCADE,
  ADD CONSTRAINT `groupschedule_ibfk_2` FOREIGN KEY (`groupscheduleidprofessor`) REFERENCES `person` (`personid`) ON DELETE CASCADE,
  ADD CONSTRAINT `groupschedule_ibfk_3` FOREIGN KEY (`groupscheduleidcourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personuser`
--
ALTER TABLE `personuser`
  ADD CONSTRAINT `personuser_ibfk_1` FOREIGN KEY (`userperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`phoneperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`professorperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `professorcourse`
--
ALTER TABLE `professorcourse`
  ADD CONSTRAINT `professorcourse_ibfk_1` FOREIGN KEY (`professorcourseperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE,
  ADD CONSTRAINT `professorcourse_ibfk_2` FOREIGN KEY (`professorcoursecourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `professorcourse_ibfk_3` FOREIGN KEY (`professorcoursegroup`) REFERENCES `groups` (`groupid`) ON DELETE CASCADE,
  ADD CONSTRAINT `professorcourse_ibfk_4` FOREIGN KEY (`professorcourseperiod`) REFERENCES `period` (`periodid`);

--
-- Filtros para la tabla `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `requirement_ibfk_1` FOREIGN KEY (`requirementcourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `requirement_ibfk_2` FOREIGN KEY (`requirementcourserequired`) REFERENCES `course` (`courseid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`studentperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD CONSTRAINT `studentcourse_ibfk_1` FOREIGN KEY (`studentcourseperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentcourse_ibfk_2` FOREIGN KEY (`studentcoursecourse`) REFERENCES `course` (`courseid`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentcourse_ibfk_3` FOREIGN KEY (`studentcourseperiod`) REFERENCES `period` (`periodid`),
  ADD CONSTRAINT `studentcourse_ibfk_4` FOREIGN KEY (`studentcourseenrollment`) REFERENCES `enrollment` (`enrollmentid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `studentforum`
--
ALTER TABLE `studentforum`
  ADD CONSTRAINT `studentforum_ibfk_1` FOREIGN KEY (`studentforumforum`) REFERENCES `forum` (`forumid`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentforum_ibfk_2` FOREIGN KEY (`studentforumstudent`) REFERENCES `student` (`studentid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `studentsgroup`
--
ALTER TABLE `studentsgroup`
  ADD CONSTRAINT `studentsgroup_ibfk_1` FOREIGN KEY (`studentgroupgroup`) REFERENCES `groups` (`groupid`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentsgroup_ibfk_2` FOREIGN KEY (`studentgroupperson`) REFERENCES `person` (`personid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
