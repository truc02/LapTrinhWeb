<div class="container">
    <div class="listFilm">
        <button class="btn btn-PHIM">PHIM</button>
        <button class="btn btn-dangchieu">Đang chiếu</button>
        <button class="btn btn-sapchieu">Sắp chiếu</button>
    </div>

    <!-- Movie Cards -->
    <div class="row">
        <!-- Movie Card 1 -->
        <?php include('../connectDB/connectDB.php');
        $sql = 'SELECT * FROM film';
        $result = $conn->query($sql);
        $films = array();
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               $films[] = $row;
            }
        }

        foreach ($films as $film) {
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="card movie-card">
                    <span class="category-badge"><?php echo htmlspecialchars($film['title']); ?></span>
                    <img src="../images/<?php echo htmlspecialchars($film['image']); ?>" class="card-img-top" alt="Tên phim">
                    <div class="card-body">
                        <h5 class="movie-title"><?php echo htmlspecialchars($film['name']); ?></h5>
                        <div class="movie-info mb-2">
                            <div class="rating">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                                <span class="ms-2">4.0/5.0</span>
                            </div>
                        </div>
                        <button class="btn btn-watch w-100" id="Order" onclick="window.location.href='Table_Order.html'">
                            <i class="fas fa-play me-2"></i>Đặt vé
                        </button>
                    </div>
                </div>
            </div>
            <?php
        }
    
        ?>
    </div>
</div>