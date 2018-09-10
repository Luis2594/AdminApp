<?php
include './reusable/Session.php';
include './reusable/Header.php';

if (isset($_GET['assign']))
    $assign = $_GET['assign'];

if (isset($_GET['update']))
    $update = $_GET['update'];

if (isset($_GET['delete']))
    $delete = $_GET['delete'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfessorsManagement.php"><i class="fa fa-arrow-circle-right"></i> Gestionar Profesores</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Profesores del CINDEA</h3>
                    <a type="button" class="btn btn-primary pull-right" href="CreateProfessor.php">Crear Profesor</a>
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
                                    <th>Asignar Módulos</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../business/ProfessorBusiness.php';
                                $professorBusiness = new ProfessorBusiness();
                                //capture all professor as instances of ProfessorAll
                                $professors = $professorBusiness->getAll();

                                foreach ($professors as $professor) {
                                    ?>
                                    <tr>
                                        <td><?php echo $professor->getPersonDni(); ?></td>
                                        <td><a href="InformationProfessor.php?id=<?php echo $professor->getPersonId(); ?>"><?php echo $professor->getPersonFirstName(); ?></a></td>
                                        <td><?php echo $professor->getPersonFirstlastname(); ?></td>
                                        <td><?php echo $professor->getPersonSecondlastname(); ?></td>
                                        <td><a href="AssignCourseToProfessor.php?id=<?php echo $professor->getPersonId(); ?>">Asignar</a></td>
                                        <td><a  href="UpdateProfessor.php?id=<?php echo $professor->getPersonId() ?>" >Actualizar</a></td>
                                        <td><a  href="javascript:deleteConfirmation(<?php echo $professor->getPersonId() ?>)" >Eliminar</a></td>
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
                                    <th>Asignar Módulos</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
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
        alertify.confirm('Eliminar profesor', '¿Desea eliminar a ' +
                $("#name" + id).html() + " " +
                $("#firtsLastname" + id).html() + " " +
                $("#secondlastname" + id).html() +
                " con cédula " + $("#dni" + id).html() +
                " de la lista de profesores?", function () {
                    window.location = "../business/DeleteProfessorAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

