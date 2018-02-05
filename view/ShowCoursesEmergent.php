<?php
include './reusable/Session.php';
include './reusable/Header.php';

$update = $_GET['update'];
$delete = $_GET['delete'];
$export = $_GET['export'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCoursesEmergent.php"><i class="fa fa-arrow-circle-right"></i> Cursos Libres</a></li>

        <?php
        if (isset($update) && $update == "update") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Cursos Libres</a></li>
        <?php } ?>
        <?php
        if (isset($delete) && $delete == "delete") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Eliminar Cursos Libres</a></li>
        <?php } ?>

        <?php
        if (isset($export) && $export == "export") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Exportar</a></li>
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
                    <h3 class="box-title">Cursos Libres del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Área</th>
                                <th>Día</th>
                                <th>Hora</th>
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
                                <?php
                                if (isset($export) && $export == "export") {
                                    ?>
                                    <th>Exportar</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/FreeCourseBusiness.php';
                            $coursesBusiness = new FreeCourseBusiness();

                            $courses = $coursesBusiness->getAll();

                            foreach ($courses as $course) {
                                ?>
                                <tr>
                                    <td><?php echo $course->getCod(); ?></td>
                                    <td id="name<?php echo $course->getPk(); ?>"><a href="InformationCourseEmergent.php?id=<?php echo $course->getPk() ?>"><?php echo $course->getDescription(); ?></a></td>
                                    <td><?php echo $course->getFkarea(); ?></td>
                                    <td><?php echo $course->getDaynumber(); ?></td>
                                    <td><?php echo $course->getFkhour(); ?></td>
                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <td><a href="UpdateCourseEmergent.php?id=<?php echo $course->getPk() ?>">Actualizar</a></td>
                                    <?php } ?>
                                    <?php
                                    if (isset($delete) && $delete == "delete") {
                                        ?>
                                        <td><a href="javascript:deleteConfirmation(<?php echo $course->getPk(); ?>)" >Eliminar</a></td>
                                    <?php } ?>
                                    <?php
                                    if (isset($export) && $export == "export") {
                                        ?>
                                        <td><a href="javascript:exportStudents(<?php echo $course->getPk(); ?>)" >EXPORTAR</a></td>
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
                                <th>Área</th>
                                <th>Día</th>
                                <th>Hora</th>
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
                                <?php
                                if (isset($export) && $export == "export") {
                                    ?>
                                    <th>Exportar</th>
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
        alertify.confirm('Eliminar Curso Libre', '¿Desea eliminar el curso libre "' +
                $("#name" + id).html() + " " +
                '" de la lista de cursos libres?', function () {
                    window.location = "../business/DeleteCourseEmergentAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }
    
    function exportStudents(course) {
        open("../reporter/ExportExcel.php?course=" + course);
    }

</script>

