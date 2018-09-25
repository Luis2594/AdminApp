<?php
include './reusable/Session.php';
include './reusable/Header.php';

if(isset($_GET['enrollment']))$enrollment = $_GET['enrollment']; 
   
if(isset($_GET['update']))$update = $_GET['update'];

if(isset($_GET['delete']))$delete = $_GET['delete'];

?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Estudiantes Emergentes</a></li>

        <?php
        if (isset($enrollment) && $enrollment == "enrollment") {
            ?>
            <li><a href=""><i class="fa fa-arrow-circle-right"></i> Matricular Estudiantes Emergentes</a></li>
        <?php } ?>
        <?php
        if (isset($update) && $update == "update") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Estudiantes Emergentes</a></li>
        <?php } ?>
        <?php
        if (isset($delete) && $delete == "delete") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Eliminar Estudiantes Emergentes</a></li>
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
                    <h3 class="box-title">Estudiantes Emergentes del CINDEA</h3>
                    <a type="button" class="btn btn-primary btn-sm pull-right" href="CreateStudentEmergent.php">Crear Estudiante Emergente</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Género</th>
                                    <th>Año Matrícula</th>
                                    <?php
                                    if (isset($enrollment) && $enrollment == "enrollment") {
                                        ?>
                                        <th>Matricular</th>
                                    <?php } ?>

                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <th>Teléfonos</th>
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
                                include '../business/StudentEmergentBusiness.php';
                                $studentEmergentBusiness = new StudentEmergentBusiness();

                                $students = $studentEmergentBusiness->getAll();

                                foreach ($students as $student) {
                                    ?>
                                    <tr>
                                        <td id="dni<?php echo $student->getPk() ?>"><?php echo $student->getDni(); ?></td>
                                        <td id="name<?php echo $student->getPk() ?>"><a href="InformationStudentEmergent.php?id=<?php echo $student->getPk(); ?>"><?php echo $student->getFirstname(); ?></a></td>
                                        <td id="firtsLastname<?php echo $student->getPk() ?>"><?php echo $student->getFirstlastname(); ?></td>
                                        <td id="secondlastname<?php echo $student->getPk() ?>"><?php echo $student->getSecondlastname(); ?></td>
                                        <?php
                                        if ($student->getGender() == "M") {
                                            ?> 
                                            <td>Hombre</td>
                                            <?php
                                        } else {
                                            ?> 
                                            <td>Mujer</td>
                                            <?php
                                        }

                                        ?>
                                        <td><?php echo $student->getEnrollmentyear(); ?></td>

                                        <!--ENROLLMENT-->
                                        <?php
                                        if (isset($enrollment) && $enrollment == "enrollment") {
                                            ?>
                                        <td><a class="btn btn-info btn-sm" href="EnrollmentEmergent.php?id=<?php echo $student->getPk(); ?>">Matrícular</a></td>
                                            <?php
                                        }
                                        ?>

                                        <!--UPDATE-->
                                        <?php
                                        if (isset($update) && $update == "update") {
                                            ?>
                                        <td><a class="btn btn-info btn-sm" href="UpdatePhonesEmergent.php?id=<?php echo $student->getPk(); ?>">Télefonos</a></td>
                                        <td><a class="btn btn-primary btn-sm" href="UpdateStudentEmergent.php?id=<?php echo $student->getPk(); ?>">Actualizar</a></td>
                                            <?php
                                        }
                                        ?>
                                        
                                            <!--DELETE-->
                                        <?php
                                        if (isset($delete) && $delete == "delete") {
                                            ?>
                                            <td><a class="btn btn-danger btn-sm" href="javascript:deleteConfirmation(<?php echo $student->getPk() ?>)" >Eliminar</a></td>
                                            <?php
                                        }
                                        ?>
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
                                    <th>Género</th>
                                    <th>Año Matrícula</th>
                                    <?php
                                    if (isset($enrollment) && $enrollment == "enrollment") {
                                        ?>
                                        <th>Matricular</th>
                                    <?php } ?>
                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <th>Teléfonos</th>
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
                    </div>
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
        alertify.confirm('Eliminar estudiante emergente', '¿Desea eliminar a ' +
                $("#name" + id).html() + " " +
                $("#firtsLastname" + id).html() + " " +
                $("#secondlastname" + id).html() + 
                " con cédula "+ $("#dni" + id).html()+ 
                " de la lista de estudiantes emergentes?", function () {
            window.location = "../business/DeleteStudentEmergentAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

