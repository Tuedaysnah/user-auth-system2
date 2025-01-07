<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    
    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    
    if ($stmt->execute()) {
        echo "Tài khoản đã được xóa.";
    } else {
        echo "Không thể xóa tài khoản: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn = null;
?>