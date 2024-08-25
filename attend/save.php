<?php

include '../connection.php';
include '../convert.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['fullname']) && isset($data['eventIds'])) {
        $fullnameParticipant = $conn->real_escape_string($data['fullname']);
        $emailParticipant = isset($data['email']) ? $conn->real_escape_string($data['email']) : '';
        $eventIds = $data['eventIds'];
        $columns = [];
        $values = [];

        if (!empty($fullnameParticipant)) {
            $columns[] = "participant";
            $values[] = "'$fullnameParticipant'";
            $columns[] = "participant_search";
            $values[] = "'" . removeAccents($fullnameParticipant) . "'";
        }

        if (!empty($emailParticipant)) {
            $columns[] = "participant_email";
            $values[] = "'$emailParticipant'";
        }

        if (!empty($eventIds)) {
            $columns[] = "event_id";

            foreach ($eventIds as $eventId) {
                $eventId = (int)$eventId;
                $sql = "INSERT INTO attend (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ", '$eventId')";

                if (!$conn->query($sql)) {
                    $conn->close();
                    echo json_encode(["status" => "error", "message" => $sql]);
                    exit();
                }
            }

            $conn->close();
            echo json_encode(["status" => "success"]);
            exit();
        }
    }
}

$conn->close();
echo json_encode(["status" => "errors"]);
?>
