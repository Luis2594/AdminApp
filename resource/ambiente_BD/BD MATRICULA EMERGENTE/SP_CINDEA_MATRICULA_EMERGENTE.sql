
DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `areasAll` ()  BEGIN
START TRANSACTION;
	SELECT * FROM areas;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `areasByPk` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM areas WHERE pk = pk_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `areasDelete` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	IF EXISTS(SELECT * FROM areas WHERE pk = pk_)
    THEN
		DELETE FROM areas WHERE pk = pk_;
        SELECT 1;
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `areasInsert` (IN `description_` NVARCHAR(100), IN `usertransacction_` NVARCHAR(50))  BEGIN
	START TRANSACTION;

	IF NOT EXISTS (SELECT * FROM areas WHERE description = description_)
	THEN
		INSERT INTO areas (
			description, usertransacction
		) VALUES (
			description_, usertransacction_
		);
		SELECT LAST_INSERT_ID();
	ELSE
		SELECT 0;
	END IF;
	COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `areasUpdate` (IN `pk_` INT, IN `description_` NVARCHAR(100), IN `datastate_` BIT, IN `usertransacction_` NVARCHAR(50))  BEGIN
	START TRANSACTION;
    
	UPDATE areas 
	SET description=description_,
		datastate=datastate_,
		usertransacction=usertransacction_
	WHERE pk = pk_;
    SELECT 1;
	COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmCode` (IN `cod_` NVARCHAR(10))  BEGIN
	START TRANSACTION;

		IF NOT EXISTS (SELECT * FROM course WHERE cod = cod_)
		THEN
			SELECT 0;
		ELSE
			SELECT 1;
		END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `courseAll` ()  BEGIN
START TRANSACTION;
	SELECT 
    course.pk,
    course.cod,
    course.description,
    areas.description as area, 
    days.description as days, 
    hours.description as hours, 
    course.datastate,course.usertransacction
    FROM course
    INNER JOIN hours ON course.fkhour = hours.pk
    INNER JOIN areas ON course.fkarea = areas.pk
    INNER JOIN days ON course.fkdaynumber = days.pk;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `courseByArea` (IN `area_` INT)  BEGIN
START TRANSACTION;
    SELECT course.pk,course.cod,course.description,areas.description as area, 
    days.description as days, 
    hours.description as hours, 
    course.datastate,
    course.usertransacction
    FROM course
    INNER JOIN hours ON course.fkhour = hours.pk
    INNER JOIN areas ON course.fkarea = areas.pk
    INNER JOIN days ON course.fkdaynumber = days.pk
    WHERE course.fkarea = area_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `courseByPk` (IN `pk_` INT)  BEGIN
START TRANSACTION;
   SELECT course.pk,course.cod,course.description,areas.description as area, 
    days.description as days, 
    hours.description as hours, 
    course.datastate,
    course.usertransacction
    FROM course
    INNER JOIN hours ON course.fkhour = hours.pk
    INNER JOIN areas ON course.fkarea = areas.pk
    INNER JOIN days ON course.fkdaynumber = days.pk
    WHERE course.pk = pk_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `courseDelete` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM course WHERE pk = pk_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `courseInsert` (IN `cod_` NVARCHAR(20), IN `description_` NVARCHAR(100), IN `fkarea_` INT, IN `fkdaynumber_` INT, IN `fkhour_` INT, IN `datastate_` BIT, IN `usertransacction_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	INSERT INTO course (cod, description, fkarea, fkdaynumber, fkhour, datastate, usertransacction) 
    VALUES (cod_, description_, fkarea_, fkdaynumber_, fkhour_, datastate_, usertransacction_);
    SELECT LAST_INSERT_ID();
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `courseUpdate` (IN `pk_` INT, IN `cod_` NVARCHAR(20), IN `description_` NVARCHAR(100), IN `fkarea_` INT, IN `fkdaynumber_` INT, IN `fkhour_` INT, IN `datastate_` BIT, IN `usertransacction_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	UPDATE course
    SET cod = cod_,
		description = description_,
        fkarea = fkarea_,
        fkdaynumber = fkdaynumber_, 
        fkhour = fkhour_, 
        datastate = datastate_, 
        usertransacction =  usertransacction_
    WHERE pk = pk_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentAll` ()  BEGIN
START TRANSACTION;
	SELECT * FROM enrollment;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentByPerson` (IN `fkperson_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM enrollment WHERE fkperson = fkperson_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentByPk` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM enrollment WHERE pk = pk_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentCourseByPerson` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	SELECT enrollment.pk as enrollment,
    course.cod,
    course.description,
    areas.description as area, 
    days.description as days, 
    hours.description as hours,
    enrollmentstatus.description as statu,
    enrollment.enrollmentyear,
    course.datastate,
    course.usertransacction
    FROM course
    INNER JOIN enrollment ON course.pk = enrollment.fkcourse
    INNER JOIN enrollmentstatus ON enrollment.enrollmentstatus = enrollmentstatus.pk
    INNER JOIN hours ON course.fkhour = hours.pk
    INNER JOIN areas ON course.fkarea = areas.pk
    INNER JOIN days ON course.fkdaynumber = days.pk
    WHERE enrollment.fkperson = pk_ AND enrollment.enrollmentstatus = 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentDelete` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM enrollment WHERE pk = pk_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentInsert` (IN `fkperson_` INT, IN `fkcourse_` INT, IN `enrollmentyear_` INT, IN `enrollmentstatus_` INT, IN `usertransacction_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	INSERT INTO enrollment (fkperson, fkcourse, enrollmentyear, enrollmentstatus,usertransacction) 
    VALUES (fkperson_, fkcourse_, enrollmentyear_, enrollmentstatus_, usertransacction_);
    SELECT LAST_INSERT_ID();
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentUpdate` (IN `pk_` INT, IN `fkperson_` INT, IN `fkcourse_` INT, IN `enrollmentyear_` INT, IN `enrollmentstatus_` INT, IN `datastate_` BIT, IN `usertransacction_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	UPDATE enrollment
    SET fkperson = fkperson_, 
		fkcourse = fkcourse_,
		enrollmentyear = enrollmentyear_, 
		enrollmentstatus = enrollmentstatus_,
		datastate = datastate_,
		usertransacction = usertransacction_
    WHERE pk = pk_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentsByCourse` (IN `course_` INT, IN `year_` INT)  BEGIN
START TRANSACTION;
	SELECT *
    FROM course
    INNER JOIN enrollment ON course.pk = enrollment.fkcourse
    INNER JOIN person ON enrollment.fkperson = person.pk
    INNER JOIN phone ON phone.fkperson = person.pk
    WHERE enrollment.enrollmentyear = year_ AND course.pk = course_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personAll` ()  BEGIN
START TRANSACTION;
	SELECT * FROM person;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personByPk` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM person WHERE pk = pk_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personConfirmDni` (IN `dni_` NVARCHAR(30))  BEGIN
	START TRANSACTION;

		IF NOT EXISTS (SELECT * FROM person WHERE dni = dni_)
		THEN
			SELECT 0;
		ELSE
			SELECT 1;
		END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personDelete` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	IF EXISTS(SELECT * FROM person WHERE pk = pk_)
    THEN
		DELETE FROM person WHERE pk = pk_;
        SELECT 1;
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personInsert` (IN `dni_` NVARCHAR(30), IN `firstname_` NVARCHAR(50), IN `firstlastname_` NVARCHAR(50), IN `secondlastname_` NVARCHAR(50), IN `birthdate_` DATE, IN `gender_` CHAR(1), IN `nationality_` NVARCHAR(50), IN `enrollmentyear_` INT, IN `responsable_` NVARCHAR(100), IN `address_` NVARCHAR(500), IN `usertransacction_` NVARCHAR(50))  BEGIN
	START TRANSACTION;

	IF NOT EXISTS (SELECT * FROM person WHERE dni = dni_)
	THEN
		INSERT INTO person (
			dni,firstname,firstlastname,secondlastname,birthdate,gender,nationality,enrollmentyear,responsable,address,usertransacction
		) VALUES (
			dni_,
			firstname_,
			firstlastname_,
			secondlastname_,
			birthdate_,
			gender_,
			nationality_,
			enrollmentyear_,
			responsable_,
			address_,
			usertransacction_
		);
		SELECT LAST_INSERT_ID();
	ELSE
		SELECT 0;
	END IF;
	COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `personUpdate` (IN `pk_` INT, IN `dni_` NVARCHAR(30), IN `firstname_` NVARCHAR(50), IN `firstlastname_` NVARCHAR(50), IN `secondlastname_` NVARCHAR(50), IN `birthdate_` DATE, IN `gender_` CHAR(1), IN `nationality_` NVARCHAR(50), IN `enrollmentyear_` INT, IN `responsable_` NVARCHAR(100), IN `address_` NVARCHAR(500), IN `datastate_` BIT, IN `usertransacction_` NVARCHAR(50))  BEGIN
	START TRANSACTION;
    
	UPDATE person 
	SET dni=dni_,
		firstname=firstname_,
		firstlastname=firstlastname_,
		secondlastname=secondlastname_,
		birthdate=birthdate_,
		gender=gender_,
		nationality=nationality_,
		enrollmentyear=enrollmentyear_,
		responsable=responsable_,
		address=address_,
        datastate=datastate_,
		usertransacction=usertransacction_
	WHERE pk = pk_;
    SELECT 1;
	COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `phoneByPerson` (IN `fkperson_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM phone WHERE fkperson = fkperson_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `phoneByPk` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM phone WHERE pk = pk_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `phoneDelete` (IN `pk_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM phone WHERE pk = pk_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `phoneInsert` (IN `phone_` NVARCHAR(30), IN `fkperson_` INT, IN `usertransacction_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	INSERT INTO phone (phone, fkperson, usertransacction) VALUES (phone_, fkperson_, usertransacction_);
    SELECT LAST_INSERT_ID();
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `phoneUpdate` (IN `pk_` INT, IN `phone_` NVARCHAR(30), IN `datastate_` BIT, IN `usertransacction_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	UPDATE phone
    SET phone = phone_,
        datastate=datastate_,
		usertransacction=usertransacction_
    WHERE pk = pk_;
    SELECT 1;
COMMIT;
END$$

DELIMITER ;