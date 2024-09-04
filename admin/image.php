<?php

session_start();

// Check user authorities
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit();
}

error_reporting(0);
ini_set('display_errors', 0);
const UPLOAD_PATH = '../uploads/';

function uploadImage($file) {
    if (!is_dir(UPLOAD_PATH)) {
        mkdir(UPLOAD_PATH, 0755, true); // Adjust permissions as needed
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return 'upload-error';
    }

    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueFileName = uniqid('img_', true) . '.' . $fileExtension;
    $filePath = UPLOAD_PATH . $uniqueFileName;

    if (!move_uploaded_file($file['tmp_name'], $filePath)) {
        return 'save-error';
    }

    return $filePath;
}

function deleteImage($imageUrl) {
    if (file_exists($imageUrl)) {
        if (unlink($imageUrl)) {
            return 'delete-success';
        } else {
            return 'delete-error';
        }
    } else {
        return 'file-not-found';
    }
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if (isset($_FILES['image']) && isset($_POST['imageName']) && isset($_POST['position'])) {
            $position = $_POST['position'];
            $imageName = $_POST['imageName'];
            $image = $_FILES['image'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (!in_array($image['type'], $allowedTypes)) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Invalid file type"
                ]);

                exit();
            }

            $imageUrl = uploadImage($image);

            if ($imageUrl == 'upload-error') {
                echo json_encode([
                    "status" => "error",
                    "message" => "Failed to uploaded file"
                ]);
        
                exit();
            }

            if ($imageUrl == 'save-error') {
                echo json_encode([
                    "status" => "error",
                    "message" => "Failed to save file to host"
                ]);
        
                exit();
            }
            
            include '../connection.php';

            if (!empty($imageName) && !empty($position)) {
                $selectSql = "SELECT path FROM album WHERE name = ?";
                $stmt = $conn->prepare($selectSql);
                $stmt->bind_param('s', $imageName);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $oldPath = $row['path'];

                    deleteImage($oldPath);
            
                    $updateSql = "UPDATE album SET path = ? WHERE name = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param('ss', $imageUrl, $imageName);
            
                    if ($stmt->execute()) {
                        echo json_encode([
                            "status" => "success",
                            "imageUrl" => $imageUrl
                        ]);
                    } else {
                        echo json_encode(["status" => "error", "message" => "Failed to update record"]);
                    }
                } else {
                    $insertSql = "INSERT INTO album (position, name, path) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($insertSql);
                    $stmt->bind_param('sss', $position, $imageName, $imageUrl);

                    if ($stmt->execute()) {
                        echo json_encode([
                            "status" => "success",
                            "imageUrl" => $imageUrl
                        ]);
                    } else {
                        echo json_encode(["status" => "error", "message" => "Failed to create new record"]);
                    }
                }

                $stmt->close();
                $conn->close();
            }
        }

        break;
        
    default:
        echo json_encode([
            "status" => "error",
            "message" => "Invalid request method"
        ]);

        break;
}

?>
