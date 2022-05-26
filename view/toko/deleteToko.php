<?php
$menuPath = "../../";
require_once $menuPath . "menu/controller.menu.php";
require_once $menuPath . "toko/controller.toko.php";
$toko = new c_toko();
$menu = new c_menu();
$allMenu = $menu->getAllMenuToko($_POST["id_toko"], '', '');
// var_dump($allMenu);
$menu = new c_menu();
for($i = 0; $i<count($allMenu); $i++){
    $menu->deleteMenu($allMenu[$i]["id_menu"]);
}
$toko->deleteToko($_POST["id_toko"]);