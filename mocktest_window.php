
<?php
    // mocktest_window.php
    // This file serves as the main interface for taking a mock test.

    session_start();
    
    if(isset($_SESSION['testname'])) {
        $test_title = $_SESSION['testname'];
    } else {
        $test_title = "Unknown Test";
    }


    if(isset($_GET['testname'])) {
        $_SESSION["testname"] = $_GET['testname'];
        
    }

    $test_title = $_SESSION["testname"];
    if($test_title == 'it_tools') {
        $test_title = "IT Tools and Networking";
    } elseif ($test_title == 'web_design') {
        $test_title = "Web Design and Publishing";
    } elseif ($test_title == 'python') {
        $test_title = "Python Programming";
    } elseif ($test_title == 'iot') {
        $test_title = "Internet of Things";
    } else {
        $test_title = "Unknown Test";
    }


    // $total_questions = $_SESSION["total_questions"];
    // $time_in_minutes = $_SESSION["time_duration"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocktest | OIPL</title>

    <?php
        include "libs/google-font.php";
        include "libs/font-awesome.php";
        include "libs/jquery.php";


    ?>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        #top {
            height: 120px;
            background-color: #32477cff;
        }

        #bottom {
            height: calc(100vh - 120px);
            background-color: #b8b9bdff;
        }

        main {
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            /* height: calc(100vh - 120px); */
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            overflow: hidden;
        }

        #title-container {
            text-align: center;
            margin-bottom: 20px;
            background-color: #e57435;
            /* border-radius: 5px; */
            
            padding: 10px 20px;
            color: #fff;
            width: 100%;
        }

        .question-container {
            font-size: 1.2em;
            border-bottom: 2px solid #ccc;
            padding: 20px;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .option-container {
            font-size: 1em;
            border-bottom: 1px solid #ccc;
            padding:20px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .option-container:hover {
            background-color: #f0f0f0;
        }


        input[type="radio"] {
            margin-right: 10px;
            width: 25px;
            height: 25px;
            /* margin-top: 4px; */
        }

        .option-container label {
            margin-top: -3px;
        }


        .button-container {
            margin-top: auto;

            padding: 20px;
            text-align: center;
            border-top: 2px solid #ccc;
            display: flex;
            flex-direction: row ;
            justify-content: space-between;
            align-items: center;
            /* justify-self: flex-end; */
        }

        button {
            background-color: #32477cff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        button:disabled {
            background-color: #999;
            cursor: not-allowed;
        }

        #end-test-button {
            background-color: #e53935;
        }


    </style>


</head>
<body>

        <?php  
        // echo "session variable value is ".$_SESSION["testname"];
        $subject_name = "";

        if($_SESSION["testname"] === "it_tools")
            $subject_name = "It Tools";
        else if($_SESSION["testname"] === "web_design")
            $subject_name = "Web Design";
        else if($_SESSION["testname"] === "python")
            $subject_name = "Python";
        else if($_SESSION["testname"] === "iot")
            $subject_name = "IoT";
        else
            $subject_name = "";
        
        ?>


        <?php  
        
        include "connection.php";

        $query = "select question_id from questions_table where subject_name = '".$subject_name."' ";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            echo "Error in query execution: " . mysqli_error($conn);
            exit();
        }
        else {
            $total_questions = mysqli_num_rows($result);
            // var_dump($result);
            // convert result to associative array

            $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // echo "<br>Total questions in ".$subject_name." are ".$total_questions."<br>";
            // print_r($questions);

            // echo "<br>Questions are:<br>";
            // foreach($questions as $row) {
            //     echo $row["question_id"]."<br>";
            // }

            // put these question ids in session variable
            $_SESSION["question_ids"] = array();
            foreach($questions as $row) {
                array_push($_SESSION["question_ids"], $row["question_id"]);
            }

            // print_r($_SESSION["question_ids"]);

            $_SESSION["current_question_index"] = 0;

            // on click of next button, increment the current_question_index by 1


            
            // on click of prev button, decrement the current_question_index by 1



            // echo mysqli_fetch_assoc($result);

            // echo "<br>Total questions in ".$subject_name." are ".$total_questions;
        }
        
        
        ?>
    <section id="top">

    </section>    

    <section id="bottom">

    </section>

    <main>

        <div id="title-container">
            <h2 id="test-title">
                <?php 
                    echo $test_title;
                ?>
            </h2>
        </div>

        <div class="question-container">
            <p id="question-text">Question <?php echo $_SESSION["current_question_index"] + 1; ?>: What is IoT?</p>
        </div>

        <label for="a">
        <div class="option-container" id="option_a">
            <input type="radio" name="option" id="a">
            <p id="option_a_label">Internet of Things is a network of physical objects</p>
        </div>
        </label>

        <label for="b">
        <div class="option-container" id="option_b">
            <input type="radio" name="option" id="b">
            <p id="option_b_label">Internet of Things is a programming language</p>
        </div>
        </label>

        <label for="c">
        <div class="option-container" id="option_c">
            <input type="radio" name="option" id="c">
            <p id="option_c_label">Internet of Things is a type of software</p>
        </div>
        </label>

        <label for="d">
        <div class="option-container" id="option_d">
            <input type="radio" name="option" id="d">
            <p id="option_d_label">Internet of Things is a database system</p>
        </div>
        </label>

        <div class="button-container">
            <button id="prev-button">
                Previous
            </button>
            <p>
                Time left : 
                <span id="time-left">30:00</span>
            </p>
            <button id="next-button">
                Save & Next&nbsp;
            </button>

            <button id="end-test-button">
                End Test
            </button>

        </div>

        

    </main>


    <script>

        function loadQuestion(questionIndex) {
            // let questionIndex = <?php echo $_SESSION["current_question_index"]; ?>;
            let questionIds = <?php echo json_encode($_SESSION["question_ids"]); ?>;
            // console.log(questionIds);
            let questionId = questionIds[questionIndex];
            console.log(questionIndex);
            console.log(questionId);

            if(questionIndex >= questionIds.length - 1) {
                // $('#next-button').prop('disabled', true);
                $('#next-button').hide();
                $('#end-test-button').show();

                
            }else if(questionIndex <= 0) {
                $('#prev-button').prop('disabled', true);
            }
            else {
                $('#prev-button').prop('disabled', false);
                $('#next-button').show();
                $('#end-test-button').hide();

                
            }

            $.ajax({
                url: 'load_question_for_mocktest_window.php',
                type: 'GET',
                data: { question_id: questionId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#question-text').text('Question ' + (questionIndex + 1) + ': ' + response.data.question);
                        $('#option_a_label').text(response.data.option_a);
                        $('#option_b_label').text(response.data.option_b);
                        $('#option_c_label').text(response.data.option_c);
                        $('#option_d_label').text(response.data.option_d);
                    } else {
                        alert('Failed to load question.');
                    }
                },
                error: function() {
                    alert('Error in AJAX request.');
                }
            });
        }




        // load first question on page load using ajax via question index stored in session variable
        $(document).ready(function() {
            // enter_fullscreen();
            loadQuestion(0);
            $('#end-test-button').hide();

        });


        $('#next-button').click(function() {
            // alert if no option is selected
            let selectedOption = $('input[name="option"]:checked').val();
            if (!selectedOption) {
                alert("Please select an option before proceeding.");
                return;
            }

            // clear previously selected option
            $('input[name="option"]').prop('checked', false);


            // increment current_question_index in session variable via ajax call to a php file
            $.ajax({
                url: 'update_question_index_for_mocktest_window.php',
                type: 'POST',
                data: { action: 'next' },
                success: function(response) {
                    console.log(response);
                    // reload question
                    loadQuestion(parseInt(response));
                },
                error: function() {
                    alert('Error updating question index.');
                }
            });

        });

        $('#prev-button').click(function() {
            // increment current_question_index in session variable via ajax call to a php file
            $.ajax({
                url: 'update_question_index_for_mocktest_window.php',
                type: 'POST',
                data: { action: 'prev' },
                success: function(response) {
                    console.log(response);
                    // reload question
                    loadQuestion(parseInt(response));
                },
                error: function() {
                    alert('Error updating question index.');
                }
            });
            
        });

        // $(document).one("click", function () {   // <-- .one makes it run only once
        //     enter_fullscreen();
        // });


        // function enter_fullscreen() {
        //     let elem = document.documentElement;
        //     if (elem.requestFullscreen) {
        //         elem.requestFullscreen();
        //     } else if (elem.mozRequestFullScreen) { /* Firefox */
        //         elem.mozRequestFullScreen();
        //     } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        //         elem.webkitRequestFullscreen();
        //     } else if (elem.msRequestFullscreen) { /* IE/Edge */
        //         elem.msRequestFullscreen();
        //     }
        // }



        // to detech fullscreen exit
        // $(document).on("fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange", function () {
        //     if (!document.fullscreenElement &&
        //         !document.webkitFullscreenElement &&
        //         !document.mozFullScreenElement &&
        //         !document.msFullscreenElement) {

        //     // User exited fullscreen
        //         alert("You exited fullscreen. Test will be submitted.");
        //         // go back to full screen
        //         $(document).one("click", function () {   // <-- .one makes it run only once
        //             enter_fullscreen();
        //         });
        //     }
        // });




    </script>


</body>
</html>