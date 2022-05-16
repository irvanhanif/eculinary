<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/homepage.css">
</head>
<body>
<?php $url = 'user/'; require_once 'view/header.php'; ?>
<img class="banner" src="view/asset/banner.png" alt="banner">


<h2>Kategori</h2>

<div class="kategori-wrapper">

<div class="kategori">

<div class="cattegories">
<a href="toko.php">
<img class="gambar" alt="ayam" src="view/asset/ayam.png">
<p class="tulisan" href="">Ayam</p>
</p>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="nasgor" src="view/asset/nasgor.png">
         <p class="tulisan" href="">Nasi Goreng</p>
      </a> 
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="sup" src="view/asset/sup.png">
         <p class="tulisan" href="">Sup</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="mie" src="view/asset/mie.png">
         <p class="tulisan" href="">Mie</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="bakso" src="view/asset/bakso.png">
         <p class="tulisan" href="">Bakso</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="pizza" src="view/asset/pizza.png">
         <p class="tulisan" href="">Pizza</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="burger" src="view/asset/burger.png">
         <p class="tulisan" href="">Burger</p>
        </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="kopi" src="view/asset/kopi.png">
         <p class="tulisan" href="">Kopi</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="jus" src="view/asset/jus.png">
         <p class="tulisan" href="">Jus</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="eskrim" src="view/asset/eskrim.png">
         <p class="tulisan" href="">Es Krim</p>
</a>
</div>
</div>

<div class="menu-wrapper">
    <div class="text">
    <h2>Makanan & Minuman Populer</h2>
    <h2 class="liat">Lihat Semua</h2>
    </div>
    <div class="makanan-list">
<?php 
for ($i = 0; $i <= 3; $i++) {
    require 'view/menu/makanan.php'; 
    }
?>
    </div>
</div>

<div class="menu-wrapper">
<div class="text">
    <h2>Rekomendasi Makanan & Minuman</h2>
    <h2 class="liat">Lihat Semua</h2>
    </div>
    <div class="makanan-list">
<?php 
for ($i = 0; $i <= 3; $i++) {
                require 'menu/makanan.php';
            }
            ?>  
    </div>
</div>

<div class="menu-wrapper">
<div class="text">
<h2>Artikel</h2>
    <h2 class="liat">Lihat Semua</h2>
    </div>
    <div class="makanan-list">
<?php 
for ($i = 0; $i <= 3; $i++) {
                require 'menu/makanan.php';
            }
            ?>  
    </div>
</div>
</div>
<?php require_once './view/footer.html';?>
<script>
    const slider = document.querySelector('.kategori');
    let mouseDown = false;
    let startX, scrollLeft;

    let startDragging = function (e) {
    mouseDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    };
    let stopDragging = function (event) {
    mouseDown = false;
    };

    slider.addEventListener('mousemove', (e) => {
    e.preventDefault();
    if(!mouseDown) { return; }
    const x = e.pageX - slider.offsetLeft;
    const scroll = x - startX;
    slider.scrollLeft = scrollLeft - scroll;
    });

    // Add the event listeners
    slider.addEventListener('mousedown', startDragging, false);
    slider.addEventListener('mouseup', stopDragging, false);
    slider.addEventListener('mouseleave', stopDragging, false);
</script>
</body>
</html>
