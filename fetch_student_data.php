<?php
// fetch_students.php



include "connection.php";

$sql = "SELECT student_id, student_name, mobile_number, email_id, verification_status, date_time 
        FROM student_registration_table";

$result = $conn->query($sql);
$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);
$conn->close();
?>
