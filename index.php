<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <!-- Liên kết đến file CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include 'includes/db_connection.php';

    $sql = "SELECT * FROM SinhVien";
    $result = $conn->query($sql);

    echo "<div class='container'>";
    echo "<h1>Danh Sách Sinh Viên</h1>";

    echo "<table>
            <thead>
                <tr>
                    <th>Mã Sinh Viên</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Hình</th>
                    <th>Mã Ngành</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['MaSV'] . "</td>
                    <td>" . $row['HoTen'] . "</td>
                    <td>" . $row['GioiTinh'] . "</td>
                    <td>" . $row['NgaySinh'] . "</td>
                    <td><img src='" . $row['Hinh'] . "' width='50' height='50'></td>
                    <td>" . $row['MaNganh'] . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['MaSV'] . "'>Sửa</a> | 
                        <a href='detail.php?id=" . $row['MaSV'] . "'>Chi Tiết</a> | 
                        <a href='delete.php?id=" . $row['MaSV'] . "'>Xóa</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Không có sinh viên nào</td></tr>";
    }

    echo "</tbody></table>";
    echo "</div>";

    // Đóng kết nối
    $conn->close();
    ?>

    <!-- Thêm Sinh Viên -->
    <div class="add-student">
        <a href="create.php"><button>Thêm Sinh Viên</button></a>
    </div>
</body>
</html>
