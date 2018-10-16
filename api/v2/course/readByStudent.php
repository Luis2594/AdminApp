<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/course.php';

// instantiate database and entity object
$database = new Database();
$db = $database->getConnection();

// initialize object
$entity = new Course($db);

$data = json_decode(file_get_contents("php://input"));

// query entity
$stmt = $entity->readCurrent($data->id);

$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // entities array
    $entities_arr = array();
    $entities_arr["records"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $entity_item = array(
            "id" => $id,
            "codenrollment" => $codenrollment,
            "classwork" => $classwork,
            "homework" => $homework,
            "test" => $test,
            "projects" => $projects,
            "atendance" => $atendance,
            "recovery1" => $recovery1,
            "recovery2" => $recovery2,
            "promotion" => $promotion,
            "finalgrade" => $finalgrade
        );

        array_push($entities_arr["records"], $entity_item);
    }

    echo json_encode($entities_arr);
} else {
    echo json_encode(
        array("message" => "No entitys found.")
    );
}
