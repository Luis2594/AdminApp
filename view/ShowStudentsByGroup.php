<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

$year = (int) $_GET['year'];
$period = (int) $_GET['period'];
$group = (int) $_GET['group'];

?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="ShowGroupsList.php"><i class="fa fa-arrow-circle-right"></i> Ver Grupos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver Estudiantes</a></li>
    </ol>
</section>
<br>
<?php
if (isset($period) && is_int($period) && isset($year) && is_int($year) && isset($group) && is_int($group)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES RELATED TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include_once '../business/GroupBusiness.php';

                        $business = new GroupBusiness();
                        $groupEntity = $business->getGroup($group);

                        ?>
                        <h3 class="box-title row">
                            <b>
                                <?php
                                    echo "Grupo: ".$groupEntity[number].".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Periodo: ".$period.".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Año: ".$year.".";
                                ?>
                            </b>
                        </h3>
                    </div>
                    <div class="table-responsive">
                        <div class="box-body">
                            <table id="studentsList" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Género</th>
                                        <th>Adecuación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include '../business/StudentBusiness.php';
                                $studentBusiness = new StudentBusiness();

                                $students = $studentBusiness->getStudentByGroupByFilter($group, $period, $year);

                                foreach ($students as $student) {
                                    ?>
                                    <tr>
                                        <td><?php echo $student->getPersonDni(); ?></td>
                                        <td><a href="InformationStudent.php?id=<?php echo $student->getPersonId(); ?>"><?php echo $student->getPersonFirstName() . " " . $student->getPersonFirstlastname() . " " .$student->getPersonSecondlastname(); ?></a></td>
                                        <td><?php echo $student->getPersonAge(); ?></td>
                                        <?php
                                        if ($student->getPersonGender() == "1") {
                                            ?> 
                                            <td>Hombre</td>
                                            <?php
                                        } else {
                                            ?> 
                                            <td>Mujer</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "0") {
                                            ?>
                                            <td>Sin adecuación</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "1") {
                                            ?>
                                            <td>No significativa</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "2") {
                                            ?>
                                            <td>Significativa</td>
                                            <?php 
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Género</th>
                                        <th>Adecuación</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#studentsList").dataTable();
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
</script>

