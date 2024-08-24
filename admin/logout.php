<?php
// Bắt đầu session
session_start();

// Hủy tất cả dữ liệu session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: login.html");
exit();
?>
