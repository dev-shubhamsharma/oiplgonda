<?php
session_start();

if (!isset($_SESSION["test_completed"])) {
    header("Location: index.php");
    exit;
}

$name = $_SESSION["student_name"];
$testname = $_SESSION["testname"];
$score = $_SESSION["current_score"];
$date = date("d M Y");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mocktest Certificate | OIPL</title>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            background: #f5f5f5;
            font-family: Georgia, serif;
        }
        .certificate {
            width: 800px;
            padding: 40px;
            border: 10px solid #2B32B2;
            background: white;
            text-align: center;
        }
        h1 {
            color: #2B32B2;
        }
    </style>
</head>
<body>

<div class="certificate">
    <h1>Certificate of Completion</h1>
    <p>This is to certify that</p>
    <h2><?php echo htmlspecialchars($name); ?></h2>
    <p>has successfully completed</p>
    <h3><?php echo htmlspecialchars($testname); ?></h3>
    <p>Score: <strong><?php echo $score; ?></strong></p>
    <p>Date: <?php echo $date; ?></p>
</div>

</body>
</html>
