<?php

include_once __DIR__.'/./CourseBusiness.php';

$code = $_GET['code'];

if (isset($code)) {
    $courseBusiness = new CourseBusiness();
    if ($courseBusiness->confirmCode($code) == '0') {
        echo TRUE;
    } else {
        echo FALSE;
    }
} else {
    echo FALSE;
}
