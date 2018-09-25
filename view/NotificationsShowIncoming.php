<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="NotificationsShowIncoming.php"><i class="fa fa-arrow-circle-right"></i> Notificaciones Recibidas</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notificaciones Recibidas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="tablaNotificaciones" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                                <th>Emisor</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include '../business/NotificationBusiness.php';
                                $notificationBusiness = new NotificationBusiness();

                                $notifications = $notificationBusiness->getAllAdminsIncomingNotifications($_SESSION['id']);

                                foreach ($notifications as $not) {
                                    ?>
                                    <tr>
                                    <td><?php echo $not->getNotificationText(); ?></td>
                                    <td><?php echo $not->getNotificationId(); ?></td>
                                    <td><?php echo $not->getNotificationDate(); ?></td>
                                    </tr>
                            <?php
                                }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Contenido</th>
                                <th>Emisor</th>
                                <th>Fecha</th>
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
    
    $(function () {
        $("#tablaNotificaciones").dataTable();
    });
</script>

