<?php
// Insert new employee (actions/insert.php)
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /quanlynhansu/ui/login.php');
    exit();
}

include __DIR__ . '/../ketnoi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['idnv']) ? $conn->real_escape_string($_POST['idnv']) : '';
    $ten = isset($_POST['hoten']) ? $conn->real_escape_string($_POST['hoten']) : '';
    $pb = isset($_POST['idpb']) ? $conn->real_escape_string($_POST['idpb']) : '';
    $dc = isset($_POST['diachi']) ? $conn->real_escape_string($_POST['diachi']) : '';

    if ($id !== '' && $ten !== '') {
        $stmt = $conn->prepare('INSERT INTO nhanvien (IDNV, Hoten, IDPB, Diachi) VALUES (?, ?, ?, ?)');
        if ($stmt) {
            $stmt->bind_param('ssss', $id, $ten, $pb, $dc);
            $stmt->execute();
            $stmt->close();
        }
    }
}

$conn->close();
header('Location: /quanlynhansu/ui/xemthongtinnv.php');
exit();
