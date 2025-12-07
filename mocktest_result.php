<?php 

    session_start();

    // unset($_SESSION["testname"]);
    // unset($_SESSION["subject_name"]);
    // unset($_SESSION["question_ids"]);
    // unset($_SESSION["current_question_index"]);

    $user_id = $_SESSION["user_id"];
    $subject_name = $_SESSION["subject_name"];


    include "libs/jquery.php";
    include "libs/font-awesome.php";
    include "libs/google-font.php";

    $score = 0;
    $total_questions = $_SESSION["total_questions"];
    $total_attempted = 0;
    $correct_answers = $score;
    $wrong_answers = 0;

    $score = get_current_score();
    $total_attempted = get_total_attempted();
    $wrong_answers = get_wrong_answer();
    $correct_answers = $score;


    function get_current_score() {

        include "connection.php";

        $correct_answer_query = "SELECT COUNT(*) AS correct_answers FROM mocktest_answers AS m JOIN questions_table AS q ON m.question_id = q.question_id WHERE m.user_id = ? AND m.subject_name =? AND m.selected_answer = q.correct_answer";

        // echo $GLOBALS["user_id"];

        $stmt = $conn->prepare($correct_answer_query);
        $stmt->bind_param('is',$GLOBALS["user_id"],$GLOBALS["subject_name"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if($row) 
        {
            return $row["correct_answers"];
        }
        return 0;


    }


    function get_total_attempted() 
    {
        include "connection.php";

        $attempted_query = "SELECT COUNT(*) AS attempted_questions FROM mocktest_answers WHERE user_id = ? and subject_name = ?";
        $stmt = $conn->prepare($attempted_query);

        $stmt->bind_param('is',$GLOBALS["user_id"],$GLOBALS["subject_name"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if($row)
        {
            return $row["attempted_questions"];
        }
        return 0;
    }

    function get_wrong_answer()
    {
        include "connection.php";

        $wrong_answer_query = "SELECT COUNT(*) AS wrong_answers FROM mocktest_answers AS m JOIN questions_table AS q ON m.question_id = q.question_id WHERE m.user_id = ? AND m.subject_name =? AND m.selected_answer != q.correct_answer";

        $stmt = $conn->prepare($wrong_answer_query);
        $stmt->bind_param('is',$GLOBALS["user_id"],$GLOBALS["subject_name"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if($row) 
        {
            return $row["wrong_answers"];
        }
        return 0;
    }



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