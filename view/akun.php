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

<form class="profilSaya" action="" method="POST">
    <p>Profil Saya</p>
    <p>Username</p>
    <input class="kolom" type="text" name="username" placeholder="Masukan username"
required><br>
    <p>Nama</p>
    <input class="kolom" type="text" name="nama" placeholder="Masukan nama"
required><br>
    <p>Email</p>
    <input class="kolom" type="text" name="email" placeholder="Masukan email"
required><br>
    <p>Nomor Telepon</p>
    <input class="kolom" type="text" name="telepon" placeholder="Masukkan nomor telepon"
required="required"><br>
    <p>Alamat</p>
    <input class="kolom" type="text" name="alamat" placeholder="Masukan alamat"
required="required"><br>
    <p>Jenis Kelamin</p>
    <input type="radio" id="laki" name="jeniskelamin" value="Laki-Laki">
    <label for="laki">Laki-Laki</label><br>
    <input type="radio" id="perempuan" name="jeniskelamin" value="Perempuan">
    <label for="perempuan">Perempuan</label><br>
    <input type="radio" id="lainnya" name="jeniskelamin" value="Lainnya">
    <label for="lainnya">Lainnya</label><br>
  <label for="birthdaytime">Tanggal Lahir</label>
  <input type="date" id="tanggallahir" name="tanggallahir">
  <input type="submit" name="submit" value="Submit">
</form>

<p>Pilih Gambar</p>
<input type="file" id="profilepicture"
  accept=".jpg,.jpeg,.png">
<?php require_once 'footer.html';
if(isset($_POST["submit"])){
  require "user/controller.user.php";
  $user_1 = new c_user();
  echo $_SESSION["user-culinary"]["id_user"];
  if($user_1->updateAkun($_POST["username"], $_POST["nama"], $_POST["email"], $_POST["telepon"], $_POST["alamat"], $_POST["jeniskelamin"], $_POST["tanggallahir"])){
    // header("Location: homepage.php");
    echo  $_POST["username"], $_POST["nama"], $_POST["email"], $_POST["telepon"], $_POST["alamat"], $_POST["jeniskelamin"], $_POST["tanggallahir"];
  }else header("Location: login.php");
// echo "<h2>ini submit</h2>";
}