<?php
$menuPath = "../../";$pathMenu = "../../";$path="../../";
require_once "../../menu/controller.menu.php";
$daftarMenu = (new c_menu())->getAllMenuToko($_GET["key"], $_GET["faktor"], $_GET["urut"]);

// var_dump($daftarMenu);
for ($i=0; $i < count($daftarMenu); $i++) {
    require './makanan.php';
}