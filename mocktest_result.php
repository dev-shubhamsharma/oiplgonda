<?php 

session_start();

unset($_SESSION["testname"]);
unset($_SESSION["subject_name"]);
unset($_SESSION["question_ids"]);
unset($_SESSION["current_question_index"]);

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

    #go-dashboard-btn {
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

    #go-dashboard-btn:hover {
        background: linear-gradient(to left, #332dec, #17138fff)
    }




</style>



<body>

    <main>
        <div class="left-section">

            <h2>Your Result</h2>

            <div class="circle"></div>

            <p id="score">15</p>
            <p id="total-para"> of <span id="total-score">100</span></p>

            <p id="comment">You scored 56%</p>

        </div>

        <div class="right-section">

            <h3>Summary</h3>

            <p>Total Questions : <span id="total-questions">100</span></p>
            <p>Attempted : <span id="attempted-questions">80</span></p>
            <p>Correct Answered : <span id="correct">10</span></p>
            <p>Wrong Answered : <span id="wrong">15</span></p>


            <button id="go-dashboard-btn">Go to dashboard</button>

        </div>
    </main>



</body>
</html>