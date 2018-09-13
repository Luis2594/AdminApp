<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Grupos</a></li>
        <li><a href="ShowGroups.php"><i class="fa fa-arrow-circle-right"></i> Gestionar Grupos</a></li>
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
                    <a type="button" class="btn btn-primary btn-sm pull-right" href="CreateGroup.php">Crear Grupo</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
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
                                    <td><label class="btn btn-ligth btn-lg"><?php echo $group[number]; ?></label></td>
                                    <td><a class="btn btn-primary btn-sm" href="UpdateGroupNumber.php?id=<?php echo $group[id]; ?>" >Actualizar</a></td>
                                    <td><a class="btn btn-danger btn-sm" href="javascript:deleteConfirmation(<?php echo $group[id]; ?>, '<?php echo $group[number]; ?>')" >Eliminar</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Grupo</th>
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

    function deleteConfirmation(id, name) {
        alertify.confirm('Eliminar Grupo', '¿Desea eliminar el módulo "' +
                name + '" de la lista de grupos?', function () {
                    window.location = "../actions/GroupDeleteAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

