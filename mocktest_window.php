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
        }

        body {
            background: linear-gradient(to right, #1488CC, #2B32B2);
            display: grid;
            place-items: center;
            min-height: 100vh;
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

        input[type="radio"]:checked + label {
            /* font-weight: 600; */
            background: lightgreen;
            border-color: #12800eff;
        }

        #question {
            margin: 15px 0;
            font-weight: 500;
            color: #222;
        }

        #question-text {
            text-align: justify;
        }

        #option1-text, #option2-text, #option3-text, #option4-text {
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
            <h3 style="color:green;">Score : <span id="score">00</span></h3>
            <p id="timer">Time left : <span id="time-left">80</span></p>
        </div>

        <section id="question-section">

            <p id="question">
                <span id="question-count">1.</span>
                <span id="question-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat enim facilis id vero quis ipsa. Minus blanditiis accusantium voluptas magnam quaerat quisquam nesciunt, dolorem impedit, molestias incidunt deleniti optio ipsam!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</span>
            </p>

            <input type="radio" name="option" id="option1" value="">
            <label for="option1" class="option-container" id="option1-text">
                Option 1
            </label>

            <input type="radio" name="option" id="option2" value="">
            <label for="option2" class="option-container" id="option2-text">
                Option 2
            </label>

            <input type="radio" name="option" id="option3" value="">
            <label for="option3" class="option-container" id="option3-text">
                Option 3
            </label>

            <input type="radio" name="option" id="option4" value="">
            <label for="option4" class="option-container" id="option4-text">
                Option 4
            </label>
                
        </section>

        <div id="bottom-container">
            <p>
                Question <span id="question-count">1</span> of <span id="total-questions">10</span>
            </p>
            <button id="save-next-btn">Save & Next</button>
        </div>

    </main>

</body>
</html>