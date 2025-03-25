<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
include 'includes/db_connection.php';

$id = $_GET['id']; // Lấy mã sinh viên từ URL

// Lấy dữ liệu của sinh viên theo mã sinh viên
$sql = "SELECT * FROM SinhVien WHERE MaSV='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Sinh viên không tồn tại!";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Chi Tiết Sinh Viên</h1>

        <!-- Hiển thị thông tin sinh viên -->
        <table>
            <tr>
                <th>Mã Sinh Viên</th>
                <td><?php echo $row['MaSV']; ?></td>
            </tr>
            <tr>
                <th>Họ Tên</th>
                <td><?php echo $row['HoTen']; ?></td>
            </tr>
            <tr>
                <th>Giới Tính</th>
                <td><?php echo $row['GioiTinh']; ?></td>
            </tr>
            <tr>
                <th>Ngày Sinh</th>
                <td><?php echo $row['NgaySinh']; ?></td>
            </tr>
            <tr>
                <th>Hình Ảnh</th>
                <td><img src="<?php echo $row['Hinh']; ?>" width="100" height="100" alt="Hình ảnh sinh viên"></td>
            </tr>
            <tr>
                <th>Mã Ngành</th>
                <td><?php echo $row['MaNganh']; ?></td>
            </tr>
        </table>

        <!-- Link trở lại danh sách sinh viên -->
        <a href="index.php"><button>Trở lại danh sách</button></a>
    </div>
</body>
</html>
