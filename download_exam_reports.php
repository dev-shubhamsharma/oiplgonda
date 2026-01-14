<?php 

// download_exam_reports.php
// this file allows downloading of exam reports as a CSV file

session_start();
if(!isset($_SESSION["user_id"]) or $_SESSION["user_id"] == "")
{
    header("location:login.php");
    exit();
}

include "connection.php";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=exam_reports.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('User ID', 'Exam Date', 'Score', '
Total Questions', 'Correct Answers'));
$sql_query = "SELECT user_id, exam_date, score, total_questions, correct_answers 
              FROM exam_reports_table 
              WHERE user_id = ?";
$stmt = $conn->prepare($sql_query);
$stmt->bind_param('i', $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}
fclose($output);




?>