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

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['status']) && isset($data['wishId'])) {
            $status = $data['status'];
            $wishId = $data['wishId'];
            include '../connection.php';

            $updateSql = "UPDATE wishes SET status = ? WHERE id = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param('ii', $status, $wishId);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo json_encode([
                    "status" => "success"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Failed to save"
                ]);
            }

            $stmt->close();
            $conn->close();
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Missing param"
            ]);
        }

        break;
    
    case 'GET':
        include '../connection.php';
        $sql = "SELECT * FROM wishes ORDER BY status DESC, created_at DESC";
        $result = $conn->query($sql);
        $wishes = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $wishes[] = $row;
            }
        }

        $conn->close();
        echo json_encode(["status" => "success", "wishes" => $wishes]);
        break;
    default:
        echo json_encode([
            "status" => "error",
            "message" => "Invalid request method"
        ]);

        break;
}

exit();
?>