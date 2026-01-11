<?php 

// save_website_settings.php
// This file saves the website settings sent via AJAX from website_settings.php

include "connection.php";

$exam_questions_limit = intval($_POST['exam_questions_limit']);
$exam_subject_name = $_POST['exam_subject_name'];
$mocktest_questions_limit = intval($_POST['mocktest_questions_limit']);

// Update exam_questions_limit
$sql1 = "UPDATE website_settings_table SET setting_value = ? WHERE setting_key = 'exam_questions_limit'";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $exam_questions_limit);
$stmt1->execute();
// Update exam_subject_name
$sql2 = "UPDATE website_settings_table SET setting_value = ? WHERE setting_key = 'exam_subject_name'";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $exam_subject_name);
$stmt2->execute();
// Update mocktest_questions_limit
$sql3 = "UPDATE website_settings_table SET setting_value = ? WHERE setting_key = 'mocktest_questions_limit'";
$stmt3 = $conn->prepare($sql3);
$stmt3->bind_param("i", $mocktest_questions_limit);
$stmt3->execute();
$stmt1->close();
$stmt2->close();
$stmt3->close();
$conn->close();
echo json_encode(array("status" => "Settings saved successfully"));


?>