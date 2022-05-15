<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/detailmakanan.css">
</head>
<body>
<?php require_once 'view/header.php'; ?>
        <div class="makanan-wrapper">
        <div class="makanan">
            <div class="menu-wrapper">  
        <img class="gambar"src="../../view/asset/detailmakanan.png" alt="detailmakanan">
        <div class="text">
        <p>Silakan berikan bintang!</p>
    <img src="../../view/asset/bintang.png" alt="rating">
        </div>
        </div>
        <div class="detail-wrapper">
        <div class="menu">
    <p class="detail"><b>Es Campur Dempo</b></p>
    <p class="detail">Malang</p>
    </div>
    <div class="ratingHarga">
    <img class="rating"src="../../view/asset/bintang.png" alt="rating">
    <p class="harga">Rp 10.000</p>
    </div>
        </div>
        </div>
    </div>

    <div class="komentar-wrapper">

    </div>
    <div class="komen-kategori">
    <div class="kolom-komentar">
    <div class="komentar">
        <p class="komen">Komentar</p>
        <div class="isi">
        <img class="profil"src="../../view/asset/profile.png" alt="profil">
        <form class="button-submit" action="">
            <input class="kolom" type="text" name="komentar" placeholder="Tambahkan komentar...">
            <input type="button" name="submit">
        </form>
        </div>

    <div class="comment"><img class="account"src="../../view/asset/profil1.png" alt="profil">
    <p class="komentar1">Enak banget, pasti bakal kesinii lagii</p></div>

    <div class="comment"><img class="account" src="../../view/asset/profil1.png" alt="profil">
        <p class="komentar1">Esnya Segerrr</p></div>

    <div class="comment"><img class="account" src="../../view/asset/profil1.png" alt="profil">
        <p class="komentar1">Enak banget, pasti bakal kesinii lagii</p></div>

    <div class="comment"><img class="account" src="../../view/asset/profil1.png" alt="profil">
        <p class="komentar1">Esnya Segerrr</p></div>
        <a href="">
         <img class="lanjut"alt="arrow-down" src="../../view/asset/arrow-down.png"
         width=30>
</a>
    </div>
    </div>
    <div class="kolom-tersedia">

        <div class="tersedia">
            <p class="kategori">Kategori</p>
            <div class="konten">
                <p>Minuman</p>
                <p>Es Krim</p>
            </div>
            <p class="jamOperasional">Jam Operasional</p>
            <div class="weekday">
                <p class="hari">Senin-Jumat</p>
                <p class="jam-weekday">08.00-21.00</p>
            </div>
            <div class="weekend">
                <p class="hari">Sabtu-Minggu</p>
                <p class="jam-weekend">10.00-23.00</p>
            </div>
            <input class="lihat" type="button" name="detailToko" value="Lihat Detail Toko">
        </div> 
    </div>
    </div>
    <?php require_once 'view/footer.html'; ?>

</body>
</html>