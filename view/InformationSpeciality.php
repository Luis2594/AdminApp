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
        <li><a href="ShowSpecialities.php"><i class="fa fa-arrow-circle-right"></i> Atinencia/Especialidad</a></li>
        <li><a href="InformationSpeciality.php"><i class="fa fa-arrow-circle-right"></i>Información Atinencia/Especialidad</a></li>
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
                    <h3 class="box-title">Atinencia/Especialidad</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" action="../business/CreateSpecialityAction.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            include '../business/SpecialityBusiness.php';
                            $specialityBusiness = new SpecialityBusiness();
                            $id = (int) $_GET['id'];
                            $specialities = $specialityBusiness->getSpecialityId($id);

                            foreach ($specialities as $speciality) {
                                ?>
                                <label>Nombre</label>
                                <input id="name" name="name" type="text"  value="<?php echo $speciality->getSpecialityName()?>" class="form-control" placeholder="Nombre" required="" readonly/>

                                <?php } ?>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

    <?php
    include './reusable/Footer.php';
    ?>
