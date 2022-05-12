<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/homepage.css">
<?php require_once './view/header.html'; ?>
<img src="../view/asset/shop.png" alt="shop">
    <p>Mie Gacoan Malang</p>
    <p>Kota Malang</p>
    <p>Ruko Kendalsari Barat, Jl. Kendal Sari Bar. No.2</p>
    <img src="../view/asset/clipboard.png" alt="menu">
    <p>Menu : </p>
    <p>Urutan Berdasarkan</p>
    <p>Terbaru</p>
    <p>Populer</p>
    <label for="harga">Harga</label>
<select id="Harga" name="Harga">
  <option value="rendahketinggi">Harga : Rendah ke Tinggi</option>
  <option value="rendahketinggi">Harga : Tinggi ke Rendah</option>
</select>
<?php 
    
    for($i = 0; i < count($data); $i++){
?>
<div class="makanan">
    <img src="../view/asset/makanan.png" alt="makanan">
    <img src="../view/asset/wish.png" alt="wish">
    <p>Mie Iblis</p>
    <p>Rp 10.000</p>
    <p>1rb</p>
    <img src="../view/asset/chat.png" alt="komentar">
    <p>Malang</p>
    <img src="../view/asset/bintang.png" alt="rating">
</div>
<?php } ?>
<?php require_once './view/footer.html'; ?>
</html>