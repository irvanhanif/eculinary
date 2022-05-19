<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/css/detailmakanan.css">
    <style>
        .rating__overlay {
            color: #FFAB65;
            position: absolute;
            top: 0;
            left: 0;
            width: <?php echo (2.5/5)*100 ?>%;
            white-space: nowrap;
            overflow: hidden;
        }

    </style>
</head>
<body>
<?php require_once 'view/header.php'; ?>
        <div class="makanan-wrapper">
        <div class="makanan">
            <div class="menu-wrapper">  
        <img class="gambar"src="../../<?php if($data[0]["avatar"]) echo $data[0]["avatar"]; else echo 'view/asset/detailmakanan.png' ?>" alt="detailmakanan">
        <div class="text">
        <p>Silakan berikan bintang!</p>
    <!-- <img src="../../view/asset/bintang.png" alt="rating"> -->
            <div class="ratingInput">
                <i class="fas fa-star" onclick="clickBintang(1)"></i>
                <i class="fas fa-star" onclick="clickBintang(2)"></i>
                <i class="fas fa-star" onclick="clickBintang(3)"></i>
                <i class="fas fa-star" onclick="clickBintang(4)"></i>
                <i class="fas fa-star" onclick="clickBintang(5)"></i>
            </div>
            <script>
                function clickBintang($id){
                    for($k = 0; $k < 5; $k++){
                        document.getElementsByClassName("ratingInput")[0].getElementsByTagName("i")[$k].style.color = "black";
                    }
                    for($k = 0; $k < $id; $k++){
                        document.getElementsByClassName("ratingInput")[0].getElementsByTagName("i")[$k].style.color = "#FFAB65";
                    }
                }
            </script>
        </div>
        </div>
        <div class="detail-wrapper">
        <div class="menu">
    <p class="detail"><b><?php echo $data[0]["nama_menu"] ?></b></p>
    <p class="detail">Malang</p>
    </div>
    <div class="ratingHarga">
    <!-- <img class="rating"src="../../view/asset/bintang.png" alt="rating"> -->
    <div class="rating">
        <div class="rating__overlay">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <div class="rating__base">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>
    <p class="harga">Rp <?php echo $data[0]["harga"] ?></p>
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
        <form action="" method="post" id="form-komen">
            <input class="kolom" type="text" name="komentar" placeholder="Tambahkan komentar...">
            <input type="submit" name="btnsubmit" value="" class="button-submit">
        </form>
        <?php 
        // var_dump($data);
        if(isset($_POST["btnsubmit"])){
            // echo $data[0]["id_menu"], $_POST["komentar"];
            require_once "menu/controller.menu.php";
            $komentar = new c_menu();
            $komentar->createKomentar($data[0]["id_menu"], $_POST["komentar"]);
        }
        ?>
        </div>
        <div class="baris-komentar">
    <?php
        require_once "menu/controller.menu.php";
        $dataKomentar = (new c_menu())->getAllKomentar($data[0]["id_menu"]);
        // var_dump($dataKomentar);
        for ($i=count($dataKomentar)-1; $i >=0  ; $i--) {
            $value = $dataKomentar[$i];
            // var_dump($value);
    ?>
    <div class="comment"><img class="account"src="../../<?php if(isset($value["avatar"]) && $value["avatar"]) echo $value["avatar"]; else echo 'view/asset/profil1.png' ?>" alt="profil">
    <p class="komentar1"><?php echo $value["isi_komentar"] ?></p></div>
    <?php
        }
    ?>
</div>
    <!-- <div class="comment"><img class="account"src="../../view/asset/profil1.png" alt="profil">
    <p class="komentar1">Enak banget, pasti bakal kesinii lagii</p></div> -->
    
    <!-- <div class="comment"><img class="account" src="../../view/asset/profil1.png" alt="profil">
        <p class="komentar1">Esnya Segerrr</p></div> -->

    <!-- <div class="comment"><img class="account" src="../../view/asset/profil1.png" alt="profil">
        <p class="komentar1">Enak banget, pasti bakal kesinii lagii</p></div>

    <div class="comment"><img class="account" src="../../view/asset/profil1.png" alt="profil">
        <p class="komentar1">Esnya Segerrr</p></div> -->
        <!-- <a href="">
         <img class="lanjut"alt="arrow-down" src="../../view/asset/arrow-down.png"
         width=30>
</a> -->
    </div>
    </div>
    <div class="kolom-tersedia">

        <div class="tersedia">
            <p class="kategori">Kategori</p>
            <div class="konten">
                <!-- <p>Minuman</p>
                <p>Es Krim</p> -->
                <p><?php echo $data[0]["kategori"] ?></p>
            </div>
            <p class="jamOperasional">Jam Operasional</p>
            <div class="weekday">
                <p class="hari">Buka</p>
                <p class="jam-weekday"><?php echo $data[0]["jam_awal"] ?></p>
            </div>
            <div class="weekend">
                <p class="hari">Tutup</p>
                <p class="jam-weekend"><?php echo $data[0]["jam_akhir"] ?></p>
            </div>
            <input class="lihat" type="button" name="detailToko" value="Lihat Detail Toko" onclick="location.href='../../toko/detail/<?php echo $data[0]['id_toko'] ?>'">
        </div> 
    </div>
    </div>
    <?php require_once 'view/footer.html'; ?>

</body>
</html>