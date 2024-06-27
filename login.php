<?php
include_once 'header.php'
?>

<section class="container mt-5">

    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "none") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Signup Successful!</strong> Please Log-in. Thanks.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] == "empty_input") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Please fill in all fields before logging in.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] == "wrong_input") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> User not found!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] == "wrong_password") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Wrong Password
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] == "stmt_failed") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Please contact support
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    ?>
    
    <h1 class="text-center display-5">Log-in</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form method="post" action="includes/login.inc.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username or Email</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button name="login" type="submit" class="mx-auto btn btn-primary mb-5">Log in</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include_once 'footer.php'
?>