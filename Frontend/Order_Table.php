<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách ghế ngồi</title>
    <link rel="stylesheet" href="../css/Order_Table.css">
</head>
<body>
    <?php
        include('../connectDB/connectDB.php');

        // get film_id
        $film_id = $_GET['film_id'];

        // Lấy danh sách ghế đã đặt
        $sql = "SELECT film_id, seat FROM order_film";
        $result = $conn->query($sql);

        $bookedSeats = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $currentFilmId = $row["film_id"];
                $seats = $row["seat"];

                //
                if(!isset($bookedSeats[$currentFilmId])){
                    $bookedSeats[$currentFilmId] = array();
                }

                $seat = preg_split('/[,\s]+/',$seats);
                $seat = array_filter($seat);

                if(!empty($bookedSeats[$currentFilmId])){
                    $bookedSeats[$currentFilmId] = array_merge($bookedSeats[$currentFilmId],$seat);
                }
                else{
                    $bookedSeats[$currentFilmId] = $seat;
                }
            }
        }

      // In ra số lượng ghế cho từng film_id
    if (isset($bookedSeats[$film_id])) {
        $seatCount = count($bookedSeats[$film_id]); // Đếm số lượng ghế đã đặt
        if ($seatCount > 0) {
            echo "Film ID $film_id has $seatCount booked seats: " . htmlspecialchars(implode(', ', $bookedSeats[$film_id])) . "<br>";
        } else {
            echo "Film ID $film_id has no booked seats.<br>";
        }
    } else {
        echo "Film ID $film_id has no booked seats.<br>";
        $bookedSeats[$film_id] = array(); // Khởi tạo mảng cho film_id nếu chưa tồn tại
    }
    
        $conn->close();
    ?>

    <h2 style="text-align: center;">Danh sách ghế ngồi</h2>
    
    <div class="booking-container">
        <form id="booking-form" method="get" action="../php/order_successfull.php">
            <div class="seat-map">
                <div class="screen">Màn hình</div>
                <table id="seat_table">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color booked"></div>
                        <span>Đã đặt</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color not-booked"></div>
                        <span>Còn trống</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color selected"></div>
                        <span>Đang chọn</span>
                    </div>
                </div>
            </div>

            <div id="select_seat">
                <h3>Ghế đã chọn</h3>
                <p id="select_seat_list">Chưa có ghế nào được chọn</p>
                <div id="price_summary" style="display: none;">
                    <h4>Tổng tiền:</h4>
                    <p id="total_price">0 VND</p>
                    <input type="hidden" id="selected_seats" name="selected_seats">
                    <input type="hidden" name="total_price">
                    <input type="hidden" name="film_id" id="film_id" value="<?php echo htmlspecialchars($film_id); ?>" required>
                    <button class="btn btn-watch w-100" type="submit">
                        <i class="fas fa-play me-2"></i>Xác nhận đặt vé
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seatCount = 10;
            const rowLabels = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
            const selectedSeats = new Set();
            const PRICE_PER_SEAT = 45000; 

            // Add column headers
            const headerRow = document.querySelector('#seat_table thead tr');
            for (let i = 1; i <= seatCount; i++) {
                const th = document.createElement('th');
                th.textContent = i;
                headerRow.appendChild(th);
            }

            // Create seat grid
            const tbody = document.querySelector('#seat_table tbody');
            rowLabels.forEach(row => {
                const tr = document.createElement('tr');
                const th = document.createElement('th');
                th.textContent = row;
                tr.appendChild(th);

                for (let i = 1; i <= seatCount; i++) {
                    const td = document.createElement('td');
                    td.className = 'not-booked';
                    td.dataset.row = row;
                    td.dataset.seat = i;
                    td.addEventListener('click', handleSeatClick);
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
            });

            function handleSeatClick(e) {
                const seat = e.target;
                if (seat.classList.contains('booked')) return;

                const seatId = `${seat.dataset.row}${seat.dataset.seat}`;
                
                if (selectedSeats.has(seatId)) {
                    selectedSeats.delete(seatId);
                    seat.classList.remove('selected');
                } else {
                    selectedSeats.add(seatId);
                    seat.classList.add('selected');
                }

                updateSelectedSeats();
            }

            function updateSelectedSeats() {
                const seatList = document.getElementById('select_seat_list');
                const priceSummary = document.getElementById('price_summary');
                const totalPrice = document.getElementById('total_price');
                const selectedSeatsInput = document.getElementById('selected_seats');
                        
                if (selectedSeats.size === 0) {
                    seatList.textContent = 'Chưa có ghế nào được chọn';
                    priceSummary.style.display = 'none';
                    selectedSeatsInput.value = '';
                } else {
                    const seatArray = Array.from(selectedSeats).sort();
                    seatList.textContent = `Ghế: ${seatArray.join(', ')}`;
                    priceSummary.style.display = 'block';
                    const totalCost = selectedSeats.size * PRICE_PER_SEAT;
                    totalPrice.textContent = `${totalCost.toLocaleString('vi-VN')} VND`;
                    selectedSeatsInput.value = seatArray.join(',');
                    
                    // Cập nhật giá trị hidden input cho total_price
                    document.querySelector('input[name="total_price"]').value = totalCost;
                }
            }

            // Đánh dấu ghế đã đặt
            const preBookedSeats = <?php echo json_encode($bookedSeats[$film_id]) ?? []; ?>;
            preBookedSeats.forEach(seatId => {
                const row = seatId[0];
                const seat = seatId.slice(1);
                const seatElement = document.querySelector(`td[data-row="${row}"][data-seat="${seat}"]`);
                if (seatElement) {
                    seatElement.classList.remove('not-booked');
                    seatElement.classList.add('booked');
                }
            });
        });
    </script>
</body>
</html>