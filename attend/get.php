<?php

include '../connection.php';

error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

$sql = "SELECT fullname, email, content, created_at FROM wishes ORDER BY created_at DESC";
$result = $conn->query($sql);
$attendUsers = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $attendUsers[] = $row;
    }
}

$conn->close();
echo json_encode($attendUsers);

?>