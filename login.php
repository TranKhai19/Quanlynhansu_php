<?php
session_start(); // 1. Khởi động session ngay đầu file
include 'ketnoi.php'; // 2. Kết nối CSDL

// Biến lưu thông báo lỗi
$error_message = "";

// 3. Kiểm tra xem người dùng có nhấn nút "Đăng nhập" không
if (isset($_POST['btn_login'])) {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Làm sạch dữ liệu để tránh lỗi SQL Injection cơ bản
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // 4. Tạo câu truy vấn kiểm tra
    // Lưu ý: Code này so sánh mật khẩu thô (plain text) theo yêu cầu bài tập trên bảng.
    // Trong thực tế, bạn nên dùng md5 hoặc password_hash.
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // 5. Kiểm tra kết quả
    if ($result->num_rows > 0) {
        // Đăng nhập thành công -> Lưu user vào session
        $_SESSION['user'] = $username;
        
        // Chuyển hướng sang trang quản trị (Ví dụ trang xem nhân viên)
        header("Location: xemthongtinnv.php");
        exit();
    } else {
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; margin-top: 50px; }
        .login-box { border: 1px solid #ccc; padding: 20px; border-radius: 5px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 5px 0 15px 0; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; background: #28a745; color: white; border: none; cursor: pointer; }
        .btn:hover { background: #218838; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="login-box">
    <h2 style="text-align: center;">Đăng nhập Admin</h2>
    
    <?php if (!empty($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required placeholder="Nhập user01 hoặc user02">
        
        <label>Password:</label>
        <input type="password" name="password" required placeholder="Nhập mật khẩu">
        
        <input type="submit" name="btn_login" value="Đăng nhập" class="btn">
    </form>
</div>

</body>
</html>