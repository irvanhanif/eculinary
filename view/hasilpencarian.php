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
  
  <div class="filter-wrapper" id="filter">
    <h2>Urutkan Berdasarkan</h2>
    <!-- <form action=""> -->
      <input type="button" name="terbaru" onclick="filterNew()" value="Terbaru">
      <input type="button" name="populer" onclick="filterPopuler()" value="Populer">
      <select name="harga" onChange="filterSelect()">
          <option value disabled selected>Harga</option>
          <option value="rendah">Harga : Rendah ke Tinggi</option>
          <option value="tinggi">Harga : Tinggi ke Rendah</option>
      </select>
    <!-- </form> -->
  </div>
  <script>
    function filterNew(){
      fetch("http://localhost:8080/eculinary2/view/menu/searchMenu.php?<?php if(isset($_GET["key"])) echo "key=". $_GET["key"]; else if(isset($_GET["kategori"])) echo "kategori=". $_GET["kategori"];?>&faktor=id_menu&urut=down")
      .then(res => res.text())
      .then(data => {
        // console.log(data)
        document.querySelector(".daftar-makanan").innerHTML = data;
      });
    }
    function filterPopuler(){
      fetch("http://localhost:8080/eculinary2/view/menu/searchMenu.php?<?php if(isset($_GET["key"])) echo "key=". $_GET["key"]; else if(isset($_GET["kategori"])) echo "kategori=". $_GET["kategori"];?>&faktor=bintang&urut=down")
      .then(res => res.text())
      .then(data => {
        // console.log(data)
        document.querySelector(".daftar-makanan").innerHTML = data;
      });
    }
    function filterSelect(){
      if(document.getElementById("filter").getElementsByTagName("select")[0].getElementsByTagName("option")[1].selected){
        fetch("http://localhost:8080/eculinary2/view/menu/searchMenu.php?<?php if(isset($_GET["key"])) echo "key=". $_GET["key"]; else if(isset($_GET["kategori"])) echo "kategori=". $_GET["kategori"];?>&faktor=harga&urut=up")
        .then(res => res.text())
        .then(data => {
          // console.log(data)
          document.querySelector(".daftar-makanan").innerHTML = data;
        });
      }else if(document.getElementById("filter").getElementsByTagName("select")[0].getElementsByTagName("option")[2].selected){
        fetch("http://localhost:8080/eculinary2/view/menu/searchMenu.php?<?php if(isset($_GET["key"])) echo "key=". $_GET["key"]; else if(isset($_GET["kategori"])) echo "kategori=". $_GET["kategori"];?>&faktor=harga&urut=down")
        .then(res => res.text())
        .then(data => {
          // console.log(data)
          document.querySelector(".daftar-makanan").innerHTML = data;
        });
      }
    }
  </script>
  <div class="pencarian-wrapper">
    <div class="menu-wrapper">
      <div class="text">
          <h2>Rekomendasi Makanan & Minuman</h2>
          <h2 class="liat" onclick="location.href='./menu'">Lihat Semua</h2>
      </div>
      <div class="daftar-makanan">
        <?php
          require_once "menu/controller.menu.php";
          if(isset($_GET["kategori"])) {
            $daftarMenu = (new c_menu())->filterKategori($_GET["kategori"], '', '');
          }else {
            $key = $_GET["key"];;
            // echo $key;
            $daftarMenu = (new c_menu())->searchMenu("$key", '', '');
          }
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
    <?php if(isset($key)){ ?>
    <div class="menu-wrapper">
      <div class="text">
          <h2>Artikel</h2>
          <h2 class="liat" onclick="location.href='./artikel'">Lihat Semua</h2>
      </div>
      <div class="daftar-artikel">
        <?php
          require_once "artikel/controller.artikel.php";
          $data = (new c_artikel())->searchArtikel("$key", '', '');

          if(count($daftarMenu) > 0){
            for($i = 0; $i < count($data); $i++){
              require "view/artikel/artikel.php"; 
            }
          }else{
            echo '<p><strong>Artikel tidak ditemukan</strong></p>';
          }
        ?>
      </div>
    </div>
    <?php } ?>
  </div>
</body>
</html>
</div>
<?php require_once 'footer.html'; ?>