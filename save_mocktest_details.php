<?php 

//save_mocktest_details.php
// this script saved mocktest data to the database

session_start();

include "connection.php";

if (
    !isset(
        $_SESSION["user_id"],
        $_SESSION["user_name"],
        $_SESSION["subject_name"],
        $_SESSION["total_questions"],
        $_SESSION["score"]
    )
) {
    echo json_encode([
        "status" => "error",
        "message" => "Session data missing"
    ]);
    exit;
}



$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];
$subject_name = $_SESSION["subject_name"];
$total_questions = $_SESSION["total_questions"];
$score = $_SESSION["score"];


$query = "insert into mocktest_performance_table (user_id, user_name, subject_name, total_questions, score) values (?, ?, ?, ?,? )";
$stmt = $conn->prepare($query);
$stmt->bind_param('issii',$user_id, $user_name, $subject_name, $total_questions, $score);
if($stmt->execute())
{
    echo json_encode("Mocktest Data Saved");
}
else 
{
    echo json_encode("Failed to save mocktest data");
}





?>