<?php 

    session_start();


    if(!isset($_SESSION["question_ids"]) || !isset($_SESSION["user_id"])) {
        // redirect to test selection page
        header("Location: login.php");
        exit();
    }

    // print_r($_SESSION["question_ids"]);
    


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
            min-height: 100vh;
        }

        main {
            /* margin-top: 40px; */
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

        #save-next-btn:disabled {
            background-color: #666;
            cursor:not-allowed;
        }

        .finish-btn {
            padding: 10px 20px;
            background-color: #db3e3eff !important;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #finish-btn:hover {
            background-color: #b31b1bff;
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
            background-color: #79afe6f1;
            border-color: #0a3d70ff;
        }

        /* .option-container:hover {
            background-color: lightgreen;
            border-color: #12800eff;
        } */

        input[type="radio"] {
            display: none;
        }

        input[type='radio']:checked + label {
            background: lightgreen ;
            border-color: #12800eff ;
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
                Question <span id="question-progress">0</span> 
                of <span id="total-questions">0</span>
            </p>
            <button id="save-next-btn">Save & Next</button>
        </div>

    </main>

    <script>

        $(document).ready(function(){
            //  disable save btn until question does not load
            $("#save-next-btn").prop("disabled","true");

            loadQuestion();
            startTimer();

            $("#save-next-btn").click(function(){
                // disable button until answer is not checked
                $("#save-next-btn").prop("disabled","true");
                saveAndNext();
                
            });

            $("#score").text(<?php echo $_SESSION["score"]; ?>);


        });



        function loadQuestion() {
            $.ajax({
                url: 'fetch_question_for_mocktest.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    console.log("question id is : "+response.question_id);

                    $("#question-count").text(response.question_number+". ");
                    $("#question-progress").text(response.question_number);

                    totalQuestions = <?php echo $_SESSION["total_questions"]; ?>;

                    $("#total-questions").text(totalQuestions);

                    $("#question-text").text(response.question);

                    $("#option-a").val(response.option_a);
                    $("#option-b").val(response.option_b);
                    $("#option-c").val(response.option_c);
                    $("#option-d").val(response.option_d);

                    $("#option-a-text").text(response.option_a);
                    $("#option-b-text").text(response.option_b);
                    $("#option-c-text").text(response.option_c);
                    $("#option-d-text").text(response.option_d);


                    $("#save-next-btn").removeAttr("disabled");

                    // on loading of last question finish the test
                    if(response.question_number == totalQuestions)
                    {
                        console.log("Last question");

                        $("#save-next-btn").text("Finish Test");
                        $("save-next-btn").addClass("finish-btn");

                        // $("#save-next-btn").addClass("finish-btn");
                    }


                },
                error: function(xhr,status,error){
                    console.log(xhr,status,error);
                }
            });

        }


        function startTimer() {

            totalQuestions = <?php echo $_SESSION["total_questions"]; ?>;
            seconds = totalQuestions * 30;

            timer = setInterval(function(){
                if(seconds == 0)
                {
                    clearInterval(timer);
                    finishTest();
                }

                $.ajax({
                    url:'update_timer_for_mocktest.php',
                    method:'post',
                    dataType:'json',
                    success:function(response){
                        seconds = response;
                        // console.log(response);
                        $("#time-left").text(seconds+"s");
                    },
                    error:function(xhr,status,error){
                        console.log(xhr,status,error);
                    }
                });

            },1000);
            
            
            
            
        }

        function finishTest() {
            alert("We are redirecting to result page.....")
            window.location.href = "mocktest_certificate.php";
        }



        function saveAndNext() {
            selectedAnswer = $("input[name='option']:checked").val();
            console.log("Selected Answer is : "+selectedAnswer);

            if(selectedAnswer == null || selectedAnswer == undefined || selectedAnswer == "") {
                alert("Please select an answer!!");
                // enable save and next button
                $("#save-next-btn").removeAttr("disabled");
                return;
            }

            // fetch correct answer from database
            $.ajax({
                url:'fetch_correct_answer_for_mocktest.php',
                method:'POST',
                data: {selected_answer:selectedAnswer},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    correctAnswer = response.correct_answer;
                    console.log("correct answer is : "+correctAnswer);
                    if(selectedAnswer == correctAnswer)
                    {
                        // add correct-answer class to radio button label
                        $("input[type='radio']:checked + label").addClass("correct-answer");
                        
                        // update score if answer is correct
                        $("#score").text(response.score); 

                    }
                    else
                    {
                        // add wrong-answer class to radio button label
                        $("input[type='radio']:checked + label").addClass("wrong-answer");
                        $("input[value='"+correctAnswer+"'] + label").addClass("correct-answer");
                    }

                 ;   setTimeout(function(){
                        // clear all selection and load next question 
                        $("label").removeClass("selected-answer correct-answer wrong-answer");

                        // remove selection from previous answer
                        $("input[name='option']").prop("checked",false);

                        // it last question is submitted then
                        if(response.question_number == response.total_questions)
                            finishTest();
                        loadQuestion();
                        
                    },1500);

                },
                error:function(xhr,status,error){
                    console.log(xhr,status,error);
                }
            });


            

            
        }



    </script>

</body>
</html>