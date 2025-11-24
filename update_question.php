<?php

// update_question.php
include "connection.php";

if(isset($_POST["question_id"]) && isset($_POST["subject_name"]) && isset($_POST["question_text"]) && isset($_POST["option_a"]) && isset($_POST["option_b"]) && isset($_POST["option_c"]) && isset($_POST["option_d"]) && isset($_POST["correct_option"])) {
    $question_id = $_POST["question_id"];
    $subject_name = $_POST["subject_name"]; 
    $question_text = $_POST["question_text"];
    $option_a = $_POST["option_a"];
    $option_b = $_POST["option_b"];
    $option_c = $_POST["option_c"];
    $option_d = $_POST["option_d"];

    if($_POST["correct_option"] == "A") {
        $correct_option = $option_a;
    } else if($_POST["correct_option"] == "B") {
        $correct_option = $option_b;
    } else if($_POST["correct_option"] == "C") {
        $correct_option = $option_c;
    } else if($_POST["correct_option"] == "D") {
        $correct_option = $option_d;
    }
    if($correct_option != $option_a && $correct_option != $option_b && $correct_option != $option_c && $correct_option != $option_d) {
        echo "invalid_correct_option";
        exit();
    }
    $sql = "UPDATE questions_table SET subject_name=?, question=?, option_a=?, option_b=?, option_c=?, option_d=?, correct_answer=? WHERE question_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $subject_name, $question_text, $option_a, $option_b, $option_c, $option_d, $correct_option, $question_id);

    if($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
} else {
    echo "invalid";
}


?>