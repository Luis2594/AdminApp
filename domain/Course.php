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
    private $coursePdf;
    private $courseSpeciality;
    private $courseType;

    function Course($courseId, $courseCode, $courseName, $courseCredits, $courseLesson, $coursePdf, $courseSpeciality, $courseType) {
        $this->courseId = $courseId;
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->courseCredits = $courseCredits;
        $this->courseLesson = $courseLesson;
        $this->coursePdf = $coursePdf;
        $this->courseSpeciality = $courseSpeciality;
        $this->courseType = $courseType;
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

    function getCoursePdf() {
        return $this->coursePdf;
    }

    function getCourseSpeciality() {
        return $this->courseSpeciality;
    }

    function getCourseType() {
        return $this->courseType;
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

    function setCoursePdf($coursePdf) {
        $this->coursePdf = $coursePdf;
    }

    function setCourseSpeciality($courseSpeciality) {
        $this->courseSpeciality = $courseSpeciality;
    }

    function setCourseType($courseType) {
        $this->courseType = $courseType;
    }

}
