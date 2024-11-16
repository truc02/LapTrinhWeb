<?php
include('../connectDB/connectDB.php');

// Bắt đầu session
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    echo '<script>
        alert("Bạn cần phải đăng nhập.");
        window.location.href = "../Frontend/login.php";
    </script>';
    exit;
}

// Kiểm tra phương thức yêu cầu
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Lấy thông tin người dùng từ session
    $username = $_SESSION['username'];

    // Lấy user_id từ bảng user
    $sql = "SELECT user_id FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];

    // Lấy data từ card_film(GET)
    $film_id = $_GET['film_id'];
    $seat = $_GET['selected_seats'];
    $total_price = $_GET['total_price'];
    $order_time = date('Y-m-d H:i:s'); // Sử dụng thời gian hiện tại


    // Thực hiện truy vấn để thêm đơn hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO order_film (user_id, film_id, total_price, seat, order_time)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $user_id, $film_id, $total_price, $seat, $order_time);

    if ($stmt->execute()) {
        echo '<script>
            alert("Đã đặt thành công.");
            window.location.href = "../Frontend/home_successfull.php";
        </script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} 

