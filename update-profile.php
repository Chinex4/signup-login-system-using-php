<?php

include_once "header.php";



?>

<section class="mt-5 container">

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] === "file_too_large") {
            echo '<div style="width: 300px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Image should not be larger than 5mb
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        } else if ($_GET["error"] === "upload_error") {
            echo '<div style="width: 300px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Upload Failed! An error occured
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        } else if ($_GET["error"] === "invalid_file_type") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Invalid file type. File must be an image
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        } 
    }
    
    ?>


<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
                
                <h1 class="text-center display-5">Update Profile</h1>
                <form method="post"
                    enctype="multipart/form-data"
                    action="includes/update-profile.inc.php">
                    <div class="mb-3">
                        <label for="picture"
                            class="form-label">Upload profile picture</label>
                        <input type="file"
                            name="picture"
                            class="form-control"
                            id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="fullname"
                            class="form-label">Fullname</label>
                        <input disabled
                            value="<?php echo $_SESSION['fullname'] ?>"
                            type="fullname"
                            name="fullname"
                            class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="email"
                            class="form-label">Email</label>
                        <input disabled
                            value="<?php echo $_SESSION['email'] ?>"
                            type="email"
                            name="email"
                            class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="user-name"
                            class="form-label">Username</label>
                        <input value="<?php echo $_SESSION['username'] ?>"
                            type="text"
                            name="username"
                            class="form-control"
                            id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="gender"
                            class="form-label">Gender</label>
                        <select class="form-select"
                            name="gender"
                            id="">
                            <option selected value="male">Male</option>
                            <option <?php echo isset($_SESSION["gender"]) == 'female' ? 'selected' : '' ?>
                                value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone-number"
                            class="form-label">Phone Number</label>
                        <input
                            value="<?php echo $_SESSION["phone"]?>"
                            maxlength="11"
                            type="number"
                            class="form-control"
                            id="exampleInputPassword1"
                            name="phone-number"
                            placeholder="080 xxxx xxxx">
                    </div>
                    <div class="mb-3">
                        <label for="dob"
                            class="form-label">Date of Birth</label>
                        <input
                            value="<?php echo $_SESSION["dob"]?>"
                            maxlength="11"
                            type="date"
                            class="form-control"
                            id="exampleInputPassword1"
                            name="dob">
                    </div>
                    <button name="upload"
                        type="submit"
                        class="btn btn-primary mb-5 mx-auto">Update</button>
                </form>
            </div>
        </div>
    </div>

</section>
<?php

include_once "footer.php";
?>