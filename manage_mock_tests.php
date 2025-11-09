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

    <title>Manage Mock Tests | OIPL</title>

   


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
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            font-family: Arial, Helvetica, sans-serif;
            overflow: scroll;
            /* margin: 50px; */
        }

        th {
            color: #1488CC;
        }

        td:nth-child(1), th:nth-child(1) {
            width: 8%;
        }

        td:nth-child(2), th:nth-child(2) {
            width: 25%;
        }

        td:nth-child(3), th:nth-child(3) {
            width: 15%;
        }

        td:nth-child(4), th:nth-child(4) {
            width: 20%;
        }

        td:nth-child(5), th:nth-child(5) {
            width: 20%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        #new-test-form {
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.8); 
            display: flex; 
            justify-content: center; 
            align-items: center;
        }

        #new-test-form form {
            background-color: #f9f9f9; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.3); 
            width: 400px;
        }

        h2 {
            color: #203f8eff; 
            /* background-color: green; */
            padding: 20px 0px;
            /* margin: 20px 0;  */
        }

        #close-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            float:right;
            border: none; 
            color: black; 
            cursor: pointer;
            font-size: 30px;
            line-height: 15px;
            background-color: transparent;
        }

        .input-box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        #save-test-btn {
            margin-top: 20px;
            background-color: #203f8eff;
            border: none;
            color: white;
            display: block;
            width: 100%;
        }

        #cancel-btn {
            margin-top: 10px;
            background-color: red;
            border: none;
            color: white;
            display: block;
            width: 100%;
        }

        #cancel-btn:hover {
            background-color: #8b0909ff;
        }

        #save-test-btn:hover {
            background-color: #162d55;
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
        <h1 id="heading">Manage Mock Tests</h1>
        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <section id="button-section">
        <input type="text" id="search-box" name="search" placeholder="Search test by name.." onkeyup="searchTests()" style="width: 400px;" >
        <div>
            <!-- <label for="filter">Filter : </label>
            <select name="filter" id="filter">
                <option value="All">All</option>
                <option value="Verified">Verified</option>
                <option value="Not Verified">Not Verified</option>
            </select> -->

            <button id="add-test-btn" class="button fa fa-plus-square" style="background-color: green;">&nbsp;&nbsp;Add New Test</button>
        </div>
        
    </section>

    <section class="table-section">
        <table id="tests-table">
            <thead>
                <tr>
                    <th>Test Id</th>
                    <th>Subject Name</th>
                    <th>Number of Questions</th>
                    <th>Time Allotted (minutes)</th>
                    <th>Creator Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tests-tbody">
                <!-- Test rows will be populated here via JavaScript -->
            </tbody>
        </table>

    </section>

    <div id="new-test-form">
        <!-- Form to add new test will go here -->
         <!-- this form is responsive and beautifully design -->
        
        <form>
            <button id="close-btn">&times;</button>

            <h2>Add New Test</h2>
            
            <input type="text" id="subject_name" class="input-box" name="subject_name" placeholder="subject name" required>
            <br>
            <input type="number" id="num_questions" class="input-box" name="num_questions" placeholder="number of questions" required>
            <br>
            <input type="number" id="time_allotted" class="input-box" name="time_allotted" placeholder="time allotted (minutes)" required>
            <br>
            <input type="text" id="creator_name" class="input-box" name="creator_name" placeholder="creator name"  required>
            <br>
            <button type="submit" class="button" id="save-test-btn">Add Test</button>
            <button type="button" id="cancel-btn" class="button" style="background-color: red;">Cancel</button>

        </form>

    </div>





    <script>

        // bydefault hide the new test form
        $("#new-test-form").hide();

        // this will open a popup to add new test on overlay format
        $("#add-test-btn").on("click", function() {
            $("#new-test-form").show();
        });

        // this will close the popup form
        $("#close-btn, #cancel-btn").on("click", function() {
            $(".input-box").val('');
            $("#new-test-form").hide();
        });

        $("#save-test-btn").on("click", function(event) {
            event.preventDefault();

            const subjectName = $("#subject_name").val().trim();
            const numQuestions = $("#num_questions").val().trim();
            const timeAllotted = $("#time_allotted").val().trim();
            const creatorName = $("#creator_name").val().trim();

            if (subjectName === "" || numQuestions === "" || timeAllotted === "" || creatorName === "") {
                alert("Please fill in all fields.");
                return;
            }

            $.ajax({
                url: "add_new_test.php",
                method: "POST",
                data: {
                    subject_name: subjectName,
                    num_questions: numQuestions,
                    time_allotted: timeAllotted,
                    creator_name: creatorName
                },
                success: function(response) {
                    alert("New test added successfully!");
                    $(".input-box").val('');
                    $("#new-test-form").hide();
                    loadTests(); // Refresh the tests table
                },
                error: function() {
                    alert("Error adding new test.");
                }
            });
        });



    </script>






    <!-- <script>
    $(document).ready(function() {

        // Fetch and display students
        function loadStudents() {
            $.ajax({
                url: "fetch_student_data.php",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    let rows = "";
                    $.each(data, function(index, student) {
                        let verified = student.verification_status == 1 ? "Yes" : "No";
                        let color = student.verification_status == 1 ? "green" : "red";

                        let button = "";

                        if (student.verification_status == 0) {
                        button = `<button class="verify-btn" data-id="${student.student_id}" 
                                    style="background-color:green;color:white;border:none;padding:6px 12px;border-radius:5px;cursor:pointer;">
                                    Verify</button>`;
                        } else {
                            button = `<span style="color:gray;">Verified</span>`;
                        }

                        rows += `
                            <tr>
                                <td>${student.student_id}</td>
                                <td>${student.student_name}</td>
                                <td>${student.mobile_number}</td>
                                <td>${student.email_id}</td>
                                <td style="color:${color}">${verified}</td>
                                <td>${student.date_time}</td>
                                <td>${button}</td>
                            </tr>
                        `;
                    });
                    $("#students-tbody").html(rows);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }

        // Initial load
        loadStudents();

        // Verify button click
        $(document).on("click", ".verify-btn", function() {
            const studentId = $(this).data("id");
            const button = $(this);

            if (confirm("Are you sure you want to verify this student?")) {
                $.ajax({
                    url: "verify_students.php",
                    method: "POST",
                    data: { student_id: studentId },
                    success: function(response) {
                        if (response.trim() === "success") {
                            alert("Student verified successfully!");
                            loadStudents(); // Refresh table
                        } else {
                            alert("Error verifying student.");
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
            $("#students-tbody tr").filter(function() {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                );
            });
        });

        // ✅ Filter verified / not verified
        $("#filter").on("change", function() {
            const filterValue = $(this).val();
            $("#students-tbody tr").each(function() {
                const status = $(this).find("td:nth-child(5)").text().trim();
                if (filterValue === "All" ||
                    (filterValue === "Verified" && status === "Yes") ||
                    (filterValue === "Not Verified" && status === "No")) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

    });
    </script> -->







</body>
</html>