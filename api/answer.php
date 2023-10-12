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

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        // Fetch data
        
        $question_id = $result["id"];
    } else {
        echo json_encode([
            'error' => "id=$id Not Found.",
            'statusCode' => 404,
            'message' => 'Query Not Found.'
        ], JSON_PRETTY_PRINT);
    }

    if($result) {
        // For a specific question's multiple choices
        $sql = "SELECT a, b, c, d FROM multiple_choice WHERE question_id = :id ORDER BY RAND() LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $question_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Shuffle the options
        $options = array($result['a'], $result['b'], $result['c'], $result['d']);
        shuffle($options);

        $sql = "SELECT q.question_title, q.answer FROM default_questions q JOIN multiple_choice m ON q.id = m.question_id WHERE q.id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $question_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $answer = $row["answer"];
        $question_title = $row["question_title"];

        if ($answer) {
        $result['answer'] = $answer;
        $result['question_title'] = $question_title;
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
}
?>
