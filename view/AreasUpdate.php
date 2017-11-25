<?php
include './reusable/Session.php';
include './reusable/Header.php';
$pk = (int) $_GET['pk'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Emergentes</a></li>
        <li><a href="AreasShow.php"><i class="fa fa-arrow-circle-right"></i> Áreas</a></li>
        <li><a href="AreasUpdate.php?pk=<?php echo $pk; ?>"><i class="fa fa-arrow-circle-right"></i>Actualizar Área</a></li>
    </ol>
</section>
<br>

<?php
if (isset($pk) && $pk != '' && is_int($pk)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Información de Área</h3>
                    </div><!-- /.box-header -->
                    <?php
                    include '../business/AreasBusiness.php';

                    $business = new AreasBusiness();

                    $entity = $business->getByPk($pk);
                    ?>
                    <!-- form start -->
                    <form id="formUpdateAreas" role="form" action="../business/AreasUpdateAction.php?pk=<?php echo $pk; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input id="description" name="description" value="<?php echo $entity->getDescription(); ?>" type="text" class="form-control" placeholder="Nombre" required=""/>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                    <div class="box-footer btn-group btn-group-justified">
                        <a type="button" class="btn btn-success" href="javascript:valueInputs()">Actualizar</a>
                        <a type="button" class="btn btn-primary" href="javascript:backPage()">Atrás</a>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

    <?php
}
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

    function valueInputs() {

        var name = $('#description').val();

        if (name.length === 0) {
            alertify.error("Verifique la descripción.");
            return false;
        }

        $("#formUpdateAreas").submit();
    }

    function backPage() {
        window.location = "AreasShow.php";
    }

</script>