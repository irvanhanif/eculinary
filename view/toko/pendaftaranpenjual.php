<?php require_once './view/header.html';
require "user/controller.user.php";
$user = (new c_user())->getDetailAkun();
require "toko/controller.toko.php"; 
$data = (new c_toko())->getToko(1);
var_dump($data);
?>
<div class="profil">
    <img src="../view/asset/profile.png" alt="Profil">
    <p>Hi, <?php echo $user["username"] ?>!</p>
    <p>Kota Malang</p>

    <div class="profil"><img src="../view/asset/account.png" alt="profil">
    <p>Profil</p></div>

    <div class="password"><img src="../view/asset/lock.png" alt="password">
    <p>Ubah Password</p></div>
    
    <div class="wishlist"><img src="../view/asset/favorite-file.png" alt="wishlist">
    <p>Wishlist</p></div>
    
    <div class="toko"><img src="../view/asset/shop.png" alt="toko">
    <p>Toko</p></div>
    
    <div class="tulisArtikel"><img src="../view/asset/edit-file.png" alt="tulisArtikel">
    <p>Tulis Artikel</p></div>
    
    <div><img src="../view/asset/Logout.png" alt="logout">
    <p>Logout</p></div>
</div>

<form action="" method="post">
    <p>Informasi Toko</p>
    <p>Nama Toko</p>
    <input class="kolom" type="text" name="tokoname" value='<?php echo $data[0]["nama_toko"] ?>'
required="required"><br>
    <p>Kota</p>
    <input class="kolom" type="text" name="kota" value='<?php echo $data[0]["kota"] ?>'
required="required"><br>
<p>Alamat Toko</p>
    <input class="kolom" type="text" name="alamat" value='<?php echo $data[0]["alamat"] ?>'
required="required"><br>
<p>Email</p>
    <input class="kolom" type="text" name="emailtoko" value='<?php echo $data[0]["email"] ?>'
required="required"><br>
<p>Nomor Telepon</p>
    <input class="kolom" type="number" name="telepon" value='<?php echo $data[0]["nomor_telepon"] ?>'
required="required"><br>
<p>Jam Operasi Toko </p>
    <input class="kolom" type="time" name="jambuka" placeholder="Masukkan jam buka (contoh 08.00)" value='<?php echo $data[0]["jam_awal"] ?>'
required="required"><br>
<input class="kolom" type="time" name="jamtutup" placeholder="Masukkan jam tutup (contoh 23.00)" value='<?php echo $data[0]["jam_akhir"] ?>'
required="required"><br>
<input type="submit" name="submit" value="Submit">
</form>
<p>Pilih Gambar</p>
<input type="file" id="profilepicture"
  accept=".jpg,.jpeg,.png">
<?php
if(isset($_POST["submit"])){
    $toko_1 = new c_toko();
    if($toko_1->createToko($_POST["tokoname"], $_POST["alamat"], $_POST["kota"], $_POST["emailtoko"], $_POST["telepon"], $_POST["jambuka"], $_POST["jamtutup"])){
    //   header("Location: homepage.php");
    }
  }
?>
<?php include 'view/menu/pendaftaranmakanan.php'; ?>
<?php require_once 'view/footer.html'; ?>