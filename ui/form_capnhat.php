<?php
include __DIR__ . '/../ketnoi.php';
include __DIR__ . '/../inc/header.php';

$id = isset($_GET['idnv']) ? trim($_GET['idnv']) : '';
if ($id === '') {
    // If no ID provided, show a selectable list of employees to edit
    $list_sql = "SELECT IDNV, Hoten FROM nhanvien ORDER BY IDNV";
    $list_result = $conn->query($list_sql);
    if ($list_result && $list_result->num_rows > 0) {
        echo "<h3>Chọn nhân viên để sửa</h3>";
        echo "<table>";
        echo "<tr><th>IDNV</th><th>Họ Tên</th><th>Hành động</th></tr>";
        while ($r = $list_result->fetch_assoc()) {
            echo "<tr>" .
                 "<td>" . htmlspecialchars($r['IDNV']) . "</td>" .
                 "<td>" . htmlspecialchars($r['Hoten']) . "</td>" .
                 "<td><a href='form_capnhat.php?idnv=" . urlencode($r['IDNV']) . "'>Sửa</a></td>" .
                 "</tr>";
        }
        echo "</table>";
        $list_result->free();
    } else {
        echo "<p>Không có nhân viên trong hệ thống.</p>";
    }
    include __DIR__ . '/../inc/footer.php';
    // close connection and exit to avoid running the edit logic
    $conn->close();
    exit();
} else {
    $sql = "SELECT * FROM nhanvien WHERE IDNV = '" . $conn->real_escape_string($id) . "'";
    $result = $conn->query($sql);
    if ($result === false) {
        $error_info = 'Lỗi truy vấn: ' . $conn->error . ' — SQL: ' . $sql;
        $row = null;
    } else {
        $num_rows = $result->num_rows;
        $row = $result->fetch_assoc();
        if ($num_rows === 0) {
            $error_info = 'Không tìm thấy nhân viên với IDNV = ' . htmlspecialchars($id) . 
                          ' (rows returned: ' . $num_rows . '). SQL: ' . htmlspecialchars($sql);
        }
        $result->free();
    }
}
?>

<?php if ($row): ?>
    <h3>Cập nhật thông tin cho nhân viên: <?php echo htmlspecialchars($row['Hoten']); ?></h3>

    <form action="../actions/xulycapnhat.php" method="POST">
        IDNV: <input type="text" name="idnv" value="<?php echo htmlspecialchars($row['IDNV']); ?>" readonly><br>
        Họ tên: <input type="text" name="hoten" value="<?php echo htmlspecialchars($row['Hoten']); ?>"><br>
        IDPB: <input type="text" name="idpb" value="<?php echo htmlspecialchars($row['IDPB']); ?>"><br>
        Địa chỉ: <input type="text" name="diachi" value="<?php echo htmlspecialchars($row['Diachi']); ?>"><br>
        <input type="submit" name="btn_luu" value="Lưu thay đổi" class="btn">
    </form>
<?php else: ?>
    <p>Nhân viên không tồn tại hoặc lỗi truy vấn.</p>
    <?php if (!empty($error_info)): ?>
        <p><strong>Chi tiết:</strong> <?php echo htmlspecialchars($error_info); ?></p>
    <?php endif; ?>
<?php endif; ?>

<?php include __DIR__ . '/../inc/footer.php'; ?>
