<?php
include './reusable/Session.php';
include './reusable/Header.php';
$update = $_GET['update'];
$delete = $_GET['delete'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowArea.php"><i class="fa fa-arrow-circle-right"></i> Área </a></li>
        <?php
        if (isset($update) && $update == "update") {
            ?>
            <li><a href="ShowArea.php?update=update"><i class="fa fa-arrow-circle-right"></i> Áreas para actualizar</a></li>
        <?php } ?>

        <?php
        if (isset($delete) && $delete == "delete") {
            ?>
            <li><a href="ShowArea.php?delete=delete"><i class="fa fa-arrow-circle-right"></i> Áreas para eliminar</a></li>
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
                    <h3 class="box-title">Áreas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Área</th>
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
                            include '../business/SpecialityBusiness.php';
                            $specialityBusiness = new SpecialityBusiness();

                            $specialities = $specialityBusiness->getAll();

                            foreach ($specialities as $speciality) {
                                ?>
                                <tr>
                                    <td id="name<?php echo $speciality->getSpecialityId(); ?>"><a href="InformationSpeciality.php?id=<?php echo $speciality->getSpecialityId(); ?>"><?php echo $speciality->getSpecialityName();?></a></td>

                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                    <td><a href="UpdateArea.php?id=<?php echo $speciality->getSpecialityId(); ?>">Actualizar</a></td>
                                    <?php } ?>

                                    <?php
                                    if (isset($delete) && $delete == "delete") {
                                        ?>
                                        <td><a href="javascript:deleteConfirmation(<?php echo $speciality->getSpecialityId(); ?>)">Eliminar</a></td>
                                    <?php } ?>

                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Área</th>
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
        alertify.confirm('Eliminar Área', '¿Desea eliminar el Área "' +
                $("#name" + id).html() + '"?', function () {
                    window.location = "../business/DeleteSpecialityAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }

</script>

