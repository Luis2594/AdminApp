<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author luisd
 */
class Course {

    private $courseId;
    private $courseCode;
    private $courseName;
    private $courseCredits;
    private $courseLesson;
    private $coursePeriod;
    private $coursePdf;
    private $courseSpeciality;
    
    function Course($courseId, $courseCode, $courseName, $courseCredits, $courseLesson, $coursePeriod, $coursePdf, $courseSpeciality) {
        $this->courseId = $courseId;
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->courseCredits = $courseCredits;
        $this->courseLesson = $courseLesson;
        $this->coursePeriod = $coursePeriod;
        $this->coursePdf = $coursePdf;
        $this->courseSpeciality = $courseSpeciality;
    }
    function getCourseId() {
        return $this->courseId;
    }

    function getCourseCode() {
        return $this->courseCode;
    }

    function getCourseName() {
        return $this->courseName;
    }

    function getCourseCredits() {
        return $this->courseCredits;
    }

    function getCourseLesson() {
        return $this->courseLesson;
    }

    function getCoursePeriod() {
        return $this->coursePeriod;
    }

    function getCoursePdf() {
        return $this->coursePdf;
    }

    function getCourseSpeciality() {
        return $this->courseSpeciality;
    }

    function setCourseId($courseId) {
        $this->courseId = $courseId;
    }

    function setCourseCode($courseCode) {
        $this->courseCode = $courseCode;
    }

    function setCourseName($courseName) {
        $this->courseName = $courseName;
    }

    function setCourseCredits($courseCredits) {
        $this->courseCredits = $courseCredits;
    }

    function setCourseLesson($courseLesson) {
        $this->courseLesson = $courseLesson;
    }

    function setCoursePeriod($coursePeriod) {
        $this->coursePeriod = $coursePeriod;
    }

    function setCoursePdf($coursePdf) {
        $this->coursePdf = $coursePdf;
    }

    function setCourseSpeciality($courseSpeciality) {
        $this->courseSpeciality = $courseSpeciality;
    }

}
