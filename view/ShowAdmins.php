<?php
//session_start();
//if (!isset($_SESSION['id'])) {
//    header("location: ./Login.php");
//}

include './reusable/Header.php';
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
                    <h3 class="box-title">Administradores del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Edad</th>
                                <th>Genero</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/PersonBusiness.php';
                            $personBusiness = new PersonBusiness();
                            
                            $admins = $personBusiness->getAll();
                            
                            foreach ($admins as $admin) {
                                ?>
                                <tr>
                                    <td><?php echo $admin->getPersonDni(); ?></td>
                                    <td><a href=""><?php echo $admin->getPersonFirstName(); ?></a></td>
                                    <td><?php echo $admin->getPersonFirstlastname(); ?></td>
                                    <td><?php echo $admin->getPersonSecondlastname(); ?></td>
                                    <td><?php echo $admin->getPersonAge(); ?></td>
                                    <td><?php echo $admin->getPersonGender(); ?></td>
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
                                <th>Edad</th>
                                <th>Genero</th>
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
</script>

