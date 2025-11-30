<?php 

// load_question_for_mocktest_window.php
include "connection.php";
$question_id = isset($_GET['question_id']) ? intval($_GET['question_id']) : 0;
$sql = "SELECT question, option_a, option_b, option_c, option_d FROM questions_table WHERE question_id = $question_id";
$result = $conn->query($sql);
$response = ['success' => false, 'data' => null];
if ($result->num_rows > 0) {
    $question = $result->fetch_assoc();
    $response['success'] = true;
    $response['data'] = $question;
} else {
    $response['success'] = false;
}

echo json_encode($response);
?>