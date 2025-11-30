<?php

// mocktest_instructions.php
session_start();
$current_year = date("Y");
// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}   

$testname = isset($_GET['testname']) ? $_GET['testname'] : 'no_test';



// this script will fetch total questions and time duration from database based on basic of subject name
if($testname == 'no_test'){
    echo "<h2>Error: No test selected.</h2>";
    exit();
}

if(!in_array($testname, ['it_tools', 'web_design', 'python', 'iot'])) {
    echo "<h2>Error: Invalid test selected.</h2>";
    exit();
}

if($testname == 'it_tools') {
    $display_testname = "IT Tools";
} elseif ($testname == 'web_design') {
    $display_testname = "Web Design";
} elseif ($testname == 'python') {
    $display_testname = "Python";
} elseif ($testname == 'iot') {
    $display_testname = "IoT";
} else {
    $display_testname = "Unknown Test";
}

if(!isset($_SESSION['testname'])) {
    $_SESSION['testname'] = $testname;
} else {
    $_SESSION['testname'] = $testname;
}

if(!isset($_SESSION['test_started'])) {
    $_SESSION['test_started'] = false;
}

if(!isset($_SESSION['test_completed'])) {
    $_SESSION['test_completed'] = false;
}

if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if(!isset($_SESSION['time_left'])) {
    $_SESSION['time_left'] = 30 * 60; // 30 minutes in seconds
}

include "connection.php";

// include count function
$sql = "SELECT COUNT(*) AS total_questions FROM questions_table WHERE subject_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $display_testname);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_questions = $row['total_questions'];
} else {
    $total_questions = 0;
}
$stmt->close();
$conn->close(); 

// assuming each question has 0.5 minutes


$_SESSION["total_questions"] = $total_questions;

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
        <li>Total Questions: <?php echo $total_questions ?></li>
        <li>Time Duration: 
            
        <?php 
            // assuming each question has 1.5 minutes
            $time_duration = $total_questions * 0.5; 
            echo $time_duration;
        ?>         minutes</li>
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
                window.location.href = 'mocktest_window.php?testname=<?php echo $_SESSION["testname"]; ?>';

            });
        });

    </script>

</body>
</html>