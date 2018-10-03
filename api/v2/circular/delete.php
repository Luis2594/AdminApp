<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/circular.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare entity object
$entity = new Circular($db);

// get entity id
$data = json_decode(file_get_contents("php://input"));

// set entity id to be deleted
$entity->id = $data->id;

// read the details of entity to be edited
$entity->readOne();

// delete the entity
if ($entity->delete()) {
    echo '{';
    echo '"message": "Entity was deleted."';
    echo '}';
}

// if unable to delete the entity
else {
    echo '{';
    echo '"message": "Unable to delete entity."';
    echo '}';
}
