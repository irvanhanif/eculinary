<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view/css/style.css">
  <link rel="stylesheet" href="view/css/daftarmakananminuman.css">
  <title>Hasil Penelurusan</title>
</head>
<body>
<?php require_once 'view/header.php'; ?>
  
  <div class="filter-wrapper">
    <h2>Urutkan Berdasarkan</h2>
    <form action="">
      <input type="button" name="terbaru" value="Terbaru">
      <input type="button" name="populer" value="Populer">
      <select name="harga">
          <option value disabled selected>Harga</option>
          <option value="rendah">Harga : Rendah ke Tinggi</option>
          <option value="tinggi">Harga : Tinggi ke Rendah</option>
      </select>
    </form>
  </div>
  <div class="menu-wrapper">
  <p>Makanan & Minuman</p>
  <?php
    require "view/menu/makanan.php"; 
  ?>
  </div>
  <p>Artikel</p>
  <div class="artikel">
  <img src="makanan.png" alt="makanan">
  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
  <p>Isi Artikel</p>
</body>
</html>
</div>
<?php require_once 'footer.html'; ?>