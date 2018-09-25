<?php
include './reusable/Session.php';
include './reusable/Header.php';

if (isset($_GET['assign']))
    $assign = $_GET['assign'];

if (isset($_GET['update']))
    $update = $_GET['update'];

if (isset($_GET['delete']))
    $delete = $_GET['delete'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCurriculum.php"><i class="fa fa-arrow-circle-right"></i> Maya curricular</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Malla Curricular del CINDEA</h3>
                    <a type="button" class="btn btn-primary btn-sm pull-right" href="CreateCurriculum.php">Crear Malla Curricular</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Año</th>
                                <th>Nombre</th>
                                <th>Módulos</th>
                                <th>Asignar Módulos</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/CurriculumBusiness.php';
                            $curriculumBusiness = new CurriculumBusiness();

                            $curriculums = $curriculumBusiness->getAll();

                            foreach ($curriculums as $curriculum) {
                                ?>
                                <tr>
                                    <td><?php echo $curriculum->getCurriculumYear(); ?></td>
                                    <td><a href="InformationCurriculum.php?id=<?php echo $curriculum->getCurriculumId(); ?>"><?php echo $curriculum->getCurriculumName(); ?></a></td>
                                    <td><a class="btn btn-info btn-sm" href="ShowCoursesCurriculum.php?id=<?php echo $curriculum->getCurriculumId(); ?>">Módulos</a></td>
                                    <td><a class="btn btn-info btn-sm" href="AssignCourseToCurriculum.php?id=<?php echo $curriculum->getCurriculumId() ?>">Asignar módulos</a></td>
                                    <td><a class="btn btn-primary btn-sm" href="UpdateCurriculum.php?id=<?php echo $curriculum->getCurriculumId() ?>">Actualizar</a></td>
                                    <td><a class="btn btn-danger btn-sm" href="javascript:deleteConfirmation(<?php echo $curriculum->getCurriculumId() ?>)">Eliminar</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Año</th>
                                <th>Nombre</th>
                                <th>Módulos</th>
                                <th>Asignar Módulos</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
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
        alertify.confirm('Eliminar maya curricular', '¿Desea eliminar la maya curricular "' +
                $("#year" + id).html() + " " + $("#name" + id).html() + '" de la lista?',
                function () {
                    window.location = "../business/DeleteCurriculumAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

