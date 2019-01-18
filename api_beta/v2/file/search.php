<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once __DIR__.'/../config/database.php';
include_once __DIR__.'/../objects/file.php';

// instantiate database and entity object
$database = new Database();
$db = $database->getConnection();

// initialize object
$entity = new File($db);

// get keywords
$keywords = isset($_GET["s"]) ? $_GET["s"] : "";

// query products
$stmt = $entity->search($keywords);
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // products array
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
            "id" => $fileid,
            "description" => html_entity_decode($filedescription),
            "date" => $filedate,
            "course" => $filecourse,
            "professor" => $fileprofessor,
            "year" => $fileyear,
            "period" => $fileperiod,
            "group" => $filegroup,
            "guid" => $fileGUID
        );

        array_push($entities_arr["records"], $entity_item);
    }

    echo json_encode($entities_arr);
} else {
    echo json_encode(
        array("message" => "No entities found.")
    );
}
