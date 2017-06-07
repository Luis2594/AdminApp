<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author luisd
 */
class Student {

    private $studentId;
    private $studentAdecuacy;
    private $studentYearIncome;
    private $studentYearOut;
    private $studentLocation;
    private $studentGroup;
    private $studentCourse;
    private $studentManager;
    private $studentPerson;
    
    function Student($StudentId, $StudentAdecuacy, $StudentYearIncome, $StudentYearOut, $StudentLocation, $StudentGroup, $StudentCourse, $StudentManager, $StudentPerson) {
        $this->studentId = $StudentId;
        $this->studentAdecuacy = $StudentAdecuacy;
        $this->studentYearIncome = $StudentYearIncome;
        $this->studentYearOut = $StudentYearOut;
        $this->studentLocation = $StudentLocation;
        $this->studentGroup = $StudentGroup;
        $this->studentCourse = $StudentCourse;
        $this->studentManager = $StudentManager;
        $this->studentPerson = $StudentPerson;
    }
    
    function getStudentId() {
        return $this->studentId;
    }

    function getStudentAdecuacy() {
        return $this->studentAdecuacy;
    }

    function getStudentYearIncome() {
        return $this->studentYearIncome;
    }

    function getStudentYearOut() {
        return $this->studentYearOut;
    }

    function getStudentLocation() {
        return $this->studentLocation;
    }

    function getStudentGroup() {
        return $this->studentGroup;
    }

    function getStudentCourse() {
        return $this->studentCourse;
    }

    function getStudentManager() {
        return $this->studentManager;
    }

    function getStudentPerson() {
        return $this->studentPerson;
    }

    function setStudentId($StudentId) {
        $this->studentId = $StudentId;
    }

    function setStudentAdecuacy($StudentAdecuacy) {
        $this->studentAdecuacy = $StudentAdecuacy;
    }

    function setStudentYearIncome($StudentYearIncome) {
        $this->studentYearIncome = $StudentYearIncome;
    }

    function setStudentYearOut($StudentYearOut) {
        $this->studentYearOut = $StudentYearOut;
    }

    function setStudentLocation($StudentLocation) {
        $this->studentLocation = $StudentLocation;
    }

    function setStudentGroup($StudentGroup) {
        $this->studentGroup = $StudentGroup;
    }

    function setStudentCourse($StudentCourse) {
        $this->studentCourse = $StudentCourse;
    }

    function setStudentManager($StudentManager) {
        $this->studentManager = $StudentManager;
    }

    function setStudentPerson($StudentPerson) {
        $this->studentPerson = $StudentPerson;
    }


}
