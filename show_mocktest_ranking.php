<?php 

    session_start();

    include "connection.php";


    $query = "select user_name,subject_name,
    MAX(total_questions) as total_questions,
    ROUND(AVG(score),2) as average_score
    from mocktest_performance_table
    group by user_id,subject_name 
    order by average_score DESC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0)
        die("No Data Found to Display");


    




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking | OIPL</title>

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

        #rank-table-container {
            margin: 20px;
        }

        #rank-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }

        #rank-table th, #rank-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        #rank-table th {
            background-color: #f2f2f2;
        }

        .profile-image {
            border-radius: 50%;
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

            .box {
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                padding: 5px;
                /* margin: 0px; */
                /* border: 1px solid red; */
            }

            #button-section {
                flex-direction: column;
                align-items: center;
                /* border: 1px solid green; */
                margin: 20px 10px;
            }


            label, input, select {
                margin: 0px;
            }

            /* make table responsive for mobile */

            #rank-table-container {
                overflow-x: auto;
            }

            #rank-table {
                font-size: 18px;
                width: 100%;
                
            }
        }

        

    </style>
</head>
<body>
    
    <header>    
        <a href="admin_dashboard.php">
            <button class="button">&LeftArrow; Back</button>
        </a>
        <h1 id="heading">Student Ranking</h1>

        <!-- <a href="logout.php">
            <button class="button">Logout</button>
        </a> -->
    </header>
    
    <div id="button-section">
        <div class="box">
            <label for="rank-type">Ranking Subject : </label>
            <select name="rank-type" id="rank-type">
                <option value="all">All</option>
                <option value="IT Tools">IT Tools</option>
                <option value="Web Design">Web Design</option>
                <option value="Python">Python</option>
                <option value="IoT">IoT</option>
            </select>
        </div>
        
    </div>

    <main id="rank-table-container">
        <table id="rank-table">
            <thead>
                <tr>
                    <th>Student Rank</th>
                    <th>Profile Photo</th>
                    <th>Student Name</th>
                    <th>Subject Name</th>
                    <th>Attempted Ques (Avg.)</th>
                    <th>Correct Answers (Avg.)</th>
                </tr>
            </thead>
            <!-- bold current user name -->


            <tbody>
                
                <?php
                
                    $count = 1; 
                    while($row = $result->fetch_assoc()) {
                        echo "<script>console.log(".json_encode($row).")</script>";

                        // to color the row for current user

                        
                        if($row['user_name'] == $_SESSION['user_name']) {
                            echo "<tr style='font-weight: bold; background-color: #3392beff;'>
                                <td>$count</td>
                                <td><img src=\"images/user.png\" width=\"50\" height=\"50\" class=\"profile-image\"></td>
                                <td>".$row['user_name']."</td>
                                <td>".$row['subject_name']."</td>
                                <td>".$row['total_questions']."</td>
                                <td>".$row['average_score']."</td>
                                
                            </tr>";
                            $count++;
                            continue;
                        } 
                        else 
                        {
                            echo "<tr style='font-weight: bold; background-color: #3392beff;'>
                                <td>$count</td>
                                <td><img src=\"images/user.png\" width=\"50\" height=\"50\" class=\"profile-image\"></td>
                                <td>".$row['user_name']."</td>
                                <td>".$row['subject_name']."</td>
                                <td>".$row['total_questions']."</td>
                                <td>".$row['average_score']."</td>
                                
                            </tr>";
                            $count++;

                        }
                            

                        
                        // Process each row
                        // You can store the rows in an array or directly generate HTML here
                    }

    
                ?>



                
            </tbody>
        </table>


        
    </main>





</body>
</html>