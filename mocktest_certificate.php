<?php
session_start();

$name = $_SESSION["user_name"];
$testname = $_SESSION["subject_name"];
$score = $_SESSION["score"];
$date = date("d M Y");



if(!isset($name) || !isset($testname) || !isset($score)) {
    die("Required session data is missing.");
}







?>
<!DOCTYPE html>
<html>
<head>
    <title>Mocktest Certificate | OIPL</title>
    <style>
        body {
            /* display: grid; */
            /* place-items: center; */
            /* height: 100vh; */
            background: #f3f1f1ff;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .certificate {
            width: 800px;
            padding: 20px 80px;
            border: 10px solid #00a7e8;
            background: white;
            text-align: center;
            margin: 40px auto;
            color: #444;
        }

        #logo {
            width: 100px;
            margin-top: 10px;
        }

        h1 {
            color: #00a7e8;
            font-size: 3rem;

        }

        h3 {
            font-size: 2.5rem;
            margin: 5px 0;
            text-transform: capitalize;
            color: #333;
        }

        p {
            font-size: 1.2rem;
            margin: 20px 20px;
            line-height: 40px;
        }

        strong {
            color: #000;
        }

        @media screen and (max-width: 850px) {
            .certificate {
                width: 80%;
                padding: 15px 20px;
                margin: 40px auto;
            }

            #logo {
                width: 80px;
            }

            h1 {
                font-size: 2.5rem;
            }

            h3 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
                line-height: 30px;
            }
        }
    </style>
</head>
<body>

<div class="certificate">
    <img src="images/logo.png" alt="oipl_logo" id="logo">
    <h1>Certificate of Appreciation</h1>
    <p>This certificate is awarded to</p>
    <h3><?php echo htmlspecialchars($name); ?></h3>
    <p>
        for successfully completing <br>the online mock test on subject

        <span style="font-style: italic; color: green; font-weight: bold;"><?php echo htmlspecialchars($testname); ?></span>
        with <br>a score of <strong style='color:green'><?php echo $score; ?> / <?php echo $_SESSION["total_questions"]; ?></strong> and 
        achieved a grade of (
        <strong style="color:green;">
            <?php
            $percentage = ($score / $_SESSION["total_questions"]) * 100;
            if ($percentage >= 85) {
                echo "S";
            } elseif ($percentage >= 75) {
                echo "A";
            } elseif ($percentage >= 65) {
                echo "B";
            } elseif ($percentage >= 55) {
                echo "C";
            } elseif ($percentage >= 50) {
                echo "D";
            }
            else {
                echo "F";
            }
            ?>
        </strong>
        ) on date <strong><?php echo $date; ?></strong>.

    </p>

    <p style="font-size: 1rem; color:#777; font-style: italic">This certificate is computer generated and does not require a signature.</p>
</div>

</body>
</html>


<?php 

// Clear session data related to mock test
session_destroy();


?>
