<?php
include("../connectDB/connectDB.php");
$sql = "SELECT * FROM film";
$result = $conn->query($sql);
$list_film = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $list_film[] = $row;
    }
}

// In toàn bộ thông tin phim
foreach ($list_film as $film) {
    echo "ID: " . $film['film_id'] . "<br>";
    echo "Tên phim: " . $film['name'] . "<br>";
    echo "Thể loại: " . $film['title'] . "<br>";
    echo "Năm phát hành: " . $film['origin'] . "<br>";
    echo "Đạo diễn: " . $film['time'] . "<br>";
    echo "Mô tả: " . $film['description'] . "<br>";
    echo "<hr>"; // Đường phân cách giữa các phim
}
?>
