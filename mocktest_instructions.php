<?php 

// set into session for access
session_start();


if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}
    

$testname = $_GET["testname"];


include "connection.php";

// mapping of testname to database subject name
if($testname == "it_tools")
    $subject_name = "IT Tools";
else if($testname == "web_design")
    $subject_name = "Web Design";
else if($testname == "python")
    $subject_name = "Python";
else if($testname == "iot")
    $subject_name = "IoT";
else {
    die("Invalid testname provided.");   // stops page and prevents SQL error
}


$_SESSION["testname"] = $testname;
$_SESSION["subject_name"] = $subject_name;


$total_questions = 0;

// fetch total number of questions in database of a subject
$count_query = "select COUNT(*) as total_questions from questions_table where subject_name = ?";
$count_stmt = $conn->prepare($count_query);
$count_stmt->bind_param('s', $subject_name);
$count_stmt->execute();
$count_result = $count_stmt->get_result();
if ($count_result->num_rows > 0) {
    $row = $count_result->fetch_assoc();
    if($row['total_questions'] > 10) {
        
        // fetch limit from website settings table
        $settings_query = "SELECT setting_value FROM website_settings_table WHERE setting_key = 'mocktest_questions_limit'";
        $settings_result = $conn->query($settings_query);
        $settings_row = $settings_result->fetch_assoc();
        $total_questions = (int)$settings_row['setting_value'];


    }
    else {
        $total_questions = $row['total_questions'];
        
    }

    
} else {
    die("No questions found for the selected subject.");
    exit();
}







$total_duration_in_minutes = $total_questions * 0.5;

$_SESSION["total_questions"] = $total_questions;
$_SESSION["total_duration_in_minutes"] = $total_duration_in_minutes;
$_SESSION["total_duration_in_seconds"] = $total_questions * 30;

$currentQuestionIndex = 0;

$_SESSION["current_question_index"] = $currentQuestionIndex;

$_SESSION["score"] = 0;



// echo $testname ;
// echo $subject_name;

// select random 5 question id from database based on subject name
// array should not repeat question ids

$sql_query = "SELECT question_id FROM questions_table WHERE subject_name = ? ORDER BY RAND() LIMIT $total_questions";
$stmt = $conn->prepare($sql_query);
$stmt->bind_param('s', $subject_name);
$stmt->execute();
$result = $stmt->get_result();
$question_ids = array();
while ($row = $result->fetch_assoc()) {
    $question_ids[] = $row['question_id'];
}   

// store question ids in session
$_SESSION["question_ids"] = $question_ids;
// echo implode(",", $question_ids); 


$conn->close();



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Instructions | OIPL</title>

    <?php

        include "libs/jquery.php";
        include "libs/font-awesome.php";    
        include "libs/google-font.php";
    ?>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        h1 {
            text-align: center;
            margin: 20px;
        }
        ul {
            margin: 20px;
            font-size: 18px;
            border: 2px solid #203f8eff;
            list-style: disc;
            padding: 30px;
            border-radius: 10px;
        }
        li {
            margin: 10px 0;
        }

        h2 {
            text-align: center;
            margin: 20px;
            color: green;
        }

        #start-test-btn {
            /* display: inline-block; */
            margin: 20px;
            padding: 10px 20px;
            background-color: #203f8eff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;

        }

        #start-test-btn:hover {
            background-color: #1a3266ff;
        }


        #start-test-btn:disabled {
            background-color: #666;
            cursor:not-allowed;
        }

        #start-test-btn i {
            margin-left: 5px;
        }


        
        
    </style>
</head>
<body>
    <h1>Mock Test Instructions</h1>
    <ul>
        <li>Total Questions: 
            <?php echo $total_questions; ?>
        </li>
        <li>Time Duration: 
            <?php 
            echo $total_duration_in_minutes;
            ?>    
            minutes
        </li>
        <li>Each question carries 1 mark</li>
        <li>No negative marking for wrong answers</li>
        <li>Do not refresh the page during the test</li>
        <li>Right Mouse click is not allowed</li>
        <li>Do not use any external resources during the test</li>
        <li>Tab change is not allowed</li>
        <li>Once answer is submitted, it cannot be changed or viewed</li>
    </ul>

    <h2>
        Best of luck for your test!
    </h2>
    
    <button id="start-test-btn">
        Start Test&nbsp;
        <i class="fa fa-arrow-right"></i>
        
    </button>

    <script>
        $(document).ready(function() {
            $('#start-test-btn').click(function() {
                // Redirect to test page
                window.location.href = 'mocktest_window.php';

            });

            if(<?php echo $total_questions ?> <= 0)
            {
                $("#start-test-btn").prop("disabled","true");
            }


        });

    </script>

</body>
</html>