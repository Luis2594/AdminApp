<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CircularShow.php"><i class="fa fa-arrow-circle-right"></i> Circulares</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Circulares</h3>
                    <a type="button" class="btn btn-primary pull-right btn-sm" href="CircularCreate.php?admin=<?php echo $_SESSION["id"]; ?>">Enviar Circular</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="tablaCirculares" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Ver Archivo</th>
                                <th>Eliminar</th>
                                <th>Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once __DIR__.'/../business/CircularBusiness.php';
                                $business = new CircularBusiness();

                                $entities = $business->getAll();

                                foreach ($entities as $entity) {
                                    ?>
                                    <tr>
                                        <td><?php echo $entity->getCircularDescription(); ?></td>
                                        <td><?php echo $entity->getCircularDate(); ?></td>
                                        <td>
                                            <a type="button" class="btn btn-primary btn-sm" target="_blank" href="../../documents/circular/<?php echo $entity->getCircularGUID(); ?>.pdf" >Ver Archivo</a>
                                        </td>
                                        <td>
                                        <?php 
                                        if ($entity->getCircularSender() == $_SESSION['id']){
                                            ?>
                                            <a type="button" class="btn btn-danger btn-sm" href="javascript:remove(<?php echo $entity->getCircularId() ?>)">Eliminar</a>
                                            <?php 
                                        } else{
                                            ?>
                                            &nbsp;
                                            <?php 
                                        }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                        if ($entity->getCircularSender() == $_SESSION['id']){
                                            ?>
                                            <a type="button" class="btn btn-info btn-sm" href="javascript:update(<?php echo $entity->getCircularId() ?>)">Actualizar</a>
                                            <?php 
                                        } else{
                                            ?>
                                            &nbsp;
                                            <?php 
                                        }
                                        ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Ver Archivo</th>
                                <th>Eliminar</th>
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
include_once __DIR__.'/./reusable/Footer.php';
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
        $("#tablaCirculares").dataTable();
    });

    function remove(id) {
        alertify.confirm('Eliminar Registro', '¿Desea eliminar?', function () {
                    window.location = "../actions/CircularDeleteAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }

    function update(id) {
        window.location = "CircularUpdate.php?id=" + id;
    }
</script>

