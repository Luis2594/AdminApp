<?php

require('../resource/fpdf/fpdf.php');
require_once '../business/StudentBusiness.php';
require_once '../business/PhoneBusiness.php';
include_once '../business/EnrollmentBusiness.php';

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

    // Tabla coloreada
    function HeaderTable($period, $groupA, $groupB) {

        if ($period == 1 || $period == 3) {
            $header = array(utf8_decode('I PERIODO - GRUPO: ' . $groupA), utf8_decode('III PERIODO - GRUPO: ' . $groupB));
        } else {
            $header = array(utf8_decode('II PERIODO - GRUPO: ' . $groupA), utf8_decode('VI PERIODO - GRUPO: ' . $groupB));
        }


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

    function Period($arrayI, $arrayII, $period) {
        $header = array(utf8_decode('Cod'), utf8_decode('Módulo'));
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(168, 168, 168);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');

        // Cabecera
        $w = array(10, 85);
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

        $cont = 0;
        $countArrayI = count($arrayI);
        $countArrayII = count($arrayII);
        $bool = false; //Indica si el otro curso tiene el nombre largo
        //Si los cursos que son del periodo de la columna izquierda
        //son más en cantidad que los de la columna derecha
        //entonces se recorren los arreglos con el arrayI como punto de referencia por tener mas elementos
        if ($countArrayI >= $countArrayII) {
            $fill = false; //Ultimo parametro de la funcion cell
            //Se recorren los dos arreglos, pero el for llega hasta el arreglo que tenga mas elementos
            for ($index = 0; $index < $countArrayI; $index++) {
                //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                if (strlen($arrayI[$index]["coursename"]) > 55) {
//                    Primera columna, es la del codigo del módulo
                    $this->Cell($w[0], 6, utf8_decode($arrayI[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                    Segunda columna, es el nombre del módulo, en este caso se muestra cortado hasta el caracter 55
                    $this->Cell($w[1], 6, utf8_decode(substr($arrayI[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                    Tercera columna, es la del SI/NO
//                    $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
//                    Se pregunta si hay elementos en el otro arreglo
                    if ($cont < $countArrayII && $countArrayII > 0) {
                        //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                        if (strlen($arrayII[$index]["coursename"]) > 55) {
                            $bool = true; // Nos indica que el nombre del modulo excede los 55 caracteres
//                            Cuarta columna, es la del codigo de los modulos de la derecha
                            $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Quinta columna, es la del nombre de los módulos de la derecha
                            $this->Cell($w[1], 6, utf8_decode(substr($arrayII[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                            Sexta columna, es la del SI/NO de los módulos de la derecha
//                            $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                        } else { //En caso de que el nombre del módulo no exceda los 55 caracteres, se pinta de manera natural
//                            Cuarta columna del los módulos de la derecha (CODIGO)
                            $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Quinta columna de los módulos de la derecha (NOMBRE)
                            $this->Cell($w[1], 6, utf8_decode($arrayII[$index]["coursename"]), 'LR', 0, 'C', $fill);
//                            Sexta columna de los módulos de la derecha (SI/NO)
//                            $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                        }
                    } else {//En caso de que no haya elementos en el otro arreglo, se pintan las columnas de blanco
                        //                PINTAR LA OTRA EN BLANCO
                        $this->Cell($w[0], 6, "", 'LR', 0, 'C', $fill);
                        $this->Cell($w[1], 6, "", 'LR', 0, 'C', $fill);
//                        $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                    }

//                    Salto de linea para seguir escribiendo la otra parte del nombre del modulo
                    $this->Ln();

//                    Se escribe en la primera columna, se deja en blanco porque ya se escribio el codigo
                    $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                    Se escribe en la segunda columna la otra parte del nombre del modulo
                    $this->Cell($w[1], 3, utf8_decode(substr($arrayI[$index]["coursename"], 55, strlen($arrayI[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                    Se escribe en la tercera columna, se deja en blanco por motivo del corte del nombre del módulo
//                    $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
                    //Se pregunta si el nombre del módulo del otro arreglo ha sido mayor de 55 caracteres
                    if ($bool) {
//                        Se escribe en la cuarta columna y se deja en blanco
                        $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                        Se escribe en la quinta columna la otra parte del nombre del módulo
                        $this->Cell($w[1], 3, utf8_decode(substr($arrayII[$index]["coursename"], 55, strlen($arrayII[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                        Se deja en blanco por motivos del corte del nombre
//                        $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
                    } else {//Si el nombre no fue cortado, entonces se pintan en blanco
                        //PINTAR LA OTRA EN BLANCO
                        $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
                        $this->Cell($w[1], 3, "", 'LR', 0, 'C', $fill);
//                        $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
                    }

//                    Salto de linea
                    $this->Ln();

//                Estas lineas es para que dibuje la linea divisora inferior de los módulos de la derecha
                    $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                    $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
//                    $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
//                Estas lineas es para que dibuje la linea divisora inferior de los módulos de la izquierda
                    $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                    $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
//                    $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
                } else {//Si el nombre del módulo no arrebasa los 55 caracteres entonces
//                    Se pregunta si en el otro aray hay elementos
                    if ($cont < $countArrayII && $countArrayII > 0) {
                        //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                        if (strlen($arrayII[$index]["coursename"]) > 55) {

//                            Primera columna, es la del codigo del módulo del primer array
                            $this->Cell($w[0], 9, utf8_decode($arrayI[$index]["coursecode"]), 1, 0, 'C', $fill);
//                            Se escribe el nombre completo del modulo del primer array
                            $this->Cell($w[1], 9, utf8_decode($arrayI[$index]["coursename"]), 1, 0, 'C', $fill);
//                            Se deja en blanco SI/NO
//                            $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
//                            Se escribe el codigo del modulo del segundo array en la cuarta columna
                            $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Se escribe el nombre cortado del módulo porque excedio los 55 caracteres
                            $this->Cell($w[1], 6, utf8_decode(substr($arrayII[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                            $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
//                            Salto de linea
                            $this->Ln();
//
//                            Se escribe en la primera columna y se deja en blanco porque el nombre del modulo del primer array erea menos de 55 caracteres
                            $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
                            //Se escribe en la segunda columna y se deja en blanco porque el nombre del modulo del primer array erea menos de 55 caracteres
                            $this->Cell($w[1], 3, "", 'LR', 0, 'C', $fill);
                            //Se escribe en la tercera columna y se deja en blanco porque el nombre del modulo del primer array erea menos de 55 caracteres
//                            $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
//                            Se escribe en la cuarta columna y se deja en blanco porque ya se iba escrito el doigo
                            $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                            Se escribe la otra parte del nombre del módulo en la quinta columna
                            $this->Cell($w[1], 3, utf8_decode(substr($arrayII[$index]["coursename"], 55, strlen($arrayII[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                            $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
//                            Salto de linea
                            $this->Ln();

//                           Estas lineas es para que dibuje la linea divisora inferior
                            $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                            $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
//                            $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
                            //PINTAR LA OTRA EN BLANCO
//                          Estas lineas es para que dibuje la linea divisora inferior
                            $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                            $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
//                            $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
                        } else {//Si los dos nombres de los modulos tienen menos de 55 caracteres entonces se escriben de manera continua
                            $this->Cell($w[0], 9, utf8_decode($arrayI[$index]["coursecode"]), 1, 0, 'C', $fill);
                            $this->Cell($w[1], 9, utf8_decode($arrayI[$index]["coursename"]), 1, 0, 'C', $fill);
//                            $this->Cell($w[2], 9, "", 1, 0, 1, $fill);

                            $this->Cell($w[0], 9, utf8_decode($arrayII[$index]["coursecode"]), 1, 0, 'C', $fill);
                            $this->Cell($w[1], 9, utf8_decode($arrayII[$index]["coursename"]), 1, 0, 'C', $fill);
//                            $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
                        }
                    } else { //Si no hay módulos en el otro array entonces se deja en blanco 
//                        Se escribe el codigo del modulo del primer array
                        $this->Cell($w[0], 9, utf8_decode($arrayI[$index]["coursecode"]), 1, 0, 'C', $fill);
//                        Se escribe el nombre del modulo del primer array
                        $this->Cell($w[1], 9, utf8_decode($arrayI[$index]["coursename"]), 1, 0, 'C', $fill);
//                        $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
                        // Dibujar lineas en blanco
                        $this->Cell($w[0], 9, "", 1, 0, 'C', $fill);
                        $this->Cell($w[1], 9, "", 1, 0, 'C', $fill);
//                        $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
                    }
                }

                $this->Ln();

                $fill = true;
                $cont++; //Contador para el segundo array
                $bool = false; //Boleano dpara saber si el nombre del segundo arreglo se corto
            }
        } else {
//            --------------------------------------------------------------------
            $fill = true; //Ultimo parametro de la funcion cell
            //Se recorren los dos arreglos, pero el for llega hasta el arreglo que tenga mas elementos
            for ($index = 0; $index < $countArrayII; $index++) {
                //Se pregunta si hay elementos en el otro arreglo
                if ($cont < $countArrayI && $countArrayI > 0) {
                    //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                    if (strlen($arrayI[$index]["coursename"]) > 55) {
//                    Primera columna, es la del codigo del módulo
                        $this->Cell($w[0], 6, utf8_decode($arrayI[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                    Segunda columna, es el nombre del módulo, en este caso se muestra cortado hasta el caracter 55
                        $this->Cell($w[1], 6, utf8_decode(substr($arrayI[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                    Tercera columna, es la del SI/NO
//                        $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
//                    Se pregunta si hay elementos en el otro arreglo
                        if ($cont < $countArrayII) {
                            //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                            if (strlen($arrayII[$index]["coursename"]) > 55) {
                                $bool = true; // Nos indica que el nombre del modulo excede los 55 caracteres
//                            Cuarta columna, es la del codigo de los modulos de la derecha
                                $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Quinta columna, es la del nombre de los módulos de la derecha
                                $this->Cell($w[1], 6, utf8_decode(substr($arrayII[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                            Sexta columna, es la del SI/NO de los módulos de la derecha
//                                $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                            } else { //En caso de que el nombre del módulo no exceda los 55 caracteres, se pinta de manera natural
//                            Cuarta columna del los módulos de la derecha (CODIGO)
                                $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Quinta columna de los módulos de la derecha (NOMBRE)
                                $this->Cell($w[1], 6, utf8_decode($arrayII[$index]["coursename"]), 'LR', 0, 'C', $fill);
//                            Sexta columna de los módulos de la derecha (SI/NO)
//                                $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                            }
                        } else {//En caso de que no haya elementos en el otro arreglo, se pintan las columnas de blanco
                            //                PINTAR LA OTRA EN BLANCO
                            $this->Cell($w[0], 6, "", 'LR', 0, 'C', $fill);
                            $this->Cell($w[1], 6, "", 'LR', 0, 'C', $fill);
//                            $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                        }

//                    Salto de linea para seguir escribiendo la otra parte del nombre del modulo
                        $this->Ln();

//                    Se escribe en la primera columna, se deja en blanco porque ya se escribio el codigo
                        $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                    Se escribe en la segunda columna la otra parte del nombre del modulo
                        $this->Cell($w[1], 3, utf8_decode(substr($arrayI[$index]["coursename"], 55, strlen($arrayI[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                    Se escribe en la tercera columna, se deja en blanco por motivo del corte del nombre del módulo
//                        $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
                        //Se pregunta si el nombre del módulo del otro arreglo ha sido mayor de 55 caracteres
                        if ($bool) {
//                        Se escribe en la cuarta columna y se deja en blanco
                            $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                        Se escribe en la quinta columna la otra parte del nombre del módulo
                            $this->Cell($w[1], 3, utf8_decode(substr($arrayII[$index]["coursename"], 55, strlen($arrayII[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                        Se deja en blanco por motivos del corte del nombre
//                            $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
                        } else {//Si el nombre no fue cortado, entonces se pintan en blanco
                            //PINTAR LA OTRA EN BLANCO
                            $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
                            $this->Cell($w[1], 3, "", 'LR', 0, 'C', $fill);
//                            $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
                        }

//                    Salto de linea
                        $this->Ln();

//                Estas lineas es para que dibuje la linea divisora inferior de los módulos de la derecha
                        $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                        $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
//                        $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
//                Estas lineas es para que dibuje la linea divisora inferior de los módulos de la izquierda
                        $this->Cell($w[0], 0, "", 1, 0, 'L', $fill);
                        $this->Cell($w[1], 0, "", 1, 0, 'L', $fill);
//                        $this->Cell($w[2], 0, "", 1, 0, 'L', $fill);
                    } else {//Si el nombre del módulo no arrebasa los 55 caracteres entonces
//                    Se pregunta si en el otro aray hay elementos
                        if ($cont < $countArrayII) {
                            //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                            if (strlen($arrayII[$index]["coursename"]) > 55) {

//                            Primera columna, es la del codigo del módulo del primer array
                                $this->Cell($w[0], 9, utf8_decode($arrayI[$index]["coursecode"]), 1, 0, 'C', $fill);
//                            Se escribe el nombre completo del modulo del primer array
                                $this->Cell($w[1], 9, utf8_decode($arrayI[$index]["coursename"]), 1, 0, 'C', $fill);
//                            Se deja en blanco SI/NO
//                                $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
//                            Se escribe el codigo del modulo del segundo array en la cuarta columna
                                $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Se escribe el nombre cortado del módulo porque excedio los 55 caracteres
                                $this->Cell($w[1], 6, utf8_decode(substr($arrayII[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                                $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
//                            Salto de linea
                                $this->Ln();
//
//                            Se escribe en la primera columna y se deja en blanco porque el nombre del modulo del primer array erea menos de 55 caracteres
                                $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
                                //Se escribe en la segunda columna y se deja en blanco porque el nombre del modulo del primer array erea menos de 55 caracteres
                                $this->Cell($w[1], 3, "", 'LR', 0, 'C', $fill);
                                //Se escribe en la tercera columna y se deja en blanco porque el nombre del modulo del primer array erea menos de 55 caracteres
//                                $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
//                            Se escribe en la cuarta columna y se deja en blanco porque ya se iba escrito el doigo
                                $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                            Se escribe la otra parte del nombre del módulo en la quinta columna
                                $this->Cell($w[1], 3, utf8_decode(substr($arrayII[$index]["coursename"], 55, strlen($arrayII[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                                $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
//                            Salto de linea
                                $this->Ln();

//                           Estas lineas es para que dibuje la linea divisora inferior
                                $this->Cell($w[0], 0, "", 1, 0, 'L', true);
                                $this->Cell($w[1], 0, "", 1, 0, 'L', true);
//                                $this->Cell($w[2], 0, "", 1, 0, 'L', true);
                                //PINTAR LA OTRA EN BLANCO
//                          Estas lineas es para que dibuje la linea divisora inferior
                                $this->Cell($w[0], 0, "", 1, 0, 'L', true);
                                $this->Cell($w[1], 0, "", 1, 0, 'L', true);
//                                $this->Cell($w[2], 0, "", 1, 0, 'L', true);
                            } else {//Si los dos nombres de los modulos tienen menos de 55 caracteres entonces se escriben de manera continua
                                $this->Cell($w[0], 9, utf8_decode($arrayI[$index]["coursecode"]), 1, 0, 'C', $fill);
                                $this->Cell($w[1], 9, utf8_decode($arrayI[$index]["coursename"]), 1, 0, 'C', $fill);
//                                $this->Cell($w[2], 9, "", 1, 0, 1, $fill);

                                $this->Cell($w[0], 9, utf8_decode($arrayII[$index]["coursecode"]), 1, 0, 'C', $fill);
                                $this->Cell($w[1], 9, utf8_decode($arrayII[$index]["coursename"]), 1, 0, 'C', $fill);
//                                $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
                            }
                        } else { //Si no hay módulos en el otro array entonces se deja en blanco 
//                        Se escribe el codigo del modulo del primer array
                            $this->Cell($w[0], 9, utf8_decode($arrayI[$index]["coursecode"]), 1, 0, 'C', $fill);
//                        Se escribe el nombre del modulo del primer array
                            $this->Cell($w[1], 9, utf8_decode($arrayI[$index]["coursename"]), 1, 0, 'C', $fill);
//                            $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
                            // Dibujar lineas en blanco
                            $this->Cell($w[0], 9, "", 1, 0, 'C', $fill);
                            $this->Cell($w[1], 9, "", 1, 0, 'C', $fill);
//                            $this->Cell($w[2], 9, "", 1, 0, 1, $fill);
                        }
                    }
                } else {
//                  //PINTAR LA OTRA EN BLANCO
                    $this->Cell($w[0], 9, "", 'LR', 0, 'C', true);
                    $this->Cell($w[1], 9, "", 'LR', 0, 'C', true);
//                    $this->Cell($w[2], 9, "", 'LR', 0, 'C', true);
//                   
                    //Se verifica el nombre del módulo para que no exceda los 55 caracteres 
                    if (strlen($arrayII[$index]["coursename"]) > 55) {
//                            Cuarta columna, es la del codigo de los modulos de la derecha
                        $this->Cell($w[0], 6, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', $fill);
//                            Quinta columna, es la del nombre de los módulos de la derecha
                        $this->Cell($w[1], 6, utf8_decode(substr($arrayII[$index]["coursename"], 0, 55)), 'LR', 0, 'C', $fill);
//                            Sexta columna, es la del SI/NO de los módulos de la derecha
//                        $this->Cell($w[2], 6, "", 'LR', 0, 'C', $fill);
                        //                    Salto de linea para seguir escribiendo la otra parte del nombre del modulo
                        $this->Ln();

                        //Se pregunta si el nombre del módulo del otro arreglo ha sido mayor de 55 caracteres
                        //PINTAR LA OTRA EN BLANCO
                        $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
                        $this->Cell($w[1], 3, "", 'LR', 0, 'C', $fill);
//                        $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
//                        Se escribe en la cuarta columna y se deja en blanco
                        $this->Cell($w[0], 3, "", 'LR', 0, 'C', $fill);
//                        Se escribe en la quinta columna la otra parte del nombre del módulo
                        $this->Cell($w[1], 3, utf8_decode(substr($arrayII[$index]["coursename"], 55, strlen($arrayII[$index]["coursename"]))), 'LR', 0, 'C', $fill);
//                        Se deja en blanco por motivos del corte del nombre
//                        $this->Cell($w[2], 3, "", 'LR', 0, 'C', $fill);
//                    Salto de linea
                    } else { //En caso de que el nombre del módulo no exceda los 55 caracteres, se pinta de manera natural
//                            Cuarta columna del los módulos de la derecha (CODIGO)
                        $this->Cell($w[0], 9, utf8_decode($arrayII[$index]["coursecode"]), 'LR', 0, 'C', true);
//                            Quinta columna de los módulos de la derecha (NOMBRE)
                        $this->Cell($w[1], 9, utf8_decode($arrayII[$index]["coursename"]), 'LR', 0, 'C', true);
//                            Sexta columna de los módulos de la derecha (SI/NO)
//                        $this->Cell($w[2], 9, "", 'LR', 0, 'C', true);
                    }

                    $this->Ln();

                    //Estas lineas es para que dibuje la linea divisora inferior de los módulos de la derecha
                    $this->Cell($w[0], 0, "", 1, 0, 'L', true);
                    $this->Cell($w[1], 0, "", 1, 0, 'L', true);
//                    $this->Cell($w[2], 0, "", 1, 0, 'L', true);
                    //Estas lineas es para que dibuje la linea divisora inferior de los módulos de la izquierda
                    $this->Cell($w[0], 0, "", 1, 0, 'L', true);
                    $this->Cell($w[1], 0, "", 1, 0, 'L', true);
//                    $this->Cell($w[2], 0, "", 1, 0, 'L', true);
                }

                $this->Ln();

                $fill = true;
                $cont++; //Contador para el segundo array
                $bool = false; //Boleano dpara saber si el nombre del segundo arreglo se corto
            }
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
        $this->Cell(0, 10, utf8_decode('"El conocimiento es la mejor inversión que se puede hacer”'), 0, 0, 'C');
        $this->Cell(0, 10, utf8_decode('SELLO'), 0, 0, 'R');
        $this->Ln();
        $this->Cell(0, 1, 'Abraham Lincoln', 0, 0, 'C');
    }

}

$id = $_GET["id"];
$period = (int) $_GET["period"];

$studentBusiness = new StudentBusiness();
$phoneBusiness = new PhoneBusiness();
$enrollmentBusiness = new EnrollmentBusiness();

$students = $studentBusiness->getStudentId($id);

foreach ($students as $student) {
    $date = new DateTime($student->getPersonBirthday());
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    switch ($period) {
        case 1:
            $pdf->Cell(0, 0, utf8_decode("                                       MATRÍCULA I SEMESTRE - II NIVEL  2018"));
            break;
        case 2:
            $pdf->Cell(0, 0, utf8_decode("                                       MATRÍCULA II SEMESTRE - II NIVEL  2018"));
            break;
        case 3:
            $pdf->Cell(0, 0, utf8_decode("                                       MATRÍCULA I SEMESTRE - III NIVEL  2018"));
            break;
        case 4:
            $pdf->Cell(0, 0, utf8_decode("                                       MATRÍCULA II SEMESTRE - II NIVEL  2018"));
            break;
        default:
            break;
    }

    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, utf8_decode("TIPO DE MATRÍCULA: ( ) Ordinaria ( ) Extraordinaria          FECHA DE MATRÍCULA: " . date("d") . "-" . date("m") . "-" . date("Y")), 0, 1);
    $pdf->Cell(0, 5, utf8_decode("DATOS PERSONALES DEL ESTUDIANTE"), 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 5, utf8_decode("Nombre Completo:"), 0, 0);
    $pdf->SetFont('Arial', 'B', 10);

    $name = $student->getPersonFirstName() . " " . $student->getPersonFirstlastname() . " " . $student->getPersonSecondlastname();
    
    if (strlen($name) >= 20 && strlen($name) < 25) {
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

    $phones = $phoneBusiness->getAllPhone($id);
    $txtPhones = "";
    foreach ($phones as $phone) {
        $txtPhones = $txtPhones . $phone->getPhonePhone() . " / ";
    }

    $pdf->Cell(0, 5, utf8_decode("Cédula de identidad: "), 0, 0);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(-137, 5, utf8_decode($student->getPersonDni()), 0, 0, 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 5, utf8_decode("          Edad: " . $student->getPersonAge() . "            Teléfonos: " . substr($txtPhones, 0, (strlen($txtPhones) - 2))), 0, 1);

    $pdf->Cell(0, 5, utf8_decode("Dirección Exacta: " . $student->getStudentLocation()), 0, 1);
    $pdf->SetFont('Arial', 'B', 10);


    $pdf->Cell(0, 15, utf8_decode("EN CASO DE EMERGENCIA O ALGUNA SITUACIÓN ESPECIAL CONTACTAR"), 0, 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 0, utf8_decode("Nombre: " . $student->getStudentManager() . "            Parentesco: __________"), 0, 1);
    $pdf->Cell(0, 0, $pdf->Image('../resource/images/cuadro.png', 7, 80, 200), 0, 0, 'L', false);
    $pdf->Ln(30);

//MODULES
    $pdf->SetFont('Arial', '', 8);

    $data = $enrollmentBusiness->getCoursesEnrollmentByStudent($id);

    $arrayI = array();
    $arrayII = array();
    $groupA = "";
    $groupB = "";

    //SEPARAR POR PERIODOS
    foreach ($data as $row) {
        if ($period == 1 || $period == 3) {
            if ($row['period'] == "I") {
                array_push($arrayI, $row);
                $groupA = $row["groupnumber"];
            }

            if ($row['period'] == "III") {
                array_push($arrayII, $row);
                $groupB = $row["groupnumber"];
            }
        } else {
            if ($row['period'] == "II") {
                array_push($arrayI, $row);
                $groupA = $row["groupnumber"];
            }

            if ($row['period'] == "IV") {
                array_push($arrayII, $row);
                $groupB = $row["groupnumber"];
            }
        }
    }

    $pdf->HeaderTable($period, $groupA, $groupB);

    $pdf->Ln();

    $pdf->Period($arrayI, $arrayII, $period);

    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 10, utf8_decode("¿OPCIONAL?: No ( ) Si ( ) ¿Cuál?:_________________________________________________"), 0, 1);

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
}
?>