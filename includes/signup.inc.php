<?php


if (isset($_POST["signup"])) {

    require_once "functions.inc.php";

    $fullname = sanitizeData($_POST["fullname"]);
    $email = sanitizeData($_POST["email"]);
    $username = sanitizeData($_POST["user-name"]);
    $pwd = sanitizeData($_POST["password"]);
    $confirm_pwd = sanitizeData($_POST["con-password"]);

    require_once "db-handler.inc.php";

    if (emptySignupInput($fullname, $email, $username, $pwd, $confirm_pwd) !== false) {
        header("location: ../sign-up?error=emptyinput");
        exit();
    }
    if (invalidEmail($email)) {
        header("location: ../sign-up?error=invalidEmail");
        exit();
    }
    if (pwdMatch($pwd, $confirm_pwd)) {
        header("location: ../sign-up?error=passwords_dont_match");
        exit();
    }
    if (userAlreadyExists($username, $email)) {
        header("location: ../sign-up?error=user_already_exits");
        exit();
    }

    createUser($db_connection, $fullname, $email, $username, $pwd);
} else {
    header("location: ../sign-up.php");
    exit();
}
