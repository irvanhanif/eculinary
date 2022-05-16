<?php require_once 'view/header.php'; 
if(isset($_SESSION["user-culinary"])){
    require "user/controller.user.php";
    $data = (new c_user())->getDetailAkun();
    var_dump($data);
?>
<html>
    <head>
        <link rel="stylesheet" href="../view/css/style.css">
        <style>
            body{
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php include 'daftarKonten.php'; ?>
                <form class="content" action="" method="post" enctype="multipart/form-data">
                    <div class="left-content">
                        <h1>Profil Saya</h1>
                        <div class="form">
                            <p>Username</p>
                            <input id="username" type="text" name="username" placeholder="Masukan username Anda" value = '<?php echo $data["username"] ?>' required><br>
                        </div>
                        <div class="form">
                            <p>Nama</p>
                            <input id="nama" type="text" name="nama" placeholder="Masukan nama Anda" value = '<?php echo $data["nama"] ?>'><br>
                        </div>
                        <div class="form">
                            <p>Email</p>
                            <input id="email" type="Email" name="email" placeholder="Masukan email Anda" value = '<?php echo $data["email"] ?>' required><br>
                        </div>
                        <div class="form">
                            <p>Nomor Telepon</p>
                            <input id="telepon" type="text" name="telepon" placeholder="Masukan nomor telepon Anda" value = '<?php echo $data["nomor_telepon"] ?>'><br>
                        </div>
                        <div class="form">
                            <p>Alamat</p>
                            <input id="alamat" type="text" name="alamat" placeholder="Masukan alamat Anda" value = '<?php echo $data["alamat"] ?>'><br>
                        </div>
                        <div class="form">
                            <p>Jenis Kelamin</p>
                            <input id="laki" type="radio" name="jenisKelamin" value="Laki-Laki" <?php if($data["jenis_kelamin"] == 'Laki-Laki') echo 'checked' ?>>
                            <label for="laki">Laki-laki</label>
                            <input id="perempuan" type="radio" name="jenisKelamin" value="Perempuan" <?php if($data["jenis_kelamin"] == 'Perempuan') echo 'checked' ?>>
                            <label for="perempuan">Perempuan</label>
                            <input id="lain" type="radio" name="jenisKelamin" value="Lainnya" <?php if($data["jenis_kelamin"] == 'Lainnya') echo 'checked' ?>>
                            <label for="lain">Lainnya</label><br>
                        </div>
                        <div class="form">
                            <p>Tanggal Lahir</p>
                            <input id="tgl-lahir" type="date" name="tgl-lahir" value = '<?php echo $data["tanggal_lahir"] ?>'>
                        </div>
                        <input type="submit" name="submit" value="Simpan"> 
                    </div>
                    <div class="right-content">
                        <img src="../view/asset/profile.png" alt="foto">
                        <label class="pilih-gambar"><input type="file" accept=".jpg,.jpeg,.png"/>Pilih Gambar</label>
                    </div>     
                </form>          
        </div>      
        <?php require_once 'view/footer.html'; ?>
    </body>
</html>

<?php
    if(isset($_POST["submit"])){
        $user_1 = new c_user();
        if($user_1->updateAkun($_POST["username"], $_POST["nama"], $_POST["email"], $_POST["telepon"], $_POST["alamat"], $_POST["jenisKelamin"], $_POST["tgl-lahir"])){
            $data = (new c_user())->getDetailAkun();
        }
    }
}else{
      header("Location: register");
}
?>