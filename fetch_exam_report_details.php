<?php 
// fetch_exam_report_details.php
// this file fetches the exam report details for a given user id


include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // fetch total questions and attempted questions
    $sql_query1 = "select user_name, COUNT(question_id) AS total_questions, COUNT(CASE WHEN selected_answer IS NOT NULL AND selected_answer != '' THEN 1 END) as attempted_questions FROM exam_answers_table where user_id = ? group by user_id";

    // fetch correct answers and wrong answers
    $sql_query2 = "SELECT COUNT(*) AS correct_answers FROM exam_answers_table WHERE user_id = ? AND selected_answer = (SELECT correct_answer FROM questions_table WHERE question_id = exam_answers_table.question_id)";

    $response = [];

    $stmt = $conn->prepare($sql_query1);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array_merge($response, $row);
        $flag1 = true;
    } else {
        echo json_encode(array("error" => "No report found"));
    }

    $stmt2 = $conn->prepare($sql_query2);
    $stmt2->bind_param('i', $user_id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $response = array_merge($response, $row2);
        $flag2 = true;
    }

    if($flag1 && $flag2) {
        echo json_encode($response);
    }


} else {
    echo json_encode(array("error" => "Invalid request"));
}



?>