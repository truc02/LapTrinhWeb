<?php
include("../connectDB/connectDB.php");
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
<div class="header">
    <div class="imageLogo">
        <a href="home_successfull.php"><img src="https://sv.ut.edu.vn/Content/AConfig/images/sv_logo_dashboard.png" alt="Logo Website"></a>
    </div>

    <div class="menu">
        <button class="btn btn-muave" onclick="return scrollToFilms()">Mua vé</button>
        <button class="btn btn-phim">Phim</button>
        <button class="btn btn-gocdienanh">Góc điện ảnh</button>
        <button class="btn btn-sukien">Sự kiện</button>
        <button class="btn btn-rap">Rạp/Giá vé</button>

        <!-- Menu drop-down cho User -->
        <div class="dropdown">
            <button class="btn btn-log" onclick="toggleDropdown()">Cá Nhân</button>
            <div class="dropdown-content" id="userDropdown">
                <a href="profile.php">Thông tin cá nhân</a>
                <a href="../php/logout.php">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        document.getElementById("userDropdown").classList.toggle("show");
    }

    // Đóng menu nếu nhấp ra ngoài
    window.onclick = function(event) {
        if (!event.target.matches('.btn-log')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    function scrollToFilms() {
        const section = document.getElementById('films-section');
        section.scrollIntoView({ behavior: 'smooth' });
    }
</script>

<style>
    .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
    height: 100px;
    font-size: 20px;
    position: relative;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .dropdown {
        position: relative;
        display: inline-block;
        margin-left: auto;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown-button {
        margin-left: auto; /* Đẩy nút sang bên phải */
    }
    .show {
        display: block;
    }

    .menu {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px; /* Khoảng cách giữa các nút */
    }

    /* Style chung cho các nút */
    .menu .btn {
        padding: 10px 20px;
        font-size: 15px;
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    /* css logo */
    .imageLogo img{
        width: 80px; 
        height: auto;
        display: block;
    }

    .imageLogo {
    flex: 0 0 auto;
    }

    /* css nút cá nhân */
    .btn-log {
    background-color: #e68414;
    color: white;
    padding: 10px 25px;
    margin-left: auto; /* Đẩy nút login sang phải */
    }

    .btn-log:hover {
    background-color: #ff5500;
    transform: translateY(-2px);
    }

    /* Nút nổi bật (Mua vé và Đăng nhập) */
    .btn-muave,
    .btn-dangnhap {
        background-color: #e68414; /* Màu cam nổi bật */
        color: white;
        padding: 10px 25px;
    }
    .btn-muave:hover,
    .btn-dangnhap:hover {
        background-color: #ff5500; /* Màu cam đậm hơn khi hover */
        transform: translateY(-2px); /* Hiệu ứng nổi lên khi hover */
    }
</style>
