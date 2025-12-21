<?php 

// fetch_question_for_mocktest.php
// this file fetches a question based on the question index sent via POST request

session_start();
$question_index = $_SESSION["current_question_index"];
$question_ids = $_SESSION["question_ids"];

include "connection.php";

$current_question_id = $question_ids[$question_index];

$sql_query = "SELECT question_id, question, option_a, option_b, option_c, option_d 
              FROM questions_table 
              WHERE question_id = ?";
$stmt = $conn->prepare($sql_query);
$stmt->bind_param('i', $current_question_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $row["question_number"] = ($_SESSION["current_question_index"]+1);


    echo json_encode($row);
} else {
    echo json_encode(array("error" => "No question found"));
}



?>