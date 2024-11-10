<div class="header">
    <div class="imageLogo">
        <img src="../images/logo_lovisong.png" alt="Logo Website">
    </div>

    <div class="menu">
        <button class="btn btn-muave">Mua vé</button>
        <button class="btn btn-phim">Phim</button>
        <button class="btn btn-gocdienanh">Góc điện ảnh</button>
        <button class="btn btn-sukien">Sự kiện</button>
        <button class="btn btn-rap">Rạp/Giá vé</button>
        <button class="btn btn-log" onclick="return login()">Đăng nhập</button>
    </div>
</div>

<script>
    function login() {
        return window.location.href="login.php";
    }
</script>