<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfessors.php?assign=assign"><i class="fa fa-arrow-circle-right"></i>Asignar módulos a profesor</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Asignar módulos</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW PERIOD AND GROUP-->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <?php
                        include '../business/ProfessorBusiness.php';

                        $professorBusiness = new ProfessorBusiness();

                        $professors = $professorBusiness->getProfessor($id);

                        foreach ($professors as $professor) {
                            ?>
                            <h3 class="box-title">Asignar módulos a: <?php
                                echo $professor->getPersonFirstName()
                                . " " . $professor->getPersonFirstlastname()
                                . " " . $professor->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <!--SPECIALITIES-->
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table id="group" border="4" style="border-collapse: separate; border-spacing:  5px 15px;">
                                    </table>
                                </div> 
                            </div>
                            <div class="form-group" id="divPeriod">
                                <label>Periodo</label>
                                <select id="period" name="period" class="form-control">
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!--SHOW MODULES FOR ASSIGN TO PROFESSOR-->
            <div class="col-xs-12" id="showModules">
                <div class="box">
                    <div class="box-header">
                        <?php
                        foreach ($professors as $professor) {
                            ?>
                            <h3 id="h3Info" class="box-title">Asignar modulos a: <?php
                                echo $professor->getPersonFirstName()
                                . " " . $professor->getPersonFirstlastname()
                                . " " . $professor->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <button onclick="Assign(<?php echo $id; ?>);" class="btn btn-primary">Asignar módulo(s)</button>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Atinencia/Especialidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../business/CourseBusiness.php';
                                $coursesBusiness = new CourseBusiness();

                                $courses = $coursesBusiness->getAll();

                                foreach ($courses as $course) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input value="<?php echo $course->getCourseId() ?>" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                                        </td>
                                        <td><?php echo $course->getCourseCode(); ?></td>
                                        <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>"><?php echo $course->getCourseName(); ?></a></td>
                                        <td><?php echo $course->getCourseCredits(); ?></td>
                                        <td><?php echo $course->getCourseLesson(); ?></td>
                                        <td><?php echo $course->getCourseType(); ?></td>
                                        <td><?php echo $course->getSpecialityname(); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Atinencia/Especialidad</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW MODULES TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        foreach ($professors as $professor) {
                            ?>
                            <h3 class="box-title">Módulos asignados a: <?php
                                echo $professor->getPersonFirstName()
                                . " " . $professor->getPersonFirstlastname()
                                . " " . $professor->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Grupo</th>
                                    <th>Período</th>
                                    <th>Año</th>
                                    <th>Atinencia/Especialidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Grupo</th>
                                    <th>Período</th>
                                    <th>Año</th>
                                    <th>Atinencia/Especialidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include './reusable/Footer.php';
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
        }
    })(jQuery);
    var id = $.get("id");
    $(function () {
        $("#example1").dataTable();
        hideDiv();
        groups();
        coursesToProfessor();
        period();
    });
    function hideDiv() {
        $("#showModules").hide();
//        $("#divPeriod").hide();
    }

    var h3Info = $("#h3Info").html();
    $('#period').on('change', function () {
        if ($(this).val() !== "0") {
            $("#h3Info").html(h3Info + " en el grupo: " + $("#group option:selected").html() + " en el " + $('#period option:selected').html() + " período");
            $("#showModules").show();
        } else {
            clearCheck();
            $("#showModules").hide();
        }
    }
    );
    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }

    function Assign(id) {
        var group = ""
        var modules = "";

        $("input[name=groupcheck]").each(function (index) {
            if ($(this).is(':checked')) {
                group += $(this).val() + ",";
            }
        });

        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                modules += $(this).val() + ",";
            }
        });


        if (group != "") {
            if (modules != "") {
                group = group.substr(0, group.length - 1);
                modules = modules.substr(0, modules.length - 1);
                clearCheck();
                assignCourseToProfessor(group, modules);
            } else {
                alertify.confirm('Ups!', 'Tiene que seleccionar al menos un módulo', function () {
                    alertify.success("Selecciona un módulo");
                    return;
                }
                , function () {
                    alertify.success("Selecciona un módulo");
                    return;
                });
            }
        } else {
            alertify.confirm('Ups!', 'Tiene que seleccionar al menos un grupo', function () {
                alertify.success("Selecciona un grupo");
                return;
            }
            , function () {
                alertify.success("Selecciona un grupo");
                return;
            });
        }


    }

    function assignCourseToProfessor(groups, modules) {
        var parameters = {
            "id": id,
            "groups": groups,
            "period": $("#period").val(),
            "modules": modules
        };
        $.ajax({
            type: 'POST',
            url: "../business/AssignCoursesToProfessor.php",
            data: parameters,
            success: function (data)
            {
                if (data == true) {
                    coursesToProfessor();
                } else {
                    alertify.error("Upps! Ha ocurrido un error!");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function groups() {
        $.ajax({
            type: 'GET',
            url: "../business/GetGroups.php",
            success: function (data)
            {
                var group = JSON.parse(data);
                var cont = 0;
                var startTr = '<tr>';
                var endTr = '</tr>';
                var htmTable = startTr;
                $.each(group, function (i, item) {
                    if (cont > 5) {
                        cont = 0;
                        htmTable += endTr;
                        htmTable += startTr;
                    }
                    htmTable += '<td>';
                    htmTable += '<input value="' + item.id + '" type="checkbox" name="groupcheck" style="width: 20px; height: 20px; text-align: center" />';
                    htmTable += '<label>' + item.number + '</label>';
                    htmTable += '</td>';
                    cont++;
                });
                htmTable += endTr;
                $("#group").html(htmTable);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    var temHtmlPerido;
    function period() {
        $.ajax({
            type: 'GET',
            url: "../business/GetPeriods.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccionar período</OPTION>';
                $.each(speciality, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.period + '</OPTION>';
                });
                temHtmlPerido = htmlCombo;
                $("#period").html(temHtmlPerido);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function coursesToProfessor() {
        $.ajax({
            type: 'POST',
            url: "../business/GetCoursesProfessor.php",
            data: {"id": id},
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
                    htmlCourse += "<td>" + item.coursetype + "</td>";
                    htmlCourse += "<td>" + item.groupnumber + "</td>";
                    htmlCourse += "<td>" + item.period + "</td>";
                    htmlCourse += "<td>" + item.professorcourseyear + "</td>";
                    htmlCourse += "<td>" + item.specialityname + "</td>";
                    htmlCourse += '<td><a href="javascript:deleteCourseToProfessor(' + item.professorcourseid + ')">Eliminar</a></td>';
                });
                $("#tbody").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function deleteCourseToProfessor(id) {

        alertify.confirm('Eliminar módulo de profesor', '¿Desea eliminar el módulo de la lista del profesor?', function () {
            $.ajax({
                type: 'POST',
                url: "../business/DeleteCourseToProfessor.php",
                data: {"id": id},
                success: function (data)
                {
                    if (data == true) {
                        alertify.success("Módulo eliminado de la lista del profesor");
                        coursesToProfessor();
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
        });
    }

</script>

