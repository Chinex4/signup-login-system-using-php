<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "mydb2";

$db_connection = mysqli_connect($servername, $db_username, $db_password, $db_name);

if (!$db_connection) {
    die("Connection to database failed: " . mysqli_connect_error());
}
