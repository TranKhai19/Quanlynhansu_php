<?php
// Handle update (actions/xulycapnhat.php)
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /quanlynhansu/ui/login.php');
    exit();
}

include __DIR__ . '/../ketnoi.php';
if (isset($_POST['btn_luu'])) {
    $id = isset($_POST['idnv']) ? $conn->real_escape_string($_POST['idnv']) : '';
    $ten = isset($_POST['hoten']) ? $conn->real_escape_string($_POST['hoten']) : '';
    $pb = isset($_POST['idpb']) ? $conn->real_escape_string($_POST['idpb']) : '';
    $dc = isset($_POST['diachi']) ? $conn->real_escape_string($_POST['diachi']) : '';

    $sql = "UPDATE nhanvien SET Hoten='$ten', IDPB='$pb', Diachi='$dc' WHERE IDNV='$id'";
    $conn->query($sql);
}

$conn->close();
header('Location: /quanlynhansu/ui/form_capnhat.php');
exit();
