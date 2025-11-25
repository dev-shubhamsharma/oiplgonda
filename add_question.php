<?php

// add_question.php
// This file will contain the form and logic to add a new question to the database.

include "connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["subject_name"]) && isset($_POST['question_text']) && isset($_POST['option_a']) && isset($_POST['option_b']) && isset($_POST['option_c']) && isset($_POST['option_d']) && isset($_POST['correct_option'])) {

    $subject_name = $_POST['subject_name'];
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];

    if($_POST["correct_option"] == 'A'){
        $correct_option = $option_a;
    } else if($_POST["correct_option"] == 'B'){
        $correct_option = $option_b;
    } else if($_POST["correct_option"] == 'C'){
        $correct_option = $option_c;
    } else if($_POST["correct_option"] == 'D'){
        $correct_option = $option_d;
    }



    $stmt = $conn->prepare("INSERT INTO questions_table (subject_name, question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?,?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssss", $subject_name,$question_text, $option_a, $option_b, $option_c, $option_d, $correct_option);

    if($stmt->execute()) {
        echo "success";
    } else {
        echo "error" . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

else
{
    echo "invalid";
}


?>