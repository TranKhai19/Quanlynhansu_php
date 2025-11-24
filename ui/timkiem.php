<?php include __DIR__ . '/../inc/header.php'; ?>

<h3>Tìm kiếm nhân viên</h3>
<form method="POST" action="">
    Tìm kiếm: <input type="text" name="noidung"> <br>
    <input type="radio" name="loai" value="IDNV" checked> IDNV
    <input type="radio" name="loai" value="Hoten"> Họ tên
    <input type="radio" name="loai" value="Diachi"> Địa chỉ
    <input type="submit" value="Search" name="btn_tim" class="btn">
</form>

<?php
if (isset($_POST['btn_tim'])) {
    include __DIR__ . '/../ketnoi.php';
    $noidung = isset($_POST['noidung']) ? trim($_POST['noidung']) : '';
    $loai = isset($_POST['loai']) ? $_POST['loai'] : 'Hoten';

    $allowed = ['IDNV', 'Hoten', 'Diachi'];
    if (!in_array($loai, $allowed, true)) {
        $loai = 'Hoten';
    }

    if ($noidung === '') {
        echo "<p>Vui lòng nhập nội dung tìm kiếm.</p>";
    } else {
        $sql = "SELECT IDNV, Hoten, IDPB, Diachi FROM nhanvien WHERE $loai LIKE ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            echo "<p>Lỗi chuẩn bị truy vấn: " . htmlspecialchars($conn->error) . "</p>";
        } else {
            $param = "%" . $noidung . "%";
            $stmt->bind_param('s', $param);
            if (!$stmt->execute()) {
                echo "<p>Lỗi thực thi truy vấn: " . htmlspecialchars($stmt->error) . "</p>";
            } else {
                $result = $stmt->get_result();
                if ($result === false) {
                    echo "<p>Lỗi lấy kết quả: " . htmlspecialchars($conn->error) . "</p>";
                } elseif ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>IDNV</th><th>Họ Tên</th><th>IDPB</th><th>Địa Chỉ</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>" .
                             "<td>" . htmlspecialchars($row['IDNV']) . "</td>" .
                             "<td>" . htmlspecialchars($row['Hoten']) . "</td>" .
                             "<td>" . htmlspecialchars($row['IDPB']) . "</td>" .
                             "<td>" . htmlspecialchars($row['Diachi']) . "</td>" .
                             "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Không tìm thấy kết quả.</p>";
                }
                $result && $result->free();
            }
            $stmt->close();
        }
        $conn->close();
    }
}
?>

<?php include __DIR__ . '/../inc/footer.php'; ?>
