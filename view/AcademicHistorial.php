<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudents.php"><i class="fa fa-arrow-circle-right"></i>Ver estudiante</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Historial Académico</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SELECT FILTER-->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <?php
                        include_once __DIR__.'/../business/StudentBusiness.php';

                        $studentBusiness = new StudentBusiness();
                        $students = $studentBusiness->getStudentId($id);
                        foreach ($students as $student) {
                            ?>
                            <h3 class="box-title">Historial académico de: <?php
                                echo $student->getPersonFirstName()
                                . " " . $student->getPersonFirstlastname()
                                . " " . $student->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <!--GROUP-->
                            <div class="form-group">
                                <label>Filtrar historial académico</label>
                                <select id="academicHistorial" name="academicHistorial" class="form-control">
                                    <option value="3">Todo el historial</option>
                                    <option value="2">Módulos matriculados</option>
                                    <option value="1">Módulos aprobados</option>
                                    <option value="0">Módulos reprobados</option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!--SHOW ACADEMIC HISTORIAL-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        foreach ($students as $student) {
                            ?>
                            <h3 class="box-title">Historial académico de : <?php
                                echo $student->getPersonFirstName()
                                . " " . $student->getPersonFirstlastname()
                                . " " . $student->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <!--<th>Tipo</th>-->
                                        <th>Grupo</th>
                                        <th>Período</th>
                                        <!--<th>Atinencia/Especialidad</th>-->
                                        <th>Fecha de matrícula</th>
                                        <th>Estado del módulo</th>
                                        <th>Aprobación</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyHistorial">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <!--<th>Tipo</th>-->
                                        <th>Grupo</th>
                                        <th>Período</th>
                                        <!--<th>Atinencia/Especialidad</th>-->
                                        <th>Fecha de matrícula</th>
                                        <th>Estado del módulo</th>
                                        <th>Aprobación</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}
include_once __DIR__.'/./reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">

    //Obtener las variables por GET que se encuentran en la URL
    (function ($) {
        $.get = function (key) {
            key = key.replace(/[\[]/, '\\[');
            key = key.replace(/[\]]/, '\\]');
            var pattern = "[\\?&]" + key + "=([^&#]*)";
            var regex = new RegExp(pattern);
            var url = unescape(window.location.href);
            var results = regex.exec(url);
            if (results === null) {
                return null;
            } else {
                return results[1];
            }
        }
    })(jQuery);

    //Obtener el id del estudiante
    var id = $.get("id");

    //Funcion anonima 
    $(function () {
        loadAcademicHistorial(3);
    });

    //ejecuta acciones de aprobación de un curso
    function aprobar(sel, id)
    {
        if (sel.value != -1) {
            $.ajax({
                type: 'POST',
                url: "../business/EnrollmentActions.php",
                data: {"enrollment": id, "value": sel.value}, 
                success: function (data)
                {
                    if (data == "true"){
                        alertify.success("Acción Ejecutada Correctamente");
                        loadAcademicHistorial(3);
                    }else{
                        alertify.error("Error ...");
                        sel.value = -1;
                    }
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            }
            );
        }
    }

    //Cargar el historial academico del estudiante
    function loadAcademicHistorial(option) {
        var selectA = '<select onchange="aprobar(this,';
        var selectB = ');"><option value="-1">Seleccione</option><option value="1">Aprobar</option><option value="0">Reprobar</option></select>';
        $.ajax({
            type: 'POST',
            url: "../business/GetEnrollment.php",
            data: {"id": id, "option": option}, // 0 reprobate, 1 approved, 2 enrollment , 3  academic historial
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlCourse = '';

                $.each(courses, function (i, item) {
                    htmlCourse += "<tr>";
                    htmlCourse += "<td>" + item.coursecode + "</td>";
                    htmlCourse += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                    htmlCourse += "<td>" + item.coursecredits + "</td>";
                    htmlCourse += "<td>" + item.courselesson + "</td>";
//                    htmlCourse += "<td>" + item.coursetype + "</td>";
                    htmlCourse += "<td>" + item.groupnumber + "</td>";
                    htmlCourse += "<td>" + item.period + "</td>";
                    htmlCourse += "<td>" + item.enrollmentdate + "</td>";

                    switch (item.enrollmentstatus) {
                        case "0":
                            htmlCourse += '<td style="color: red;">Reprobado</td>';
                            htmlCourse += "<td> Reprobado </td>";
                            break;
                        case "1":
                            htmlCourse += '<td style="color: green;">Aprobado</td>';
                            htmlCourse += "<td> Aprobado </td>";
                            break;
                        case "2":
                            htmlCourse += '<td style="color: blue;">Matriculado</td>';
                            htmlCourse += "<td>" + selectA + item.enrollmentid + selectB + "</td>";
                            break;
                        default :
                            htmlCourse += "<td>Indefinido</td>";
                            htmlCourse += "<td> Indefinido </td>";
                            break;
                    }

                    htmlCourse += "</tr>";
                });
                $("#tbodyHistorial").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );
    }

//------------------------------------------------------------------------------
    //Logica del select de historial académico
    $('#academicHistorial').on('change', function () {
        loadAcademicHistorial($(this).val());
    }
    );

</script>

