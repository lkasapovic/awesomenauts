<?php

class Database {

    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    public $error;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        
        //'new' allows to build objects
        $this->connection = new mysqli($host, $username, $password);

        // telling the connection to die if something goes wrong
        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }

        $exists = $this->connection->select_db($database);

        // action statement has to be uppercase with query
        if (!$exists) {
            $query = $this->connection->query("CREATE DATABASE $database");

            if ($query) {
                echo "<p>Successfully created database" . $database . "</p>";
            }
        } else {
            echo "<p>Database already exists.</p>";
        }
    }
    // create 'msqli' object
    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // telling the connection to die if something goes wrong
        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }

    public function closeConnection() {
        if(isset($this->connection)) {
            $this->connection->close();
        }
    }

    // everytime query is called, a string has to be passed
    public function query($string) {
        // calling the openConnection function
        $this->openConnection();
        
        $query = $this->connection->query($string);
        
        if(!$query) {
            $this->error = $this->connection->error;
        }
        
        $this->closeConnection();
        
        return $query;
    }

}