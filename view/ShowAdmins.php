<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowAdmins.php"><i class="fa fa-arrow-circle-right"></i> Administradores</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Administradores del CINDEA</h3>
                    <a type="button" class="btn btn-primary btn-sm pull-right" href="CreateAdmin.php">Crear Administrador</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once __DIR__.'/../business/AdminBusiness.php';
                            $AdminBusiness = new AdminBusiness();

                            $admins = $AdminBusiness->getAll();

                            foreach ($admins as $admin) {
                                ?>
                                <tr>
                                    <td><?php echo $admin->getPersonDni(); ?></td>
                                    <td><a href="InformationAdmin.php?id=<?php echo $admin->getPersonId();?>"><?php echo $admin->getPersonFirstName(); ?></a></td>
                                    <td><?php echo $admin->getPersonFirstlastname(); ?></td>
                                    <td><?php echo $admin->getPersonSecondlastname(); ?></td>
                            <div class="btn-group btn-group-justified">
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm" href="javascript:updateAdmin(<?php echo $admin->getPersonId() ?>)">Actualizar</a>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-danger btn-sm" href="javascript:deleteAdmin(<?php echo $admin->getPersonId() ?>)">Eliminar</a>
                                </td>
                            </div>
                            </tr>
                            <?php
                        }
                        ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
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
    $(function () {
        $("#example1").dataTable();
    });

    function updateAdmin(id) {
        window.location = "UpdateAdmin.php?id=" + id;
    }

    function deleteAdmin(id) {
        alertify.confirm('Eliminar administrador', '¿Desea eliminar?', function () {
            window.location = "../business/DeleteAdminAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

