<?php 

// delete_student.php

include "connection.php";

if (isset($_POST['student_id'])) {

    $student_id = intval($_POST['student_id']);
    $sql = "DELETE FROM student_registration_table WHERE student_id = $student_id";
    
    if ($conn->query($sql)) {
        echo "success";
    } else {
        echo "error";
    }
}

$conn->close();


?>