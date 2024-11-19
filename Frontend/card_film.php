<<?php 
include('../connectDB/connectDB.php');

$sd = 8; // Số lượng phim trên mỗi trang
$sl = "SELECT * FROM film"; 
$kq = $conn->query($sl);
$tsp = mysqli_num_rows($kq); 

// Tổng số trang
$tst = ceil($tsp / $sd);

// Tính trang hiện hành
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

// Tính vị trí lấy phim theo vị trí
$vt = ($page - 1) * $sd;

// Truy vấn lấy phim theo vị trí
$sl2 = "SELECT * FROM film LIMIT $vt, $sd"; // Sửa $vs thành $vt
$kq2 = $conn->query($sl2);
$films = array();

if($kq2->num_rows > 0){
    while($row = $kq2->fetch_assoc()){
       $films[] = $row;
    }
}

// Lấy tổng số phim để tính số trang
$totalResult = $conn->query("SELECT COUNT(*) as total FROM film");
$totalRow = $totalResult->fetch_assoc();
$totalFilms = $totalRow['total'];
$totalPages = ceil($totalFilms / $sd); // Tính số trang
?>


<div class="container">
    <div class="listFilm">
        <button class="btn btn-PHIM" onclick="showAllFilms()">PHIM</button>
        <button class="btn btn-dangchieu" onclick="showCurrentFilms()">Đang chiếu</button>
        <button class="btn btn-sapchieu" onclick="showUpcomingFilms()">Sắp chiếu</button>
    </div>

    <!-- Movie Cards -->
    <div class="row" id="filmContainer">
        <?php 
        foreach ($films as $film) {
            $film_id = $film['film_id'];
            $release_date = $film['ngaychieu']; // Ngày chiếu
            ?>
            <div class="col-md-3 col-sm-6 film-card" data-release-date="<?php echo htmlspecialchars($release_date); ?>">
                <div class="card movie-card">
                    <span class="category-badge"><?php echo htmlspecialchars($film['title']); ?></span>
                    <img src="../images/<?php echo htmlspecialchars($film['image']); ?>" class="card-img-top" alt="Tên phim">
                    <div class="card-body">
                        <h5 class="movie-title"><?php echo htmlspecialchars($film['name']); ?>.</h5>
                        <h2 class="movie-time">Thời gian: <?php echo htmlspecialchars($film['time']); ?></h2>
                        <div class="movie-info mb-2">
                            <div class="rating">
                                <span>Đánh giá:</span>  
                                <span class="ms-2">4.0/5.0</span>  
                                <i class="fas fa-star text-warning">★</i>
                                <i class="fas fa-star text-warning">★</i>
                                <i class="fas fa-star text-warning">★</i>
                                <i class="fas fa-star text-warning">★</i>
                                <i class="far fa-star text-warning">★</i>                               
                            </div>
                        </div>
                        <form action="Order_Table.php" method="get">
                            <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($film['film_id']); ?>">
                            <button class="btn btn-watch w-100" type="submit">
                                <i class="fas fa-play me-2"></i>Đặt vé
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<script>
function showCurrentFilms() {
    const today = new Date().toISOString().split('T')[0]; // Lấy ngày hôm nay theo định dạng YYYY-MM-DD
    const filmCards = document.querySelectorAll('.film-card');

    filmCards.forEach(card => {
        const releaseDate = card.getAttribute('data-release-date');
        if (releaseDate === today) {
            card.style.display = 'block'; // Hiện phim nếu ngày chiếu là hôm nay
        } else {
            card.style.display = 'none'; // Ẩn phim nếu không phải
        }
    });
}

function showUpcomingFilms() {
    const today = new Date();
    today.setDate(today.getDate()); // Đặt ngày thành ngày mai
    const tomorrow = today.toISOString().split('T')[0]; // Lấy ngày mai theo định dạng YYYY-MM-DD
    const filmCards = document.querySelectorAll('.film-card');

    filmCards.forEach(card => {
        const releaseDate = card.getAttribute('data-release-date');
        if (releaseDate > tomorrow) {
            card.style.display = 'block'; // Hiện phim nếu ngày chiếu là ngày mai hoặc sau đó
        } else {
            card.style.display = 'none'; // Ẩn phim nếu không phải
        }
    });
}

function showAllFilms() {
    const filmCards = document.querySelectorAll('.film-card');
    filmCards.forEach(card => {
        card.style.display = 'block'; // Hiện tất cả phim
    });
}
</script>

<style>
.pagination {
    justify-content: center; /* Giữa trang */
}
</style>
