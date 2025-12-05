<?php 

// load_next_question.php
// this scripts loads questions from database for mocktest window

session_start();

$current_question_index = $_SESSION["current_question_index"];

$question_id = $_SESSION["question_ids"][$current_question_index];

$subject_name = $_SESSION["subject_name"];

include "connection.php";

$query = "select question, option_a, option_b, option_c, option_d from questions_table where question_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('i',$question_id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    $row['current_question_index'] = $_SESSION["current_question_index"];
    $response = $row;
}
else 
{
    $response = "No question found with questin_id";
}


echo json_encode($response);

$stmt->close();
$conn->close();





















?>