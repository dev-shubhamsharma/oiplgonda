<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Window | OIPL</title>

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


        #student-name, #subject-name, #timer {
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

        .current-question {
            background: purple !important;
            color: #eee;
        }

        .question-btn.answered {
            background-color: rgb(79, 184, 79);
            border-radius: 0 0 15px 15px ;
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
            Student Name : <span id="student-name">Sumit Kumar</span> | 
            Subject : <span id="subject-name">IT Tools and Network</span>
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
                <p class="en">This is the question text</p>
                <p class="hi">यह हिन्दी का प्रश्न है।</p>
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

                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>
                <button class="question-btn" id="btn1">1</button>
                <button class="question-btn" id="btn2">2</button>

            </div>


        </section>

    </main>


    <div id="overlay">
        <div id="preloader"></div>
    </div>

</body>
</html>