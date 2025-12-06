<?php 

// update_mocktest_timer.php
// this script updates the mocktest timer into session that prevents timer to restart on page reload


session_start();

$seconds = $_POST["current_seconds"];
$minutes = $_POST["current_minutes"];


$seconds--;

$_SESSION["seconds"] = $seconds;

$response = [
    "seconds" => $_SESSION["seconds"],
    "minutes" => $minutes,
];

echo json_encode($response);




?>