<?php
    session_start();

    // Check user authorities
    if (!isset($_SESSION['user'])) {
        header("Location: ./login.php");
        exit();
    }
    
    $pageTitle = "Quản lý lời chúc mừng";
    ob_start(); // Start output buffering
?>

<!-- HTML content -->
<h1 class="p-3 px-md-5 py-0 ps-lg-0 fs-3 fw-semibold">Duyệt lời chúc mừng</h1>

<div class="wish-content mt-5 p-3">
    <div class="row align-items-center" id="wish-wrapper"></div>
</div>

<script src="../assets/js/admin-status.js"></script>
<!-- End HTML content -->

<?php
    $htmlContent = ob_get_clean(); // Save content into $htmlContent and clean output buffering
    include 'base.html'; // include base html content
?>