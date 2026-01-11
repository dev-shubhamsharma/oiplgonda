<?php 
// save_answer_into_exam_table.php
// this file saves the answer selected by user into exam_answers_table



session_start();
include "connection.php";

$user_id = $_SESSION["user_id"];
$subject_name = $_SESSION["exam_subject_name"];
$question_ids = $_SESSION["exam_question_ids"];
$current_question_index = $_SESSION["current_question_index"];
$question_id = $question_ids[$current_question_index];
$selected_answer = $_POST["selected_answer"];

// update the answer into the exam_answers_table
$sql = "update exam_answers_table set selected_answer = ?, datetime = NOW() where user_id = ? and question_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $selected_answer, $user_id, $question_id);
$stmt->execute();
$stmt->close();
$conn->close();

$_SESSION["current_question_index"] = $current_question_index + 1;
echo json_encode(array("status" => "Answer saved successfully"));

?>