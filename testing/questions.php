
<?php
// testing/questions.php

include "../admin_only_validation.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>

    <?php include "../libs/jquery.php"; ?>


</head>
<body>  
    <h4>Questions by Subject</h4>
    <select id="subject-box" name="subject-box">
        <option value="Select">Select</option>
        <option value="IT Tools">IT Tools</option>
        <option value="Web Design">Web Design</option>
        <option value="Python">Python</option>
        <option value="IoT">IoT</option>
    </select>

    <button id="show-btn">Show Questions</button>


    <script>
        $(document).ready(function() {
            $("#show-btn").click(function() {
                var subject = $("#subject-box").val();
                if (subject === "Select") {
                    alert("Please select a subject.");
                    return;
                }
                else {
                    $.ajax({
                        url: 'fetch_questions_for_testing.php',
                        type: 'GET',
                        data: { subject: subject },
                        dataType: 'json',
                        success: function(data) {
                            
                            // create a paragraph to show questions
                            console.log(data);
                            document.body.innerHTML = "<h3>Questions for " + subject + ":</h3>";
                            data.forEach(function(question, index) {
                                var questionDiv = document.createElement("div");
                                questionDiv.innerHTML = "<strong>Q" + (index + 1) + ":</strong> " + escapeHTML(question.question) + "<br>" +
                                                        "A. " + escapeHTML(question.option_a) + "<br>" +
                                                        "B. " + escapeHTML(question.option_b) + "<br>" +
                                                        "C. " + escapeHTML(question.option_c) + "<br>" +
                                                        "D. " + escapeHTML(question.option_d) + "<br><br>"+
                                                        "<em>Correct Answer: " + escapeHTML(question.correct_answer) + "</em><br><br>";

                                document.body.appendChild(questionDiv);
                            });
                            
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching questions: " + error);
                        }
                    });
                }
            });


            function escapeHTML(str) {
                return $("<div>").text(str).html();
            }



        });


    </script>
    
</body>
</html>