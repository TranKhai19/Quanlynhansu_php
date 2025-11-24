if (isset($_POST['delete_multiple'])) {
    $ids = $_POST['ids']; // Đây là 1 mảng các ID
    foreach ($ids as $id) {
        $conn->query("DELETE FROM nhanvien WHERE IDNV='$id'");
    }
    echo "Đã xóa các mục chọn";
}