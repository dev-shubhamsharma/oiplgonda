<?php

// fetch_answered_questions.php
// this file fetches all answered questions of the user in the current exam
session_start();
include "connection.php";

$user_id = $_SESSION["user_id"];

$sql_query = "SELECT question_id FROM exam_answers_table WHERE user_id = ? AND selected_answer IS NOT NULL AND selected_answer != ''";

$stmt = $conn->prepare($sql_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$answered_questions = [];
while ($row = $result->fetch_assoc()) {
    $answered_questions[] = $row['question_id'];
}

header('Content-Type: application/json');

//map questionIndex from question ids
$question_ids = $_SESSION["exam_question_ids"];

$answered_questions = array_map(function($question_id) use ($question_ids) {
    return array_search($question_id, $question_ids);
}, $answered_questions);

$response["current_question_index"] = $_SESSION["current_question_index"];
$response["answered_questions"] = $answered_questions;
echo json_encode($response);
$conn->close();


?>