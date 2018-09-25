<?php
include './reusable/Session.php';
include './reusable/Header.php';

$pk = (int) $_GET['pk'];

if (isset($pk) && is_int($pk)) {
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Emergentes</a></li>
        <li><a href="AreasShow.php"><i class="fa fa-arrow-circle-right"></i> Área</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información Área</a></li>
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
                    <h3 class="box-title">Área</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            include '../business/AreaBusiness.php';
                            $business = new AreaBusiness();

                            $area = $business->getByPk($pk);
                            ?>
                            <label>Área</label>
                            <input id="name" name="name" type="text"  value="<?php echo $area->getDescription() ?>" class="form-control" placeholder="Nombre" required="" readonly/>
                            <?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="btn-group btn-group-justified">
                    <a type="button" class="btn btn-primary" href="javascript:update(<?php echo $pk; ?>)">Actualizar</a>
                    <a type="button" class="btn btn-danger" href="javascript:delete(<?php echo $pk ?>)">Eliminar</a>
                    <a type="button" class="btn btn-default" href="javascript:show()">Listado</a>
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

    function update(id) {
        window.location = "UpdateArea.php?id=" + id;
    }

    function show()) {
        window.location = "ShowAreas.php";
    }

    function delete(id) {
        alertify.confirm('Eliminar Área', '¿Desea eliminar este registro"' +
                $("#name").val() + '"?', function () {
            window.location = "../business/AreaDeleteAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }


</script>
