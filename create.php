<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Thêm Sinh Viên</h1>
        <form action="insert_student.php" method="POST" enctype="multipart/form-data">
            <label for="MaSV">Mã Sinh Viên:</label>
            <input type="text" name="MaSV" required><br>
            
            <label for="HoTen">Họ Tên:</label>
            <input type="text" name="HoTen" required><br>
            
            <label for="GioiTinh">Giới Tính:</label>
            <select name="GioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select><br>
            
            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" name="NgaySinh" required><br>
            
            <label for="Hinh">Hình Ảnh:</label>
            <input type="file" name="Hinh" accept="image/*" required><br>
            
            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" name="MaNganh"><br>
            
            <input type="submit" value="Thêm Sinh Viên">
        </form>
    </div>
</body>
</html>
