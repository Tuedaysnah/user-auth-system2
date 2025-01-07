<?php
$host = "localhost";
$dbname = "user_management";
$username = "root"; // hoặc tên người dùng bạn đã thiết lập
$password = ""; // mật khẩu của bạn

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công!";
} catch(PDOException $e) {
    echo "Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage();
}
?>