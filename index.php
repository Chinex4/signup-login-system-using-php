<?php
include_once 'header.php';
?>

<section class="container mt-5">
    <h1 class="text-center display-5">
        <?php 
        echo isset($_SESSION["id"]) ? "Welcome " . $_SESSION["username"] : "Welcome";
        ?>
    </h1>
</section>

<?php
include_once 'footer.php'
?>