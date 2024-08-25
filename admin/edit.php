<?php
    session_start();

    // Check user authorities
    if (!isset($_SESSION['user'])) {
        header("Location: ./login.php");
        exit();
    }
    
    $pageTitle = "Chỉnh sửa giao diện thiệp cưới";
    ob_start(); // Start output buffering
?>

<!-- HTML content -->

<h1 class="p-3 px-md-5 py-0 ps-lg-0 fs-3 fw-semibold">Chỉnh sửa hình ảnh</h1>

<div class="warpper p-3 p-lg-0 mt-md-4">
    <div class="edit-thumbnail">
        <h3 class="fs-5">Sửa ảnh bìa</h3>

        <div class="img-wrapper" data-position="banner">
            <img style="aspect-ratio: 5/3; object-fit: cover; max-width: 600px;" 
                class="rounded img-fluid w-100" src="../assets/imgs/bg2.jpg">

            <input type="file" class="form-control mt-4 image-input-upload" style="max-width: 600px;">
        </div>
    </div>

    <div class="edit-event-image mt-5 pt-4">
        <h3 class="fs-5 pb-4">Sửa ảnh sự kiện cưới</h3>

        <div class="row mx-auto w-100 justify-content-center">
            <div class="event-item col-12 col-sm-6 col-lg-3 p-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-position="groom-1">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ hỏi nhà trai</h5>
                    <img src="../assets/imgs/bg2.jpg" class="rounded img-fluid" 
                        style="aspect-ratio: 3/4; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>
            <div class="event-item col-12 col-sm-6 col-lg-3 p-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-position="bride-1">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ hỏi nhà gái</h5>
                    <img src="../assets/imgs/bg2.jpg" class="rounded img-fluid" 
                        style="aspect-ratio: 3/4; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>

            <div class="event-item col-12 col-sm-6 col-lg-3 p-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-position="groom-2">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ cưới nhà trai</h5>
                    <img src="../assets/imgs/bg2.jpg" class="rounded img-fluid" 
                        style="aspect-ratio: 3/4; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>
            <div class="event-item col-12 col-sm-6 col-lg-3 p-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-position="bride-2">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ cưới nhà gái</h5>
                    <img src="../assets/imgs/bg2.jpg" class="rounded img-fluid" 
                        style="aspect-ratio: 3/4; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>
        </div>
    </div>

    <div class="edit-album my-5 pt-4">
        <h3 class="fs-5 mb-4">Sửa ảnh album</h3>

        <div class="img-wrapper" data-position="album-top">
            <h3 class="fs-6">Ảnh album lớn</h3>
            <img style="aspect-ratio: 4/3; object-fit: cover; max-width: 600px;" 
                class="rounded img-fluid w-100" src="../assets/imgs/bg2.jpg">

            <input type="file" class="form-control mt-4 w-100 image-input-upload" style="max-width: 600px;">
        </div>

        <div class="upload-more">
            <!-- <h3 class="fs-6 mb-3">Thêm ảnh</h3> -->

            <div class="row w-100 justify-content-beetween">
                <div class="col-6 col-md-3 col-lg-2 col-xxl-1"></div>
                <div class="col-6 col-md-3 col-lg-2 col-xxl-1"></div>
                <div class="col-6 col-md-3 col-lg-2 col-xxl-1"></div>
                <div class="col-6 col-md-3 col-lg-2 col-xxl-1"></div>
                <div class="col-6 col-md-3 col-lg-2 col-xxl-1"></div>
                <div class="col-6 col-md-3 col-lg-2 col-xxl-1"></div>
            </div>

            <!-- <input type="file" class="form-control mt-4" id="thumbnail" name="thumbnail"> -->
        </div>
    </div>
</div>

<script src="../assets/js/admin-upload.js"></script>
<!-- End HTML content -->

<?php
    $htmlContent = ob_get_clean(); // Save content into $htmlContent and clean output buffering
    include 'base.html'; // include base html content
?>
