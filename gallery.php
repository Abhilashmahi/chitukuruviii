<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "registration";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Group uploads by user
$sql = "
SELECT u.userid, u.name, u.address, up.filename
FROM users u
LEFT JOIN uploads up ON u.userid = up.userid
ORDER BY u.name ASC, up.uploaded_at DESC
";

$result = $conn->query($sql);

$users = [];

while ($row = $result->fetch_assoc()) {
    $uid = $row['userid'];
    if (!isset($users[$uid])) {
        $users[$uid] = [
            'userid' => $uid,
            'name' => $row['name'],
            'address' => $row['address'],
            'images' => [],
        ];
    }

    if ($row['filename']) {
        $users[$uid]['images'][] = $row['filename'];
    }
}

echo json_encode(array_values($users));
?>
