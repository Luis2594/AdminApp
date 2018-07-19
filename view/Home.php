<?php
include './reusable/Header.php';
require '../resource/log/ErrorHandler.php';
//ErrorHandler::Log(__METHOD__, "algo", $_SESSION["id"]);
?>
<H2 style="margin-left: 10px">Totalidad de estudiantes</H2>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel" style="margin-left: 10px">
            <div class="panel-heading" >
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h3 id="totalStudents"></h3>
                        <h4>Total Estudiantes</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel" style="margin-left: 10px; margin-right: 10px">
            <div class="panel-heading" >
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h3 id="totalEnrollment"></h3>
                        <h4>Total Matriculados</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <form>
                <div class="box-body">
                    <div class="form-group">
                        <label>Fecha de inicio</label>
                        <input id="dateStart" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Fecha final</label>
                        <input id="dateEnd" type="date" class="form-control">
                    </div>

                </div><!-- /.box-body -->

            </form>
            <div class="box-footer" style="text-align: center">
                <button onclick="sendConsult();" class="btn btn-primary">Consultar</button>
            </div>

            <div id="divInfo">

                <H2>Total Parcial de Estudiantes Matriculados</H2>
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-warning" style="margin-left: 5px">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalParcialEnrollment"></h3>
                                        <h4>Total Parcial Matriculados</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <H4 id="students_both_levels">Nota: </H4>

                <H2>Estudiantes Segundo Nivel</H2>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary" style="margin-left: 5px">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalStudentsSecondLevel"></h3>
                                        <h4>Estudiantes</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalStudentsSecondLevelWoman"></h3>
                                        <h4>Mujeres</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalStudentsSecondLevelMen"></h3>
                                        <h4>Hombres</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <H2>Estudiantes Tercer Nivel</H2>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success" style="margin-left: 5px">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalStudentsThirdLevel"></h3>
                                        <h4>Estudiantes</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalStudentsThirdLevelWoman"></h3>
                                        <h4>Mujeres</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading" >
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <h3 id="totalStudentsThirdLevelMen"></h3>
                                        <h4>Hombres</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="col-md-6">

        <img src="../resource/images/cindeaTurrialba.ico" class="img-responsive img-circle center-block "/>

    </div>
</div>

<div class="row special v-m" style="height:100vh; display:table; width:100%; margin-right:auto; vertical-align:middle">
    <!--<img src="../resource/images/cindeaTurrialba.ico" class="img-responsive img-circle center-block "/>-->
</div>

<?php
include './reusable/Footer.php';
?>

<script>

    (function ($) {

        getAllStatusEnrollment();

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

    function getAllStatusEnrollment() {
        $.ajax({
            type: 'GET',
            url: "../business/GetAllStatusEnrollment.php",
            success: function (data)
            {
                var values = JSON.parse(data);

                $.each(values, function (i, item) {
                    $("#totalStudents").html(item.totalStudents);
                    $("#totalEnrollment").html(item.totalEnrollment);
                });
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );

    }

    var divInfo = $("#divInfo").hide();
    var note = $("#students_both_levels").hide();
    function sendConsult() {
        $.ajax({
            type: 'GET',
            url: "../business/GetStatusEnrollment.php",
            data: {"dateStart": $("#dateStart").val(),
                "dateEnd": $("#dateEnd").val()},
            success: function (data)
            {
                divInfo.show();
                var values = JSON.parse(data);
                var students_both_level = 0;

                $.each(values, function (i, item) {

                    students_both_level = (parseInt(item.totalStudentsSecondLevel) +
                            parseInt(item.totalStudentsThirdLevel)) - parseInt(item.totalParcialEnrollment);

                    $("#totalParcialEnrollment").html(item.totalParcialEnrollment);

                    $("#totalStudentsSecondLevel").html(item.totalStudentsSecondLevel);
                    $("#totalStudentsSecondLevelWoman").html(item.totalStudentsSecondLevelWoman);
                    $("#totalStudentsSecondLevelMen").html(item.totalStudentsSecondLevelMen);

                    $("#totalStudentsThirdLevel").html(item.totalStudentsThirdLevel);
                    $("#totalStudentsThirdLevelWoman").html(item.totalStudentsThirdLevelWoman);
                    $("#totalStudentsThirdLevelMen").html(item.totalStudentsThirdLevelMen);


                });

                if (students_both_level > 0) {
                    note.show();
                    if (students_both_level == 1) {
                        $("#students_both_levels").html("NOTA: " + students_both_level + " estudiante esta cursando módulos en ambos niveles");
                    } else {
                        $("#students_both_levels").html("NOTA: " + students_both_level + " estudiantes estan cursando módulos en ambos niveles");
                    }
                } else {
                    note.hide();
                }

            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );

    }


</script>