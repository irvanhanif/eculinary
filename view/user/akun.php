<?php require_once './view/header.html'; 
require "user/controller.user.php";
$data = (new c_user())->getDetailAkun();
// var_dump($data);
?>
<div class="profil">
    <img src="../view/asset/profile.png" alt="Profil">
    <p>Hi, <?php echo $data["username"] ?>!</p>
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

<form class="profilSaya" action="" method="POST">
    <p>Profil Saya</p>
    <p>Username</p>
    <input class="kolom" type="text" name="username" placeholder="Masukan username" value = '<?php echo $data["username"] ?>'
required><br>
    <p>Nama</p>
    <input class="kolom" type="text" name="nama" placeholder="Masukan nama" value = '<?php echo $data["nama"] ?>'
required><br>
    <p>Email</p>
    <input class="kolom" type="text" name="email" placeholder="Masukan email" value = '<?php echo $data["email"] ?>'
required><br>
    <p>Nomor Telepon</p>
    <input class="kolom" type="text" name="telepon" placeholder="Masukkan nomor telepon" value = '<?php echo $data["nomor_telepon"] ?>'
required="required"><br>
    <p>Alamat</p>
    <input class="kolom" type="text" name="alamat" placeholder="Masukan alamat" value = '<?php echo $data["alamat"] ?>'
required="required"><br>
    <p>Jenis Kelamin</p>
    <input type="radio" id="laki" name="jeniskelamin" value="Laki-Laki" <?php if($data["jenis_kelamin"] == 'Laki-Laki') echo 'checked' ?>>
    <label for="laki">Laki-Laki</label><br>
    <input type="radio" id="perempuan" name="jeniskelamin" value="Perempuan" <?php if($data["jenis_kelamin"] == 'Perempuan') echo 'checked' ?> >
    <label for="perempuan">Perempuan</label><br>
    <input type="radio" id="lainnya" name="jeniskelamin" value="Lainnya" <?php if($data["jenis_kelamin"] == 'Lainnya') echo 'checked' ?>>
    <label for="lainnya">Lainnya</label><br>
  <label for="birthdaytime">Tanggal Lahir</label>
  <input type="date" id="tanggallahir" name="tanggallahir" value = '<?php echo $data["tanggal_lahir"] ?>'>
  <input type="submit" name="submit" value="Submit">
</form>

<p>Pilih Gambar</p>
<input type="file" id="profilepicture"
  accept=".jpg,.jpeg,.png">
<?php require_once './view/footer.html';

if(isset($_POST["submit"])){
  $user_1 = new c_user();
  $user_1->updateAkun($_POST["username"], $_POST["nama"], $_POST["email"], $_POST["telepon"], $_POST["alamat"], $_POST["jeniskelamin"], $_POST["tanggallahir"]);
}