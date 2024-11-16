<?php
include("../connectDB/connectDB.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Sử dụng Prepared Statement để tránh SQL Injection
    $sql = "SELECT * FROM user WHERE username = ?"; // Lấy thông tin người dùng
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra người dùng
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kiểm tra mật khẩu (không băm)
        if ($password === $row['password']) {
            // Khởi động phiên làm việc
            session_start();
            $_SESSION['username'] = $username; // Lưu tên người dùng vào phiên
            
            // Chuyển hướng đến trang chính sau khi đăng nhập thành công
            echo '<script>
                window.location.href = "../Frontend/home_successfull.php"; 
            </script>';
        } else {
            echo '<script>
                alert("Mật khẩu không đúng.");
                window.location.href = "../Frontend/login.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("Người dùng không tồn tại.");
            window.location.href = "../Frontend/login.php";
        </script>';
    }

    // Đóng prepared statement
    $stmt->close();
}

$conn->close();
?>
