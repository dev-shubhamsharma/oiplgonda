
<?php 

    $current_year = date("Y");
    $page_title = "Register Form | OIPL";

    $main_css_file = "css/main.css";
    $header_css_file = "css/header.css";

    $google_font = "https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap";
    $font_awesome_font = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>

        <?php echo $page_title; ?>

    </title>

    <!-- google font cdn link -->
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">

    <!-- main.css style link -->
    <link rel="stylesheet" href="<?php echo $main_css_file; ?>?v= <?php echo filemtime($main_css_file) ?>">

    <!-- header.css style link -->
    <link rel="stylesheet" href="<?php echo $header_css_file; ?>?v= <?php echo filemtime($header_css_file) ?>">

    <!-- <link rel="stylesheet" href="signinStyle.css"> -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .form {
            background: rgba(0,0,0,0.7);
            min-width: 400px;
            padding: 30px 40px;
            color: #fff;
            display: flex;
            flex-direction: column;
            text-align: left;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 50px;
            /* border: 1px solid red; */
        }

        .form input {
            border: none;
            border-radius: 3px;
        }

        #register_btn {
            /* background: linear-gradient(to right, #ff0099, #493240); */
            /* background: linear-gradient(to left, #f953c6, #b91d73); */
            /* background: linear-gradient(to right, #1a2980, #26d0ce); */
            /* background: linear-gradient(to right, #aa076b, #61045f); */
            background-image: linear-gradient(to left,#1488CC,#2B32B2);
            padding: 15px 40px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
            color: #fff;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.4);
            cursor: pointer;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }


        /* preloader */


        .preloader {
            position: absolute;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            /* display: flex; */
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.1rem;
            line-height: 30px;
            color: #333;
            /* font-weight: bold; */
            /* background: linear-gradient(to right, #0575E6, #00F260);  */
            background: rgba(241, 239, 239, 0.9);
            z-index: 9;

        }

        .circle {
            width: 60px;
            height: 60px;
            border: 2px solid #333;
            border-top-color:rgba(241, 239, 239, 0.9);
            border-radius: 50%;
            animation: animate 700ms linear infinite forwards;
        }

        @keyframes animate {
            0% {transform: rotate(0deg);}
            100% {transform: rotate(360deg);}
        }

        .preloader .text {
            margin-top: 20px;
        }




        @media(max-width:700px) {



        main {
            /* height: 100vh;*/
            max-width: 100vw;
            padding: 0;
        }

        main h2 {
            font-size: 40px;
            margin-top: 30px;
        }

        main .form {
            padding: 30px 20px;
        }


        #sign-in-btn {
            padding: 10px 20px;
        }


        }

        @media(max-width:450px) {
            .form {
                min-width: 100%;
            }
        }
    </style>

    

</head>
<body>
    
    <?php 

    include "header.php";

    ?>

    <main>
        <h2 class="middle-heading">Registration Form</h2>
        <div class="form">
            <div class="input-container">   
                <label for="student_name">Student Name</label>
                <input type="text" id="student_name" onclick="clearLoginMsg()" required>
            </div>
            <div class="input-container">
                <label for="mobile_number">Mobile Number</label>
                <input type="number" id="mobile_number" onclick="clearLoginMsg()" required>
            </div>
            <div class="input-container">
                <label for="email_id">Email Id</label>
                <input type="email" id="email_id" onclick="clearLoginMsg()" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" onclick="clearLoginMsg()" required>
            </div>
            <div class="input-container">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" onclick="clearLoginMsg()" required>
            </div>
            <div class="input-container">
                <button id="register_btn">Register</button>
            </div>
        </div>
    </main>

    <div class="preloader">
        <div class="circle"></div>
        <p class="text">Please wait...<br> Connecting to exam server...</p>
    </div>

    <script src="js/exam_students.js"></script>

    <script>

        function validateUser() {

            var username = document.getElementById("username").value.trim()
            var password = document.getElementById("password").value.trim()

            // to convert username into sentence case
            const arr = username.split(" ");
            for (var i = 0; i < arr.length; i++) {
                arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
            }

            username = arr.join(" ");

            password = password.charAt(0).toUpperCase() + password.slice(1);
            console.log(username)
            console.log(password)

            // console.log(name)
            // console.log(password)
            let msg = document.querySelector("#msg")

            if(password == students[username]) {

                // alert("password matched")
                // alert("matched")
                if(window.localStorage.getItem("examstatus") != "attempted") {
                    
                    // console.log("not attempted value found")
                    document.getElementsByClassName("preloader")[0].style.display = "flex"
                    window.localStorage.setItem("username",username);
                    window.localStorage.setItem("password",password);

                    const timeout = setTimeout(function() {
                        let url = window.location.search.toString()
                        let i = url.indexOf("=")
                        // console.log(url.substring(i+1))
                        // window.localStorage.setItem("examstatus","attempted")
                        window.open("exam_window.html?examname="+url.substring(i+1),"_self")
                        clearTimeout(timeout)
                    },5000)
                }
                else {
                    // alert("attempted found")
                    msg.innerHTML = "You have already attempted the Exam!"
                    msg.style.display = "block"    
                    document.querySelector("#x-btn").style.display = 'inline'
                }
                
                
            }
            else {
                // alert("not matched")
                // alert("password not matched")s
                msg.innerHTML = "Username or password is incorrect"
                msg.style.display = "block"

            }

        }

        function clearLoginMsg() {
            document.getElementById("msg").style.display = "none"
        }


    </script>

    <!-- <script src="students.js"></script> -->
    

    
</body>
</html>
