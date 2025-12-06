<?php 
// set into session for access
session_start();

$testname = $_GET["testname"];


$total_questions = 0;
$total_duration_in_minutes = 0;


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
// echo $testname;
// echo $_SESSION["testname"];
$_SESSION["subject_name"] = $subject_name;

// echo $testname ;
// echo $subject_name;

include "connection.php";

$query = "select COUNT(*) as total_rows from questions_table where subject_name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$subject_name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$total_questions = $row['total_rows'];

// set into session to access on other page 

$_SESSION["total_questions"] = $total_questions;
$_SESSION["total_duration_in_minutes"] = $total_questions * 0.5;
// echo $total_questions;



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
            echo $_SESSION["total_duration_in_minutes"] ;
            ?>    
            minutes
        </li>
        <li>Each question carries 1 mark</li>
        <li>No negative marking for wrong answers</li>
        <li>Do not refresh the page during the test</li>
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
        });

    </script>

</body>
</html>