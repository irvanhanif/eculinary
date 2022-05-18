<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/daftarmakananminuman.css">
    <title>Document</title>
    <style>
        .filter-wrapper {
            /* margin: 48px 0px; */
            margin-top: 0;
            margin-bottom: 48px;
            padding-top: 100px;
            display: flex;
        }
    </style>
</head>
<body>
<?php 
require_once '../view/header.php'; 
?>
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
        <div class="daftar-makanan">
        <?php 
            for ($i = 0; $i <= 10; $i++) {
                require 'makanan.php';
            }
        ?>
        </div>
</body>

