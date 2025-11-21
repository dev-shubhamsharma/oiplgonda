<?php
// fetch_questions.php
// this file fetches questions from the database and returns them in JSON format



include "connection.php";

$sql = "SELECT question_id, subject_name, question 
        FROM questions_table";

$result = $conn->query($sql);
$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

echo json_encode($questions);
$conn->close();
?>
