<?php

require '../resource/excel/PHPExcel.php';
include_once '../business/StudentEmergentBusiness.php';
include_once '../business/FreeCourseBusiness.php';

//capture required IDs
$idCourse = (int) $_GET['course'];

//new instance of course business
$studentEmergentBusiness = new StudentEmergentBusiness();
//capture the list of students by course and professor
$students = $studentEmergentBusiness->getStudentsByCourse($idCourse);

$freeCourseBusiness = new FreeCourseBusiness();
$course = $freeCourseBusiness->getCourseById($idCourse);

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()
        ->setCreator("Cursos emergentes")
        ->setLastModifiedBy("CINDEA TURRIALBA")
        ->setTitle("Estudiantes")
        ->setSubject("Documento")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("excel phpexcel php")
        ->setCategory("Lista");


$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');


$styleArray = array(
    'font' => array(
        'bold' => true,
        'italic' => true,
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'color' => array('rgb' => '000000'),
        'size' => 10,
        'name' => 'Lucida Bright'
    )
);

$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);


$gdImage = imagecreatefrompng('../resource/images/mep.png');
// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(80);
$objDrawing->setWidth(80);
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$gdImage1 = imagecreatefromjpeg('../resource/images/Logo.jpg');
// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
$objDrawing1 = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing1->setName('Sample image');
$objDrawing1->setDescription('Sample image');
$objDrawing1->setImageResource($gdImage1);
$objDrawing1->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing1->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing1->setHeight(50);
$objDrawing1->setWidth(50);
$objDrawing1->setCoordinates('E1');
$objDrawing1->setWorksheet($objPHPExcel->getActiveSheet());

$objPHPExcel->getActiveSheet()->getStyle('C1:C7')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('C1:C7')->applyFromArray($style);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('15');
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('15');



$objPHPExcel->getActiveSheet()->setCellValue('C1', '     MINISTERIO DE EDUCACIÓN PÚBLICA');
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'CENTRO INTEGRADO DE EDUCACIÓN DE ADULTOS');
$objPHPExcel->getActiveSheet()->setCellValue('C3', 'CINDEA- TURRIALBA. TEL. 2556-5060 Código 5101');
$objPHPExcel->getActiveSheet()->setCellValue('C4', 'cindea.turrialba@mep.go.cr');
$objPHPExcel->getActiveSheet()->setCellValue('C5', '*******************************************************');
$objPHPExcel->getActiveSheet()->setCellValue('C6', strtoupper($course->getDescription()));
$objPHPExcel->getActiveSheet()->setCellValue('C7', strtoupper($course->getDaynumber()). ' A '. $course->getFkhour());



$objPHPExcel->getActiveSheet()->setCellValue('A10', 'Cédula');
$objPHPExcel->getActiveSheet()->setCellValue('B10', 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue('C10', 'Primer Apellido');
$objPHPExcel->getActiveSheet()->setCellValue('D10', 'Segundo Apellido');
$objPHPExcel->getActiveSheet()->setCellValue('E10', 'Teléfono');

$cont = 11;
for ($i = 0; $i < count($students); $i++) {
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $cont, $students[$i]['dni']);
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $cont, $students[$i]['firstname']);
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $cont, $students[$i]['firstlastname']);
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $cont, $students[$i]['secondlastname']);
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $cont, $students[$i]['phone']);
    $cont++;
}


//CON XLS
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Excel.xls"');
header('Cache-Control: max-age=0');
//	
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Disposition: attachment;filename="Excel.xlsx"');
//header('Cache-Control: max-age=0');
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
/* Obtenemos los caracteres adicionales o mensajes de advertencia y los
  guardamos en el archivo "depuracion.txt" si tenemos permisos */
//file_put_contents('depuracion.txt', ob_get_contents());
/* Limpiamos el búfer */
ob_end_clean();
$objWriter->save('php://output');
?>