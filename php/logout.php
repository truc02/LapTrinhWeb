<?php
session_start(); // Khởi động phiên làm việc

// Xóa tất cả các biến phiên
$_SESSION = array();

// Nếu cần, xóa cookie phiên
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Đóng phiên
session_destroy();

// Chuyển hướng về trang chính
header("Location: ../Frontend/home.php");
exit();
?>
