<?php
    // session_start();
    
    include "admin_only_validation.php";

    include "connection.php";
    // Fetch current settings from the database
    $settings_query = "SELECT setting_key, setting_value FROM website_settings_table";
    $settings_result = $conn->query($settings_query);

    $settings = [];
    if ($settings_result->num_rows > 0) {
        while ($row = $settings_result->fetch_assoc()) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Settings | OIPL</title>

    <?php

        include "libs/jquery.php";
    ?>

    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: whitesmoke;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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


        main {
            margin: 40px auto;
            width: 80%;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 40px 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        input.input-box {
            width: 90%;
            padding: 8px 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        tr {
            border-bottom: 1px solid #ccc;
        }

        td {
            padding: 15px 0;
            font-size: 18px;
        }

        #save-setting-btn {
            /* display: block; */
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #203f8eff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        #save-setting-btn:hover {
            background-color: #1a3266ff;
            
        }



        @media screen and (max-width: 600px) {
            header {
                flex-direction: column-reverse;
                align-items: center;
                gap: 10px;
            }

            h1 {
                font-size: 1.5rem;
            }

        }

        

    </style>


</head>
<body>
    
    <header>    
        <a href="admin_dashboard.php">
            <button class="button">&LeftArrow; Back</button>
        </a>
        <h1 id="heading">Website Settings</h1>

        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <main>
            
        <table>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Setting Name (Key)</td>
                <td style="padding: 10px; font-weight: bold;">Setting Value</td>
            </tr>

            <tr>
                <td><label for="exam-questions-limit">Exam Questions Limit</label></td>
                <td><input type="number" class="input-box" id="exam-questions-limit" name="exam-questions-limit" value="<?php echo $settings["exam_questions_limit"]; ?>"></td>
            </tr>

            <tr>
                <td>
                    <label for="exam-subject-name">Exam Subject Name</label>
                </td>
                <td>
                    <input type="text" class="input-box" id="exam-subject-name" name="exam-subject-name" value="<?php echo $settings["exam_subject_name"]; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="mocktest-questions-limit">Mocktest Questions Limit</label>
                </td>
                <td>
                    <input type="number" class="input-box" id="mocktest-questions-limit" name="mocktest-questions-limit" value="<?php echo $settings["mocktest_questions_limit"]; ?>">
                </td>
            </tr>

        </table>

        <button class="button" id="save-setting-btn">Save Settings</button>

        <script>
            $(document).ready(function(){

                $("#save-setting-btn").click(function(){

                    var exam_questions_limit = $("#exam-questions-limit").val();
                    var exam_subject_name = $("#exam-subject-name").val();
                    var mocktest_questions_limit = $("#mocktest-questions-limit").val();

                    $.ajax({
                        url: 'save_website_settings.php',
                        type: 'POST',
                        data: {
                            exam_questions_limit: exam_questions_limit,
                            exam_subject_name: exam_subject_name,
                            mocktest_questions_limit: mocktest_questions_limit
                        },
                        success: function(response) {
                            alert("Settings saved successfully!");
                        },
                        error: function() {
                            alert("An error occurred while saving settings.");
                        }
                    });

                });

            });


        </script>


    </main>


</body>
</html>