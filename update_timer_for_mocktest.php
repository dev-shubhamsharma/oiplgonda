<?php

// update_timer_for_mocktest.php

session_start();
// $seconds = $_POST["seconds"];

$_SESSION["total_duration_in_seconds"] =  $_SESSION["total_duration_in_seconds"] - 1;

echo json_encode($_SESSION["total_duration_in_seconds"]);


?>