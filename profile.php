<?php

include_once "header.php";
$userid = $_SESSION["id"];
require_once 'includes/db-handler.inc.php';
function getProfilePicture($userid, $db_connection)
{
    $sql = "SELECT profile_picture FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($db_connection);
    $profile_picture = '';

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile.php?error=stmt_failed");
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        if ($row) {
            $profile_picture = $row['profile_picture'];
            return $profile_picture;
        } else {
            $profile_picture = 'user.png';
            return $profile_picture;
        }
    }
}
$picture = getProfilePicture($userid, $db_connection);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] === "none") {
                        echo '<div style="width: 300px;" class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                        <strong>Profile Updated Successfully!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                }
                ?>
                <h1 class="display-5 text-center">Profile</h1>
                <div style="width: 200px; height: 200px;"
                    class="rounded-circle mt-3 w-5 mx-auto">
                    <img class="img-fluid rounded-circle"
                        src="./uploads/<?php echo $picture ?>"
                        alt="">
                </div>

                <div class="text-center fs-3 mt-3">
                    <i class="bi bi-person-fill-check"></i>
                    <span><?php echo $_SESSION["fullname"] ?></span>
                </div>
                <div class="row mx-auto">
                    <div class="col-lg-4 text-center mt-3">

                        <p class="">
                            <i class="bi bi-envelope-at-fill"></i>
                            Email:
                        </p>
                        <p><?php echo $_SESSION["email"] ?></p>
                        <hr>
                    </div>
                    <div class="col-lg-4 text-center mt-3">
                        <p class="">
                            <i class="bi bi-person-vcard-fill"></i>
                            Username:
                        </p>
                        <p><?php echo $_SESSION["username"] ?></p>
                        <hr>
                    </div>
                    <div class="col-lg-4 text-center mt-3">
                        <p class="">
                            <i class="bi bi-telephone-fill"></i>
                            Phone Number:
                        </p>
                        <p><?php echo $_SESSION["phone"] !== null ? $_SESSION["phone"] : 'Update your profile' ?></p>
                        <hr>
                    </div>
                    <div class="col-lg-4 text-center mt-3">
                        <p class="">
                            <i class="bi bi-<?php
                            if ($_SESSION["gender"] === "Female") {
                                echo 'person-standing-dress';
                            } else {
                                echo 'person-standing';
                            }
                            ?>"></i>
                            Gender:
                        </p>
                        <p><?php echo $_SESSION["gender"] !== null ? $_SESSION["gender"] : 'Update your profile' ?></p>
                        <hr>
                    </div>
                    <div class="col-lg-4 text-center mt-3">
                        <p class="">
                            <i class="bi bi-calendar"></i>
                            Date of Birth:
                        </p>
                        <p><?php echo $_SESSION["dob"] !== null ? $_SESSION["dob"] : 'Update your profile' ?></p>
                        <hr>
                    </div>

                    <div class="mt-5 text-center mb-5">
                        <a class="btn btn-primary text-center"
                            href="update-profile.php">
                            <i class="bi bi-pencil-square"></i>
                            Update Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

include_once "footer.php";
?>