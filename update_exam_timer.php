<?php

// update_exam_timer.php
// this file updates the remaining time of the exam in session

session_start();
if(isset($_POST["time_left"])){
    $_SESSION["exam_remaining_time"] = $_POST["time_left"];

    include "connection.php";
    $user_id = $_SESSION["user_id"];
    $remaining_time = $_POST["time_left"];
    $sql = "UPDATE exam_details_table SET time_left_in_seconds = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ii", $remaining_time, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();



    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error", "message" => "remaining_time not provided"));
}


?>