<form method="POST">
    Tìm kiếm: <input type="text" name="noidung"> <br>
    <input type="radio" name="loai" value="IDNV" checked> IDNV
    <input type="radio" name="loai" value="Hoten"> Họ tên
    <input type="radio" name="loai" value="Diachi"> Địa chỉ
    <input type="submit" value="Search" name="btn_tim">
</form>

<?php
if (isset($_POST['btn_tim'])) {
    include 'ketnoi.php';
    $noidung = $_POST['noidung'];
    $loai = $_POST['loai'];
    
    // Query động dựa trên lựa chọn radio
    $sql = "SELECT * FROM nhanvien WHERE $loai LIKE '%$noidung%'";
    // ... Code hiển thị kết quả ra bảng ...
}
?>