<?php

require_once(__DIR__ . "/../model/config.php");

// every post will need an 'id', a 'title', and a 'post text'
$query = $_SESSION["connection"]->query("CREATE TABLE posts ("
        // null means it cant be empty 
        // AUTO_INCREMENT handles the id        
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        // '255' is the minimum # of characters in a title       
        . "title varchar(255) NOT NULL,"
        . "post text NOT NULL,"
        // 'PRIMARY KEY' hooks 2 tables together
        . "PRIMARY KEY (id))");

if ($query) {
    echo "<p>Succesfully create table: posts</p>";
} else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}

$query = $_SESSION["connection"]->query("CREATE TABLE users ("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "username varchar(30) NOT NULL,"
        . "email varchar(50) NOT NULL,"
        . "password char(128) NOT NULL,"
        . "salt char(128) NOT NULL,"
        . "PRIMARY KEY (id))");

if($query) {
    echo "<p>Successfully created table: users</p>";
}
else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}
