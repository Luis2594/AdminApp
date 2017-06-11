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
        <li><a href="CreateCurriculum.php"><i class="fa fa-arrow-circle-right"></i>Crear Maya Curricular</a></li>
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
                    <h3 class="box-title">Crear Curso</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" action="../business/businessAction/CreateCurriculum.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Año</label>
                            <input id="year" name="year" type="number" class="form-control" placeholder="Año" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required=""/>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button onclick="valueInputs();" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">
    function valueInputs() {
        var year = $('#year').val();
        var name = $('#name').val();

        if (!isInteger(year)) {
            alertify.error("Formato de año incorrecto");
            return false;
        }
        
        if (year.length < 4) {
            alertify.error("Año no existente");
            return false;
        }

        if (name.length == 0) {
            alertify.error("Verifique el nombre de la maya curricular");
            return false;
        }

        $("#form").submit(function () {
        });
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

</script>