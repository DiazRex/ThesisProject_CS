<?php
$host = "localhost";
$user = "u943563710_codequest2023";
$password = "!CodeQuest2023";
$database = "u943563710_CodeQuest";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$db = new PDO("mysql:host=localhost;dbname=u943563710_CodeQuest", "u943563710_codequest2023", "!CodeQuest2023");
?>

