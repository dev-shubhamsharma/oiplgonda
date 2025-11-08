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
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $mobile = trim(filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_NUMBER_INT));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));

    // Name validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Name must contain only letters and spaces.";
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Mobile number validation
    if (empty($mobile)) {
        $errors[] = "Mobile Number is required.";
    } elseif (!preg_match("/^\d{10}$/", $mobile)) {
        $errors[] = "Mobile Number must be exactly 10 digits and contain only numbers.";
    }

    // message validation
    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (empty($errors)) {

        include "connection.php"; 

        // 1. Define the SQL statement with question mark (?) placeholders
        // NOTE: I'm assuming the column name is 'name', not 'ame' based on standard practice.
        $sql = "INSERT INTO enquiry_table (name, email_id, mobile_number, message) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $name, $email, $mobile, $message);

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
