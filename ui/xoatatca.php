<?php include __DIR__ . '/../inc/header.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<h3>Xóa tất cả nhân viên</h3>
<p>Hành động này sẽ xóa toàn bộ bảng <b>nhanvien</b>. Hãy chắc chắn trước khi tiếp tục.</p>
<form method="POST" action="../actions/xoatatca.php" onsubmit="return confirm('Bạn có chắc muốn xóa tất cả nhân viên không?');">
    <input type="hidden" name="confirm_delete" value="1">
    <input type="submit" value="Xóa tất cả" class="btn" style="background:#c82333">
    <a href="xemthongtinnv.php" style="margin-left:12px">Hủy</a>
</form>

<?php include __DIR__ . '/../inc/footer.php'; ?>
