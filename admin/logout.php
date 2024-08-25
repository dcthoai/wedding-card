<?php

session_start();

// Check user authorities
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit();
}

error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get all session valid
    $_SESSION = array();

    // Destroy cookies if it exists
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    $response = [
        "status" => "success",
        "message" => "Logout successful"
    ];
    
} else {
    $response = [
        "status" => "error",
        "message" => "Invalid request method"
    ];
}

echo json_encode($response);
exit();

?>