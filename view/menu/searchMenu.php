<?php
$menuPath = "../../";$pathMenu = "../../";
require_once "../../menu/controller.menu.php";
// if(!isset($_GET["filter"])) $_GET["filter"] = array();
if(!isset($_GET["faktor"])) {
    $_GET["faktor"] = '';
    $_GET["urut"] = '';
}
if(!isset($_GET["filter"])){
    $_GET["filter"] = '';
    $_GET["value"] = '';
}
if(isset($_GET["key"]))
    $daftarMenu = (new c_menu())->searchMenu($_GET["key"], $_GET["filter"], $_GET["value"], $_GET["faktor"], $_GET["urut"]);
else if(isset($_GET["kategori"]))
    $daftarMenu = (new c_menu())->filterKategori($_GET["kategori"], $_GET["filter"], $_GET["value"], $_GET["faktor"], $_GET["urut"]);
// var_dump($daftarMenu);
if(count($daftarMenu) > 0){
    for($i = 0; $i < count($daftarMenu); $i++){
      require "./makanan.php"; 
    }
  }else{
    ?> <p><strong>Makanan tidak ditemukan</strong></p> <?php
}