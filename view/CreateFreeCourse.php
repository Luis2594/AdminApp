<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Crear Curso Libre</a></li>
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
                    <h3 class="box-title">Crear Curso Libre</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formCourse" action="../business/CreateFreeCourseAction.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--CODE-->
                        <div class="form-group">
                            <label>Código</label>
                            <input id="code" name="code" type="number" class="form-control" placeholder="Código" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required=""/>
                        </div>
                        <!--AREA-->
                        <div class="form-group">
                            <label>Área</label>
                            <select id="area" name="area" class="form-control">
                            </select>
                        </div>
                        <!--DAY-->
                        <div class="form-group">
                            <label>Día</label>
                            <select id="day" name="day" class="form-control">
                            </select>
                        </div>
                        <!--HOUR-->
                        <div class="form-group">
                            <label>Hora</label>
                            <select id="hour" name="hour" class="form-control">
                            </select>
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
        areas();
        days();
        hours();
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

    function valueInputs() {
        var code = $('#code').val();
        var name = $('#name').val();

        if (!isInteger(code)) {
            alertify.error("Formato de código incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre del curso");
            return false;
        }
        $("#formCourse").submit();
//        confirmCode(code);
    }
//
    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    function areas() {
        $.ajax({
            type: "GET",
            url: "../business/GetAreas.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                var bool = 0;
                $.each(speciality, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                $("#area").html(htmlCombo);

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
                    alertify.confirm('Confirmar', 'Tiene que existir al menos un área', function () {
                        window.location = "#";
                    }
                    , function () {
                        window.location = "#";
                    });
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }
//
    function days() {
        $.ajax({
            type: 'GET',
            url: "../business/GetDays.php",
            success: function (data)
            {
                var days = JSON.parse(data);
                var htmlCombo = '';
                $.each(days, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.day + '</OPTION>';
                });
                $("#day").html(htmlCombo);

            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function hours() {
        $.ajax({
            type: 'GET',
            url: "../business/GetHours.php",
            success: function (data)
            {
                var hours = JSON.parse(data);
                var htmlCombo = '';
                $.each(hours, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.hour + '</OPTION>';
                });
                $("#hour").html(htmlCombo);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }
//
    function confirmCode(code) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmCodeEmergent.php",
            data: {"code": code},
            success: function (data)
            {
                if (data == true) {
                    $("#formCourse").submit();
                } else {
                    alertify.error("Ya existe un curso con ese número de código");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

</script>
