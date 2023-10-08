<?php
header('Content-Type: application/json');
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Prepare and execute the SQL query
    $sql = "SELECT id FROM default_questions WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch data
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $question_id = $result["id"];

    // For a specific question's multiple choices
    $sql = "SELECT a, b, c, d FROM multiple_choice WHERE question_id = :id ORDER BY RAND() LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $question_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Shuffle the options
    $options = array($result['a'], $result['b'], $result['c'], $result['d']);
    shuffle($options);

    $sql = "SELECT q.answer FROM default_questions q JOIN multiple_choice m ON q.id = m.question_id WHERE q.id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $question_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $answer = $row["answer"];

    if ($answer) {
      $result['answer'] = $answer;
    }

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $question_id);
    $stmt->execute();

    // Assign the shuffled options back to the result
    $result['a'] = $options[0];
    $result['b'] = $options[1];
    $result['c'] = $options[2];
    $result['d'] = $options[3];

    echo json_encode($result, JSON_PRETTY_PRINT);
}
?>