<?php 

    include "admin_only_validation.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- to change the website icon in browser -->
    <link rel="icon" href="images/logo.ico" type="image/x-icon">

    <title>Edit Questions | OIPL</title>

   


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

        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #f4f4f4;
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

        button:disabled {
            background-color: #999;
            cursor: not-allowed;
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

        #button-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
            /* font-size: 40px; */
        }

        

        .main-section {
            margin: 60px 30px;
            padding: 20px;
            border:1px solid #ccc;
            border-radius: 10px;
            background: whitesmoke;
            
        }

        label {
            font-size: 18px;
            padding: 12px 0;
            /* margin-bottom: 10px; */
            /* border: 1px solid #ccc; */
        }

        input,textarea,select {
            margin: 5px 0;
            border-radius: 10px;
            border: 1px solid #aaa;
            font-size: 16px;
        }


        @media screen and (max-width: 768px) {
            
            
            #heading {
                font-size: 1.5rem;
            }

            .table-section {
                width: 100%;
                margin: 20px 0;
                padding: 10px;
            }

            label,input,select {
            font-size: 13px;
            padding: 6px 10px;
            margin: 5px;
        }
            
            
        }

    </style>

</head>
<body>

    <!-- <header>    
        <a href="admin_dashboard.php">
            <button class="button">&LeftArrow; Back</button>
        </a>
        <h1 id="heading">Edit Questions</h1>
        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header> -->

    <section id="button-section">

        <button class="button" id="prev-question-btn">
            <i class="fa fa-chevron-left"></i>
            &nbsp;Prev Question
        </button>

        <div>
            <label for="question_id">Question Id:</label>
            <input type="text" disabled id="question_id" name="question_id" style="padding: 10px;" required>
        </div>
            

        <div>
            <!-- Add new question  -->
            <button class="button" id="new-question-btn" style="background-color: green; margin-right: 10px;" >
                <i class="fa fa-plus"></i>
                &nbsp;Add New Question
            </button>
            
            <button class="button" id="next-question-btn">Next Question&nbsp;
                <i class="fa fa-chevron-right"></i>
            </button>
        
        </div>


    </section>

    <section class="main-section">
        
        <form id="edit-question-form" action="update_question.php" method="POST">

            <div style="margin-bottom: 20px;">
                <label for="subject-name">Subject Name :</label><br>
                <select id="subject-name" name="subject_name" style="width: 100%; padding: 10px;" required>
                    <option value="Select">Select</option>
                    <option value="IT Tools">IT Tools</option>
                    <option value="Python">Python</option>
                    <option value="Web Design">Web Design</option>
                    <option value="IoT">IoT</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="question-text">Question :</label>
                <textarea id="question-text" name="question_text" rows="6" style="width: 100%; padding: 10px;" required></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="option_a">Option A :</label><br>
                <input type="text" id="option_a" name="option_a" style="width: 100%; padding: 10px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="option_b">Option B :</label><br>
                <input type="text" id="option_b" name="option_b" style="width: 100%; padding: 10px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="option_c">Option C :</label><br>
                <input type="text" id="option_c" name="option_c" style="width: 100%; padding: 10px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="option_d">Option D :</label><br>
                <input type="text" id="option_d" name="option_d" style="width: 100%; padding: 10px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="correct-option">Correct Option :</label><br>
                <select id="correct-option" name="correct_option" style="width: 100%; padding: 10px;" required>
                    <option value="Select">Select</option>
                    <option value="A">Option A</option>
                    <option value="B">Option B</option>
                    <option value="C">Option C</option>
                    <option value="D">Option D</option>
                </select>
            </div>

            <button type="submit" id="update-question-btn" class="button" style="float: right;">Update Question</button>

            <!-- save-question-btn -->
            <button type="submit" id="save-question-btn" class="button" style="float: right; display: none; background-color: green;">Save Question</button>
        </form>

    </section>

    <!-- this page will fetch the question_id from url and loads the question from database into form -->
    
    <script>

        
        const database_min_question_id = 
            <?php
            include "connection.php";
            $sql_min = "SELECT MIN(question_id) AS min_id FROM questions_table";
            $result_min = $conn->query($sql_min);
            $min_id = 1;
            if ($result_min->num_rows > 0) {
                $row_min = $result_min->fetch_assoc();
                $min_id = $row_min['min_id'];
            }
            echo $min_id;
            ?>;
        
        const database_max_question_id = 
            <?php
            include "connection.php";
            $sql_max = "SELECT MAX(question_id) AS max_id FROM questions_table";
            $result_max = $conn->query($sql_max);
            $max_id = 1;
            if ($result_max->num_rows > 0) {
                $row_max = $result_max->fetch_assoc();
                $max_id = $row_max['max_id'];
            }
            echo $max_id;
            ?>;

        // Function to get query parameters from URL
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }


        $(document).ready(function() {
            

            // Fetch question_id from URL
            const questionId = getQueryParam('question_id');

            if (questionId) {
                // Make an AJAX request to fetch question details
                $.ajax({
                    url: 'get_question.php',
                    type: 'GET',
                    data: { question_id: questionId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            const question = response.data;
                            // Populate the form fields with fetched data
                            $('#question_id').val(question.question_id);
                            $('#subject-name').val(question.subject_name);
                            $('#question-text').val(question.question);
                            $('#option_a').val(question.option_a);
                            $('#option_b').val(question.option_b);
                            $('#option_c').val(question.option_c);
                            $('#option_d').val(question.option_d);

                            // correct-option is a dropdown btn with four options
                            // compare each option and select accordingly
                            if(question.correct_answer === question.option_a)
                                $('#correct-option').val('A');
                            else if(question.correct_answer === question.option_b)
                                $('#correct-option').val('B');
                            else if(question.correct_answer === question.option_c)
                                $('#correct-option').val('C');
                            else if(question.correct_answer === question.option_d)
                                $('#correct-option').val('D');
                        } else {
                            alert('Question not found.');
                            $('#edit-question-form')[0].reset();
                            // hide update btn
                            $('#update-question-btn').hide();
                            // add save btn
                            $('#save-question-btn').show();
                        }
                    },
                    error: function() {
                        alert('Error fetching question details.');
                    }
                });
            } else {
                alert('No question ID provided in URL.');
            }


            // Next and Previous button functionality
            $('#next-question-btn').click(function() {
                const currentQuestionId = parseInt(getQueryParam('question_id'));
                const nextQuestionId = currentQuestionId + 1;
                // Redirect to the same page with the next question ID
                window.location.href = `edit_question.php?question_id=${nextQuestionId}`;
                
            });


            $('#prev-question-btn').click(function() {
            const currentQuestionId = parseInt(getQueryParam('question_id'));
            const prevQuestionId = currentQuestionId - 1;
            window.location.href = `edit_question.php?question_id=${prevQuestionId}`;
                // Redirect to the same page with the previous question ID
            
            });


            // Disable buttons if at the boundaries
            const currentQuestionId = parseInt(getQueryParam('question_id'));

            if(currentQuestionId <= database_min_question_id) { 
                $('#prev-question-btn').prop('disabled', true);
            }

            if(currentQuestionId >= database_max_question_id) {
                $('#next-question-btn').prop('disabled', true);
            }

            // update-question-btn updates question using ajax
            $('#update-question-btn').click(function(e) {
                e.preventDefault(); // Prevent default form submission
                $.ajax({
                    url: 'update_question.php',
                    type: 'POST',
                    data: {
                        question_id: $('#question_id').val(),
                        subject_name: $('#subject-name').val(),
                        question_text: $('#question-text').val(),
                        option_a: $('#option_a').val(),
                        option_b: $('#option_b').val(),
                        option_c: $('#option_c').val(),
                        option_d: $('#option_d').val(),
                        correct_option: $('#correct-option').val()
                    },
                    success: function(response) {
                        if(response.trim() === 'success') {
                            alert('Question updated successfully.');
                        } else if(response.trim() === 'error') {
                            alert('Error updating question.');
                        } else if(response.trim() === 'invalid') {
                            alert('Invalid data provided.');
                        } else {
                            alert('Unexpected response: ' + response);
                        }
                    },
                    error: function() {
                        alert('Error updating question.');
                    }
                });
            });


            // add new question button
            $('#new-question-btn').click(function() {
                // Redirect to edit_question.php with question_id as max_id + 1
                const newQuestionId = database_max_question_id + 1;
                window.location.href = `edit_question.php?question_id=${newQuestionId}`;
                $('#question_id').val(newQuestionId);

            });


            // save-question-btn functionality to save new question
            $('#save-question-btn').click(function(e) {
                e.preventDefault(); // Prevent default form submission
                $.ajax({
                    url: 'add_question.php',
                    type: 'POST',
                    data: {
                        subject_name: $('#subject-name').val(),
                        question_text: $('#question-text').val(),
                        option_a: $('#option_a').val(),
                        option_b: $('#option_b').val(),
                        option_c: $('#option_c').val(),
                        option_d: $('#option_d').val(),
                        correct_option: $('#correct-option').val()
                    },
                    success: function(response) {
                        if(response.trim() === 'success') {
                            alert('Question added successfully.');
                            //clear the form
                            $('#edit-question-form')[0].reset();
                            // Redirect to the newly added question's edit page
                            // const newQuestionId = database_max_question_id + 1;
                            // window.location.href = `edit_question.php?question_id=${newQuestionId}`;
                        } else if(response.trim() === 'error') {
                            alert('Error adding question.');
                        } else if(response.trim() === 'invalid') {
                            alert('Invalid data provided.');
                        } else {
                            alert('Unexpected response: ' + response);
                        }
                    },
                    error: function() {
                        alert('Error adding question.');
                    }
                });
            });



        });


        

        
    </script>





    





</body>
</html>