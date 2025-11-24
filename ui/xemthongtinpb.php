<?php include __DIR__ . '/../inc/header.php'; include __DIR__ . '/../ketnoi.php'; ?>

<h3>Danh sách phòng ban</h3>
<table>
    <tr>
        <th>Mã PB</th>
        <th>Tên Phòng Ban</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>
    <?php
    $sql = "SELECT idpb, tenpb, mota FROM phongban";
    $result = $conn->query($sql);
    if ($result) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>" .
                 "<td>" . htmlspecialchars($row['idpb']) . "</td>" .
                 "<td>" . htmlspecialchars($row['tenpb']) . "</td>" .
                 "<td>" . htmlspecialchars($row['mota']) . "</td>" .
                 "<td><a href='xemthongtinNVPB.php?idpb=" . urlencode($row['idpb']) . "'>Xem nhân viên</a></td>" .
                 "</tr>";
        }
        $result->free();
    } else {
        echo "<tr><td colspan='4'>Lỗi truy vấn: " . htmlspecialchars($conn->error) . "</td></tr>";
    }

    $conn->close();
    ?>
</table>

<?php include __DIR__ . '/../inc/footer.php'; ?>
