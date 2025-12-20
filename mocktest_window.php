<?php
    session_start();
    include "connection.php";



    $testname = $_SESSION["testname"];
    $subject_name = $_SESSION["subject_name"];
    $total_questions = $_SESSION["total_questions"];
    $total_duration_in_minutes = $_SESSION["total_duration_in_minutes"];
    $total_duration_in_seconds = $_SESSION["total_duration_in_seconds"];
    $question_ids = $_SESSION["question_ids"];
    echo implode(",", $question_ids);
    echo "Total Seconds".$total_duration_in_seconds;

    $_SESSION["current_question_index"] = 0;
    $current_question_index = $_SESSION["current_question_index"];
    

    $_SESSION["current_score"] = 0;

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocktest | OIPL</title>

    <?php

        include "libs/jquery.php";
        include "libs/font-awesome.php";    
        include "libs/google-font.php";
    ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            user-select: none;
        }

        


        body {
            background: linear-gradient(to right, #1488CC, #2B32B2);
            display: grid;
            place-items: center;
            /* min-height: 100vh; */
        }

        main {
            width: 70%;
            background-color: white;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
            border-radius: 10px;
            font-size: 1.2rem;
            color: #555;
        }

        #title-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #aaa;
            padding: 10px 30px;
        }


        #question-section {
            padding: 0 30px;
        }

        #bottom-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            border-top: 2px solid #aaa;
            padding: 20px 30px;
        }

        #save-next-btn {
            padding: 10px 20px;
            background-color: #007bffff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #save-next-btn:hover {
            background-color: #005bb5ff;
        }



        .option-container {
            display: block;
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
            cursor: pointer;
            transition: background-color 0.1s ease, border-color 0.1s ease;
        }

        .option-container:hover {
            background-color: #cdcfd1ff;
            border-color: #787b7eff;
        }

        /* .option-container:hover {
            background-color: lightgreen;
            border-color: #12800eff;
        } */

        input[type="radio"] {
            display: none;
        }



        .selected-answer,.correct-answer {
            /* font-weight: 600; */
            background: lightgreen !important;
            border-color: #12800eff !important;
        }

        .wrong-answer {
            background: #ff7f7f !important;
            border-color: #ff0000ff !important;
        }

        #question {
            margin: 15px 0;
            font-weight: 500;
            color: #222;
        }

        #question-text {
            text-align: justify;
        }

        #option-a-text, #option-b-text, #option-c-text, #option-d-text {
            /* margin-left: 10px; */
            color:#222;
        }

        #timer {
            padding: 5px 10px;
            background-color: rgba(206, 17, 17, 0.27);
            border-radius: 6px;
            color: darkred;
        }


        @media (max-width: 600px) {
            main {
                width: 90%;
                font-size: 1rem;
                margin: 50px 0;
                min-height: auto;
                height: auto;
            }

            #title-container {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            #bottom-container {
                flex-direction: column-reverse;
                align-items: center;
                gap: 10px;
            }

            #save-next-btn {
                width: 100%;
            }
        }
        


    </style>


</head>
<body>

    <main>

        <div id="title-container">
            <h2 id="title-text">IT Tools and Network</h2>
            <h3 style="color:green;">Score : <span id="score">0</span></h3>
            <p id="timer">Time left : <span id="time-left">0</span></p>
        </div>

        <section id="question-section">

            <p id="question">
                <span id="question-count">0.</span>
                <span id="question-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat enim facilis id vero quis ipsa. Minus blanditiis accusantium voluptas magnam quaerat quisquam nesciunt, dolorem impedit, molestias incidunt deleniti optio ipsam!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</span>
            </p>

            <input type="radio" name="option" id="option-a" value="">
            <label for="option-a" class="option-container" id="option-a-text">
                Option 1
            </label>

            <input type="radio" name="option" id="option-b" value="">
            <label for="option-b" class="option-container" id="option-b-text">
                Option 2
            </label>

            <input type="radio" name="option" id="option-c" value="">
            <label for="option-c" class="option-container" id="option-c-text">
                Option 3
            </label>

            <input type="radio" name="option" id="option-d" value="">
            <label for="option-d" class="option-container" id="option-d-text">
                Option 4
            </label>
                
        </section>

        <div id="bottom-container">
            <p>
                Question <span id="question-progress">0.</span> 
                of <span id="total-questions"><?php echo $total_questions; ?></span>
            </p>
            <button id="save-next-btn">Save & Next</button>
        </div>

    </main>



    <script>

        $(document).ready(function(){

            // load first question and start timer
            loadQuestion();
            // startTimer();
            
            $(".option-container").click(function(){
                $(".option-container").removeClass("selected-answer");
                $(this).addClass("selected-answer");

            });


            $("#save-next-btn").click(function(){
                
                let selected_answer = $("input[name='option']:checked").val();
                console.log("Selected Answer: ", selected_answer);
                if(!selected_answer){
                    alert("Please select an answer before proceeding.");
                    return;
                }

                $.ajax({
                    url: 'fetch_correct_answer_for_mocktest.php',
                    method: 'POST',
                    data: { selected_answer: selected_answer },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if(response.error){
                            alert(response.error);
                        } else {
                            let correct_answer = response.correct_answer;
                            if(selected_answer === correct_answer){
                                console.log("Correct Answer!");
                                $(".selected-answer").addClass("correct-answer");
                                // Increment score logic here
                                $("#score").text( parseInt($("#score").text()) + 1 );
                            } else {
                                $(".selected-answer").addClass("wrong-answer");
                                // Highlight correct answer
                                $("input[value='" + correct_answer + "'] + .option-container").addClass("correct-answer");
                            }

                            setTimeout(function(){
                                // Load next question
                                if(parseInt($("#question-progress").text()) >= <?php echo $total_questions; ?>){
                                    // alert("Mock Test Completed! Your final score is: " + $("#score").text());
                                    // go to certificate page
                                    $(location).attr('href', 'mocktest_certificate.php');
                                    
                                    // return;
                                }

                                loadQuestion();
                                clearSelectionAndHighlights();
                            }, 1000);
                            
                            // Load next question logic here
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching correct answer:", error);
                    }
                });

            });


            // clear selection and highlights when loading new question
            function clearSelectionAndHighlights(){
                $("input[name='option']").prop('checked', false);
                $(".option-container").removeClass("selected-answer correct-answer wrong-answer");
            }



        });






        function loadQuestion(){
            // Load question logic here
            $.ajax({
                url: 'fetch_question_for_mocktest.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {

                    // console.log(response);
                    $("#question-count").text( parseInt($("#question-count").text()) + 1 +". ");
                    $("#question-progress").text( parseInt($("#question-progress").text()) + 1);
                    $("#question-text").text(response.question);

                    $("#option-a").val(response.option_a);
                    $("#option-b").val(response.option_b);
                    $("#option-c").val(response.option_c);
                    $("#option-d").val(response.option_d);

                    $("#option-a-text").text(response.option_a);
                    $("#option-b-text").text(response.option_b);
                    $("#option-c-text").text(response.option_c);
                    $("#option-d-text").text(response.option_d);

                    // after loading last question disable save & next button
                    if(parseInt($("#question-progress").text()) >= <?php echo $total_questions; ?>){
                        $("#save-next-btn").text("Finish Test");
                    }


                },
                error: function(xhr, status, error) {
                    console.error("Error fetching question:", error);
                }
            });
        }



        function startTimer(){
            let total_seconds = <?php echo $total_duration_in_seconds; ?>;
            let time_left = total_seconds;

            let timer_interval = setInterval(function(){
                if(time_left <= 0){
                    clearInterval(timer_interval);
                    alert("Time's up! The test will be submitted automatically.");
                    // Here you can add code to submit the test automatically
                } else {
                    time_left--;
                    $("#time-left").text(time_left + " seconds");
                    $.ajax({
                        url: 'update_timer.php',
                        method: 'POST',
                        data: { remaining_time: time_left },
                        success: function(response) {
                            // Timer updated successfully on the server
                        }
                    });
                }
            }, 1000);
        }


    </script>

</body>
</html>