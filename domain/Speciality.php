<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Speciality
 *
 * @author luisd
 */
class Speciality {

    private $specialityId;
    private $specialityName;
    
    function Speciality($specialityId, $specialityName) {
        $this->specialityId = $specialityId;
        $this->specialityName = $specialityName;
    }
    
    function getSpecialityId() {
        return $this->specialityId;
    }

    function getSpecialityName() {
        return $this->specialityName;
    }

    function setSpecialityId($specialityId) {
        $this->specialityId = $specialityId;
    }

    function setSpecialityName($specialityName) {
        $this->specialityName = $specialityName;
    }

}
