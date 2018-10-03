<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/circular.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare entity object
$entity = new Circular($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of entity to be edited
$entity->id = $data->id;

// set entity property values
$entity->guid = $data->guid;
$entity->sender = $data->sender;
$entity->date = $data->date;
$entity->text = $data->text;

// update the product
if ($entity->update()) {
    echo '{';
    echo '"message": "Entity was updated."';
    echo '}';
}

// if unable to update the entity, tell the user
else {
    echo '{';
    echo '"message": "Unable to update entity."';
    echo '}';
}
