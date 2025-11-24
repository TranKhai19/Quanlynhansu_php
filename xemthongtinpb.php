<!-- Xem thông tin của phòng ban -->
<?php include 'ketnoi.php'; ?>
<table border="1" cellpadding="10">
    <tr>
        <th>Mã PB</th>
        <th>Tên Phòng Ban</th>
        <th>Trưởng Phòng</th>
        <th>Số Nhân Viên</th>
    </tr>
    <?php
    $sql = "SELECT mapb, tenpb, truongphong, sonn FROM phongban";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['IDPB']}</td>
                    <td>{$row['Tenpb']}</td>
                    <td>{$row['Mota']}</td>
                    <td><a href='xemthongtinNVPB.php?idpb={$row['IDPB']}'>Xem nhân viên</a></td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
    }

    $conn->close();
    ?>
</table>
