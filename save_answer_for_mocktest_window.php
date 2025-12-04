<?php 

// save answer_for_mocktest_window.php
// this file saves the answers submitted from the mock test window

session_start();

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the submitted answers from the POST request
    
    $user_id = $_SESSION['user_id']; 
    $question_id = $_POST['question_id'];
    $selected_answers = $_POST['selected_answer']; 

    if($selected_answers === null or $selected_answers === "") {
        $selected_answers = ""; 
        exit();
    }
    else
    {       


        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO mocktest_answers (user_id, question_id, selected_answer) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $user_id, $question_id, $selected_answers);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Answers saved successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }


    
} else {
    echo "Invalid request method.";
}


?>