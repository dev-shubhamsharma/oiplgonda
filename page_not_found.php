
<?php 

    

    $current_year = date("Y");
    $page_title = "Page not found | OIPL";

    $css_file = "css/main.css";
    $google_font = "https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap";
    $font_awesome_font = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
?>


<!-- To check the enquiry submitted or not on redirection of home page -->







<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $page_title ?>
    </title>

    <!-- font-awesome 4 icons cdn link -->

    <link rel="stylesheet" href="<?php echo $font_awesome_font; ?>">

    <!-- google font cdn link -->
    <link href="<?php echo $google_font ?>" rel="stylesheet">

    <!-- css style link -->
    <!-- <link rel="stylesheet" href="<?php echo $css_file; ?>?v= <?php echo filemtime($css_file) ?>"> -->

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        

        main {
            max-width: 100vw;
            min-height: calc( 100vh - 0px) ;
            /* background: url('https://27mi124bz6zg1hqy6n192jkb-wpengine.netdna-ssl.com/wp-content/uploads/2021/06/June-21-Adding-SEL-Components-to-a-High-School-Classroom_web-768x512.jpg'); */
            background:linear-gradient(to bottom, rgba(75, 17, 51, 0.8), rgba(87, 11, 55, 0.5)), url('https://images.pexels.com/photos/6963098/pexels-photo-6963098.jpeg');
            background-position: center;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* border: 1px solid red; */

            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
            text-align: center;

        }

        main h1 {
            font-size: 100px;
            color: #e1b12c;
        }

        main h2 {
            color: #fff;
            font-size: 40px;
            margin-bottom: 15px;
        }


        main h3 {
            
            font-size: 30px;
            background-color: #2C3A47;
            /* opacity: 0.8; */
            padding: 40px;
            border-radius: 10px;
            color: #F8EFBA;
            line-height: 60px;
        }

        #sign-in-btn {
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

        a {
            text-decoration: none;
        }

        #sign-in-btn::before {
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

        #sign-in-btn:hover::before {
            transform: translateX(0%);
        }




    </style>
    

</head>
<body>


    <!-- main section -->


    <main>
        <h1>Error - 404</h1>
        <h2>PAGE NOT FOUND</h2>
        
        <h3>
            The page you requested could not be found.
            <br>
            We're working on it :)
        </h3>
        <br></br>
        <a href="index.php" target="_self" id="sign-in-btn">Back to Homepage</a>

    </main>
    
</body>
</html>
