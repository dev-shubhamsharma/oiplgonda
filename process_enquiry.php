<?php

session_start();




// Array to store validation errors
$errors = [];


// Check if the form was submitted
if (isset($_POST['submit_enquiry'])) {



    // 2. Retrieve and Sanitize Form Data
    // Use filter_input for security and ease of use
    $name = trim(filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email_id', FILTER_SANITIZE_EMAIL));
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

        try {
            // 2. Prepare the statement
            $stmt = $conn->prepare($sql);

            // 3. Execute the statement, passing an array of values to bind to the placeholders.
            // PDO automatically handles the data type conversion and quoting.
            $stmt->execute([$name, $email, $mobile, $message]);

            // Success: Set flash message and redirect
            $_SESSION['message'] = "Enquiry Submitted Successfully! We will contact you soon.";
            $_SESSION['status'] = "success";
            
            // PDO does not have a separate close() method for the main connection object
            // if using it as a variable. It closes when the script ends or by setting $conn = null;

        } catch (PDOException $e) {
            // Error handling if execution fails (e.g., bad SQL, connection issue)
            // In a real application, you'd log $e->getMessage() and show a generic error to the user.
            
            $_SESSION['message'] = "Database Error: Failed to submit enquiry. Please try again later.";
            $_SESSION['status'] = "error";

            echo $e->getMessage();
        }

        // Redirect regardless of success or caught error
        header("Location: index.php");
        exit();
    } 
    else
    {
        // Save the errors and the user's input data back to the session 
        // so they can be displayed on index.php

        // $status_message = "Please correct the errors below.";
        // $status_type = "error";
        // $_SESSION['errors'] = $errors;
        // $_SESSION['form_data'] = $_POST;
        
        $_SESSION['message'] = "Please correct the following errors.";
        $_SESSION['status'] = "error";
        $_SESSION['errors'] = $errors;
        
        header("Location: index.php");
        exit();
    }
}
else
{
    // If someone tries to access this script directly without submitting the form
    header("Location: index.php");
    exit();
}

?>
