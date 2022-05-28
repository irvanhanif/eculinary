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
            width: <?php if($data[0]["bintang"]) echo ($data[0]["bintang"]/5)*100; else echo 0 ?>%;
            white-space: nowrap;
            overflow: hidden;
        }

    </style>
</head>
<body>
<?php require_once 'view/header.php'; 
$dataWishlist = (new c_menu())->checkMyWishlist($id);
$rating = (new c_menu())->getRating($id); ?>
        <div class="makanan-wrapper">
        <div class="makanan">
            <div class="menu-wrapper">
        <img class="gambar"src="../../<?php if($data[0]["avatar"]) echo $data[0]["avatar"]; else echo 'view/asset/detailmakanan.png' ?>" alt="detailmakanan">
        <div class="text">
        <p>Silakan berikan bintang!</p>
            <div class="ratingInput">
                <i class="fas fa-star" <?php if(isset($rating[0]["bintang"]) && $rating[0]["bintang"] > 0) echo 'style="color: #FFAB65"' ?> onclick="clickBintang(1)"></i>
                <i class="fas fa-star" <?php if(isset($rating[0]["bintang"]) && $rating[0]["bintang"] > 1) echo 'style="color: #FFAB65"' ?> onclick="clickBintang(2)"></i>
                <i class="fas fa-star" <?php if(isset($rating[0]["bintang"]) && $rating[0]["bintang"] > 2) echo 'style="color: #FFAB65"' ?> onclick="clickBintang(3)"></i>
                <i class="fas fa-star" <?php if(isset($rating[0]["bintang"]) && $rating[0]["bintang"] > 3) echo 'style="color: #FFAB65"' ?> onclick="clickBintang(4)"></i>
                <i class="fas fa-star" <?php if(isset($rating[0]["bintang"]) && $rating[0]["bintang"] > 4) echo 'style="color: #FFAB65"' ?> onclick="clickBintang(5)"></i>
            </div>
            <script>
                function clickBintang($id){
                    for($k = 0; $k < 5; $k++){
                        document.getElementsByClassName("ratingInput")[0].getElementsByTagName("i")[$k].style.color = "black";
                    }
                    for($k = 0; $k < $id; $k++){
                        document.getElementsByClassName("ratingInput")[0].getElementsByTagName("i")[$k].style.color = "#FFAB65";
                    }
                    sendRating($id);
                }
            </script>
        </div>
        <div class="wishlist-btn"><i onclick="wishlistBtn()" class="<?php if($dataWishlist) echo "aktif " ?>fa-solid fa-heart"></i></div>
        <script>
            function wishlistBtn(){
                document.querySelector(".wishlist-btn i").classList.toggle("aktif");
                fetch("http://localhost:8080/eculinary2/view/menu/addWishlist.php",{
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: "id_menu=<?php echo $data[0]["id_menu"] ?>"
                })
                .then(res => res.text())
                .then(data => 
                        data = "i"
                        // document.getElementById("scriptlogin").innerHTML = data;
                )
            }
        </script>
        <div id="scriptlogin"></div>
        </div>
        <div class="detail-wrapper">
        <div class="menu">
    <p class="detail"><b><?php echo $data[0]["nama_menu"] ?></b></p>
    <p class="detail">Malang</p>
    </div>
    <div class="ratingHarga">
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
    <script>
        function sendRating(star){
            // console.log(star);
            const formData = new FormData();
            formData.append('bintang', star);
            formData.append('id_menu', <?php echo $data[0]["id_menu"] ?>);
            fetch("http://localhost:8080/eculinary2/view/menu/sendRating.php",{
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(data => console.log(data));
        }
    </script>
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
            <input class="kolom" type="text" placeholder="Tambahkan komentar...">
            <input type="button" value="" onclick="komen()" class="button-submit">
        </form>
        <script>
            function komen(){
                const komentar = document.querySelector('.kolom').value;
                const formData = new FormData();
                formData.append('komentar', komentar);
                formData.append('id_menu', <?php echo $data[0]["id_menu"] ?>);
                fetch("http://localhost:8080/eculinary2/view/menu/sendKomentar.php",{
                    method: "POST",
                    body: formData
                })
                .then(res => document.querySelector('.kolom').value = "");
            }
        </script>
        </div>
        <div class="baris-komentar">
    <script>
        getKomen();
        function getKomen(){
            const komentar = document.querySelector('.kolom').value;
            fetch("http://localhost:8080/eculinary2/view/menu/readKomentar.php?id_menu=<?php echo $data[0]["id_menu"] ?>")
            .then(res => res.text())
            .then(data => {
                document.querySelector(".baris-komentar").innerHTML = data;
            });    
            setTimeout(getKomen, 100);
        }
    </script>
</div>
    <!-- <div class="comment"><img class="account"src="../../view/asset/profil1.png" alt="profil">
    <p class="komentar1">Enak banget, pasti bakal kesinii lagii</p></div> -->
    
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
                <a style="color: black; text-decoration: none" href="../../search?kategori=<?php echo $data[0]["kategori"] ?>"><?php echo $data[0]["kategori"] ?></a>
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