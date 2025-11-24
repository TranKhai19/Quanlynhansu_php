<?php
session_start(); // Khởi động session để biết ai đang truy cập
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Quản lý nhân sự</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        
        /* CSS cho thanh Menu */
        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-between; /* Đẩy nút login sang phải */
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

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Nút Login/Logout làm màu khác cho nổi bật */
        .btn-login {
            background-color: #4CAF50; /* Màu xanh lá */
        }
        .btn-logout {
            background-color: #f44336; /* Màu đỏ */
        }
        
        .content {
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }
        
        .welcome-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <a href="index.php">🏠 Trang chủ</a>
        <a href="./ui/xemthongtinnv.php">Danh sách Nhân viên</a>
        <a href="./ui/xemthongtinpb.php">Danh sách Phòng ban</a>
        <a href="./ui/timkiem.php">🔍 Tìm kiếm</a>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="./ui/chenthongtin.php">➕ Thêm NV</a>
            <a href="./ui/form_capnhat.php">✏️ Cập nhật</a>
            <a href="./ui/xoatatca.php">🗑️ Xóa tất cả</a>
        <?php endif; ?>
    </div>

    <div class="nav-right">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="#" style="background: none; pointer-events: none;">Xin chào, <?php echo $_SESSION['user']; ?></a>
            <a href="logout.php" class="btn-logout">Đăng xuất</a>
        <?php else: ?>
            <a href="login.php" class="btn-login">Đăng nhập Admin</a>
        <?php endif; ?>
    </div>
</div>

<div class="content">
    <div class="welcome-box">
        <h1>Hệ thống Quản lý Nhân sự</h1>
        <p>Chào mừng bạn đến với trang quản lý nội bộ.</p>
        
        <?php if (!isset($_SESSION['user'])): ?>
            <p>Bạn đang xem với tư cách là <b>Khách</b>.</p>
            <p>Vui lòng <a href="login.php">Đăng nhập</a> để sử dụng các chức năng quản trị (Thêm, Sửa, Xóa).</p>
        <?php else: ?>
            <p style="color: green;">Bạn đang đăng nhập với quyền <b>Quản trị viên (Admin)</b>.</p>
            <p>Hãy chọn chức năng trên thanh menu để bắt đầu làm việc.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>