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

    <title>Manage Questions | OIPL</title>

   


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

        #button-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
            /* font-size: 40px; */
        }

        label,input,select {
            font-size: 18px;
            padding: 8px 12px;
            margin: 5px;
        }

        .table-section {
            margin: 20px;
            padding: 20px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
            overflow: auto;
        }

        table {
            /* width: 100%; */
            border-collapse: collapse;
            border: 1px solid #ccc;
            font-family: Arial, Helvetica, sans-serif;
            overflow: scroll;
            /* margin: 50px; */
        }

        p {
            font-family: Arial, Helvetica, sans-serif;
        }

        th {
            color: #1488CC;
        }

        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        td:nth-child(1) {
            width: 10%;
        }

        /* td:nth-child(2) {
            width: 20%;
        }

        td:nth-child(3) {
            width: 10%;
        } */
/* 
        td:nth-child(4), th:nth-child(5), td:nth-child(6), th:nth-child(7), th:nth-child(8) {
            width: 10%;
        } */

        td:nth-child(9) {
            width: 15%;
        }


        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .edit-btn:hover{
            background-color: #1488CC
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

    <header>    
        <a href="admin_dashboard.php">
            <button class="button">&LeftArrow; Back</button>
        </a>
        <h1 id="heading">Manage Questions</h1>
        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <section id="button-section">
        <input type="text" id="search-box" name="search" placeholder="Search by id or keyword..." style="width: 400px;" >

        <p id="entry-count">Total Entries : 0</p>

        <!-- Add new question  -->
        <button class="button" id="new-question-btn" style="background-color: green; margin-right: 10px;" >
            <i class="fa fa-plus"></i>
            &nbsp;Add New Question
        </button>
        
    </section>

    <section class="table-section">
        <table id="questions-table">
            <thead>
                <tr>
                    <th>Ques.Id</th>
                    <th>Subject</th>
                    <th>Question Text</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Correct Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="questions-tbody">
                <!-- Question rows will be populated here via JavaScript -->
            </tbody>
        </table>

    </section>








    <script>
    $(document).ready(function() {

        // Fetch and display students
        function loadQuestions() {
            $.ajax({
                url: "fetch_questions.php",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    let rows = "";
                    $.each(data, function(index, question) {
                        // let verified = student.verification_status == 1 ? "Yes" : "No";
                        // let color = student.verification_status == 1 ? "green" : "red";

                        // let button = "";

                        // if (question.verification_status == 0) {
                        editButton = `<button class="edit-btn fa fa-edit" data-id="${question.question_id}" 
                                    style="background-color:green;color:white;border:none;padding:6px 12px;border-radius:5px;cursor:pointer;">
                                    &nbsp;Edit</button>`;

                        deleteButton = `<button class="delete-btn fa fa-trash" data-id="${question.question_id}" style="background-color:red;color:white;border:none;padding:6px 12px;border-radius:5px;cursor:pointer;">
                        &nbsp;Delete</button>`;

                        // } else {
                        //     button = `<span style="color:gray;">Verified</span>`;
                        // }

                        rows += `
                            <tr>
                                <td>${question.question_id}</td>
                                <td>${question.subject_name}</td>
                                <td>${escapeHTML(question.question)}</td>
                                <td>${escapeHTML(question.option_a)}</td>
                                <td>${escapeHTML(question.option_b)}</td>
                                <td>${escapeHTML(question.option_c)}</td>
                                <td>${escapeHTML(question.option_d)}</td>
                                <td>${escapeHTML(question.correct_answer)}</td>
                                <td>${editButton} ${deleteButton}</td>
                            </tr>
                        `;
                    });
                    $("#questions-tbody").html(rows);

                    var rowCount = $('#questions-tbody tr:visible').length;
                    $("#entry-count").html("Total Entries : "+rowCount);
                    console.log(rowCount);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }

        // Initial load
        loadQuestions();


        //edit button click
        // this button will open a new page in new tab where question can be edited with all options
        $(document).on("click", ".edit-btn", function() {
            const questionId = $(this).data("id");
            // Redirect to edit question page with question ID as a query parameter
            window.open(`edit_question.php?question_id=${questionId}`, '_blank');
            
        
        });



        // delete button click
        $(document).on("click", ".delete-btn", function() {
            const questionId = $(this).data("id");
            const button = $(this);

            if (confirm("Are you sure you want to delete this question?")) {
                $.ajax({
                    url: "delete_question.php",
                    method: "POST",
                    data: { question_id: questionId },
                    success: function(response) {
                        if (response.trim() === "success") {
                            alert("Question deleted successfully!");
                            loadQuestions(); // Refresh table
                        } else {
                            alert("Error deleting question.");
                        }
                    },
                    error: function() {
                        alert("AJAX request failed.");
                    }
                });
            }
        });










        // 🔍 Search functionality
        $("#search-box").on("keyup", function() {
            const value = $(this).val().toLowerCase();
            $("#questions-tbody tr").filter(function() {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                );
            });
            var rowCount = $('#questions-tbody tr:visible').length;
            $("#entry-count").html("Total Entries : "+rowCount);
            console.log(rowCount);


            
        });

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

        // New Question button click
        $('#new-question-btn').click(function() {
            // Redirect to edit_question.php with question_id as max_id + 1
            const newQuestionId = database_max_question_id + 1;
            // window.location.href = `edit_question.php?question_id=${newQuestionId}`,'_blank';
            window.open(`edit_question.php?question_id=${newQuestionId}`, '_blank');
            $('#question_id').val(newQuestionId);

        });





        function escapeHTML(str) {
            return $("<div>").text(str).html();
        }

    });
    </script>







</body>
</html>