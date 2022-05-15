<html>
    <head>
        <link rel="stylesheet" href="../view/css/style.css">
    </head>
    <body>
        <?php require_once 'view/header.php'; ?>
        <div class="wrapper">
            <?php include 'view/user/daftarKonten.php'; ?>
                <form class="content" action="" method="post">
                    <div class="left-content">
                        <h1>Informasi Toko</h1>
                        <div class="form">
                            <p>Nama Toko</p>
                            <input id="nama-toko" type="text" name="nama-toko" placeholder="Masukan Nama Toko" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Kota</p>
                            <input id="kota" type="text" name="kota" placeholder="Masukan Kota Toko Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Alamat Toko</p>
                            <input id="alamat" type="text" name="alamat" placeholder="Tulis Alamat Lengkap Anda di sini" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Email</p>
                            <input id="email" type="Email" name="email" placeholder="Tulis Email Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Nomor Telepon</p>
                            <input id="telepon" type="text" name="telepon" placeholder="Masukkan Nomor Telepon Anda" required="required"><br>
                        </div>
                        <div class="form">
                            <p>Jam Operasi Toko</p>
                            <input id="buka" type="time" name="buka" required="required"><br>
                            <input id="tutup" type="time" name="tutup" required="required"><br>
                        </div>
                        <input class ="submit" type="submit" name="submit" value="Daftar">
                    </div>
                    <div class="right-content">
                        <img src="assets/imgs/logo_toko.png" alt="logo-toko">
                        <label class="pilih-gambar"><input type="file" accept=".jpg,.jpeg,.png"/>Pilih Gambar</label>
                    </div>
                </form>           
        </div>      
        <?php require_once 'view/footer.html'; ?>
    </body>
</html>


<?php
if(isset($_POST["submit"])){
    require "artikel/controller.artikel.php";
    $artikel_1 = new c_artikel();
    if($artikel_1->postArtikel($_POST["judul"], $_POST["isi"])){
      header("Location: homepage.php");
    }
  }
?>