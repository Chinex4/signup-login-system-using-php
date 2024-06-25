<?php

function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function emptySignupInput($fullname, $email, $username, $pwd, $confirm_pwd){
    $result = "";
    if (empty($fullname) || empty($email) || empty($username) || empty($pwd) || empty($confirm_pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
function invalidEmail($email){
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $confirm_pwd) {
    
}
function userAlreadyExists($username, $email) {

}
function createUser($db_connection, $fullname, $email, $username, $pwd){

}