<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StudentCourse
 *
 * @author luisd
 */
class StudentCourse {

    private $studentCourseId;
    private $studentCourseStudent;
    private $studentCourseCourse;
    private $studentCoursePeriod;
    private $studentCourseYear;
    
    function StudentCourse($studentCourseId, $studentCourseStudent, $studentCourseCourse, $studentCoursePeriod, $studentCourseYear) {
        $this->studentCourseId = $studentCourseId;
        $this->studentCourseStudent = $studentCourseStudent;
        $this->studentCourseCourse = $studentCourseCourse;
        $this->studentCoursePeriod = $studentCoursePeriod;
        $this->studentCourseYear = $studentCourseYear;
    }
   
    function getStudentCourseId() {
        return $this->studentCourseId;
    }

    function getStudentCourseStudent() {
        return $this->studentCourseStudent;
    }

    function getStudentCourseCourse() {
        return $this->studentCourseCourse;
    }

    function getStudentCoursePeriod() {
        return $this->studentCoursePeriod;
    }

    function getStudentCourseYear() {
        return $this->studentCourseYear;
    }

    function setStudentCourseId($studentCourseId) {
        $this->studentCourseId = $studentCourseId;
    }

    function setStudentCourseStudent($studentCourseStudent) {
        $this->studentCourseStudent = $studentCourseStudent;
    }

    function setStudentCourseCourse($studentCourseCourse) {
        $this->studentCourseCourse = $studentCourseCourse;
    }

    function setStudentCoursePeriod($studentCoursePeriod) {
        $this->studentCoursePeriod = $studentCoursePeriod;
    }

    function setStudentCourseYear($studentCourseYear) {
        $this->studentCourseYear = $studentCourseYear;
    }

}