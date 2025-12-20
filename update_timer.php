<?php

    session_start();
    $_SESSION["total_duration_in_seconds"] = $_SESSION["total_duration_in_seconds"] - 1;

?>