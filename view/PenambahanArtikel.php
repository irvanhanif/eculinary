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

<form class="tulisArtikel" action="" method="post">
    <p>Tulis Artikel</p>
    <p>Nama Penulis</p>
    <input class="kolom" type="text" name="namapenulis" placeholder="Masukan nama Anda"
required="required"><br>
    <p>Judul</p>
    <input class="kolom" type="text" name="judul" placeholder="Masukan judul artikel"
required="required"><br>
    <p>Isi</p>
    <input class="kolom" type="text" name="isi" placeholder="Tulis isi artikel di sini"
required="required"><br>
<input type="submit" name="submit" value="Unggah">

<p>Pilih Gambar</p>
<input type="file" id="profilepicture"
  accept=".jpg,.jpeg,.png">
<?php require_once 'footer.html'; ?>
<?php
if(isset($_POST["submit"])){
    require "artikel/controller.artikel.php";
    $artikel_1 = new c_artikel();
    if($artikel_1->postArtikel($_POST["judul"], $_POST["isi"])){
      header("Location: homepage.php");
    }
  }
?>