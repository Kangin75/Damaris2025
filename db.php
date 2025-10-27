<?php
$host = "localhost";
$user = "root"; // 改成你的帳號
$pass = "";     // 改成你的密碼
$dbname = "classroom_books";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("資料庫連線失敗：" . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
