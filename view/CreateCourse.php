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
        <li><a href="CreateCourse.php"><i class="fa fa-arrow-circle-right"></i>Crear Curso</a></li>
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
                    <h3 class="box-title">Crear Curso</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" action="../business/businessAction/CreateCourse.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Código</label>
                            <input id="code" name="code" type="number" class="form-control" placeholder="Código" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Creditos</label>
                            <input id="credits" name="credits" type="number" class="form-control" placeholder="Creditos" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Lecciones</label>
                            <input id="lessons" name="lessons" type="number" class="form-control" placeholder="Lecciones" required=""/>
                        </div>
                        <!-- select -->
                        <div class="form-group">
                            <label>Período</label>
                            <select id="period" name="period" class="form-control">
                                <option>I</option>
                                <option>II</option>
                                <option>III</option>
                            </select>
                        </div>
                        <!-- select -->
                        <div class="form-group">
                            <label>Especialidad</label>
                            <select id="speciality" name="speciality" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Cronograma</label>
                            <input id="schedule" name="schedule" type="file" id="exampleInputFile">
                            <p class="help-block">Subir archivo con extensión .pdf</p>
                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="box-footer">
                    <button onclick="valueInputs();" class="btn btn-primary">Crear</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">

    $(function () {
        $.ajax({
            type: 'GET',
            url: "../business/getAction/GetSpecialities.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                var bool = 0;
                $.each(speciality, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                $("#speciality").html(htmlCombo);

                if (bool === 0) {
                    /*
                     * @title {String or DOMElement} The dialog title.
                     * @message {String or DOMElement} The dialog contents.
                     * @onok {Function} Invoked when the user clicks OK button.
                     * @oncancel {Function} Invoked when the user clicks Cancel button or closes the dialog.
                     *
                     * alertify.confirm(title, message, onok, oncancel);
                     *
                     */
                    alertify.confirm('Confirmar', 'Tiene que existir al menos una especialidad', function () {
                        window.location = "CreateSpeciality.php";
                    }
                    , function () {
                        window.location = "CreateSpeciality.php";
                    });
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    });

    function valueInputs() {
        var code = $('#code').val();
        var name = $('#name').val();
        var credits = $('#credits').val();
        var lesson = $('#lessons').val();

        if (!isInteger(code)) {
            alertify.error("Formato de código incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre del curso");
            return false;
        }

        if (!isInteger(credits)) {
            alertify.error("Número de créditos no valido.");
            return false;
        }

        if (!isInteger(lesson)) {
            alertify.error("Número de lecciones no valido.");
            return false;
        }

        $("#form").submit(function () {
        });
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

</script>