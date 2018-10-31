<?php

include_once __DIR__.'/./ScheduleBusiness.php';

$group = (int) $_POST['group'];

if (isset($group) && is_int($group)) {
    $scheduleBusiness = new ScheduleBusiness();
    $scheduleBusiness->deleteScheduleByGroup($group);
    echo TRUE;
} else {
    echo FALSE;
}
