<p>Menu Toko</p>
<form class="menuToko" action="" method="post" enctype="multipart/form-data">
    <div id="kolom">
    <p>Menu Toko</p>
    <p>Nama</p>
    <input class="kolom" type="text" name="nama" placeholder="Masukan nama makanan/minuman"
required="required"><br>
    <p>Harga(Rp)</p>
    <input class="kolom" type="number" name="harga" placeholder="Masukan harga makanan/minuman"
required="required"><br>
    <p>Kategori</p>
    <input class="kolom" type="text" name="kategori" placeholder="Masukan kategori makanan/minuman"
required="required"><br>
    <p>Jenis</p>
    <input type="radio" id="makanan" name="jenismakanan" value="Makanan">
    <label for="makanan">Makanan</label><br>
    <input type="radio" id="minuman" name="jenismakanan" value="Minuman">
    <label for="minuman">Minuman</label><br>
    <input type="radio" id="lainnya" name="jenismakanan" value="Lainnya">
    <label for="lainnya">Lainnya</label><br>
  <input type="submit" name="tambah" value="Tambahkan">
    </div>
    <p>Pilih Gambar</p>
  <input type="file" id="profilepicture" name="photo"
  accept=".jpg,.jpeg,.png">
</form>
<?php
if(isset($_POST["tambah"])){
    require "menu/controller.menu.php";
    $menu_1 = new c_menu();
    if($menu_1->createMenu($_POST["nama"], $_POST["harga"], $_POST["jenismakanan"], $_POST["kategori"], $_FILES["photo"])){
    //   header("Location: homepage.php");
    }
  }
?>
<div class="makanan">
    <img src="makanan.png" alt="makanan">
    <img src="wish1.png" alt="wish">
    <p>Mie Iblis</p>
    <p>Rp 10.000</p>
    <p>1rb</p>
    <img src="chat.png" alt="komentar">
    <p>Malang</p>
    <img src="bintang.png" alt="rating">
</div>