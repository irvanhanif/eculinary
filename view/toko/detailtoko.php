<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php if(isset($path)) echo $path ?>view/css/style.css">
    <title>Document</title>
</head>
<body>
<?php require_once 'view/header.php'; ?> 
    <div class="content-wrapper">
        <div class="detail-toko">
            <div class="logo">
                <img src="../../<?php if(isset($data["avatar"])) echo $data["avatar"]; else echo "view/asset/logo_toko.png" ?>" alt="foto-toko">
            </div>
            <div class="informasi">
                <h1><?php echo $data["nama_toko"] ?></h1>
                <h2>Kota <?php echo $data["kota"] ?></h2>
                <h3><?php echo $data["alamat"] ?></h3>
                <div class="total-menu">
                    <img src="../../view/asset/clipboard.png" alt="clipboard">
                    <h2>Menu : <span><?php if($menu) echo $menu; else echo 0; ?></span></h2>
                </div>
            </div>
        </div>
        <div class="filter-wrapper">
            <h2>Urutkan Berdasarkan</h2>
            <form action="">
                <input type="button" name="terbaru" value="Terbaru">
                <input type="button" name="populer" value="Populer">
                <select name="harga">
                    <option value disabled selected>Harga</option>
                    <option value="rendah">Harga : Rendah ke Tinggi</option>
                    <option value="tinggi">Harga : Tinggi ke Rendah</option>
                </select>
            </form>
        </div>
        <div class="daftar-makanan">
        <?php
            require_once "menu/controller.menu.php";
            $daftarMenu = (new c_menu())->getAllMenuToko($data["id_toko"], '', '');
            // var_dump($daftarMenu); 
            for ($i = 0; $i < count($daftarMenu); $i++) {
                require 'view/menu/makanan.php';
            }
        ?>
        </div>
    </div>
</body>
</html>