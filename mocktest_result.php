<?php 
session_start();

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["subject_name"])) {
    header("Location: logout.php");
    exit;
}
include "libs/jquery.php";
include "libs/font-awesome.php";
include "libs/google-font.php";

include "connection.php";

$user_id        = $_SESSION["user_id"];
$user_name      = $_SESSION["user_name"];
$subject_name   = $_SESSION["subject_name"];
$total_questions = $_SESSION["total_questions"];

// stores time in seconds
$total_time_taken = get_total_time_taken($conn, $user_id, $subject_name);



// ---------- FUNCTIONS ----------
function get_current_score($conn, $user_id, $subject_name) {
    $sql = "SELECT COUNT(*) AS correct_answers 
            FROM mocktest_answers m 
            JOIN questions_table q 
                ON m.question_id = q.question_id
            WHERE m.user_id = ? AND m.subject_name = ? 
                AND m.selected_answer = q.correct_answer";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $subject_name);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc()["correct_answers"] ?? 0;
}

function get_total_attempted($conn, $user_id, $subject_name) {
    $sql = "SELECT COUNT(*) AS attempted FROM mocktest_answers 
            WHERE user_id = ? AND subject_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $subject_name);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc()["attempted"] ?? 0;
}

function get_wrong_answer($conn, $user_id, $subject_name) {
    $sql = "SELECT COUNT(*) AS wrong_answers 
            FROM mocktest_answers m 
            JOIN questions_table q ON m.question_id = q.question_id
            WHERE m.user_id = ? AND m.subject_name = ? 
                AND m.selected_answer != q.correct_answer";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $subject_name);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc()["wrong_answers"] ?? 0;
}


function get_total_time_taken($conn, $user_id, $subject_name) {

    $sql = "SELECT 
                MIN(datetime) AS start_time,
                MAX(datetime) AS end_time
            FROM mocktest_answers 
            WHERE user_id = ? AND subject_name = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $subject_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();  
    echo "<script>console.log('Start Time: " . $row['start_time'] . "');</script>";
    echo "<script>console.log('End Time: " . $row['end_time'] . "');</script>";
    
    if (!$row['start_time'] || !$row['end_time']) {
        return 0;
    }

    $start = strtotime($row['start_time']);
    $end   = strtotime($row['end_time']);
    $total_seconds = $end - $start;

    return $total_seconds;
}


function save_user_for_ranking($conn, $user_id, $user_name, $subject_name, $attempted, $correct, $total_time_taken) {

    $check = $conn->prepare("SELECT * FROM ranking_table WHERE user_id = ? AND subject_name = ?");
    $check->bind_param("is", $user_id, $subject_name);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Update existing record
        $update = $conn->prepare("UPDATE ranking_table 
            SET questions_attempted = ?, correctly_answered = ?, total_time_taken = ? 
            WHERE user_id = ? AND subject_name = ?");
        $update->bind_param("iiiss", $attempted, $correct, $total_time_taken, $user_id, $subject_name);

        if ($update->execute()) {
            echo "<script>console.log('Ranking updated');</script>";
        }

    } else {
        // Insert new record
        $insert = $conn->prepare("INSERT INTO ranking_table 
            (user_id, user_name, subject_name, questions_attempted, correctly_answered, total_time_taken) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $insert->bind_param("issiis", $user_id, $user_name, $subject_name, $attempted, $correct, $total_time_taken);

        if ($insert->execute()) {
            echo "<script>console.log('Ranking inserted');</script>";
        }
    }
}


// ---------- GET RESULTS ----------
$score           = get_current_score($conn, $user_id, $subject_name);
$total_attempted = get_total_attempted($conn, $user_id, $subject_name);
$wrong_answers   = get_wrong_answer($conn, $user_id, $subject_name);
$correct_answers = $score;

// Save ranking
save_user_for_ranking($conn, $user_id, $user_name, $subject_name, $total_attempted, $score, $total_time_taken);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocktest Result | OIPL</title>
</head>

<style>

    * {
        margin:0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        min-width: 100vw;
        min-height: 100vh;
        display: grid;
        place-items: center;
        background-color: #ddd;

    }

    main 
    {
        width: 80%;
        height: 70%;
        border-radius: 20px;
        background-color: whitesmoke;
        display: flex;
        width: 50%;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .left-section {
        background: linear-gradient(to top,#332dec, #6140fb) ;
        width: 50%;
        padding: 50px;
        text-align: center;
        color: #eee;
        border-radius: 20px;
    }

    .left-section h2 {
        font-size: 35px;
    }

    .circle 
    {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin: auto;
        background: linear-gradient(to bottom, #2b25ccff, #6140fb) ;
        margin: 40px auto;
        position: relative;
    }

    #score {
        font-size: 80px;
        transform: translateY(-200px);
        /* font-weight: bold; */
    }

    #total-para {
        transform: translateY(-200px);
        color:lightgray;
    }

    #comment {
        transform: translateY(-100px);
        font-weight: bold;
        font-size: 25px;
    }

    .right-section {
        display: flex;
        flex-direction: column;
        padding: 50px;
        justify-content: flex-start;
        gap: 15px;
        /* border: 1px solid green; */
        width: 50%;
    }

    .right-section p 
    {
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
        border-radius: 20px;
        background-color: #def;
        width: 100%;
    }

    .right-section p:nth-child(4)
    {
        color: green;
    }


    .right-section p:nth-child(5)
    {
        color: red;
    }

    #continue-btn {
        background: linear-gradient(to right, #332dec, #17138fff);
        padding: 10px 20px;
        border-radius: 20px;
        border: none;
        font-size: 17px;
        color:#eee;
        text-transform: capitalize;
        margin-top: 50px;
        cursor: pointer;
        transition-duration: 500ms;
    }

    #continue-btn:hover {
        background: linear-gradient(to left, #332dec, #17138fff)
    }

    @media screen and (max-width: 500px) {

        body {
            padding: 30px;
            display: block;
        }

        main {
            /* margin: 30px auto; */
            flex-direction: column;
            height: auto;
            width: 100%;
            margin: 0px;
            font-size: 1.2rem;
            /* border: 1px solid red; */
        }

        .left-section, .right-section {
            width: 100%;
            height: 490px;
            border-radius: 20px;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .right-section {
            padding: 30px;
            gap: 20px;
        }

        button#continue-btn {
            margin-bottom: 30px;
        }

    }




</style>



<body>

    <main>
        <div class="left-section">

            <h2>Your Result</h2>

            <div class="circle"></div>

            <p id="score"><?php echo $score; ?></p>
            <p id="total-para"> of <span id="total-score"><?php echo $total_questions ?></span></p>

            <p id="comment">You scored <?php echo round(($score/$total_questions*100))."%"; ?></p>

        </div>

        <div class="right-section">

            <h3>Summary</h3>

            <p>Total Questions : <span id="total-questions"><?php echo $total_questions; ?></span></p>
            <p>Attempted : <span id="attempted-questions"><?php echo $total_attempted; ?></span></p>
            <p>Correct Answered : <span id="correct"><?php echo $correct_answers; ?></span></p>
            <p>Wrong Answered : <span id="wrong"><?php echo$wrong_answers; ?></span></p>


            <button id="continue-btn">Continue</button>

        </div>
    </main>


    <script>
        $('document').ready(function(){
            
            $("#continue-btn").click(function(){
                window.location.href="logout.php";
            });



            //prevent browser back button for questions            
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                window.location.href = "logout.php";
            };





        });


    </script>


</body>
</html>