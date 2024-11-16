<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    
</head>
<body>
    <header>
        <?php 
            $header_path = '../Frontend/header_successfull.php';
            if (file_exists($header_path)) {
                include($header_path);
            } else {
                echo '<div class="container">
                    <p class="text-center">Header content not found.</p>
                </div>';
            }
        ?>
    </header>
    <div class="container">
        <?php
            session_start(); 
            include("../connectDB/connectDB.php");

            if (!isset($_SESSION["username"])) {
                header("location:login.php");
            }

            $username = $_SESSION['username'];
            $sql = "SELECT tenkh, username, email FROM user WHERE username = '$username'";
            $kq1 = $conn->query($sql);
            $row = $kq1->fetch_assoc();

            $HoTen = $row['tenkh'];
            $name = $row['username'];
            $email = $row['email'];
        ?>
        <h3>Xin chào họ tên: <span><?php echo $HoTen; ?></span></h3>
        <h3>Username: <span><?php echo $name; ?></span></h3>
        <h3>Email: <span><?php echo $email; ?></span></h3>
    </div>


</body>
</html>
