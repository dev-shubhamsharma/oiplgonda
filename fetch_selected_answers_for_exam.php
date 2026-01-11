<?php
// fetch_selected_answers_for_exam.php
// this file fetches all selected answers of the user in the current exam

session_start();
include "connection.php";

$user_id = $_SESSION["user_id"];

if(isset($_POST["question_index"])){
    $question_index = $_POST["question_index"];
    $question_ids = $_SESSION["exam_question_ids"];
    $question_id = $question_ids[$question_index];
} else {
    echo json_encode(array("error" => "Question index not provided"));
    exit();
}

$sql_query = "SELECT selected_answer FROM exam_answers_table WHERE user_id = ? AND question_id = ?";

$stmt = $conn->prepare($sql_query);
$stmt->bind_param('ii', $user_id, $question_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

header("Content-Type: application/json");
echo json_encode($row);

?>