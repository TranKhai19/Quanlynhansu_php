<?php
// Delete single employee (actions/xoa.php)
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /quanlynhansu/ui/login.php');
    exit();
}

include __DIR__ . '/../ketnoi.php';
$id = isset($_GET['idnv']) ? $conn->real_escape_string($_GET['idnv']) : '';
if ($id !== '') {
    $conn->query("DELETE FROM nhanvien WHERE IDNV='$id'");
}
$conn->close();
header('Location: /quanlynhansu/ui/xemthongtinnv.php');
exit();
