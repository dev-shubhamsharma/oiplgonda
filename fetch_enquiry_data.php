<?php
// fetch_enquiry_data.php
// this file fetches enquiry data from the database and returns it as a JSON array



include "connection.php";

$sql = "SELECT enquiry_id, name, email_id, mobile_number from enquiry_table";

$result = $conn->query($sql);
$enquiries = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $enquiries[] = $row;
    }
}

echo json_encode($enquiries);
$conn->close();

?>
