<?php

    //process_login.php


    header('Content-Type: application/json');

    session_start(); // Start session early to use later


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
    
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    // var_dump($email);
    
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    
    // password Validation
    if(empty($password)) {
        $errors[] = "Password can not be empty";
    }

    // var_dump($password);

    
    if (empty($errors)) {

        // var_dump($password);


        include "connection.php"; 

        // var_dump($password);

        // 1. Define the SQL statement with question mark (?) placeholders
        // NOTE: I'm assuming the column name is 'name', not 'ame' based on standard practice.
        $sql = "SELECT student_id, student_name, password, verification_status FROM student_registration_table WHERE email_id = ?";

        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        
        
        $response = [];
        if($stmt->execute())
        {
            

            $result = $stmt->get_result();
            if($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['password'];
                $verification_status = $row['verification_status'];

                // var_dump($password, $hashed_password, password_verify($password, $hashed_password));

                


                if (password_verify($password, $hashed_password)) {
                    // Password is correct
                    if($verification_status == 1) {

                        
                        // User is verified
                        $_SESSION['user_id'] = $row['student_id'];
                        $_SESSION['user_name'] = $row['student_name'];
                        $_SESSION['logged_in'] = TRUE;
                        $_SESSION['email_id'] = $email;

                        $response = [
                            "status" => "success",
                            "message" => "Login successful.",
                            // "redirect" => "student_dashboard.php"
                        ];
                    } else {
                        // User is not verified
                        $response = [
                            "status" => "error",
                            "message" => "Your account is not verified. Please contact the administrator."
                        ];
                    }
                } else {
                    // Password is incorrect
                    $response = [
                        "status" => "error",
                        "message" => "Incorrect password."
                    ];
                }
            } 
            else {
                $response = [
                    "status" => "error",
                    "message" => "No user found with this email."
                ];
            }
        }
        else
        {
            $response = [
                "status" => "error",
                "message" => "Database query failed."
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
