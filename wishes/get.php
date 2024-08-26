<?php

include '../connection.php';

error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$sql = "SELECT fullname, content, created_at FROM wishes WHERE status = '1' ORDER BY created_at DESC";
$result = $conn->query($sql);
$wishes = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $wishes[] = $row;
    }
}

$conn->close();
echo json_encode($wishes);

?>
