<?php
$pageTitle = "About Us"; // Tiêu đề của trang
ob_start(); // Bắt đầu output buffering
?>

<h2>About Us</h2>
<p>We are a company dedicated to providing the best services.</p>

<?php
$content = ob_get_clean(); // Lưu nội dung vào biến $content và kết thúc output buffering
include 'base.html'; // Bao gồm base HTML và hiển thị nội dung
?>
