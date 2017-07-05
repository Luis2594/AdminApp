<?php

include '../business/InstitutionBusiness.php';

$institutionName = $_POST['name'];
$institutionAddress = $_POST['address'];
$institutionFax = $_POST['fax'];
$institutionPhone = $_POST['phone'];
$institutionMission = $_POST['mission'];
$institutionView = $_POST['view'];

//echo '<script type="text/javascript">alert("' . $institutionAddress  . '")</script>';
//echo '<script type="text/javascript">alert("' . $institutionFax  . '")</script>';
//echo '<script type="text/javascript">alert("' . $institutionPhone  . '")</script>';
//echo '<script type="text/javascript">alert("' . $institutionMission  . '")</script>';
//echo '<script type="text/javascript">alert("' . $institutionView  . '")</script>';
//
//die();

if (
        isset($institutionAddress) && $institutionAddress != "" &&
        isset($institutionFax) && $institutionFax != "" &&
        isset($institutionMission) && $institutionMission != "" &&
        isset($institutionName) && $institutionName != "" &&
        isset($institutionPhone) && $institutionPhone != "" &&
        isset($institutionView) && $institutionView != ""
) {
    $institutionName = ucwords(strtolower($institutionName));
    
    $institutionBusiness = new InstitutionBusiness();
    
    $institution = new Institution(NULL, $institutionName, $institutionAddress, $institutionFax, $institutionPhone, $institutionMission, $institutionView);

    if ($institutionBusiness->insert($institution) != 0) {
        header("location: ../view/InformationInstitution.php");
    } else {
        header("location: ../view/CreateInstitution.php?action=0&msg=Error_de_registro");
    }
} else {
    //error
    header("location: ../view/CreateInstitution.php?action=0&msg=Error_en_los_datos");
}
