<?php

class Grade
{

    // database connection and table text
    private $conn;
    private $table_name = "grades";

    public $id;
    public $codenrollment;
    public $classwork;
    public $homework;
    public $test;
    public $projects;
    public $atendance;
    public $recovery1;
    public $recovery2;
    public $promotion;
    public $finalgrade;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read entities
    public function read($id)
    {
        // select all query
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=" . $id;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
