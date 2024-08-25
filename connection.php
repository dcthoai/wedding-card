<?php

$host = 'localhost';
$username = "admin_card";
$password = "1234";
$dbname = "card";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Failed to connected: " . $conn->connect_error);
}

?>
