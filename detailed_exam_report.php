<?php 

// detailed_exam_report.php
// this file shows the detailed exam report of a student
include "connection.php";


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $total_questions = $_GET['total'];
    $correct_answers = $_GET['correct'];
    $wrong_answers = $_GET['wrong'];
    $unattempted_questions = $_GET['unattempt'];



} else {
    die("<h1>User ID not provided</h1>");
    exit();
}

$sql = "SELECT q.question, q.option_a, q.option_b, q.option_c, q.option_d, q.correct_answer,ea.user_id, ea.user_name, ea.selected_answer, ea.datetime  FROM questions_table q JOIN exam_answers_table ea ON q.question_id = ea.question_id WHERE ea.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    die("<h1>User not found</h1>");
    exit();
}

// print_r($questions);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Examination Report | OIPL</title>


    <?php  include "libs/jquery.php"; ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: whitesmoke;
        }

        table {
            margin: 50px auto;
            width: 80%;
            border: 1px solid grey;
            border-collapse: collapse;
        }

        table tr td {
            padding: 20px;
        }

        table tr td{
            border-bottom: 1px solid grey;
        }

        table tr:first-child td {
            text-align: center;
        }

        tr td ol {
            margin-left: 50px;
        }

        ol li {
            margin: 8px 0;
        }

        h3 {
            margin: 15px 0;
            margin-left: 20px;
        }

        td p {
            margin: 5px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #203f8eff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: white;
        }

    </style>
</head>
<body>

    <main>
        <table>
            <tr>
                <td colspan="2"> 
                    <h1>Detailed Student Report</h1>
                    <p>
                        Issued by : Okeanos Infotech Pvt. Ltd., Gonda
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="color:darkslategray">This report shows all the attempted questions and their answers given.</p>
                </td>
                <td>
                    <button id="print-btn">Print Report</button>
                </td>
            </tr>

            <tr>
                <td>
                    <h2>Student Name: <?php echo htmlspecialchars($questions[0]['user_name']); ?></h2>
                    <p>Student ID: <?php echo htmlspecialchars($questions[0]['user_id']); ?></p>
                    <p>Date of Exam: <?php echo htmlspecialchars(date('d-m-Y H:i:s', strtotime($questions[0]['datetime']))); ?></p>
                </td>
                <td>
                    <h2>Score: <?php echo $correct_answers; ?>/<?php echo $total_questions; ?></h2>
                    <p>Correct Answers: <?php echo $correct_answers; ?></p>
                    <p>Wrong Answers: <?php echo $wrong_answers; ?></p>
                    <p>Unattempted Questions: <?php echo $unattempted_questions; ?></p>
                </td>
            </tr>

            <!-- Question and Options -->

            <?php foreach($questions as $index => $question): ?>
                
                

            <?php 
            
                $correct_answer = $question['correct_answer'];
                $selected_answer = $question['selected_answer'];

                $option_a = $question['option_a'];
                $option_b = $question['option_b'];
                $option_c = $question['option_c'];
                $option_d = $question['option_d'];


                if ($option_a == $correct_answer) {
                    $option_a_style = "style='color:green; font-weight:bold;'";
                } elseif ($option_a == $selected_answer) {
                    $option_a_style = "style='color:red; font-weight:bold;'";
                } else {
                    $option_a_style = "style='color:black;'";
                }


                if ($option_b == $correct_answer) {
                    $option_b_style = "style='color:green; font-weight:bold;'";
                } elseif ($option_b == $selected_answer) {
                    $option_b_style = "style='color:red; font-weight:bold;'";
                } else {
                    $option_b_style = "style='color:black;'";
                }

                if ($option_c == $correct_answer) {
                    $option_c_style = "style='color:green; font-weight:bold;'";
                } elseif ($option_c == $selected_answer) {
                    $option_c_style = "style='color:red; font-weight:bold;'";
                } else {
                    $option_c_style = "style='color:black;'";
                }


                if ($option_d == $correct_answer) {
                    $option_d_style = "style='color:green; font-weight:bold;'";
                } elseif ($option_d == $selected_answer) {
                    $option_d_style = "style='color:red; font-weight:bold;'";
                } else {
                    $option_d_style = "style='color:black;'";
                }


                // if($option_a == $selected_answer && $option_a == $correct_answer)
                //     $option_a_style = "style = 'color:green; font-weight: bold;'";
                // else if($option_a == $selected_answer && $option_a != $correct_answer)
                //     $option_a_style = "style = 'color:red; font-weight: bold;'";
                // else
                //     $option_a_style = "style = 'color:black; font-weight: normal;'";


                // if($option_b == $selected_answer && $option_b == $correct_answer)
                //     $option_b_style = "style = 'color:green; font-weight: bold;'";
                // else if($option_b == $selected_answer && $option_b != $correct_answer)
                //     $option_b_style = "style = 'color:red; font-weight: bold;'";
                // else
                //     $option_b_style = "style = 'color:black; font-weight: normal;'";


                // if($option_c == $selected_answer && $option_c == $correct_answer)
                //     $option_c_style = "style = 'color:green; font-weight: bold;'";
                // else if($option_c == $selected_answer && $option_c != $correct_answer)
                //     $option_c_style = "style = 'color:red; font-weight: bold;'";
                // else
                //     $option_c_style = "style = 'color:black; font-weight: normal;'";


                // if($option_d == $selected_answer && $option_d == $correct_answer)
                //     $option_d_style = "style = 'color:green; font-weight: bold;'";
                // else if($option_d == $selected_answer && $option_d != $correct_answer)
                //     $option_d_style = "style = 'color:red; font-weight: bold;'";
                // else
                //     $option_d_style = "style = 'color:black; font-weight: normal;'";
                
                
            ?>

            <tr>
                <td colspan="2">
                    <h3><?php echo $index + 1; ?>. <?php echo htmlspecialchars($question['question']); ?></h3>
                    
                    <ol type="A">

                        <li <?php echo $option_a_style; ?> >
                            <?php echo htmlspecialchars($option_a); ?>
                        </li>

                        <li <?php echo $option_b_style; ?> >
                            <?php echo htmlspecialchars($option_b); ?>
                        </li>

                        <li <?php echo $option_c_style; ?> >
                            <?php echo htmlspecialchars($option_c); ?>
                        </li>

                        <li <?php echo $option_d_style; ?> >
                            <?php echo htmlspecialchars($option_d); ?>
                        </li>



                    </ol>

                </td>
            </tr>
            <?php endforeach; ?>
            

        </table>


    </main>
    

    <script>
        $(document).ready(function(){

            $("#print-btn").on('click',function(){
                print();
            });



        });


    </script>

</body>
</html>