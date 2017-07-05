<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Kevin Esquivel Marín
 */
class Professor {

    private $professorId;
    private $professorPerson;

    function Professor($professorId, $professorPerson) {
        $this->professorId = $professorId;
        $this->professorPerson = $professorPerson;
    }

    function getProfessorId() {
        return $this->professorId;
    }

    function getProfessorPerson() {
        return $this->professorPerson;
    }

    function setProfessorId($professorId) {
        $this->professorId = $professorId;
    }

    function setProfessorPerson($professorPerson) {
        $this->professorPerson = $professorPerson;
    }

}
