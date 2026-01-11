
<?php 

// fetch_question_for_exam.php
// this scripts fetch questions into exam window based on index

session_start();
include "connection.php";

if($_POST["question_index"] !== null){
    $_SESSION["current_question_index"] = $_POST["question_index"];
}


if(!isset($_SESSION["current_question_index"]))
{
    $_SESSION["current_question_index"] = 0;
}
    
    
    $question_ids = $_SESSION["exam_question_ids"];

    // find question id from array based on current index
    $question_id = $question_ids[$_SESSION["current_question_index"]];

    $subject_name = $_SESSION["exam_subject_name"];

    $fetch_query = "select question_id, subject_name, question, option_a, option_b, option_c, option_d from questions_table where question_id = ? and subject_name = ?";

    $stmt = $conn->prepare($fetch_query);
    $stmt->bind_param('is',$question_id,$subject_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $row["current_question_index"] = $_SESSION["current_question_index"];
        echo json_encode($row);
    }
    else{
        echo json_encode("No Questions found with this id");
    }


 ?>