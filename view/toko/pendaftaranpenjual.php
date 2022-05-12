<?php require_once 'header.html'; ?>
<div class="profil">
    <img src="profile.png" alt="Profil">
    <p>Hi, Jong Un!</p>
    <p>Kota Malang</p>

    <div class="profil"><img src="account.png" alt="profil">
    <p>Profil</p></div>

    <div class="password"><img src="lock.png" alt="password">
    <p>Ubah Password</p></div>
    
    <div class="wishlist"><img src="favorite-file.png" alt="wishlist">
    <p>Wishlist</p></div>
    
    <div class="toko"><img src="shop.png" alt="toko">
    <p>Toko</p></div>
    
    <div class="tulisArtikel"><img src="edit-file.png" alt="tulisArtikel">
    <p>Tulis Artikel</p></div>
    
    <div><img src="Logout.png" alt="logout">
    <p>Logout</p></div>
</div>

<form action="" method="post">
    <p>Informasi Toko</p>
    <p>Nama Toko</p>
    <input class="kolom" type="text" name="tokoname"
required="required"><br>
    <p>Kota</p>
    <input class="kolom" type="text" name="kota"
required="required"><br>
<p>Alamat Toko</p>
    <input class="kolom" type="text" name="alamat"
required="required"><br>
<p>Email</p>
    <input class="kolom" type="text" name="emailtoko"
required="required"><br>
<p>Nomor Telepon</p>
    <input class="kolom" type="number" name="telepon"
required="required"><br>
<p>Jam Operasi Toko </p>
    <input class="kolom" type="time" name="jambuka" placeholder="Masukkan jam buka (contoh 08.00)"
required="required"><br>
<input class="kolom" type="time" name="jamtutup" placeholder="Masukkan jam tutup (contoh 23.00)"
required="required"><br>
<input type="submit" name="submit" value="Submit">
</form>
<p>Pilih Gambar</p>
<input type="file" id="profilepicture"
  accept=".jpg,.jpeg,.png">
<?php
if(isset($_POST["submit"])){
    require "toko/controller.toko.php";
    $toko_1 = new c_toko();
    if($toko_1->createToko($_POST["tokoname"], $_POST["alamat"], $_POST["kota"], $_POST["emailtoko"], $_POST["telepon"], $_POST["jambuka"], $_POST["jamtutup"])){
      header("Location: homepage.php");
    }
  }
?>
<?php include 'pendaftaranmakanan.php'; ?>
<?php require_once 'footer.html'; ?>