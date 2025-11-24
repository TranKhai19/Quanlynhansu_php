<?php include __DIR__ . '/../inc/header.php'; include __DIR__ . '/../ketnoi.php';
$idpb = isset($_GET['idpb']) ? $_GET['idpb'] : '';
?>

<h3>Nhân viên - Phòng ban: <?php echo htmlspecialchars($idpb); ?></h3>
<table>
    <tr>
        <th>Mã NV</th>
        <th>Họ Tên</th>
        <th>Phòng Ban</th>
        <th>Địa Chỉ</th>
    </tr>
    <?php
    $stmt = $conn->prepare("SELECT IDNV, Hoten, IDPB, Diachi FROM nhanvien WHERE IDPB = ? ORDER BY IDNV");
    if ($stmt === false) {
        echo "<tr><td colspan='4'>Lỗi chuẩn bị truy vấn: " . htmlspecialchars($conn->error) . "</td></tr>";
    } else {
        $stmt->bind_param('s', $idpb);
        if (!$stmt->execute()) {
            echo "<tr><td colspan='4'>Lỗi thực thi truy vấn: " . htmlspecialchars($stmt->error) . "</td></tr>";
        } else {
            $result = $stmt->get_result();
            if ($result === false) {
                echo "<tr><td colspan='4'>Lỗi lấy kết quả: " . htmlspecialchars($conn->error) . "</td></tr>";
            } elseif ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                         "<td>" . htmlspecialchars($row['IDNV']) . "</td>" .
                         "<td>" . htmlspecialchars($row['Hoten']) . "</td>" .
                         "<td>" . htmlspecialchars($row['IDPB']) . "</td>" .
                         "<td>" . htmlspecialchars($row['Diachi']) . "</td>" .
                         "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
            }
            $result && $result->free();
        }
        $stmt->close();
    }

    $conn->close();
    ?>
</table>

<?php include __DIR__ . '/../inc/footer.php'; ?>
