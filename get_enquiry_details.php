<?php
// get_enquiry_details.php

// this script fetches enquiry details based on the provided enquiry_id via POST request

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['enquiry_id'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    exit();
}

include "connection.php";
$enquiry_id = intval($_POST['enquiry_id']);
$sql = "SELECT * FROM enquiry_table WHERE enquiry_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $enquiry_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'Enquiry not found.']);
    exit();
}

$enquiry = $result->fetch_assoc();
echo json_encode($enquiry);

?>