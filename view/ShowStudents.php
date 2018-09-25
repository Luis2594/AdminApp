<?php
include './reusable/Session.php';
include './reusable/Header.php';

if (isset($_GET['enrollment']))
    $enrollment = $_GET['enrollment'];

if (isset($_GET['update']))
    $update = $_GET['update'];

if (isset($_GET['delete']))
    $delete = $_GET['delete'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudents.php"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <?php
        if (isset($update) && $update == "update") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Estudiantes</a></li>
        <?php } ?>
        <?php
        if (isset($delete) && $delete == "delete") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Eliminar Estudiantes</a></li>
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
                    <h3 class="box-title">Estudiantes del CINDEA</h3>
                    <a type="button" class="btn btn-primary btn-sm pull-right" href="CreateStudent.php">Crear Estudiante</a>
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
                                    <th>Edad</th>
                                    <th>Género</th>
                                    <th>Adecuación</th>
                                    <th>Historial Académico</th>
                                    <?php
                                    if (isset($enrollment) && $enrollment == "enrollment") {
                                        ?>
                                        <th>Matrícular</th>
                                    <?php } ?>
                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <th>Télefonos</th>
                                        <th>Grupos</th>
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
                                include '../business/StudentBusiness.php';
                                $studentBusiness = new StudentBusiness();

                                $students = $studentBusiness->getAll();

                                foreach ($students as $student) {
                                    ?>
                                    <tr>
                                        <td><?php echo $student->getPersonDni(); ?></td>
                                        <td><a href="InformationStudent.php?id=<?php echo $student->getPersonId(); ?>"><?php echo $student->getPersonFirstName(); ?></a></td>
                                        <td><?php echo $student->getPersonFirstlastname(); ?></td>
                                        <td><?php echo $student->getPersonSecondlastname(); ?></td>
                                        <td><?php echo $student->getPersonAge(); ?></td>
                                        <?php
                                        if ($student->getPersonGender() == "1") {
                                            ?> 
                                            <td>Hombre</td>
                                            <?php
                                        } else {
                                            ?> 
                                            <td>Mujer</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "0") {
                                            ?>
                                            <td>Sin adecuación</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "1") {
                                            ?>
                                            <td>No significativa</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "2") {
                                            ?>
                                            <td>Significativa</td>
                                        <?php }
                                        ?>
                                        <td><a class="btn btn-info btn-sm" href="AcademicHistorial.php?id=<?php echo $student->getPersonId(); ?>">Historial Académico</a></td>
                                        <?php
                                        if (isset($enrollment) && $enrollment == "enrollment") {
                                            ?>
                                            <td><a class="btn btn-info btn-sm" href="Enrollment.php?id=<?php echo $student->getPersonId(); ?>">Matrícular</a></td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($update) && $update == "update") {
                                            ?>
                                            <td><a class="btn btn-info btn-sm" href="UpdatePhones.php?id=<?php echo $student->getPersonId(); ?>">Télefonos</a></td>
                                            <td><a class="btn btn-info btn-sm" href="UpdateGroup.php?id=<?php echo $student->getPersonId(); ?>">Grupos</a></td>
                                            <td><a class="btn btn-primary btn-sm" href="UpdateStudent.php?id=<?php echo $student->getPersonId(); ?>">Actualizar</a></td>
                                        <?php } ?>
                                        <?php
                                        if (isset($delete) && $delete == "delete") {
                                            ?>
                                            <td><a class="btn btn-danger btn-sm" href="javascript:deleteConfirmation(<?php echo $student->getPersonId() ?>)" >Eliminar</a></td>
                                        <?php } ?>
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
                                    <th>Género</th>
                                    <th>Adecuación</th>
                                    <th>Historial Académico</th>
                                    <?php
                                    if (isset($enrollment) && $enrollment == "enrollment") {
                                        ?>
                                        <th>Matrícular</th>
                                    <?php } ?>
                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <th>Télefonos</th>
                                        <th>Grupos</th>
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
        alertify.confirm('Eliminar estudiante', '¿Desea eliminar a ' +
                $("#name" + id).html() + " " +
                $("#firtsLastname" + id).html() + " " +
                $("#secondlastname" + id).html() + 
                " con cédula "+ $("#dni" + id).html()+ 
                " de la lista de estudiantes?", function () {
            window.location = "../business/DeleteStudentAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }
    
</script>

