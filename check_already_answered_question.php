<?php 

// check_already_answered_question.php
// this script checks that if question is already answered and returns saved results back

include 'connection.php';

session_start();

$user_id = $_SESSION['user_id'];
$question_index = $_SESSION["current_question_index"];

// Get the question ID from session
$question_id = $_SESSION["question_ids"][$question_index];

echo "user id is $user_id<br>";
echo "question id is $question_id<br>";

$query = 'SELECT selected_answer 
          FROM mocktest_answers 
          WHERE user_id = ? AND question_id = ?';

$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $user_id, $question_id);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    echo "number of rows".$result->num_rows;
    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        echo $row['selected_answer'];
        // echo $row['selected_answer'];
    } 
    else {
        echo "no previous data found";
    }
} 
else {
    echo "database query failed";
}

?>
