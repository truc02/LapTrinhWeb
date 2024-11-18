<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LapTrinhWeb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <!-- <link rel="stylesheet" href="../css/banner.css"> -->
    <link rel="stylesheet" href="../css/card_film.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
    <!-- header -->
    <header>
        <?php 
            $header_path = 'header.php';
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
    </section>

    <!-- card_film -->
    <section id="films-section">
        <?php 
            $card_film = 'card_film.php';
            if (file_exists($card_film)) {
                include($card_film);
            } else {
                echo '<div class="container">
                    <p class="text-center">Card film not found.</p>
                </div>';
            }
        ?>
    </section>

    <!-- footer -->
    <section>
    <?php 
            $footer = 'footer.html';
            if (file_exists($footer)) {
                include($footer);
            } else {
                echo '<div class="container">
                    <p class="text-center">Footer not found.</p>
                </div>';
            }
        ?>
    </section>
</body>
</html>
