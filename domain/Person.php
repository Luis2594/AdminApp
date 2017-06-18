<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author luisd
 */
class Person {

    private $personId;
    private $personDni;
    private $personFirstName;
    private $personFirstlastname;
    private $personSecondlastname;
    private $personEmail;
    private $personBirthday;
    private $personAge;
    private $personGender;
    private $personNacionality;

    function Person($personId, $personDni, $personFirstName, $personFirstlastname, $personSecondlastname, $personEmail, $personBirthday, $personAge, $personGender, $personNacionality) {
        $this->personId = $personId;
        $this->personDni = $personDni;
        $this->personFirstName = $personFirstName;
        $this->personFirstlastname = $personFirstlastname;
        $this->personSecondlastname = $personSecondlastname;
        $this->personEmail = $personEmail;
        $this->personBirthday = $personBirthday;
        $this->personAge = $personAge;
        $this->personGender = $personGender;
        $this->personNacionality = $personNacionality;
    }

    function getPersonId() {
        return $this->personId;
    }

    function getPersonDni() {
        return $this->personDni;
    }

    function getPersonFirstName() {
        return $this->personFirstName;
    }

    function getPersonFirstlastname() {
        return $this->personFirstlastname;
    }

    function getPersonSecondlastname() {
        return $this->personSecondlastname;
    }

    function getPersonEmail() {
        return $this->personEmail;
    }

    function getPersonBirthday() {
        return $this->personBirthday;
    }

    function getPersonAge() {
        return $this->personAge;
    }

    function getPersonGender() {
        return $this->personGender;
    }

    function getPersonNacionality() {
        return $this->personNacionality;
    }

    function setPersonId($personId) {
        $this->personId = $personId;
    }

    function setPersonDni($personDni) {
        $this->personDni = $personDni;
    }

    function setPersonFirstName($personFirstName) {
        $this->personFirstName = $personFirstName;
    }

    function setPersonFirstlastname($personFirstlastname) {
        $this->personFirstlastname = $personFirstlastname;
    }

    function setPersonSecondlastname($personSecondlastname) {
        $this->personSecondlastname = $personSecondlastname;
    }

    function setPersonEmail($personEmail) {
        $this->personEmail = $personEmail;
    }

    function setPersonBirthday($personBirthday) {
        $this->personBirthday = $personBirthday;
    }

    function setPersonAge($personAge) {
        $this->personAge = $personAge;
    }

    function setPersonGender($personGender) {
        $this->personGender = $personGender;
    }

    function setPersonNacionality($personNacionality) {
        $this->personNacionality = $personNacionality;
    }

}
