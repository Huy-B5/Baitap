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

// Lấy dữ liệu từ form
$MaSV = $_POST['MaSV'];
$HoTen = $_POST['HoTen'];
$GioiTinh = $_POST['GioiTinh'];
$NgaySinh = $_POST['NgaySinh'];
$MaNganh = $_POST['MaNganh'];

// Xử lý file hình ảnh
$target_dir = "uploads/"; // Thư mục để lưu file
$target_file = $target_dir . basename($_FILES["Hinh"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Kiểm tra xem file có phải là ảnh hay không
if (getimagesize($_FILES["Hinh"]["tmp_name"]) === false) {
    echo "File không phải là ảnh.";
    exit;
}

// Kiểm tra kích thước file (chẳng hạn, giới hạn 2MB)
if ($_FILES["Hinh"]["size"] > 2000000) {
    echo "File quá lớn. Vui lòng chọn file nhỏ hơn 2MB.";
    exit;
}

// Cho phép các định dạng hình ảnh
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Chỉ cho phép các định dạng ảnh: JPG, JPEG, PNG & GIF.";
    exit;
}

// Di chuyển file vào thư mục uploads
if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file)) {
    echo "File ". basename( $_FILES["Hinh"]["name"]). " đã được tải lên.";
} else {
    echo "Có lỗi khi tải file lên.";
    exit;
}

// Lưu thông tin sinh viên vào cơ sở dữ liệu
$sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
        VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$target_file', '$MaNganh')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm sinh viên thành công! <a href='index.php'>Trở lại danh sách</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
