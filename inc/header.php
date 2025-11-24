<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý nhân sự</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-weight: bold;
        }
        .navbar a:hover { background-color: #ddd; color: black; }
        .btn-login { background-color: #4CAF50; }
        .btn-logout { background-color: #f44336; }
        .content { padding: 20px; margin-top: 30px; }
        table { background: white; border-collapse: collapse; width: 100%; }
        table th, table td { padding: 8px 12px; border: 1px solid #ddd; }
        .welcome-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); display: inline-block; }
        .login-box { border: 1px solid #ccc; padding: 20px; border-radius: 5px; width: 320px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background: white; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 5px 0 15px 0; box-sizing: border-box; }
        .btn { padding: 8px 12px; background: #28a745; color: white; border: none; cursor: pointer; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <a href="/quanlynhansu/ui/index.php">🏠 Trang chủ</a>
        <a href="/quanlynhansu/ui/xemthongtinnv.php">Danh sách Nhân viên</a>
        <a href="/quanlynhansu/ui/xemthongtinpb.php">Danh sách Phòng ban</a>
        <a href="/quanlynhansu/ui/timkiem.php">🔍 Tìm kiếm</a>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="/quanlynhansu/ui/chenthongtin.php">➕ Thêm NV</a>
            <a href="/quanlynhansu/ui/form_capnhat.php">✏️ Cập nhật</a>
            <a href="/quanlynhansu/ui/xoatatca.php">🗑️ Xóa tất cả</a>
        <?php endif; ?>
    </div>

    <div class="nav-right">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="#" style="background: none; pointer-events: none;">Xin chào, <?php echo htmlspecialchars($_SESSION['user']); ?></a>
            <a href="../ui/logout.php" class="btn-logout">Đăng xuất</a>
        <?php else: ?>
            <a href="../ui/login.php" class="btn-login">Đăng nhập Admin</a>
        <?php endif; ?>
    </div>
</div>

<div class="content">
