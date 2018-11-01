<?php

include_once __DIR__.'/../../../../../business/PhoneBusiness.php';
include_once __DIR__.'/../../../../../business/UserBusiness.php';

if (isset($_POST['username']) && isset($_POST['userpassword'])) {

    $userBusiness = new UserBusiness();

    $person = $userBusiness->isStudent($_POST['username'], $_POST['userpassword']);

    if ($person == null) {
        echo json_encode(null);
        return;
    }

    $phoneBusiness = new PhoneBusiness();

    if (isset($_POST['number'])) {
        $phoneBusiness->insert(new Phone(0, $_POST['number'], $person["personid"]));
        $phones = $phoneBusiness->getAllPhone($person["personid"]);
        $result = array();
        foreach ($phones as $phone) {
            $result[] = array("phoneid" => $phone->getPhoneId(), "phonephone" => $phone->getPhonePhone(), "phoneperson" => $phone->getPhonePerson());
        }

        echo json_encode($result);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}
