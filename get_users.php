<?php
require_once 'db_connection.php';

$stmt = $conn->prepare("SELECT username FROM users");
$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

$stmt->close();
$conn = null;

header('Content-Type: application/json');
echo json_encode($users);
?>