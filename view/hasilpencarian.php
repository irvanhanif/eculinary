<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view/css/style.css">
  <link rel="stylesheet" href="view/css/daftarmakananminuman.css">
  <title>Hasil Penelurusan</title>
  <style>
    .text{
      display: flex;
      justify-content: space-between;
    }
  </style>
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
    <div class="text">
        <h2>Rekomendasi Makanan & Minuman</h2>
        <h2 class="liat">Lihat Semua</h2>
    </div>
    <div class="daftar-makanan">
  <?php
    require_once "menu/controller.menu.php";
    $key = explode("=", $request)[1];
    // echo $key;
    $daftarMenu = (new c_menu())->searchMenu("$key", '', '');
    // var_dump($daftarMenu);
    if(count($daftarMenu) > 0){
      for($i = 0; $i < count($daftarMenu); $i++){
        require "view/menu/makanan.php"; 
      }
    }else{
      ?> <p><strong>Makanan tidak ditemukan</strong></p> <?php
    }
  ?>
    </div>
  </div>
  <div class="menu-wrapper">
    <div class="text">
        <h2>Artikel</h2>
        <h2 class="liat">Lihat Semua</h2>
    </div>
    <div class="daftar-artikel">
  <?php
    require_once "artikel/controller.artikel.php";
    $data = (new c_artikel())->searchArtikel("$key", '', '');

    for($i = 0; $i < count($data); $i++){
      require "view/artikel/artikel.php"; 
    }
  ?>
    </div>
  </div>
</body>
</html>
</div>
<?php require_once 'footer.html'; ?>