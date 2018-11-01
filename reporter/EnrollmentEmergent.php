<?php

require('../resource/fpdf/fpdf.php');
require_once '../business/StudentEmergentBusiness.php';
require_once '../business/PhoneEmergentBusiness.php';
include_once __DIR__.'/../business/EnrollmentEmergentBusiness.php';
date_default_timezone_set('America/Costa_Rica');

class PDF extends FPDF {

    // Cabecera de p�gina
    function Header() {
        // Logo
        $this->Image('../resource/images/header.png', 7, 5, 200);
        // Salto de l�nea
        $this->Ln(20);
    }

// Cargar los datos
    function LoadData($courses) {
        $data = array();
        // Leer las líneas del fichero
        foreach ($courses as $course) {
            $data[] = $course;
        }
        return $data;
    }

    // Tabla simple
    function headerTableCourses() {
        // Cabecera
        $this->Cell(10, 7, "COD", 1, 0, 'C');
        $this->Cell(100, 7, utf8_decode("MÓDULO"), 1, 0, 'C');
        $this->Cell(50, 7, utf8_decode("ÁREA"), 1, 0, 'C');
        $this->Cell(17, 7, utf8_decode("DÍA"), 1, 0, 'C');
        $this->Cell(20, 7, "HORA", 1, 0, 'C');

        $this->Ln();
    }

    function bodyTableCourses($courses) {
        // Datos
        foreach ($courses as $course) {
            $this->Cell(10, 7, $course['cod'], 1);
            $this->Cell(100, 7, utf8_decode($course['name']), 1);
            $this->Cell(50, 7, utf8_decode($course['area']), 1);
            $this->Cell(17, 7, utf8_decode($course['day']), 1);
            $this->Cell(20, 7, $course['hour'], 1);
            $this->Ln();
        }
    }

    // Pie de p�gina
    function Footer() {
        // Posici�n: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // N�mero de p�gina
        $this->Cell(0, 10, utf8_decode('"El conocimiento es la mejor inversión que se puede hacer”'), 0, 0, 'C');
        $this->Cell(0, 10, utf8_decode('SELLO'), 0, 0, 'R');
        $this->Ln();
        $this->Cell(0, 1, 'Abraham Lincoln', 0, 0, 'C');
    }

}

$id = $_GET["id"];

$studentBusiness = new StudentEmergentBusiness();
$phoneBusiness = new PhoneEmergentBusiness();
$enrollmentBusiness = new EnrollmentEmergentBusiness();

$student = $studentBusiness->getStudentById($id);

$date = new DateTime($student->getBirthdate());
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(0, 0, utf8_decode("MATRÍCULA " . (date("Y") + 1)), 0, 0, 'C');

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, utf8_decode("DATOS PERSONALES DEL ESTUDIANTE"), 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, utf8_decode("Nombre Completo:"), 0, 0);
$pdf->SetFont('Arial', 'B', 10);

$name = $student->getFirstname() . " " . $student->getFirstlastname() . " " . $student->getSecondlastname();

if (strlen($name) < 25) {
    $pdf->Cell(-110, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 25 && strlen($name) < 30) {
    $pdf->Cell(-100, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 30 && strlen($name) < 35) {
    $pdf->Cell(-90, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 35 && strlen($name) < 40) {
    $pdf->Cell(-80, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 40 && strlen($name) < 45) {
    $pdf->Cell(-70, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 45 && strlen($name) < 50) {
    $pdf->Cell(-60, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 50 && strlen($name) < 55) {
    $pdf->Cell(-50, 5, utf8_decode($name), 0, 0, 0);
}

if (strlen($name) >= 55 && strlen($name) < 60) {
    $pdf->Cell(-40, 5, utf8_decode($name), 0, 0, 0);
}


$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, utf8_decode("      Fecha nacimiento: " . $date->format("d-m-Y")), 0, 1);

$phones = $phoneBusiness->phoneByPerson($id);
$txtPhones = "";
foreach ($phones as $phone) {
    $txtPhones = $txtPhones . $phone->getPhone() . " / ";
}

$pdf->Cell(0, 5, utf8_decode("Cédula de identidad: "), 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(-137, 5, utf8_decode($student->getDni()), 0, 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, utf8_decode("          Edad: " . $student->age($date->format("d-m-Y")) . "            Teléfonos: " . substr($txtPhones, 0, (strlen($txtPhones) - 2))), 0, 1);

$pdf->Cell(0, 5, utf8_decode("Dirección Exacta: " . $student->getAddress()), 0, 1);

if ($student->age($student->getBirthdate()) < 18) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 15, utf8_decode("EN CASO DE EMERGENCIA O ALGUNA SITUACIÓN ESPECIAL CONTACTAR"), 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 0, utf8_decode("Nombre: " . $student->getResponsable()), 0, 1);
    $pdf->Ln(10);
}


//MODULES
$pdf->SetFont('Arial', 'B', 13);

$courses = $enrollmentBusiness->enrollmentCourseByPerson($id);
$pdf->Cell(0, 5, utf8_decode("CURSOS LIBRES"), 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->headerTableCourses();
$pdf->SetFont('Arial', '', 8);
$pdf->bodyTableCourses($courses);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 10, utf8_decode("Funcionario que realiza la matrícula: __________________________________________"), 0, 1);


$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 5, utf8_decode("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"), 0, 1);
$pdf->Cell(0, 5, utf8_decode("DECLARACION JURADA: En mi calidad de estudiante y/o padre o encargado, manifiesto que todos los documentos aportados a la Institución"), 0, 1);
$pdf->Cell(0, 5, utf8_decode("en proceso de matrícula  y  ratificación de matrícula son veraces, bajo el entendido de que cualquier falsedad o inexactitud en los documentos"), 0, 1);
$pdf->Cell(0, 5, utf8_decode("anula el proceso de matrícula. Además declaro conocer y aceptar el REA-Decreto ejecutivo NO. 35355-MEP"), 0, 1);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 10, utf8_decode("Firma del padre o encargado de matrícula: ____________________________________"), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Firma del estudiante: ______________________________________________________"), 0, 1);



$pdf->Output();
?>