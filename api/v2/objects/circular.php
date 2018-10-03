<?php

class Circular
{

    // database connection and table text
    private $conn;
    private $table_name = "circular";

    public $id;
    public $sender;
    public $guid;
    public $date;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read entities
    public function read()
    {
        // select all query
        $query = "SELECT * FROM " . $this->table_name;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create entity
    public function create()
    {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name .
            " SET circulartext=:text, circulardate=:date, circularsender=:sender, circularGUID=:guid";

        echo $query;
        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->text = htmlspecialchars(strip_tags($this->text));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->sender = htmlspecialchars(strip_tags($this->sender));
        $this->guid = htmlspecialchars(strip_tags($this->guid));

        // bind values
        $stmt->bindParam(":text", $this->text);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":sender", $this->sender);
        $stmt->bindParam(":guid", $this->guid);

        // execute query
        return $stmt->execute();
    }

    // used when filling up the update product form
    public function readOne()
    {
        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE circularid =:data LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(":data", $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->text = $row['circulartext'];
        $this->date = $row['circulardate'];
        $this->id = $row['circularid'];
        $this->sender = $row['circularsender'];
        $this->guid = $row['circularGUID'];
    }

    // update the product
    public function update()
    {
        // update query
        $query = "UPDATE " . $this->table_name . " SET circulartext =:text WHERE circularid =:id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->text = htmlspecialchars(strip_tags($this->text));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':text', $this->text);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        return $stmt->execute();
    }

    // delete the product
    public function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE circularid =:data";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(':data', $this->id);

        // execute query
        if ($stmt->execute()) {
            unlink("../../../../../documents/circular/" . $this->guid . ".pdf");
            return true;
        }

        return false;
    }

    // search products
    public function search($keywords)
    {
        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // select all query
        $query = "SELECT * FROM " . $this->table_name . " WHERE circulartext LIKE '" . $keywords . "'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page)
    {
        // select query
        $query = "SELECT * FROM " . $this->table_name. " LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}
