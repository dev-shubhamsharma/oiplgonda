<?php
$servername = "localhost";
$database ="oipldb";
$username = "root";
$db_password = "";

// Create connection
$conn = new mysqli($servername, $username, $db_password, $database);

if ($conn->connect_error) {
    // Send a proper JSON error response
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.', 'db_error' => $conn->connect_error]);
    exit();
}