<?php

if(isset($_POST["login"])){
    require_once "functions.inc.php";

    $username = sanitizeData($_POST["username"]);
    $pwd = sanitizeData($_POST["pwd"]);

    require_once "db-handler.inc.php";

    if (emptyLoginInput($username, $pwd)) {
        header("location: ../login.php?error=empty_input");
        exit();
    }

    loginUser($db_connection, $username, $pwd);

} else{
    header("location: ../login.php");
    exit();
}