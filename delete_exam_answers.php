<?php 

// delete_exam_answers.php
// This file deletes all exam answers for a specific user based on user_id sent via POST request

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

if (!isset($_POST['user_id']) || empty($_POST['user_id'])) {
    die("User ID is required.");
}

include "connection.php";
$user_id = $_POST['user_id'];
$sql = "DELETE FROM exam_answers_table WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
if ($stmt->execute()) {
    echo "Exam answers deleted successfully.";
} else {
    echo "Error deleting exam answers: " . $conn->error;
}





?>