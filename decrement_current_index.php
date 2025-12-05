<?php 

session_start();


$current_question_index = $_SESSION["current_question_index"];

$_SESSION["current_question_index"] = $current_question_index - 1;
echo $_SESSION["current_question_index"];



?>