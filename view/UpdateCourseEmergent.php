<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCoursesEmergent.php?update=update"><i class="fa fa-arrow-circle-right"></i>Actualizar Cursos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Curso</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Actualizar Módulo</h3>
                </div><!-- /.box-header -->

                <?php
                include '../business/FreeCourseBusiness.php';

                $courseBusiness = new FreeCourseBusiness();
                $id = (int) $_GET['id'];

                $course = $courseBusiness->getCourseById($id);
                ?>
                <!-- form start -->
                <form role="form" id="formCourse" action="../business/UpdateFreeCourseAction.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--CODE-->
                        <div class="form-group">
                            <label>Código</label>
                            <input id="code" name="code" type="text" class="form-control" placeholder="Código" required="" value="<?php echo $course->getCod(); ?>" />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name"type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $course->getDescription(); ?>" />
                        </div>
                        <!--NUMBER GROUP-->
                        <div class="form-group">
                            <label>Grupo</label>
                            <table style="width:100%">
                                <tr style="align-content: center;">
                                    <th>1</th>
                                    <th>2</th> 
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                                <tr>
                                    <td> <input value="1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" /></td>
                                    <td> <input value="2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" /></td>
                                    <td> <input value="3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" /></td>
                                    <td> <input value="4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" /></td>
                                    <td> <input value="5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" /></td>
                                </tr>

                            </table>
                        </div>
                        <div class="form-group">
                            <input id="numbergroup" name="numbergroup" type="text" class="form-control" placeholder="Grupo" required="" readonly value="<?php echo $course->getNumberGroup(); ?>"/>
                        </div>
                        <!--AREA-->
                        <div class="form-group">
                            <label>Área</label>
                            <input id="areaTemp" type="text" class="form-control" placeholder="Área" required="" value="<?php echo $course->getFkarea(); ?>" />
                            <select id="area" name="area" class="form-control">
                            </select>
                        </div>
                        <!--DIA-->
                        <div class="form-group">
                            <label>Día</label>
                            <input id="dayTemp" type="text" class="form-control" placeholder="Día" required="" value="<?php echo $course->getDaynumber(); ?>" />
                            <select id="day" name="day" class="form-control">
                            </select>
                        </div>
                        <!--HORA-->
                        <div class="form-group">
                            <label>Hora</label>
                            <input id="hourTemp" type="text" class="form-control" placeholder="Hora" required="" readonly value="<?php echo $course->getFkhour(); ?>" />
                            <select id="hour" name="hour" class="form-control">
                            </select>
                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="box-footer">
                    <a type="button" class="btn btn-primary" style="width: 49%" href="javascript:updateCourse()">Actualizar</a>
                    <button onclick="goBack();" style="width: 49%" class="btn btn-primary">Atrás</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }

    $("#codeTemp").hide();

    $(function () {
        areas();
        days();
        hours();
    });

    function areas() {
        $.ajax({
            type: "GET",
            url: "../business/GetAreas.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                $.each(speciality, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                $("#area").html(htmlCombo);
                $('#area option:contains("' + $("#areaTemp").val() + '")').attr('selected', 'selected');
                $("#areaTemp").hide();
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }
//
    function days() {
        $.ajax({
            type: 'GET',
            url: "../business/GetDays.php",
            success: function (data)
            {
                var days = JSON.parse(data);
                var htmlCombo = '';
                $.each(days, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.day + '</OPTION>';
                });
                $("#day").html(htmlCombo);
                $('#day option:contains("' + $("#dayTemp").val() + '")').attr('selected', 'selected');
                $("#dayTemp").hide();
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function hours() {
        $.ajax({
            type: 'GET',
            url: "../business/GetHours.php",
            success: function (data)
            {
                var hours = JSON.parse(data);
                var htmlCombo = '';
                $.each(hours, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.hour + '</OPTION>';
                });
                $("#hour").html(htmlCombo);
                $('#hour option:contains("' + $("#hourTemp").val() + '")').attr('selected', 'selected');
                $("#hourTemp").hide();
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function updateCourse() {
        valueInputs();
    }

    function valueInputs() {
        var code = $('#code').val();
        var name = $('#name').val();
        var numbergroup = $('#numbergroup').val();

        if (code.length === 0) {
            alertify.error("Verifique el código");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre del curso");
            return false;
        }

        if (numbergroup.length === 0) {
            alertify.error("Verifique el grupo del curso");
            return false;
        }

        $("#formCourse").submit();

    }

    var groupValue = "";
    $("input:checkbox").on('click', function () {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
            groupValue =  $(this).val();
            $("#numbergroup").val($("#code").val() + "-" + groupValue);
        } else {
            $box.prop("checked", false);
        }
    });

    $("#code").on('keyup', function () {
        $("#numbergroup").val($(this).val() + "-" + groupValue);
    }).keyup();

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    function confirmCode(code) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmCode.php",
            data: {"code": code},
            success: function (data)
            {
                if (data == true) {
                    $("#formCourse").submit();
                } else {
                    alertify.error("Ya existe un módulo con ese número de código");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

</script>