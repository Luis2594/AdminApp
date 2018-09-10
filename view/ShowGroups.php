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
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Grupos</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Grupos del CINDEA</h3>
                    <a type="button" class="btn btn-primary pull-right" href="CreateGroup.php">Crear Grupo</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/GroupBusiness.php';
                            $business = new GroupBusiness();

                            $groups = $business->getAll();

                            foreach ($groups as $group) {
                                ?>
                                <tr>
                                    <td><?php echo $group->getGroupName(); ?></td>
                                    <td><a href="UpdateGroup.php?id=<?php echo $course->getGroupId(); ?>" >Actualizar</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Grupo</th>
                                <th>Actualizar</th>
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

