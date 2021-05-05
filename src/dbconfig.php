<?php

//create a class for the connection to the database
class Database
{
    private $host = "localhost";
    private $db_name = "project_db";
    private $username = "root";
    private $password = "";

    public $conn;
     //function to connect to the database
    public function dbConnection()
	{

	    $this->conn = null;
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}