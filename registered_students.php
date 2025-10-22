<?php 

    $google_font = "https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students | OIPL</title>

    <!-- google font cdn link -->
    <link href="<?php echo $google_font ?>" rel="stylesheet">

    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #heading {
            text-align: center;
            /* margin: 10px; */
            padding: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #2B32B2;
            font-size: 35px;
            border-bottom: 2px solid #ccc;
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
            width: 12%;
        }

        td:nth-child(2), th:nth-child(2) {
            width: 20%;
        }

        td:nth-child(3), th:nth-child(3) {
            width: 15%;
        }

        td:nth-child(4), th:nth-child(4) {
            width: 25%;
        }

        td:nth-child(5), th:nth-child(5) {
            width: 15%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }


        @media screen and (max-width: 768px) {
            
            #heading {
                font-size: 30px;
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
    
    <h2 id="heading">Registered Students</h2>

    <section id="button-section">
        <input type="text" id="search-box" name="search" placeholder="Search by name or email..." onkeyup="searchStudents()">
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
                url: "fetch_students.php",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    let rows = "";
                    $.each(data, function(index, student) {
                        let verified = student.verification_status == 1 ? "Yes" : "No";
                        rows += `
                            <tr>
                                <td>${student.student_id}</td>
                                <td>${student.student_name}</td>
                                <td>${student.mobile_number}</td>
                                <td>${student.email_id}</td>
                                <td>${verified}</td>
                                <td>${student.date_time}</td>
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