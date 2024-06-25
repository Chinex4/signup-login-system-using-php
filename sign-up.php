<?php
include_once 'header.php'
?>

<section class="mt-5">
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
                        <input type="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="user-name" class="form-label">Username</label>
                        <input type="text" name="user-name" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="con-password" class="form-label">Confirm Password</label>
                        <input type="con-password" class="form-control" id="exampleInputPassword1">
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