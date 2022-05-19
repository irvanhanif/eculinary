<?php 
if(isset($pathMenu)) require_once $pathMenu . "menu/controller.menu.php";
else require_once "menu/controller.menu.php";
if(isset($daftarMenu)) $dataKomentar = (new c_menu())->getAllKomentar($daftarMenu[$i]["id_menu"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php if(isset($path)) echo $path ?>view/css/style.css">
        <style>
            /* .fa-star{
                color: #FFAB65;
            } */
            .rating {
                display: inline-block;
                position: relative;
                line-height: 1em;
            }
            
            .rating__overlay {
                color: #FFAB65;
                position: absolute;
                top: 0;
                left: 0;
                width: <?php echo (2.5/5)*112 ?>%;
                white-space: nowrap;
                overflow: hidden;
            }

            .rating__base {
                color: #ccc;
                white-space: nowrap;
            }
        </style>
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
                    <img src="<?php if(isset($path)) echo $path ?>view/asset/chat.png" alt="chat">
                    <h5><?php if(isset($dataKomentar)) echo count($dataKomentar); else echo '1rb' ?></h5>
                </div>
            </div>
            <div class="informasi-makanan">
                <h4 style="color:#8b8b8b"><?php if(isset($data[0]["kota"])) echo $data[0]["kota"]; else echo 'Malang' ?></h4>
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
            </div>
        </div>
        </div>
    </body>
</html>