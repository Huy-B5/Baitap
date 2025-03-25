<?php
include 'includes/db_connection.php';

// Lấy dữ liệu từ form
$MaSV = $_POST['MaSV'];
$HoTen = $_POST['HoTen'];
$GioiTinh = $_POST['GioiTinh'];
$NgaySinh = $_POST['NgaySinh'];
$MaNganh = $_POST['MaNganh'];

// Kiểm tra và xử lý hình ảnh nếu người dùng tải ảnh mới lên
$target_dir = "uploads/"; // Thư mục để lưu file ảnh
$target_file = $target_dir . basename($_FILES["Hinh"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Nếu người dùng tải lên ảnh mới
if ($_FILES["Hinh"]["name"] != '') {
    // Kiểm tra xem file có phải là ảnh hay không
    if (getimagesize($_FILES["Hinh"]["tmp_name"]) === false) {
        echo "File không phải là ảnh.";
        exit;
    }

    // Kiểm tra kích thước file (ví dụ: tối đa 2MB)
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

    // Cập nhật dữ liệu vào cơ sở dữ liệu với hình ảnh mới
    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$target_file', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";
} else {
    // Nếu không thay đổi hình ảnh, chỉ cập nhật các trường khác
    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";
}

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật sinh viên thành công! <a href='index.php'>Trở lại danh sách</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
