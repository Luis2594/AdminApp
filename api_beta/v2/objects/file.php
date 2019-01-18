<?php

class File
{

    // database connection and table text
    private $conn;
    private $table_name = "file";

    public $id;
    public $description;
    public $date;
    public $course;
    public $professor;
    public $year;
    public $period;
    public $group;
    public $guid;

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
            " SET filedescription=:description, filedate=:date, filecourse=:course, fileprofessor=:professor,".
            "fileyear=:year, fileperiod=:period, filegroup=:group, fileGUID=:guid";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->description= htmlspecialchars(strip_tags($this->description));
        $this->date= htmlspecialchars(strip_tags($this->date));
        $this->course= htmlspecialchars(strip_tags($this->course));
        $this->professor= htmlspecialchars(strip_tags($this->professor));
        $this->year= htmlspecialchars(strip_tags($this->year));
        $this->period= htmlspecialchars(strip_tags($this->period));
        $this->group= htmlspecialchars(strip_tags($this->group));
        $this->guid= htmlspecialchars(strip_tags($this->guid));

        // bind values
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":course", $this->course);
        $stmt->bindParam(":professor", $this->professor);
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":period", $this->period);
        $stmt->bindParam(":group", $this->group);
        $stmt->bindParam(":guid", $this->guid);

        // execute query
        return $stmt->execute();
    }

    // used when filling up the update product form
    public function readOne()
    {
        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE fileid =:data LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(":data", $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id=$row['fileid'];
        $this->description=$row['filedescription'];
        $this->date=$row['filedate'];
        $this->course=$row['filecourse'];
        $this->professor=$row['fileprofessor'];
        $this->year=$row['fileyear'];
        $this->period=$row['filepriod'];
        $this->group=$row['filegroup'];
        $this->guid=$row['fileGUID'];
    }

    // update the product
    public function update()
    {
        // update query
        $query = "UPDATE " . $this->table_name . " SET filedescription=:text WHERE fileid=:id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->text = htmlspecialchars(strip_tags($this->text));

        // bind new values
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':text', $this->text);

        // execute the query
        return $stmt->execute();
    }

    // delete the product
    public function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE fileid =:data";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(':data', $this->id);

        // execute query
        return $stmt->execute();
    }

    // search products
    public function search($keywords)
    {
        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // select all query
        $query = "SELECT * FROM " . $this->table_name . " WHERE filedescription LIKE '" . $keywords . "'";

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
