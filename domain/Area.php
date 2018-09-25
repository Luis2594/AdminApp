<?php

/**
 * Description of Area
 *
 * @author luis
 */
class Area {

    private $pk;
    private $description;
    private $datastate;
    private $usertransacction;
    
    function Area($pk, $description, $datastate, $usertransacction) {
        $this->pk = $pk;
        $this->description = $description;
        $this->datastate = $datastate;
        $this->usertransacction = $usertransacction;
    }

    function getPk() {
        return $this->pk;
    }

    function getDescription() {
        return $this->description;
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

    function setDescription($description) {
        $this->description = $description;
    }

    function setDatastate($datastate) {
        $this->datastate = $datastate;
    }

    function setUsertransacction($usertransacction) {
        $this->usertransacction = $usertransacction;
    }

}
