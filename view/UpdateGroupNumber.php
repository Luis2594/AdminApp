<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowGroups.php"><i class="fa fa-arrow-circle-right"></i> Grupos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Grupo</a></li>
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
                    <h3 class="box-title">Actualizar Grupo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formGroup" action="../actions/GroupUpdateAction.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Grupo</label>
                            <?php 
                                include_once __DIR__.'/../business/GroupBusiness.php';
                                $business = new GroupBusiness();
                                $group = $business->getAll();
                                $porActualizar = null;
                                foreach ($group as $item){
                                    if ($id == $item['id']){
                                        $porActualizar = $item;
                                        break;
                                    }
                                }
                            ?>
                            <input id="id" name="id" type="hidden" value="<?php echo $porActualizar['id']; ?>" class="form-control" required="required"/>
                            <input id="name" name="name" type="text" value="<?php echo $porActualizar['number']; ?>" class="form-control" maxlength="100" placeholder="Grupo" required="required"/>

                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="box-footer">
                    <button onclick="valueInputs();" style="width: 100%" class="btn btn-primary">Actualizar</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once __DIR__.'/./reusable/Footer.php';
?>

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

    function valueInputs() {
        var name = $('#name').val();

        if (name.length === 0) {
            alertify.error("Verifique el text del grupo.");
            return false;
        }

        $("#formGroup").submit();
    }
</script>