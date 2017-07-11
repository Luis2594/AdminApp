<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>


<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourses.php"><i class="fa fa-arrow-circle-right"></i> Cursos</a></li>
    </ol>
</section>
<br>

<?php
$id = (int) $_GET['id'];
if (isset($id) && $id != '' && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include '../business/CurriculumBusiness.php';

                        $curriculumBusiness = new CurriculumBusiness();

                        $curriculums = $curriculumBusiness->getCurriculumId($id);

                        foreach ($curriculums as $curriculum) {
                            ?>
                            <h3 class="box-title">Malla: <?php echo $curriculum->getCurriculumName(); ?> </h3>
                            <br>
                            <h3 class="box-title">Año: <?php echo $curriculum->getCurriculumYear(); ?> </h3>
                            <?php } ?>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-footer" style="text-align: center">
                                <button onclick="Assign();" class="btn btn-primary">Asignar módulo(s)</button>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Creditos</th>
                                        <th>Lecciones</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../business/CourseBusiness.php';
                                    $coursesBusiness = new CourseBusiness();
                                    $id = $_GET['id'];
                                    $courses = $coursesBusiness->getAll();
                                    if (isset($id) && $id != '') {
                                        foreach ($courses as $course) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <input value="<?php echo $course->getCourseId() ?>" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                                                </td>
                                                <td><?php echo $course->getCourseCode(); ?></td>
                                                <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId(); ?>"><?php echo $course->getCourseName(); ?></a></td>
                                                <td><?php echo $course->getCourseCredits(); ?></td>
                                                <td><?php echo $course->getCourseLesson(); ?></td>
                                                <td><?php echo $course->getSpecialityname(); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Creditos</th>
                                        <th>Lecciones</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->

        <?php
    }
    include './reusable/Footer.php';
    ?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });

    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }


    function Assign() {
        var bool = false;
        var modules = "";

        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                bool = true;
                modules += $(this).val() + ",";
            }
        });

        if (bool) {
            modules = modules.substr(0, modules.length - 1);

            alert(modules);
            clearCheck();
        } else {
            /*
             * @title {String or DOMElement} The dialog title.
             * @message {String or DOMElement} The dialog contents.
             * @onok {Function} Invoked when the user clicks OK button.
             * @oncancel {Function} Invoked when the user clicks Cancel button or closes the dialog.
             *
             * alertify.confirm(title, message, onok, oncancel);
             *
             */
            alertify.confirm('Ups!', 'Tiene que seleccionar al menos un módulo', function () {
                alertify.success("Selecciona un módulo");
                return;
            }
            , function () {
                alertify.success("Selecciona un módulo");
                return;
            });
        }

    }
</script>

