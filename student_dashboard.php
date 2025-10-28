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

if ($_SESSION['user_email_id'] == $admin_email) {
    header('Location: admin_dashboard.php');
    exit();
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | OIPL</title>

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
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="images/logo.png" alt="" id="logo">
        <h1>Student Dashboard</h1>
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

    </main>

    <footer>
        <p>Copyright&copy;OIPL- 
            <?php echo $current_year; ?>
        </p>
    </footer>
</body>
</html>