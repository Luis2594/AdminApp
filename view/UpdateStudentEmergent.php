<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
?>
<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentsEmergent.php?update=update"><i class="fa fa-arrow-circle-right"></i>Actualizar Estudiantes Emergentes</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Estudiante Emergente</a></li>
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
                    <h3 class="box-title">Información Estudiante Emergente</h3>
                </div><!-- /.box-header -->

                <?php
                include_once __DIR__.'/../business/StudentEmergentBusiness.php';

                $studentEmergentBusiness = new StudentEmergentBusiness();
                $id = (int) $_GET['id'];
                $student = $studentEmergentBusiness->getStudentById($id);
                $bool = false;
                    ?>
                    <!-- FORM UPDATE STUDENT EMERGENT -->
                    <form role="form" id="formStudent" action="../business/UpdateStudentEmergentAction.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <!--DNI-->
                            <div class="form-group">
                                <label>Cédula</label>
                                <input id="dni" name="dni" type="number" class="form-control" placeholder="Cédula" required="" value="<?php echo $student->getDni() ?>"  />
                            </div>
                            <!--NAME-->
                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $student->getFirstname() ?>"  />
                            </div>
                            <!--FIRSTLASTNAME-->
                            <div class="form-group">
                                <label>Primer Apellido</label>
                                <input id="firstlastname" name="firstlastname" type="text" class="form-control" placeholder="Primer apellido" required="" value="<?php echo $student->getFirstlastname() ?>"  />
                            </div>
                            <!--SECONDLASTNAME-->
                            <div class="form-group">
                                <label>Segundo Apellido</label>
                                <input id="secondlastname" name="secondlastname" type="text" class="form-control" placeholder="Segundo apellido" required="" value="<?php echo $student->getSecondlastname() ?>"  />
                            </div>
                            <!-- BIRTHDATE -->
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="birthdate" name="birthdate" type="text" class="form-control" value="<?php echo date("d/m/Y", strtotime($student->getBirthdate())); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <!--AGE-->
<!--                            <div class="form-group">
                                <label>Año de matrícula</label>
                                <input id="age" name="age" type="number" class="form-control" placeholder="Edad" required="" value="<?php // echo $student->getEnrollmentyear() ?>"  />
                            </div>-->
                            <!--GENDER-->
                            <div class="form-group">
                                <label>Género</label>
                                <?php
                                if ($student->getGender() == "M") {
                                    ?>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" name="optionsRadios1" value="1" checked>
                                            Hombre
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" name="optionsRadios2" value="2">
                                            Mujer
                                        </label>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" name="optionsRadios1" value="1" >
                                            Hombre
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" name="optionsRadios2" value="2" checked>
                                            Mujer
                                        </label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!--NATIONALITY-->
                            <div class="form-group">
                                <label>Nacionalidad</label>
                                <input id="nationality" name="nationality" type="text" class="form-control" placeholder="Nacionalidad" required="" value="<?php echo $student->getNationality() ?>" />
                            </div>
                            <!--LOCALITATION-->
                            <div>
                                <label>Localización</label>
                                <input id="localitation" name="localitation" class="form-control" rows="3" placeholder="Localización ..." required="" value="<?php echo $student->getAddress() ?>"  />
                            </div>
                            <!--MANAGER-->
                            <div class="form-group">
                                <label>Encargado</label>
                                <input id="managerStudent" name="managerStudent" type="text" class="form-control" placeholder="Encargado" required="" value="<?php echo $student->getResponsable() ?>"  />
                            </div>
                            <input id="dniTemp" value="<?php echo $student->getDni() ?>">
                            <input id="id" name="id" value="<?php echo $id ?>">
                        </div><!-- /.box-body -->
                    </form>
                    <div class="box-footer">
                        <button onclick="valueInputs();" style="width: 49%" class="btn btn-primary">Actualizar</button>
                        <button onclick="backPage(<?php echo $id ?>);" style="width: 49%" class="btn btn-primary">Atrás</button>
                    </div>
                    <?php
                ?>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once __DIR__.'/./reusable/Footer.php';
?>

<script type="text/javascript">
    $("#id").hide();
    $("#dniTemp").hide();
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
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    function valueInputs() {

        var dniTemp = $('#dniTemp').val();
        var dni = $('#dni').val();
        var name = $('#name').val();
        var firstlastname = $('#firstlastname').val();
        var secondlastname = $('#secondlastname').val();
        var birthdate = $('#birthdate').val();
        var nationality = $('#nationality').val();
        var managerStudent = $('#managerStudent').val();
        var direction = $('#localitation').val();

        if (!isInteger(dni)) {
            alertify.error("Formato de cédula incorrecto");
            return false;
        }

        if (dni.length < 9) {
            alertify.error("Formato de cédula incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre");
            return false;
        }

        if (firstlastname.length === 0) {
            alertify.error("Verifique el primer apellido");
            return false;
        }

        if (secondlastname.length === 0) {
            alertify.error("Verifique el segundo apellido");
            return false;
        }

        if (!exitsDate(birthdate)) {
            alertify.error("Verifique la fecha de nacimiento");
            return false;
        }

        if (nationality.length === 0) {
            alertify.error("Verifique la nacionalidad");
            return false;
        }
        
        if (managerStudent.length === 0) {
            alertify.error("Verifique el nombre del encargado");
            return false;
        }

        if (direction.length === 0) {
            alertify.error("Verifique la localización");
            return false;
        }

        if (dni === dniTemp) {
            $("#formStudent").submit();
        } else {
            confirmDni(dni);
        }
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    function exitsDate(dateInput) {
        var dateTemp = dateInput.split("/");
        var day = dateTemp[0];
        var month = dateTemp[1];
        var year = dateTemp[2];
        var date = new Date(year, month, '0');
        if ((day - 0) > (date.getDate() - 0)) {
            return false;
        }
        return true;
    }

    function confirmDni(dni) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmDniEmergent.php",
            data: {"dni": dni},
            success: function (data)
            {
                if (data == true) {
                    $("#formStudent").submit();
                } else {
                    alertify.error("Ya existe un estudiante con ese número de cédula");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function backPage(id) {
        window.location = "InformationStudentEmergent.php?id=" + id;
    }
</script>
