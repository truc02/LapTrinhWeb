<?php
include('../connectDB/connectDB.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Xử lý upload hình ảnh
    $target_dir = "/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Chuẩn bị và thực thi câu lệnh SQL
    $stmt = $conn->prepare("INSERT INTO film (name, title, origin, image, time, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", 
        $_POST['name'],
        $_POST['title'],
        $_POST['origin'],
        $target_file,
        $_POST['time'],
        $_POST['description']
    );

    if ($stmt->execute()) {
        echo "<script>alert('Thêm phim thành công!'); window.location.href='list_film.php';</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
