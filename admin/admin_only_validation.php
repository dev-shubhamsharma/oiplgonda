
<!-- To check that the user is logged in -->


<?php
session_start();

// Check if user is logged in
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
    echo "<h2>Access Denied: You are not authorized to view this page.</h2>";

    echo "Go to <a href='login.php'> Login Page</a>";
    // header('Location: login.php');
    exit();
}
?>