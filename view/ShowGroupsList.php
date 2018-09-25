<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="ShowGroupsList.php"><i class="fa fa-arrow-circle-right"></i> Ver Grupos de Estudiantes</a></li>
    </ol>
</section>
<br>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header row col-md-12">
                        <div class="pull-left col-md-6">
                            <h3 class="box-title">Grupos
                        </div>
                        <div class="pull-right col-md-6 text-right right">
                            <div class="col-md-4">
                                <select class="btn btn-info btn-sm" style="width: 100%" id="filterPeriod">
                                    <option value="0">Periodo</option>
                                    <option value="1">I</option>
                                    <option value="2">II</option>
                                    <option value="3">III</option>
                                    <option value="4">IV</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="btn btn-info btn-sm" style="width: 100%" id="filterYear">
                                    <option value="0">Año</option>
                                    <?php
                                        include_once '../business/FiltersBusiness.php';
                                        $filtersBusiness = new FiltersBusiness();
                                        $years = $filtersBusiness->getCoursesYears();

                                        foreach ($years as $tmpYear) {
                                     ?>
                                        <option value="<?php echo $tmpYear; ?>" ><?php echo $tmpYear; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button onclick="getGroupsByFiltersByFiltersRequest();" class="btn btn-primary btn-sm" style="width: 100%" id="search">Filtrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Estudiantes</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Estudiantes</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php

include_once './reusable/Footer.php';
?>

<!-- page script -->
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
        };
    })(jQuery);

    var a = -1;
    var b = -1;
    $(document).ready(function () {
        try{
            a = $.get("a");
            b = $.get("b");
        }catch(e){
            a = -1;
            b = -1;
        }
        
        if (a && b && a != -1 && b != -1){
            $('#filterYear').val(a);
            $('#filterPeriod').val(b);
            getGroupsByFilters();
        }else{
            getGroups();
        }
    });

    function getGroups() {
        $.ajax({
            type: 'POST',
            url: "../actions/GroupGetAllAction.php",
            success: function (data)
            {
                var groups = JSON.parse(data);
                var htmlToInsert = '';

                if (!(groups === undefined || groups.length === 0)) {
                    $.each(groups, function (i, item) {
                        var descPeriod = "IV";
                        switch(item.period){
                            case 1:
                                descPeriod = "I";
                                break;
                            case 2:
                                descPeriod = "II";
                                break;
                            case 3:
                                descPeriod = "III";
                                break;
                        }
                        htmlToInsert += "<tr>";
                        htmlToInsert += "<td>" + item.groupnumber + "</td>";
                        htmlToInsert += "<td>" + descPeriod + "</td>";
                        htmlToInsert += "<td>" + item.year + "</td>";
                        htmlToInsert += '<td><a class="btn btn-info btn-sm" href="ShowStudentsByGroup.php?' +
                        'group=' + item.groupid + '&period=' + item.period + '&year=' + item.year + '">Estudiantes</a></td>';
                        htmlToInsert += "</tr>";
                    });

                    $("#tbody").html("");
                    $("#tbody").html(htmlToInsert);
                    $('#example').DataTable();
                } else {
                    htmlToInsert += "<tr>";
                    htmlCourse = 'No se encontraron registros para el periodo actual.';
                    htmlToInsert += "</tr>";
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function getGroupsByFiltersByFiltersRequest(){
        if ($("#filterYear").val() != 0 && $("#filterPeriod").val() != 0) {
            window.location.href = "ShowGroupsList.php?a="+$("#filterYear").val() +"&b="+$("#filterPeriod").val();
        } else {
            alertify.error("Seleccione los filtros...");
        }
    }

    function getGroupsByFilters() {
        if (a && b && a != -1 && b != -1){
            $.ajax({
                type: 'POST',
                url: "../actions/GroupGetAllByFiltersAction.php",
                data: {"period": b, "year": a},
                success: function (data)
                {
                    var groups = JSON.parse(data);
                    var htmlToInsert = '';

                    if (!(groups === undefined || groups.length === 0)) {
                        $.each(groups, function (i, item) {
                            var descPeriod = "IV";
                            if (item.period == 1){
                                descPeriod = "I";
                            } else
                            if (item.period == 2){
                                descPeriod = "II";
                            } else
                            if (item.period == 3){
                                descPeriod = "III";
                            }

                            htmlToInsert += "<tr>";
                            htmlToInsert += "<td>" + item.groupnumber + "no</td>";
                            htmlToInsert += "<td>" + descPeriod + "</td>";
                            htmlToInsert += "<td>" + item.year + "</td>";
                            htmlToInsert += "<td><a class='btn btn-info btn-sm' href='ShowStudentsByGroup.php?" +
                            "group=" + item.groupid + "&period=" + item.period + "&year=" + item.year + "'>Estudiantes</a></td>";
                            htmlToInsert += "</tr>";
                        });
                        
                        $("#tbody").html("");
                        $("#tbody").html(htmlToInsert);
                        $('#example').DataTable();
                    } else {
                        htmlToInsert += "<tr>";
                        htmlToInsert = 'No se encontraron registros.';
                        htmlToInsert += "</tr>";
                    }
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            });
        } else {
            coursesToProfessor();
        }
    }
</script>