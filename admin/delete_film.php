<?php
include("../connectDB/connectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filmName = $_POST['name'];

    if ($filmName) {
        // Sử dụng prepared statement để bảo mật
        $sql = "DELETE FROM film WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $filmName);

        if ($stmt->execute()) {
            echo "<script>alert('Xóa thành công'); window.location.href='list_film.php';</script>";
        } else {
            echo "<script>alert('Không thể xóa phim: " . $conn->error . "'); window.location.href='list_film.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Tên phim không hợp lệ.'); window.location.href='list_film.php';</script>";
    }
}

$conn->close();
?>
