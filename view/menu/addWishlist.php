<?php
if (!isset($_SESSION)) session_start();
if(isset($_SESSION["user-culinary"])){
    $menuPath = "../../";
    require_once "../../menu/controller.menu.php";
    $wishlist = new c_menu();
    $wishlist->createWishlist($_POST["id_menu"]);
    echo true;
}else{
    echo false;
}