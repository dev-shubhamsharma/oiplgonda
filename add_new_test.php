
<?php

// add_new_test.php
// this script adds a new mock test to the database

include "connection.php";


if (isset($_POST['subject_name']) && isset($_POST['num_questions'])) {
    $subject_name = $conn->real_escape_string($_POST['subject_name']);
    $num_questions = intval($_POST['num_questions']);
    
    $sql = "INSERT INTO mock_tests_table (subject_name, num_questions) VALUES ('$subject_name', $num_questions)";
    
    if ($conn->query($sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else if (isset($_POST[""]) && isset($_POST[  ""])) {
    // Additional fields can be handled here
}