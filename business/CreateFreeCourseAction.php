<?php

include_once __DIR__.'/./FreeCourseBusiness.php';

$code = $_POST['code'];
$name = $_POST['name'];
$numberGroup = $_POST['numbergroup'];
$area = (int) $_POST['area'];
$day = (int) $_POST['day'];
$hour = (int) $_POST['hour'];

if (isset($code) &&
        isset($name) &&
        isset($numberGroup) &&
        isset($area) &&
        isset($day) &&
        isset($hour)
) {
    $freeCourseBusiness = new FreeCourseBusiness();

    $course = new FreeCourse(NULL, $code, utf8_decode($name), $numberGroup, $area, $day, $hour, "", "");
    $res = $freeCourseBusiness->insert($course);

    if ($res != 0) {
        header("location: ../view/InformationCourseEmergent.php?id=" . $res . "&action=1&msg=Registro_creado_correctamente");
    } else {
        header("location: ../view/CreateFreeCourse.php?action=0&msg=El_curso_no_fue_creado_correctamente._Puede_que_exista_uno_con_el_mismo_código_de_módulo.");
    }
} else {
    //error
    header("location: ../view/CreateCourse.php?action=0&msg=Datos_erroneos");
}
