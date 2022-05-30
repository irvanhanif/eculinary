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
$faktor = ''; $flow = '';
if(isset($_GET["faktor"]) && $_GET["faktor"] == "populer") {
    $faktor = 'bintang';
    $flow = 'down';
}
$daftarMenu = (new c_menu())->getAllMenu('', '', "$faktor", "$flow");
// var_dump($daftarMenu);
require_once '../view/header.php'; 
?>
<div class="filter-wrapper">
            <h2>Urutkan Berdasarkan</h2>
            <!-- <form action=""> -->
            <div id="filter">
                <input type="button" onclick="filterNew()" name="terbaru" value="Terbaru">
                <input type="button" onclick="filterPopuler()" name="populer" value="Populer">
                <select name="harga" onchange="filterSelect()">
                    <option value disabled selected>Harga</option>
                    <option value="rendah">Harga : Rendah ke Tinggi</option>
                    <option value="tinggi">Harga : Tinggi ke Rendah</option>
                </select>
                <select onChange="filterKota()">
                    <option value disabled selected>Pilih Kota</option>
                    <option value="Malang">Malang</option>
                    <option value="Bikini Bottom">Bikini Bottom</option>
                    <option value="Konoha">Konoha</option>
                </select>
            <!-- </form> -->
            </div>
            <script>
                function filterNew(){
                    fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?faktor=id_menu&urut=down")
                    .then(res => res.text())
                    .then(data => {
                        // console.log(data)
                        document.querySelector(".daftar-makanan").innerHTML = data;
                    });
                    }
                function filterPopuler(){
                    fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?faktor=bintang&urut=down")
                    .then(res => res.text())
                    .then(data => {
                        // console.log(data)
                        document.querySelector(".daftar-makanan").innerHTML = data;
                    });
                }
                function filterSelect(){
                    if(document.getElementById("filter").getElementsByTagName("select")[0].getElementsByTagName("option")[1].selected){
                        fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?faktor=harga&urut=up")
                        .then(res => res.text())
                        .then(data => {
                            // console.log(data)
                            document.querySelector(".daftar-makanan").innerHTML = data;
                        });
                    }else if(document.getElementById("filter").getElementsByTagName("select")[0].getElementsByTagName("option")[2].selected){
                        fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?faktor=harga&urut=down")
                        .then(res => res.text())
                        .then(data => {
                            // console.log(data)
                            document.querySelector(".daftar-makanan").innerHTML = data;
                        });
                    }
                }
                function filterKota(){
                    if(document.getElementById("filter").getElementsByTagName("select")[1].getElementsByTagName("option")[1].selected){
                        fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?filter=kota&value=Malang")
                        .then(res => res.text())
                        .then(data => {
                        // console.log(data)
                        document.querySelector(".daftar-makanan").innerHTML = data;
                        });
                    }else if(document.getElementById("filter").getElementsByTagName("select")[1].getElementsByTagName("option")[2].selected){
                        fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?filter=kota&value=Bikini Bottom")
                        .then(res => res.text())
                        .then(data => {
                        // console.log(data)
                        document.querySelector(".daftar-makanan").innerHTML = data;
                        });
                    }else if(document.getElementById("filter").getElementsByTagName("select")[1].getElementsByTagName("option")[3].selected){
                        fetch("http://localhost:8080/eculinary2/view/menu/urutMenu.php?filter=kota&value=Konoha")
                        .then(res => res.text())
                        .then(data => {
                        // console.log(data)
                        document.querySelector(".daftar-makanan").innerHTML = data;
                        });
                    }
                }
            </script>
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

