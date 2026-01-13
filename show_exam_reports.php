<?php

// show_exam_reports.php
// this file displays the exam reports of students to the admin


include "admin_only_validation.php";

include "connection.php";
// Fetch exam reports from the database
// (This is a placeholder query; actual implementation may vary)

$query = "SELECT user_id, user_name, COUNT(question_id) AS total_questions,
            SUM(CASE WHEN selected_answer IS NOT NULL AND selected_answer != '' THEN 1 ELSE 0 END) AS total_selected_answers,
            MAX(datetime) AS last_datetime  
          FROM exam_answers_table
          GROUP BY user_id";

$result = $conn->query($query);
$reports = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
}

// echo json_encode($reports);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Reports | OIPL</title>

    <?php 
    
    include "libs/font-awesome.php"; 
    include "libs/jquery.php";
    
    ?>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: whitesmoke;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .button {
            padding: 10px 20px;
            background-color: #203f8eff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: white;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background-color: whitesmoke;
            color: white;
            color: #333;
            
            border-bottom: 2px solid #ccc;
        }

        #heading {
            /* text-align: center; */
            /* margin: 10px; */
            /* padding: 20px; */
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #2B32B2;
            font-size: 35px;
            /* border-bottom: 2px solid #ccc; */
        }

        main {
            background-color: #fff;
            display: flex;
            /* gap: 20px; */
        }

        #left-section {
            width: 70%;
            /* border-right: 2px solid #ccc; */
            padding: 20px;
            background-color: whitesmoke;
        }

        #left-section .button-section {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            padding: 10px 30px;
            /* border: 1px solid #ccc; */
            background-color: whitesmoke;
        }

        #search-box {
            width: 60%;
            padding: 8px 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #left-section table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 20px;  
            overflow: hidden; 
        }

        thead th{
            background-color: #203f8eff;
            color: white;
            padding: 10px;
        }

        tr, td {
            border-bottom: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }
        

        td {
            padding: 10px;
            text-align: center;
        }

        .fa-trash {
            background-color: #e74c3c;
        }

        .fa-trash:hover {
            background-color: #962316;
        }

        .fa-eye {
            background-color: #27ae60;
        }

        .fa-eye:hover {
            background-color: #14521f;
        }

        .fa-download {
            background-color: #2980b9;
        }

        tbody tr:hover {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #right-section {
            background-color: whitesmoke;
            width: 30%;
            padding: 30px;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            /* margin: 20px 10px; */
        }

        

        #card-table {
            width: 100%;
            /* margin-top: 20px; */
            border: none;
        }

        #photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }

        #card-table tr, #card-table td {
            border: none;
            padding: 10px;
            font-size: 16px;
            text-align: left;
        }

        #card-table td:nth-child(1) {
            width: 50%;
        }

        #card-table tr:nth-child(4) {
            color: green;
        }

        #card-table tr:nth-child(5) {
            color: red;
        }

        #card-table tr:nth-child(4) td:nth-child(2) {
            background-color: rgba(0, 255, 0, 0.2);
        }

        #card-table tr:nth-child(5) td:nth-child(2) {
            background-color: rgba(255, 0, 0, 0.2);
        }

        #full-report-btn {
            background-color: #27ae60;
            width: 100%;
        }

        #full-report-btn:hover {
            background-color: #14521f;
        }

        .disabled {
            background-color: grey !important;
            cursor: not-allowed;
        }


    </style>



</head>
<body>
    <header>    
        <a href="admin_dashboard.php">
            <button class="button">&LeftArrow; Back</button>
        </a>
        <h1 id="heading">Student Examination Report</h1>

        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <main>
        <section id="left-section">
            <div class="button-section">
                <input type="text" name="search-box" id="search-box" placeholder="Search by Student Name or ID"/>
                <!-- <button class="button fa fa-refresh" title="Refresh list"></button> -->
                <button class="button fa fa-download" id="download-btn" title="Download Report">&nbsp;Download Report</button>
            </div>

            <table class="report-table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Total Questions</th>
                        <th>Attempted</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="table-body">

                    <!-- <tr>
                        <td>STU12345</td>
                        <td>John Doe</td>
                        <td>2024-06-15</td>
                        <td>85%</td>
                        <td>

                            <button class="button fa fa-eye">&nbsp;View</button>
                            <button class="button fa fa-trash"></button>
                        </td>
                    </tr> -->
                    
                    <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($report['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($report['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($report['total_questions']); ?></td>
                        <td><?php echo htmlspecialchars($report['total_selected_answers']); ?></td>
                        <!-- convert to date only DD-MM-YYYY -->
                        <td><?php echo htmlspecialchars( date ('d-m-Y', strtotime($report['last_datetime']))); ?></td>
                        <td>
                            <button class="button fa fa-eye view-btn" title="View Report" data-user-id="<?php echo htmlspecialchars($report['user_id']); ?>">&nbsp;View</button>
                            <button class="button fa fa-trash delete-btn" title="Delete Report" data-user-id="<?php echo htmlspecialchars($report['user_id']); ?>"></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>


                </tbody>

            </table>

        </section>

        <section id="right-section">

            <div class="card">
                
                <table id="card-table">
                    <tr>
                        <td colspan="2">
                            <img src="images/user.png" alt="student-photo" id="photo"/>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Student Name:</strong></td>
                        <td id="student-name">XXXXXX</td>
                    </tr>
                    <tr>
                        <td><strong>Total Questions:</strong></td>
                        <td id="total-questions">000000</td>
                    </tr>
                    <tr>
                        <td><strong>Correct Answers:</strong></td>
                        <td id="correct-answers">000000</td>
                    </tr>
                    <tr>
                        <td><strong>Wrong Answers:</strong></td>
                        <td id="wrong-answers">000000</td>
                    </tr>
                    <tr>
                        <td><strong>Unattempted:</strong></td>
                        <td id="unattempted">000000</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="button" id="full-report-btn">View Full Report</button>
                        </td>
                    </tr>
                </table>
            </div>

        </section>
    </main>

    <script>
        $(document).ready(function(){

            $("#full-report-btn").attr("disabled", true);
            $("#full-report-btn").addClass("disabled");

            $(".view-btn").click(function(){
                var userId = $(this).data("user-id");
                // alert("View report for User ID: " + userId);
                loadReportDetails(userId);

                // Implement AJAX call to fetch and display the report details
            });

            $(".delete-btn").click(function(){
                var userId = $(this).data("user-id");
                if (confirm("Are you sure you want to delete the report for User ID: " + userId + "?")) {
                    alert("Report deleted for User ID: " + userId);
                    // Implement AJAX call to delete the report
                }
            });



            var total_questions = 0, correct_answers = 0, wrong_answers = 0, unattempted_questions = 0;

            function loadReportDetails(userId) {
                // using ajax to fetch report details
                $.ajax({
                    url: 'fetch_exam_report_details.php',
                    type: 'POST',
                    data: { user_id: userId },
                    success: function(response) {
                        console.log(response);
                        var data = JSON.parse(response);
                        console.log(data.user_name);

                        // populate the right section with data
                        $("#student-name").text(data.user_name);
                        
                        total_questions = data.total_questions;
                        $("#total-questions").text(data.total_questions);

                        correct_answers = data.correct_answers;
                        $("#correct-answers").text(correct_answers);

                        wrong_answers = data.attempted_questions - data.correct_answers;
                        $("#wrong-answers").text(wrong_answers);

                        unattempted_questions = data.total_questions - data.attempted_questions;
                        $("#unattempted").text(unattempted_questions);

                        $("#full-report-btn").attr("disabled", false);
                        $("#full-report-btn").removeClass("disabled");
                        $("#full-report-btn").data("user-id", userId);
                    },
                    error: function() {
                        alert("An error occurred while fetching report details.");
                    }
                });

            }

            $("#full-report-btn").click(function(){
                var studentName = $("#student-name").text();
                
                var userId = $(this).data("user-id");
                // open in new tab
                window.open("detailed_exam_report.php?user_id=" + userId+"&total="+total_questions+"&correct="+correct_answers+"&wrong="+wrong_answers+"&unattempt="+unattempted_questions, "_blank");
                
            });



        });


    </script>


</body>
</html>