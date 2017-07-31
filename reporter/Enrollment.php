<?php

require('../resource/fpdf/fpdf.php');

class PDF extends FPDF {

    // Cabecera de p�gina
    function Header() {
        // Logo
        $this->Image('../resource/images/header.png', 5, 0, 200);
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

    // Tabla coloreada
    function HeaderTable() {

        $header = array(utf8_decode('II PERIODO - GRUPO ______ '), utf8_decode('IV PERIODO - GRUPO ______ '));
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(168, 168, 168);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');
        // Cabecera
        $w = array(95, 95);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    function Period() {
        $header = array(utf8_decode('Cod'), utf8_decode('Módulo'), utf8_decode('SI/NO'));
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(168, 168, 168);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');

        // Cabecera
        $w = array(10, 75, 10);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        }

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

// Datos
        $data = array(
            array("32", "Propiedades de la materia y sus aplicaciones en la industria y la vida cotidiana ", 1),
            array("32", "Propiedades de la materia y sus aplicaciones en la industria y la vida cotidiana ", 1),
            array("32", "Propiedades de la materia y sus aplicaciones en la industria y la vida cotidiana ", 2),
            array("32", "Propiedades de la materia y sus aplicaciones en la industria y la vida cotidiana ", 2),
            array("32", "Propiedades de la materia y sus aplicaciones en la industria y la vida cotidiana ", 2),
            array("32", "Propiedades de la materia y sus aplicaciones en la industria y la vida cotidiana "),
            array("33", "Módulo basico de español"),
            array("33", "Módulo basico de español"),
            array("33", "Módulo basico de español"),
            array("34", "Ingles para todos"),
            array("34", "Ingles para todos"),
            array("34", "Ingles para todos"),
            array("35", "Cotidianidad del ser humano: desde sus orígenes hasta el siglo XVIII")
        );
        $fill = false;
        foreach ($data as $row) {

            if (strlen($row[1]) > 55) {

                $this->Cell($w[0], 6, utf8_decode($row[0]), 'LR', 0, 'C', $fill);
                $this->Cell($w[1], 6, utf8_decode(substr($row[1], 0, 55)), 'LR', 0, 'C', $fill);
                $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);

                $this->Ln();

                $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
                $this->Cell($w[1], 3, utf8_decode(substr($row[1], 55, strlen($row[1]))), 'LR', 0, 'C', $fill);
                $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);

                $this->Ln();
                $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
                $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
            } else {
                $this->Cell($w[0], 9, utf8_decode($row[0]), 1, 0, 'C', $fill);
                $this->Cell($w[1], 9, utf8_decode($row[1]), 1, 0, 'C', $fill);
                $this->Cell($w[2], 9, "", 1 , 0, 1, $fill);
            }


            $this->Ln();

            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Pie de p�gina
    function Footer() {
        // Posici�n: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // N�mero de p�gina
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, utf8_decode("TIPO DE MATRÍCULA: ( ) Ordinaria ( ) Extraordinaria          FECHA DE MATRÍCULA: 22/02/2017"), 0, 1);
$pdf->Cell(0, 5, utf8_decode("DATOS PERSONALES DEL ESTUDIANTE"), 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, utf8_decode("Nombre Completo: Luis David Castillo Calderon                            Fecha nacimiento: 25/05/1994"), 0, 1);
$pdf->Cell(0, 5, utf8_decode("Cédula de identidad: _____________________ Edad: ______ Teléfonos: ____________/_____________"), 0, 1);
$pdf->Cell(0, 5, utf8_decode("Dirección Exacta: ___________________________________________________________________________"), 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 15, utf8_decode("EN CASO DE EMERGENCIA O ALGUNA SITUACIÓN ESPECIAL CONTACTAR"), 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 0, utf8_decode("Nombre: ____________________________________Teléfonos: ____________/____________Parentesco: __________"), 0, 1);
$pdf->Cell(0, 0, $pdf->Image('../resource/images/cuadro.png', 7, 80, 200), 0, 0, 'L', false);
$pdf->Ln(30);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 0, utf8_decode("DATOS ACADÉMICOS DEL ESTUDIANTE"), 0, 1);
$pdf->SetFont('Arial', '', 10);
//HACER IF DE ADECUACIÓN
$pdf->Cell(0, 10, utf8_decode("Adecuación Curricular: No ( ) Sí ( ) Tipo: _____________________________ "), 0, 1);
$pdf->Cell(0, 0, utf8_decode("Beca: No ( ) Sí ( ) Entidad: _______________________________________"), 0, 1);
$pdf->Ln(8);

//$pdf->Cell(0, 0, utf8_decode("lo"), 0, 1);
// // Títulos de las columnas
//$header = array(utf8_decode('País'), 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
//$header = array(utf8_decode(''), utf8_decode('IV PERIODO - GRUPO ______ '));
//$data = $pdf->LoadData($header);

$pdf->SetFont('Arial', '', 8);
$pdf->HeaderTable();
$pdf->Ln();
$pdf->Period();

$pdf->Output();
?>