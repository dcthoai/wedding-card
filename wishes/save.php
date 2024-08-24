<?php

include '../connection.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['fullname']) && isset($data['content'])) {
        $fullname = $conn->real_escape_string($data['fullname']);
        $content = $conn->real_escape_string($data['content']);
        $email = isset($data['email']) ? $conn->real_escape_string($data['email']) : "";        
        $columns = [];
        $values = [];

        if (!empty($fullname)) {
            $columns[] = "fullname";
            $values[] = "'$fullname'";
        }

        if (!empty($email)) {
            $columns[] = "email";
            $values[] = "'$email'";
        }
        
        if (!empty($content)) {
            $columns[] = "content";
            $values[] = "'$content'";
        }

        if (!empty($values)) {
            $sql = "INSERT INTO wishes (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ")";
            
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                echo json_encode(["status" => "success"]);
                exit();
            }
        }
    }
}

$conn->close();
echo json_encode(["status" => "error"]);

?>
