<?php 

    $google_font = "https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap";


?>

<?php
    $current_year = date("Y");
?>


<!-- To check that the user is logged in -->


<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Check if this is the admin user (using email check)
// $admin_email = 'admin@oipl.com';  // <-- your real admin email
// echo $_SESSION['user_id'];
// echo $_SESSION['user_name'];
// echo $_SESSION['logged_in'];
// echo $_SESSION['user_email_id'];

// if ($_SESSION['user_email_id'] !== $admin_email) {
//     echo "<h2>Access Denied: You are not authorized to view this page.</h2>";

//     echo "Go to <a href='login.php'> Login Page</a>";
//     // header('Location: login.php');
//     exit();
// }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- to change the website icon in browser -->
    <link rel="icon" href="images/logo.ico" type="image/x-icon">

    <title>Mock Tests | OIPL</title>

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
        }


        .button {
            padding: 10px 20px;
            background-color: #203f8eff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: white;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background-color: whitesmoke;
            color: white;
            color: #333;
            
            border-bottom: 2px solid #ccc;
        }

        #heading {
            /* text-align: center; */
            /* margin: 10px; */
            /* padding: 20px; */
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #2B32B2;
            font-size: 35px;
            /* border-bottom: 2px solid #ccc; */
        }

        .buttons-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 20px;
            margin: 40px 20px;
        }

        .button-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 2px solid #203f8eff;
            border-radius: 10px;
            width: 200px;
            transition: background-color 0.3s, color 0.3s;
        }

        .button-link:hover {
            background-color: #203f8eff;
            color: white;
        }

        .button-link i {
            font-size: 50px;
            margin-bottom: 10px;
        }



        footer {
            text-align: center;
            padding: 20px;
            background-color: #454343ff;
            color: #f0f0f0ff;
        }

        

        @media screen and (max-width: 768px) {
            
            
            #heading {
                font-size: 1.5rem;
            }

        }

    </style>

</head>
<body>

    <header>    
        <a href="student_dashboard.php">
            <button class="button">&LeftArrow; Back</button>
        </a>
        <h1 id="heading">Mock Tests</h1>
        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <section class="buttons-container">
            
        <a href="mocktest_instructions.php?testname=it_tools" class="button-link">
            <i class="fa fa-server"></i>
            <span>IT tools</span>
        </a>

        <a href="mocktest_instructions.php?testname=web_design" class="button-link">
            <i class="fa fa-html5"></i>
            <span>Web Design</span>
        </a>

        <a href="mocktest_instructions.php?testname=python" class="button-link">
            <i class="fa fa-cogs"></i>
            <span>Python</span>
        </a>


        <a href="mocktest_instructions.php?testname=iot" class="button-link">
            <i class="fa fa-microchip"></i>
            <span>Internet of Things</span>
        </a>

    </section>

    



    <footer>
        <p>Copyright&copy;OIPL- 
            <?php echo $current_year; ?>
        </p>
    </footer>

    

</body>
</html>