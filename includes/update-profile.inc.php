<?php
session_start();
require_once 'db-handler.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['upload'])) {
    $userid = $_SESSION["id"];
    $profile_pic = $_FILES['picture'];
    $username = sanitizeData($_POST["username"]);
    $gender = sanitizeData($_POST["gender"]);
    $phone = sanitizeData($_POST["phone-number"]);
    $dob = sanitizeData($_POST["dob"]);

    $fileName = $profile_pic['name'];
    $fileTmpName = $profile_pic['tmp_name'];
    $fileSize = $profile_pic['size'];
    $fileError = $profile_pic['error'];
    $fileType = $profile_pic['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'jpeg', 'webp');

    updateProfile($db_connection, $fileActualExt, $allowed, $fileError, $fileSize, $userid, $fileTmpName, $username, $gender, $phone, $dob);



} else {
    header("location: ../profile.php");
    exit();
}
