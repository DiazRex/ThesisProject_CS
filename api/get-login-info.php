<?php
header('Content-Type: application/json');
include '../conn.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $usernameInput = $_POST["username"];
  $passwordInput = $_POST["password"];

  echo $usernameInput;

  // $sql = "SELECT * FROM thesisdata WHERE Username = '$usernameInput' AND PassW = '$passwordInput'";
  $sql = "SELECT * FROM thesisdata WHERE Username='$usernameInput'";

  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Validation successful
    echo json_encode([
      "success" => true,
      "message" => "Successfully logged in.", 
      "id" => $row["ID"],
      "username" => $row["Username"],
      "email" => $row["Email"],
      "role" => $row["RoleSTI"],
      "pfp" => $row["ProfileP"],
      "firstn" => $row["FirstN"],
      "lastn" => $row["LastN"],
      "section" => $row["SectionN"]
    ]);

  }
  
  $conn->close();
  
} else {
  echo json_encode([
    "success" => false,
    "message" => "POST method is allowed!"
  ]);
}

?>