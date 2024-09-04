<?php

error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['position'])) {
        $position = $_GET['position'];
    
        include 'connection.php';
        $stmt = $conn->prepare("SELECT path FROM album WHERE position = ?");
        $stmt->bind_param("s", $position);
        $stmt->execute();
        $result = $stmt->get_result();
        $path = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $path[] = $row['path'];
            }
    
            echo json_encode(["status" => "success", "path" => $path]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to get image by position"]);
        }
    
        $stmt->close();
        $conn->close();
    }
}

exit();

?>