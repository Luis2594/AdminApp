<?php
include './reusable/Session.php';
include './reusable/Header.php';
date_default_timezone_set('America/Costa_Rica');
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentsEmergent.php"><i class="fa fa-arrow-circle-right"></i>Ver Estudiantes Emergentes</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información del Estudiante</a></li>
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
                    <h3 class="box-title">Información Estudiante</h3>
                </div><!-- /.box-header -->

                <?php
                include '../business/StudentEmergentBusiness.php';

                $studentEmergentBusiness = new StudentEmergentBusiness();
                $id = (int) $_GET['id'];
                $student = $studentEmergentBusiness->getStudentById($id);

                $bool = false;

                include '../business/PhoneEmergentBusiness.php';
                $phoneEmergentBusiness = new PhoneEmergentBusiness();
                $phones = $phoneEmergentBusiness->phoneByPerson($id);
                ?>
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <!--DNI-->
                        <div class="form-group">
                            <label>Cédula</label>
                            <input id="dni" name="dni" type="number" class="form-control" placeholder="Cédula" required="" value="<?php echo $student->getDni() ?>" readonly />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $student->getFirstname() ?>" readonly />
                        </div>
                        <!--FIRSTLASTNAME-->
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input id="firstlastname" name="firstlastname" type="text" class="form-control" placeholder="Primer apellido" required="" value="<?php echo $student->getFirstlastname() ?>" readonly />
                        </div>
                        <!--SECONDLASTNAME-->
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input id="secondlastname" name="secondlastname" type="text" class="form-control" placeholder="Segundo apellido" required="" value="<?php echo $student->getSecondlastname() ?>" readonly />
                        </div>
                        <!-- BIRTHDATE -->
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="birthdate" name="birthdate" type="text" class="form-control" value="<?php echo date("d/m/Y", strtotime($student->getBirthdate())); ?>" readonly />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!--AGE-->
                        <!--                            <div class="form-group">
                                                        <label>Edad</label>
                                                        <input id="age" name="age" type="number" class="form-control" placeholder="Edad" required="" value="" readonly />
                                                    </div>-->
                        <!--GENDER-->
                        <div class="form-group">
                            <label>Género</label>
                            <?php
                            if ($student->getGender() == "M") {
                                ?>
                                <input id="gender" name="gender" type="text" class="form-control" placeholder="Género" required="" value="Hombre" readonly/>
                                <?php
                            } else {
                                ?>
                                <input id="gender" name="gender" type="text" class="form-control" placeholder="Género" required="" value="Mujer" readonly/>
                                <?php
                            }
                            ?>
                        </div>
                        <!--NATIONALITY-->
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <input id="nationality" name="nationality" type="text" class="form-control" placeholder="Nacionalidad" required="" value="<?php echo $student->getNationality() ?>" readonly/>
                        </div>
                        <!--YEARINCOME-->
                        <div class="form-group">
                            <label>Año de matrícula</label>
                            <input id="yearIncome" name="yearIncome" type="number" class="form-control" placeholder="Año de ingreso" required="" value="<?php echo $student->getEnrollmentyear() ?>" readonly />
                        </div>
                        <!--LOCALITATION-->
                        <div>
                            <label>Localización</label>
                            <input id="localitation" name="localitation" class="form-control" rows="3" placeholder="Localización ..." required="" value="<?php echo $student->getAddress() ?>" readonly />
                        </div>
                        <!--MANAGER-->
                        <div class="form-group">
                            <label>Encargado</label>
                            <input id="managerStudent" name="managerStudent" type="text" class="form-control" placeholder="Encargado" required="" value="<?php echo $student->getResponsable() ?>" readonly />
                        </div>
                        <?php
                        foreach ($phones as $phone) {
                            ?>
                            <!--PHONE-->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Télefono" required="" value="<?php echo $phone->getPhone() ?>" readonly />
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div><!-- /.box-body -->
                </form>

                <div class="btn-group btn-group-justified">
                    <a type="button" class="btn btn-success" href="javascript:createStudent()">Crear</a>
                    <a type="button" class="btn btn-primary" href="javascript:updateStudent(<?php echo $id ?>)">Actualizar</a>
                    <a type="button" class="btn btn-danger" href="javascript:deleteStudent(<?php echo $id ?>)">Eliminar</a>
                    <a type="button" class="btn btn-primary" href="javascript:showStudents()">Ver todo</a>
                </div>

                <!--</div>-->
                <?php
                ?>
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

    function createStudent() {
        window.location = "CreateStudentEmergent.php";
    }

    function updateStudent(id) {
        window.location = "UpdateStudentEmergent.php?id=" + id;
    }

    function showStudents() {
        window.location = "ShowStudentsEmergent.php";
    }

    function deleteStudent(id) {
        alertify.confirm('Eliminar estudiante', '¿Desea eliminar a ' +
                $("#name").val() + " " +
                $("#firstlastname").val() + " " +
                $("#secondlastname").val() +
                " con cédula " + $("#dni").val() +
                " de la lista de estudiantes?", function () {
                    window.location = "../business/DeleteStudentEmergentAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }

</script>
