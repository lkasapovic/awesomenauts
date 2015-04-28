<?php
require_once(__DIR__ . "/../model/config.php");

$exp = filter_input(INPUT_POST, "exp", FILTER_SANITIZE_STRING);