<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim Mới</title>
    <style>
        /* CSS như trước */
    </style>
</head>
<style>
        .add-film-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .image-preview {
            width: 200px;
            height: 200px;
            border: 2px dashed #ddd;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
<body>
    <div class="add-film-container">
        <div class="form-header">
            <h2>Thêm Phim Mới</h2>
        </div>

        <form action="process_add_film.php" method="POST" enctype="multipart/form-data" id="addFilmForm">
            <!-- Bỏ trường film_id -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="origin">Origin:</label>
                <input type="text" class="form-control" id="origin" name="origin" required>
            </div>

            <div class="form-group">
                <label for="time">Time:</label>
                <input type="number" class="form-control" id="time" name="time" required>
            </div>

            <div class="form-group">
                <label for="image">Poster Phim:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                <div class="image-preview" id="imagePreview"></div>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <button type="submit" class="submit-btn">Thêm Phim</button>
        </form>
    </div>

    <script>
        // JS như trước
    </script>
</body>
</html>
