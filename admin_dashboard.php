<?php
    $current_year = date("Y");
?>


<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Check if this is the admin user (using email check)
$admin_email = 'admin@oipl.com';  // <-- your real admin email
// echo $_SESSION['user_id'];
// echo $_SESSION['user_name'];
// echo $_SESSION['logged_in'];
// echo $_SESSION['user_email_id'];

if ($_SESSION['user_email_id'] !== $admin_email) {
    header('Location: student_dashboard.php');
    exit();
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- to change the website icon in browser -->
    <link rel="icon" href="images/logo.ico" type="image/x-icon">

    
    <title>Admin Dashboard | OIPL</title>

    <!-- Font Awesome CDN -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            background-color: whitesmoke;
            color: white;
            color: #333;
            
            border-bottom: 2px solid #ccc;
        }

        #logo {
            height: 40px;
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

        .buttons-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
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

        main {
            padding: 40px;
            text-align: center;
        }


        h2 {
            margin-top: 20px;
            color: #0a339aff;
        }

        @media (max-width: 600px) {

            header {
                flex-direction: column;
                gap: 10px;
                padding: 10px 20px;
            }

            h1 {
                font-size: 1.7rem;
            }

            .buttons-container {
                flex-direction: column;
                align-items: center;
                gap: 15px;
                padding-bottom: 50px;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="images/logo.png" alt="" id="logo">
        <h1>Admin Dashboard</h1>
        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <main>

        <h2>Welcome
            <?php 
                // Assuming you have a session variable for the student's name
                
                if(isset($_SESSION['user_name'])) {
                    echo htmlspecialchars($_SESSION['user_name']);
                } else {
                    echo "Guest";
                }
            ?>
        </h2>

        <section class="buttons-container">
            <a href="registered_students.php" class="button-link">
                <i class="fa fa-user"></i>
                <span>View Registered Students</span>
            </a>

            <a href="view_enquiry.php" class="button-link">
                <i class="fa fa-envelope"></i>
                <span>View Enquiries</span>
            </a>

            <a href="show_mocktest_ranking.php" class="button-link">
                <i class="fa fa-bar-chart"></i>
                <span>Show Mocktest Rank</span>
            </a>

            <a href="show_exam_reports.php" class="button-link">
                <i class="fa fa-file-text"></i>
                <span>Show Exam Reports</span>
            </a>

        </section>

        <section class="buttons-container">

            <a href="manage_questions.php" class="button-link">
                <i class="fa fa-question-circle"></i>
                <span>Manage Questions</span>
            </a>
            
            <!-- <a href="add_subject.php" class="button-link">
                <i class="fa fa-plus-circle"></i>
                <span>Add New Subject</span>
            </a> -->

            <a href="website_settings.php" class="button-link">
                <i class="fa fa-cogs"></i>
                <span>Website Settings</span>
            </a>
            
        </section>

    </main>

    <footer>
        <p>Copyright&copy;OIPL- 
            <?php echo $current_year; ?>
        </p>
    </footer>
</body>
</html>