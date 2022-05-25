<?php
$menuPath = "../../";
require_once "../../menu/controller.menu.php";
$wishlist = new c_menu();
$wishlist->createWishlist($_POST["id_menu"]);