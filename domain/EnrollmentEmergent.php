<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnrollmentEmergent
 *
 * @author luis
 */
class EnrollmentEmergent {

    //put your code here

    private $pk;
    private $fkperson;
    private $fkcourse;
    private $enrollmentyear;
    private $enrollmentstatus;
    private $datastate;
    private $usertransacction;

    function EnrollmentEmergent($pk, $fkperson, $fkcourse, $enrollmentyear, $enrollmentstatus, $datastate, $usertransacction) {
        $this->pk = $pk;
        $this->fkperson = $fkperson;
        $this->fkcourse = $fkcourse;
        $this->enrollmentyear = $enrollmentyear;
        $this->enrollmentstatus = $enrollmentstatus;
        $this->datastate = $datastate;
        $this->usertransacction = $usertransacction;
    }

    function getPk() {
        return $this->pk;
    }

    function getFkperson() {
        return $this->fkperson;
    }

    function getFkcourse() {
        return $this->fkcourse;
    }

    function getEnrollmentyear() {
        return $this->enrollmentyear;
    }

    function getEnrollmentstatus() {
        return $this->enrollmentstatus;
    }

    function getDatastate() {
        return $this->datastate;
    }

    function getUsertransacction() {
        return $this->usertransacction;
    }

    function setPk($pk) {
        $this->pk = $pk;
    }

    function setFkperson($fkperson) {
        $this->fkperson = $fkperson;
    }

    function setFkcourse($fkcourse) {
        $this->fkcourse = $fkcourse;
    }

    function setEnrollmentyear($enrollmentyear) {
        $this->enrollmentyear = $enrollmentyear;
    }

    function setEnrollmentstatus($enrollmentstatus) {
        $this->enrollmentstatus = $enrollmentstatus;
    }

    function setDatastate($datastate) {
        $this->datastate = $datastate;
    }

    function setUsertransacction($usertransacction) {
        $this->usertransacction = $usertransacction;
    }

}
