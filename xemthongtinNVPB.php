<!-- Xem thông tin nhân viên của từng phòng ban -->
<?php 
include 'ketnoi.php'; 
$idpb = $_GET['idpb']; // Lấy IDPB từ link
$sql = "SELECT * FROM nhanvien WHERE IDPB = '$idpb'";?>
<table border="1" cellpadding="10">
    <tr>
        <th>Mã NV</th>
        <th>Họ Tên</th>
        <th>Phòng Ban</th>
        <th>Chức Vụ</th>
        <th>Lương</th>
    </tr>
    <?php
    $sql = "SELECT manv, hoten, phongban, chucvu, luong FROM nhanvien ORDER BY phongban";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["manv"] . "</td>
                    <td>" . $row["hoten"] . "</td>
                    <td>" . $row["phongban"] . "</td>
                    <td>" . $row["chucvu"] . "</td>
                    <td>" . $row["luong"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
    }

    $conn->close();
    ?>
</table>