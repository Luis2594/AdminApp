<?php
include './reusable/Header.php';
require '../resource/log/ErrorHandler.php';
?>

<div class="row">
    <div class="col-md-6 center-block text-center" style="margin-top:30px;">
        <H2 style="margin-left: 10px; text-aling:center;">Totalidad de Estudiantes</H2>
        <div class="col-md-6">
            <div class="panel" style="margin-left: 10px">
                <div class="panel-heading" >
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 id="totalStudents"></h3>
                            <h5>Total Estudiantes</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel" style="margin-left: 10px; margin-right: 10px">
                <div class="panel-heading" >
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 id="totalEnrollment"></h3>
                            <h5>Total Matriculados</h5>
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

<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="row">
                <div class="box-body center-block text-center" >
                    <form>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha Inicio</label>
                                <input id="dateStart" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha Final</label>
                                <input id="dateEnd" type="date" class="form-control">
                            </div>
                        </div>
                    </form>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label></label>
                            <button onclick="sendConsult();" class="btn btn-primary" style="width:30%;margin-top:9px;">Consultar</button>
                        </div>
                    </div>                   
                </div>
                <hr/>
            </div>
            <hr/>
            <div id="divInfo">
                <div class="row">
                    <h3 class="center-block text-center">Total de Estudiantes Matriculados por Semestre</h3>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="panel panel-warning center-block text-center" style="margin-left: 5px">
                                <div class="panel-heading" >
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <h3 id="totalParcialEnrollment"></h3>
                                            <h5>Total Semestral Matriculados</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <H4 id="students_both_levels">Nota: </H4>
                </div>
                <div class="row center-block text-center">
                    <div class="col-md-6">
                        <div class="row">
                            <h3>Estudiantes Segundo Nivel</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary" style="margin-left: 5px">
                                    <div class="panel-heading" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-md-9 pull-right">
                                                <h3 id="totalStudentsSecondLevel"></h3>
                                                <h5>Estudiantes</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-md-9 pull-right">
                                                <h3 id="totalStudentsSecondLevelWoman"></h3>
                                                <h5>Mujeres</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-md-9 pull-right">
                                                <h3 id="totalStudentsSecondLevelMen"></h3>
                                                <h5>Hombres</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <h3>Estudiantes Tercer Nivel</h3>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-success" style="margin-left: 5px">
                                    <div class="panel-heading" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-md-9 pull-right">
                                                <h3 id="totalStudentsThirdLevel"></h3>
                                                <h5>Estudiantes</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-md-9 pull-right">
                                                <h3 id="totalStudentsThirdLevelWoman"></h3>
                                                <h5>Mujeres</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-md-9 pull-right">
                                                <h3 id="totalStudentsThirdLevelMen"></h3>
                                                <h5>Hombres</h5>
                                            </div>
                                        </div>
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