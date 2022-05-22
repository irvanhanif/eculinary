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
<?php require_once 'view/header.php'; ?>
        <div class="makanan-wrapper">
        <div class="makanan">
            <div class="menu-wrapper">
        <img class="gambar"src="../../<?php if($data[0]["avatar"]) echo $data[0]["avatar"]; else echo 'view/asset/detailmakanan.png' ?>" alt="detailmakanan">
        <div class="text">
        <p>Silakan berikan bintang!</p>
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
                    sendRating($id);
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
            console.log(star);
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
                });
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
                data = data.split("{" && "},");
                let komentar = [];
                for(let i = 0; i < data.length-1; i++){
                    komentar[i] = data[i].split("|");
                    komentarDetail = [];
                    for (let j = 0; j < komentar[i].length-1; j++) {
                        komentarDetail[j] = komentar[i][j].split("=");
                    }
                    komentar[i] = komentarDetail;
                }
                document.querySelector(".baris-komentar").innerHTML = "";
                for (let i = 0; i < komentar.length; i++) {
                    let comment = document.createElement("div");
                    comment.setAttribute("class", "comment");
                    let avatar = document.createElement("img");
                    avatar.setAttribute("class", "account");
                    if(komentar[i][6][1] != ""){
                        avatar.setAttribute("src", "../../"+komentar[i][6][1]);
                    }else{
                        avatar.setAttribute("src", "../../view/asset/profil1.png");
                    }
                    avatar.setAttribute("alt", "profil");
                    comment.appendChild(avatar);
                    let isiKomen = document.createElement("p");
                    isiKomen.setAttribute("class", "komentar1");
                    isiKomen.appendChild(document.createTextNode(komentar[i][3][1]));
                    comment.appendChild(isiKomen);
                    document.querySelector(".baris-komentar").appendChild(comment);
                }
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