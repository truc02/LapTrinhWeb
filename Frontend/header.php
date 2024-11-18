<div class="header">
    <div class="imageLogo">
        <a href="#"><img src="https://sv.ut.edu.vn/Content/AConfig/images/sv_logo_dashboard.png" alt="Logo Website"></a>
    </div>

    <div class="menu">
        <button class="btn btn-muave" onclick="return scrollToFilms()">Mua vé</button>
        <button class="btn btn-phim" onclick="return scrollToFilms()">Phim</button>
        <button class="btn btn-gocdienanh" onclick="return scrollToFilms()">Góc điện ảnh</button>
        <button class="btn btn-sukien">Sự kiện</button>
        <button class="btn btn-rap" onclick="return scrollToFilms()">Rạp/Giá vé</button>
        <button class="btn btn-log" onclick="return login()">Đăng nhập</button>
    </div>
</div>

<script>
    function login() {
        return window.location.href="login.php";
    }

    function scrollToFilms() {
        const section = document.getElementById('films-section');
        section.scrollIntoView({ behavior: 'smooth' });
    }
</script>