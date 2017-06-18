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
        <li><a href="CreateEnrollment.php"><i class="fa fa-arrow-circle-right"></i>Matricular Estudiante</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <!--<div class="col-md-6">-->
    <div class="box" id="schedule">
        
        <div class="box-header">
            <h3 class="box-title">Cursos disponibles para matrícula del estudiante: PHP</h3>
        </div><!-- /.box-header -->
        
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <th  style="width: 120px">Matrícula</th>
                    <th>Código</th>
                    <th>Módulo</th>
                    <th>Creditos</th>
                    <th>Lecciones</th>
                    <th>Período</th>
                </tr>
                <!--Codigo PHP-->
                <tr>
                    <td>
                        <input value="1-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <td>00</td>
                    <!--MONDAY-->
                    <td>
                       NOMBRE
                    </td>
                    <!--TUESDAY-->
                    <td>
                        3
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        7
                    </td>
                    <!--THURSDAY-->
                    <td>
                        1
                    </td>
                </tr>
            </table>
        </div><!-- /.box-body -->
        
        <div class="col-md-6">
            <!-- select -->
            <div class="form-group">
                <label id="nameCourse1"></label>
            </div>
        </div>
        <br>
        <br>
        <div class="box-footer" style="text-align: right">
            <button onclick="SetSchedule();" class="btn btn-primary">Establecer horario</button>
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

    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }
</script>