<?php
    require_once(__DIR__ . "/database.php");
    session_start();
    
    // everytime this file is called its going to regenerate the id
    session_regenerate_id(true);
    
    $path = "/kasapovic-blog/";
    
    // host that is running our server
    $host = "localhost";
    // username and password to be able to connect to the server   
    $username = "root";
    $password = "root";
    // the name of the database, blog database
    $database = "blog_db";
    
    if(!isset($_SESSION["connection"])) {
        $connection = new Database($host, $username, $password, $database);
        $_SESSION["connection"] = $connection;
    }