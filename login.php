
<?php 

    $current_year = date("Y");
    $page_title = "Login | OIPL";

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

    <!-- Jquery cdn link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            /* border: 1px solid red; */
        }

        .form input {
            border: none;
            border-radius: 3px;
        }

        /* #msg {
            text-align: center;
            color: red;
            display: none;
        } */



        
        #login-btn {
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

        #login-btn::before {
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

        #login-btn:hover::before {
            transform: translateX(0%);
        }


        #msg {
            text-align: center;
            padding: 10px;
            margin-top: 15px;
            border-radius: 4px;
            display: none; /* Initially hidden, will be shown by JS */
        }
        .error-msg {
            color: #a81624ff; 
            /* background-color: #f8d7da;  */
            /* border: 1px solid #f5c6cb; */
            /* display: block !important; */
        }
        .success-msg {
            color: #155724 !important;
            /* background-color: #d4edda;  */
            /* border: 1px solid #c3e6cb; */
            /* display: block !important; */
        }


        


        @media(max-width:700px) {



        main {
            height: 100vh;
            max-width: 100vw;
            padding: 0;
        }

        main h2 {
            font-size: 40px;
        }

        main .form {
            padding: 30px 20px;
        }


        #login-btn {
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
        <h2 class="middle-heading">Student Login</h2>
        <form class="form" id="login_form">
            <div class="input-container">   
                <label for="email">Email Id</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-container">
                <input type="submit" id="login-btn" value="Login">
            </div>
            <p id="msg">User id or Password is incorrect</p>
    </form>
    </main>







    <script>
        $(document).ready(function() {
            $('#login_form').submit(function(event) {
                // Prevent the default form submission (page reload)
                event.preventDefault();

                // Clear previous messages and hide the element
                $('#msg').text('').removeClass('success-msg error-msg').hide();

                var email = $('#email').val(); 
                var password = $('#password').val();

                // Get form data
                var formData = $(this).serialize();
                
                // Disable the button during AJAX call to prevent double-submission
                $('#login-btn').prop('disabled', true).val('Logging In...');

                // AJAX POST request
                $.ajax({
                    type: 'POST',           // HTTP method
                    url: 'process_login.php',   // Server-side script to handle the data
                    // data: {
                    //     email: email,
                    //     password: password
                    // },   
                    data: formData,      // Data to be sent (email and password)
                    dataType: 'json',       // Expecting JSON response from the server
                    encode: true
                })
                .done(function(data) {
                    // Re-enable button
                    $('#login-btn').prop('disabled', false).val('Login');

                    // Check the 'status' from the server (which is 'success' or 'error')
                    if (data.status === 'success') {
                        // Successful login
                        $('#msg').addClass('success-msg').text(data.message);
                        
                        // Redirect if the server sent a redirect path (recommended in the PHP code)
                        if (data.redirect) {
                            // Use setTimeout for a small delay before redirecting
                            setTimeout(function() {
                                window.location.href = data.redirect;
                            }, 500); 
                        }
                        
                    } else if (data.status === 'error') {
                        // Failed login (validation errors or authentication/verification failed)
                        
                        let displayMessage = data.message;
                        
                        // If specific field errors are sent (like validation errors)
                        if (data.errors && Array.isArray(data.errors) && data.errors.length > 0) {
                            displayMessage += " " + data.errors.join(", ");
                        }
                        
                        $('#msg').addClass('error-msg').text(displayMessage);
                    }
                    
                    // Show the message element
                    $('#msg').show();
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle network error, 404, 500 status codes, or malformed JSON response
                    $('#msg').addClass('error-msg').text('An unknown server or network error occurred. Please try again.');
                    // Show the message element
                    $('#msg').show();
                    // Re-enable button
                    $('#login-btn').prop('disabled', false).val('Login');
                    
                    console.log("AJAX Error: ", textStatus, errorThrown, jqXHR.responseText);
                });
            });
        });
        </script>
    
    

    
</body>
</html>
