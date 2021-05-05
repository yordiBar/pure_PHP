<?php

require_once __DIR__ . ('/dbconfig.php');

//User class with a connection to the database
class User {

    private $conn;

    //create a constructor for the connection to the database
    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    //a function to redirect to a specified page
    public function redirect($url) {
        header("Location: $url");
    }

    //this function when called will RUN a query on the database
    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

}