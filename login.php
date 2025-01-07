<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo "Đăng nhập thành công.";
            // Chuyển hướng đến trang sau khi đăng nhập
            // header("Location: index.html");
            // exit();
        } else {
            echo "Mật khẩu không đúng.";
        }
    } else {
        echo "Tài khoản không tồn tại.";
    }
    $stmt->close();
}

$conn->close();
?>