<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="NotificationsShowStudents.php"><i class="fa fa-arrow-circle-right"></i> Notificaciones</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Notificación Estudiantes</a></li>
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
                    <h3 class="box-title">Actualizar Notificación Estudiantes</h3>
                </div><!-- /.box-header -->

                <?php
                include '../business/NotificationBusiness.php';

                $notificationBusiness = new NotificationBusiness();
                $id = $_GET['id'];
                $notifications = $notificationBusiness->getNotificationStudent($id);
                foreach ($notifications as $notification) {
                    ?>
                    <!-- form start -->
                    <form role="form" id="formNotification" action="../business/NotificationsUpdateStudentAction.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?php echo $notification->getNotificationId() ?>"/>
                        <div class="form-group">
                            <textarea id="text" name="text" class="form-control" rows="3" placeholder="Notificación"><?php echo $notification->getNotificationText() ?></textarea>
                        </div>
                    </form>
                    <div class="box-footer btn-group btn-group-justified">
                        <a type="button" class="btn btn-success" href="javascript:valueInputs()">Actualizar</a>
                        <a type="button" class="btn btn-primary" href="javascript:backPage()">Atrás</a>
                    </div>
                    <?php
                    break;
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

        var text = $('#text').val();
        if (text.length === 0) {
            alertify.error("Verifique el contenido de la notificación");
            return false;
        }

        $("#formNotification").submit();
    }

    function backPage() {
        window.location = "NotificationsShowStudents.php";
    }
</script>
