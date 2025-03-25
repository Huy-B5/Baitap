<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include 'includes/db_connection.php';

    // Lấy mã sinh viên từ URL
    $id = $_GET['id'];
    
    // Lấy dữ liệu của sinh viên
    $sql = "SELECT * FROM SinhVien WHERE MaSV='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    
    <div class="container">
        <h1>Sửa Sinh Viên</h1>
        <form method="POST" action="update_student.php" enctype="multipart/form-data">
            <!-- Ẩn mã sinh viên -->
            <input type="hidden" name="MaSV" value="<?php echo $row['MaSV']; ?>">

            <!-- Họ Tên -->
            <label for="HoTen">Họ Tên:</label>
            <input type="text" name="HoTen" value="<?php echo $row['HoTen']; ?>" required><br>

            <!-- Giới Tính (dropdown) -->
            <label for="GioiTinh">Giới Tính:</label>
            <select name="GioiTinh" required>
                <option value="Nam" <?php if($row['GioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                <option value="Nữ" <?php if($row['GioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
            </select><br>

            <!-- Ngày Sinh -->
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" name="NgaySinh" value="<?php echo $row['NgaySinh']; ?>" required><br>

            <!-- Hình ảnh -->
            <label for="Hinh">Hình Ảnh:</label>
            <input type="file" name="Hinh" accept="image/*"><br>
            <!-- Hiển thị hình ảnh hiện tại -->
            <img src="<?php echo $row['Hinh']; ?>" alt="Hình Sinh Viên" width="100"><br>

            <!-- Mã Ngành -->
            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" name="MaNganh" value="<?php echo $row['MaNganh']; ?>"><br>

            <input type="submit" value="Cập Nhật Sinh Viên">
        </form>
    </div>

</body>
</html>
