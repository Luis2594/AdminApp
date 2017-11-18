<?php

class StudentEmergent {

    private $pk;
    private $dni;
    private $firstname;
    private $firstlastname;
    private $secondlastname;
    private $birthdate;
    private $gender;
    private $nationality;
    private $enrollmentyear;
    private $responsable;
    private $address;
    private $datastate;
    private $usertransacction;
    
    function StudentEmergent($pk, $dni, $firstname, $firstlastname, $secondlastname, $birthdate, $gender, $nationality, $enrollmentyear, $responsable, $address, $datastate, $usertransacction) {
        $this->pk = $pk;
        $this->dni = $dni;
        $this->firstname = $firstname;
        $this->firstlastname = $firstlastname;
        $this->secondlastname = $secondlastname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->nationality = $nationality;
        $this->enrollmentyear = $enrollmentyear;
        $this->responsable = $responsable;
        $this->address = $address;
        $this->datastate = $datastate;
        $this->usertransacction = $usertransacction;
    }

    function getPk() {
        return $this->pk;
    }

    function getDni() {
        return $this->dni;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getFirstlastname() {
        return $this->firstlastname;
    }

    function getSecondlastname() {
        return $this->secondlastname;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function getGender() {
        return $this->gender;
    }

    function getNationality() {
        return $this->nationality;
    }

    function getEnrollmentyear() {
        return $this->enrollmentyear;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getAddress() {
        return $this->address;
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

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setFirstlastname($firstlastname) {
        $this->firstlastname = $firstlastname;
    }

    function setSecondlastname($secondlastname) {
        $this->secondlastname = $secondlastname;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setNationality($nationality) {
        $this->nationality = $nationality;
    }

    function setEnrollmentyear($enrollmentyear) {
        $this->enrollmentyear = $enrollmentyear;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setDatastate($datastate) {
        $this->datastate = $datastate;
    }

    function setUsertransacction($usertransacction) {
        $this->usertransacction = $usertransacction;
    }

}
