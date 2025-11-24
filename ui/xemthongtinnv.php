<?php include __DIR__ . '/../inc/header.php'; include __DIR__ . '/../ketnoi.php'; ?>

<h3>Danh sách nhân viên</h3>
<table>
    <tr>
        <th>IDNV</th>
        <th>Họ tên</th>
        <th>IDPB</th>
        <th>Địa chỉ</th>
        <?php if (isset($_SESSION['user'])): ?>
            <th>Hành động</th>
        <?php endif; ?>
    </tr>
    <?php
    $sql = "SELECT * FROM nhanvien";
    $result = $conn->query($sql);
    if ($result) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>" .
                 "<td>" . htmlspecialchars($row['IDNV']) . "</td>" .
                 "<td>" . htmlspecialchars($row['Hoten']) . "</td>" .
                 "<td>" . htmlspecialchars($row['IDPB']) . "</td>" .
                 "<td>" . htmlspecialchars($row['Diachi']) . "</td>";

            if (isset($_SESSION['user'])) {
                echo "<td>" .
                     "<a href='form_capnhat.php?idnv=" . urlencode($row['IDNV']) . "'>Sửa</a> | " .
                     "<a href='../actions/xoa.php?idnv=" . urlencode($row['IDNV']) . "' onclick=\"return confirm('Bạn có chắc muốn xóa nhân viên này?');\">Xóa</a>" .
                     "</td>";
            }

            echo "</tr>";
        }
        $result->free();
    } else {
        $colspan = isset($_SESSION['user']) ? 5 : 4;
        echo "<tr><td colspan='" . $colspan . "'>Lỗi truy vấn: " . htmlspecialchars($conn->error) . "</td></tr>";
    }
    $conn->close();
    ?>
</table>

<?php include __DIR__ . '/../inc/footer.php'; ?>
