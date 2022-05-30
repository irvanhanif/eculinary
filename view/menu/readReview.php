<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$dataBintang = (new c_menu())->getBintang($_GET["id_menu"]);

// var_dump($dataBintang);
echo $dataBintang["bintang"];