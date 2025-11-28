
<?php
    // mocktest_window.php
    // This file serves as the main interface for taking a mock test.


    
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
                <?php 
                    echo $test_title;
                ?>
            </h2>
        </div>

        <div class="question-container">
            <p>Question 1: What is IoT?</p>
        </div>

        <div class="option-container" id="option_a">
            <input type="radio" name="option" id="a">
            <label for="a">Internet of Things is a network of physical objects</label>
        </div>

        <div class="option-container" id="option_b">
            <input type="radio" name="option" id="b">
            <label for="b">Internet of Things is a programming language</label>
        </div>

        <div class="option-container" id="option_c">
            <input type="radio" name="option" id="c">
            <label for="c">Internet of Things is a type of software</label>
        </div>

        <div class="option-container" id="option_d">
            <input type="radio" name="option" id="d">
            <label for="d">Internet of Things is a database system</label>
        </div>

        <div class="button-container">
            <button id="prev-button">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                &nbsp;Prev
            </button>
            <p>
                Time left : 
                <?php 
                    echo $_SESSION["time_duration"];

                ?>
            </p>
            <button id="next-button">
                Next&nbsp;
                <i class="fa fa-arrow-right" aria-hidden="true"></i>

            </button>
        </div>

        

    </main>


    <script>



    </script>


</body>
</html>