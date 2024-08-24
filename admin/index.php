
<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Nội dung của trang chỉ hiển thị khi người dùng đã đăng nhập
?>

<!DOCTYPE html>
<html lang="en">

<head th:fragment="head">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- CSS icon from Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <!-- CSS custom -->
</head>

<body>

    <!--  Animation loading  -->
    <div th:fragment="loading-animation">
        <div class="loading">
            <div class="loading__icon"></div>
        </div>
    </div>

    <!-- Pop up to show notifications -->
    <div id="notify">
        <div class="d-flex align-items-center">
            <div class="notify-status d-flex justify-content-center align-items-center px-3 px-md-4 fs-1">
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-bug"></i>
                <i class="fa-solid fa-triangle-exclamation"></i>
                <i class="fa-regular fa-comment-dots"></i>
            </div>

            <div class="notify-content">
                <div id="notify-title"></div>
                <div id="notify-message"></div>
            </div>

            <div id="notify-close-button" class="justify-content-center align-items-center px-2 px-md-3 fs-3">
                <i class="w-75 p-3 text-secondary fa-solid fa-xmark"></i>
            </div>
        </div>

        <div class="w-100 py-3 pe-4 justify-content-end notify-response" id="notify-response">
            <button class="ok me-2 fw-bold" id="ok">Ok</button>
            <button class="cancel fw-bold" id="cancel">Hủy</button>
        </div>
    </div>

    <!-- Body -->
    <nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" th:href="${RESOURCES_URL} + 'admin/'">Quản trị viên</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-dark btn-sm order-1 order-lg-0 ms-md-5 me-3 me-lg-0" type="button" data-bs-toggle="collapse" data-bs-target="#sideBarNav">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <button class="btn text-white" id="logout-admin-button">Đăng xuất</button>
        </ul>
    </nav>

    <div class="content d-flex vw-100 vh-100">
        <div class="collapse collapse-horizontal show vh-100" id="sideBarNav">
            <div class="h-100 navbar-left">
                <!-- Sidebar controls -->
                <div class="accordion pt-3" id="accordionNav">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button px-4 py-3" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1">
                                <span class="m-0 text-light fs-6 fw-medium opacity-50">Trang chủ</span>
                            </button>
                        </h2>
                        <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordionNav">
                            <div class="accordion-body px-0 pt-0">
                                <div class="">
                                    <a th:href="${RESOURCES_URL} + 'admin/'" class="text-decoration-none"><div class="navbtn">Video</div></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed px-4 py-3" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2">
                                <span class="m-0 text-light fs-6 fw-medium opacity-50">Giới thiệu</span>
                            </button>
                        </h2>
                        <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordionNav">
                            <div class="accordion-body px-0 pt-0">
                                <div class="text-light fs-6 fw-normal">
                                    <a th:href="${RESOURCES_URL} + 'admin/'" class="text-decoration-none"><div class="navbtn">Banner</div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body px-0 py-4 px-md-4">
            <div class="row">
                <div class="col-12">
                    <main class="main-content">
                        <!--  Change content here  -->
                        <h4 class="p-3 pt-0 ps-lg-0 fs-4 fw-semibold">Title</h4>


                        <!--  Change content here  -->
                    </main>
                </div>
            </div>
        </div>
    </div>
    <!-- End Body -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
        crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script>
        if (window.innerWidth < 768) {
            const sideBarNav = document.getElementById('sideBarNav');
            sideBarNav.classList.remove('show');
        }
    </script>


</body>
</html>
