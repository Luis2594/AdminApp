<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate entity object
include_once '../objects/circular.php';

$database = new Database();
$db = $database->getConnection();

$entity = new Circular($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set entity property values
$entity->guid = $data->guid;
$entity->text = $data->text;
$entity->sender = $data->sender;
$entity->date = date('Y-m-d H:i:s');

// create the entity
if ($entity->create()) {
    echo '{';
    echo '"message": "Entity was created."';
    echo '}';
}

// if unable to create the entity, tell the user
else {
    echo '{';
    echo '"message": "Unable to create entity."';
    echo '}';
}
