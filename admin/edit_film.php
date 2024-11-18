<?php
include("../connectDB/connectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filmName = $_POST['name']; // Lấy tên phim mới
    $oldFilmName = $_POST['old_name'];
    $filmTitle = $_POST['title'];
    $filmOrigin = $_POST['origin'];
    $filmImage = $_POST['image'];
    $filmTime = $_POST['time'];
    $filmDescription = $_POST['description'];

    // Kiểm tra xem các trường có giá trị không
    if ($filmName && $filmTitle && $filmOrigin && $filmImage && $filmTime && $filmDescription) {
        // Sử dụng prepared statement để bảo mật
        $sql = "UPDATE film SET name = ?, title = ?, origin = ?, image = ?, time = ?, description = ? WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $filmName, $filmTitle, $filmOrigin, $filmImage, $filmTime, $filmDescription, $oldFilmName);

        if ($stmt->execute()) {
            echo "<script>alert('Cập nhật thành công'); window.location.href='list_film.php';</script>";
        } else {
            echo "<script>alert('Không thể cập nhật phim: " . $conn->error . "'); window.location.href='list_film.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Dữ liệu không hợp lệ.'); window.location.href='list_film.php';</script>";
    }
}

$conn->close();
?>
