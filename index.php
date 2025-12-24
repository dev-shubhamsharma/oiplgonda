
<?php 

    $current_year = date("Y");
    $page_title = "Homepage | OIPL";

    $main_css_file = "css/main.css";
    $header_css_file = "css/header.css";

    $google_font = "https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap";
    $font_awesome_font = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
?>


<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- to change the website icon in browser -->
    <link rel="icon" href="images/logo.ico" type="image/x-icon">

    <title>
        <?php echo $page_title ?>
    </title>

    <?php 
        include ("libs/font-awesome.php");
        include ("libs/google-font.php");
        include ("libs/jquery.php");
    ?>

    <!-- main.css style link -->
    <link rel="stylesheet" href="<?php echo $main_css_file; ?>?v= <?php echo filemtime($main_css_file) ?>">

    <!-- header.css style link -->
    <link rel="stylesheet" href="<?php echo $header_css_file; ?>?v= <?php echo filemtime($header_css_file) ?>">

    <style>
        /************************  for courses section  ********************/

        section.section-header {
            background: #dcdde1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            padding-top: 50px;
            color: #192a56;
            font-size: 3vmin;
        }

        .course-section {
            display: flex;
            flex-direction: row;
            padding: 40px 40px 80px 40px;
            background: #dcdde1;
            align-items: center;
            justify-content: space-between;
        }

        .card {
            /* border: 1px solid grey; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            position: relative;
            width:45vmin;
            border-radius: 20px;
            padding-bottom: 20px;
            overflow: hidden;
            box-shadow: 5px 5px 10px rgba(0,0,0,0.1);
            margin: 0 10px;
        }

        .img-wrapper {
            width: 100%;
            height: 70%;
            /* border: 1px solid red; */
            overflow: hidden;
        }

        .img-wrapper img {
            min-height: 100%;
            width: 100%;
        }

        h3.course-title {
            font-size: 4vmin;
            margin: 10px 20px;
            color: #2f3640;
        }

        .duration {
            font-size: 15px;
            margin: 0 20px;
        }

        .level {
            font-size: 12px;
            margin: 10px 20px;
        }

        .more-btn {
            text-decoration: none;
            color: #fff;
            background: linear-gradient(to left,#1488CC,#2B32B2) ;
            padding: 8px 20px;
            border-radius: 20px;
            position: absolute;
            bottom: 30px;
            right: 20px;
        }


/* **************************** for call button *********************** */

        #call-btn {
            position: fixed;
            bottom: 30px;
            right: 20px;
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            background-color: #2B32B2;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 50%;
        }

        #call-btn a {
            color: #fff;
        }


        /* ********************* for responsive screen **************************** */

        @media(max-width:1111px) {
            .course-section {
                overflow:scroll;
                -webkit-overflow-scrolling: touch;
                
            }

            .course-section::-webkit-scrollbar {
                display: none;
            }

            .card {
                min-width: 50vmin;
            }

            h3.course-title {
                font-size: 4.5vmin;
            }
        }

        @media(max-width: 500px){
            .course-section {
                padding: 30px 20px;
            }

            .card {
                min-width: 70vmin;
            }

            h3.course-title {
                font-size: 6vmin;
            }

            section.section-header {
                font-size: 5vmin;
            }
        }


    </style>
    

</head>
<body>
    
    <?php
        include "header.php";
    ?>



    <!-- main section -->


    <main>
        <h2>Learn, Practice & Get&nbsp;Certified</h2>
        <h3>We're always here to&nbsp;mentor&nbsp;you</h3>
        <a href="#courses" target="_self" id="sign-in-btn">View Courses</a>

    </main>


    <section class="section-header">
        <h2 class="section-heading">Featured Courses</h2>
    </section>

    <section class="course-section" id="courses">

        <!-- Tally card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/tally.png" alt="tally course image">
            </div>
            <h3 class="course-title">Accounting using Tally Prime</h3>
            <p class="duration">3 Months</p>
            <p class="level">Beginner <span class="fa fa-signal"></span></p>
            <a href="assets/Tally_Brochure.pdf" class="more-btn">More Details</a>
        </div>

        <!-- CCC card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images//ccc.png" alt="course image">
            </div>
            <h3 class="course-title">NIELIT CCC Certificate</h3>
            <p class="duration">3 Months</p>
            <p class="level">Beginner <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

        <!-- Olevel card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/olevel.png" alt="course image">
            </div>
            <h3 class="course-title">NIELIT O'level Diploma</h3>
            <p class="duration">12 Months</p>
            <p class="level">Beginner <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

        <!-- Web design card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/web.png" alt="course image">
            </div>
            <h3 class="course-title">Web Design and Development</h3>
            <p class="duration">3 Months</p>
            <p class="level">Intermediate <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

    </section>



    <!-- popular courses section -->

    <section class="section-header" style="background:#e58e26;">
        <h2 class="section-heading">Popular Courses</h2>
    </section>

    <section class="course-section" id="courses" style="background:#e58e26;">

        <!-- Python card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/python-course.png" alt="tally course image">
            </div>
            <h3 class="course-title">Programming using Python</h3>
            <p class="duration">3 Months</p>
            <p class="level">Advanced <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

        <!-- Iot card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/iot.png" alt="course image">
            </div>
            <h3 class="course-title">Internet of Things (IoT)</h3>
            <p class="duration">3 Months</p>
            <p class="level">Beginner <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

        <!-- Olevel card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/dit.png" alt="course image">
            </div>
            <h3 class="course-title">Diploma in Info. Technology (DIT)</h3>
            <p class="duration">12 Months</p>
            <p class="level">Beginner <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

        <!-- Web design card -->

        <div class="card">
            <div class="img-wrapper">
                <img src="images/java.png" alt="course image">
            </div>
            <h3 class="course-title">Programming using Java</h3>
            <p class="duration">3 Months</p>
            <p class="level">Beginner <span class="fa fa-signal"></span></p>
            <a href="#" class="more-btn">More Details</a>
        </div>

    </section>


    <?php
    
    include "footer.php";
    
    ?>




    


    <div id="call-btn">
        <a href="tel:7800422341">
             <span class="fa fa-phone"></span>
        </a>
    </div>

    <script src="js/enquiry_script.js"></script>
    
</body>
</html>
