<?php
$userid = $_POST['userid'] ?? '';
if (!$userid || !isset($_FILES['image'])) {
    die("Invalid request");
}

$filename = uniqid() . "_" . basename($_FILES["image"]["name"]);
$target = "uploads/" . $filename;
move_uploaded_file($_FILES["image"]["tmp_name"], $target);

$host = "localhost";
$user = "root";
$pass = "";
$db   = "registration";

$conn = new mysqli($host, $user, $pass, $db);
$stmt = $conn->prepare("INSERT INTO uploads (userid, filename) VALUES (?, ?)");
$stmt->bind_param("ss", $userid, $filename);
$stmt->execute();
$conn->close();

header("Location: nest.html");
?>
