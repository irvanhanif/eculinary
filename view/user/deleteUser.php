<?php
$menuPath = "../../";
require_once $menuPath . "toko/controller.toko.php";
$_POST["id_toko"] = (new c_toko())->getIdToko();
if(count($_POST["id_toko"]) != 0){
    require "../toko/deleteToko.php";
}
require_once $menuPath . "user/controller.user.php";
$user = new c_user();
$user->deleteUser();
header("Location: logout.php");