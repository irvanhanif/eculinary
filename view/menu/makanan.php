<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php if(isset($path)) echo $path ?>view/css/style.css">
    </head>
    <body>
        <div class="makanan-wrapper" >
        <div class="makanan" onclick="location.href='<?php if(isset($path)) echo $path ?>menu/detail/<?php if(isset($daftarMenu)) echo $daftarMenu[$i]['id_menu'] ?>'">
        <!-- < ?php if(isset($path)) echo $path ?>view/asset/makanan.png     -->
        <img src="<?php 
            if(isset($path)) echo $path;
            if(isset($daftarMenu) && $daftarMenu[$i]["avatar"]) echo $daftarMenu[$i]["avatar"];
            else echo 'view/asset/makanan.png';
        ?>" alt="foto-makanan" id="img-menu">
            <h4><b><?php 
                if(isset($daftarMenu)) echo $daftarMenu[$i]["nama_menu"];
                else echo 'Mie Iblis';
            ?></b></h4>
            <div class="informasi-makanan">
                <h4>Rp <?php 
                    if(isset($daftarMenu)) echo $daftarMenu[$i]["harga"]; 
                    else echo "10.000" ;
                ?></h4>
                <div class="komentar">
                    <img src="view/asset/chat.png" alt="chat">
                    <h5>1rb</h5>
                </div>
            </div>
            <div class="informasi-makanan">
                <h4 style="color:#8b8b8b"><?php if(isset($data[0][0]["kota"])) echo $data[0][0]["kota"]; else echo 'Malang' ?></h4>
                <div class="rating">
                    <img src="view/asset/bintang.png" alt="star">
                </div>
            </div>
        </div>
        </div>
    </body>
</html>