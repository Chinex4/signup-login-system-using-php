<?php
include_once 'header.php'
?>

<section class="container mt-5">
    <h1 class="text-center display-5">Log-in</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form method="post">
                    <div class="mb-3">
                        <label for="user-name" class="form-label">Username</label>
                        <input type="text" name="user-name" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="mx-auto btn btn-primary mb-5">Log in</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include_once 'footer.php'
?>