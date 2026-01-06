



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Insturctions | OIPL</title>

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
            color: #333;
            padding: 10px 50px;
            background-color: whitesmoke;
        }

        h1 {
            text-align: left;
            border-bottom: 1px solid #777;
            padding: 10px 0;
            color: rgb(37, 111, 196);
        }

        h3 {
            margin: 15px 0;
            /* border-bottom: 1px solid #777; */
        }

        ul,ol {
            margin-left: 40px;
        }

        li {
            line-height: 30px;
        }

        .disclaimer-box {
            border: 1px solid #777;
            padding: 20px;
            margin: 10px 0;
            color: #111;
        }

        #agree-checkbox {
            min-width: 20px;
            min-height: 20px;
            margin-top: 5px;
        }

        .disclaimer-box label {
            margin-left: 5px;
            /* height: 50px; */
        }

        .btn {
            background-color:rgba(29, 91, 161, 1);
            color: #eee;
            padding: 10px 20px;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius: 5px;
            border: 0;
        }

        /* .btn:hover {
            background-color: rgba(2, 48, 100, 1);
        } */

        .disabled {
            background-color: #777;
            cursor:not-allowed;
        }


    </style>

</head>
<body>


    <h1>Important Exam Instructions</h1>
    
    <div class="container">
        <h3>Exam Details:</h3>
        <ul>
            <li><strong>Total Duration:</strong> 60 Minutes</li>
            <li><strong>Total Questions:</strong> 100 MCQs</li>
            <li><strong>Marking Scheme:</strong> +1 for correct, 0 for unattempted, 0 for wrong.</li>
        </ul>

        <h3>Rules & Regulations</h3>
        <ol>
            <li>Do not refresh the page or press the back button once the exam starts.</li>
            <li>The exam will automatically enter <strong>Full Screen Mode</strong>. Exiting full screen may be flagged as a malpractice attempt.</li>
            <li>Ensure you have a stable internet connection.</li>
            <li>Right click is not allowed during exam.</li>
        </ol>

        <div class="disclaimer-box">
            <input type="checkbox" id="agree-checkbox">
            <label for="agree-checkbox">I have read and understood all the instructions. I agree that any violation of rules may lead to disqualification.</label>
        </div>


    </div>
            
    <div class="action-area">
        <button id="start-exam-btn" class="btn disabled" disabled>I'm ready to begin</button>
    </div>




    <script>
        
        $(document).ready(function () {

            $("#agree-checkbox").on("change", function () {
                if ($(this).is(":checked")) {
                    console.log("Hi");
                    $("#start-exam-btn").prop("disabled", false);
                    $("#start-exam-btn").removeClass("disabled");
                } else {
                    $("#start-exam-btn").prop("disabled", true);
                    $("#start-exam-btn").addClass("disabled");
                }
            });



            $("#start-exam-btn").click(function(){
                
               window.location.href="exam_window.php";

            });

        });



    </script>
</body>
</html>