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
    ?>
    <h2 style="text-align: center;">Danh sách ghế ngồi</h2>
    
    <div class="booking-container">
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
                <button id="confirm_booking" class="btn-confirm" onclick="return orderSuccessfull()">Xác nhận đặt vé</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seatCount = 10;
            const rowLabels = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
            const selectedSeats = new Set();
            const PRICE_PER_SEAT = 90000; // 90,000 VND per seat

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

                if (selectedSeats.size === 0) {
                    seatList.textContent = 'Chưa có ghế nào được chọn';
                    priceSummary.style.display = 'none';
                } else {
                    const seatArray = Array.from(selectedSeats).sort();
                    seatList.textContent = `Ghế: ${seatArray.join(', ')}`;
                    priceSummary.style.display = 'block';
                    totalPrice.textContent = `${(selectedSeats.size * PRICE_PER_SEAT).toLocaleString('vi-VN')} VND`;
                }
            }

            // Simulate some pre-booked seats
            const preBookedSeats = ['A1', 'B5', 'C3', 'D7', 'E2'];
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