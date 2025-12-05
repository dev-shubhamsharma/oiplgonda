<?php 

//save_selected_answer.php
// this script saves selected_answer into mocktest_answers table accrording to userId and questionId

session_start();

$selected_answer = $_POST["selected_answer"];
$user_id = $_SESSION["user_id"];
$current_question_index = $_SESSION["current_question_index"];
$question_id = $_SESSION["question_ids"][$current_question_index];


if(isset($selected_answer) && !empty($selected_answer))
{
    include "connection.php";

    $update_query = "update mocktest_answers set selected_answer = ? where user_id = ? and question_id = ?";

    $update_stmt = $conn->prepare($update_query);   
    $update_stmt->bind_param('sii',$selected_answer,$user_id,$question_id);
    
    if($update_stmt->execute())
    {
        echo json_encode("Answer Saved");

        // if answer gets saved increment current_question_index and load question
        $last_question_index = count($_SESSION["question_ids"])-1;
        if($_SESSION["current_question_index"] < $last_question_index)
            $_SESSION["current_question_index"] = $_SESSION["current_question_index"] + 1;
        
        

    }
    else
    {
        echo json_encode("Failed to save answer");
    }
}
else
    echo json_encode("Selected answer is empty");





?>