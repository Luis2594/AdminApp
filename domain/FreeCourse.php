<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FreeCourse
 *
 * @author luis
 */
class FreeCourse {

    //put your code here

    private $pk;
    private $cod;
    private $description;
    private $fkarea;
    private $daynumber;
    private $fkhour;
    private $datastate;
    private $usertransacction;

    function FreeCourse($pk, $cod, $description, $fkarea, $daynumber, $fkhour, $datastate, $usertransacction) {
        $this->pk = $pk;
        $this->cod = $cod;
        $this->description = $description;
        $this->fkarea = $fkarea;
        $this->daynumber = $daynumber;
        $this->fkhour = $fkhour;
        $this->datastate = $datastate;
        $this->usertransacction = $usertransacction;
    }

    function getPk() {
        return $this->pk;
    }

    function getCod() {
        return $this->cod;
    }

    function getDescription() {
        return $this->description;
    }

    function getFkarea() {
        return $this->fkarea;
    }

    function getDaynumber() {
        return $this->daynumber;
    }

    function getFkhour() {
        return $this->fkhour;
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

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setFkarea($fkarea) {
        $this->fkarea = $fkarea;
    }

    function setDaynumber($daynumber) {
        $this->daynumber = $daynumber;
    }

    function setFkhour($fkhour) {
        $this->fkhour = $fkhour;
    }

    function setDatastate($datastate) {
        $this->datastate = $datastate;
    }

    function setUsertransacction($usertransacction) {
        $this->usertransacction = $usertransacction;
    }

}
