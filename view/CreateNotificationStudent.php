<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

$admin = $_GET['admin'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Notificaciones</a></li>
        <li><a href="CreateNotificationStudent.php"><i class="fa fa-arrow-circle-right"></i> Crear Notificación Estudiantes</a></li>
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
                    <h3 class="box-title">Enviar Notificación Estudiantes</h3>
                </div><!-- /.box-header -->
                <div class="box-footer">
                    <form role="form" id="formNotification" action="../actions/NotificationsCreateStudentAction.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea id="text" name="text" class="form-control" rows="3" placeholder="Texto Notificación" required="true"></textarea>
                            <input id="admin" hidden name="admin" value="<?php echo $admin; ?>"/>
                        </div>
                    </form>

                    <button onclick="valueInputs();" class="btn btn-primary" style="width: 100%" id="enviar">Enviar Notificación</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once './reusable/Footer.php';
?>

<script type="text/javascript">

    function valueInputs() {
        var notify = $('#text').val();
        if (notify.length === 0) {
            alertify.error("Verifique el texto de su notificación.");
            return false;
        }

        $("#formNotification").submit();
    }

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