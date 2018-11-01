<?php

include_once __DIR__.'/./ScheduleBusiness.php';

$id = (int) $_POST['schedule'];

if (isset($id) && is_int($id)) {
    $scheduleBusiness = new ScheduleBusiness();
    $scheduleBusiness->deleteSchedule($id);
    echo TRUE;
} else {
    echo FALSE;
}
