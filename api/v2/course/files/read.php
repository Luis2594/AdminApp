<?php

if (isset($_POST['token']) && isset($_POST['id'])) {
    //course-year-period-group
    $data = explode("-", $_POST['token']);
    include_once __DIR__ . '/../../../business/FileBusiness.php';
    $business = new FileBusiness();
    $result = [];
    foreach ($business->getStudentFilesByFilters($data[0], $data[1], $data[2], $data[3], $_POST['id']) as $current) {
        array_push($result, $current);
    }
    echo json_encode($result);
} else {
    echo json_encode("Error Query Token");
}
