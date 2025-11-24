<?php
session_start();
// Nếu không tồn tại session 'user' (chưa đăng nhập) -> Đẩy về trang login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['them'])) {
    $id = $_POST['idnv'];
    $ten = $_POST['hoten'];
    $pb = $_POST['idpb'];
    $dc = $_POST['diachi'];
    
    $sql = "INSERT INTO nhanvien VALUES ('$id', '$ten', '$pb', '$dc')";
    if ($conn->query($sql) === TRUE) echo "Thêm thành công";
    else echo "Lỗi: " . $conn->error;

    include 'ketnoi.php';
}
?>