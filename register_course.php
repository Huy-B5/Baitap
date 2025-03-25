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

if (isset($_POST['courses'])) {
    $courses = $_POST['courses'];
    $MaSV = "0123456789"; // Thay bằng mã sinh viên thực tế (có thể lấy từ session)

    // Thêm vào bảng DangKy
    $sql = "INSERT INTO DangKy (MaSV, NgayDK) VALUES ('$MaSV', CURDATE())";
    if ($conn->query($sql) === TRUE) {
        $MaDK = $conn->insert_id; // Lấy mã đăng ký vừa tạo

        // Thêm vào bảng ChiTietDangKy
        foreach ($courses as $course) {
            $sql2 = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK', '$course')";
            $conn->query($sql2);
        }
        echo "Đăng ký học phần thành công! <a href='index.php'>Trở lại danh sách</a>";
    } else {
        echo "Lỗi đăng ký học phần: " . $conn->error;
    }
}

$conn->close();
?>
