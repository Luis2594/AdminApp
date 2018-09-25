<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCoursesEmergent.php"><i class="fa fa-arrow-circle-right"></i>Ver Módulos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información del Módulo</a></li>
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
                    <h3 class="box-title">Información  del curso</h3>
                </div><!-- /.box-header -->

                <?php
                include '../business/FreeCourseBusiness.php';

                $courseBusiness = new FreeCourseBusiness();
                $id = (int) $_GET['id'];

                $course = $courseBusiness->getCourseById($id);
                ?>
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <!--CODE-->
                        <div class="form-group">
                            <label>Código</label>
                            <input id="code" name="code" type="text" class="form-control" placeholder="Código" required="" readonly value="<?php echo $course->getCod(); ?>" />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" required="" readonly value="<?php echo $course->getDescription(); ?>" />
                        </div>
                        <!--GROUP-->
                        <div class="form-group">
                            <label>Grupo</label>
                            <input type="text" class="form-control" placeholder="Grupo" required="" readonly value="<?php echo $course->getNumberGroup(); ?>" />
                        </div>
                        <!--AREA-->
                        <div class="form-group">
                            <label>Área</label>
                            <input type="text" class="form-control" placeholder="Área" required="" readonly value="<?php echo $course->getFkarea(); ?>" />
                        </div>
                        <!--DAY-->
                        <div class="form-group">
                            <label>Día</label>
                            <input type="text" class="form-control" placeholder="Día" required="" readonly value="<?php echo $course->getDaynumber(); ?>" />
                        </div>
                        <!--HOUR-->
                        <div class="form-group">
                            <label>Hora</label>
                            <input type="text" class="form-control" placeholder="Hora" required="" readonly value="<?php echo $course->getFkhour(); ?>" />
                        </div>
                    </div><!-- /.box-body -->
                </form>

                <div class="btn-group btn-group-justified">
                    <a type="button" class="btn btn-success" href="javascript:createCourse()">Crear</a>
                    <a type="button" class="btn btn-primary" href="javascript:updateCourse(<?php echo $id ?>)">Actualizar</a>
                    <a type="button" class="btn btn-danger" href="javascript:deleteCourse(<?php echo $id ?>)">Eliminar</a>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

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
    var action = $.get("action");
    var msg = $.get("msg");
    if (action === "1") {
        msg = msg.replace(/_/g, " ");
        alertify.success(msg);
    }
    if (action === "0") {
        msg = msg.replace(/_/g, " ");
        alertify.error(msg);
    }

    function createCourse() {
        window.location = "CreateFreeCourse.php";
    }

    function updateCourse(id) {
        window.location = "UpdateCourseEmergent.php?id=" + id;
    }

    function deleteCourse(id) {
        alertify.confirm('Eliminar curso libre', "¿Desea eliminar el curso libre?", function () {
            window.location = "../business/DeleteCourseEmergentAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }

</script>