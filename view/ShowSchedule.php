<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver Horario</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <!--<div class="row">-->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- GROUP -->
            <div class="form-group">
                <label>Grupo</label>
                <select id="group" name="course" class="form-control">
                </select>
            </div>
        </div>
    </div>

    <!--<div class="col-md-6">-->
    <div class="box" id="schedule">

        <!--DELETE SCHEDULE-->
        <div id="divDelete1" class="box-footer" style="text-align: center">
            <button onclick="deleteSchedule();" class="btn btn-danger">Eliminar horario</button>
        </div>

        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table table-condensed">
                <tr>
                    <th style="width: 120px">Hora / Día</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>

                <!--MORNING-->
                <!--HOUR 7:00AM - 7:40AM-->
                <tr>
                    <td>7:00am-7:40am</td>
                    <!--MONDAY-->
                    <td>
                        <span id="1-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="1-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="1-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="1-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="1-5"></span>
                    </td>
                </tr>
                <!--HOUR 7:40AM - 8:20AM-->
                <tr>
                    <td>7:40am-8:20am</td>
                    <!--MONDAY-->
                    <td>
                        <span id="2-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="2-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="2-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="2-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="2-5"></span>
                    </td>
                </tr>
                <!--HOUR 8:20AM - 9:00AM-->
                <tr>
                    <td>8:20am-9:00am</td>
                    <!--MONDAY-->
                    <td>
                        <span id="3-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="3-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="3-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="3-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="3-5"></span>
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 9:10AM - 9:50AM-->
                <tr>
                    <td>9:10am-9:50am</td>
                    <!--MONDAY-->
                    <td>
                        <span id="4-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="4-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="4-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="4-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="4-5"></span>
                    </td>
                </tr>
                <!--HOUR 9:50AM - 10:30AM-->
                <tr>
                    <td>9:50am-10:30am</td>
                    <!--MONDAY-->
                    <td>
                        <span id="5-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="5-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="5-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="5-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="5-5"></span>
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 10:40AM - 11:20AM-->
                <tr>
                    <td>10:40am-11:20am</td>
                    <!--MONDAY-->
                    <td>
                        <span id="6-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="6-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="6-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="6-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="6-5"></span>
                    </td>
                </tr>
                <!--HOUR 11:20AM - 12:00MM-->
                <tr>
                    <td>11:20am-12:00mm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="7-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="7-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="7-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="7-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="7-5"></span>
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                </tr>

                <!--AFTERNOON-->
                <!--HOUR 12:30:00MM - 1:10PM-->
                <tr>
                    <td>12:30mm-1:10pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="8-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="8-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="8-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="8-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="8-5"></span>
                    </td>
                </tr>
                <!--HOUR 1:10PM - 1:50PM-->
                <tr>
                    <td>1:10pm-1:50pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="9-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="9-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="9-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="9-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="9-5"></span>
                    </td>
                </tr>
                <!--HOUR 1:50PM - 2:30PM-->
                <tr>
                    <td>1:50pm-2:30pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="10-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="10-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="10-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="10-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="10-5"></span>
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 2:40PM - 3:20PM-->
                <tr>
                    <td>2:40pm-3:20pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="11-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="11-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="11-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="11-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="11-5"></span>
                    </td>
                </tr>
                <!--HOUR 3:20PM - 4:00PM-->
                <tr>
                    <td>3:20pm-4:00pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="12-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="12-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="12-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="12-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="12-5"></span>
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 4:10PM - 4:50PM-->
                <tr>
                    <td>4:10pm-4:50pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="13-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="13-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="13-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="13-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="13-5"></span>
                    </td>
                </tr>
                <!--HOUR 4:50PM - 5:30PM-->
                <tr>
                    <td>4:50pm-5:30pm</td>
                    <!--MONDAY-->
                    <td>
                        <span id="14-1"></span>
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <span id="14-2"></span>
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <span id="14-3"></span>
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <span id="14-4"></span>
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <span id="14-5"></span>
                    </td>
                </tr>
            </table>
            </div>
        </div><!-- /.box-body -->
        <br>
        <br>
        <!--DELETE SCHEDULE-->
        <div id="divDelete2" class="box-footer" style="text-align: center">
            <button onclick="deleteSchedule();" class="btn btn-danger">Eliminar horario</button>
        </div>
    </div><!-- /.box -->
    <!--</div> /.col -->

</section><!-- /.content -->
<br>
<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">

    $(function () {
        hideDiv();
        groups();
    });

    function hideDiv() {
        $("#schedule").hide();
        $("#divDelete1").hide();
        $("#divDelete2").hide();
    }

    function schedule() {
        var parameters = {
            "group": $("#group").val()
        };
        $.ajax({
            type: 'POST',
            url: "../business/GetScheduleByGroup.php",
            data: parameters,
            success: function (data)
            {
                var schedules = JSON.parse(data);
                var bool = false;
                var trash = '';
                $.each(schedules, function (i, item) {
                    bool = true;
                    trash = '<a href="javascript:deleteCourseToSchedule(' + item.groupscheduleid + ')" ><span class="glyphicon glyphicon-trash"></span></a>';
                    $("#" + item.groupschedulehour + "-" + item.groupscheduleday).html(trash + " - " + item.coursecode);
                });

                if (!bool) {
                    $("#divDelete1").hide();
                    $("#divDelete2").hide();
                    alertify.error("Ups! No se ha establecido ningun horario para este grupo!");
                } else {
                    $("#divDelete1").show();
                    $("#divDelete2").show();
                }
            },
            error: function ()
            {
                alertify.error("Error de horario...");
            }
        });
    }

    function groups() {
        $.ajax({
            type: 'GET',
            url: "../business/GetGroups.php",
            success: function (data)
            {
                var group = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccione un grupo</OPTION>';
                var bool = 0;
                $.each(group, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.number + '</OPTION>';
                });

                if (bool == 1) {
                    $("#group").html(htmlCombo);
                } else {
                    alertify.error("No se encuentran grupos registrados");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function deleteSchedule() {
        alertify.confirm('Eliminar horario', '¿Desea eliminar el horario para el grupo ' + $("#group option:selected").html() + '?', function () {
            var parameters = {
                "group": $("#group").val()
            };
            $.ajax({
                type: 'POST',
                url: "../business/DeleteScheduleByGroup.php",
                data: parameters,
                success: function (data)
                {
                    if (data == true) {
                        alertify.success("Horario eliminado");
                        clearSpan();
                    } else {
                        alertify.error("Upps! Ha ocurrido un error al eliminar el módulo!");
                    }
                },
                error: function ()
                {
                    alertify.error("Error de horario...");
                }
            });
        }
        , function () {
            alertify.success("Cancelado");
            return;
        });

    }
    
    function deleteCourseToSchedule(id){
         var parameters = {
                "schedule": id
            };
            $.ajax({
                type: 'POST',
                url: "../business/DeleteSchedule.php",
                data: parameters,
                success: function (data)
                {
                    if (data == true) {
                        alertify.success("Módulo eliminado del horario");
                        clearSpan();
                        schedule();
                    } else {
                        alertify.error("Upps! Ha ocurrido un error al eliminar el módulo!");
                    }
                },
                error: function ()
                {
                    alertify.error("Error de horario...");
                }
            });
    }

    function clearSpan() {

        for (var i = 1; i < 15; i++) {
            $("#" + i + "-1").html("");
            $("#" + i + "-2").html("");
            $("#" + i + "-3").html("");
            $("#" + i + "-4").html("");
            $("#" + i + "-5").html("");
        }
    }

    // FUNCTION SELECT ------------------------------------------------
    $('#group').on('change', function () {
        if ($(this).val() !== "0") {
            clearSpan();
            schedule();
            $("#schedule").show();
        } else {
            hideDiv();
        }
    }
    );

</script>

