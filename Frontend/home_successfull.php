<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LapTrinhWeb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../css/card_film.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <!-- header -->
    <header>
        <?php 
            $header_path = 'header_successfull.php';
            if (file_exists($header_path)) {
                include($header_path);
            } else {
                echo '<div class="container">
                    <p class="text-center">Header content not found.</p>
                </div>';
            }
        ?>
    </header>

    <!-- banner -->
    <section class="banner">
        <?php 
            $banner_path = 'banner.html';
            if (file_exists($banner_path)) {
                include($banner_path);
            } else {
                echo '<div class="container">
                    <p class="text-center">Banner content not found.</p>
                </div>';
            }
        ?>

    <!-- card_film -->
    </section>
        <?php 
            $card_film = 'card_film.php';
            if (file_exists($card_film)) {
                include($card_film);
            } else {
                echo '<div class="container">
                    <p class="text-center">Banner content not found.</p>
                </div>';
            }
        ?>
    <section>

    </section>
</body>
</html>
