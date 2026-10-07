<?php

$server = "localhost:3307";
$user = "root";
$password = "";
$database = "sargun";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

//echo "connect database";

?>