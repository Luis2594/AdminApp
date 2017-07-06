<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<style>
    .imgCircle {
        width:200px;
        height:200px;
        border-radius:150px;
        margin-left: 50px;
        margin-right: 100px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfile.php"><i class="fa fa-arrow-circle-right"></i> Mi perfil</a></li>
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
                <!--TITLE-->
                <div class="box-header">
                    <h3 class="box-title">Mi Perfil</h3>
                </div><!-- /.box-header -->
                <img id="image" src="../resource/images/user1-128x128.jpg" class="imgCircle">
                <!-- form start -->
                <form role="form" id="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--PHOTO-->
                        <div class="form-group">
                            <label for="exampleInputFile">Cambiar foto de perfil</label>
                            <input id="newImage" name="newImage" type="file" id="exampleInputFile">
                            <a class="help-block" onclick="preview();">Vista previa</a>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Puesto</label>
                            <input id="name" name="name" type="text" class="form-control" disabled value="Administrador"/>
                        </div>
                        <!--DNI-->
                        <div class="form-group">
                            <label>Cédula</label>
                            <input id="dni" name="dni" type="text" class="form-control" disabled/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" disabled/>
                        </div>
                        <!--FIRSTLASTNAME-->
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input id="firstlastname" name="firstlastname" type="text" class="form-control" disabled/>
                        </div>
                        <!--SECONDLASTNAME-->
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input id="secondlastname" name="secondlastname" type="text" class="form-control" disabled/>
                        </div>
                        <!--EMAIL-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <!-- BIRTHDATE -->
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="birthdate" name="birthdate" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask disabled/>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!--AGE-->
                        <div class="form-group">
                            <label>Edad</label>
                            <input id="age" name="age" type="text" class="form-control" disabled/>
                        </div>
                        <!--GENDER-->
                        <div class="form-group">
                            <label>Género</label>
                            <input id="gender" name="gender" type="text" class="form-control" disabled/>
                        </div>
                        <!--NATIONALITY-->
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <input id="nationality" name="nationality" type="text" class="form-control" disabled/>
                        </div>
                        <!--PHONES-->
                        <table id="phone">
                            <tr id="tr0">
                                <td>
                                    <input id="phones" name="phones" type="text">
                                    <!--<input id="phone0" name="phone0" type="text">-->
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input id="phone0" name="phone0" type="number" class="form-control"  required="" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </td>
                            </tr>
                        </table>
                        <div class="btn-group-vertical">
                            <button id="AddPhone" onclick="addPhone();" type="button" class="btn btn-success">Agregar teléfono</button>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button onclick="valueInputs();" class="btn btn-primary">Actualizar datos del perfil</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">
    var idPhone = 1;
    $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Last 7 Days': [moment().subtract('days', 6), moment()],
                        'Last 30 Days': [moment().subtract('days', 29), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

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

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });

    function valueInputs() {
        var email = $('#exampleInputEmail1').val();

        if (!valueEmail(email)) {
            alertify.error("Verifique el correo electronico");
            return false;
        }

        $("#form").submit(function () {
        });
    }

    function valueEmail(email) {
        // Expresion regular para validar el correo
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        // Se utiliza la funcion test() nativa de JavaScript
        if (regex.test(email)) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    $('#phones').hide();
    function addPhone() {
        var startTr = '<tr id=' + '"tr' + idPhone + '">';
        var startTd1 = '<td>';
        var startDiv1 = '<div class=' + '"form-group"' + '>';
        var label = '<label>Teléfono</label>';
        var startDiv2 = '<div class="' + 'input-group"' + '>';
        var startDiv3 = '<div class="' + 'input-group-addon"' + '>';
        var i = '<i class="' + 'fa fa-phone" ></i>';
        var endDiv3 = '</div>';
        var input = '<input id="phone' + idPhone + '" name="phone' + idPhone + '" type="number" class="form-control" required=' + '"" />';
        var endDiv2 = '</div>';
        var endDiv1 = '</div>';
        var endTd1 = '</td>';
        var startTd2 = '<td>';
        var startDiv4 = "<div class=" + '"btn-group-vertical"' + 'style="margin-top: 9px; margin-left: 15px;">';
        var button = '<button id="' + 'deletePhone' + idPhone + '" type=' + '"button"' + ' onclick=' + '"deletePhone(' + idPhone + ');" class=' + '"btn btn-danger">Eliminar</button>';
        var endDiv4 = '</div>';
        var endTd2 = '</td>';
        var endTr = '</tr>';

        var scripHtml = startTr + startTd1 + startDiv1 + label + startDiv2 + startDiv3 + i + endDiv3 + input + endDiv2 + endDiv1 + endTd1 + startTd2 + startDiv4 + button + endDiv4 + endTd2 + endTr;

        $('#phone tr:last').after(scripHtml);

        $('#phones').val(idPhone);
        idPhone++;
    }

    function deletePhone(id) {
        $("#tr" + id).remove();
    }

    function preview() {
        if (document.getElementById('newImage').files && document.getElementById('newImage').files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
                $('#imageProfile1').attr('src', e.target.result);
                $('#imageProfile2').attr('src', e.target.result);
                $('#imageProfile3').attr('src', e.target.result);
            }

            reader.readAsDataURL(document.getElementById('newImage').files[0]);
        }
    }
</script>
