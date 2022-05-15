<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/wishlist.css">
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div class="menu-wrapper">
    <div class="menu">
    <div class="user">
    <img class="profilepic" src="../view/asset/profile.png" alt="Profil">
    <div class="text">
    <h3>Hi, Jong Un!</h3>
    <p class="kota">Kota Malang</p>
    </div>
    </div>
    
    <div class="group">
        <img class="gambar"src="../view/asset/account.png" alt="profil">
    <a class="text1"><b>Profil</b></a>
</div>

    <div class="group1">
        <img class="gambar" src="../view/asset/lock.png" alt="password">
    <a class="text1"><b>Ubah Password<b></a>
</div>
    
    <div class="group1">
        <img class="gambar"src="../view/asset/favorite-file.png" alt="wishlist">
    <a class="text1"><b>Wishlist<b></a>
</div>
    
    <div class="group1">
        <img class="gambar" src="../view/asset/shop.png" alt="toko">
    <a class="text1"><b>Toko<b></a>
</div>
    
    <div class="group1">
        <img class="gambar"src="../view/asset/edit-file.png" alt="tulisArtikel">
    <a class="text1"><b>Tulis Artikel<b></a>
</div>
    
    <div class="group1">
        <img class="gambar" src="../view/asset/Logout.png" alt="logout">
    <a class="text1"><b>Logout<b></a>
</div>
</div>
    </div>
    <div class="wishlist-wrapper">
    <div class="wishlist">
    <h2>Wishlist</h2>
        <div class="daftarMakanan">
        <?php 
        for($i = 0; $i<4; $i++){
            require 'view/menu/makanan.php';
        }
        ?>
        </div>
    </div>
    </div>
        <?php require_once 'view/footer.html'; ?>
</body>

