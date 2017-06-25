<?php

include './CourseBusiness.php';

$code = (int) $_POST['code'];
$name = $_POST['name'];
$credits = (int) $_POST['credits'];
$lessons = (int) $_POST['lessons'];
$period = (int) $_POST['period'];
$speciality = (int) $_POST['speciality'];

if (isset($code) &&
        isset($name) &&
        isset($credits) &&
        isset($lessons) &&
        isset($period) &&
        isset($speciality)
) {
    $coursesBusiness = new CourseBusiness();

    $pdf = $_POST['schedule'];
    if (!empty($_FILES) && $_FILES["schedule"]["name"]) {
        $path_parts = pathinfo($_FILES["schedule"]["name"]);
        $ext = $path_parts['extension'];
        $pdf_tmp = tempnam("../resource/pdf/", $code);

        $path_parts_tmp = pathinfo($pdf_tmp);
        $name_tmp_pdf = $path_parts_tmp['basename'];

        $pdf = $pdf_tmp . "." . $ext;

        
        $folder = '../resource/pdf/'; //folder path
        opendir($folder); //open path server side
        copy($_FILES["schedule"]["tmp_name"], $pdf); //copy file to server side storage folder

        $pdf = $name_tmp_pdf . "." . $ext;
    }else{
        $pdf = null;
    }

    $course = new Course(NULL, $code, $name, $credits, $lessons, $period, $pdf, $speciality);

    $res = $coursesBusiness->insert($course);

    if ($res != 0) {
        header("location: ../view/CreateCourse.php?action=1&msg=Curso_creado_correctamente");
    } else {
        header("location: ../view/CreateCourse.php?action=0&msg=El_curso_no_fue_creado_correctamente._Puede_que_exista_uno_con_el_mismo_código_de_módulo.");
    }
} else {
    //error
    header("location: ../view/CreateCourse.php?action=0&msg=Datos_erroneos");
}
?>