<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="content-wrapper">
        <div class="detail-toko">
            <div class="logo">
                <img src="assets/logo_toko.png" alt="foto-toko">
            </div>
            <div class="informasi">
                <h1>Mie Gacoan Malang</h1>
                <h2>Kota Malang</h2>
                <h3>Ruko Kendalsari Barat, Jl. Kendal Sari Bar. No.2</h3>
                <div class="total-menu">
                    <img src="assets/clipboard.png" alt="clipboard">
                    <h2>Menu : <span>20</span></h2>
                </div>
            </div>
        </div>
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
        <?php 
            for ($i = 0; $i <= 10; $i++) {
                require 'makanan.php';
            }
        ?>
    </div>
    <footer></footer>
</body>
</html>
