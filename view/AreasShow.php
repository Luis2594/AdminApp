<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Emergentes</a></li>
        <li><a href="AreasShow.php"><i class="fa fa-arrow-circle-right"></i> Áreas</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Áreas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/AreasBusiness.php';
                            $business = new AreasBusiness();

                            $all = $business->getAll();

                            foreach ($all as $entity) {
                                ?>
                                <tr>
                                    <td><?php echo utf8_decode($entity->getDescription()); ?></td>
                                <div class="btn-group btn-group-justified">
                                    <td>
                                        <a type="button" class="btn btn-primary" href="javascript:update(<?php echo $entity->getPk() ?>)">Actualizar</a>                    
                                        <a type="button" class="btn btn-danger" href="javascript:remove(<?php echo $entity->getPk() ?>)">Eliminar</a>
                                    </td>
                                </div>
                                </tr>
                                <?php
                        }
                        ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Descripción</th>
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
    
    $(function () {
        $("#example1").dataTable();
    });

    function update(pk) {
        window.location = "AreasUpdate.php?pk=" + pk;
    }

    function remove (pk) {
        alertify.confirm('Eliminar Registro', '¿Desea eliminar?', function () {
            window.location = "../business/AreasDeleteAction.php?pk=" + pk;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

