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

    <title>Registered Students | OIPL</title>

   


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
            width: 15%;
        }

        td:nth-child(3), th:nth-child(3) {
            width: 15%;
        }

        td:nth-child(4), th:nth-child(4) {
            width: 20%;
        }

        td:nth-child(5), th:nth-child(5) {
            width: 10%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .fa-trash {
            background-color: red;
            border: none;
            cursor: pointer;
            padding : 6px 12px;
            color: #fff;
            border-radius: 5px;
        }

        .fa-trash:hover {
            background-color: darkred;
        }

        .verify-btn {
            background-color: green; 
            border: none;
            cursor: pointer;
            padding : 6px 12px;
            color: #fff;
            border-radius: 5px;
        }

        .verify-btn:hover {
            background-color: darkgreen; 
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
        <h1 id="heading">Registered Students</h1>
        <a href="logout.php">
            <button class="button">Logout</button>
        </a>
    </header>

    <section id="button-section">
        <input type="text" id="search-box" name="search" placeholder="Search by name, mobile number or email..." onkeyup="searchStudents()" style="width: 400px;" >
        <div>
            <label for="filter">Filter : </label>
            <select name="filter" id="filter">
                <option value="All">All</option>
                <option value="Verified">Verified</option>
                <option value="Not Verified">Not Verified</option>
            </select>
        </div>
        
    </section>

    <section class="table-section">
        <table id="students-table">
            <thead>
                <tr>
                    <th>Reg.Id</th>
                    <th>Student Name</th>
                    <th>Mobile No</th>
                    <th>Email Id</th>
                    <th>Verified</th>
                    <th>DateTime</th>
                    <th>Verify</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="students-tbody">
                <!-- Student rows will be populated here via JavaScript -->
            </tbody>
        </table>

    </section>








    <script>
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

                        // if verification_status is 0, show verify and delete buttons
                        if (student.verification_status == 0) {
                        verifyButton = `<button class="verify-btn" data-id="${student.student_id}">Verify</button>`;

                        deleteButton = `<button class="fa fa-trash" data-id="${student.student_id}"></button>`;

                        } 
                        // ohterwise show only gray "Verified" text and delete button
                        else {
                            verifyButton = `<span style="color:gray;">Verified</span>`;
                            deleteButton = `<button class="fa fa-trash" data-id="${student.student_id}"></button>`;
                        }

                        rows += `
                            <tr>
                                <td>${student.student_id}</td>
                                <td>${student.student_name}</td>
                                <td>${student.mobile_number}</td>
                                <td>${student.email_id}</td>
                                <td style="color:${color}">${verified}</td>
                                <td>${student.date_time}</td>
                                <td>${verifyButton}</td>
                                <td>${deleteButton}</td>
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


        // Delete button click
        $(document).on("click", ".fa-trash", function() {
            const studentId = $(this).data("id");
            const button = $(this);

            if (confirm("Are you sure you want to delete this student?")) {
                $.ajax({
                    url: "delete_student.php",
                    method: "POST",
                    data: { student_id: studentId },
                    success: function(response) {
                        if (response.trim() === "success") {
                            alert("Student deleted successfully!");
                            loadStudents(); // Refresh table
                        } else {
                            alert("Error deleting student.");
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
    </script>







</body>
</html>