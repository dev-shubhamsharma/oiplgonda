<?php
// fetch_questions.php
// this file fetches questions from the database and returns them in JSON format



include "connection.php";

$pageText = isset($_POST['pageText']) ? (int)$_POST['pageText'] : 1;
$pageText = max(1, $pageText);


$limit = 50;
$offset = ($pageText - 1) * $limit;



$sql = "SELECT question_id, subject_name, question, option_a, option_b, option_c, option_d, correct_answer
        FROM questions_table 
        order by question_id ASC
        LIMIT $limit offset $offset";

$result = $conn->query($sql);
$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}


$count_query = "Select COUNT(*) as total_rows from questions_table";

$count_result = $conn->query($count_query);
$total_rows = $count_result->fetch_assoc()['total_rows'];


echo json_encode([
    "page"=>$pageText,
    "limit"=>$limit,
    "total_rows"=>$total_rows,
    "questions"=>$questions
]);
$conn->close();
?>
