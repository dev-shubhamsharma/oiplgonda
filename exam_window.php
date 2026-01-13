<!-- 
 
Disable right click
use Full screen mode
tab swicthing detection
disable shortcut keys
disable selection of text

on exit of fullscreen pause the exam and show warning


-->



<?php 

session_start();

// for only desktop access to the exam page
$mobile = preg_match(
    '/(android|iphone|ipad|ipod|blackberry|windows phone)/i',
    $_SERVER['HTTP_USER_AGENT']
);

if ($mobile) {
    die("<h1>This website is not available on mobile devices.</h1>");
}




$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];

$subject_name = $_SESSION["exam_subject_name"];
$questions_limit = $_SESSION["exam_questions_limit"];
$subject_title = $_SESSION["exam_subject_title"];
// duration in minutes
$exam_duration = $_SESSION["exam_duration"];

if(!isset($user_id) or $user_id == "")
{
    header("location:login.php");
    exit();
}
else if($subject_name == "" or !isset($subject_name) or !isset($questions_limit) or !isset($exam_duration))
{
    header("location:exam_instructions.php");
    exit();
}

// if question ids not set 
if(!isset($_SESSION["exam_question_ids"]) or !isset($_SESSION['exam_initialized'])) {

    if(already_question_ids_exist_in_db()) {
        fetch_id_from_database();
    }
    else
    {
        generateQuestionIds();
        save_ids_into_table();
    }
    

}
else {
    fetch_id_from_database();
}


function already_question_ids_exist_in_db() {
    include "connection.php";

    global $user_id;

    $search_query = "select question_id from exam_answers_table where user_id = ?";
    $stmt = $conn->prepare($search_query);
    $stmt->bind_param('i',$user_id);

    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0)
    {
        return true;
    }
    else {
        return false;
    }
}

function generateQuestionIds() {
        include "connection.php";

        global $questions_limit,$subject_name;
        

        $query = "SELECT DISTINCT question_id
        FROM questions_table WHERE subject_name = ?
        ORDER BY RAND()
        LIMIT $questions_limit";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('s',$subject_name);
        $stmt->execute();
        $result = $stmt->get_result();

        $exam_question_ids = [];
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $exam_question_ids[] = $row['question_id'];
            }
        }

        $_SESSION["exam_question_ids"] = $exam_question_ids;

        

}


function fetch_id_from_database() {
    include "connection.php";

    global $user_id;
    $search_query = "select question_id from exam_answers_table where user_id = ?";
    $stmt = $conn->prepare($search_query);
    $stmt->bind_param('i',$user_id);

    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0)
    {

        $question_ids = [];

        while($row = $result->fetch_assoc())
        {
            $question_ids[] = $row["question_id"];
        }
        // print_r($question_ids);

        // set ids into session
        $_SESSION["exam_question_ids"] = $question_ids;
    }

}


function save_ids_into_table() {

    include "connection.php";

    global $user_id,$user_name, $subject_name;

    $insert_query = "insert into exam_answers_table (user_id,user_name,question_id) values (?,?,?) ";
    $insert_stmt = $conn->prepare($insert_query);

    foreach($_SESSION["exam_question_ids"] as $question_id)
    {
        $insert_stmt->bind_param('isi',$user_id,$user_name,$question_id);
        $insert_stmt->execute();
    }

    $_SESSION['exam_initialized'] = true;


    // save exam details into exam_details_table like time left for exam
    // and set into session
    global $exam_duration;
    $time_left = $exam_duration * 60; // in seconds
    $exam_attempted = 0;
    
    $query = "insert into exam_details_table (user_id,time_left_in_seconds,exam_attempted) values (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iii',$user_id,$time_left,$exam_attempted);
    if($stmt->execute()) {
        $_SESSION["exam_remaining_time"] = $time_left;
    }
    else {
        echo "Error in saving exam details into table: ".$conn->error;
    }

}


if(isset($_SESSION["exam_question_ids"]))
{
    $buttonsText = "";

    foreach($_SESSION["exam_question_ids"] as $index => $question_id)
    {

        $buttonsText .= '<button class="question-btn" id="btn'.($index+1).'" data-id="'.$question_id.'">'.($index+1).'</button>';
    }

}

// fetch remaining time from db if not already in session
if(!isset($_SESSION["exam_remaining_time"])) {
    // save into exam_details_table if not already exists
    include "connection.php";

    $search_query = "select time_left_in_seconds from exam_details_table where user_id = ?";
    $stmt = $conn->prepare($search_query);
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $_SESSION["exam_remaining_time"] = $row["time_left_in_seconds"];
        // return;
    }
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Window | OIPL</title>

    <?php 
    
        include "libs/jquery.php";
    
    ?>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-height: 100vh;
            max-width: 100vw;
            /* border: 1px solid green; */
        }

        p, label, button, h1, h2,h3,h4, img, div, span {
            user-select: none;
        }

        header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 10px 30px;
            max-height: 60px;
            
        }

        #main-logo {
            height: 40px;
        }


        #title {
            font-weight: 500;
            color: #777;
        }

        .btn {
            background-color: rgb(37, 111, 196);
            border: 0;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        #top-ribbon {
            background-color: rgb(66,63,63);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            color: #eee;
            padding: 0px 30px;
            height: 40px;
            max-height: 40px;
        }


        #student-name, #subject-name, #timer, #student-id {
            color: rgb(224, 224, 19);
        }


        main {
            width: 100%;
            display: flex;
            flex-direction: row;
            background-color: whitesmoke;
            /* border: 1px solid green; */
            height: calc(100vh - 100px);
            
        }


        #left-section {
            width: 75vw;
            border-right: 2px solid grey;
            overflow-y: scroll;
            padding: 30px;
            height: 100%;
        }

        .question-container {
            font-weight: bold;
            margin-bottom: 25px;
        }

        .question-container p {
            margin: 5px 0;
        }

        .option-container {
            border: 1px solid #aaa;
            display: block;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 15px 0;
            cursor: pointer;
        }

        .option-container span {
            display: block;
            margin: 4px 0;
        }

        .radio-btn {
            display: none;
        }

        .option-container:hover {
            background-color: lightgray;
        }

        .radio-btn:checked + .option-container {
            background-color: rgb(79,184,79);
        }

        

        .btn-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        button:disabled {
            background-color: grey;
            cursor: not-allowed;
        }

        #msg {
            color: red;
        }




        #right-section {
            width: 25vw;
            padding:30px;
            overflow: scroll;
        }

        .instruction {
            border: 1px solid #aaa;
            padding: 10px 20px;
            margin: 10px 0;
        }

        .instruction .question-btn {
            background: #eee;
            padding: 5px 15px;
            font-size: 1.2rem;
            border-radius: 15px 15px 0 0;
            border: 1px solid #777;
            margin-left: 30px;
        }

       
        .question-btn.answered {
            background-color: rgb(79, 184, 79);
            border-radius: 0 0 15px 15px !important;
        }

         .question-btn.current-question {
            background: purple !important;
            color: #eee;
        }



        .grid-container {
            margin: 10px 0;
            padding: 10px 0;
            /* border: 1px solid red; */
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(60px, 1fr));
            grid-gap: 1.2rem;

        }

        .grid-container .question-btn {
            padding: 5px 15px;
            font-size: 1.2rem;
            border-radius: 15px 15px 0 0;
            border: 1px solid #777;
            cursor: pointer;
        }   


        #overlay {
            width: 100vw;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.8);
            position: absolute;
            top: 0;
            left: 0;
            display: grid;
            place-items: center;
            overflow:hidden;
        }

        #preloader {
            height: 100px;
            width: 100px;
            border: 10px dotted grey;
            border-radius: 50%;
            border-bottom-style: dotted;
            animation: rotate 2s infinite linear alternate;
            /* border-left-color: transparent; */
            transition: 2s;
        }

        @keyframes rotate {
            0% { 
                transform: rotate(0deg) scale(1.0); 
                
            }
            100% {
                transform: rotate(360deg) scale(0.6); 
            }   
        }



    </style>



</head>
<body>
    
    <header>
        <img id="main-logo" src="images/logo - Copy.png" alt="OIPL logo">
        <h1 id="title">Examination System</h1>
        <button id="submit-btn" class="btn">Submit Exam</button>
    </header>

    <section id="top-ribbon">
        <span>
            Student Id : <span id="student-id"><?php echo $user_id; ?></span> | 
            Student Name : <span id="student-name"><?php echo $user_name; ?></span> | 
            Subject : <span id="subject-name"><?php echo $subject_title; ?></span>
        </span>

        <div id="timer">
            Times Left : 
            <span id="minutes">00</span> : 
            <span id="seconds">00</span>
        </div>
    </section>


    <main>
        <section id="left-section">

            <div class="question-container">
                <p class="en" id="question-en">This is the question text</p>
                <p class="hi" id="question-hi">यह हिन्दी का प्रश्न है।</p>
            </div>

            <label for="option-a">
                <input type="radio" value="A" name="question" class="radio-btn" id="option-a">
                <span class="option-container">
                    <span class="en" id="option-a-en">This is option A</span>
                    <span class="hi" id="option-a-hi">यह हिन्दी का पहला विकल्प है।</span>
                </span>
            </label>

            <label for="option-b">
                <input type="radio" value="B" name="question" class="radio-btn" id="option-b">
                <span class="option-container">
                    <span class="en" id="option-b-en">This is option B</span>
                    <span class="hi" id="option-b-hi">यह हिन्दी का दूसरा विकल्प है।</span>
                </span>
            </label>

            <label for="option-c">
                <input type="radio" value="C" name="question" class="radio-btn" id="option-c">
                <span class="option-container">
                    <span class="en" id="option-c-en">This is option C</span>
                    <span class="hi" id="option-c-hi">यह हिन्दी का तीसरा विकल्प है।</span>
                </span>
            </label>

            <label for="option-d">
                <input type="radio" value="D" name="question" class="radio-btn" id="option-d">
                <span class="option-container">
                    <span class="en" id="option-d-en">This is option D</span>
                    <span class="hi" id="option-d-hi">यह हिन्दी का चाैथा विकल्प है।</span>
                </span>
            </label>

            <div class="btn-container">
                <button id="prev-btn" class="btn">Previous</button>
                <p id="msg">Please select an option</p>
                <button id="next-btn" class="btn">Save & Next</button>
                <button id="save-btn" class="btn" style="background-color: rgb(200,0,0);">Save</button>

            </div>




        </section>


        <section id="right-section">
            <div class="container">
                <h4>Button Indicators</h4>

                <p class="instruction">Not Answered
                    <button class="question-btn">1</button>
                </p>

                <p class="instruction">Current Question 
                    <button class="question-btn current-question">1</button>
                </p>

                <p class="instruction">Answered 
                    <button class="question-btn answered">1</button>
                </p>

            </div>



            <h4 style="margin-top: 20px;">Questions List View</h4>

            <div class="grid-container">

                <!-- <button class="question-btn" id="btn1" data-id="100">1</button> -->
                <?php echo $buttonsText; ?>
                

            </div>

        </section>

    </main>


    <div id="overlay">
        <div id="preloader"></div>
    </div>


    <script>

        $(document).ready(function(){

            questionIds = <?php echo json_encode($_SESSION["exam_question_ids"]); ?>;
            console.log(questionIds);
            
            // this button will be shown only on last question
            $("#save-btn").hide();
            $("#msg").hide();

            // set current question index
            current_question_index = <?php 
                if(isset($_SESSION["current_question_index"]))
                {
                    echo $_SESSION["current_question_index"];
                }
                else {
                    echo 0;
                }
            ?>;
            selectedAnswer = "";

            // load first question 
            loadQuestion(current_question_index);
            // starttimer and save into server for every second
            startTimer(<?php echo $_SESSION["exam_remaining_time"]; ?>);
            

            





            function startTimer(durationInSeconds) {
                timer = setInterval(function () {
                    // console.log(totalSeconds--); 
                    durationInSeconds--;
                    
                    // update into database table and session every second
                    $.ajax({
                        url:'update_exam_timer.php',
                        method:'POST',
                        data: {
                            time_left: durationInSeconds
                        },
                        success:function(response){
                            // console.log("Timer updated in session and db");
                        },
                        error:function(xhr,status,error){
                            console.log(xhr, status, error);
                        }
                    });


                    minutes = parseInt(durationInSeconds / 60, 10);
                    seconds = parseInt(durationInSeconds % 60, 10);
                    
                    $("#minutes").text(minutes < 10 ? "0" + minutes : minutes);
                    $("#seconds").text(seconds < 10 ? "0" + seconds : seconds);

                    if (durationInSeconds <= 0) {
                        clearInterval(timer);
                        submitExam();
                    }
                }, 1000);
            }


            function submitExam() {
                resetSeconds = 0;
                clearInterval(timer);
                // update timer one last time before submitting
                $.ajax({
                    url:'update_exam_timer.php',
                    method:'POST',
                    data: {
                        time_left: resetSeconds
                    },
                    success:function(response){
                        console.log("Final Timer updated in session and db");
                    },
                    error:function(xhr,status,error){
                        console.log(xhr, status, error);
                    }
                });
                window.location.href = "submit_exam.php";
            }


        
            $("#submit-btn").on("click", function(){
                if(confirm("Are you sure you want to submit the exam?"))
                {
                    submitExam();
                }
            });



            // takes question number not index
            function loadQuestion(current_question_index) {
                
                $.ajax({
                    url:'fetch_question_for_exam.php',
                    method: 'POST',
                    data: {
                        question_index: current_question_index
                    },
                    dataType :"json",
                    success: function(response){
                        console.log(response);
                        $("#question-en").text(escapeHTML(response.question));
                        $("#option-a-en").text(escapeHTML(response.option_a));
                        $("#option-b-en").text(escapeHTML(response.option_b));
                        $("#option-c-en").text(escapeHTML(response.option_c));
                        $("#option-d-en").text(escapeHTML(response.option_d));

                        $("#option-a").val(response.option_a);
                        $("#option-b").val(response.option_b);
                        $("#option-c").val(response.option_c);
                        $("#option-d").val(response.option_d);

                        $("#question-hi").hide();
                        $("#option-a-hi").hide();
                        $("#option-b-hi").hide();
                        $("#option-c-hi").hide();
                        $("#option-d-hi").hide();

                        
                        $("#msg").hide();
                        // highlight current question button
                        current_question_index = parseInt(response.current_question_index);
                        console.log("Current question index: "+current_question_index);
                        console.log("button id: "+"#btn"+(current_question_index+1));

                        $("#btn"+(current_question_index+1)).addClass("current-question");
                        
                        if(current_question_index == 0)
                        {
                            $("#prev-btn").attr("disabled", true);
                        }
                        else {
                            $("#prev-btn").attr("disabled", false);
                        }


                        loadPreviouslySelectedOption(current_question_index);


                        if(current_question_index == questionIds.length - 1)
                        {
                            $("#next-btn").hide();
                            $("#save-btn").show();
                        }
                        else {
                            $("#next-btn").show();
                            $("#save-btn").hide();
                        }
                        

                        

                    },
                    error:function(xhr,status,error){
                        console.log(xhr, status, error);
                    }
                });

            }



            $("input[name='question']").on("change", function(){
                $("#msg").hide();
            });



            $("#next-btn").on("click",function(){

                if($("input[name='question']:checked").length == 0)
                {
                    $("#msg").show();
                    return;
                }
                $("#overlay").show();
                saveAnswerIntoTable();

            });


            $("#prev-btn").on("click",function(){
                $("#overlay").show();
                // console.log("Previous button clicked"+current_question_index);
                // decrement question index
                if(current_question_index >= 0)
                {
                    // remove current question highlight
                    $("#btn"+(current_question_index+1)).removeClass("current-question");

                    current_question_index--;
                    // load previous question
                    loadQuestion(current_question_index);
                }
                else {
                    $("#prev-btn").attr("disabled", true);
                }
            });

            // this button will be appear on last question
            $("#save-btn").on("click", function(){
                if($("input[name='question']:checked").length == 0)
                {
                    $("#msg").show();
                    return;
                }
                $("#overlay").show();
                saveAnswerIntoTable();
            });



            // this is to convert special characters to html entities
            function escapeHTML(str) {
                return $("<div>").text(str).html();
            }


            function loadPreviouslySelectedOption(question_index) {
                $.ajax({
                    url:'fetch_selected_answers_for_exam.php',
                    method:'POST',
                    data: {
                        question_index: question_index
                    },
                    dataType:'json',
                    success:function(response){
                        console.log(response);
                        $("input[name='question']").prop("checked", false);
                        if(response.selected_answer !== null) {
                            $("input[value='"+response.selected_answer+"']").prop("checked", true);
                            
                            // hide overlay when questions loaded and all set
                            $("#overlay").hide();
                        }
                    },
                    error:function(xhr,status,error){
                        console.log(xhr, status, error);
                    }
                });
            }


            function saveAnswerIntoTable() {
                selectedAnswer = $("input[name='question']:checked").val();
                console.log(selectedAnswer);
                $.ajax({
                    url:'save_answer_into_exam_table.php',
                    method:'POST',
                    data: {
                        question_index: current_question_index,
                        selected_answer: selectedAnswer
                    },
                    success:function(response){
                        console.log(response);
                        // mark question button as answered
                        $("#btn"+(current_question_index+1)).addClass("answered");
                        
                        
                        // if question is last question 
                        if(current_question_index == questionIds.length - 1)
                        {
                            // last question saved
                            alert("This was the last question. You have completed the exam.");
                            $("#overlay").hide();
                            return;
                        }
                        // remove current question highlight
                        $("#btn"+(current_question_index+1)).removeClass("current-question");

                        // increment question index
                        current_question_index++;

                        // clear selected option
                        $("input[name='question']").prop("checked", false);

                        // load next question
                        loadQuestion(current_question_index);

                    },
                    error:function(xhr,status,error){
                        console.log(xhr, status, error);
                    }
                });
            }


            //when page reload then find answered from db and then mark those question buttons as answered
            $(window).on("load", function(){
                markAnsweredQuestions();
            });


            function markAnsweredQuestions() {
                $.ajax({
                    url:'fetch_answered_questions.php',
                    method:'POST',
                    dataType:'json',
                    success:function(response){
                        console.log("Reloaded answered questions:");

                        console.log(response.answered_questions);
                        // console.log(response.current_question_index);
                        answered_questionIds = response.answered_questions; 
                        answered_questionIds.forEach(function(question_index){
                            // console.log("Marking question index "+question_index+" as answered");
                            $("#btn"+(question_index+1)).addClass("answered");
                            
                        });
                    },
                    error:function(xhr,status,error){
                        console.log(xhr, status, error);
                    }
                });
            }


            // load question on question button click 
            $(".question-btn").on("click", function(){
                $("#overlay").show();
                // remove current question highlight
                $("#btn"+(current_question_index+1)).removeClass("current-question");

                let question_index = $(this).index();
                current_question_index = question_index;
                console.log("Clicked question index: "+question_index);
                loadQuestion(current_question_index);
            });



        // Disable right click
        $(document).on("contextmenu", function(e){
            e.preventDefault();
        });

        // use Full screen mode
        enterFullScreen();

        // on exit of fullscreen pause the exam and show warning
        document.addEventListener("fullscreenchange", function(){
            if(!document.fullscreenElement){
                alert("You have exited full screen mode. The exam will be submitted now.");
                $("#left-section, #right-section").css("pointer-events", "none");
                // submitExam();
            }
            else {
                // enable exam window
                $("#left-section, #right-section").css("pointer-events", "auto");
            }
        });

        // tab switching detection alert 2 times and submit exam
        let tabSwitchCount = 0;
        $(document).on("visibilitychange", function(){
            if(document.hidden){
                tabSwitchCount++;
                if(tabSwitchCount >= 2){
                    alert("You have switched tabs multiple times. The exam will be submitted now.");
                    submitExam();
                }
                else {
                    alert("Tab switching is not allowed during the exam. Please return to the exam tab.");
                }
            }
        });


        // disable shortcut keys
        $(document).on("keydown", function(e){
            if(e.ctrlKey || e.altKey || e.shiftKey){
                e.preventDefault();
            }
        });

        // disable selection of text
// on exit of fullscreen pause the exam and show warning



            // to set full screen

            $("header").on("click", function () {
                enterFullScreen();
            });

            function enterFullScreen() {
                let elem = document.documentElement; // full page

                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.webkitRequestFullscreen) { // Safari
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) { // IE11
                    elem.msRequestFullscreen();
                }
            }







        });



    </script>
</body>
</html>