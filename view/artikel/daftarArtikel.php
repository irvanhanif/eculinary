<?php
require_once "../artikel/controller.artikel.php";
$data = (new c_artikel())->showArtikel();
// var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/daftarmakananminuman.css">
    <title>Document</title>
</head>
<body>
<?php 
require_once '../view/header.php'; 
?>
<div class="filter-wrapper">
            <h2>Urutkan Berdasarkan</h2>
            <form action="">
                <input type="button" name="terbaru" value="Terbaru">
            </form>
        </div>
        <div class="daftar-artikel">
        <?php 
            for ($i = 0; $i < count($data); $i++) {
                require 'artikel.php';
            }
        ?>
        </div>
        <?php
            require_once '../view/footer.html'; 
        ?>
</body>
</html>
