<?php include 'ketnoi.php'; ?>
<table border="1">
    <tr>
        <th>IDNV</th>
        <th>Họ tên</th>
        <th>IDPB</th>
        <th>Địa chỉ</th>
    </tr>
    <?php
    $sql = "SELECT * FROM nhanvien";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['IDNV']}</td>
                <td>{$row['Hoten']}</td>
                <td>{$row['IDPB']}</td>
                <td>{$row['Diachi']}</td>
              </tr>";
    }
    ?>
</table>