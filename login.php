<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "registration";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed"); }

$userid = $_POST['userid'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT id FROM users WHERE userid = ? AND password = ?");
$stmt->bind_param("ss", $userid, $password);
$stmt->execute();
$stmt->store_result();

echo $stmt->num_rows > 0 ? "success" : "fail";

$conn->close();
?>
