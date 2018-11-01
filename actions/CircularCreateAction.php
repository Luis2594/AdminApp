<?php

$target_dir = "../../documents/circular/";
include_once __DIR__.'/../tools/GUID.php';

$guid = GUID();
$target_file = $target_dir . $guid . ".pdf" ;

$fileType =  end((explode(".", $_FILES["fileToUpload"]["name"])));

// Check if file already exists
if (file_exists($target_file)) {
    header("location: ../view/CircularCreate.php?action=0&msg=El_archivo_ya_existe!");
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("location: ../view/CircularCreate.php?action=0&msg=Archivo_demasiado_grande!");
}
// Allow certain file formats
if ($fileType != "pdf") {
    header("location: ../view/CircularCreate.php?action=0&msg=Solo_se_permiten_archivos_PDF!");
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    include_once __DIR__.'/../business/CircularBusiness.php';
    $text = $_POST['text'];
    $admin = $_POST['admin'];

    if (isset($text) && $text != "" && isset($guid) && $guid != "" && isset($admin) && $admin != "") {
        $business = new CircularBusiness();
        $entity = new Circular(0, $text, date("Y/m/d"), $admin, $guid);

        if ($business->insert($entity) != 0) {
            header("location: ../view/CircularShow.php?action=1&msg=Registro_creado_correctamente");
        } else {
            header("location: ../view/CircularCreate.php?action=0&msg=Registro_fallido");
        }
    } else {
        header("location: ../view/CircularShow.php?action=0&msg=Error_en_los_datos");
    }
} else {
    header("location: ../view/CircularCreate.php?action=0&msg=Registro_fallido");
}
