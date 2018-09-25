<?php
include './reusable/Session.php';
include './reusable/Header.php';

if (isset($_GET['update']))
    $update = $_GET['update'];

if (isset($_GET['delete']))
    $delete = $_GET['delete'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourses.php"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <?php
        if (isset($update) && $update == "update") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Módulos</a></li>
        <?php } ?>
        <?php
        if (isset($delete) && $delete == "delete") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Eliminar Módulos</a></li>
        <?php } ?>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Módulos del CINDEA</h3>
                    <a type="button" class="btn btn-primary btn-sm pull-right" href="CreateCourse.php">Crear Módulo</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Lecciones</th>
                                <th>Tipo</th>
                                <th>Atinencia <br/>Especialidad</th>
                                <th>Períodos</th>
                                <th>Plan de Estudios</th>
                                <?php
                                if (isset($update) && $update == "update") {
                                    ?>
                                    <th>Actualizar</th>
                                <?php } ?>
                                <?php
                                if (isset($delete) && $delete == "delete") {
                                    ?>
                                    <th>Eliminar</th>
                                <?php } ?>
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
                                    <td><?php echo $course->getCourseCode(); ?></td>
                                    <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>"><?php echo $course->getCourseName(); ?></a></td>
                                    <td><?php echo $course->getCourseCredits(); ?></td>
                                    <td><?php echo $course->getCourseLesson(); ?></td>
                                    <td><?php echo $course->getCourseType(); ?></td>
                                    <td><?php echo $course->getSpecialityname(); ?></td>
                                    <td><a class="btn btn-primary btn-sm" href="UpdatePeriods.php?id=<?php echo $course->getCourseId(); ?>" >Períodos</a></td>
                                    <td><a class="btn btn-info btn-sm" href="../../pdf/<?php echo $course->getCoursePdf() ?>" target="_blank" >Plan de Estudio</a></td>

                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <td><a class="btn btn-primary btn-sm" href="UpdateCourse.php?id=<?php echo $course->getCourseId(); ?>" >Actualizar</a></td>
                                    <?php } ?>
                                    <?php
                                    if (isset($delete) && $delete == "delete") {
                                        ?>
                                        <td><a class="btn btn-danger btn-sm" href="javascript:deleteConfirmation(<?php echo $course->getCourseId(); ?>)" >Eliminar</a></td>
                                    <?php } ?>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Lecciones</th>
                                <th>Tipo</th>
                                <th>Atinencia <br/>Especialidad</th>
                                <th>Períodos</th>
                                <th>Plan de Estudios</th>
                                <?php
                                if (isset($update) && $update == "update") {
                                    ?>
                                    <th>Actualizar</th>
                                <?php } ?>
                                <?php
                                if (isset($delete) && $delete == "delete") {
                                    ?>
                                    <th>Eliminar</th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });

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

    function deleteConfirmation(id) {
        alertify.confirm('Eliminar Módulo', '¿Desea eliminar el módulo "' +
                $("#name" + id).html() + " " +
                '" de la lista de módulos?', function () {
                    window.location = "../business/DeleteCourseAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

