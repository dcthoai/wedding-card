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

        <div class="img-wrapper" data-name="banner" data-position="banner">
            <img style="aspect-ratio: 5/3; object-fit: cover; max-width: 500px;" 
                class="rounded img-fluid w-100" id="banner-image" src="" alt="img">

            <input type="file" class="form-control mt-4" style="max-width: 500px;">
        </div>
    </div>

    <div class="edit-event-image mt-5 pt-4">
        <h3 class="fs-5 pb-4">Sửa ảnh sự kiện cưới</h3>

        <div class="row justify-content-center justify-content-md-start">
            <div class="event-item col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-name="groom-1" data-position="event">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ hỏi nhà trai</h5>
                    <img src="" class="rounded img-fluid w-100 event-image" 
                        style="aspect-ratio: 9/15; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>
            <div class="event-item col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-name="bride-1" data-position="event">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ hỏi nhà gái</h5>
                    <img src="" class="rounded img-fluid w-100 event-image" 
                        style="aspect-ratio: 9/15; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>

            <div class="event-item col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-name="groom-2" data-position="event">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ cưới nhà trai</h5>
                    <img src="" class="rounded img-fluid w-100 event-image" 
                        style="aspect-ratio: 9/15; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>
            <div class="event-item col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                <div class="pb-3 bg-body-secondary p-4 rounded img-wrapper" data-name="bride-2" data-position="event">
                    <h5 class="w-100 text-center title fs-6 mb-3">Lễ cưới nhà gái</h5>
                    <img src="" class="rounded img-fluid w-100 event-image" 
                        style="aspect-ratio: 9/15; object-fit: cover;" alt="img">
                    <input type="file" class="form-control mt-4">
                </div>
            </div>
        </div>
    </div>

    <div class="edit-album my-5 pt-4">
        <h3 class="fs-5 mb-4">Sửa ảnh album</h3>

        <div class="img-wrapper" data-name="album-top" data-position="album-top">
            <h3 class="fs-6">Ảnh album lớn</h3>
            <img style="aspect-ratio: 4/3; object-fit: cover; max-width: 500px;"
                class="rounded img-fluid w-100" id="album-top-image" alt="img" src="">

            <input type="file" class="form-control mt-4 w-100" style="max-width: 500px;">
        </div>

        <h3 class="fs-6 mt-5 mb-0">Ảnh dọc</h3>
        <div class="row">
            <div class="col-4 col-md-3 col-lg-2 ps-0 pe-2">
                <div class="img-wrapper p-2 bg-body-secondary rounded mt-4" data-name="album-col-1" data-position="album-col">
                    <img style="aspect-ratio: 3/5; object-fit: cover;" 
                        class="rounded img-fluid w-100 album-col-image" alt="img" src="">

                    <input type="file" class="form-control mt-4 w-100">
                </div>
            </div>

            <div class="col-4 col-md-3 col-lg-2 px-1">
                <div class="img-wrapper p-2 bg-body-secondary rounded mt-4" data-name="album-col-2" data-position="album-col">
                    <img style="aspect-ratio: 3/5; object-fit: cover;" 
                        class="rounded img-fluid w-100 album-col-image" alt="img" src="">

                    <input type="file" class="form-control mt-4 w-100">
                </div>
            </div>

            <div class="col-4 col-md-3 col-lg-2 ps-2 pe-0">
                <div class="img-wrapper p-2 bg-body-secondary rounded mt-4" data-name="album-col-3" data-position="album-col">
                    <img style="aspect-ratio: 3/5; object-fit: cover;" 
                        class="rounded img-fluid w-100 album-col-image" alt="img" src="">

                    <input type="file" class="form-control mt-4 w-100">
                </div>
            </div>
        </div>

        <div class="layout-uneven">
            <h3 class="fs-6 mt-5 mb-2">Layout lệch nhau</h3>

            <div class="row justify-content-beetween">
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-uneven-1" data-position="album-uneven">
                        <img src="" alt="img" class="rounded img-fluid album-uneven-image w-100" 
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-uneven-2" data-position="album-uneven">
                        <img src="" alt="img" class="rounded img-fluid album-uneven-image w-100" 
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-uneven-3" data-position="album-uneven">
                        <img src="" alt="img" class="rounded img-fluid album-uneven-image w-100" 
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-uneven-4" data-position="album-uneven">
                        <img src="" alt="img" class="rounded img-fluid album-uneven-image w-100" 
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-uneven-5" data-position="album-uneven">
                        <img src="" alt="img" class="rounded img-fluid album-uneven-image w-100" 
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
            </div>
        </div>

        <div class="img-wrapper" data-name="album-center" data-position="album-center">
            <h3 class="fs-6 mt-4 mb-3">Ảnh lớn</h3>
            <img style="aspect-ratio: 5/8; object-fit: cover; max-width: 300px;" 
                class="rounded img-fluid w-100" id="album-center-image" alt="img" src="">

            <input type="file" class="form-control mt-4 w-100" style="max-width: 300px;">
        </div>

        <div class="layout-grid">
            <h3 class="fs-6 mt-5 mb-3">Layout lưới</h3>

            <div class="row justify-content-beetween">
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-1" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-2" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-3" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-4" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-5" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-6" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-7" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 my-3">
                    <div class="img-wrapper" data-name="album-grid-8" data-position="album-grid">
                        <img src="" alt="img" class="rounded img-fluid album-grid-image w-100"
                            style="aspect-ratio: 3/5; object-fit: cover;">
                        <input type="file" class="form-control mt-3 w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/image.js"></script>
<script src="../assets/js/admin-upload.js"></script>
<!-- End HTML content -->

<?php
    $htmlContent = ob_get_clean(); // Save content into $htmlContent and clean output buffering
    include 'base.html'; // include base html content
?>
