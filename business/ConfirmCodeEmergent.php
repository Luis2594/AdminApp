<?php

include_once './FreeCourseBusiness.php';

$code = $_GET['code'];

if(isset($code)){
    $freeCourseBusiness = new FreeCourseBusiness();
    if($freeCourseBusiness->confirmCode($code) == '0'){
        echo TRUE;
    }else{
        echo FALSE;
    }
}else{
    echo FALSE;
}
