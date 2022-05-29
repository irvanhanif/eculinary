<?php
if (!isset($_SESSION)) session_start();
if(isset($_SESSION["user-culinary"])){
    $menuPath = "../../";
    require_once "../../menu/controller.menu.php";
    $komentar = new c_menu();
    $komentar->createKomentar($_POST["id_menu"], $_POST["komentar"]);
    echo true;
}else{
    echo false;
}