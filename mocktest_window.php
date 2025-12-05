<?php 
session_start();

// echo $_SESSION["testname"];

$testname = $_SESSION["testname"];
// echo $testname;
// Mapping for show test_title on top according to testname

$test_title = null;

if($testname == "it_tools")
    $test_title = "IT Tools and Networking";
else if($testname == "web_design")
    $test_title = "Web Designing and Publishing";
else if($testname == "python")
    $test_title = "Programming using Python";
else if($testname == "iot")
    $test_title = "Internet of Things - IoT";


$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];

// fetch question_ids from questions_table with selected subject
$subject_name = $_SESSION["subject_name"];
// echo $subject_name;


include "connection.php";

$query = "select question_id from questions_table where subject_name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$subject_name);
$stmt->execute();
$result = $stmt->get_result();

$question_ids = [];
while($row = $result->fetch_assoc())
{
    array_push($question_ids, $row["question_id"]); 
}

// all question_id is contained in an array
$_SESSION["question_ids"] = $question_ids;
$_SESSION["current_question_index"] = 0;  
// print_r($question_ids);
$last_question_index = count($question_ids)-1;
// echo $last_question_index;


// create rows with user_id and question_id in mocktest_answers table for updating answers
// question id is stored in an array $question_ids

$check_query = "select * from mocktest_answers where user_id=? and question_id= ?";
foreach($question_ids as $question_id) {
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param('ii',$user_id, $question_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if($result->num_rows == 0)
    {
        // insert user_id and question_id if not previously exist

        $insert_query = "insert into mocktest_answers(user_id, question_id) values (?,?)";

        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('ii',$user_id, $question_id);
        $insert_stmt->execute();
    }
}

// $insert_stmt->close();
$check_stmt->close();
$conn->close();


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
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        input[type="radio"]:checked ~ p{
            color:green;
            font-weight: bold;
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


        #overlay {
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.8);
            position: absolute;
            top: 0;
            left: 0;

        }

        /* to prevent selection of text */

        p,label,button,h1,h2 {
            user-select: none;
        }


    </style>


</head>
<body>


    <section id="top">

    </section>    

    <section id="bottom">

    </section>

    <main>

        <div id="title-container">
            <h2 id="test-title">
                <?php echo $test_title; ?>
            </h2>


            <p>
                Name :
                <?php echo $user_name;?> 
            </p>
        </div>

        <div class="question-container">
            <p id="question-text"> What is IoT?</p>
        </div>

        <label for="a">
        <div class="option-container" id="option_a">
            <input type="radio" name="option" id="a" value="">
            <p id="option_a_label">Internet of Things is a network of physical objects</p>
        </div>
        </label>

        <label for="b">
        <div class="option-container" id="option_b">
            <input type="radio" name="option" id="b" value="">
            <p id="option_b_label">Internet of Things is a programming language</p>
        </div>
        </label>

        <label for="c">
        <div class="option-container" id="option_c">
            <input type="radio" name="option" id="c" value="">
            <p id="option_c_label">Internet of Things is a type of software</p>
        </div>
        </label>

        <label for="d">
        <div class="option-container" id="option_d">
            <input type="radio" name="option" id="d" value="">
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

    <div id="overlay"></div>

    <script>
        $('document').ready(function(){

            // hide overlay message
            $("#overlay").hide();
            $('#end-test-button').hide();
            $('#prev-button').prop('disabled',true);

            $(document).on("contextmenu", function (e) {
                alert("Right-click is disabled during the mocktest.");
                return false;
            });


            loadNextQuestion();

        });


        // detect browser tab switching 
        // tabSwitchingCount = 3;
        // $(document).on("visibilitychange", function () {
        //     if (document.hidden) {
        //         alert("Tab switchig restricted, Exam will be auto submitted");
        //         tabSwitchingCount--;

        //         if(tabSwitchingCount == 0)
        //         {
        //             alert("Mocktest ended");
        //             finishTest();
        //         }
                    
        //         // You can log or submit exam here
        //     }
        // });



        
        function loadNextQuestion() 
        {
            
            $.ajax({
                type:"POST",
                url:"load_next_question.php",
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    
                    $("#question-text").html("Q"+(response.current_question_index+1)+". "+response.question);
                    $("#option_a_label").html(response.option_a);
                    $("#a").val(response.option_a);
                    $("#option_b_label").html(response.option_b);
                    $("#b").val(response.option_b);
                    $("#option_c_label").html(response.option_c);
                    $("#c").val(response.option_c);
                    $("#option_d_label").html(response.option_d);
                    $("#d").val(response.option_d);


                    loadSavedAnswer();

                    // console.log(response.current_question_index);
                    if(response.current_question_index == <?php echo $last_question_index; ?>)
                    {
                        $("#next-button").prop("disabled",true);
                        $("#next-button").hide();
                        $("#end-test-button").show();

                    }
                    else 
                    {
                        $("#next-button").prop("disabled",false);
                        $("#next-button").show();
                        $("#end-test-button").hide();
                    }
                        

                },
                error: function(xhr,status,error) {
                    console.log(xhr,status,error);

                }
            });
        }


        function finishTest() 
        {
            console.log("Finish test");
            // $("button").prop("disabled",true);
            $("#overlay").show();
        }




        $("#end-test-button").click(function(){
            if($("input[type='radio']:checked").length === 0) {
                alert("Please select an option");
            }
            else {
                let selectedAnswer = $("input[type='radio']:checked").val();
                console.log(selectedAnswer);
                
                // update answer into database
                $.ajax({
                    type:'POST',
                    url:'save_selected_answer.php',
                    data:{selected_answer:selectedAnswer},
                    dataType: 'json',
                    success:function(response){
                        console.log(response);
                        res = confirm("Do you want to submit test?");
                        if(res) 
                        {
                            finishTest();
                        }
                        
                        // loadNextQuestion();
                        // $("#prev-button").prop("disabled",false);
                    },
                    error:function(xhr,status,error){
                        console.log(xhr,status,error);
                    }
      

                });



            } 
        });




        $("#next-button").click(function(){
            if($("input[type='radio']:checked").length === 0) {
                alert("Please select an option");
            }
            else {
                let selectedAnswer = $("input[type='radio']:checked").val();
                console.log(selectedAnswer);
                
                // update answer into database
                $.ajax({
                    type:'POST',
                    url:'save_selected_answer.php',
                    data:{selected_answer:selectedAnswer},
                    dataType: 'json',
                    success:function(response){
                        console.log(response);
                        loadNextQuestion();
                        $("#prev-button").prop("disabled",false);

                    },
                    error:function(xhr,status,error){
                        console.log(xhr,status,error);
                    }
      

                });



            } 
        });


        $("#prev-button").click(function(){
            // decrement current question index only and load question
            $.ajax({
                type:'POST',
                url:'decrement_current_index.php',
                success:function(response){
                    console.log("current index is "+response);
                    loadNextQuestion();
                    if(response == 0)
                        $("#prev-button").prop("disabled",true);

                },
                error:function(xhr,status,error){
                    console.log(xhr,status,error);
                }
    

            });

        }); 




        function loadSavedAnswer() {
            $.ajax({
                type:'POST',
                url:'load_saved_answer.php',
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    if ($('#a').val() === response) {
                        $('#a').prop('checked', true);
                    } else if ($('#b').val() === response) {
                        $('#b').prop('checked', true);
                    } else if ($('#c').val() === response) {
                        $('#c').prop('checked', true);
                    } else if ($('#d').val() === response) {
                        $('#d').prop('checked', true);
                    }
                    else {
                        console.log("response not matched with any option")
                        $("input[name='option']").prop('checked',false);
                    }
                },
                error:function(xhr,status,error){
                    console.log(xhr,status,error);
                }
            });
        }




    </script>

</body>
</html>