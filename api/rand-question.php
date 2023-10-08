<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include '../conn.php';

if($_SERVER["REQUEST_METHOD"] === 'GET') {
  $sql = "SELECT * FROM default_questions";

  $result = $conn->query($sql);

  if($result->num_rows > 0) {
    $questions = array();

    while($row = $result->fetch_assoc()){
      $questions[] = $row['question_title'];
    }

    //Shuffle the array to randomize the question
    shuffle($questions);

    echo json_encode(["question_title" => $questions], JSON_PRETTY_PRINT);
  } else {
    // No questions found in the database
    echo json_encode(["error" => "No questions found in the database"], JSON_PRETTY_PRINT);
  }

  $conn->close();
}
?>