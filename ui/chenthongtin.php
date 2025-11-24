<?php include __DIR__ . '/../inc/header.php'; ?>

<?php
// Only show form. Submission goes to actions/insert.php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<h3>Thêm nhân viên mới</h3>
<form method="POST" action="../actions/insert.php">
    IDNV: <input type="text" name="idnv" required><br>
    Họ tên: <input type="text" name="hoten" required><br>
    IDPB: <input type="text" name="idpb"><br>
    Địa chỉ: <input type="text" name="diachi"><br>
    <input type="submit" name="them" value="Thêm" class="btn">
</form>

<?php include __DIR__ . '/../inc/footer.php'; ?>
