<?php
session_start();

function getCurrentPage()
{
    return basename($_SERVER['PHP_SELF']);
}

function isActive($page){
    $currentPage = getCurrentPage();
    return $currentPage == $page ? 'active' : '';
}

$titles_arr = [
    'index.php' => 'Home Page',
    'login.php' => 'Login',
    'sign-up.php' => 'Sign up',
];

$currentPage = getCurrentPage();
$pageTitle = isset($titles_arr[$currentPage]) ? $titles_arr[$currentPage] : 'Website';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo $pageTitle;
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body data-bs-theme="dark">

    <nav class="navbar navbar-expand-lg bg-dark text-white" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION["id"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isActive('index.php') ?>" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isActive('sign-up.php')?>" href="sign-up.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isActive('login.php') ?>" href="login.php">Log in</a>
                        </li>
                    <?php } else { ?>                        
                        <li class="nav-item <?php echo isActive('profile.php') ?>">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item <?php echo isActive('login.php') ?>">
                            <a class="nav-link" href="includes/logout.inc.php">Log out</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>