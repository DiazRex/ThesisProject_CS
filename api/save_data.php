<?php
header('Content-Type: application/json');
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $id = mysqli_real_escape_string($conn, $_GET['user_id']);

    try {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM save_data WHERE user_id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        // Fetch data
        echo json_encode([
            'id' => $result["user_id"],
            'save_0' => $result["save_0"],
            'save_1' => $result["save_1"]
        ], JSON_PRETTY_PRINT);
    }
}
?>
