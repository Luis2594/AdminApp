DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmCode` (IN `coursecode_` NVARCHAR(10))  BEGIN
	START TRANSACTION;

		IF NOT EXISTS (SELECT * FROM course WHERE coursecode = coursecode_)
		THEN
			SELECT 0;
		ELSE
			SELECT 1;
		END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmDni` (IN `persondni_` NVARCHAR(30))  BEGIN
	START TRANSACTION;

		IF NOT EXISTS (SELECT * FROM person WHERE persondni = persondni_)
		THEN
			SELECT 0;
		ELSE
			SELECT 1;
		END IF;
	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteComment` (IN `forumcommentid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM forumcomment WHERE forumcommentid = forumcommentid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCourse` (IN `courseid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM course WHERE courseid = courseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCourseApproved` (IN `courseapprovedid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM courseapproved WHERE courseapprovedid = courseapprovedid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCoursePeriod` (IN `courseid_` INT, IN `periodid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM courseperiod WHERE courseperiod.courseid = courseid_ AND courseperiod.periodid = periodid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCurriculumCourse` (IN `curriculumcourseid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM curriculumcourse WHERE curriculumcourseid = curriculumcourseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEnrollment` (IN `enrollmentid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM enrollment 
    WHERE enrollmentid = enrollmentid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteForum` (IN `forumid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM forum WHERE forumid = forumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteForumConversation` (IN `forumconversationid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM forumconversation WHERE forumconversationid = forumconversationid_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePerson` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	IF EXISTS(SELECT * FROM person WHERE personid = personid_)
    THEN
		DELETE FROM person WHERE personid = personid_;
        CALL deleteUser(personid_);
        SELECT 1;
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePhone` (IN `phoneid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM phone WHERE phoneid = phoneid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteProfessor` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM person WHERE personid = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteProfessorCourse` (IN `professorcourseid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM professorcourse WHERE professorcourseid = professorcourseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteRequirement` (IN `requirementid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM requirement WHERE requirementid = requirementid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSchedule` (IN `id` INT)  BEGIN
	DELETE FROM groupschedule
    WHERE groupscheduleid = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteScheduleByGroup` (IN `idGroup` INT)  BEGIN
	DELETE FROM groupschedule
    WHERE groupscheduleidgroup = idGroup;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSpeciality` (IN `specialityid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM speciality WHERE specialityid = specialityid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteStudent` (IN `studentid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM student WHERE studentid = studentid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteStudentCourse` (IN `studentcourseid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM studentcourse WHERE studentcourseid = studentcourseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteStudentForum` (IN `studentforumstudent_` INT, IN `studentforumforum_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM studentforum WHERE studentforumstudent = studentforumstudent_ AND studentforumforum = studentforumforum_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteStudentGroup` (IN `studentgroupperson_` INT, IN `studentgroupgroup_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM studentsgroup 
    WHERE studentgroupperson = studentgroupperson_ AND studentgroupgroup = studentgroupgroup_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUser` (IN `userperson_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM personuser WHERE userperson = userperson_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deteleAllGroups` ()  BEGIN
START TRANSACTION;
	DELETE FROM groups WHERE 1 = 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deteleCurriculum` (IN `curriculumid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM curriculum WHERE curriculumid = curriculumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deteleGroup` (IN `groupid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM groups WHERE groupid = groupid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deteleInstitution` (IN `institutionid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM institution WHERE institutionid = institutionid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deteleNotification` (IN `notificationid_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM notification WHERE notificationid = notificationid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deteleNotificationProfessor` (IN `text_` NVARCHAR(500), IN `professor_` INT, IN `course_` INT)  BEGIN
START TRANSACTION;
	DELETE FROM notification WHERE notificationtext = text_ AND notificationprofessor = professor_ AND notificationcourse = course_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enrollmentActions` (IN `enrollment_` INT, IN `value_` INT)  BEGIN
START TRANSACTION;
	UPDATE enrollment
    SET enrollmentstatus = value_
    WHERE enrollmentid = enrollment_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllAdmin` ()  BEGIN
START TRANSACTION;
	SELECT personid,persondni,personfirstname,personfirstlastname,personsecondlastname,personemail,
    personbirthdate,personage,persongender,personnationality,personimage
    FROM person INNER JOIN personuser ON person.personid = personuser.userperson
    WHERE personuser.userusertype = 2;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllComment` ()  BEGIN
START TRANSACTION;
	SELECT * FROM forumcomment;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCourse` ()  BEGIN
START TRANSACTION;
	SELECT * FROM (course INNER JOIN speciality ON course.coursespeciality = speciality.specialityid)
    INNER JOIN coursetype ON course.coursetype = coursetype.coursetypeid;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCourseApproved` ()  BEGIN
START TRANSACTION;
	SELECT * FROM courseapproved;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCoursePeriod` ()  BEGIN
START TRANSACTION;
	SELECT * FROM courseperiod;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCourseWithoutPeriod` ()  BEGIN
START TRANSACTION;
	SELECT * FROM course INNER JOIN speciality ON course.coursespeciality = speciality.specialityid;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCourseWithoutPeriodById` (IN `courseid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM course INNER JOIN speciality ON course.coursespeciality = speciality.specialityid WHERE courseid = courseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCurriculum` ()  BEGIN
START TRANSACTION;
	SELECT * FROM curriculum;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCurriculumCourse` ()  BEGIN
START TRANSACTION;
	SELECT * 
    FROM (curriculumcourse 
    INNER JOIN course ON course.courseid = curriculumcourse.curriculumcoursecourse )
    INNER JOIN curriculum ON curriculumcourse.curriculumcoursecurriculum = curriculum.curriculumid;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCurriculumCourseParsed` ()  BEGIN
START TRANSACTION;
	SELECT curriculumcourseid, curriculumcoursecurriculum, curriculumcoursecourse, period
    FROM (curriculumcourse 
    INNER JOIN course ON course.courseid = curriculumcourse.curriculumcoursecourse )
    INNER JOIN curriculum ON curriculumcourse.curriculumcoursecurriculum = curriculum.curriculumid
    INNER JOIN period ON curriculumcourseperiod = period.periodid;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllForum` ()  BEGIN
START TRANSACTION;
	SELECT * FROM  forum 
    INNER JOIN professor ON forum.forumprofessor = professor.professorperson 
    INNER JOIN course ON course.courseid = forum.forumcourse ;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllForumConversation` ()  BEGIN
START TRANSACTION;
	SELECT * FROM forumconversation;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllGeneralNotification` ()  BEGIN
START TRANSACTION;
	SELECT * FROM notification
    WHERE notificationprofessor IS NULL AND
        notificationcourse IS NULL AND
        notificationstudent IS NULL AND
        notificationforum IS NULL
    ORDER BY notificationdate ASC;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllGroups` ()  BEGIN
START TRANSACTION;
	SELECT * FROM groups;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllNotification` ()  BEGIN
START TRANSACTION;
	SELECT * FROM notification WHERE notificationdate BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW() ORDER BY notificationdate ASC;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPerson` ()  BEGIN
START TRANSACTION;
	SELECT * FROM person;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPhonesByPerson` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM phone WHERE phoneperson = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllProfessor` ()  BEGIN
START TRANSACTION;
	SELECT * FROM (person INNER JOIN professor ON person.personid = professor.professorperson) INNER JOIN personuser ON person.personid = personuser.userperson;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllProfessorCourse` ()  BEGIN
START TRANSACTION;
	SELECT * FROM professorcourse INNER JOIN period ON period.periodid = professorcourse.professorcourseperiod INNER JOIN course ON course.courseid = professorcourse.professorcoursecourse ;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllRequirement` ()  BEGIN
START TRANSACTION;
	SELECT * FROM requirement;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllSpeciality` ()  BEGIN
START TRANSACTION;
	SELECT * FROM speciality;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudent` ()  BEGIN
START TRANSACTION;
	SELECT * FROM (person INNER JOIN student ON person.personid = student.studentperson) INNER JOIN personuser ON person.personid = personuser.userperson;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudentCourse` ()  BEGIN
START TRANSACTION;
	SELECT * FROM studentcourse INNER JOIN period ON period.periodid = studentcourse.studentcourseperiod INNER JOIN course ON course.courseid = studentcourse.studentcoursecourse ;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudentForum` ()  BEGIN
START TRANSACTION;
	SELECT * FROM studentforum;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudentGroup` ()  BEGIN
START TRANSACTION;
	SELECT * FROM studentgroup;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllUser` ()  BEGIN
START TRANSACTION;
	SELECT * FROM personuser;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCommentByConversation` (IN `forumcommentforumconversation_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM forumcomment WHERE forumcommentforumconversation = forumcommentforumconversation_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCommentByUser` (IN `forumcommentperson_` INT)  BEGIN
START TRANSACTION;
	SELECT forumcomment.forumcommentid, forumcomment.forumcommentcomment, forumcomment.forumcommentforumconversation, forumcomment.forumcommentperson
    FROM forumcomment 
    INNER JOIN forumconversation ON forumcomment.forumcommentforumconversation = forumconversation.forumconversationid
    INNER JOIN forum ON forumconversation.forumid = forum.forumid
    INNER JOIN enrollment ON enrollmentgroup = forumgroup AND enrollmentcourse = forumcourse
    INNER JOIN student ON enrollmentperson = student.studentperson
    WHERE student.studentperson = forumcommentperson_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getConversationByUser` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	SELECT forumconversation.forumconversationid, forumconversation.forumid, forumconversation.forumconversation 
    FROM forumconversation
    INNER JOIN forum ON forumconversation.forumid = forum.forumid
    INNER JOIN enrollment ON enrollmentgroup = forumgroup AND enrollmentcourse = forumcourse
    INNER JOIN student ON enrollmentperson = student.studentperson
    WHERE student.studentperson = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCourse` (IN `courseid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM course WHERE course.courseid = courseid_;
    
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCourseApprovedByPerson` (IN `courseapprovedperson_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM courseapproved WHERE courseapprovedperson = courseapprovedperson_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCourseById` (IN `courseid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM (course 
    INNER JOIN speciality 
    ON course.coursespeciality = speciality.specialityid) 
    INNER JOIN courseperiod 
    ON courseperiod.courseid = course.courseid 
    INNER JOIN period 
    ON courseperiod.periodid = period.periodid 
    WHERE course.courseid = courseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCourseByIdUpdate` (IN `courseid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM course WHERE course.courseid = courseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCourseByStudent` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT *
    FROM studentcourse INNER JOIN course ON course.courseid = studentcourse.studentcoursecourse
    INNER JOIN speciality ON course.coursespeciality = speciality.specialityid
    INNER JOIN coursetype ON course.coursetype = coursetype.coursetypeid
    WHERE studentcourse.studentcourseperson = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursePeriodByCourse` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM courseperiod INNER JOIN period ON courseperiod.periodid = period.periodid WHERE courseid = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursePeriodByPeriod` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM courseperiod WHERE periodid = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursePeriods` (IN `courseid_` INT)  BEGIN
START TRANSACTION;
	SELECT period.periodid, period.period 
    FROM course INNER JOIN period ON courseperiod.periodid = period.periodid 
    WHERE courseid = courseid_;
    
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesAllEnrollmentByStudent` (IN `enrollmentperson_` INT)  BEGIN
START TRANSACTION;
	SELECT enrollmentid, enrollmentstatus, enrollmentdate, courseid,
    coursecode, coursename, coursecredits, courselesson, coursepdf,
    groupnumber, period.period     FROM enrollment 
    INNER JOIN course ON enrollment.enrollmentcourse = course.courseid
    INNER JOIN groups ON enrollment.enrollmentgroup = groups.groupid
	    INNER JOIN period ON enrollment.enrollmentperiod = period.periodid
    WHERE enrollmentperson = enrollmentperson_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesApprovedByStudent` (IN `enrollmentperson_` INT)  BEGIN
START TRANSACTION;
	SELECT enrollmentid, enrollmentstatus, enrollmentdate, courseid,
    coursecode, coursename, coursecredits, courselesson, coursepdf,
    groupnumber, period.period     FROM enrollment 
    INNER JOIN course ON enrollment.enrollmentcourse = course.courseid
    INNER JOIN groups ON enrollment.enrollmentgroup = groups.groupid
	    INNER JOIN period ON enrollment.enrollmentperiod = period.periodid
    WHERE enrollmentperson = enrollmentperson_ AND enrollment.enrollmentstatus = 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesByProfessor` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT courseid,coursecode,coursename,coursecredits,courselesson,coursepdf,coursespeciality,coursetype, groups.groupnumber
    FROM professorcourse INNER JOIN course ON course.courseid = professorcourse.professorcoursecourse
    INNER JOIN groups ON professorcourse.professorcoursegroup = groups.groupid
    WHERE professorcourse.professorcourseperson = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesEnrollmentByStudent` (IN `enrollmentperson_` INT)  BEGIN
START TRANSACTION;
	SELECT enrollmentid, enrollmentstatus, enrollmentdate, courseid,
    coursecode, coursename, coursecredits, courselesson, coursepdf,
    groupnumber, period.period     FROM enrollment 
    INNER JOIN course ON enrollment.enrollmentcourse = course.courseid
    INNER JOIN groups ON enrollment.enrollmentgroup = groups.groupid
	    INNER JOIN period ON enrollment.enrollmentperiod = period.periodid
    WHERE enrollmentperson = enrollmentperson_ AND enrollment.enrollmentstatus = 2;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCoursesReprobateByStudent` (IN `enrollmentperson_` INT)  BEGIN
START TRANSACTION;
	SELECT enrollmentid, enrollmentstatus, enrollmentdate, courseid,
    coursecode, coursename, coursecredits, courselesson, coursepdf,
    groupnumber, period.period     FROM enrollment 
    INNER JOIN course ON enrollment.enrollmentcourse = course.courseid
    INNER JOIN groups ON enrollment.enrollmentgroup = groups.groupid
	    INNER JOIN period ON enrollment.enrollmentperiod = period.periodid
    WHERE enrollmentperson = enrollmentperson_ AND enrollment.enrollmentstatus = 0;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCurriculumById` (IN `curriculumid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM curriculum WHERE curriculumid = curriculumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCurriculumByYear` (IN `year_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM curriculum WHERE curriculumyear = year_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCurriculumCourseByCourse` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT courseid, coursecode, coursename, coursecredits, courselesson, coursepdf, coursespeciality, coursetype
    FROM (curriculumcourse 
    INNER JOIN course ON course.courseid = curriculumcourse.curriculumcoursecourse )
    INNER JOIN curriculum ON curriculumcourse.curriculumcoursecurriculum = curriculum.curriculumid
    WHERE curriculumcoursecurriculum = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCurriculumCourseByCurriculum` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT curriculumcourseid, 
    courseid, coursecode, 
    coursename, 
    coursecredits, 
    courselesson, 
    coursepdf, 
    specialityname, 
    coursetype.coursetype, 
    period.period,
    period.periodid
    FROM curriculumcourse 
    INNER JOIN course ON course.courseid = curriculumcourse.curriculumcoursecourse
    INNER JOIN curriculum ON curriculumcourse.curriculumcoursecurriculum = curriculum.curriculumid
    INNER JOIN speciality ON course.coursespeciality = speciality.specialityid
    INNER JOIN coursetype ON course.coursetype = coursetype.coursetypeid
    INNER JOIN period ON curriculumcourse.curriculumcourseperiod = period.periodid
    WHERE curriculumcoursecurriculum = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCurriculumCourseOutCurriculum` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * 
    FROM  
    (curriculumcourse 
    INNER JOIN course ON course.courseid = curriculumcourse.curriculumcoursecourse )
    INNER JOIN curriculum ON curriculumcourse.curriculumcoursecurriculum = curriculum.curriculumid
    WHERE curriculumcoursecurriculum != id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumById` (IN `forumid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM  forum
    INNER JOIN professor ON forum.forumprofessor = professor.professorperson 
    INNER JOIN course ON course.courseid = forum.forumcourse  
    WHERE forumid = forumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumByName` (IN `forumname_` NVARCHAR(80))  BEGIN
START TRANSACTION;
	SELECT * FROM  forum INNER JOIN professor ON forum.forumprofessor = professor.professorid INNER JOIN course ON course.courseid = forum.forumcourse  WHERE forumname = forumname_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumByProfessor` (IN `professorid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM forum 
    INNER JOIN professor ON forum.forumprofessor = professor.professorperson 
    INNER JOIN course ON course.courseid = forum.forumcourse WHERE forumprofessor = professorid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumByUser` (IN `userid_` INT)  BEGIN
START TRANSACTION;   
    SELECT forumid, forumname, forumcourse, forumgroup, forumprofessor FROM forum 
    INNER JOIN enrollment ON enrollmentgroup = forumgroup AND enrollmentcourse = forumcourse
    INNER JOIN student ON enrollmentperson = student.studentperson
    WHERE student.studentperson = userid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumConversationByConversation` (IN `forumconversation_` NVARCHAR(80))  BEGIN
START TRANSACTION;
	SELECT * FROM forumconversation WHERE forumconversation = forumconversation_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumConversationByForum` (IN `forumid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM forumconversation 
    WHERE forumid = forumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getForumConversationById` (IN `forumconversationid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM forumconversation WHERE forumconversationid = forumconversationid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGroupByNumber` (IN `number_` NVARCHAR(5))  BEGIN
START TRANSACTION;
	SELECT * FROM groups WHERE groupnumber = number_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGroupByStudent` (IN `studentgroupstudent_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM studentsgroup 
    INNER JOIN groups ON studentsgroup.studentgroupgroup = groups.groupid
    WHERE studentsgroup.studentgroupperson = studentgroupstudent_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGroupsById` (IN `groupid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM groups WHERE groupid = groupid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGroupsByPersonId` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM groups INNER JOIN studentsgroup ON groups.groupid = studentsgroup.studentgroupgroup 
    WHERE studentsgroup.studentgroupperson = id_ ORDER BY studentsgroup.studentsgrouppriority DESC;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGroupsByProfessor` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM groupschedule INNER JOIN groups ON groups.groupid = groupschedule.groupscheduleidgroup
    WHERE groupschedule.groupscheduleidprofessor = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGroupsByProfessorAndGroup` (IN `professor_` INT, IN `group_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM groupschedule WHERE groupscheduleidprofessor = professor_ AND groupscheduleidgroup = group_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getInstitution` ()  BEGIN
START TRANSACTION;
	SELECT * FROM institution;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getInstitutionById` (IN `institutionid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM institution WHERE institutionid = institutionid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotification` (IN `notificationid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM notification WHERE notificationid = notificationid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotificationByDate` (IN `notificationdate_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM notification WHERE notificationdate = notificationdate_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotificationByForum` (IN `notificationforum_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM notification WHERE notificationforum = notificationforum_ ORDER BY notificationdate ASC;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotificationByProfessor` (IN `notificationprofessor_` INT)  BEGIN
START TRANSACTION;
	SET sql_mode = '';
	SELECT notificationtext,
    notificationprofessor ,
    notificationcourse ,
    notificationstudent ,
    notificationforum ,
    notificationread ,
    notificationid ,
    notificationdate AS notDate FROM notification WHERE  notificationprofessor = notificationprofessor_ 
    GROUP BY notificationtext, notificationprofessor, notificationcourse
    ORDER BY notDate DESC;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotificationByStudent` (IN `notificationstudent_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM notification 
    WHERE (notificationstudent = notificationstudent_ or notificationstudent IS NULL)
    AND notificationdate BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()
    ORDER BY notificationdate ASC;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPersonById` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM person WHERE personid = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPhone` (IN `phoneid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM phone WHERE phoneid = phoneid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfessor` (IN `professorid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM (person INNER JOIN professor ON person.personid = professor.professorperson) INNER JOIN personuser ON person.personid = personuser.userperson WHERE professor.professorperson = professorid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfessorByPerson` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM person WHERE person.personid = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfessorCourseByCourseId` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM professorcourse 
    INNER JOIN period ON period.periodid = professorcourse.professorcourseperiod 
    INNER JOIN course ON course.courseid = professorcourse.professorcoursecourse  
    WHERE professorcoursecourse = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfessorCourseByPeriodAndYear` (IN `period_` INT, IN `year_` NVARCHAR(4))  BEGIN
START TRANSACTION;
	SELECT * FROM professorcourse INNER JOIN period ON period.periodid = professorcourse.professorcourseperiod INNER JOIN course ON course.courseid = professorcourse.professorcoursecourse  WHERE professorcourseperiod = period_ AND professorcourseyear = year_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfessorCourseByPersonId` (IN `idprofessor_` INT)  BEGIN
START TRANSACTION;
	SELECT professorcourseid, courseid, coursecode, coursename, coursecredits, courselesson, coursepdf, specialityname, coursetype.coursetype, groupnumber, period.period, professorcourseyear FROM professorcourse 
    INNER JOIN course ON professorcourse.professorcoursecourse = course.courseid
    INNER JOIN groups ON professorcourse.professorcoursegroup = groups.groupid
    INNER JOIN period ON professorcourse.professorcourseperiod = period.periodid
    INNER JOIN speciality ON course.coursespeciality = speciality.specialityid
    INNER JOIN coursetype ON course.coursetype = coursetype.coursetypeid
    WHERE professorcourse.professorcourseperson = idprofessor_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfessorLastId` ()  BEGIN
START TRANSACTION;
    SELECT MAX(personid) AS id FROM person;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRequirementByCourse` (IN `requirementcourse_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM requirement WHERE requirementcourse = requirementcourse_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getScheduleByGroup` (IN `idGroup` INT)  BEGIN
	SELECT groupscheduleid, coursecode, groupschedulehour, groupscheduleday FROM groupschedule 
    INNER JOIN course ON courseid = groupscheduleidcourse
    WHERE groupscheduleidgroup = idGroup;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getScheduleByProfessor` (IN `id` INT)  BEGIN
	SELECT groupscheduleid, coursecode, coursename, groupschedulehour, groupscheduleday FROM groupschedule 
    INNER JOIN course ON courseid = groupscheduleidcourse
    WHERE groupscheduleidprofessor = id;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getScheduleByStudent` (IN `id` INT)  BEGIN
	SELECT groupscheduleid, coursecode, groupschedulehour, groupscheduleday 
    FROM groupschedule 
    INNER JOIN course ON courseid = groupscheduleidcourse
    INNER JOIN studentsgroup ON studentgroupgroup = groupscheduleidgroup
    WHERE studentgroupperson = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSpecialityById` (IN `specialityid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM speciality WHERE specialityid = specialityid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudent` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM (person INNER JOIN student ON person.personid = student.studentperson) 
    INNER JOIN personuser ON person.personid = personuser.userperson WHERE person.personid = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentByCourse` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM studentcourse 
    INNER JOIN person ON person.personid = studentcourse.studentcourseperson 
    INNER JOIN course ON course.courseid = studentcourse.studentcoursecourse 
    WHERE studentcoursecourse = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentCourseByCourseId` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM studentcourse INNER JOIN period ON period.periodid = studentcourse.studentcourseperiod INNER JOIN course ON course.courseid = studentcourse.studentcoursecourse WHERE studentcoursecourse = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentCourseByPeriodAndYear` (IN `period_` INT, IN `year_` NVARCHAR(4))  BEGIN
START TRANSACTION;
	SELECT * FROM studentcourse INNER JOIN period ON period.periodid = studentcourse.studentcourseperiod INNER JOIN course ON course.courseid = studentcourse.studentcoursecourse WHERE period.periodid = period_ AND studentcourseyear = year_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentCourseByPersonId` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * 
    FROM studentcourse 
    INNER JOIN period ON period.periodid = studentcourse.studentcourseperiod 
    INNER JOIN course ON course.courseid = studentcourse.studentcoursecourse 
    WHERE studentcourseperson = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentForumByForum` (IN `id_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM studentforum WHERE studentforumforum = id_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentGroupByGroup` (IN `studentgroupgroup_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM studentsgroup
    WHERE studentgroupgroup = studentgroupgroup_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentsListByCourseAndProfessor` (IN `course_` INT, IN `professor_` INT)  BEGIN
START TRANSACTION;
	SELECT 
	CONCAT(p.personfirstname,' ' , p.personfirstlastname,' ', p.personsecondlastname) as fullName, p.persondni,
	(SELECT phone.phonephone FROM phone INNER JOIN person ON phone.phoneperson = person.personid WHERE person.personid = p.personid LIMIT 1 ) AS phoneNumber
	FROM professorcourse 
	INNER JOIN course ON course.courseid = professorcourse.professorcoursecourse
	INNER JOIN studentcourse ON studentcourse.studentcoursecourse = course.courseid
	INNER JOIN student ON student.studentperson = studentcourse.studentcourseperson
	INNER JOIN person p ON student.studentperson = p.personid
    WHERE professorcourse.professorcourseperson = professor_ AND professorcourse.professorcoursecourse = course_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserByPersonId` (IN `personid_` INT)  BEGIN
START TRANSACTION;
	SELECT * FROM personuser WHERE userperson = personid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAdminCredentials` (IN `person_` INT, IN `pass_` NVARCHAR(30))  BEGIN
START TRANSACTION;   
    CALL insertUser((SELECT persondni FROM person WHERE personid = person_), pass_, 2, person_);
    SELECT LAST_INSERT_ID();
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertComment` (IN `forumcommentcomment_` NVARCHAR(400), IN `forumcommentforumconversation_` INT, IN `forumcommentperson_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO forumcomment (forumcommentcomment, forumcommentforumconversation, forumcommentperson) 
    VALUES (forumcommentcomment_, forumcommentforumconversation_, forumcommentperson_);
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCourse` (IN `coursecode_` NVARCHAR(10), IN `coursename_` NVARCHAR(200), IN `coursecredits_` INT, IN `courselesson_` INT, IN `coursepdf_` NVARCHAR(20), IN `coursespeciality_` INT, IN `coursetype_` INT)  BEGIN
START TRANSACTION;
	IF NOT EXISTS(SELECT * FROM course WHERE coursecode = coursecode_)
    THEN
		INSERT INTO course (coursecode, coursename, coursecredits, courselesson, coursepdf, coursespeciality, coursetype) 
        VALUES (coursecode_, coursename_,coursecredits_, courselesson_, coursepdf_, coursespeciality_, coursetype_);
        SELECT LAST_INSERT_ID();
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCourseApproved` (IN `courseapprovedperson_` INT, IN `courseapprovedcourse_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO courseapproved (courseapprovedperson, courseapprovedcourse) 
    values (courseapprovedperson_, courseapprovedcourse_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCoursePeriod` (IN `courseid_` INT, IN `periodid_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO courseperiod (courseid, periodid)
    values (courseid_, periodid_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCurriculum` (IN `curriculumname_` NVARCHAR(100), IN `curriculumyear_` NVARCHAR(4))  BEGIN
START TRANSACTION;
	INSERT INTO curriculum (curriculumname, curriculumyear) 
	VALUES (curriculumname_, curriculumyear_);
    SELECT LAST_INSERT_ID();
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCurriculumCourse` (IN `curriculumcoursecurriculum_` INT, IN `curriculumcourseperiod_` INT, IN `curriculumcoursecourse_` INT)  BEGIN
START TRANSACTION;
    IF NOT EXISTS (SELECT * FROM curriculumcourse 
    WHERE curriculumcoursecurriculum = curriculumcoursecurriculum_
    AND curriculumcoursecourse = curriculumcoursecourse_
    AND curriculumcourseperiod = curriculumcourseperiod_)
	THEN
		INSERT INTO curriculumcourse (curriculumcoursecurriculum, curriculumcoursecourse, curriculumcourseperiod)
		VALUES (curriculumcoursecurriculum_, curriculumcoursecourse_, curriculumcourseperiod_);
	ELSE
		SELECT 0;
	END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEnrollment` (IN `enrollmentperson_` INT, IN `enrollmentcourse_` INT, IN `enrollmentgroup_` INT, IN `enrollmentperiod_` INT, IN `enrollmentstatus_` INT)  BEGIN
START TRANSACTION;

	IF NOT EXISTS (SELECT * FROM enrollment WHERE enrollmentperson = enrollmentperson_ 
				AND enrollmentcourse = enrollmentcourse_
				                AND (enrollmentstatus = 2 OR enrollmentstatus = 1)
				AND enrollmentperiod = enrollmentperiod_)
	THEN
		INSERT INTO enrollment (enrollmentperson, enrollmentcourse, 
        enrollmentgroup, enrollmentperiod, enrollmentstatus, enrollmentdate)
		VALUES (enrollmentperson_, enrollmentcourse_, 
        enrollmentgroup_, enrollmentperiod_, enrollmentstatus_, CURDATE());
        
        SELECT LAST_INSERT_ID() AS id;
	ELSE
		SELECT 0;
	END IF;
	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertForum` (IN `forumname_` NVARCHAR(80), IN `forumcourse_` INT, IN `forumgroup_` INT, IN `forumprofessor_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO forum (forumname, forumcourse, forumgroup, forumprofessor) VALUES (forumname_, forumcourse_, forumgroup_, forumprofessor_);
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertForumConversation` (IN `forumid_` INT, IN `forumconversation_` NVARCHAR(100))  BEGIN
START TRANSACTION;
	INSERT INTO forumconversation (forumid, forumconversation) VALUES (forumid_, forumconversation_);
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertFullNotification` (IN `notificationtext_` NVARCHAR(400), IN `notificationprofessor_` INT, IN `notificationcourse_` INT, IN `notificationstudent_` INT, IN `notificationforum_` INT, IN `notificationread_` INT, IN `notificationdate_` DATE)  BEGIN
START TRANSACTION;
	INSERT INTO notification (notificationtext, notificationprofessor, notificationcourse, notificationstudent, notificationforum, notificationread, notificationdate) 
    VALUES (notificationtext_, notificationprofessor_, notificationcourse_, notificationstudent_, notificationforum_, notificationread_, notificationdate_) ;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGeneralNotification` (IN `notificationtext_` NVARCHAR(400))  BEGIN
START TRANSACTION;
	INSERT INTO notification (notificationtext, notificationread, notificationdate) 
    VALUES (notificationtext_, 0, CURDATE()) ;
    SELECT LAST_INSERT_ID() AS id;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroup` (IN `groupnumber_` NVARCHAR(65))  BEGIN
START TRANSACTION;
	INSERT INTO groups (groupnumber) 
	VALUES (groupnumber_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupSchedule` (IN `groupscheduleidgroup_` INT, IN `groupscheduleidprofessor_` INT, IN `groupscheduleidcourse_` INT, IN `groupschedulehour_` INT, IN `groupscheduleday_` INT)  BEGIN
START TRANSACTION;

	IF NOT EXISTS (SELECT * FROM groupschedule 
				   WHERE groupscheduleidgroup = groupscheduleidgroup_
                   AND groupschedulehour = groupschedulehour_
                   AND groupscheduleday = groupscheduleday_)
	THEN
		INSERT INTO groupschedule (groupscheduleidgroup, groupscheduleidprofessor, groupscheduleidcourse,
							   groupschedulehour, groupscheduleday)
    VALUES (groupscheduleidgroup_, groupscheduleidprofessor_, groupscheduleidcourse_,
			groupschedulehour_, groupscheduleday_);
            SELECT 1;
    ELSE
		SELECT 0;
	END IF;

	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertInstitution` (IN `institutionname_` NVARCHAR(80), IN `institutionaddress_` NVARCHAR(500), IN `institutionfax_` NVARCHAR(20), IN `institutionphone_` NVARCHAR(20), IN `institutionmission_` NVARCHAR(1000), IN `institutionview_` NVARCHAR(1000))  BEGIN
START TRANSACTION;
	INSERT INTO institution (institutionname, institutionaddress, institutionfax, institutionphone, institutionmission, institutionview) 
    VALUES (institutionname_, institutionaddress_, institutionfax_, institutionphone_, institutionmission_, institutionview_);
    SELECT LAST_INSERT_ID();
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertNotificationFromProfessor` (IN `notificationprofessor_` INT, IN `notificationcourse_` INT, IN `notificationstudent_` INT, IN `notificationtext_` NVARCHAR(400))  BEGIN
START TRANSACTION;
	INSERT INTO notification (notificationtext, notificationprofessor, notificationcourse, notificationstudent, notificationdate) 
    VALUES (notificationtext_, notificationprofessor_, notificationcourse_, notificationstudent_, CURDATE()) ;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPerson` (IN `persondni_` NVARCHAR(30), IN `personfirstname_` NVARCHAR(42), IN `personfirstlastname_` NVARCHAR(50), IN `personsecondlastname_` NVARCHAR(50), IN `personemail_` NVARCHAR(50), IN `personbirthdate_` DATE, IN `persongender_` CHAR(1), IN `personnationality_` NVARCHAR(50), IN `personimage_` NVARCHAR(20))  BEGIN
START TRANSACTION;

IF NOT EXISTS (SELECT * FROM person WHERE persondni = persondni_)
THEN
  INSERT INTO person (
    persondni,
    personfirstname,
    personfirstlastname,
    personsecondlastname,
    personemail ,
    personbirthdate ,
    personage,
    persongender,
    personnationality,
    personimage
) VALUES (
    persondni_,
    personfirstname_,
    personfirstlastname_,
    personsecondlastname_,
    personemail_,
    personbirthdate_,
    (SELECT FLOOR(DATEDIFF(CURDATE(),personbirthdate_)/365)),
    persongender_,
    personnationality_ ,
    personimage_
);
SELECT LAST_INSERT_ID();
ELSE
	SELECT 0;
END IF;
	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPhone` (IN `phonephone_` NVARCHAR(30), IN `phoneperson_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO phone (phonephone, phoneperson) VALUES (phonephone_, phoneperson_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProfessor` (IN `professorperson_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO professor (professorperson) 
    VALUES (professorperson_);
    
    CALL insertUser((SELECT persondni FROM person WHERE personid = professorperson_), '1234', 1, professorperson_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProfessorCourse` (IN `professorcourseperson_` INT, IN `professorcoursegroup_` INT, IN `professorcourseperiod_` INT, IN `professorcoursecourse_` INT, IN `professorcourseyear_` NVARCHAR(4))  BEGIN
START TRANSACTION;

	IF NOT EXISTS (SELECT * FROM professorcourse WHERE professorcourseperson = professorcourseperson_
    AND professorcoursegroup = professorcoursegroup_ 
    AND professorcourseperiod = professorcourseperiod_
    AND professorcoursecourse = professorcoursecourse_
    AND professorcourseyear = professorcourseyear_)
	THEN
		INSERT INTO professorcourse (professorcourseperson, 
			professorcoursegroup,
			professorcourseperiod, 
			professorcoursecourse, 
			professorcourseyear) 
		VALUES (professorcourseperson_, 
			professorcoursegroup_ ,
			professorcourseperiod_, 
			professorcoursecourse_, 
			professorcourseyear_);
	ELSE
		SELECT 0;
	END IF;
	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProfessorWithCredentials` (IN `professorperson_` INT, IN `professorpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	INSERT INTO professor (professorperson) 
    VALUES (professorperson_);
    
    CALL insertUser((SELECT persondni FROM person WHERE personid = professorperson_), professorpass_, 1, professorperson_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRequirement` (IN `requirementcourse_` INT, IN `requirementcourserequired_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO requirement (requirementcourse, requirementcourserequired_) 
    VALUES (requirementcourse_, requirementcourserequired_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSpeciality` (IN `specialityname_` NVARCHAR(60))  BEGIN
START TRANSACTION;
	IF NOT EXISTS(SELECT * FROM speciality WHERE specialityname = specialityname_)
    THEN
		INSERT INTO speciality (specialityname) values (specialityname_);
        SELECT LAST_INSERT_ID();
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudent` (IN `studentadecuacy_` INT, IN `studentyearincome_` NVARCHAR(4), IN `studentlocation_` NVARCHAR(100), IN `studentmanager_` NVARCHAR(50), IN `studentperson_` INT)  BEGIN

START TRANSACTION;
	INSERT INTO student (studentadecuacy, studentyearincome, studentlocation, studentmanager, studentperson) 
    VALUES (studentadecuacy_, studentyearincome_, studentlocation_, studentmanager_, studentperson_);

    CALL insertUser((SELECT persondni FROM person WHERE personid = studentperson_), '1234', 0, studentperson_);

COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentCourse` (IN `studentcourseperson_` INT, IN `studentcoursecourse_` INT, IN `studentcourseperiod_` INT, IN `studentcourseyear_` NVARCHAR(4), IN `studentcourseenrollment_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO studentcourse (studentcourseperson, studentcoursecourse, studentcourseperiod, studentcourseyear, studentcourseenrollment) 
    VALUES (studentcourseperson_, studentcoursecourse_,studentcourseperiod_, studentcourseyear_, studentcourseenrollment_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentForum` (IN `studentforumstudent_` INT, IN `studentforumforum_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO studentforum (studentforumcurriculum, studentforumcourse)
    values (studentforumcurriculum_, studentforumcourse_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentGroup` (IN `studentgroupgroup_` INT, IN `studentgroupperson_` INT, IN `studentgrouppriority_` INT)  BEGIN
START TRANSACTION;
	INSERT INTO studentsgroup (studentgroupgroup, studentgroupperson, studentsgrouppriority)
    values (studentgroupgroup_, studentgroupperson_, studentgrouppriority_);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentWithCredentials` (IN `studentadecuacy_` INT, IN `studentyearincome_` NVARCHAR(4), IN `studentlocation_` NVARCHAR(100), IN `studentmanager_` NVARCHAR(50), IN `studentperson_` INT, IN `studentpass_` NVARCHAR(30))  BEGIN

START TRANSACTION;
	INSERT INTO student (studentadecuacy, studentyearincome, studentlocation, studentmanager, studentperson) 
    VALUES (studentadecuacy_, studentyearincome_, studentlocation_, studentmanager_, studentperson_);
	
    CALL insertUser((SELECT persondni FROM person WHERE personid = studentperson_), studentpass_, 0, studentperson_);
    
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUser` (IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30), IN `userusertype_` INT, IN `userperson_` INT)  BEGIN
START TRANSACTION;
	IF NOT EXISTS(SELECT * FROM personuser WHERE userusername = userusername_)
    THEN
		INSERT INTO personuser (userusername, useruserpass, userusertype, userperson) 
        VALUES (userusername_, useruserpass_, userusertype_,userperson_);
        SELECT 1;
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `isStudent` (IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	SELECT *
    FROM person INNER JOIN personuser ON personuser.userperson = person.personid
    WHERE userusername = userusername_ AND useruserpass = useruserpass_ AND userusertype = 0;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `isUser` (IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	SELECT *
    FROM person INNER JOIN personuser ON personuser.userperson = person.personid
    WHERE userusername = userusername_ AND useruserpass = useruserpass_ AND userusertype = 2;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginAdmin` (IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	SELECT userusername, userusertype, personfirstname, personfirstlastname, personid, userid, personimage
    FROM person INNER JOIN personuser ON personuser.userperson = person.personid
    WHERE userusername = userusername_ AND useruserpass = useruserpass_ AND userusertype = 2;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginProfessor` (IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	SELECT userusername, userusertype, personfirstname, personfirstlastname, personid, userid, personimage
    FROM person INNER JOIN personuser ON personuser.userperson = person.personid
    WHERE userusername = userusername_ AND useruserpass = useruserpass_ AND userusertype = 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginStudent` (IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	SELECT userusername, userusertype, personfirstname, personfirstlastname, personid, userid, personimage
    FROM person INNER JOIN personuser ON personuser.userperson = person.personid
    WHERE userusername = userusername_ AND useruserpass = useruserpass_ AND userusertype = 0;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateComment` (IN `forumcommentid_` INT, IN `forumcommentcomment_` NVARCHAR(400))  BEGIN
START TRANSACTION;
	UPDATE forumcomment 
    SET forumcommentcomment = forumcommentcomment_
    WHERE forumcommentid = forumcommentid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCourse` (IN `courseid_` INT, IN `coursecode_` NVARCHAR(10), IN `coursename_` NVARCHAR(200), IN `coursecredits_` INT, IN `courselesson_` INT, IN `coursepdf_` NVARCHAR(20), IN `coursespeciality_` INT, IN `coursetype_` INT)  BEGIN
START TRANSACTION;
	UPDATE course
	SET coursecode = coursecode_,
		coursename = coursename_,
		coursecredits = coursecredits_,
		courselesson = courselesson_,
		coursepdf = coursepdf_,
		coursespeciality = coursespeciality_,
		coursetype = coursetype_
	WHERE courseid = courseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCourseApproved` (IN `courseapprovedid_` INT, IN `courseapprovedperson_` INT, IN `courseapprovedcourse_` INT)  BEGIN
START TRANSACTION;
		UPDATE courseapproved
        SET courseapprovedperson = courseapprovedperson_,
			courseapprovedcourse = courseapprovedcourse_
		WHERE courseapprovedid = courseapprovedid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCurriculum` (IN `curriculumid_` INT, IN `curriculumname_` NVARCHAR(100), IN `curriculumyear_` NVARCHAR(4))  BEGIN
START TRANSACTION;
	UPDATE curriculum
    SET curriculumname = curriculumname_,
		curriculumyear = curriculumyear_
    WHERE curriculumid = curriculumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCurriculumCourse` (IN `curriculumcourseid_` INT, IN `curriculumcoursecurriculum_` INT, IN `curriculumcoursecourse_` INT)  BEGIN
START TRANSACTION;
		UPDATE curriculumcourse
        SET 
            curriculumcoursecurriculum =curriculumcoursecurriculum_,
            curriculumcoursecourse =curriculumcoursecourse_
		WHERE curriculumcourseid = curriculumcourseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEnrolloment` (IN `enrollmentid_` INT, IN `enrollmentstatus_` INT)  BEGIN
START TRANSACTION;
	UPDATE enrollment
    SET enrollmentstatus = enrollmentstatus_
    WHERE enrollmentid = enrollmentid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateForum` (IN `forumid_` INT, IN `forumname_` NVARCHAR(80))  BEGIN
START TRANSACTION;
	UPDATE forum
    SET forumname = forumname_
    WHERE forumid = forumid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateForumConversation` (IN `forumconversationid_` INT, IN `forumconversation_` NVARCHAR(100))  BEGIN
START TRANSACTION;
	UPDATE forumconversation
    SET forumconversation = forumconversation_
    WHERE forumconversationid = forumconversationid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFullNotification` (IN `notificationid_` INT, IN `notificationtext_` NVARCHAR(150), IN `notificationprofessor_` INT, IN `notificationcourse_` INT, IN `notificationstudent_` INT, IN `notificationforum_` INT, IN `notificationread_` INT, IN `notificationdate_` DATE)  BEGIN
START TRANSACTION;
	UPDATE notification
    SET notificationtext = notificationtext_,
        notificationprofessor = notificationprofessor_,
        notificationourse = notificationourse_,
        notificationstudent = notificationstudent_,
        notificationtforum = notificationforum_,
        notificationdate = notificationdate_
    WHERE notificationid = notificationid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGeneralNotification` (IN `notificationid_` INT, IN `notificationtext_` NVARCHAR(400))  BEGIN
START TRANSACTION;
	UPDATE notification
    SET notificationtext = notificationtext_,
        notificationread = 0
    WHERE notificationid = notificationid_;
    SELECT 1 AS id;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateInstitution` (IN `institutionid_` INT, IN `institutionname_` NVARCHAR(80), IN `institutionaddress_` NVARCHAR(500), IN `institutionfax_` NVARCHAR(20), IN `institutionphone_` NVARCHAR(20), IN `institutionmission_` NVARCHAR(1000), IN `institutionview_` NVARCHAR(1000))  BEGIN
START TRANSACTION;
	UPDATE institution
    SET institutionname = institutionname_,
        institutionaddress = institutionaddress_,
        institutionfax = institutionfax_,
        institutionphone = institutionphone_,
        institutionmission = institutionmission_,
        institutionview = institutionview_
    WHERE institutionid = institutionid_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePassword` (IN `personid_` INT, IN `passOld_` NVARCHAR(30), IN `passNew_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	IF EXISTS(SELECT * FROM personuser WHERE personuser.userid = personid_ AND personuser.useruserpass = passOld_)
    THEN
		UPDATE personuser
        SET useruserpass = passNew_
        WHERE personuser.userid = personid_;
        SELECT 1;
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePerson` (IN `personid_` INT, IN `persondni_` NVARCHAR(30), IN `personfirstname_` NVARCHAR(42), IN `personfirstlastname_` NVARCHAR(50), IN `personsecondlastname_` NVARCHAR(50), IN `personemail_` NVARCHAR(50), IN `personbirthdate_` DATE, IN `persongender_` CHAR(1), IN `personnationality_` NVARCHAR(50), IN `personimage_` NVARCHAR(20))  BEGIN

START TRANSACTION;
	UPDATE person 
    SET persondni = persondni_, 
		personfirstname = personfirstname_,
        personfirstlastname = personfirstlastname_,
        personsecondlastname = personsecondlastname_,
        personemail = personemail_,
        personbirthdate = personbirthdate_,
        personage = (SELECT FLOOR(DATEDIFF(CURDATE(),personbirthdate_)/365)),
        persongender = persongender_,
        personnationality = personnationality,
        personimage = personimage_
	WHERE personid = personid_;
    
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePhone` (IN `phoneid_` INT, IN `phonephone_` NVARCHAR(30), IN `phoneperson_` INT)  BEGIN
START TRANSACTION;
	UPDATE phone
    SET phonephone = phonephone_
    WHERE phoneid = phoneid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProfessor` (IN `professorid_` INT, IN `professorperson_` INT)  BEGIN
START TRANSACTION;
		UPDATE professor
        SET 
            professorperson =professorperson_
		WHERE professorid = professorid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProfessorCourse` (IN `professorcourseid_` INT, IN `professorcourseperson_` INT, IN `professorcoursecourse_` INT, IN `professorcourseperiod_` INT, IN `professorcourseyear_` NVARCHAR(4))  BEGIN
START TRANSACTION;
		UPDATE professorcourse
        SET 
            professorcourseperson =professorcourseperson_,
            professorcoursecourse =professorcoursecourse_,
            professorcourseperiod =professorcourseperiod_,
            professorcourseyear = professorcourseyear_
		WHERE professorcourseid = professorcourseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProfessorNotification` (IN `notificationprofessor_` INT, IN `notificationtext_` NVARCHAR(400), IN `notificationtextold_` NVARCHAR(400))  BEGIN
START TRANSACTION;
	UPDATE notification
    SET notificationtext = notificationtext_,
        notificationread = 0
    WHERE notificationtext = notificationtextold_ AND notificationprofessor = notificationprofessor_;
    SELECT 1 AS id;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRequirement` (IN `requirementid_` INT, IN `requirementcourse_` INT, IN `requirementcourserequired_` INT)  BEGIN
START TRANSACTION;
		UPDATE requirement
        SET requirementcourse = requirementcourse_,
			requirementcourserequired = requirementcourserequired_
		WHERE requirementid = requirementid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSpeciality` (IN `specialityid_` INT, IN `specialityname_` NVARCHAR(60))  BEGIN
START TRANSACTION;
	IF NOT EXISTS(SELECT * FROM speciality WHERE specialityname = specialityname_)
    THEN
		UPDATE speciality
        SET specialityname = specialityname_
		WHERE specialityid = specialityid_;
    ELSE
		SELECT 0;
    END IF;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStudent` (IN `personid_` INT, IN `studentadecuacy_` INT, IN `studentyearincome_` NVARCHAR(4), IN `studentlocation_` NVARCHAR(100), IN `studentmanager_` NVARCHAR(50))  BEGIN
START TRANSACTION;
	UPDATE student
    SET studentadecuacy = studentadecuacy_, 
	studentyearincome = studentyearincome_, 
	studentlocation = studentlocation_, 
	studentmanager = studentmanager_
	WHERE studentperson = personid_;
    SELECT 1;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStudentCourse` (IN `studentcourseid_` INT, IN `studentcourseperson_` INT, IN `studentcoursecourse_` INT, IN `studentcourseperiod_` INT, IN `studentcourseyear_` NVARCHAR(4))  BEGIN
START TRANSACTION;
		UPDATE studentcourse
        SET 
            studentcourseperson =studentcourseperson_,
            studentcoursecourse =studentcoursecourse_,
            studentcourseperiod =studentcourseperiod_,
            studentcourseyear = studentcourseyear_
		WHERE studentcourseid = studentcourseid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStudentYearOut` (IN `studentid_` INT, IN `studentyearout_` NVARCHAR(4))  BEGIN
START TRANSACTION;
	UPDATE student
    SET 
	studentyearout = studentyearout_
	WHERE studentid = studentid_;
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUser` (IN `userid_` INT, IN `userusername_` NVARCHAR(30), IN `useruserpass_` NVARCHAR(30))  BEGIN
START TRANSACTION;
	UPDATE personuser
    SET useruserpass = useruserpass_,
		userusername = userusername_
    WHERE userid = userid_;
COMMIT;
END$$

DELIMITER ;
