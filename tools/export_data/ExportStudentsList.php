<?php

include_once __DIR__.'/../../libs/ExportData.php';
include_once __DIR__.'/../../libs/GUID.php';
include_once __DIR__.'/../../business/StudentEmergentBusiness.php';

//capture required IDs
$course = (int)$_GET['course'];

//new instances of data management lib
$excel = new ExportDataExcel('browser');//browser-file-string
$excel->filename = GUID().".xlsx";//configure name
//new instance of course business
$studentEmergentBusiness = new StudentEmergentBusiness();
//capture the list of students by course and professor
$result = $studentEmergentBusiness->getStudentsByCourse($course);
//add the headersfor the excel file
$data = array_merge(array_push($array, array("Cédula", "Nombre", "Teléfono")), $result);

//creation of the file!
$excel->initialize();
foreach($data as $row) {
	$excel->addRow($row);
}
$excel->finalize();//be happy!!