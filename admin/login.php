
<?php

include '../connection.php';

session_start();
error_reporting(0);
ini_set('display_errors', 0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Content-Type: application/json");
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['username']) && isset($data['password'])) {
        $username = $data['username'];
        $password = $data['password'];

        $stmt = $conn->prepare("SELECT role FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($role);
            $stmt->fetch();

            if ($role === "ROLE_ADMIN") {
                $_SESSION['user'] = $username; // Save authenticated state in session

                $response = [
                    "status" => "success",
                    "message" => "Login successful"
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "Access denied: User is not an admin"
                ];
            }
        } else {
            $response = [
                "status" => "error",
                "message" => "Invalid username or password"
            ];
        }

        $stmt->close();
    } else {
        $response = [
            "status" => "error",
            "message" => "Missing username or password"
        ];
    }

    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin</title>

    <!-- CSS icon from Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <!-- CSS custom -->
    <link rel="stylesheet" href="../assets/css/notify.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>

    <!--  Animation loading  -->
    <div class="loading">
        <div class="loading__icon"></div>
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

    <div class="container">
        <div id="form-signin" class="form">
            <h2>Đăng nhập quản trị viên</h2>

            <form id="form-login" class="mt-4">
                <div class="input-box">
                    <span class="label-error"></span>
                    <input type="text" placeholder="Nhập username" id="username" name="username">
                </div>
                <div class="input-box">
                    <span class="label-error"></span>
                    <input type="password" placeholder="Nhập mật khẩu" id="password" name="password">
                </div>
                <div class="input-box button">
                    <button class="py-2" type="submit">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
        crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="../assets/js/constants.js"></script>
    <script src="../assets/js/notify.js"></script>
    <script src="../assets/js/validator.js"></script>
    <script src="../assets/js/login.js"></script>
</body>
</html>
