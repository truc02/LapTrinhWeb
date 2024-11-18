<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Dùng</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script>
        function toggleUpdateForm() {
            const infoSection = document.getElementById('infoSection');
            const updateSection = document.getElementById('updateSection');
            infoSection.classList.toggle('d-none');
            updateSection.classList.toggle('d-none');
        }
    </script>
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

            // Cập nhật thông tin
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newHoTen = $_POST['ho_ten'];
                $newEmail = $_POST['email'];

                $updateSql = "UPDATE user SET tenkh='$newHoTen', email='$newEmail' WHERE username='$username'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "<div class='alert alert-success'>Cập nhật thông tin thành công!</div>";
                    $HoTen = $newHoTen; // Cập nhật lại tên
                    $email = $newEmail; // Cập nhật lại email
                } else {
                    echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
                }
            }
        ?>    
        <h1>THÔNG TIN CÁ NHÂN</h1>
        <div id="infoSection">
            <div class="info">
                <strong>Họ và tên: </strong> <span id="userName"><?php echo $HoTen; ?></span>
            </div>
            <div class="info">
                <strong>Tên đăng nhập: </strong> 
                <span id="userAge"><?php echo $name; ?></span>
            </div>
            <div class="info">
                <strong>Email: </strong> <span id="userEmail"><?php echo $email; ?></span>
            </div>
            <button class="btn btn-primary" onclick="toggleUpdateForm()">Cập Nhật</button>
        </div>

        <div id="updateSection" class="d-none">
            <form method="POST">
                <div class="info">
                    <strong>Họ và tên</strong> 
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php echo $HoTen; ?>" required>
                </div>
                <div class="info">
                    <strong>Email</strong> 
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
            
                <div class="btn form-group ">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <button type="button" class="btn btn-secondary" onclick="toggleUpdateForm()">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
