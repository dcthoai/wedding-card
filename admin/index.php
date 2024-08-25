
<?php
    session_start();

    // Check user authorities
    if (!isset($_SESSION['user'])) {
        header("Location: ./login.php");
        exit();
    }

    $pageTitle = "Quản trị viên";
    ob_start(); // Start output buffering
?>

<!-- HTMl content -->
<h1 class="p-3 px-md-5 py-0 pb-md-4 pb-lg-5 ps-lg-0 fs-3 fw-semibold">Danh sách người tham dự</h1>

<div class="wrapper p-3 p-lg-0 mt-md-4">
    <div class="w-100 d-flex flex-wrap justify-content-between my-4">
        <div class="d-md-flex mb-4">
            <input type="text" style="min-width: 300px; min-height: 48px;" class="form-control form-search-input" 
                id="search-participant" 
                placeholder="Nhập tên người tham dự muốn tìm">

            <button type="button" class="pb-1 pt-0 mt-3 mt-md-0 ms-md-2 btn btn-primary py-md-0 px-5 fs-5 fw-medium" 
                id="search-participant-button">Search</button>
        </div>

        <div class="filter">
            <select id="selectUserByEvent" class="form-select fs-5 fw-medium px-3" style="min-width: 220px; min-height: 48px;">
                <option value="1" selected>Lễ hỏi nhà trai</option>
                <option value="2">Lễ hỏi nhà gái</option>
                <option value="3">Tiệc cưới nhà trai</option>
                <option value="4">Tiệc cưới nhà gái</option>
            </select>
        </div>
    </div>

    <div class="result mt-5 py-4" id="participant-list" style="max-height: 60vh; overflow-y: scroll;">
        <!-- Search content here -->
    </div>
</div>

<script src="../assets/js/admin-attend.js"></script>
<!-- End HTML content -->

<?php
    $htmlContent = ob_get_clean(); // Save content into $htmlContent and clean output buffering
    include 'base.html'; // include base html content
?>