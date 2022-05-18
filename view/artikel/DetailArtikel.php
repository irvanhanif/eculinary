<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/detailArtikel.css">
</head>
    <body>
    <?php 
    require_once 'view/header.php'; 
    ?>
    <div id="banner">
        <img src="../../view/asset/banner.png" alt="banner" id="img-banner">
    </div>
    <div id="artikel-box">
        <div class="artikel">
            <h3 class="judul"><?php echo $data["judul_artikel"] ?></h3>
            <div class="author-wrapper">
                <div class="author">
                    <h5>
                        <?php echo $data["nama_penulis"] , " - " ?>
                    </h5>
                    <?php 
    date_default_timezone_set('Asia/Jakarta');
                    $timestamp = strtotime($data["time_create_artikel"]);
                    $datetime = array(date(' l, d F Y', $timestamp), date('H:i', $timestamp));
                    ?>
                    <h5><?php echo $datetime[0] ?> | </h5>
                    <h5>22:30WIB</h5>
                </div>
            </div>
            <div class="isi-wrapper">
                <p class="isi">
                <?php echo $data["isi_artikel"] ?>
                </p>
            </div>
        </div>
    </div>
        <?php
            require_once 'view/footer.html'; 
        ?>
    </body>

