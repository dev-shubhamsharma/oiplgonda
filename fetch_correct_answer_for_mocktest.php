<?php 

// fetch_correct_answer_for_mocktest.php
// this file fetches the correct answer for the current question in the mock test

session_start();

$selected_answer = $_POST['selected_answer'] ;
if(!isset($selected_answer)) {
    echo json_encode(array("error" => "No answer selected"));
    exit();
}

$current_question_index = $_SESSION["current_question_index"];
$question_ids = $_SESSION["question_ids"];
include "connection.php";

$current_question_id = $question_ids[$current_question_index];
$sql_query = "SELECT correct_answer 
              FROM questions_table 
              WHERE question_id = ?";
$stmt = $conn->prepare($sql_query);
$stmt->bind_param('i', $current_question_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    //increment score if answer is correct
    if($selected_answer == $row["correct_answer"])
        $_SESSION["score"] = $_SESSION["score"]+1;

    // before sending correct answer increment index for next question
    $_SESSION["current_question_index"] = $current_question_index + 1;

    $row["question_number"] = $_SESSION["current_question_index"];
    $row["total_questions"] = $_SESSION["total_questions"];
    $row["score"] = $_SESSION["score"];

    echo json_encode($row);
} else {
    echo json_encode(array("error" => "No correct answer found"));
}



?>