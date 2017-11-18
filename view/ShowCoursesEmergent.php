<?php
include './reusable/Session.php';
include './reusable/Header.php';

$update = $_GET['update'];
$delete = $_GET['delete'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCoursesEmergent.php"><i class="fa fa-arrow-circle-right"></i> Cursos Libres</a></li>

        <?php
        if (isset($update) && $update == "update") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Cursos Libres</a></li>
        <?php } ?>
        <?php
        if (isset($delete) && $delete == "delete") {
            ?>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Eliminar Cursos Libres</a></li>
        <?php } ?>

    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cursos Libres del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Área</th>
                                <th>Día</th>
                                <th>Hora</th>
                                <?php
                                if (isset($update) && $update == "update") {
                                    ?>
                                    <th>Actualizar</th>
                                <?php } ?>
                                <?php
                                if (isset($delete) && $delete == "delete") {
                                    ?>
                                    <th>Eliminar</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/CourseBusiness.php';
                            $coursesBusiness = new CourseBusiness();

                            $courses = $coursesBusiness->getAll();

                            foreach ($courses as $course) {
                                ?>
                                <tr>
                                    <td><?php echo $course->getCourseCode(); ?></td>
                                    <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>"><?php echo $course->getCourseName(); ?></a></td>
                                    <td><?php echo $course->getCourseCredits(); ?></td>
                                    <td><?php echo $course->getCourseLesson(); ?></td>
                                    <td><?php echo $course->getSpecialityname(); ?></td>
                                    <?php
                                    if (isset($update) && $update == "update") {
                                        ?>
                                        <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>">Actualizar</a></td>
                                    <?php } ?>
                                    <?php
                                    if (isset($delete) && $delete == "delete") {
                                        ?>
                                       <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>">Eliminar</a></td>
                                    <?php } ?>

                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Área</th>
                                <th>Día</th>
                                <th>Hora</th>
                                <?php
                                if (isset($update) && $update == "update") {
                                    ?>
                                    <th>Actualizar</th>
                                <?php } ?>
                                <?php
                                if (isset($delete) && $delete == "delete") {
                                    ?>
                                    <th>Eliminar</th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });
</script>

