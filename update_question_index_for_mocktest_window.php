<?php 
    // update_question_index_for_mocktest_window.php
    session_start();


    // echo $_SESSION['current_question_index'];

    if (isset($_POST['action']) && $_POST['action'] === 'next') {
        $_SESSION['current_question_index'] = isset($_SESSION['current_question_index']) ? $_SESSION['current_question_index'] + 1 : 0;
    } elseif (isset($_POST['action']) && $_POST['action'] === 'prev') {
        $_SESSION['current_question_index'] = isset($_SESSION['current_question_index']) && $_SESSION['current_question_index'] > 0 ? $_SESSION['current_question_index'] - 1 : 0;
    }

    echo $_SESSION['current_question_index'];


?>