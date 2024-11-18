<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-buttons {
            white-space: nowrap;
        }
        .btn {
            padding: 5px 10px;
            margin: 0 2px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        .btn-edit {
            background-color: #2196F3;
            color: white;
        }
        .btn-save {
            background-color: #4CAF50;
            color: white;
        }
        .add-row {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        input[type="text"], 
        input[type="file"] {
            width: 90%;
            padding: 5px;
        }
        .header-row {
            background-color: #e7e7e7;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Quản lý thông tin phim</h1>
    <table id="productTable">
        <tr class="header-row">
            <th>Name</th>
            <th>Title</th>
            <th>Origin</th>
            <th>Image</th>
            <th>Time</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        
        <?php
        include("../connectDB/connectDB.php");
        $sql = "SELECT * FROM film";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<form action='edit_film.php' method='POST'>";
                echo "<td><input type='text' name='name' value='" . htmlspecialchars($row['name']) . "'></td>";
                echo "<td><input type='text' name='title' value='" . htmlspecialchars($row['title']) . "' disabled></td>";
                echo "<td><input type='text' name='origin' value='" . htmlspecialchars($row['origin']) . "' disabled></td>";
                echo "<td><input type='text' name='image' value='" . htmlspecialchars($row['image']) . "' disabled></td>";
                echo "<td><input type='text' name='time' value='" . htmlspecialchars($row['time']) . "' disabled></td>";
                echo "<td><input type='text' name='description' value='" . htmlspecialchars($row['description']) . "' disabled></td>";
                echo "<td class='action-buttons'>";
                echo "<input type='hidden' name='old_name' value='" . htmlspecialchars($row['name']) . "'>";
                echo "<button type='button' class='btn btn-edit' onclick='this.parentNode.parentNode.querySelectorAll(\"input\").forEach(input => { if (input.name !== \"old_name\") input.disabled = false; });'>Sửa</button>";
                echo "<input type='submit' class='btn btn-save' value='Lưu'>";
                echo "<form action='delete_film.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='name' value='" . htmlspecialchars($row['name']) . "'>";
                echo "<input type='submit' class='btn btn-delete' value='Xóa' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\");'>";
                echo "</form>";
                echo "</td>";
                echo "</form>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
    <button class="add-row" onclick="window.location.href='add_film.php'">Thêm mới</button>
</body>
</html>
