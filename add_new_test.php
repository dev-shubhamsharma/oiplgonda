<?php

    header('Content-Type: application/json');

    // Check if the form was submitted
    // if (isset($_POST['submit_enquiry'])) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    // Array to store validation errors
    $errors = [];
    // 2. Retrieve and Sanitize Form Data
    // Use filter_input for security and ease of use
    $subject_name = trim(filter_input(INPUT_POST, 'subject_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $num_questions = trim(filter_input(INPUT_POST, 'num_questions', FILTER_SANITIZE_NUMBER_INT));
    $time_allotted = trim(filter_input(INPUT_POST, 'time_allotted', FILTER_SANITIZE_NUMBER_INT));
    $creator_name = trim(filter_input(INPUT_POST, 'creator_name', FILTER_SANITIZE_SPECIAL_CHARS));

    // subject name validation
    if (empty($subject_name)) {
        $errors[] = "Subject Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $subject_name)) {
        $errors[] = "Subject Name must contain only letters and spaces.";
    }

    // Number of Questions validation
    if (empty($num_questions)) {
        $errors[] = "Number of Questions is required.";
    } elseif (!filter_var($num_questions, FILTER_VALIDATE_INT)) {
        $errors[] = "Invalid number format for Number of Questions.";
    }

    // Time Allotted validation
    if (empty($time_allotted)) {
        $errors[] = "Time Allotted is required.";
    } elseif (!filter_var($time_allotted, FILTER_VALIDATE_INT)) {
        $errors[] = "Invalid number format for Time Allotted.";
    }

    // creator name validation
    if (empty($creator_name)) {
        $errors[] = "Creator Name is required.";
    }

    if (empty($errors)) {

        include "connection.php"; 

        // 1. Define the SQL statement with question mark (?) placeholders
        // NOTE: I'm assuming the column name is 'name', not 'ame' based on standard practice.
        $sql = "INSERT INTO tests_table (subject_name, number_of_questions, time_allotted, creator_name) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $subject_name, $num_questions, $time_allotted, $creator_name);

        $response = [];
        if($stmt->execute())
        {
             $response = [
                "status" => "success",
                "message" => "Enquiry Submitted Successfully"
            ];
        }
        else
        {
            $response = [
                "status" => "error",
                "message" => "Database insertion failed.",
                "db_error" => $stmt->error // Include the specific MySQLi error message
            ];
        }

        echo json_encode($response);

        $stmt->close();
        $conn->close();

        exit();

    } 
    else
    {
        // Save the errors and the user's input data back to the session 
        // so they can be displayed on index.php
       
        
        // 2. Encode the necessary data into a JSON object and echo it
        echo json_encode([
            'status' => 'error',
            'message' => 'Please correct the following errors.',
            'errors' => $errors // Sends the array of specific error messages
        ]);
        
        // 3. Terminate the script
        exit();
        
    }

    


?>
