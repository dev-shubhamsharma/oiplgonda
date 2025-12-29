
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
    <!-- to change the website icon in browser -->
    <link rel="icon" href="images/logo.ico" type="image/x-icon">
    
    <title>

        <?php echo $page_title; ?>

    </title>

    <!-- Jquery Link CDN for ajax -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>


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

        .input-container span {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: right;
            display: none;
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

        #register_btn::before {
            content: '';
            width: 100%;
            height:100%;
            background:#2B32B2;
            position: absolute;
            opacity: 0.6;
            top: 0;
            left: 0;
            z-index: -1;
            border-radius: 5px;
            transition: transform 0.5s ease-out;
            transform: translateX(120%);
            /* border-radius: 20px; */
            box-shadow: -10px 0px 10px rgba(226, 215, 215, 0.4);
        }

        #register_btn:hover::before {
            transform: translateX(0%);
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


        #register_btn {
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
        <form class="form" id="register_form">
            <div class="input-container">   
                <label for="student_name">Student Name</label>
                <input type="text" id="student_name" name="student_name" required>
                <span id="name_error">Name is Compulsory</span>
            </div>
            <div class="input-container">
                <label for="mobile_number">Mobile Number</label>
                <input type="number" id="mobile_number" name="mobile_number" required>
                <span id="mobile_number_error">Mobile number should be 10 digits</span>
            </div>
            <div class="input-container">
                <label for="email_id">Email Id</label>
                <input type="email" id="email_id" name="email_id" required>
                <span id="email_error">Email id should be valid</span>
            </div>
            <div class="input-container">
                <label for="password">Create Password</label>
                <input type="password" id="password" name="password" required>
                <span id="password_error">Password length is short</span>
            </div>
            <div class="input-container">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span id="confirm_password_error">Confirm password should be matched</span>
            </div>
            <div class="input-container">
                <button id="register_btn">Register</button>
            </div>

            <div id="message-box-overlay" style="display: none;" >
                <button id="close-btn">&times;</button>
                <ol id="message-box"></ol>
            </div>

            
        </form>
    </main>

    <script src="js/register_script.js"></script>
    
</body>
</html>
