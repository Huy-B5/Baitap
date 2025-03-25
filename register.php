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

$sql = "SELECT * FROM HocPhan";
$result = $conn->query($sql);

echo "<form method='POST' action='register_course.php'>";
echo "<h3>Đăng ký học phần</h3>";

while ($row = $result->fetch_assoc()) {
    echo "<input type='checkbox' name='courses[]' value='" . $row['MaHP'] . "'> " . $row['TenHP'] . " - " . $row['SoTinChi'] . " tín chỉ<br>";
}

echo "<input type='submit' value='Đăng Ký'>";
echo "</form>";
$conn->close();
?>
