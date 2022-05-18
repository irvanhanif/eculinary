<?php
if(isset($_SESSION["user-culinary"])){
    $data["username"] = $_SESSION["user-culinary"]["username"];
    ?>
<html>
    <head>
        <link rel="stylesheet" href="../view/css/style.css">
    </head>
    <body>
<?php
    if(isset($_POST["submit"])){
        require_once "toko/controller.toko.php";
        $toko = new c_toko();
        if($toko->createToko($_POST["nama-toko"], $_POST["alamat"], $_POST["kota"], $_POST["email"], $_POST["telepon"], $_POST["buka"], $_POST["tutup"])){
            header("Location: own");
        }
    }
    if(isset($_POST["simpan"])){
        require_once "toko/controller.toko.php";
        $toko = new c_toko();
        echo "hehe";
        if($toko->updateToko($_POST["nama-toko"], $_POST["alamat"], $_POST["kota"], $_POST["email"], $_POST["telepon"], $_POST["buka"], $_POST["tutup"], $_FILES["avatar"], $data[0]["id_toko"])){
            header("Location: own");
        }
    }
    if(isset($_POST["submitMenu"])){
        require_once "menu/controller.menu.php";
        $menu = new c_menu();
        if($menu->createMenu($_POST["nama-makanan"], $_POST["harga"], $_POST["jenisMakanan"], $_POST["kategori"], $_FILES["avatar"])){
            header("Location: own");
        }
        // echo $_POST["nama-makanan"], $_POST["harga"], $_POST["jenisMakanan"], $_POST["kategori"];
    }
?>
        <?php require_once 'view/header.php'; ?>
        <div class="wrapper">
            <?php include 'view/user/daftarKonten.php'; ?>
                <div class="contents">
                <form class="content" action="" method="post" enctype="multipart/form-data">
                    <div class="left-content">
                        <h1>Informasi Toko</h1>
                        <div class="form">
                            <p>Nama Toko</p>
                            <input id="nama-toko" type="text" name="nama-toko" placeholder="Masukan Nama Toko" required="required" value="<?php if(isset($data[0]["nama_toko"])) echo $data[0]["nama_toko"] ?>"><br>
                        </div>
                        <div class="form">
                            <p>Kota</p>
                            <input id="kota" type="text" name="kota" placeholder="Masukan Kota Toko Anda" required="required" value="<?php if(isset($data[0]["kota"])) echo $data[0]["kota"] ?>"><br>
                        </div>
                        <div class="form">
                            <p>Alamat Toko</p>
                            <input id="alamat" type="text" name="alamat" placeholder="Tulis Alamat Lengkap Anda di sini" required="required"  value="<?php if(isset($data[0]["alamat"])) echo $data[0]["alamat"] ?>"><br>
                        </div>
                        <div class="form">
                            <p>Email</p>
                            <input id="email" type="Email" name="email" placeholder="Tulis Email Anda" required="required"value="<?php if(isset($data[0]["email"])) echo $data[0]["email"] ?>"><br>
                        </div>
                        <div class="form">
                            <p>Nomor Telepon</p>
                            <input id="telepon" type="text" name="telepon" placeholder="Masukkan Nomor Telepon Anda" required="required" value="<?php if(isset($data[0]["nomor_telepon"])) echo $data[0]["nomor_telepon"] ?>"><br>
                        </div>
                        <div class="form">
                            <p>Jam Operasi Toko</p>
                            <input id="buka" type="time" name="buka" required="required" value="<?php if(isset($data[0]["jam_awal"])) echo $data[0]["jam_awal"] ?>"><br>
                            <input id="tutup" type="time" name="tutup" required="required" value="<?php if(isset($data[0]["jam_akhir"])) echo $data[0]["jam_akhir"] ?>"><br>
                        </div>
                        <?php if(isset($data[0]["id_toko"])){ ?>
                            <input class ="submit" type="submit" name="simpan" value="Simpan">
                        <?php }else{ ?>
                            <input class ="submit" type="submit" name="submit" value="Daftar">
                        <?php } ?>
                    </div>
                    <div class="right-content">
                        <img src="<?php if(isset($data[0]["avatar"]) && $data[0]["avatar"]) echo '../' . $data[0]["avatar"]; else echo '../view/asset/logo_toko.png'?>" alt="logo-toko" id="img-toko">
                        <label class="pilih-gambar"><input type="file" onchange="readURLToko(this);" name="avatar" accept=".jpg,.jpeg,.png"/>Pilih Gambar</label>
                    </div>
                </form>
                <?php if(isset($data[0]["id_toko"])){ 
                    require "view/menu/penambahanMakanan.php"; }?>
                </div>           
        </div>      
        <?php
            require_once 'view/footer.html'; 
        ?>
        <script>
            function readURLToko(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        document.getElementById("img-toko").setAttribute('src', e.target.result)
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>

<?php
}else{
    header("Location: ../user/login");
}
?>