<div class="container">
    <div class="listFilm">
        <button class="btn btn-PHIM">PHIM</button>
        <button class="btn btn-dangchieu">Đang chiếu</button>
        <button class="btn btn-sapchieu">Sắp chiếu</button>
    </div>

    <!-- Movie Cards -->
    <div class="row">
        <!-- Movie Card 1 -->
        <?php 
        include('../connectDB/connectDB.php');
        $sql = 'SELECT * FROM film';
        $result = $conn->query($sql);
        $films = array();
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               $films[] = $row;
            }
        }
        
        foreach ($films as $film) {
            $film_id = $film['film_id'];
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="card movie-card">
                    <span class="category-badge"><?php echo htmlspecialchars($film['title']); ?></span>
                    <img src="../images/<?php echo htmlspecialchars($film['image']); ?>" class="card-img-top" alt="Tên phim">
                    <div class="card-body">
                        <h5 class="movie-title"><?php echo htmlspecialchars($film['name']); ?>.</h5>
                        <h2 class="movie-time">Thời gian: <?php echo htmlspecialchars($film['time']); ?>/Phút.</h2>
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
                        <!-- <form action="Order_Table.php" method="get">
                            <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($film['film_id']); ?>">
                            <button class="btn btn-watch w-100" type="submit">
                                <i class="fas fa-play me-2"></i>Đặt vé
                            </button>
                        </form> -->
                        
                        <form action="Order_Table.php" method="get">
                            <input type="hidden"  name="film_id" id="film_id" value="<?php echo htmlspecialchars($film['film_id']); ?>" required>
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
</div>
