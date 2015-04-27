<?php

require_once(__DIR__ . "/../model/config.php");

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username' ");

if ($query->num_rows == 1) {
    $row = $query->fetch_array();

    // '===' checks if the values are the same and of the same type
    if ($row["password"] === crypt($password, $row["salt"])) {
        // 'crypt' differentiates between upper and lowercase letters
        // telling the session variable that the user has logged in
        $_SESSION["authenticated"] = true;
        echo "<p> Login Successful</p>";
    } else {
        // tells the user that either the password or username was incorrect
        echo "<p>Invalid username and password</p>";
    }
} else {
    // here incase the query fails, or the query didnt achieve a username
    echo "<p>Invalid username and password</p>";
}
