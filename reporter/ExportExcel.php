<?php

require '../resource/excel/PHPExcel.php';
include_once '../business/StudentEmergentBusiness.php';

//capture required IDs
$course = (int) $_GET['course'];

//new instance of course business
$studentEmergentBusiness = new StudentEmergentBusiness();
//capture the list of students by course and professor
$students = $studentEmergentBusiness->getStudentsByCourse($course);

//print_r($students);
//exit();

$objPHPExcel = new PHPExcel();

//$objPHPExcel->getProperties()
//        ->setCreator("Cursos emergentes")
//        ->setLastModifiedBy("CINDEA TURRIALBA")
//        ->setTitle("Estudiantes")
//        ->setSubject("Documento")
//        ->setDescription("Documento generado con PHPExcel")
//        ->setKeywords("excel phpexcel php")
//        ->setCategory("Lista");

$objPHPExcel->getProperties()
        ->setCreator("Códigos de Programación")
        ->setLastModifiedBy("Códigos de Programación")
        ->setTitle("Excel en PHP")
        ->setSubject("Documento de prueba")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("excel phpexcel php")
        ->setCategory("Ejemplos");

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');


$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Cédula');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Primer Apellido');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Segundo Apellido');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Teléfono');

$cont = 2;
for ($i = 0; $i < count($students); $i++) {
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $cont, $students[$i]['dni']);
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $cont, $students[$i]['firstname']);
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $cont, $students[$i]['firstlastname']);
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $cont, $students[$i]['secondlastname']);
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $cont, $students[$i]['phone']);
    $cont++;
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Excel.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
/* Obtenemos los caracteres adicionales o mensajes de advertencia y los
  guardamos en el archivo "depuracion.txt" si tenemos permisos */
//file_put_contents('depuracion.txt', ob_get_contents());
/* Limpiamos el búfer */
ob_end_clean();
$objWriter->save('php://output');
?>