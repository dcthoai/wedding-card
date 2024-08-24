<?php

$host = 'localhost';
$username = "admin_card";
$password = "1234";
$dbname = "card";

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

?>
