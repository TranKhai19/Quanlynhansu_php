<?php
$servername = "localhost";  
$username = "root";
$password = "123456";
$dbname = "dulieu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error) {
    die("Kết nối thất bại: " . $conn -> connect_error);
}

$conn->set_charset("utf8");
?>