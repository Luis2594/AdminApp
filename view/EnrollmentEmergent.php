<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentsEmergent.php?enrollment=enrollment"><i class="fa fa-arrow-circle-right"></i>Matrícular estudiante emergente</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Matrícular</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW GROUP AND CURRICULUM-->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <?php
                        include_once __DIR__.'/../business/StudentEmergentBusiness.php';

                        $studentEmergentBusiness = new StudentEmergentBusiness();
                        $student = $studentEmergentBusiness->getStudentById($id);
                        ?>
                        <h3 class="box-title">Matrícula para : <?php
                            echo $student->getFirstname()
                            . " " . $student->getFirstlastname()
                            . " " . $student->getSecondlastname();
                            ?> </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <!--GROUP-->
                            <div class="form-group">
                                <label>Áreas</label>
                                <select id="area" name="area" class="form-control">
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!--SHOW MODULES OF PERIDO I-->
            <div class="col-xs-12" id="showCourses">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cursos</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <h1 id="labelArea">CURSOS POR ÁREA</h1>
                        </div>
                        <div class="table-responsive">
                            <table id="tableFreeCourse" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Área</th>
                                        <th>Día</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody id="freeCourseByArea">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Área</th>
                                        <th>Día</th>
                                        <th>Hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--ENROLLMENT-->
            <div class="col-xs-12" id="enrollmentAction">
                <div class="box">
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <button onclick="enrollment(<?php echo $id; ?>);" class="btn btn-primary">Matrícular curso(s)</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW ENROLLMENT TO STUDENT-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Matrícula para : <?php
                            echo $student->getFirstname()
                            . " " . $student->getFirstlastname()
                            . " " . $student->getSecondlastname();
                            ?> </h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <select id="reportEnrrollment" style="width: 300px;" name="reportEnrrollment" class="form-control">
                                <option value="0">Seleccionar el informe de matrícula</option>
                                <option value="1">Reporte de Matrícula</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Área</th>
                                        <th>Día</th>
                                        <th>Hora</th>
                                        <th>Año de matrícula</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyEnrollment">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Área</th>
                                        <th>Día</th>
                                        <th>Hora</th>
                                        <th>Año de matrícula</th>
                                        <th>Eliminar</th>
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
        hideDiv();
        areas();
        coursesToEnrollment();
    });

    //Ocultar los div de los periodos y oculatar el boton de matricula
    function hideDiv() {
        $("#showCourses").hide();
        $("#enrollmentAction").hide();
    }

    //LImpiar los checkbox para elejir la matricula
    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }

    //CARAGAR AREAS
    function areas() {
        $.ajax({
            type: "GET",
            url: "../business/GetAreas.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                var bool = 0;
                htmlCombo += '<OPTION VALUE="0">Seleccione una área</OPTION>';
                $.each(speciality, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                $("#area").html(htmlCombo);

                if (bool === 0) {
                    /*
                     * @title {String or DOMElement} The dialog title.
                     * @message {String or DOMElement} The dialog contents.
                     * @onok {Function} Invoked when the user clicks OK button.
                     * @oncancel {Function} Invoked when the user clicks Cancel button or closes the dialog.
                     *
                     * alertify.confirm(title, message, onok, oncancel);
                     *
                     */
                    alertify.confirm('Confirmar', 'Tiene que existir al menos un área', function () {
                        window.location = "#";
                    }
                    , function () {
                        window.location = "#";
                    });
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    //CARAGAR AREAS
    function loadCourseByArea(area) {
        $.ajax({
            type: "POST",
            url: "../business/GetFreeCourseByArea.php",
            data: {"area": area},
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlCourse = '';
                $.each(courses, function (i, item) {
                    htmlCourse += "<tr>";
                    htmlCourse += "<td>";
                    htmlCourse += '<input value="' + item.id + '" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />';
                    htmlCourse += "</td>";
                    htmlCourse += "<td>" + item.cod + "</td>";
                    htmlCourse += '<td><a href="InformationFreeCourse.php?id=' + item.id + '">' + item.name + '</a></td>';
                    htmlCourse += "<td>" + item.area + "</td>";
                    htmlCourse += "<td>" + item.day + "</td>";
                    htmlCourse += "<td>" + item.hour + "</td>";
                    htmlCourse += "</tr>";
                });
                $("#freeCourseByArea").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

//Matricular los módulos seleccionados y verificar que haya al menos uno seleccionado
    function enrollment(id) {
        var bool = false;
        var modules = "";

        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                bool = true;
                modules += $(this).val() + ",";
            }
        });

        if (bool) {
            modules = modules.substr(0, modules.length - 1);

            clearCheck();
            assignCourseToStudent(modules);
        } else {
            /*
             * @title {String or DOMElement} The dialog title.
             * @message {String or DOMElement} The dialog contents.
             * @onok {Function} Invoked when the user clicks OK button.
             * @oncancel {Function} Invoked when the user clicks Cancel button or closes the dialog.
             *
             * alertify.confirm(title, message, onok, oncancel);
             *
             */
            alertify.confirm('Ups!', 'Tiene que seleccionar al menos un módulo', function () {
                alertify.success("Selecciona un módulo");
                return;
            }
            , function () {
                alertify.success("Selecciona un módulo");
                return;
            });
        }

    }

//Matricular los módulos con AJAX
    function assignCourseToStudent(modules) {
        var parameters = {
            "id": id,
            "modules": modules
        };

        $.ajax({
            type: 'POST',
            url: "../business/EnrollmentEmergentAction.php",
            data: parameters,
            success: function (data)
            {

                if (data == true) {
                    coursesToEnrollment();
//                    loadAcademicHistorial();
                } else {
                    alertify.error("Upps! Ha ocurrido un error en la matrícula!");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

//Obtener todos los módulos de la malla selecciona, ya sea mostrar todos 
    //los períodos o filtrar por período
    function coursesToEnrollment() {
        $.ajax({
            type: 'POST',
            url: "../business/GetFreeCourseByEnrollment.php",
            data: {"id": id},
            success: function (data)
            {
                $("#tbodyEnrollment").html("");
                var courses = JSON.parse(data);
                var htmlCourse = '';
                $.each(courses, function (i, item) {
                    htmlCourse += "<tr>";
                    htmlCourse += "<td>" + item.cod + "</td>";
                    htmlCourse += '<td>' + item.name + '</td>';
                    htmlCourse += "<td>" + item.area + "</td>";
                    htmlCourse += "<td>" + item.day + "</td>";
                    htmlCourse += "<td>" + item.hour + "</td>";
                    htmlCourse += "<td>" + item.year + "</td>";
                    htmlCourse += '<td><a href="javascript:deleteCourseToStudent(' + item.enrollment + ')">Eliminar</a></td>';
                    htmlCourse += "</tr>";
                });
                $("#tbodyEnrollment").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );
    }
    
    //ELiminar un módulo de la matrícula
    function deleteCourseToStudent(id) {
        alertify.confirm('Eliminar curso libre para matrícula', '¿Desea eliminar el curso de la matrícula?', function () {
            $.ajax({
                type: 'POST',
                url: "../business/DeleteCourseToEnrollmentEmergent.php",
                data: {"id": id},
                success: function (data)
                {
                    if (data == true) {
                        alertify.success("Módulo eliminado de la matrícula");
                        coursesToEnrollment();
//                        loadAcademicHistorial();
                    } else {
                        alertify.error("Upps! Ha ocurrido un error al eliminar el módulo!");
                    }
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            });
        }
        , function () {
            alertify.success("Cancelado");
            return;
        });
    }
    
//------------------------------------------------------------------------------
    //Logica del select de grupo
    $('#area').on('change', function () {
        if ($(this).val() !== "0") {
            $("#freeCourseByArea").html("");
            $("#labelArea").html("Cursos de " + $("#area option:selected").html());
            loadCourseByArea($(this).val());
            $("#showCourses").show();
            $("#enrollmentAction").show();
        } else {
            clearCheck();
            hideDiv();
        }
    }
    );

    //Logica del select de período
    $('#reportEnrrollment').on('change', function () {
        if ($(this).val() != 0) {
            open("../reporter/EnrollmentEmergent.php?id=" + id);
        }
    }
    );

</script>

