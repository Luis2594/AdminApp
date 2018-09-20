<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver Grupos de Estudiantes</a></li>
    </ol>
</section>
<br>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header row col-md-12">
                        <div class="pull-left col-md-6">
                            <h3 class="box-title">Grupos por Módulo
                        </div>
                        <div class="pull-right col-md-6 text-right right">
                            <div class="col-md-4">
                                <select class="btn btn-info btn-sm" style="width: 100%" id="filterPeriod">
                                    <option value="0">Periodo</option>
                                    <option value="1">I</option>
                                    <option value="2">II</option>
                                    <option value="3">III</option>
                                    <option value="4">IV</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="btn btn-info btn-sm" style="width: 100%" id="filterYear">
                                    <option value="0">Año</option>
                                    <?php
                                        include_once '../business/FiltersBusiness.php';
                                        $filtersBusiness = new FiltersBusiness();
                                        $years = $filtersBusiness->getCoursesYears();

                                        foreach ($years as $tmpYear) {
                                     ?>
                                        <option value="<?php echo $tmpYear; ?>" ><?php echo $tmpYear; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button onclick="getCoursesByFiltersRequest();" class="btn btn-primary btn-sm" style="width: 100%" id="search">Filtrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Estudiantes</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Estudiantes</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php

include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
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
        };
    })(jQuery);

    var a = -1;
    var b = -1;
    $(document).ready(function () {
        try{
            a = $.get("a");
            b = $.get("b");
        }catch(e){
            a = -1;
            b = -1;
        }
        
        if (a && b && a != -1 && b != -1){
            $('#filterYear').val(a);
            $('#filterPeriod').val(b);
            getCoursesByFilters();
        }else{
            coursesToProfessor();
        }
    });

    function coursesToProfessor() {
        $.ajax({
            type: 'POST',
            url: "../business/GetCoursesAllProfessors.php",
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlToInsert = '';

                if (!(courses === undefined || courses.length === 0)) {
                    $.each(courses, function (i, item) {
                        htmlToInsert += "<tr>";
                        htmlToInsert += "<td>" + item.coursecode + "</td>";
                        htmlToInsert += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                        htmlToInsert += "<td>" + item.groupnumber + "</td>";
                        htmlToInsert += "<td>" + item.period + "</td>";
                        htmlToInsert += "<td>" + item.professorcourseyear + "</td>";
                        htmlToInsert += '<td><a class="btn btn-info btn-sm" href="ShowStudentsByCourse.php?' +
                                'course=' + item.courseid + '&' +
                                'professor=' + item.professorcourseperson + '&' +
                                'year=' + item.professorcourseyear + '&' +
                                'period=' + item.periodid + '&' +
                                'group=' + item.groupid +
                                '">Estudiantes</a></td>';
                        htmlToInsert += "</tr>";
                    });

                    $("#tbody").html("");
                    $("#tbody").html(htmlToInsert);
                    $('#example').DataTable();
                } else {
                    htmlToInsert += "<tr>";
                    htmlCourse = 'No se encontraron registros para el periodo actual.';
                    htmlToInsert += "</tr>";
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function getCoursesByFiltersRequest(){
        if ($("#filterYear").val() != 0 && $("#filterPeriod").val() != 0) {
            window.location.href = "ShowCoursesLists.php?a="+$("#filterYear").val() +"&b="+$("#filterPeriod").val();
        } else {
            alertify.error("Seleccione los filtros...");
        }
    }

    function getCoursesByFilters() {
        if (a && b && a != -1 && b != -1){
            $.ajax({
                type: 'POST',
                url: "../business/GetCoursesAllProfessorsByFilters.php",
                data: {"period": b, "year": a},
                success: function (data)
                {
                    var courses = JSON.parse(data);
                    var htmlToInsert = '';

                    if (!(courses === undefined || courses.length === 0)) {
                        $.each(courses, function (i, item) {
                            htmlToInsert += "<tr>";
                            htmlToInsert += "<td>" + item.coursecode + "</td>";
                            htmlToInsert += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                            htmlToInsert += "<td>" + item.groupnumber + "</td>";
                            htmlToInsert += "<td>" + item.period + "</td>";
                            htmlToInsert += "<td>" + item.professorcourseyear + "</td>";
                            htmlToInsert += '<td><a class="btn btn-info btn-sm" href="ShowStudentsByCourse.php?' +
                                    'course=' + item.courseid + '&' +
                                    'professor=' + item.professorcourseperson + '&' +
                                    'year=' + item.professorcourseyear + '&' +
                                    'period=' + item.periodid + '&' +
                                    'group=' + item.groupid +
                                    '">Estudiantes</a></td>';
                            htmlToInsert += "</tr>";
                        });
                        
                        $("#tbody").html("");
                        $("#tbody").html(htmlToInsert);
                        $('#example').DataTable();
                    } else {
                        htmlToInsert += "<tr>";
                        htmlToInsert = 'No se encontraron registros.';
                        htmlToInsert += "</tr>";
                    }
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            });
        } else {
            coursesToProfessor();
        }
    }
</script>
