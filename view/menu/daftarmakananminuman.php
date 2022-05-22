<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/daftarmakananminuman.css">
    <title>Document</title>
    <style>
        /* .makanan-wrapper {
            width: 25%;
        } */
    </style>
</head>
<body>
<?php 
$menuPath = "../";
require_once "../menu/controller.menu.php";
$daftarMenu = (new c_menu())->getAllMenu('', '');
// var_dump($daftarMenu);
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
            for ($i = 0; $i < count($daftarMenu); $i++) {
                require 'makanan.php';
            }
        ?>
        </div>  
        <?php
            require_once '../view/footer.html'; 
        ?>
</body>

