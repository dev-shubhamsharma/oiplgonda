<?php
// load load_subjects_name.php



include "connection.php";

$sql = "SELECT subject_name 
        FROM subject_table";

$result = $conn->query($sql);
$subjects = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}

echo json_encode($subjects);
$conn->close();
?>
