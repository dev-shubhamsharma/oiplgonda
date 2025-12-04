<?php 

// load_previous_answer.php
// this script loads previously saved answer of a question in mocktest

include 'connection.php';

$user_id = $_POST["user_id"];
$question_id = $_POST["question_id"];

if(isset($user_id) && isset($question_id))
{
    $query = "select selected_answer from mocktest_answers where user_id = ? and question_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii',$user_id,$question_id);    
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $answer = trim($row["selected_answer"]);
        
    }
    else {
        $answer = "no data found";
    }
    
}
else 
{
    $answer = "Invalid Access Method";
    exit();
}


echo json_encode($answer);

?>