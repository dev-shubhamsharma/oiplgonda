<?php 

// fetch_correct_answer_for_mocktest.php
// this file fetches the correct answer for the current question in the mock test

session_start();

$selected_answer = $_POST['selected_answer'] ;
if(!isset($selected_answer)) {
    echo json_encode(array("error" => "No answer selected"));
    exit();
}

$question_index = $_SESSION["current_question_index"];
$question_ids = $_SESSION["question_ids"];
include "connection.php";

$current_question_id = $question_ids[$question_index];
$sql_query = "SELECT correct_answer 
              FROM questions_table 
              WHERE question_id = ?";
$stmt = $conn->prepare($sql_query);
$stmt->bind_param('i', $current_question_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();


// before sending correct answer increment index for next question
    $_SESSION["current_question_index"] = $question_index + 1;

    echo json_encode($row);
} else {
    echo json_encode(array("error" => "No correct answer found"));
}



?>