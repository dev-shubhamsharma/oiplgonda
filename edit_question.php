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

        <button class="button">
            <i class="fa fa-chevron-left"></i>
            &nbsp;Prev Question
        </button>

        <div>
            <label for="question_id">Question Id:</label>
            <input type="text" disabled id="question_id" name="question_id" style=" padding: 10px;" required>
        </div>
            <!-- <label for="filter">Filter : </label>
            <select name="filter" id="filter">
                <option value="All">All</option>
                <option value="Verified">Verified</option>
                <option value="Not Verified">Not Verified</option>
            </select> -->
        
        <button class="button">Next Question&nbsp;
            <i class="fa fa-chevron-right"></i>
        </button>
        
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

            <button type="submit" class="button" style="float: right;">Update Question</button>
        </form>

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
                                    Edit</button>`;

                        deleteButton = `<button class="delete-btn fa fa-trash" data-id="${question.question_id}" style="background-color:red;color:white;border:none;padding:6px 12px;border-radius:5px;cursor:pointer;">
                        Delete</button>`;


                        // } else {
                        //     button = `<span style="color:gray;">Verified</span>`;
                        // }

                        rows += `
                            <tr>
                                <td>${question.question_id}</td>
                                <td>${question.subject_name}</td>
                                <td>${question.question}</td>
                                <td>${editButton} ${deleteButton}</td>
                            </tr>
                        `;
                    });
                    $("#questions-tbody").html(rows);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }

        // Initial load
        loadQuestions();

        //edit button click
        // this button will open a new page where question can be edited with all options
        $(document).on("click", ".edit-btn", function() {
            const questionId = $(this).data("id");
            // Redirect to edit question page with question ID as a query parameter
            window.location.href = `edit_question.php?question_id=${questionId}`;
        
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
        });

        // ✅ Filter verified / not verified
        // $("#filter").on("change", function() {
        //     const filterValue = $(this).val();
        //     $("#students-tbody tr").each(function() {
        //         const status = $(this).find("td:nth-child(5)").text().trim();
        //         if (filterValue === "All" ||
        //             (filterValue === "Verified" && status === "Yes") ||
        //             (filterValue === "Not Verified" && status === "No")) {
        //             $(this).show();
        //         } else {
        //             $(this).hide();
        //         }
        //     });
        // });

    });
    </script>







</body>
</html>