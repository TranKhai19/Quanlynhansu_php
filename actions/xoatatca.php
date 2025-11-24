<?php
// Delete all employees (actions/xoatatca.php)
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /quanlynhansu/ui/login.php');
    exit();
}

include __DIR__ . '/../ketnoi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->query('DELETE FROM nhanvien');
}

$conn->close();
header('Location: /quanlynhansu/ui/xemthongtinnv.php');
exit();
