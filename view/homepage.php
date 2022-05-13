<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">

<img class="banner" src="banner.png" alt="banner">


<h2>Kategori</h2>

<div class="kategori-wrapper">

<div class="kategori">

<div class="cattegories">
<a href="toko.php">
<img class="gambar" alt="ayam" src="ayam.png">
<p class="tulisan" href="">Ayam</p>
</p>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="nasgor" src="nasgor.png">
         <p class="tulisan" href="">Nasi Goreng</p>
      </a> 
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="sup" src="sup.png">
         <p class="tulisan" href="">Sup</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="mie" src="mie.png">
         <p class="tulisan" href="">Mie</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="bakso" src="bakso.png">
         <p class="tulisan" href="">Bakso</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="pizza" src="pizza.png">
         <p class="tulisan" href="">Pizza</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="burger" src="burger.png">
         <p class="tulisan" href="">Burger</p>
        </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="kopi" src="kopi.png">
         <p class="tulisan" href="">Kopi</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="jus" src="jus.png">
         <p class="tulisan" href="">Jus</p>
      </a>
</div>

<div class="cattegories">
<a href= >
         <img class="gambar" alt="eskrim" src="eskrim.png">
         <p class="tulisan" href="">Es Krim</p>
</a>
</div>
</div>

<div class="menu-wrapper">
<h2>Makanan & Minuman Populer</h2>
<?php 
for ($i = 0; $i <= 3; $i++) {
                require 'makanan.php';
            }
            ?>
</div>

<div class="menu-wrapper">
<h2>Rekomendasi Makanan & Minuman</h2>
<?php 
for ($i = 0; $i <= 3; $i++) {
                require 'makanan.php';
            }
            ?>  
</div>

<div class="menu-wrapper">
<h2>Artikel</h2>
<?php 
for ($i = 0; $i <= 3; $i++) {
                require 'makanan.php';
            }
            ?>  
</div>

</html>
