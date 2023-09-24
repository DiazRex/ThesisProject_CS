<?php
  header('Access-Control-Allow-Origin: *');
  include '../conn.php';

  if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    try {
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      die("Error: " . $e->getMessage());
    }

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM default_questions WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch the data
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
      // if data found, return JSON
      header('Content-Type: application/json');
      echo json_encode($result, JSON_PRETTY_PRINT);
    } else {
      // if data is not found
      header('HTTP/1.0 404 Not Found');
      echo json_encode(array('message' => '404 id was not found.'), JSON_PRETTY_PRINT);
    }
  } else {
    // 'id' parameter not provided.
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array('message' => "Bad Request: Missing 'id' parameter."), JSON_PRETTY_PRINT);
  }

?>