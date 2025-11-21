<?php

// delete_question.php
// this script deletes a question from the database

include "connection.php";

if (isset($_POST['question_id'])) {
    $question_id = intval($_POST['question_id']);
    $sql = "DELETE FROM questions_table WHERE question_id = $question_id";
    
    if ($conn->query($sql)) {
        echo "success";
    } else {
        echo "error";
    }
}

$conn->close();

?>
