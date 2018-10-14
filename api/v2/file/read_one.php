<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/file.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare entity object
$entity = new File($db);

// set ID property of entity to be edited
$entity->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of entity to be edited
$entity->readOne();

// create array
$entities_arr = array(
    "id" => $entity->id,
    "description" => html_entity_decode($entity->description),
    "date" => $entity->date,
    "course" => $entity->course,
    "professor" => $entity->professor,
    "year" => $entity->year,
    "period" => $entity->period,
    "group" => $entity->group,
    "guid" => $entity->guid,
);

// make it json format
print_r(json_encode($entities_arr));
