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

include '../convert.php';

function searchUsers($keyword) {
    include '../connection.php';

    $stmt = $conn->prepare("SELECT a.*, e.name as event_name
                            FROM attend a
                            JOIN event e ON a.event_id = e.id
                            WHERE a.participant_search LIKE ?");
    $searchKeyword = "%" . removeAccents($keyword) . "%";

    $stmt->bind_param("s", $searchKeyword);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    $stmt->close();
    $conn->close();

    return json_encode($users);
}

function searchUsersByEvent($eventId) {
    include '../connection.php';

    $stmt = $conn->prepare("SELECT a.*, e.name as event_name
                            FROM attend a
                            JOIN event e ON a.event_id = e.id
                            WHERE e.id = ?");

    $stmt->bind_param("s", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    $stmt->close();
    $conn->close();

    return json_encode($users);
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
    
        if (isset($data['keyword'])) {
            $keyword = $data['keyword'];

            echo searchUsers($keyword);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Missing search keyword"
            ]);
        }

        break;
    case 'GET':
        if (isset($_GET['event'])) {
            $eventId = intval($_GET['event']);

            echo searchUsersByEvent($eventId);
        }

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