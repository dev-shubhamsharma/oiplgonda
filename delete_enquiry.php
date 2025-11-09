<?php

// delete_enquiry.php
// this script deletes an enquiry from the database

include "connection.php";

if (isset($_POST['enquiry_id'])) {
    $enquiry_id = intval($_POST['enquiry_id']);
    $sql = "DELETE FROM enquiry_table WHERE enquiry_id = $enquiry_id";
    
    if ($conn->query($sql)) {
        echo "success";
    } else {
        echo "error";
    }
}

$conn->close();

?>
