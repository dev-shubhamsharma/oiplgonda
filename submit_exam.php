<?php


// submit_exam.php
// this file shows exam submission confirmation message
// and saves exam_attempted as 1 into db

session_start();
include "connection.php";

$user_id = $_SESSION["user_id"];
$sql = "UPDATE exam_details_table SET exam_attempted = 1, time_left_in_seconds = 0 WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();
$conn->close();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Exam | OIPL</title>

    <?php 

    include "libs/jquery.php";

    ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: whitesmoke;
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            padding: 50px 20px;
            text-align: center;
            border: 2px solid #091e94ff;
            border-radius: 10px;
            background-color: #fff;
        }

        .container img {
            width: 120px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 20px;
        }

    </style>
</head>
<body>
    
    <div class="container">
        <img src="images/logo.png" alt="OIPL logo">
        <h2>Your exam has been submitted successfully!</h2>
        <p>Thank you for taking the exam. You may now close this window.</p>

        <div class="wrapper" style="margin-top: 50px;">

            <button id="close-btn" style="padding: 10px 20px; background-color: rgb(37, 111, 196); color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Exit from Exam Window
            </button>
            
        </div>

    </div>
    

    <script>

        $(document).ready(function(){


            $("#close-btn").click(function(){
                window.location.href = "logout.php";
            });


        });

        



    </script>

</body>
</html>