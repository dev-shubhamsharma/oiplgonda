<?php

include "../connection.php";


$subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$sql = "SELECT question_id, subject_name, question, option_a, option_b, option_c, option_d, correct_answer
        FROM questions_table
        WHERE subject_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();
$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

echo json_encode($questions);
$conn->close();
?>