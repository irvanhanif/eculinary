<?php
$menuPath = "../../";$pathMenu = "../../";
require_once "../../menu/controller.menu.php";
if(isset($_GET["key"]))
$daftarMenu = (new c_menu())->searchMenu($_GET["key"], $_GET["faktor"], $_GET["urut"]);
else if(isset($_GET["kategori"]))
$daftarMenu = (new c_menu())->filterKategori($_GET["kategori"], $_GET["faktor"], $_GET["urut"]);
// var_dump($daftarMenu);
for ($i=0; $i < count($daftarMenu); $i++) {
    require './makanan.php';
}