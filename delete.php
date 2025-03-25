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

$sql = "DELETE FROM SinhVien WHERE MaSV='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Xóa sinh viên thành công! <a href='index.php'>Trở lại danh sách</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
