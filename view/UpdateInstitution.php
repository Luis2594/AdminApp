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
        <li><a href="ShowInstitutionUpdate.php"><i class="fa fa-arrow-circle-right"></i>Actualizar Institucións</a></li>
        <li><a href="UpdateInstitution.php"><i class="fa fa-arrow-circle-right"></i>Actualizar Institución</a></li>
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
                    <h3 class="box-title">Información Institución</h3>
                </div><!-- /.box-header -->

                <?php
                include '../business/InstitutionBusiness.php';

                $institutionBusiness = new InstitutionBusiness();
                $id = 1;
                $institutions = $institutionBusiness->getInstitution();
                $bool = false;
                foreach ($institutions as $institution) {
                    ?>
                    <!-- form start -->
                    <form role="form" id="form" action="../business/UpdateInstitutionAction.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="box-body">
                        <div class="form-group">
                            <input id="id" name="id" type="hidden" class="form-control" placeholder="Nombre" required value="<?php echo $institution->getInstitutionId()?>" hidden="true"/>
                        </div><div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required value="<?php echo $institution->getInstitutionName()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Misión</label>
                            <input id="mission" name="mission" type="text" class="form-control" placeholder="Mission" required value="<?php echo $institution->getInstitutionMission()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Visión</label>
                            <input id="view" name="view" type="text" class="form-control" placeholder="Visión" required value="<?php echo $institution->getInstitutionView()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input id="address" name="address" type="text" class="form-control" placeholder="Dirección" required value="<?php echo $institution->getInstitutionAddress()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input id="phone" name="phone" type="text" class="form-control" placeholder="Teléfono" required value="<?php echo $institution->getInstitutionPhone()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input id="fax" name="fax" type="text" class="form-control" placeholder="Nombre" required value="<?php echo $institution->getInstitutionFax()?>"/>
                        </div>
                    </div><!-- /.box-body -->
                        </div>
                    </form>

                    <div class="pull-left">
                        <button onclick="valueInputs();" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="pull-right">
                        <button onclick="backPage(<?php echo $id ?>);" class="btn btn-primary">Atrás</button>
                    </div>

                    <?php
                }//fin del for
                ?>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">

    $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Last 7 Days': [moment().subtract('days', 6), moment()],
                        'Last 30 Days': [moment().subtract('days', 29), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
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

    function valueInputs() {
        
        var name = $('#name').val();
        if (name.length === 0) {
            alertify.error("Verifique el nombre de la institución");
            return false;
        }
        
        var phone = $('#phone').val();
        if (phone.length === 0) {
            alertify.error("Verifique el teléfono de la institución");
            return false;
        }
        
        var address = $('#address').val();
        if (address.length === 0) {
            alertify.error("Verifique la dirección de la institución");
            return false;
        }

        var mission = $('#mission').val();
        if (mission.length === 0) {
            alertify.error("Verifique la misión de la institución");
            return false;
        }
        
        var view = $('#view').val();
        if (view.length === 0) {
            alertify.error("Verifique la visión de la institución");
            return false;
        }
        
        var fax = $('#fax').val();
        if (fax.length === 0) {
            alertify.error("Verifique el fax de la institución");
            return false;
        }
        
        $("#form").submit();
    }

    function backPage(id) {
        window.location = "InformationInstitution.php?id=" + id;
    }
</script>
