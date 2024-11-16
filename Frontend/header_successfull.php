<?php
include("../connectDB/connectDB.php");
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
<div class="header">
    <div class="imageLogo">
        <a href="home_successfull.php"><img src="../images/logo_lovisong.png" alt="Logo Website"></a>
    </div>

    <div class="menu">
        <button class="btn btn-muave">Mua vé</button>
        <button class="btn btn-phim">Phim</button>
        <button class="btn btn-gocdienanh">Góc điện ảnh</button>
        <button class="btn btn-sukien">Sự kiện</button>
        <button class="btn btn-rap">Rạp/Giá vé</button>

        <!-- Menu drop-down cho User -->
        <div class="dropdown">
            <button class="btn btn-log" onclick="toggleDropdown()">User</button>
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
</script>

<style>
    .dropdown {
        position: relative;
        display: inline-block;
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

    .show {
        display: block;
    }
</style>
