<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesisweb";
// Receive the username and password from the Unity request
$usernameInput = $_POST["Username"];
$passwordInput = $_POST["PassW"];

// Perform your validation logic
// Example: Check if the username and password exist in the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT * FROM thesisdata WHERE Username = '$usernameInput' AND PassW = '$passwordInput'";
$sql = "SELECT Username, Passw FROM thesisdata WHERE Username = '$usernameInput' AND PassW = '$passwordInput' AND RoleSTI = 'Student'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Validation successful
    echo "Valid";
} else {
    // Validation failed
    echo "Invalid";
}

$conn->close();
?>