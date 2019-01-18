<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once __DIR__.'/../config/database.php';
include_once __DIR__.'/../objects/circular.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare entity object
$entity = new Circular($db);

// set ID property of entity to be edited
$entity->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of entity to be edited
$entity->readOne();

// create array
$entities_arr = array(
    "id" => $entity->id,
    "text" => $entity->text,
    "sender" => $entity->sender,
    "date" => $entity->date,
    "guid" => ($entity->guid.".pdf"),
);

// make it json format
print_r(json_encode($entities_arr));
