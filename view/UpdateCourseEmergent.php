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
                            <input id="code" name="code" type="number" class="form-control" placeholder="Código" required="" value="<?php echo $course->getCod(); ?>" />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name"type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $course->getDescription(); ?>" />
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

                <div class="btn-group btn-group-justified">
                    <a type="button" class="btn btn-primary" href="javascript:updateCourse()">Actualizar</a>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">
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

        if (!isInteger(code)) {
            alertify.error("Formato de código incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre del curso");
            return false;
        }

        $("#formCourse").submit();

    }

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