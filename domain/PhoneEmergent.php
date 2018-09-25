<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhoneEmergent
 *
 * @author luis
 */
class PhoneEmergent {

    private $pk;
    private $phone;
    private $fkperson;
    private $datastate;
    private $usertransacction;

    function PhoneEmergent($pk, $phone, $fkperson, $datastate, $usertransacction) {
        $this->pk = $pk;
        $this->phone = $phone;
        $this->fkperson = $fkperson;
        $this->datastate = $datastate;
        $this->usertransacction = $usertransacction;
    }

    function getPk() {
        return $this->pk;
    }

    function getPhone() {
        return $this->phone;
    }

    function getFkperson() {
        return $this->fkperson;
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

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setFkperson($fkperson) {
        $this->fkperson = $fkperson;
    }

    function setDatastate($datastate) {
        $this->datastate = $datastate;
    }

    function setUsertransacction($usertransacction) {
        $this->usertransacction = $usertransacction;
    }

}
