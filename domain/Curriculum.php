<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curriculum
 *
 * @author luisd
 */
class Curriculum {

    private $curriculumId;
    private $curriculumName;
    private $curriculumYear;
    
    function Curriculum($curriculumId, $curriculumName, $curriculumYear) {
        $this->curriculumId = $curriculumId;
        $this->curriculumName = $curriculumName;
        $this->curriculumYear = $curriculumYear;
    }
    function getCurriculumId() {
        return $this->curriculumId;
    }

    function getCurriculumName() {
        return $this->curriculumName;
    }

    function getCurriculumYear() {
        return $this->curriculumYear;
    }

    function setCurriculumId($curriculumId) {
        $this->curriculumId = $curriculumId;
    }

    function setCurriculumName($curriculumName) {
        $this->curriculumName = $curriculumName;
    }

    function setCurriculumYear($curriculumYear) {
        $this->curriculumYear = $curriculumYear;
    }

}
