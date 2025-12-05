<?php 

//load_saved_answer.php
// this script loads the saved answer from mocktest answers according to userid and questionId

session_start();

$user_id = $_SESSION["user_id"];
$current_question_index = $_SESSION["current_question_index"];
$question_id = $_SESSION["question_ids"][$current_question_index];


include "connection.php";

$get_query = "select selected_answer from mocktest_answers where user_id = ? and question_id = ?";

$stmt = $conn->prepare($get_query);
$stmt->bind_param('ii',$user_id,$question_id);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    echo json_encode($row['selected_answer']);
}
else 
{
    echo json_encode("No result data found");
}



?>