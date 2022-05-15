<?php require_once './view/header.php'; 
if(isset($_SESSION["user-culinary"])){
    require "user/controller.user.php";
    $data = (new c_user())->getDetailAkun();
?>
<html>
    <head>
        <link rel="stylesheet" href="../view/css/style.css">
        <!-- <style>
            body{
                margin: 0;
            }
            .wrapper{
                margin-top: 150px;
            }
        </style> -->
    </head>
    <body>
        <?php require_once 'view/header.php'; ?>
        <div class="wrapper">
            <?php include 'daftarKonten.php'; ?>
                <form class="content" action="" method="post">
                    <div class="left-content">
                        <h1>Profil Saya</h1>
                        <div class="form">
                            <p>Username</p>
                            <input id="username" type="text" name="username" placeholder="Masukan username Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Nama</p>
                            <input id="nama" type="text" name="nama" placeholder="Masukan nama Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Email</p>
                            <input id="email" type="Email" name="email" placeholder="Masukan email Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Nomor Telepon</p>
                            <input id="telepon" type="text" name="telepon" placeholder="Masukan nomor telepon Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Alamat</p>
                            <input id="alamat" type="text" name="alamat" placeholder="Masukan alamat Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Jenis Kelamin</p>
                            <input id="laki" type="radio" name="jenisKelamin">
                            <label for="laki">Laki-laki</label>
                            <input id="perempuan" type="radio" name="jenisKelamin">
                            <label for="perempuan">Perempuan</label>
                            <input id="lain" type="radio" name="jenisKelamin">
                            <label for="lain">Lainnya</label><br>
                        </div>
                        <div class="form">
                            <p>Tanggal Lahir</p>
                            <input id="tgl-lahir" type="date" name="tgl-lahir">
                        </div>
                        <input type="submit" name="submit" value="Simpan"> 
                    </div>
                    <div class="right-content">
                        <img src="assets/imgs/photo-profile.png" alt="foto">
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
        $user_1->updateAkun($_POST["username"], $_POST["nama"], $_POST["email"], $_POST["telepon"], $_POST["alamat"], $_POST["jeniskelamin"], $_POST["tanggallahir"]);
    }
}else{
      header("Location: register");
}
?>