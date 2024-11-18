<?php
$server = "localhost:3307";
$user = "root";
$password = "";
<<<<<<< HEAD
$database = "mydata";
=======
$database = "database_film";
>>>>>>> 4947503d8201cc11f0c0b28daa7bb41143b5c13c

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($server, $user, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

