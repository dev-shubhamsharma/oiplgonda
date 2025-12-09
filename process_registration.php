<?php

    // process_registration.php
    // This script processes the registration form submission

    
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
    $mobile = trim(filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_NUMBER_INT));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_UNSAFE_RAW);


    // Name validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Name must contain only letters and spaces.";
    }

    // Mobile number validation
    if (empty($mobile)) {
        $errors[] = "Mobile Number is required.";
    } elseif (!preg_match("/^\d{10}$/", $mobile)) {
        $errors[] = "Mobile Number must be exactly 10 digits and contain only numbers.";
    }
    
    
    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // password Validation
    if (empty($password)) {
        $errors[] = "Password can not be empty";
    }

    // password Validation
    if (empty($confirm_password)) {
        $errors[] = "Confirm Password can not be empty";
    }

    if($password != $confirm_password) 
    {
        $errors[] = "Both the passwords must be same";
    }

    if (empty($errors)) {

        include "connection.php"; 

        // check if email already exists
        $check_query = "SELECT COUNT(*) AS count FROM student_registration_table WHERE email_id = ?";
        $conn_stmt = $conn->prepare($check_query);
        $conn_stmt->bind_param('s', $email);
        $conn_stmt->execute();
        $result = $conn_stmt->get_result()->fetch_assoc();
        if ($result['count'] > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Email is already registered.'
            ]);
            exit();
        }
        else
        {
            $sql = "INSERT INTO student_registration_table (student_name, mobile_number, email_id, password, verification_status) VALUES (?, ?, ?, ?, ?)";

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            // Assuming 0 means not verified
            $verification_status = 0;     
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssi', $name, $mobile, $email, $hashed_password, $verification_status);
            $response = [];
            if($stmt->execute())
            {
                $response = [
                    "status" => "success",
                    "message" => "Student Registered Successfully."
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
