<?php
include_once 'header.php'
?>

<section class="mt-5 container">

    <?php
        if(isset($_GET["error"])){
            if ($_GET["error"] === "empty_input") {
                echo '<div style="width: 300px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Please fill in all text fields. Thanks!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] === "invalid_email") {
                echo '<div style="width: 300px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Please provide a valid email. Thanks.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] === "invalid_username") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Username is invalid, must be an alpha-numeric text without space. Thanks.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] === "passwords_dont_match") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Passwords do not match.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] === "user_already_exits") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Username or Email has already been taken.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] === "user_already_exits") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Username or Email has already been taken.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($_GET["error"] === "stmt_failed") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Technical issues. Please Contact Support 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    ?>

    <h1 class="text-center display-5">Sign-up</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form method="post" action="includes/signup.inc.php">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="user-name" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="con-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="con-password">
                    </div>
                    <button name="signup" type="submit" class="btn btn-primary mb-5 mx-auto">Sign up</button>
                </form>
            </div>
        </div>
    </div>

</section>

<?php
include_once 'footer.php'
?>