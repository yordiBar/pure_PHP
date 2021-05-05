<?php

//connect to a database

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'project_db';

//DSN - the Data Source Name - required by the PDO to connect

$dsn = 'mysql:host=' . $dbHost . ';dbname=' . $dbName;

//attempt to create a connection to the database
try {
    $connection = new \PDO($dsn, $dbUsername, $dbPassword);
} catch (\PDOException $e) {
    
//deal with connection error
    echo 'Connection failed: ' . $e->getMessage();

}