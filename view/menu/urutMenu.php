<?php
$menuPath = "../../";$pathMenu = "../../";$path="../";
require_once "../../menu/controller.menu.php";
if(!isset($_GET["faktor"])) {
    $_GET["faktor"] = '';
    $_GET["urut"] = '';
}
if(!isset($_GET["filter"])){
    $_GET["filter"] = '';
    $_GET["value"] = '';
}
$daftarMenu = (new c_menu())->getAllMenu($_GET["filter"], $_GET["value"], $_GET["faktor"], $_GET["urut"]);

// var_dump($daftarMenu);
if(count($daftarMenu) > 0){
    for($i = 0; $i < count($daftarMenu); $i++){
      require "./makanan.php"; 
    }
}else{
    ?> <p><strong>Makanan tidak ditemukan</strong></p> <?php
}