<?php

function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function emptySignupInput($fullname, $email, $username, $pwd, $confirm_pwd)
{
    $result = "";
    if (empty($fullname) || empty($email) || empty($username) || empty($pwd) || empty($confirm_pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
function invalidEmail($email)
{
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUsername($username)
{
    $result = "";
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_.-]{2,15}$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
function pwdMatch($pwd, $confirm_pwd)
{
    $result = "";
    if ($pwd !== $confirm_pwd) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function userAlreadyExists($db_connection, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($db_connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign-up.php?error=stmt_failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    // Executing statement
    mysqli_stmt_execute($stmt);

    $retrieved_data = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($retrieved_data);

    mysqli_stmt_close($stmt);
    if ($row) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function createUser($db_connection, $fullname, $email, $username, $pwd)
{
    $sql = "INSERT INTO users(fullname, email, username, pwd) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($db_connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign-up.php?error=stmt_failed");
        exit();
    }

    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $username, $hash_pwd);
    // Executing statement
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();
}


// LOGIN FUNCTIONS

function emptyLoginInput($username, $pwd)
{
    $result = "";
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $username, $pwd)
{
    $getUser = userAlreadyExists($connection, $username, $username);
    if (!$getUser) {
        header("location: ../login.php?error=wrong_input");
        exit();
    }
    $checkPassword = password_verify($pwd, $getUser["pwd"]);

    if(!$checkPassword){
        header("location: ../login.php?error=wrong_password");
        exit();
    }
    else{
        session_start();

        $_SESSION["id"] = $getUser["id"];
        $_SESSION["username"] = $getUser["username"];
        $_SESSION["fullname"] = $getUser["fullname"];
        $_SESSION["email"] = $getUser["email"];
        $_SESSION["phone"] = $getUser["phone_number"];
        $_SESSION["gender"] = $getUser["gender"];
        $_SESSION["dob"] = $getUser["dob"];
        $_SESSION["profile-pic"] = $getUser["profile_picture"];


        header("location: ../index.php");
        exit();
    }
}

function updateProfile($db_connection, $fileActualExt, $allowed, $fileError, $fileSize, $userid, $fileTmpName, $username, $gender, $phone, $dob){

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5_000_000) { // 5MB limit
                $fileNameNew = "profile" . $userid . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $fileNameNew;

                // Move the uploaded file
                move_uploaded_file($fileTmpName, $fileDestination);

                // Update database
                $sql = "UPDATE users SET profile_picture = ?, username = ?, gender = ?, phone_number = ?, dob = ?  WHERE id = ?";
                $stmt = mysqli_stmt_init($db_connection);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../update-profile.php?error=stmt_failed");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sssisi", $fileNameNew, $username, $gender, $phone, $dob, $userid);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    header("location: ../profile.php?error=upload-success");
                }
            } else {
                header("location: ../update-profile.php?error=file_too_large");
                exit();
            }
        } else {
            header("location: ../update-profile.php?error=upload_error");
            exit();
        }
    } else {
        header("location: ../update-profile.php?error=invalid_file_type");
        exit();
    }
}
