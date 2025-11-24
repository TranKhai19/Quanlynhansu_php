<?php
include 'ketnoi.php';
$id = $_GET['idnv'];
$sql = "DELETE FROM nhanvien WHERE IDNV='$id'";
$conn->query($sql);
header("Location: xemthongtinnv.php"); // Quay lại trang danh sách
?>